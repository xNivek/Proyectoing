<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bitacora;
use App\User;

class BitacoraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $bitacoras = Bitacora::orderBy('id', 'DESC')->paginate();
        return view('bitacora.index', compact('bitacoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        
        $tesistas = User::where([['rol', '=', 'Estudiante tesista'],['status', '=', 'VISIBLE']])->get();
        $profesores = User::where([['rol', '=', 'Profesor guia'],['status', '=', 'VISIBLE']])->get();
        
        return view('bitacora.create', compact('tesistas', 'profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $profesor1= $request->input('profesor1_id');
        $profesor2= $request->input('profesor2_id');
        $tesista1 = $request->input('tesista1_id');
        $tesista2 = $request->input('tesista2_id');
        $tesista3 = $request->input('tesista3_id');
        $tesista4 = $request->input('tesista4_id');
        $titulo = $request->input('nombre');
        $user_id = $request->input('user_id');

        if($tesista1 != $tesista2 and $tesista1 != $tesista3 and $tesista1 != $tesista4 and $tesista2 != $tesista3 and $tesista2 != $tesista4 and $tesista3 != $tesista4){
            if($profesor1 != $profesor2){
                
                if($profesor2 == 100){
                    $profesor2 = null;
                }
        
                if($tesista2 == 101){
                    $tesista2 = null;
                }
                if($tesista3 == 102){
                    $tesista3 = null;
                }
                if($tesista4 == 103){
                    $tesista4 = null;
                }

                $bitacora = Bitacora::create([
                    'nombre' => $titulo,
                    'profesor1_id' => $profesor1,
                    'profesor2_id' => $profesor2,
                    'tesista1_id' => $tesista1,
                    'tesista2_id' => $tesista2,
                    'tesista3_id' => $tesista3,
                    'tesista4_id' => $tesista4,
                    'user_id' => $user_id,
                ]);
                return redirect()->route('bitacora.index');
            }else{
                return back()->with('error', 'Ha ingresado dos profesores iguales en los campos');
            }
        }else{
            return back()->with('error', 'Ha ingresado el mismo estudiante en los campos');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bitacora = Bitacora::find($id);
        return view('bitacora.show', compact('bitacora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bitacora = Bitacora::find($id);
        return view('bitacora.edit', compact('bitacora'));
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
        $bitacora= Bitacora::find($id);
        $bitacora->fill($request->all())->save();
        
        return redirect()->route('bitacora.edit',$bitacora->id)
            ->with('info','Titulo Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bitacora = Bitacora::find($id)->delete();
        return back()->with('info','Eliminado correctamente');
    }

    //metodos propios

    public function indexEstudiante()
    {
        $bitacoras = Bitacora::orderBy('id', 'DESC')->paginate();
        return view('bitacora.indexEstudiante', compact('bitacoras'));
    }

    public function indexProfesor()
    {
        $bitacoras = Bitacora::orderBy('id', 'DESC')->paginate();
        return view('bitacora.indexProfesor', compact('bitacoras'));
    }
}
