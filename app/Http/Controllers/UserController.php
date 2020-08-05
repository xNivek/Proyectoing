<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (true){
           
            $users = User::orderBy('id', 'DESC')->paginate();
            return view('user.index', compact('users'));


        }

        return redirect()->route('home');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required',
            'rut' => 'required',
            'email' => 'required',
            'rol' => 'required',
            'password' => 'required'
        ]);

        $user=new User;
        $user->name=$request->input('name');
        $user->rut=$request->input('rut');
        $user->email=$request->input('email');
        $user->rol=$request->input('rol');
        $user->password= bcrypt ($request->input('password')); 
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
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
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name=$request->input('name');
        /**insertar modificador de rut */
        $user->email=$request->input('email');
        $user->rol=$request->input('rol');
        if ($request->input('password') != ""){
            $user->password= bcrypt ($request->input('password')); 
        }
        $user->save();
        
        


        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->status == "VISIBLE")
        {
            $user->status="NO VISIBLE";
        }
        else
        {
            $user->status="VISIBLE";
        }
        $user->save();

        return redirect()->route('user.index');
    }

    
}
