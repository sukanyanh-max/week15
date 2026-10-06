@extends('layouts.app')
@section('title', 'Admin Products')
@section('content')
<h1>Admin Products</h1>
<form method="POST" action="{{ route('admin.products.store') }}" class="card card-body mb-3">
    @csrf
    <input name="name" class="form-control mb-2" placeholder="ชื่อสินค้า">
    <input name="price" type="number" step="0.01" class="form-control mb-2" placeholder="ราคา">
    <textarea name="description" class="form-control mb-2" placeholder="รายละเอียด"></textarea>
    <button class="btn btn-primary">บันทึกด้วย Eloquent</button>
</form>
@foreach ($products as $product)<div>{{ $product->name }} — {{ $product->price }}</div>@endforeach
@endsection
