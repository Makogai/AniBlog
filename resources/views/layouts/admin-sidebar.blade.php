<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset("/images/logo.svg")}}" alt="AniBlog Logo" class="brand-image " style="opacity: .8">
      <span class="brand-text font-weight-light">AniBlog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->image_path }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin/user')  }}" class="d-block {{strpos(Route::current()->getName(), 'admin/user' ) !== false ? "active" : ""}}">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">Basic</li>
          <li class="nav-item">
            <a href="{{ route('admin/dashboard') }}" class="nav-link {{strpos(Route::current()->getName(), 'dashboard' ) !== false ? "active" : ""}}">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Dashboard
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route("admin/posts") }}" class="nav-link {{strpos(Route::current()->getName(), 'posts' ) !== false ? "active" : ""}}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Posts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route("admin/category") }}" class="nav-link {{strpos(Route::current()->getName(), 'category' ) !== false ? "active" : ""}}">
              <i class="nav-icon far fa-bookmark"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item"">
              <form action="{{ route("logout") }}" method="post">
                @csrf
                <button href="" style="box-shadow: 0; border: none;" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                    Logout
                  </p>
                </button>

            </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
