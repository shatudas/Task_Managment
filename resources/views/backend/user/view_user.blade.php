@extends('backend.layouts.master')
@section('content')

<div class="content-wrapper">
 
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Manage User</h1>
    </div>
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">User</li>
     </ol>
    </div>
   </div>
  </div>
 </div>

 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
   <div class="row">
    <div class="col-12">

     <div class="card">
      <div class="card-header">
       <h3>User List
        <a href="{{route('user.add')}}" class=" btn btn-outline-primary btn-sm float-right"> <i class="fa fa-plus-circle"></i> Add User </a>
       </h3>
      </div>
      
      <div class="card-body">
       <table id="example1" class="table table-bordered table-striped">     
        <thead>
         <tr align="center"> 
          <th>SL</th>
          <th>Name</th>
          <th>Email</th>
          <th>Image</th>
          <th>Role</th>
          <th>Status</th>
          <th>Action</th>
         </tr>
        </thead>

        <tbody>
         @foreach($alldata as $key => $user)
          <tr> 
            <td>{{ $key+1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td align="center">
              <img src="{{ (!empty($user->image))?url('upload/user_image/'.$user->image):url('upload/No-image.jpg') }}" style="width:80px; height:80px; border-radius:50%; border:1px solid #ccc;" >
            </td>
            <td align="center">
             @if($user->role_id == '1')
             <a class="btn btn-sm btn-primary">
              {{ $user['role']['name'] }}
             </a>
             @elseif($user->role_id == '2')
             <a class="btn btn-sm btn-success">
              {{ $user['role']['name'] }}
             </a>
             @elseif($user->role_id == '3')
             <a class="btn btn-sm btn-secondary">
              {{ $user['role']['name'] }}
             </a>
             @elseif($user->role_id == '4')
             <a class="btn btn-sm btn-warning">
              {{ $user['role']['name'] }}
             </a>
             @endif
            
           </td>

            <td align="center">
             @if($user->role_id == 1)
              <span class="btn btn-primary btn-sm">Publish</span>
             @else
               @if($user->status == '0')
                <a href="{{ route('user.inacative',$user->id) }}" class="btn btn-success btn-sm " > Publish </a>
                @else
                <a href="{{ route('user.active',$user->id) }}" class="btn btn-danger btn-sm"  > Draft </a>
               @endif 
             @endif
            </td>
           
            <td align="center">
             @if($user->role_id == 1)
             <span class="btn btn-sm btn-info">Super Admin</span>
             @else
             <div class="dropdown ">
              <button class="btn btn-sm btn-outline-primary text-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" title="Edit" href="{{ route('user.edit',$user->id) }}">Edit</a>
                <a class="dropdown-item" title="Delete"  id="delete" href="{{ route('user.delete',$user->id) }}">Delete</a>
              </div>
             </div>
             @endif

            </td>


           {{--  <td>
                     @if($user->delete_able == true)
                      <a title="Edit" href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i></a>

                      <a title="Delete" href="{{route('user.delete',$user->id)}}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      @else
                       <small><a class="btn btn-warning btn-sm p-0 m-0 text-white"> Super Admin </a></small>
                     @endif
                    </td> --}}

          </tr>
         @endforeach
        </tbody>

       </table>
      </div>
     </div>  
    </div>
   </div>
  </div>
 </section>
</div>
  <!-- /.content-wrapper -->



@endsection
