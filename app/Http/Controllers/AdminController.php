<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PreferSubject;
use App\Models\EducationClasses;
use App\Models\TutionRelatedInfo;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function AddUser(Request $request)
    {
        $this->validate($request, [

            'FullName' => 'required||max:20',
            'district' => 'required',
            'number' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        $data = User::create([

            'FullName' => $request->FullName,
            'district' => $request->district,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'number' => $request->number,

        ]);

        $id = $data->id;
        TutionRelatedInfo::create([
            'user_id' => $id,
        ]);

        PersonalInformation::create([
            'user_id' => $id,
        ]);
        Area::create([
            'user_id' => $id,
        ]);
        EducationClasses::create([
            'user_id' => $id,
        ]);
        PreferSubject::create([
            'user_id' => $id,
        ]);

        return $data;

    }

    public function Login(Request $request){

        $this->validate($request,[
            'email'=>'bail|required|email',
            'password'=>'bail|required|min:6',
        ]);

        if(Auth::attempt([ 'email' => $request->email, 'password' => $request->password,])){
            return response()->json([
                'msg'=>'you are logged in'
            ]);
        }else{
            return response()->json([
                'msg'=>'incorrect login details'
            ]);
        }


    }

    public function index(Request $request){
       // if(!Auth::check() && $request->path() !='login'){
        //     return redirect('/login');
        // }


        if(!Auth::check() && $request->path() =='myprofile'){
            return redirect('/login');
        }
        elseif(!Auth::check() && $request->path() =='myphoto'){
            return redirect('/login');
        }
        elseif(!Auth::check() && $request->path() =='personalInfo'){
            return redirect('/login');
        }
        elseif(!Auth::check() && $request->path() =='tutionInfo'){
            return redirect('/login');
        }

        if(Auth::check() && $request->path() =='login'){
            return redirect('/');
        }
        else{
            return view('welcome');
        }

    }

    public function Logout(){
        Auth::logout();
         return redirect('/login');

    }

    public function UploadImage(Request $request){

        $data=Auth::user();
        $userId=$data->id;
        $pic=PersonalInformation::where('user_id',$userId)->select('photo')->first();


        if($pic->photo){
            $filePath = public_path() . '/img/' . $pic->photo;
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        $picName=$request->file('image');

         $picName = time() . '.' . $picName->extension();

        $request->file('image')->move(public_path('img'), $picName);
        return $data=PersonalInformation::where('user_id',$userId)->update([
            'photo' => $picName,
        ]);



    }


    public function PostInfo(Request $request){


        $id=Auth::user()->id;
        $style = implode(",", $request->tutorStyle);
        $approach = implode("," ,$request->TutoringApproach);
        $place = implode("," ,$request->LearningPlace);


         $dt=DB::table('tution_related_infos')->where('user_id',$id)->update([

            "qualification" =>$request->qualification,
            "currentStatus" =>$request->currentStatus,
            "dayPerW" =>$request->dayPerW,
            "salary" =>$request->salary,

            "place_area" =>$style,
            "tutoring_approach" =>$approach,
            "learning_place" =>$place,



        ]);


    }
    public function GetAllInfo(Request $request){
        $id=Auth::user()->id;
         return TutionRelatedInfo::where('user_id',$id)->first();

    }

    public function GetAllData(){
        if(Auth::check()){

            $id=Auth::user()->id;
            return $allData = User::where("id",$id)->with('educationClasses','tutionRelatedInfo','personalInformation','area','subject')->get();
        }
    }

    public function AuthUser(){
            return $data=Auth::user();
    }
}
