@extends('layouts.app')
@section('metaTags')
	<title>Home page</title>
@endsection

@section('content')
	<h1>Home page</h1>

	<h2>List posts</h2>
	@foreach($posts as $post)
		<div style="border: 1px solid black;">
			<h3>{{ $post->title }}</h3>
			<a href="/posts/{{ $post->slug }}">Get more info</a>
		</div>
	@endforeach
	<a href="/posts">List all posts</a>

	<hr />

	<h2>Pages</h2>
	@foreach($pages as $page)
		<div style="border: 1px solid black;">
			<h3>{{ $page->title }}</h3>
			<a href="/{{ $page->slug }}">Get more info</a>
		</div>
	@endforeach

@endsection
