<?php

namespace App\Http\Controllers\Vendorpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Transaction,Transactionlog};
use Auth;

class VendorController extends Controller
{
    public function index()
    {
        $transactions=Transaction::with('getvendors')->where('status','Approved')
             ->where('vendorid',Auth::id())->get();
            return view('vendor.dashboard',compact('transactions'));
    }

    public function vendor_approved_transactions()
    {

        $transactions=Transaction::with('getvendors')->where('status','Approved')
        ->where('vendorid',Auth::id())->get();
         // dd($transactions->toArray());
        return view('vendor.approved-transactions',compact('transactions'));
    }

    // public function vendor_rejected_transactions()
    // {

    //     $transactions=Transaction::with('getvendors')->where('status','Rejected')
    //     ->where('vendorid',Auth::id())->get();
    //      // dd($transactions->toArray());
    //     return view('vendor.approved-transactions',compact('transactions'));
    // }

    // public function vendor_pending_transactions()
    // {

    //     $transactions=Transaction::with('getvendors')->where('status','Pending')
    //     ->where('vendorid',Auth::id())->get();
    //         //dd($transactions->toArray());
    //     return view('vendor.approved-transactions',compact('transactions'));
    // }

    public function vendor_wallet_logs()
    {

        $transactions=Transactionlog::where('vendorid',Auth::id())->get();
        return view('vendor.wallet-logs',compact('transactions'));
    }
}
