@extends('layouts.admin')

@section('content')

<div class="modal-header">
    <h4 class="modal-title">Posts</h4>
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
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($objects as $object)
                                        <tr>
                                            <td class="text-center">{{ $object->title }}</td>
                                            <td class="text-center">{{ $object->content }}</td>
                                            <td class="text-center">{{ $object->category->name }}</td>
                                            <td class="text-center">
                                                <img class="rounded" src="{{ $object->post_image}}" width="60">
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('admin/posts/restore', $object->id) }}" method="POST">
													@method('PUT')
													@csrf
													<button class="btn btn-sm btn-info" type="submit">Restore</button>
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

@endsection



