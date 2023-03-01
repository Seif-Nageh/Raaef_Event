<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use \Illuminate\Http\Response;

class ClientController extends Controller
{
    function store (Request $request){
        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required|unique:clients,phone',
            'email' => 'max:255|email',
            'city' => 'max:100',
            'state' => 'max:100',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        } else {
            $data = $request->input();
            $student = new Client;
            $student->name = $data['name'];
            $student->phone = $data['phone'];
            $student->city = $data['city'];
            $student->email = $data['email'];
            $student->state = $data['state'];
            $student->save();
            return redirect('/qr');
        }
    }

    function qr(){
        return view('qr');
    }

    function surprise_wheel(){
        return view('wheel');
    }

}
