<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {

        $products = Product::get();


        return view('admin.products.index', compact('products'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);


        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());


        Product::create([
            'image'         => $image->hashName(),
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);


        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {

        $product = Product::findOrFail($id);


        return view('admin.products.show', compact('product'));
    }

    public function edit(string $id): View
    {

        $product = Product::findOrFail($id);


        return view('admin.products.edit', compact('product'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);


        $product = Product::findOrFail($id);


        if ($request->hasFile('image')) {


            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());


            Storage::delete('public/products/' . $product->image);


            $product->update([
                'image'         => $image->hashName(),
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        } else {


            $product->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock
            ]);
        }


        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {

        $product = Product::findOrFail($id);


        Storage::delete('public/products/' . $product->image);


        $product->delete();


        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
