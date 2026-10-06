@extends('layouts.app')
@section('title', 'เขียนบทความ')
@section('content')
<h1>เขียนบทความ</h1>
<form method="POST" action="{{ route('admin.posts.store') }}">@csrf
<input name="title" class="form-control mb-2" value="{{ old('title') }}" placeholder="หัวข้อ">
<textarea id="content" name="content">{{ old('content') }}</textarea><button class="btn btn-primary mt-3">เผยแพร่</button></form>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>ClassicEditor.create(document.querySelector('#content')).catch(console.error);</script>
@endsection
