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
   <div class="row justify-content-center">
    <div class="col-10">

     <div class="card">
       <div class="card-header">
        <h3> Edit User
         <a href="{{route('user.view')}}" class=" btn btn-outline-primary btn-sm float-right">
          <i class="fa fa-list"></i> User List</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('user.update',$editData->id)}}"  enctype="multipart/form-data" id="myForm">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-6">
           <label for="name">Name <span style="color:red;">*</span></label>
           <input type="text" name="name" class="form-control" placeholder="User Name" value="{{ $editData->name }}">
           <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
           <label for="email">Email <span style="color:red;">*</span></label>
           <input type="email" name="email" class="form-control" placeholder="Example@gmail.com" value="{{ $editData->email }}">
           <font style="color:red">{{($errors->has('email'))?($errors->first('email')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
           <label for="role_id">User Role <span style="color:red;">*</span></label>
           <select name="role_id" id="role_id" class="form-control">
            <option value="">Select Role</option>
            @foreach($alldata as $roles)
              <option value="{{ $roles->id }}" {{(@$editData->role_id ==$roles->id)?'selected':'' }} >{{ $roles->name }}</option>
             @endforeach
           </select>
          </div>
        
          <div class="form-group col-md-3">
           <label for="image"> Image </label>
           <input type="file" name="image" class="form-control" id="image">
           <font style="color:red">{{ ($errors->has('image'))?($errors->first('image')):'' }}</font>
          </div>

          <div class="form-group col-md-3" align="center">
           <img id="showImage" src="{{ !empty($editData->image)?url('upload/user_image/'.$editData->image):url('upload/No-image.jpg') }}" style="width:80px; height:80px; border:1px solid #ccc; border-radius:50%;">
          </div>



          <div class="form-group col-md-6">
             <label for="status"> Status <span style="color:red;">*</span> </label>
             <select name="status" class="form-control">
              <option value=""> Select Status </option>
              <option value="0" {{ $editData->status=="0"?"selected":"" }}> Publish </option>
              <option value="1" {{ $editData->status=="1"?"selected":"" }}> Draft </option>
             </select>
             <font style="color:red">{{ ($errors->has('status'))?($errors->first('status')):'' }}</font>
            </div>


          <div class="form-group col-md-6" style="padding-top:30px;">
           <input type="submit" value="submit"  class="btn btn-primary">
          </div>

         </div>
        </form>
       </div>

     </div>
    </div>
   </div>
  </div>
 </section>


</div>


<script>
 $(function () {
  $('#myForm').validate({
    rules: {
     name: {
     required: true,
    },
    email: {
     required: true,
    },
     role_id: {
     required: true,
    },
    status: {
     required: true,
    },
    

    },
    messages: {
     name: {
        required: "Please Enter Name",
      },
     email: {
      required: "Please Enter a Email Address",
      email: "Please enter a <em>valid</em> email address",
      },
     role_id: {
        required: "Please Select Role",
      },
      status: {
        required: "Please Select Status",
      },

    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

@endsection
