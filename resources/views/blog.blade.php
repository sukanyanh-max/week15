@extends('layouts.app')
@section('title', 'บทความของฉัน')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h2 mb-1">บทความของฉัน</h1>
        <p class="text-muted mb-0">จัดการข้อมูลด้วย Eloquent Model</p>
    </div>
    <a href="{{ route('author.create') }}" class="btn btn-primary">เขียนบทความ</a>
</div>
@if (session('status')) <div class="alert alert-success">{{ session('status') }}</div> @endif
<div class="table-responsive">
<table class="table table-striped table-hover align-middle">
    <thead><tr><th>หัวข้อ</th><th>สถานะ</th><th class="text-end">จัดการ</th></tr></thead>
    <tbody>
    @forelse ($blogs as $blog)
        <tr>
            <td><strong>{{ $blog->title }}</strong><div class="small text-muted">{{ \Illuminate\Support\Str::limit($blog->content, 100) }}</div></td>
            <td><span class="badge {{ $blog->status ? 'text-bg-success' : 'text-bg-secondary' }}">{{ $blog->status ? 'เผยแพร่' : 'ฉบับร่าง' }}</span></td>
            <td class="text-end">
                <a href="{{ route('author.edit', $blog) }}" class="btn btn-sm btn-outline-primary">แก้ไข</a>
                <form method="POST" action="{{ route('author.change', $blog) }}" class="d-inline">@csrf @method('PATCH')<button class="btn btn-sm btn-outline-warning">เปลี่ยนสถานะ</button></form>
                <form method="POST" action="{{ route('author.delete', $blog) }}" class="d-inline" onsubmit="return confirm('ยืนยันการลบ?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">ลบ</button></form>
            </td>
        </tr>
    @empty
        <tr><td colspan="3" class="text-center text-muted py-4">ยังไม่มีบทความ</td></tr>
    @endforelse
    </tbody>
</table>
</div>
{{ $blogs->links() }}
@endsection