@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="card">

        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">

                <div class="ms-auto"><a href="{{ route('userprofile.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add User</a>
                </div>
             </div>
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
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $vendor )
                                <tr>
                                    <td>{{ $vendor->name }}</td>

                                    <td>{{ $vendor->phone }}</td>
                                    <td>{{ $vendor->email }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ URL::to('/admin/userprofile/'. $vendor->id . '/edit') }}" class=""><i class="bx bxs-edit"></i></a>

                                            <form class="row g-3" action="{{route('vendorprofile.destroy',$vendor->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('userprofile.destroy',$vendor->id)}}" onclick="event.preventDefault();  this.closest('form').submit();">
                                                    <i class="bx bxs-trash"></i>
                                                </a>
                                            </form>


                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>

                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>
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
