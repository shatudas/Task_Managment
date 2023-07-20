<!DOCTYPE html>
<html>
<head>
 <title>Login|| Task Managment</title>
 <!--Bootsrap 4 CDN-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
 <!--Fontawesome CDN-->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <!--Custom styles-->
 <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 <link rel="stylesheet" type="text/css" href="{{ asset('login_data/style.css') }}">
</head>
<body>

<div class="container">
 <div class="d-flex justify-content-center h-100">
  <div class="card">

   <div class="card-header">
    <h3>Log In</h3>
    <div class="d-flex justify-content-end social_icon">
     <span><i class='fas fa-tasks'></i></span>
    </div>
   </div>
   
   <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
      @csrf

       @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         @foreach($errors->all() as $error)
          <strong>{{$error}}</strong><br>
         @endforeach
        </div>
       @endif
       
     <div class="input-group form-group">
      <div class="input-group-prepend">
       <span class="input-group-text"><i class="fas fa-user"></i></span>
      </div>
      <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="username">            
     </div>

     <div class="input-group form-group">
      <div class="input-group-prepend">
       <span class="input-group-text"><i class="fas fa-key"></i></span>
      </div>
      <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password"  autocomplete="current-password" placeholder="password" required>
     </div>

     <div class="row align-items-center remember">
      <input type="checkbox" onclick="myFunction()">Show Password
     </div>
     <div class="form-group">
      <input type="submit" value="Login" class="btn float-right login_btn">
     </div>
    </form>
   </div>

   <div class="card-footer">
    <div class="d-flex justify-content-center">
     <a href="#" class="text-white">Forgot your password?</a>
    </div>
   </div>

  </div>
 </div>
</div>
</body>

<!-----password show----->
<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>



