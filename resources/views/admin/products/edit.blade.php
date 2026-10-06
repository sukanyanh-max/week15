@extends('layouts.app')
@section('title', 'แก้ไขสินค้า')
@section('content')
<form method="POST" action="{{ route('admin.products.update', $product) }}">@csrf @method('PUT')
<input name="name" value="{{ old('name', $product->name) }}"><input name="price" value="{{ old('price', $product->price) }}">
<textarea name="description">{{ old('description', $product->description) }}</textarea><button>บันทึก</button></form>
@endsection
