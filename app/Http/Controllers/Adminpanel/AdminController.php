<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\{Admin,Transaction,Transactionlog,User};
use App\Mail\Websitemail;


class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('admin.dashboard');
    // }

    public function dashboard()
    {
        $transactions=Transaction::all();
        return view('admin.dashboard',compact('transactions'));
    }

    public function login(Request $request)
    {

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin_dashboard');
        }
        return view('admin.login');
    }

    public function login_submit(Request $request)
    {

       // dd($request->all());

       $request->validate([
        'email'=>'required|email',
        'password'=>'required'
       ]);

       $check=$request->all();
       $data=[
        'email'=>$check['email'],
        'password'=>$check['password']
       ];

       if(Auth::guard('admin')->attempt($data))
       {
        return redirect()->route('admin_dashboard')->with('success','Login Succesfull');
       }else{
        return redirect()->route('admin_login')->with('error','Invalid Credentials');
       }



    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('success','Logout Successfull');
    }

    public function forget_password()
    {
        return view('admin.reset-password');
    }

    public function forget_password_submit(Request $request)
    {
       $request->validate([
        'email'=>'required|email'
       ]);

       $admin_data=Admin::where('email',$request->email)->first();
       if(!$admin_data){
        return redirect()->route('admin_forget_password')->with('error','Email does not exists');
       }

       $token=hash('sha256',time());
       $admin_data->token=$token;
       $admin_data->update();

       $resetlink=url('admin/reset-password/'.$token."/".$request->email);

       $subject="Password Reset";
       $body="Please click below to reset the password";
       $body.="<a  href='".$resetlink."'>Click Here to reset</a>";

       \Mail::to($request->email)->send(new Websitemail($subject,$body));
       return redirect()->route('admin_forget_password')->with('success','Password Link has been sent to Email address.');

    }



    public function reset_password($token,$email)
    {
        $admin_data=Admin::where('email',$email)->where('token',$token)->first();
        if(!$admin_data){
            return redirect()->route('admin_login')->with('error','Invalid Token or Email');
        }
        return view('admin.change-password',compact('token','email'));
    }

    public function reset_password_submit(Request $request)
    {

        $request->validate([
            'password'=>'required',
            'password_confirmation'=>'required|same:password'
        ]);
        $admin_data=Admin::where('email',$request->email)->where('token',$request->token)->first();
        $admin_data->password=Hash::make($request->password);
        $admin_data->token="";
        $admin_data->update();

        return redirect()->route('admin_login')->with('success',"Password Reset Successfull");

    }

    //transactions

    public function admin_approved_transactions()
    {

        $transactions=Transaction::where('status','Approved')->get();
        return view('admin.approved-transactions',compact('transactions'));
    }

    public function admin_rejected_transactions()
    {

        $transactions=Transaction::where('status','Rejected')->get();
        return view('admin.approved-transactions',compact('transactions'));
    }

    public function admin_pending_transactions()
    {
        $transactions=Transaction::where('status','Pending')->get();
        return view('admin.approved-transactions',compact('transactions'));
    }

    public function admin_transactions_approval_form($id)
    {
        $transactions=Transaction::where('id',$id)->first();
        return view('admin.vendorlist-form',compact('transactions'));
    }

    public function admin_transactions_approval_form_submit(Request $request)
    {
        ///dd($request->all());
        $request->validate([
            'transactionid'=>'required',
            'status'=>'required',
            'amount'=>'required',
            'userid'=>'required',
            'vendorid'=>'required'
        ]);

        //updating status
        $obj=Transaction::find($request->transactionid);
        $obj->status=$request->status;
        $obj->update();

        if($request->status=="Approved")
        {
            $logobj=new Transactionlog;
            $logobj->amount=$request->amount;
            $logobj->transactionid=$request->transactionid;
            $logobj->userid=$request->userid;
            $logobj->vendorid=$request->vendorid;
            $logobj->save();

            //updating wallet balance

            $vendor=User::find($request->vendorid);
            $vendor->wallet+=$request->amount;
            $vendor->update();

            $customer=User::find($request->userid);
            $customer->wallet-=$request->amount;
            $customer->update();
        }




        return redirect()->back()->with('success','Status updated successfully');

    }
}
