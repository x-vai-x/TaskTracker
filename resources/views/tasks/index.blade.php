
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
		<x-alert alertType="{{ $alertType }}">{{ $message }}</x-alert>
	@endif
</header>
<main>
	<div class="d-flex flex-row justify-content-between gap-1 mt-3 flex-wrap w-100">
		@forelse ($tasks as $task)
			<div class="w-45 mb-5">
				<x-task-card :task=$task />
			</div>
			@empty
				<x-alert alertType="info">No tasks found.</x-alert>
		@endforelse
	</div>
</main>

