@if ($alertType)
	<div class="alert alert-{{ $alertType }}" role="alert">
		{{ $slot }}
	</div>
@else
	{{ $slot }}
@endif