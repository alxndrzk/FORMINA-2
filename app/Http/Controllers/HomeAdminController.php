<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index()
    {
        $userCount = User::where('role_id','=',2)->count();
        $count = Transaction::all()->count();
        $saldo = 0;
        $getPayment = Transaction::where('status','=','paid')->get();
        foreach($getPayment as $payment){
            $saldo += $payment->total_payment;
        }
        // dd($userCoutn);
        // dd($count);
        return view('admin.index', compact('count','saldo','userCount'));
    }

    
}
