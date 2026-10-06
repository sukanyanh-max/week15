@extends('layouts.app')
@section('title', 'บทความล่าสุด')
@section('content')
<h1>บทความล่าสุด</h1>
@forelse ($posts as $post)<article><h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2></article>
@empty <p>ไม่มีบทความ</p>@endforelse
@endsection
