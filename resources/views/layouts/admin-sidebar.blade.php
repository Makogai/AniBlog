<style>
    a.active{
        color: #fff!important;
    background: rgb(0,131,226);
background: linear-gradient(90deg, rgba(0,131,226,1) 0%, rgba(1,169,156,1) 100%);
    /* border-color: #4183D7; */
    border-color: rgb(var(--color-foreground));
    transition: 0.2s ease all;
    }

</style>
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
        <div class="image py-1">
          <img src="{{ Auth::user()->image_path }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin/user')  }}" class="d-block px-2 py-1 {{strpos(Route::current()->getName(), 'admin/user' ) !== false ? "active" : ""}}">{{ Auth::user()->name }}</a>
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
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route("admin/featured") }}" class="nav-link {{strpos(Route::current()->getName(), 'featured' ) !== false ? "active" : ""}}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Featured Posts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route("admin/footer") }}" class="nav-link {{strpos(Route::current()->getName(), 'footer' ) !== false ? "active" : ""}}">
              <i class="nav-icon fas fa-shoe-prints"></i>
              <p>
               Footer
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
