@extends('layouts.admin')
@extends('layouts.modal')



@section('content')
<meta name="_token" content="{{ csrf_token() }}">
<style>
    img {
  display: block;
  max-width: 100%;
}
.preview {
  overflow: hidden;
  width: 160px;
  height: 160px;
  margin: 10px;
  border: 1px solid red;
}
.modal-lg{
  max-width: 1000px !important;
}

.containerr {
  position: relative;
  width: 100%;
}

.profile-user-img {
  opacity: 1;
  display: block;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
  cursor: pointer;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;

}

.containerr:hover .profile-user-img {
  opacity: 0.3;
}

.containerr:hover .middle {
  opacity: 1;
}

.containerr i {
  color: rgb(49, 49, 49);
  font-size: 1.4rem;
  cursor: pointer;
}

</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Profile</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <div class="containerr">
                                <img class="profile-user-img img-fluid img-circle"
                                src="{{ Auth::user()->image_path }}"
                                alt="User profile picture">
                                <div class="middle">
                                    <i class="fas fa-camera"></i>
                                  </div>
                                <input type="file" name="image_crop" class="image" style="display:none;"  data-id="{{Auth::user()->id}}" id="image_crop">
                            </div>
                        </div>

                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Total posts</b> <a class="float-right">{{ $posts }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Joined</b> <a class="float-right">{{ date('d/m/Y', strtotime(Auth::user()->created_at)) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Top Category</b> <a class="float-right">
                                    @if ($top_category->count() >0)
                                    {{ $top_category[0]->name }} ({{ $top_category[0]->repetition }} posts)
                                    @else
                                    No posts
                                    @endif

                                    </a>
                            </li>
                        </ul>
                        <form>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="{{Auth::user()->id}}" data-route="user/{{Auth::user()->id}}" class="btn edit show-object-data btn-primary btn-block"><b>Edit</b></a>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->

                <!-- /.col -->

            </div>
            <div class="col">
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                    <span class="tag tag-danger">UI Design</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Javascript</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Please crop your image before uploading</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                  <div class="row">
                      <div class="col-md-8">
                          <img id="image_a" src="https://avatars0.githubusercontent.com/u/3456749">
                      </div>
                      <div class="col-md-4">
                          <div class="preview"></div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
          </div>
        </div>
      </div>

      </div>
      </div>

    <!-- Modal -->
    @endsection

    @section('script')
    <script>
         $('#myModal').on('hidden.bs.modal', function () {
            $(".submitForm")[0].reset();
            var $image = $("#imageHolder");
            $("#imageHolder").removeAttr("src").replaceWith($image.clone());
        });
$(".edit").click(function(){
    var url = "{{ route('user/edit', ':id') }}";
            url = url.replace(':id', $(this).data('id'));
            $('.objectForm').attr('action', url);
        });

        function showData(returndata){
            $('#imageHolder').attr({ 'src': returndata.image_path });
            $('#name').val(returndata.name );
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
<script>
    $(".profile-user-img").click(function(){$("#image_crop").click()});
</script>
<script>

    var $modal = $('#modal');
    var image = document.getElementById('image_a');
    var cropper;

    $("body").on("change", ".image", function(e){
        var files = e.target.files;
        var done = function (url) {
          image.src = url;
          $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
          file = files[0];

          if (URL) {
            done(URL.createObjectURL(file));
          } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
              done(reader.result);
            };
            reader.readAsDataURL(file);
          }
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
          aspectRatio: 1,
          viewMode: 0,
          preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
       cropper.destroy();
       cropper = null;
    });

    $("#crop").click(function(){
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
          });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
             reader.readAsDataURL(blob);
             reader.onloadend = function() {
                var base64data = reader.result;
                var id = $("#image_crop").data('id');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "user/updateImage/"+id,
                    data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
                    success: function(data){
                        swal("Success!", "Successfully updated Your data!", "success").then((value) => {
              window.location.reload(true);
            });
                    }
                  });
             }
        });
    })

    </script>
@endsection


{{-- @extends('layouts.modal') --}}
@section('modal-body')
    <div class="modal-header">
        <h4 class="modal-title">Edit Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <form class="submitForm objectForm" enctype="multipart/form-data" action="{{ route('user/store') }}">
        @csrf
        <div class="modal-body">
            <div class="container">



                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name">Name *</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" >
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
                            <label class="col-form-label" for="image">Image *</label>
                            <input type="file" id="image" class="form-control" name="image_path" onchange="loadFile(event)"/>
                        </div>
                    </div>
                </div>





            </div>
        </div>

@endsection
