@extends('layouts.app')
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
            <form class="row g-3" action="{{ route('admin_transactions_approval_form_submit') }}" method="POST"> @csrf
                <div class="col-md-4">
                    <div class="card-body">
                        <h4 class="card-title">{{ $transactions->getusers['shopname'] }}</h4>
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
                            <span class="price"><strong>Contact Person:</strong></span>
                            <span class="text-muted">{{ $transactions->getusers['name'] }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="price"><strong>Contact Number:</strong></span>
                            <span class="text-muted">{{ $transactions->getusers['phone'] }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="price"><strong>Transaction Submitted by:</strong></span>
                            <span class="text-muted">{{ $transactions->getvendors['name'] }}</span>
                        </div>
                        <div class="mb-3">
                            <p class="card-text fs-6"><strong>Shop Address:</strong>{!! $transactions->getusers['shopaddress'] !!}</p>
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
                                        <input type="hidden" name="vendorid" value="{{ $transactions->getusers['id'] }}" >
                                        <input type="hidden" name="userid" value="{{ $transactions->getvendors['id'] }}" >
                                        <input type="hidden" name="transactionid" value="{{ $transactions->id}}" >
                                        <input type="number" readonly="readonly" value="{{ $transactions->amount }}" name="amount" class="form-control" placeholder="Eg: 2000">

                                </div>

                            </div>
                        </div>
                        <div class="mb-4">
									<label for="single-select-field" class="form-label">Change Status</label>
									<select class="form-select" name="status" id="single-select-field" data-placeholder="Choose one thing">
										<option value="">Select</option>
                                        @if($transactions->getvendors['wallet']>=$transactions->amount)
                                        <option @if($transactions->status=="Approved") selected @endif value="Approved">Approved</option>
                                        @endif
                                        <option @if($transactions->status=="Rejected") selected  @endif

                                        value="Rejected">Rejected</option>

                                        <option @if($transactions->status=="Pending") selected  @endif

                                        value="Pending">Pending</option>

									</select>
								</div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary"><span class="text">Update Transaction</span> <i class='bx bxs-cart-alt'></i></button>
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
