@extends('layouts.admin')
@extends('layouts.modal')
@section('header', 'Footer')

@section('content')


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
                                    <h5 class="card-title mt-1 mb-1">Footer</h5>
                                </div>
                                <div class="col-6">
                                    <a id="add" class="btn btn-sm btn-main float-right ml-3" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                       <i class="fas fa-plus"></i> Add Icon
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered " id="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Icon</th>
                                        <th class="text-center">Link</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($objects as $object)
                                        <tr>

                                            <td class="text-center">{{ $object->id }}</td>
                                            <td class="text-center"><i class="{{$object->icon}}"></i> {{$object->icon}}</td>
                                            <td class="text-center">{{ $object->link }}</td>
                                            <td class="text-center">
                                                <form class="d-inline-block">
                                                    <a href="javascript:void(0)" data-toggle="modal" data-id="{{$object->id}}" data-route="footer-icon/{{$object->id}}"
                                                       data-target="#myModal" class="edit show-object-data btn btn-sm btn-main-green"><i class="fas fa-edit"></i> Edit</a>
                                                </form>
                                                <form class="deleteForm d-inline-block" action="{{ route('admin/footer-icon/delete', $object->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="delBtn catdel btn btn-sm btn-main-red" data-warning=" have to manually restore it."><i class="fas fa-trash-alt"></i> Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
    var url = "{{ route('admin/footer-icon/edit', ':id') }}";
            url = url.replace(':id', $(this).data('id'));
            $('.objectForm').attr('action', url);
        })

        function showData(returndata){
            $('#icon').val(returndata.icon );
            $('#link').val(returndata.link );

            $('#myModal').modal('show');


        }
  </script>
@endsection

@section('modal-body')
    <div class="modal-header">
        <h4 class="modal-title">Edit Footer icon</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <form class="submitForm objectForm" data-success-msg="Successfully added a new category!" action="{{ route('admin/footer-icon/store') }}">
        @csrf
        <div class="modal-body">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="icon">Icon *</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="FontAwesome Icon" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="link">Link *</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Link..." >
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection

