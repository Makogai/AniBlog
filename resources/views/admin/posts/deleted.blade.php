@extends('layouts.admin')
@section('header', 'Deleted Posts')

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
                                    <h5 class="card-title mt-1 mb-1">Posts table</h5>
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
                                            <td class="text-center">{{ $object->short_content }}</td>
                                            <td class="text-center">
                                                @isset($object->categories)
                                                @foreach($object->categories as $category)
                                                   {{ ($category->category) ? $category->category->name : '' }} <i class="fas fa-square" style="color: {{$category->category->color}};"></i> <br>
                                                @endforeach
                                            @endisset
                                            </td>
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



