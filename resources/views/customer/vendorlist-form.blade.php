@extends('layouts.customerlayout')
@section('content')
<div class="page-content">
    <div class="card">

        <div class="card-body">

            <div class="table-responsive">


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

            </div>
            <form class="row g-3" action="{{ route('customer_vendorlist_form_submit') }}" method="POST"> @csrf
                <div class="col-md-4">
                    <div class="card-body">
                        <h4 class="card-title">{{ $vendor->shopname }}</h4>
                        <div class="d-flex gap-3 py-3">
                            <div class="cursor-pointer">
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                            </div>

                            <div class="text-success"><i class='bx bxs-cart-alt align-middle'></i> 134 orders</div>

                        </div>
                        <div class="mb-3">
                            <span class="price">Contact Person:</span>
                            <span class="text-muted">{{ $vendor->name }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="price">Contact number:</span>
                            <span class="text-muted">{{ $vendor->phone }}</span>
                        </div>
                        <div class="mb-3">
                            <p class="card-text fs-6">{{ $vendor->shopaddress }}</p>
                        </div>
                        @if ($errors->any())
                            <div class="alert  border-0 border-start border-5 border-danger alert-dismissible fade show">
                            @foreach ($errors->all() as $error )
                                    <div>{{ $error }}</div>
                            @endforeach
                            </div>
                        @endif
                        <div class="mb-3">

                            <div class="col ">
                                <label class="form-label">Enter Amount</label>
                                <div class="input-group input-spinner">
                                        <input type="hidden" name="vendorid" value="{{ $vendor->id }}" >
                                        <input type="number" required="required" name="amount" class="form-control" placeholder="Eg: 2000">

                                </div>

                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary"><span class="text">Submit Transaction</span> <i class='bx bxs-cart-alt'></i></button>
                        </div>
                    </div>
                </div>
            </form>


    </div>
</div>
@push('custom-scripts')
    <script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
@endpush
@endsection
