@extends('layouts.admin')
@section('header', 'Dashboard')


@section('content')


<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-main">
            <div class="inner">
              <h3>{{ $user_count }}</h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin/users') }}" class="small-box-footer">All users <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $post_count }}</h3>

              <p>Posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-image"></i>
            </div>
            <a href="{{ route('admin/posts') }}" class="small-box-footer">All posts <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-yellownew">
            <div class="inner">
              <h3>{{ $category_count }}</h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="{{ route('admin/category') }}" class="small-box-footer" style="color: rgb(31, 31, 31);">All categories <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
      </div>
      <!-- /.row -->

  </section>
@endsection
