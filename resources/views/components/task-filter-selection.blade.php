<div class="border rounded-2 pt-1 d-flex flex-row justify-content-around align-items-center w-100" style="height: 100px;">
	<div class="d-flex flex-row gap-1 align-items-center h-100 flex-shrink-1">
		@foreach ($statuses as $status)
			<x-task-status status="{{ $status}}">
				<label>
					<input type="checkbox" name="statuses[]" value="{{ $status }}">
					<span>
						{{ $status }}
					</span>
			</x-task-status>
		@endforeach
	</div>
	<div style="flex: 0 0 200px;">
		<x-dropdown 
			label="Assigned user" 
			name="user_id" 
			:options=$users 
			isOptionsArrayAssoc
		/>
	</div>
	<div class="d-flex flex-row gap-1 align-items-center h-100 flex-shrink-1">
		@foreach ($dueDateOptions as $dueDateOption)
			<x-task-due-date-option option="{{ $dueDateOption }}">
				<label>
					<input type="checkbox" name="due_date_options[]" value="{{ $dueDateOption }}">
					<span>
						{{ $dueDateOption}}
					</span>
			</x-task-due-date-option>
		@endforeach
	</div>

</div>