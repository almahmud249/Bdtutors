<?php

namespace App\Http\Controllers;

use App\Models\RequestTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestTutorController extends Controller
{
    public function PostForTutor(Request $request)
    {

        $email = $request->email;

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $request->validate([
                'email' => 'required|email:rfc,dns',
            ]);
        }
        $validate = $request->validate([
            "name" => "required|max:20",
            "medium" => "required",
            "area" => "required",
            "class" => "required",
            "subject" => "required",
            "school" => "required|max:20",
            "days" => "required",
            "studentGenders" => "required",
            "salery" => "required",
            "tutorGenders" => "required",
            "address" => "required|max:40",
            "email" => "required|unique:request_tutors|email|",

            "phone" => "required",

        ]);

        $data = new RequestTutor;
        $data->name = $request->name;
        $data->medium = $request->medium;
        $data->area = $request->area;
        $data->class = $request->class;
        $data->subject = $request->subject;
        $data->days = $request->days;
        $data->studentGenders = $request->studentGenders;
        $data->salery = $request->salery;
        $data->school = $request->school;
        $data->tutorGenders = $request->tutorGenders;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone = $request->phone;
        return $data->save();
    }

    public function GetTution()
    {

        return $data = DB::table("request_tutors")->limit(10)->orderBy('id','desc')->get();

    }
}
