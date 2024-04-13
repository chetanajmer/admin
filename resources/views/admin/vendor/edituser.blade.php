@extends('layouts.app')
@section('content')

<div class="page-content">

<div class="card">
    <div class="card-body p-4">
            <h5 class="card-title">Update Vendor Details</h5>
            <hr/>
        <form class="row g-3" action="{{ route('vendorprofile.update',$vendor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-body mt-4">
                <div class="row">
                <div class="col-lg-6">
                        <div class="border border-3 p-4 rounded">
                        @if ($errors->any())
                            <div class="alert  border-0 border-start border-5 border-danger alert-dismissible fade show">
                            @foreach ($errors->all() as $error )
                                    <div>{{ $error }}</div>
                            @endforeach
                            </div>
                        @endif

                        @if (Session::has('success'))

                        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                            <div class="text-white">{{ Session::get('success') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if (Session::has('error'))

                        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show">
                            <div class="text-white">{{ Session::get('error') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <x-layouts.inputs title="Name" type="text" name="name" value="{{ $vendor->name }}" required="required" class="form-control"  placeholder="Enter Name"/>



                        <x-layouts.inputs title="Email" disabled="disabled" type="email" name="email" value="{{ $vendor->email }}" class="form-control"  placeholder="Enter Email"/>

                        <x-layouts.inputs title="Phone" disabled="disabled"  type="number" name="phone" value="{{ $vendor->phone }}" class="form-control"  placeholder="Enter phone number"/>



                        <x-layouts.inputs title="Shop Name" type="text" name="shopname" value="{{ $vendor->shopname }}" class="form-control"  placeholder="Enter Shop number"/>

                        <div class="mb-3">
                        <label  class="form-label">Shop Address</label>
                        <textarea name="shopaddress" class="form-control"  rows="3">{!! $vendor->shopaddress !!}</textarea>
                        </div>

                        <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </div>
                </div>


                </div><!--end row-->
            </div>
        </form>
    </div>
</div>
@endsection
