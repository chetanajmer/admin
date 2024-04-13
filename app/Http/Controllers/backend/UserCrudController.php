<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Hash;

class UserCrudController extends Controller
{
    public function index()
    {
        $vendors=User::where('role','customer')->get();
        return view('admin.user.listuser',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.user.createuser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'min:10','max:10','not_regex:/[a-z]/','unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //'shopname'=>['required', 'string', 'max:255'],
        ]);

        $obj=new User;
        $obj->name=$request->name;
        $obj->phone=$request->phone;
        $obj->role='customer';
        $obj->status='active';
        $obj->email=$request->email;
        $obj->password=Hash::make($request->password);
        //$obj->shopname=$request->shopname;
        //$obj->shopaddress=$request->shopaddress;
        $obj->wallet=rand(10000,40000);
        $obj->save();

        return redirect()->back()->with('success',"Added Successfully!");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendor=User::find($id);
        return view('admin.user.edituser',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $request->validate([
            'name'=>'required',
            //'shopname'=>'required',

        ]);

        $obj=User::find($id);
        $obj->name=$request->name;
       // $obj->shopname=$request->shopname;
       // $obj->shopaddress=$request->shopaddress;
        $obj->update();

        return redirect()->back()->with('success',"Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //echo $request->myid;
        $obj = User::find($id);
        $obj->delete();
        return redirect()->back()->with('success',"Item Deleted from the list");
    }
}
