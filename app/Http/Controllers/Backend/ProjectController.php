<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Project;


class ProjectController extends Controller
{
  

  public function add(){
    $data['team_manager'] = User::where('role_id',3)->where('status',0)->get(); 
    $data['team'] = User::where('role_id',4)->where('status',0)->get(); 
  	return view('backend.project.add_project',$data);
  }

  public function store(Request $request){
   
  
  	$this->validate($request,[
	  'name'             =>'required',
	  'project_manager'  =>'required',
	  'team'             =>'required',
	  'start_data'       =>'required',
	  'end_data'         =>'required',
	  'status'           =>'required'
	  ]);

  	$data = new Project();
	  $data->name             =$request->name;
	  $data->project_manager  =$request->project_manager;
	  $data->team             =json_encode($request->team);
	  $data->start_data       =$request->start_data;
	  $data->end_data         =$request->end_data;
	  $data->status           =$request->status;
	  $data->description      =$request->description;

    $data->save();
    return redirect()->route('project.add')->with('success','Data Insert Successfully');

 }

}
