@extends('layouts.app')
@section('content')

<div class="page-content">
				<div class="row row-cols-1 row-cols-lg-3">

                    @php
                        $transaction=\App\Models\Transaction::all();
                        $vendors=\App\Models\User::where('role','vendor')->get();
                        $users=\App\Models\User::where('role','customer')->get();
                    @endphp
                    <x-layouts.dashboardcards title="Users" :total=count($users) description="Total Active/Inactive Users"
                     colorclass="bg-gradient-cosmic" icon="bx bx-user"  />

                     <x-layouts.dashboardcards title="Vendors" :total=count($vendors) description="Total Active/Inactive Vendors"
                     colorclass="bg-gradient-burning " icon="bx bx-user-pin" />

                     <x-layouts.dashboardcards title="Transactions" :total=count($transaction) description="Total Approved/Rejected Transaction"
                     colorclass="bg-gradient-lush" icon="bx bx-cart-alt" />


				</div>
				<!--end row-->
                <h4>Latest Transactions</h4>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Raised on </th>
                            <th>Updated on</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item )
                                <tr>


                                    <td>{{ $item->getvendors['name'] }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                    <td>{{ $item->updated_at->diffForHumans() }}</td>

                                </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Customer</th>
                            <th>Amount</th>
                             <th>Status</th>
                            <th>Raised on </th>
                            <th>Updated on</th>
                        </tr>
                    </tfoot>
                </table>

</div>
@push('custom-scripts')
    <script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
@endpush
@endsection
