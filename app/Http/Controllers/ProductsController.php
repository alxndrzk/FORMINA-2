<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Product::exists()){
            $products = Product::all();
        }else{
            $products = null;
        }
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $adminId = Auth::user()->id;
        
        // handling photo
        $file = $request->file('photo');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/product',$filename);
        $path = str_replace('public/','',$path);
        $data = [
            'user_id' => $adminId,
            'product_name' => $request->produkName,
            'stock' => $request->stock,
            'price' => $request->price,
            'photo' => $path,
            'description' => $request->description
        ];

        try{
            Product::create($data);
            Alert::success('Berhasil', 'Produk Berhasil ditambahkan');
            return redirect()->route('product.index');
        }catch(\Exception $th){
            dd($th);
            Alert::error('Gagal','Produk Gagal Ditambahkan');
            return redirect()->route('product.index');

        }
        

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product.detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $adminId = Auth::id();
        $product = Product::find($id);
        if ($request->hasFile('photo')){
            $file = $request->file('photo');
            $path = $file->storeAs('public/'.$product->photo);
            $path = str_replace('public/','',$path);

            $product->update([
                'photo' => $path,
                'user_id' => $adminId,
                'stock' => $request->stock,
                'product_name' => $request->produkName,
                'price' => $request->price,
                'description' => $request->description

            ]);

        }else{
            $product->update([
                'user_id' => $adminId,
                'stock' => $request->stock,
                'product_name' => $request->produkName,
                'price' => $request->price,
                'description' => $request->description

            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $product = Product::find($id);
            $product->delete();
            Alert::success('Berhasil','Produk berhasil dihapus');
        }catch(\Exception $e){
            Alert::error('Gagal','Produk gagal dihapus');
        }

        return redirect()->back();

    }
}
