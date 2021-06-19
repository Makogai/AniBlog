@extends('layouts.admin')
@extends('layouts.modal')
@section('header', 'Featured Posts')

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
                                    <h5 class="card-title mt-1 mb-1">Featured posts table</h5>
                                </div>
                                <div class="col-6">
                                    <a id="add" class="btn btn-sm btn-main float-right ml-3" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                       <i class="fas fa-plus"></i> Add Featured Post
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
                                        <th class="text-center">Title </th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($objects as $object)
                                        <tr>
                                            <td class="text-center">{{ $object->post_id }}</td>

                                            <td class="text-center">{{ $object->post->title }}</td>

                                            <td class="text-center">
                                                {{-- <form class="d-inline-block">
                                                    <a href="javascript:void(0)" data-toggle="modal" data-id="{{$object->id}}" data-route="posts-featured/{{$object->id}}"
                                                       data-target="#myModal" class="edit show-object-data btn btn-sm btn-main-green"><i class="fas fa-edit"></i> Edit</a>
                                                </form> --}}

                                                <form class="deleteForm d-inline-block" action="{{ route('admin/posts-featured/delete', $object->id) }}" method="POST">
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

@section('script')
<script>

var s2 = $('#post_id').select2();

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
    var url = "{{ route('admin/posts-featured/edit', ':id') }}";
            url = url.replace(':id', $(this).data('id'));
            $('.objectForm').attr('action', url);
        })

        function showData(returndata){
            s2.val(returndata.post_id).trigger("change");
            $('#myModal').modal('show');


        }
        $(document).ready(function () {

$('.modal').on("hidden.bs.modal", function (e) { //fire on closing modal box
       if ($('.modal:visible').length) { // check whether parent modal is opend after child modal close
           $('body').addClass('modal-open'); // if open mean length is 1 then add a bootstrap css class to body of the page
       }
   });
});
  </script>
@endsection

@section('modal-body')
    <div class="modal-header">
        <h4 class="modal-title">Edit Featured Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <form class="submitForm objectForm" data-success-msg="Successfully added a new featured post!" action="{{ route('admin/posts-featured/store') }}">
        @csrf
        <div class="modal-body">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name">Post *</label>
                            <select  id="post_id" data-dropdown-css-class="select2-primary" data-placeholder="Select a post" name="post_id">
                                @foreach($posts as $post)
                                    <option value="{{$post->id}}">{{$post->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection

