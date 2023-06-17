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



        //validation
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|unique:clients,phone',
            'email' => 'max:255',
            'city' => 'max:100',
            'state' => 'max:100',
        ]);

        // dd($request);
        $user = $request->user();
        $client = $user->clients()->create($request->only([
            'name',
            'phone',
            'email',
            'city',
            'state',
            // 'add_by' => $user->id
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
