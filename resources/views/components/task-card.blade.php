<div class="card mb-2">
    <div class="card-body">
		<p>Title: {{ $task['title'] }}</p>
		<p>Description: {{ $task['description'] }}</p>
		<div class="d-flex flex-row gap-3">
			<x-task-priority  priority="{{ $task['priority'] }}">
				Priority: {{ $task['priority'] }} 
			</x-task-priority>
		
		
			<x-task-status status="{{ $task['status'] }}">
				Status:{{ $task['status'] }}
			</x-task-priority>
		</div>
    </div>
</div>