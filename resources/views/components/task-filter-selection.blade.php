<div class="border rounded-2 p-2 d-flex flex-row gap-3">
	<div class="d-flex flex-row gap-3">
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
	<div class="w-25"></div>
	<div>
		<x-dropdown 
			label="Assigned user" 
			name="user_id" 
			:options=$users 
			isOptionsArrayAssoc
		/>
	</div>
</div>