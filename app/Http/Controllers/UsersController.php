<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('users/users', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users/manageUser', ['user' => $user]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (\Auth::user() == null) {
            return view('welcome');
        }

        if (\Auth::user()->isAdmin() == false) {
            return view('welcome');
        }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);


        $user = User::find($request->id);

        $user->admin = $request->status;
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != "") {

            $user->password = Hash::make($request->password);
        }

        if($user->save()) {
            return redirect('users');
        }

        return view('users/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::user() == null) {
            return view('welcome');
        }
        
        if (\Auth::user()->isAdmin() == false) {
            return view('welcome');
        }
        
        $user = User::find($id);
        if($user->delete()) {
            return redirect('users'); 
        }

        return back();
    }
}
