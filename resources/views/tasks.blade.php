
@extends('layouts.app')
@section('content')

<header>
	<h1 class="text-center">Task Management</h1>
</header>
<main>
<div>
@forelse ($tasks as $task)
        <x-task-card>
			<p>{{ $task['title'] }}</p>
			<p>{{ $task['description'] }}</p>
		</x-task-card>
    @empty
        <x-alert type="info">No tasks found.</x-alert>
    @endforelse
</div>
</main>

