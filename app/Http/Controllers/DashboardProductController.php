<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.product.index',[
            'product'=> Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.product.create',[
            'category'=> Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|unique:products',
            'nama' => 'required',
            'merk' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'photo' => 'image|file|max:2048'
        ]);

        
        if($request->file('photo')){
            $validatedData['photo'] = $request->file('photo')->store('product-img');
        }
        
        Product::create($validatedData);
        
        return redirect('/dashboard/product')->with('success', 'Produk baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.product.edit',[
            'product' => $product,
            'category'=> Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'nama' => 'required',
            'merk' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'photo' => 'image|file|max:2048'
        ];

        
        if($request->kode != $product->kode){
            $rules['kode'] = 'required|unique:products';
        }
        
        $validatedData =$request->validate($rules);
        
        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validatedData['photo'] = $request->file('photo')->store('product-img');
        }
        
        Product::where('id' , $product->id)
                ->update($validatedData);

        return redirect('/dashboard/product')->with('success', 'Produk berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->photo){
            Storage::delete($product->photo);
        }
        Product::destroy($product -> id);
        return redirect('/dashboard/product')->with('success', 'Produk telah dihapus');
    }
}
