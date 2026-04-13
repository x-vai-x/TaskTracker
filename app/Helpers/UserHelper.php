<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper {
	public static function formatUsers() {
		return User::all()
			->mapWithKeys(function (User $user) {
				return $user->formatUser();
			})
			->toArray();
	}
}