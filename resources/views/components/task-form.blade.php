
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
			Submit
		</button>
	</div>
</form>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#form-edit-task-{{ $task['id'] }}').on('submit', async function(event) {
			if ("<?php !str_starts_with($routeName, 'api.' )?>") {
				return;
			}
			event.preventDefault();
			await callAPI(this);
		});

		$('.modal').on('hidden.bs.modal', function () {
			$('.modal-alert').empty();
		});
		async function callAPI($formEl) {
			$modalAlert = $($formEl).prev('.modal-alert');
			let bodyData = new FormData($formEl);
			bodyData.append('id', "{{ Arr::get($task, 'id') }}");
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
			}
			else {
				$modalAlert.load("{{ route('web.partials.alert', ['alertType' => 'danger', 'message' => 'Task could not be updated.']) }}");
			}
		}
	});
</script>