@extends('layouts.app')
@section('title', 'เขียนบทความ')
@section('content')
<h1 class="h2 mb-4">เขียนบทความใหม่</h1>
<form method="POST" action="{{ route('author.insert') }}" class="card card-body shadow-sm">
    @csrf
    <label class="form-label" for="title">หัวข้อ</label>
    <input id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    <label class="form-label mt-3" for="content">เนื้อหา</label>
    <textarea id="content" name="content" rows="7" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
    <div class="form-check mt-3"><input type="hidden" name="status" value="0"><input id="status" class="form-check-input" type="checkbox" name="status" value="1" @checked(old('status', true))><label class="form-check-label" for="status">เผยแพร่ทันที</label></div>
    <div class="mt-4"><button class="btn btn-primary">บันทึก</button> <a href="{{ route('author.blog') }}" class="btn btn-outline-secondary">บทความทั้งหมด</a></div>
</form>
@endsection