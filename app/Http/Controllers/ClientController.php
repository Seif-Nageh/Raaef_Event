<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use \Illuminate\Http\Response;

class ClientController extends Controller
{
    function store(Request $request)
    {


        // dd($request);

        //validation
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|unique:clients,phone',
            'email' => 'max:255',
            'state' => 'required',
            'city' => 'required',
            'second_phone' => 'unique:clients,phone',
            'address' => 'max:255',
            'category' => 'required',
            'type' => 'required',
            'company_name' => 'max:255',

        ]);

        $user = $request->user();
        $client = $user->clients()->create($request->only([
            'name',
            'phone',
            'email',
            'state',
            'city',
            'second_phone',
            'address',
            'category',
            'type',
            'company_name',

        ]));
        return redirect('/qr');
    }


    function qr()
    {
        return view('qr');
    }

    function surprise_wheel()
    {
        return view('wheel');
    }
}
