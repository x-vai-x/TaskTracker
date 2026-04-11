<x-task-status status="{{ $status }}">
	<div>
		Status: 
		{{ $status}}
	</div>
	@if ($status == 'NON COMPLIANT')
		<div class="bg-white">
			Corrective action note:
			{{ $correctiveActionNote }}
		</div>
	@endif
</x-task-status>