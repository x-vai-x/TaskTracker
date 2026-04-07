
@extends('layouts.app')
@section('content')

<header>
	<h1 class="text-center">New Task</h1>
</header>
<main>
	<div>
		<x-task-form routeName="web.tasks.create" />
	</div>
</main>