
@extends('layouts.app')
@section('content')

<header>
	<h1 class="text-center">New Task</h1>
</header>
<main>
	<div>
		<form method="POST" action="{{ route('web.tasks.create') }}">
			<div class="mb-3">
                <label class="form-label">Title</label>
				<input 
					type="text" 
					name="title" 
					class="form-control @error('title') is-invalid @enderror"
					required
					maxlength="255"
					placeholder="Enter task title"
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
				>{{ old('description') }}</textarea>

				@error('description')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label class="form-label">Status</label>
				<select 
					name="status" 
					class="form-select @error('status') is-invalid @enderror"
				>
					<option value="">Select status</option>
					<option value="PENDING">PENDING</option>
					<option value="NON COMPLIANT">NON COMPLIANT</option>
					<option value="COMPLETED">COMPLETED</option>
				</select>

				@error('status')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
			<div class="mb-3">
				<label class="form-label">Priority</label>
				<select 
					name="status" 
					class="form-select @error('priority') is-invalid @enderror"
				>
					<option value="">Select priority</option>
					<option value="LOW">LOW</option>
					<option value="MEDIUM">MEDIUM</option>
					<option value="HIGH">HIGH</option>
				</select>

				@error('priority')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
				@enderror
			</div>
		</form>
	</div>
</main>