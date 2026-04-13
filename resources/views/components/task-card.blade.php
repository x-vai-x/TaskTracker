<div class="card" id="task-card-{{ $task['id'] }}">
    <div class="card-body">
		<div class="mb-2">
			<h2>
				Title: 
				<span class="title">
					{{ $task['title'] }}
				</span>
			</h2>
		</div>
		<hr />
		<div class="mb-2">
			Description: 
			<span class="description">
				{{ $task['description'] ?? 'No description specified' }}
			</span>
		</div>
		<div class="d-flex flex-row gap-3">
			<div class="priority">
				<x-task-priority  priority="{{ $task['priority'] }}">
					<div>
						Priority:
						{{ $task['priority'] ?? 'Priority not specified' }}
					</div>
				</x-task-priority>
			</div>
			<div class="status">
				<x-task-status status="{{ $task['status'] }}">
					<div>
						Status: 
						{{ $task['status'] }}
					</div>
					@if ($task['status'] == 'NON COMPLIANT')
						<div class="bg-white">
							Corrective action note:
							{{ $task['corrective_action_note'] }}
						</div>
					@endif
				</x-task-status>
			</div>
		</div>
		<div class="mb-2">
			<x-task-assigned-user :user="$task->user" />
		</div>
		<div class="mb-2">
			Due Date:
			<span class="due_date">
				{{ $task['due_date'] ?? 'No due date specified' }}
			</span>
		</div>
		<div>
			<x-edit-btn id="{{ $task['id'] }}"/>
		</div>
		
		<x-modal-dialog title="Edit task" id="taskModal-{{ $task['id'] }}">
			<x-task-form 
				routeMethod="POST" 
				routeName="api.tasks.update"
				:task=$task
			/>
		</x-modal-dialog>
    </div>
</div>