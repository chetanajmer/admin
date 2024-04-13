<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{User,Transaction,Transactionlog};
use Auth;


class DashboardController extends Controller
{
    public function dashboard(){

        if(Auth::user()->role=='customer'){

            return redirect()->route('customer.dashboard');

        }elseif(Auth::user()->role=="vendor"){

            return redirect()->route('vendor.dashboard');
        }

        return view('dashboard');
    }
}
