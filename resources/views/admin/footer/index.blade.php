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
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered " id="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Copyright</th>
                                        <th class="text-center">Icons</th>
                                        <th class="text-center">Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <img  src="{{ $footer->image}}" width="60">
                                            </td>
                                            <td class="text-center">{{ $footer->title }}</td>
                                            <td class="text-center">{{ $footer->copyright }}</td>
                                            <td class="text-center">
                                                @foreach($footer->footerIcons as $icon)
                                                    <i class="{{$icon->icon}}"></i>
                                                @endforeach
                                            </td>


                                            <td class="text-center">
                                                <form class="d-inline-block">
                                                    <a href="javascript:void(0)" data-toggle="modal" data-id="{{$footer->id}}" data-route="footer/{{$footer->id}}"
                                                       data-target="#myModal" class="edit show-object-data btn btn-sm btn-main-green"><i class="fas fa-edit"></i> Edit</a>
                                                </form>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a class="btn btn-sm btn-main-yellow" href="{{ route('admin/footer-icon') }}">Footer icons</a>
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
        "responsive": true,"searching":false, "lengthChange": false, "autoWidth": false,"paging": false,
      });
    });


    $('#myModal').on('hidden.bs.modal', function () {
        var $image = $("#imageHolder");
            $("#imageHolder").removeAttr("src").replaceWith($image.clone());
            $(".submitForm")[0].reset();
        });
$(".edit").click(function(){
    var url = "{{ route('admin/footer/edit', ':id') }}";
            url = url.replace(':id', $(this).data('id'));
            $('.objectForm').attr('action', url);
        })

        function showData(returndata){
            $('#imageHolder').attr({ 'src': returndata.image });
            $('#title').val(returndata.title );
            $('#copyright').val(returndata.copyright );
            $('#color').val(returndata.color );
            $('#myModal').modal('show');


        }
        var loadFile = function(event) {
    var output = document.getElementById('imageHolder');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  </script>
@endsection

@section('modal-body')
    <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <form class="submitForm objectForm" data-success-msg="Successfully added a new category!" action="{{ route('admin/footer/store') }}">
        @csrf
        <div class="modal-body">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <img width="25%" style="max-height:25%" id="imageHolder"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="post_image">Image *</label>
                            <input type="file" id="image" class="form-control" name="image" onchange="loadFile(event)"/>
                        </div>
                    </div>
                </div>

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
                            <label class="col-form-label" for="copyright">Copyright *</label>
                            <input type="text" class="form-control" id="copyright" name="copyright" placeholder="Copyright..." >
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection

