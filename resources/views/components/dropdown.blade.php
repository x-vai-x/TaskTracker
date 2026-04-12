<select name="{{ $name }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror">
	<option value="">Select {{ strtolower($label) }}</option>
	@foreach ($options as $key => $text)
		<option value="{{ $isOptionsArrayAssoc ? $key : $text }}" {{ $selected == (is_string($text) ? $text : $text->value) ? 'selected' : '' }}>
			{{ $text }}
		</option>
	@endforeach
</select>