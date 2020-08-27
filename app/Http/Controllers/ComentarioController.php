<?php

namespace App\Http\Controllers;
use App\Comentario;
use App\Avance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $comentario = Comentario::where('avance_id', $id)->get();
        $avance_id=$id;

        return view('comentario.index', compact('comentario', 'avance_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
       
        $avance_id=$id;
        
        return view('comentario.create', compact('avance_id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //dd($request->input('avance_id'));
        $comentario = Comentario::create($request->all());
       // return redirect()->route('bitacora.indexProfesor');
        return redirect()->route('indexComentario', ['id'=>$request->input('avance_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentario::find($id);
        return view('comentario.show',compact('comentario'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comentario = Comentario::find($id);
        return view('comentario.edit',compact('comentario'));
        //return redirect()->route('indexComentario', ['id'=>$request->input('avance_id')]);
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
        
        $comentario= Comentario::find($id);
        $comentario->fill($request->all())->save();
        return redirect()->route('bitacora.indexProfesor');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comentario::find($id)->delete();
        return back();
    }



    public function indexAlumno($id){

        $comentario = Comentario::where('avance_id', $id)->get();
        $avance_id=$id;

        return view('Alumno', compact('comentario', 'avance_id'));

    }

}
