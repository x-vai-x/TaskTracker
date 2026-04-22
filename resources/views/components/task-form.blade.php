
@php
    use Illuminate\Support\Arr;
@endphp
<div class="modal-alert"></div>
<form 
	@if (str_starts_with($routeName, 'web.'))
		method={{ $routeMethod }} action={{ route($routeName) }}
	@else
		id="form-edit-task-{{ $task['id'] }}"
	@endif
>
	<div class="mb-3">
		<label class="form-label">Title</label>
		<input 
			type="text" 
			name="title" 
			class="form-control @error('title') is-invalid @enderror"
			required
			maxlength="255"
			placeholder="Enter task title"
			value="{{ Arr::get($task, 'title', '')}}"
		>

		@error('title')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
	<div class="mb-3">
		<label class="form-label">Description</label>
		<textarea 
			name="description" 
			class="form-control @error('description') is-invalid @enderror"
			rows="4"
			placeholder="Enter description"
		>{{ Arr::get($task, 'description', '') }}</textarea>

		@error('description')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
	<div class="mb-3">
		<label class="form-label">Status</label>
		<div class="d-flex flex-row">
			<div>
				<x-dropdown 
					label="Status" 
					name="status" 
					enum-class="\App\Enums\TaskStatus" 
					selected="{{ Arr::get($task, 'status', '') }}"
				/>
				@error('status')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div>
				<textarea 
					id="corrective_action_note"
					name="corrective_action_note" 
					class="form-control {{ Arr::get($task, 'status', '') == 'NON COMPLIANT' ? '' :'d-none' }}"
					rows="4"
					placeholder="Enter correction actions"
					@required(Arr::get($task, 'status') === 'NON COMPLIANT')
				>{{ Arr::get($task, 'corrective_action_note', '') }}</textarea>
			</div>
		</div>
	</div>
	<div class="mb-3">
		<label class="form-label">Priority</label>
		<x-dropdown 
			label="Priority" 
			name="priority" 
			enum-class="\App\Enums\TaskPriority" 
			selected="{{ Arr::get($task, 'priority', '') }}"
		/>

		@error('priority')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
	<div class="mb-3">
		<x-dropdown 
			label="Assigned user" 
			name="user_id" 
			:options=$users 
			isOptionsArrayAssoc
			selected="{{ Arr::get($task, 'user_id', '') }}"
		/>
		@error('user_id')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
	<div class="mb-3">
        <label class="form-label">Due Date</label>
        <input 
            type="date" 
            name="due_date" 
            class="form-control @error('due_date') is-invalid @enderror"
            value="{{ Arr::get($task, 'due_date') }}"
        >
        @error('due_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
	
	<div class="mb-3">
		<button type="submit" class="btn btn-primary">
			{{ $task ? 'Update' : 'Create' }}
		</button>
	</div>
</form>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		@if (isset($task['id']))
			$('#form-edit-task-{{ $task['id'] }}').on('submit', async function(event) {
				if ("<?php !str_starts_with($routeName, 'api.' )?>") {
					return;
				}
				event.preventDefault();
				await callAPI(this);
			});
	
			$('#form-edit-task-{{ $task['id'] }} select#status').on('change', function () {
				$corrective_action_note_textarea = $(this)
					.closest('div')
					.next()
					.find('textarea');
				if ($(this).val() == 'NON COMPLIANT') {
					$corrective_action_note_textarea.removeClass('d-none');
					$corrective_action_note_textarea.attr('required', 'required');
				}
				else {
					$corrective_action_note_textarea.addClass('d-none');
					$corrective_action_note_textarea.text('');
					$corrective_action_note_textarea.removeAttr('required');
				}
			});

			async function callAPI($formEl) {
				$modalAlert = $($formEl).prev('.modal-alert');
				let bodyData = new FormData($formEl);
				bodyData.append('id', "{{ Arr::get($task, 'id') }}");
				if (!bodyData.get("status")) {
					bodyData.set('status', 'PENDING');
				}
				let res = undefined;
				try {
					res = await fetch("{{ route($routeName) }}", {
						method: "{{ $routeMethod }}",
						body: bodyData
					});	
				
				}
				catch (e) {
					$modalAlert.load("{{ route('web.partials.alert', ['alertType' => 'danger', 'message' => 'Task could not be updated.']) }}");
					return;
				}
			
				let json = await res.json();

				if (json['success']) {
					$modalAlert.load("{{ route('web.partials.alert', ['alertType' => 'success', 'message' => 'Task updated.']) }}", function() {
						setTimeout(function() {
							$modalEl = $('#taskModal-{{ $task['id'] }}');
							let modal = bootstrap.Modal.getInstance($modalEl);
							modal.hide();
						}, 3000);
					});
					$taskCard = $('#task-card-{{ $task['id'] }}');
					let simpleTaskAttributes = ['title', 'description', 'due_date'];
					
					for (let taskAttribute of simpleTaskAttributes) {
						let attr = bodyData.get(taskAttribute) ? bodyData.get(taskAttribute) : 'No ' + taskAttribute.replace('_', ' ') + ' specified';
						$taskCard.find('span.' + taskAttribute).html(attr);
					}

					

					@foreach ([
						'status' => [
							'corrective_action_note'
						], 
						'priority'=> []
					] as $taskAttribute => $queryParams) 
					{
						let baseUrl = "{{ route('web.partials.' . $taskAttribute, [$taskAttribute => '__VALUE__']) }}";
						let taskAttributeValue = bodyData.get("{{ $taskAttribute }}") ? bodyData.get("{{ $taskAttribute }}") : '{{ $taskAttribute }} not specified';
						let url = baseUrl.replace('__VALUE__', encodeURIComponent(taskAttributeValue));
						url = new URL(url);
						@foreach ($queryParams as $queryParam) 
						{
							let queryParamValue = bodyData.get("{{ $queryParam }}");
							url.searchParams.append("{{ $queryParam }}", queryParamValue);
						}
						@endforeach

						await $taskCard.find('div.{{ $taskAttribute }}').load(url.toString());	
					}
					@endforeach
				}
				else {
					$modalAlert.load("{{ route('web.partials.alert', ['alertType' => 'danger', 'message' => 'Task could not be updated.']) }}");
				}
			}
		@endif
	});
</script>