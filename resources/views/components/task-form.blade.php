<form method="POST" action="{{ route('web.tasks.' . $method) }}">
	<div class="mb-3">
		<label class="form-label">Title</label>
		<input 
			type="text" 
			name="title" 
			class="form-control @error('title') is-invalid @enderror"
			required
			maxlength="255"
			placeholder="Enter task title"
			value="{{ $title }}"
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
		>{{ $description }}</textarea>

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
			selected="{{ $status }}"
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
			selected="{{ $priority }}"
		/>

		@error('priority')
			<div class="invalid-feedback">
				{{ $message }}
			</div>
		@enderror
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-primary">
			Submit
		</button>
	</div>
</form>