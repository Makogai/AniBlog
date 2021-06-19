@extends('layouts.admin')
@extends('layouts.modal')

@section('content')

<div class="modal-header">
    <h4 class="modal-title">Categories</h4>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container-fluid ">
        <div class="dashboard-content">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    @include('partials.success')

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title mt-1 mb-1">Category table</h5>
                                </div>
                                <div class="col-6">
                                    <a id="add" class="btn btn-sm btn-main float-right ml-3" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                       <i class="fas fa-plus"></i> Add Category
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered " id="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Name </th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($objects as $object)
                                        <tr>
                                            <td class="text-center">{{ $object->id }}</td>

                                            <td class="text-center">{{ $object->name }}</td>

                                            <td class="text-center">
                                                <form class="d-inline-block">
                                                    <a href="javascript:void(0)" data-toggle="modal" data-id="{{$object->id}}" data-route="category/{{$object->id}}"
                                                       data-target="#myModal" class="edit show-object-data btn btn-sm btn-main-green"><i class="fas fa-edit"></i> Edit</a>
                                                </form>

                                                <form class="deleteForm d-inline-block" action="{{ route('admin/category/delete', $object->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="delBtn catdel btn btn-sm btn-main-red" data-warning="Deleting this will set all posts with this category to None category. Afterwards, you'll have to manually restore it."><i class="fas fa-trash-alt"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn btn-sm btn-main-yellow" href="{{ route('admin/category/deleted') }}">Deleted posts</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

@section('script')
<script>
    $(function () {
      $("#table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $('#myModal').on('hidden.bs.modal', function () {
            $(".submitForm")[0].reset();
        });
$(".edit").click(function(){
    var url = "{{ route('admin/category/edit', ':id') }}";
            url = url.replace(':id', $(this).data('id'));
            $('.objectForm').attr('action', url);
        })

        function showData(returndata){
            $('#name').val(returndata.name );
            $('#myModal').modal('show');


        }

  </script>
@endsection

@section('modal-body')
    <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <form class="submitForm objectForm" data-success-msg="Successfully added a new category!" action="{{ route('admin/category/store') }}">
        @csrf
        <div class="modal-body">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Category name" >
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection

