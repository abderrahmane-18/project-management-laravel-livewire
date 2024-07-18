<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class globalController extends Controller
{
  //  public static $user1_project='';
    //public static $list_tasks=[];
    public  $list_project_logged_user=[];
    public function get_inf_project(){
        $id = Auth::id();
   //     Log::info($l);
        $user_project=User::find($id);
    
      //  echo( $user_project->projects);
        $porjects_user=$user_project->projects;
      $list_project_logged_user=[];
        // Get the currently authenticated user's ID...
        foreach ($porjects_user as $pr) {
   // echo ($pr->id);
    array_push($list_project_logged_user,$pr->id);

}
return $list_project_logged_user;
    }

}