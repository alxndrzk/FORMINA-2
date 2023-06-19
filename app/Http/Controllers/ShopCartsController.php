<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ShopCartsController extends Controller
{

    public function index(){
        $userId = Auth::user()->id;
        $carts = ShopCart::where('user_id','=',$userId)->get();
        // dd($carts);
        
        return view('product.cart',compact('carts'));
    }

    public function store(Request $request){
        $userId = Auth::user()->id;
        $product = ShopCart::where([['user_id','=',$userId],['product_id','=',$request->productId]])->exists();
        if($product == true){
            Alert::error('Gagal','Produk sudah ada dikeranjang');
            return redirect()->route('product.detail',$request->productId);
        }else{
            $data = [
                'quantity' => $request->quantity,
                'user_id' => $userId,
                'product_id' => $request->productId
            ];
    
            try{
                ShopCart::create($data);
                Alert::success('Berhasil','Produk berhasil dimasukan keranjang');
            return redirect()->route('product.detail',$request->productId);

            }catch(\Exception $e){
                Alert::error('Gagal','Gagal menambahkan');
            return redirect()->route('product.detail',$request->productId);

            }
        }
        
    }

    public function destroy($id){
        $shopcart = ShopCart::find($id);

        $shopcart->delete();

        return redirect()->route('cart.index');
    }

    public function update(Request $request){
        $cart = ShopCart::find($request->cartId);

        $cart->quantity = $request->quantity;
        $cart->save();
        return redirect()->route('cart.index');
    }
}
