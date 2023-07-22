@php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();
@endphp


 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
     <center>
      <span class="brand-text font-weight-light" >Task Management</span>
     </center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" align="center">
          <a href="{{ route('home') }}" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <li class="nav-item {{($prefix=='/user')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.add') }}" class="nav-link {{($route=='user.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.view') }}" class="nav-link {{($route=='user.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.password') }}" class="nav-link {{($route=='user.password')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change password</p>
                </a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item {{($prefix=='/project')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Project
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('project.add') }}" class="nav-link {{($route=='project.add')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('project.view') }}" class="nav-link {{($route=='project.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Project</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
     
    </div>
    
  </aside>