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
            <td>Image</td>
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
             @if($user->status == '0')
              <a href="{{ route('user.inactive',$user->id) }}" class="btn btn-success btn-sm " > Publish </a>
              @else
              <a href="{{ route('user.active',$user->id) }}" class="btn btn-danger btn-sm"  > Draft </a>
             @endif 
            </td>
           
            <td align="center">
             <div class="dropdown ">
              <button class="btn btn-sm btn-outline-primary text-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" title="Edit" href="{{ route('user.edit',$user->id) }}">Edit</a>
                <a class="dropdown-item" title="Delete" href="{{ route('user.delete',$user->id) }}">Delete</a>
              </div>
             </div>
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
 </section>
</div>
  <!-- /.content-wrapper -->



@endsection
