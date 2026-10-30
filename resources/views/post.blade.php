@extends('layouts.app')
@section('metaTags')
	<title>{{ $post->title }} - Post page</title>
@endsection

@section('content')
	<h1>Post page</h1>

	{!! $post->content !!}
@endsection
