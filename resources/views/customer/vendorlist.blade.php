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
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>

                            <th>Phone</th>
                            <th>Email</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor )
                                <tr>
                                    <td><a href="{{ URL::to('vendorlist-form/'.$vendor->id) }}">{{ $vendor->name }} </a></td>

                                    <td>{{ $vendor->phone }}</td>
                                    <td>{{ $vendor->email }}</td>

                                </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>

                            <th>Phone</th>
                            <th>Email</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
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
