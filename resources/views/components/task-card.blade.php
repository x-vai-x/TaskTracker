<div class="card">
    <div class="card-body">
		<div class="mb-2">
			<h2>
				Title: 
				{{ $task['title'] }}
			</h2>
		</div>
		<hr />
		<div class=" mb-2">
			<span>
				Description: 
				{{ $task['description'] }}
			</span>
			
		</div>
		<div class="d-flex flex-row gap-3">
			<x-task-priority  priority="{{ $task['priority'] }}">
				<div>
					Priority: {{ $task['priority'] }}
				</div>
			</x-task-priority>
			<x-task-status status="{{ $task['status'] }}">
				<div>
					Status: {{ $task['status'] }}
				</div>
			</x-task-status>
		</div>
		<div>
			<x-edit-btn/>
		</div>
    </div>
</div>