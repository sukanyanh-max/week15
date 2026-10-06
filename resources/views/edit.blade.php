@extends('layouts.app')
@section('title', 'แก้ไขบทความ')
@section('content')
<h1 class="h2 mb-4">แก้ไขบทความ</h1>
<form method="POST" action="{{ route('author.update', $blog) }}" class="card card-body shadow-sm">
    @csrf @method('PUT')
    <label class="form-label" for="title">หัวข้อ</label>
    <input id="title" name="title" value="{{ old('title', $blog->title) }}" class="form-control @error('title') is-invalid @enderror">
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    <label class="form-label mt-3" for="content">เนื้อหา</label>
    <textarea id="content" name="content" rows="7" class="form-control @error('content') is-invalid @enderror">{{ old('content', $blog->content) }}</textarea>
    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
    <div class="form-check mt-3"><input type="hidden" name="status" value="0"><input id="status" class="form-check-input" type="checkbox" name="status" value="1" @checked(old('status', $blog->status))><label class="form-check-label" for="status">เผยแพร่</label></div>
    <div class="mt-4"><button class="btn btn-primary">บันทึกการแก้ไข</button> <a href="{{ route('author.blog') }}" class="btn btn-outline-secondary">ยกเลิก</a></div>
</form>
@endsection