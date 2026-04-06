
@extends('layouts.app')
@section('content')

<header>
	<h1 class="text-center">Task Management</h1>
	@php
		@$alertType = null;
		if ($success !== -1) {
			$alertType = $success ? "success" : "danger";
		}
    
	@endphp
	@if ($alertType)
		<x-alert type="{{ $alertType }}">{{ $message }}</x-alert>
	@endif
</header>
<main>
	<div class="d-flex flex-row justify-content-center mt-3">
		@forelse ($tasks as $i => $task)
			<div class="{{ $i % 3 === 0 ? 'bg-gray-200': '' }}">
				<x-task-card :task=$task />
			</div>
			@empty
				<x-alert type="info">No tasks found.</x-alert>
		@endforelse
	</div>
</main>

