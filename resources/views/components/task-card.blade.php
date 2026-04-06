<div class="card mb-5">
    <div class="card-body">
		<div class="d-flex flex-row gap-3 mb-2">
			<h2>
				Title: 
				{{ $task['title'] }}
				<x-edit-btn/>
			</h2>
		</div>
		<hr />
		<div class="d-flex flex-row gap-3 mb-2">
			<span>
				Description: 
				{{ $task['description'] }}
			</span>
			<x-edit-btn/>
		</div>
		<div class="d-flex flex-row gap-3">
			<x-task-priority  priority="{{ $task['priority'] }}">
				<div class="d-flex flex-row gap-3 justify-content-center">
					<span>Priority: {{ $task['priority'] }}</span>
					<x-edit-btn/>
				</div>
			</x-task-priority>
			<x-task-status status="{{ $task['status'] }}">
				<div class="d-flex flex-row gap-3">
					<span>Status: {{ $task['status'] }}</span>
					<x-edit-btn/>
				</div>
			</x-task-status>
		</div>
    </div>
</div>