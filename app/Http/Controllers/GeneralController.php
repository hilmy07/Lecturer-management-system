<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class GeneralController extends Controller
{
    public function insertCheckbox(Request $request)
    {
        if(!empty($request->input('isian')))
        {
            $checkbox = join(',',$request->input('isian'));
            \DB::table('checkbox')->insert(['isian'=>$checkbox]);
        }else
        {
            $checkbox = '';
        }
        return redirect()->back();
        
        dd($checkbox);

    }

    public function checkboxPage(Request $request)
    {
        return view('checkbox');
    }
}
