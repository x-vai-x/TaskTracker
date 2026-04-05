@extends('layouts.app')
@section('content')

<header>
	<h1 class="text-center h-25 mt-3">Welcome!</h1>
</header>
<main>
	<div class="d-flex 
		flex-row 
		justify-content-center 
		align-items-end
		gap-3
		h-25"
	>
		@foreach ($menuOptions as $opt) 
			<a class="btn btn-primary"
			href="{{ route('web.' . $opt['webRouteName']) }}">
				{{ $opt['label'] }}
			</a>
		@endforeach
	</div>
</main>