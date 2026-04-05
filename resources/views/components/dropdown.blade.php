<select name="{{ $name }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror">
	<option value="">Select {{ strtolower($label) }}</option>
	@foreach ($options as $text)
		<option value="{{ $text }}" {{ old($name, $selected) == $text ? 'selected' : '' }}>
			{{ $text }}
		</option>
	@endforeach
</select>