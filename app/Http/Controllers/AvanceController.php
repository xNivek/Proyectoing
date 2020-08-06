<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avance;
use App\Bitacora;

class AvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $avances = Avance::where('bitacora_id', $id)->get();
        $bitacora_id=$id;

        return view('avance.index', compact('avances', 'bitacora_id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $bitacora_id = $id;
        
        return view('avance.create', compact('bitacora_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avance = Avance::create($request->all());
        return redirect()->route('bitacora.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avance = Avance::find($id);
        return view('avance.show',compact('avance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $avance= Avance::find($id);
        return  view('avance.edit',compact('avance'));
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
        $avance = Avance::find($id);
        $avance->nombre=$request->nombre;
        $avance->texto=$request->texto;
        $avance->save();

        //$avance->fill($request->all())->save();
        return redirect()->route('bitacora.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        avance::find($id)->delete();
        return back();
    }
}
