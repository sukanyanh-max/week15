<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', ['products' => Product::query()->latest()->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Product::create($request->validate([
            'name' => ['required', 'max:255'], 'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable'],
        ]));
        return back()->with('status', 'บันทึกสินค้าด้วย Eloquent แล้ว');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->update($request->validate([
            'name' => ['required', 'max:255'], 'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable'],
        ]));
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return back();
    }
}
