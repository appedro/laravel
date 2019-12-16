<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class  FormsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->lastname  = $request->lastname;
        $user->email  = $request->email;
        $user->phone1 = $request->mainphone;
        if(!empty($request->phone2)){
            $user->phone2  = $request->phone2;
        }else{
            $user->phone2  = "";
        }

        if(!empty($request->phone3)){
            $user->phone3  = $request->phone2;
        }else{
            $user->phone3  = "";
        }

        if(!empty($request->phone4)){
            $user->phone4  = $request->phone2;
        }else{
            $user->phone4  = "";
        }

        if(!empty($request->phone5)){
            $user->phone5  = $request->phone2;
        }else{
            $user->phone5  = "";
        }

        if(!empty($request->phone6)){
            $user->phone6  = $request->phone2;
        }else{
            $user->phone6  = "";
        }

        $user->birthday = $request->birthday;
        $user->city = $request->city;
        $user->number = $request->number;
        $user->uf = $request->uf;
        $user->complement = $request->complement;
        $user->address = $request->address;
        $user->district = $request->district;
        $user->zip = $request->zip;

        // $user->phone1  = $request->phone;
        $user->save();
        return view('cadastro');
        // return redirect()->route('user.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("listInfos", [
            'user'=>$user
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('userView', [
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return view('user.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
