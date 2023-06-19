<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Profile;
use App\Models\ShopCart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function beforeCheckout(){
        $userId = Auth::user()->id;

        $profiles = Profile::where('user_id','=',Auth::user()->id)->get();
        $profile = $profiles[0];
        $shopcart = ShopCart::where('user_id','=',$userId)->get();

        $total_payment = 0;
        foreach($shopcart as $shopitem){
            $getPrice = $shopitem->fkProduct->price;
            $total_payment += $shopitem->quantity*$getPrice;
        }

        // dd($total_payment);

        return view('product.checkout',compact('profile','total_payment','shopcart'));
    }

    public function checkout(Request $request){
        $userId = Auth::user()->id;
        $shopcart = ShopCart::where('user_id','=',$userId)->get();
        
        
        // handling photo
        $file = $request->file('photoTranfer');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/tranfer',$filename);
        $filepath = str_replace('public/','',$path);
        // create data transactions
        try{
            $transaction_data = [
                'user_id'=> $userId,
                'total_payment' => $request->totalPayment,
                'delivery_service_id' =>$request->delivery,
                'address' => $request->address,
                'photo_tranfer' => $filepath
                
    
            ];
    
            $transaction =Transaction::create($transaction_data);
    
            foreach($shopcart as $shopitem){
                try{
                    DetailTransaction::create([
                        'product_id' => $shopitem->product_id,
                        'quantity' => $shopitem->quantity,
                        'transaction_id' => $transaction->id
                    ]);

                    $shopitem->delete();
                }catch(\Exception $e){

                }
                
                
                
            }

            Alert::success('Berhasil','Pesanan berhasil ditambahkan');
        }catch(\Exception $e){
            Alert::error('Gagal', 'Gagal melakukan pemesanan');
        }

        return redirect()->back();

    }

    public function index(){
        $transactions = Transaction::all();

        return view('admin.transaksi.index',compact('transactions'));
    }

    public function detail($id){
        $detail = DetailTransaction::where('transaction_id','=',$id)->get();
        $transaction = Transaction::find($id);
        
        
        return view('admin.transaksi.detail',compact('detail','transaction'));
    }

    public function updateStatus($id){
        $transaction = Transaction::find($id);
        // dd($transaction);
        try{
            $transaction->update(['status'=> 'paid']);
            Alert::success('Berhasil','Konfirmasi berhasil');
        }catch(\Exception $e){
            Alert::error('Gagal','Konfirmasi gagal');
        }

        return redirect()->route('transaksi.index');

    }
}
