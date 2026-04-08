@extends('layouts.app')
@section('content')

@if ($alertType)
	<div class="alert alert-{{ $alertType }}" role="alert">
		{{ $slot }}
	</div>
@endif