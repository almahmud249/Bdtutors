<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Auth;

class PersonalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddPerInfo(Request $request)
    {
        $this->validate($request, [


            'fullName' => 'nullable|max:20',
            'number' => 'nullable|max:11|Min:11',
            'email' => 'bail|nullable|email',

        ]);
        $data=Auth::user();
        $userId=$data->id;
        return PersonalInformation::where('user_id',$userId)->update([

            'fullName' => $request->fullName,
            'date' => $request->date,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'religion' => $request->religion,
            'address' => $request->address,
            'desc' => $request->desc,


        ]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetAllTutors(Request $request)
    {
        // return User::orderBy('id','desc')->get();
        return $allData = User::with('educationClasses','tutionRelatedInfo','personalInformation','area','subject')->get();


    }
    public function GetAllInfo(Request $request)
    {
        $data=Auth::user();
        $userId=$data->id;
        return PersonalInformation::where('user_id',$userId)->first();
        //  return $users = DB::table('users')
        // ->join('personal_information', 'users.id', '=', 'personal_information.user_id')
        // ->select('users.*','personal_information.*')
        // ->get()->toJson();



    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetInfoForProfile(Request $request)
    {
        $id=Auth::user()->id;
       return $users = DB::table('users')
        ->join('tution_related_infos', 'users.id', '=', 'tution_related_infos.user_id')
        ->join('areas', 'users.id', '=', 'areas.user_id')
        ->join('personal_information', 'users.id', '=', 'personal_information.user_id')
        ->join('education_classes', 'users.id', '=', 'education_classes.user_id')
        ->select('users.*','areas.*','tution_related_infos.*','personal_information.*','education_classes.*' )
        ->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function GetArea(Request $request)
    {
        $id=Auth::user()->id;
         return $users = DB::table('areas')->where('user_id',$id)->first();





    //    return $query->select(array_diff($this->getTableColumns(), (array) $columns));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalInformation $personalInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonalInformation $personalInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalInformation $personalInformation)
    {
        //
    }
}
