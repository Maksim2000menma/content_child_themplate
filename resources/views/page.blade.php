@extends('layouts.app')
@section('metaTags')
	<title>{{ $page->title }} - Page page</title>
@endsection

@section('content')
	<h1>Page page</h1>

	{!! $page->content !!}
@endsection
