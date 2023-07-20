<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;


class UserController extends Controller
{
	
  public function view(){
   $data['alldata'] = User::all();
   return view('backend.user.view_user',$data);
  }

  public function add(){
  	$data['alldata'] = Role::where('id','!=','1')->get();
  	return view('backend.user.add_user',$data);
  }

  public function store(Request $request){

  	$this->validate($request,[
	  'name'       =>'required',
	  'email'      =>'required|unique:users,email',
	  'role_id'    =>'required',
	  'password'   =>'required',
	  'status'     =>'required'
	  ]);

  	$data = new User();
	  $data->name      =$request->name;
	  $data->email     =$request->email;
	  $data->role_id   =$request->role_id;
	  $data->password  =bcrypt($request->password);
	  $data->status    =$request->status;

	  if($request->file('image'))
	   {
			  $file=$request->file('image');
			  $filename = 'IMG_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
			  $file->move(public_path('upload/Package_Feature'),$filename);
			  $data['image']=$filename;
			 }
    $data->save();
    return redirect()->route('user.view')->with('success','Data Insert Successfully');

 }


}
