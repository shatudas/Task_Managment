@extends('backend.layouts.master')
@section('content')

 <div class="content-wrapper">
  
  <div class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
     <h1 class="m-0">Manage Project</h1>
     </div>
      <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Project</li>
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
        <h3> Add Project
         <a href="{{route('project.view')}}" class=" btn btn-outline-primary btn-sm float-right">
          <i class="fa fa-list"></i> Project List</a>
        </h3>
       </div>
              
       <div class="card-body">
        <form method="POST" action="{{route('project.store')}}"  enctype="multipart/form-data" id="myForm">
         @csrf
         <div class="form-row">

          <div class="form-group col-md-6">
           <label for="name">Name <span style="color:red;">*</span></label>
           <input type="text" name="name" class="form-control" placeholder="User Name">
           <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
           <label for="project_manager">Project Manager<span style="color:red;">*</span></label>
           <select class="form-control" name="project_manager" > 
             <option value="">Select Project Manager</option>
             @foreach($team_manager as $manager)
              <option value="{{ $manager->id }}">{{ $manager->name }}</option>
             @endforeach
           </select>
           <font style="color:red">{{($errors->has('project_manager'))?($errors->first('project_manager')):'' }}</font>
          </div>

          <div class="form-group col-md-6 select2-purple">
           <label for="team">Project Team Member<span style="color:red;">*</span></label>
           <select class="select2" multiple="multiple" data-placeholder="Select Team Member" data-dropdown-css-class="select2-purple" name="team[]" style="width: 100%;">
             @foreach($team as $manager)
              <option value="{{ $manager->id }}">{{ $manager->name }}</option>
             @endforeach
           </select>
           <font style="color:red">{{($errors->has('team'))?($errors->first('team')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
           <label for="start_data">Start Date <span style="color:red;">*</span></label>
           <input type="date" name="start_data" class="form-control">
           <font style="color:red">{{($errors->has('start_data'))?($errors->first('start_data')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
           <label for="end_data">End Date <span style="color:red;">*</span></label>
           <input type="date" name="end_data" class="form-control">
           <font style="color:red">{{($errors->has('end_data'))?($errors->first('end_data')):'' }}</font>
          </div>

          <div class="form-group col-md-6">
            <label for="status"> Status <span style="color:red;">*</span> </label>
             <select name="status" class="form-control">
              <option value=""> Select Status </option>
              <option value="0"> Padding </option>
              <option value="1"> On-Process </option>
              <option value="1"> Done </option>
             </select>
            <font style="color:red">{{ ($errors->has('status'))?($errors->first('status')):'' }}</font>
          </div>

          <div class="form-group col-md-12">
           <label for="description">Description<span style="color:red;">*</span></label>
           <textarea id="summernote" rows="5" style="min-height:200px;"></textarea>
          
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
    project_manager: {
     required: true,
    },
     team: {
     required: true,
    },
     start_data: {
     required: true,
    },
     end_data: {
     required: true,
    },
    status: {
     required: true,
    },
    description: {
     required: true,
    },

    },
    messages: {
     name: {
        required: "Please Enter Name",
      },
     project_manager: {
      required: "Please Project Manager",
      
      },
     team: {
        required: "Please Team Mamber",
      },
    
      start_data: {
      required: "Project Start Date",
      },

      end_data: {
      required: "Project End Date",
      },
      status: {
      required: "Select Status",
      },
      description: {
        required: "Please Description",
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
