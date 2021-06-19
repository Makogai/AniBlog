@extends('layouts.admin')
@extends('layouts.modal')

@section('header', 'Posts')
@section('content')


<style>


/* Important part */
/* .modal-dialog{
    width: 60%
    overflow:visible;
} */
/* .modal-body{
    overflow: visible;
}
.swal-overlay{
    z-index: 1000000000!important;
 }
 select{
     z-index: 10000000000000000000!important;
 } */
 /* .modal {
  overflow-y:auto;
} */

.note-group-select-from-files { display: none; }
/* td {
max-width: 20px;
vertical-align: middle;
} */
.table td, .table th{
    vertical-align: middle;
}

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
                                    <a id="add" class="btn btn-sm btn-main float-right ml-3" href="javascript:void(0)" data-toggle="modal" data-target="#myModal">
                                       <i class="fas fa-plus"></i> Add post
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
                                        <th class="text-center">Categories</th>
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
                                                <button class="btn btn-main" data-toggle="modal" data-target="#exampleModalCenter" onClick="contentFunc({{$object->id}})">
                                                    View content
                                                  </button>
                                            </td>
                                            <td class="text-center">
                                                @isset($object->categories)
                                                @foreach($object->categories as $category)
                                                   {{ ($category->category) ? $category->category->name : '' }} <br>
                                                @endforeach
                                            @endisset
                                            </td>
                                            <td class="text-center">{{ $object->user->name }}</td>
                                            <td class="text-center">
                                                <img class="rounded" src="{{ $object->post_image}}" width="60">
                                            </td>
                                            <td class="text-center">
                                                <form class="d-inline-block">
                                                    <a href="javascript:void(0)" data-toggle="modal" data-id="{{$object->id}}" data-route="posts/{{$object->id}}"
                                                       data-target="#myModal" class="edit show-object-data btn btn-sm btn-main-green"><i class="fas fa-edit"></i> Edit</a>
                                                </form>

                                                <form class="deleteForm d-inline-block" action="{{ route('admin/posts/delete', $object->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="delBtn btn btn-sm btn-main-red" data-warning="Once deleted, you can always restore it in Deleted Posts."><i class="fas fa-trash-alt"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn btn-sm btn-main-yellow" href="{{ route('admin/posts/deleted') }}">Deleted posts</a>
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

var s2 = $('#category_id').select2();
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
            $('#myModal').modal('show');
            let vals = [];
            returndata.categories.forEach((element) => {
            $("#category_id option[value='" + element.category_id + "']").prop("selected", true);
            vals.push(element.category_id);
        });
        s2.val(vals).trigger("change");

        }
        var loadFile = function(event) {
    var output = document.getElementById('imageHolder');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
//   $(document).on("show.bs.modal", '.modal', function (event) {
//     console.log("Global show.bs.modal fire");
//     var zIndex = 100000 + (10 * $(".modal:visible").length);
//     $(this).css("z-index", zIndex);
//     setTimeout(function () {
//         $(".modal-backdrop").not(".modal-stack").first().css("z-index", zIndex - 1).addClass("modal-stack");
//     }, 0);
// }).on("hidden.bs.modal", '.modal', function (event) {
//     console.log("Global hidden.bs.modal fire");
//     $(".modal:visible").length && $("body").addClass("modal-open");
// });
// $(document).on('inserted.bs.tooltip', function (event) {
//     console.log("Global show.bs.tooltip fire");
//     var zIndex = 100000 + (10 * $(".modal:visible").length);
//     var tooltipId = $(event.target).attr("aria-describedby");
//     $("#" + tooltipId).css("z-index", zIndex);
// });
// $(document).on('inserted.bs.popover', function (event) {
//     console.log("Global inserted.bs.popover fire");
//     var zIndex = 100000 + (10 * $(".modal:visible").length);
//     var popoverId = $(event.target).attr("aria-describedby");
//     $("#" + popoverId).css("z-index", zIndex);
// });
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
                            <select  id="category_id" data-dropdown-css-class="select2-primary" data-placeholder="Select a Category" name="categories[]" multiple="multiple">
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

