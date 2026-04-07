<select name="{{ $name }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror">
	<option value="">Select {{ strtolower($label) }}</option>
	@foreach ($options as $text)
		<option value="{{ $text }}" {{ $selected == $text ? 'selected' : '' }}>
			{{ $text }}
		</option>
	@endforeach
</select>