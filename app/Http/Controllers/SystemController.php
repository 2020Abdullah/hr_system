<?php

namespace App\Http\Controllers;

use App\Models\system;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function index(){
        return view('Pages.System');
    }
    public function store(Request $request){
        system::create([
            'Group_name'       => $request->Group_name,
            'total_hour_price' => $request->extra,
            'holidays'            => $request->holdays,
        ]);
        return back()->with('success', 'Dated Saved successfly');
    }
}
