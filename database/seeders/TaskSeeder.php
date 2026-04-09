<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
	use WithoutModelEvents;
  
    public function run(): void
    {
		Task::factory()->create([
            'title' => 'Test name',
            'description' => 'Test description',
			'priority' => 'LOW',
			'status' => 'PENDING'
        ]);
    }
}
