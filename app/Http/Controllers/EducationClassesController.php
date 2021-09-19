<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationClasses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EducationClassesController extends Controller
{

    public function PostClass(Request $request){

        $id=Auth::user()->id;


        $banglaClass = implode(",", $request->PreferBangla);
        $englishClass = implode("," ,$request->PreferEnglish);
        $language = implode("," ,$request->PreferLanguage);
        $computer = implode("," ,$request->ComputerLearn);
        $activities = implode("," ,$request->ExtraActivities);

       return  $dt=DB::table('education_classes')->where('user_id',$id)->update([


        "banglaClass" =>$banglaClass,
        "englishClass" =>$englishClass,
        "language" =>$language,
        "computer" =>$computer,
        "activities" =>$activities,


        ]);
    }

    public function GetEducation(Request $request){
        $id=Auth::user()->id;
       return  $data= EducationClasses::where('user_id',$id)->first();

    }
}
