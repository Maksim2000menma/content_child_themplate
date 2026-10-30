@extends('layouts.app')
@section('metaTags')
	<title>List posts</title>
@endsection

@section('content')
	<h1>Posts page</h1>

	<h2>List of posts</h2>
	@foreach($posts as $post)
		<div style="border: 1px solid black;">
			<h3>{{ $post->title }}</h3>
			<a href="/posts/{{ $post->slug }}">Get more info</a>
		</div>
	@endforeach
	
	{!! $posts->links() !!}
@endsection
