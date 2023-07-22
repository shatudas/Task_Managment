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
	  'password'   =>'required'
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
			  $file->move(public_path('upload/user_image'),$filename);
			  $data['image']=$filename;
			 }
    $data->save();
    return redirect()->route('user.view')->with('success','Data Insert Successfully');

 }

  //------inactive------//
		 public function inacative($id)
		 {
		  User::find($id)->where('id',$id)->update(['status'=>1]);
		  return redirect()->back();
		 }

		 //----------active------//
		 public function active($id)
		 {
		  User::find($id)->where('id',$id)->update(['status'=>0]);
		  return redirect()->back();
		 }
   


    //-----delete------//
			 public function delete($id)
			 {
			  $user = User::find($id);
			  if(file_exists('upload/user_image/' .$user->image) AND !empty($user->image))
			   {
			    @unlink('upload/user_image/' .$user->image);
			   }
			  $user->delete();
			  return redirect()->route('user.view')->with('success','Data Deleted Successfully');
			 }


			//------edit-----//
		 public function edit($id)
		 {
		  $data['editData']=User::find($id);
		  $data['alldata'] = Role::where('id','!=','1')->get();
		  return view('backend.user.edit_user',$data);
		 }


		 //-----update------//
   public function update(Request $request,$id)
   {
  
    $this->validate($request,[
	  'name'       =>'required',
	  'email'      =>'required',
	  'role_id'    =>'required',
	  'status'     =>'required'
	  ]);

    $data = user::find($id);
    $data->name      =$request->name;
		  $data->email     =$request->email;
		  $data->role_id   =$request->role_id;
		  $data->password  =bcrypt($request->password);
		  $data->status    =$request->status;

    if($request->file('image')){
     $file = $request->file('image');
     @unlink(public_path('upload/user_image/'.$data->image));
     $filename = 'IMG_'.date('YmdHis').'.'.$file->getClientOriginalExtension();
     $file->move(public_path('upload/user_image/'),$filename);
     $data['image'] = $filename;
    }

    $data->save();
    return redirect()->route('user.view')->with('success','data Update Successfully');
   }



}
