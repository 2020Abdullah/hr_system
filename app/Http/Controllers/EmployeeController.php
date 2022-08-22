<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\system;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function add(){
        $Groups = system::all();
        return view("Pages.add-employee", compact('Groups'));
    }
    public function store(Request $request){

        $request->validate([
            'fname'      => 'required',
            'starttime'  => 'required',
            'endtime'    => 'required',
            'salary'     => 'required',
        ]);

        if($request->file('personal_img')){
            $file =  $request->file('personal_img');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('assets/Uploads/'), $filename);
        }

        if(isset($filename)){
            Employee::create([
                'fname'        => $request->fname,
                'address'        => $request->address,
                'email'        => $request->email,
                'phone'        => $request->phone,
                'date_birdth'         => $request->date_birdth,
                'Type'         => $request->Type,
                'Date_of_contract'  => $request->Date_of_contract,
                'starttime'         => $request->starttime,
                'endtime'           => $request->endtime,
                'salary'            => $request->salary,
                'National_ID'       => $request->National_ID,
                'Nationality'       => $request->Nationality,
                'comment'           => $request->comment,
                'personal_img' => $filename,
            ]);
        }
        else {
            Employee::create([
                'fname'        => $request->fname,
                'address'        => $request->address,
                'email'        => $request->email,
                'phone'        => $request->phone,
                'date_birdth'         => $request->date_birdth,
                'Type'         => $request->Type,
                'Date_of_contract'  => $request->Date_of_contract,
                'starttime'         => $request->starttime,
                'endtime'           => $request->endtime,
                'salary'            => $request->salary,
                'National_ID'       => $request->National_ID,
                'Nationality'       => $request->Nationality,
                'comment'           => $request->comment,
            ]);
        }

        return back()->with('success', 'Dated Saved successfly');

    }
}
