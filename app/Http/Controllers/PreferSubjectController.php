<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\PreferSubject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PreferSubjectController extends Controller
{
    public function PostSubject(Request $request){
        $id=Auth::user()->id;
        
        $prefer_subject = implode(",", $request->all());
       
        return $dt=DB::table('prefer_subjects')->where('user_id',$id)->update([

            "prefer_subject" =>$prefer_subject,
        ]);
    }

    public function PostArea(Request $request){

        $id=Auth::user()->id;
        $prefer_area = implode(",", $request->all());
       


      return  $data= Area::where('user_id',$id)->update([

        "Prefer_area" => $prefer_area,
        ]);

    }

    public function GetArea(Request $request){
        $id=Auth::user()->id;
        return Area::where('user_id',$id)->first();
    }

    public function GetSubject(Request $request){

        $id=Auth::user()->id;
        return PreferSubject::where('user_id',$id)->first();

    }
}
