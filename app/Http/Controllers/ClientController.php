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
        // $rules = [
        //     'name' => 'required|max:255',
        //     'phone' => 'required|unique:clients,phone',
        //     'email' => 'max:255',
        //     'city' => 'max:100',
        //     'state' => 'max:100',
        // ];


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

        // $validator = Validator::make($request->all(), $rules);
        // dd($validator);

        // create the client
        // return $request->user()->create($request->only([
        //     'name',
        //     'phone',
        //     'email',
        //     'city',
        //     'state'
        // ]));

        $user->clients()->create($request->only([
            'name',
            'phone',
            'email',
            'city',
            'state'
        ]));

        return $user;

        // return $request->user()->updateOrCreate($request);

        // dd($request);

        // if ($validator->fails()) {
        //     return back()
        //         ->withInput()
        //         ->withErrors($validator);
        // } else {
        // dd($validator);

        // $data = $request->input();
        // $client = new Client;

        // $client->name = $data['name'];
        // $client->phone = $data['phone'];
        // $client->city = $data['city'];
        // $client->email = $data['email'];
        // $client->state = $data['state'];

        // return $user = $request->all;
        // dd($user);

        // $request->user()->clients()->create();

        // return $user = Client::find(1);
        // dd($user);







        // $client->add_by = $data['state'];


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
