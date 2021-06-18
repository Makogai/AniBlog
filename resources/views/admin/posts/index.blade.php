@extends('layouts.admin')
@extends('layouts.modal')

@section('content')

<div class="modal-header">
    <h4 class="modal-title">Posts</h4>
</div>

<style>


/* Important part */
.modal-dialog{
    max-width: 60%;
    overflow:visible;
}
.modal-body{
    overflow: visible;
}
.swal-overlay{
    z-index: 1000000000!important;
}
 td {
max-width: 20px; /* or whatever height you need to make them all consistent */
vertical-align: middle;
}
/* .table td, .table th{
    vertical-align: middle;
    max-height: 40px;
    overflow: hidden;
} */

</style>
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
                                    <h5 class="card-title mt-1 mb-1">Posts table</h5>
                                </div>
                                <div class="col-6">
                                    <a id="add" class="btn btn-sm btn-info float-right ml-3" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                        Add post
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered " id="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Content </th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">User</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($objects as $object)
                                        <tr>
                                            <td class="text-center">{{ $object->title }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onClick="contentFunc({{$object->id}})">
                                                    View content
                                                  </button>
                                            </td>
                                            <td class="text-center">{{ $object->category->name }}</td>
                                            <td class="text-center">{{ $object->user->name }}</td>
                                            <td class="text-center">
                                                <img class="rounded" src="{{ $object->post_image}}" width="60">
                                            </td>
                                            <td class="text-center">
                                                <form class="d-inline-block">
                                                    <a href="javascript:void(0)" data-toggle="modal" data-id="{{$object->id}}" data-route="posts/{{$object->id}}"
                                                       data-target="#myModal" class="edit show-object-data btn btn-sm btn-success">Edit</a>
                                                </form>

                                                <form class="deleteForm d-inline-block" action="{{ route('admin/posts/delete', $object->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="delBtn btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn btn-sm btn-warning" href="{{ route('admin/posts/deleted') }}">Deleted posts</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body content-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script>
    function contentFunc(returndata){
    // loader.removeClass("invisivle");
        var jqxhr = $.getJSON( "posts/"+returndata, function() {
            console.log( "success" );
            })
            .done(function(data) {
                $(".content-body").html(data.content);
                $("#exampleModalLongTitle").html(data.title)

            })
            .fail(function() {
                console.log( "error" );
            });

    }
    $(function () {
      $("#table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $('#myModal').on('hidden.bs.modal', function () {
            $(".submitForm")[0].reset();
            var $image = $("#imageHolder");
            $("#imageHolder").removeAttr("src").replaceWith($image.clone());
        });
$(".edit").click(function(){
    var url = "{{ route('admin/posts/edit', ':id') }}";
            url = url.replace(':id', $(this).data('id'));
            $('.objectForm').attr('action', url);
        })

        $(document).ready(function() {
              $('#summernote').summernote({dialogsInBody: true});
          });
        function showData(returndata){
            $('#imageHolder').attr({ 'src': returndata.post_image });
            $('#title').val(returndata.title );
            $('#summernote').summernote('code', returndata.content,{dialogsInBody: true});
            $('#category_id').val(returndata.category_id );
            $('#myModal').modal('show');


        }
        var loadFile = function(event) {
    var output = document.getElementById('imageHolder');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  $(document).on("show.bs.modal", '.modal', function (event) {
    console.log("Global show.bs.modal fire");
    var zIndex = 100000 + (10 * $(".modal:visible").length);
    $(this).css("z-index", zIndex);
    setTimeout(function () {
        $(".modal-backdrop").not(".modal-stack").first().css("z-index", zIndex - 1).addClass("modal-stack");
    }, 0);
}).on("hidden.bs.modal", '.modal', function (event) {
    console.log("Global hidden.bs.modal fire");
    $(".modal:visible").length && $("body").addClass("modal-open");
});
$(document).on('inserted.bs.tooltip', function (event) {
    console.log("Global show.bs.tooltip fire");
    var zIndex = 100000 + (10 * $(".modal:visible").length);
    var tooltipId = $(event.target).attr("aria-describedby");
    $("#" + tooltipId).css("z-index", zIndex);
});
$(document).on('inserted.bs.popover', function (event) {
    console.log("Global inserted.bs.popover fire");
    var zIndex = 100000 + (10 * $(".modal:visible").length);
    var popoverId = $(event.target).attr("aria-describedby");
    $("#" + popoverId).css("z-index", zIndex);
});
  </script>
@endsection

@section('modal-body')
    <div class="modal-header">
        <h4 class="modal-title">Edit Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <form class="submitForm objectForm" action="{{ route('admin/posts/store') }}">
        @csrf
        <div class="modal-body">
            <div class="container">



                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="title">Title *</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="content">Content *</label>
                            {{-- <tetxarea class="form-control summernote" id="content" name="content" placeholder="Content" ></tetxarea> --}}
                            <textarea id="summernote" name="content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="category_id">Category *</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-12">
                        <img width="25%" style="max-height:25%" id="imageHolder"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="post_image">Image *</label>
                            <input type="file" id="post_image" class="form-control" name="post_image" onchange="loadFile(event)"/>
                        </div>
                    </div>
                </div>





            </div>
        </div>

@endsection

