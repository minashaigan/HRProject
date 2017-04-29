<?php

namespace Modules\Project\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\Project\Entities\file_project;
use Modules\Project\Entities\project;
use Modules\Project\Entities\FileProject;
use Modules\Project\Entities\ProjectUser;
use Modules\Project\Entities\Tags;
Use Validator;
use File;




class ProjectController extends Controller
{

    public function index()
    {
        $user=User::all();

        return view('project::addproject')->with(['user'=>$user]);
    }

    public function addproject(Request $request)
    {

//        $this->validate($request, [
//           'name' => 'required|max:50|min:3',
//            'description' =>'required|max:50|min:3'
//
//        ]);

        //give input request for insert in project table
        //...




        $status=$request->input('status');
        $name=$request->input('name');
        $dec=$request->input('description');
        $url=$request->input('test');
        $sd=$request->input('start');
        $ed=$request->input('end');

        //save project
        $project=new project();
        $project->status_id=$status;
        $project->name=$name;
        $project->description=$dec;
        $project->url=$url;
        $project->start_date=$sd;
        $project->end_date=$ed;
        $project->save();

        $project_id=$project->id;

        //give User id
        $user_id=$request->input('user_id');

        //save project's users
        foreach ($user_id as $user)
        {
            $project_user= new ProjectUser();
            $project_user->project_id=$project_id;
            $project_user->user_id=$user;
            $project_user->save();
        }




        //give input request for insert in file table
        //...
        $file = new FileProject();

        $file->title=Input::get('name');
        if(Input::hasFile('file'))
        {
            $rand=rand(11,99);
            $upload=Input::file('file');
            $upload->move(public_path().'/file',$project_id."-".$rand.$upload->getClientOriginalName());

            $type_name=$upload->getClientOriginalName();
            $file_array = explode(".", $type_name);

            $file->name=$project_id."-".$rand.$upload->getClientOriginalName();
            $file->size=$upload->getClientSize();
            $file->type=end($file_array);
//            $file->type=$upload->getClientMimeType();
            $file->project_id=$project_id;
            $file->save();
        }

        //save project tags in database
        $tag=$request->input('tag');
        $tags_array = explode(",", $tag);
        $count_tag=count($tags_array);
        for ($i=0;$i<$count_tag;$i++)
       {


           $save_tag= new Tags();
           $save_tag->name=$tags_array[$i];
           $save_tag->project_id=$project_id;
           $save_tag->save();


       }


        return redirect('/Projectmanage/project/show');
    }

    public function showproject()
    {
        $allproject=project::paginate(6);


        return view('project::showproject')->with(['project'=>$allproject]);
    }



    public function showoneproject($id)
    {



        $project=project::find($id);
        $user_id=array();
        foreach ($project->user as $us)
        {

            $user_id[]=$us->id;

        }

        $users=User::all()->whereNotIn('id',$user_id);



        return view('project::showoneproject')->with(['project'=>$project,'users'=>$users]);
    }



    public function addfile(Request $request)
    {
        //give input request for insert in file table
        //...

        $project_id=$request->input('project_id');
        $file = new FileProject();

        $file->title=Input::get('name');
        if(Input::hasFile('file'))
        {


            $rand=rand(11,99);
            $upload=Input::file('file');
            $upload->move(public_path().'/file',$project_id."-".$rand.$upload->getClientOriginalName());

            $type_name=$upload->getClientOriginalName();
            $file_array = explode(".", $type_name);

            $file->name=$project_id."-".$rand.$upload->getClientOriginalName();
            $file->size=$upload->getClientSize();
            $file->type=end($file_array);
//          $file->type=$upload->getClientMimeType();
            $file->project_id=$project_id;
            $file->save();
        }

        return redirect('/Projectmanage/project/show/'.$project_id);
    }

    public function adduser(Request $request)
    {
        $user_id=$request->input('user_id');
        $project_id=$request->input('project_id');

        //save project's users
        foreach ($user_id as $user)
        {
            $project_user= new ProjectUser();
            $project_user->project_id=$project_id;
            $project_user->user_id=$user;
            $project_user->save();
        }

        return redirect('/Projectmanage/project/show/'.$project_id);
    }

    public function editproject($id)
    {

        $project=project::find($id);
        $user_id=array();
        foreach ($project->user as $us)
        {

            $user_id[]=$us->id;

        }

        $user=User::all()->whereNotIn('id',$user_id);


        return view('project::editproject')->with(['project'=>$project,'user'=>$user]);
    }



    public function deletetag($id)
    {
        $tag=Tags::find($id);
        $project_id=$tag->project_id;
        $tag->delete();

        return redirect('/Projectmanage/project/'.$project_id.'/edit');

    }

    public function deleteuser($pid,$id)
    {


        $user=ProjectUser::all()->where('user_id',$id)->where('project_id',$pid);
        foreach ($user as $use)
        {
        $puid=$use->id;
        }

        $d=ProjectUser::find($puid);
        $d->delete();

        return redirect('/Projectmanage/project/'.$pid.'/edit');
    }


    public function updateproject(Request $request)
    {
        $status=$request->input('status');
        $name=$request->input('name');
        $dec=$request->input('description');
        $url=$request->input('test');
        $sd=$request->input('start');
        $ed=$request->input('end');
        $project_id=$request->input('project_id');

        //update project
        $project=project::find($project_id);
        $project->status_id=$status;
        $project->name=$name;
        $project->description=$dec;
        $project->url=$url;
        $project->start_date=$sd;
        $project->end_date=$ed;
        $project->update();



        //save project tags in database
        $tag=$request->input('tag');
        $tags_array = explode(",", $tag);
        $count_tag=count($tags_array);
        for ($i=0;$i<$count_tag;$i++)
        {


            $save_tag= new Tags();
            $save_tag->name=$tags_array[$i];
            $save_tag->project_id=$project_id;
            $save_tag->save();


        }


        return redirect('/Projectmanage/project/show/'.$project_id);
    }

    //delete project's file
    public function deletefile($id)
    {
        $file=FileProject::find($id);
        $project_id=$file->project_id;
        $file_name= public_path()."/file/".$file






















                ->name;

        File::delete($file_name);
        $file->delete();

        return redirect('/Projectmanage/project/show/'.$project_id);
    }

    public function test()
    {
        $array=(["1","2","3"]);
        return end($array);
    }
}
