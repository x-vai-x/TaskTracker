<?php

namespace App\Helpers;

use App\Models\Task;
use App\Models\User;

class TaskHelper {
	public static function filterTasks(int $userId, array $statuses, array $dueDateOptions) {
		$today = now()->startOfDay();

		return $tasks = Task::query()
			->with('user')

			->when(!empty($statuses), function ($q) use ($statuses) {
				$q->whereIn('status', $statuses);
			})

			->when($userId, function ($q) use ($userId) {
				$q->where('user_id', $userId);
			})

			->when(!empty($dueDateOptions), function ($q) use ($dueDateOptions, $today) {

				$q->where(function ($query) use ($dueDateOptions, $today) {

					if (in_array('DUE TODAY', $dueDateOptions)) {
						$query->orWhereDate('due_date', $today);
					}

					if (in_array('OVERDUE', $dueDateOptions)) {
						$query->orWhere(function ($sub) use ($today) {
							$sub->whereNotNull('due_date')
								->whereDate('due_date', '<', $today);
						});
					}
				});
			})
			->get();
	}
}