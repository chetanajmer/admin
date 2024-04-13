<?php

namespace App\Http\Controllers\Customerpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User,Transaction,Transactionlog};
use Auth;
class CustomerController extends Controller
{
   public function index()
    {
         $transactions=Transaction::with('getvendors')
             ->where('userid',Auth::id())->get();
            return view('customer.dashboard',compact('transactions'));
    }

    public function vendorlist()
    {
        $vendors=User::where('role','vendor')->get();
        return view('customer.vendorlist',compact('vendors'));
    }

    public function vendorlist_form($id)
    {

        $vendor=User::where('id',$id)->first();
        return view('customer.vendorlist-form',compact('vendor'));
    }

    public function vendorlist_form_submit(Request $request)
    {
        $request->validate([

            'vendorid'=>'required',
            'amount'=>'required|numeric'

        ]);

        $obj=new Transaction;
        $obj->vendorid=$request->vendorid;
        $obj->userid=Auth::id();
        $obj->amount=$request->amount;
        //$obj->status="Pending";
        $obj->save();
        return redirect()->back()->with('success','Transaction Placed Successfully!');


    }

    public function approved_transactions()
    {

        $transactions=Transaction::with('getusers')->where('status','Approved')
        ->where('userid',Auth::id())->get();
         // dd($transactions->toArray());
        return view('customer.approved-transactions',compact('transactions'));
    }

    public function rejected_transactions()
    {

        $transactions=Transaction::with('getusers')->where('status','Rejected')
        ->where('userid',Auth::id())->get();
         // dd($transactions->toArray());
        return view('customer.approved-transactions',compact('transactions'));
    }

    public function pending_transactions()
    {

        $transactions=Transaction::with('getusers')->where('status','Pending')
        ->where('userid',Auth::id())->get();
         // dd($transactions->toArray());
        return view('customer.approved-transactions',compact('transactions'));
    }

    public function customer_wallet_logs()
    {

        $transactions=Transactionlog::where('userid',Auth::id())->get();
        return view('customer.wallet-logs',compact('transactions'));
    }
}
