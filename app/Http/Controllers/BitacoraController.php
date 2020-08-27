<?php

namespace App\Http\Controllers;

use Mail;
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
                    $this->sendEmailInicioTrabajo($bitacora);
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
        $tesistas = User::where([['rol', '=', 'Estudiante tesista'],['status', '=', 'VISIBLE']])->get();
        $profesores = User::where([['rol', '=', 'Profesor guia'],['status', '=', 'VISIBLE']])->get();
        $bitacora = Bitacora::find($id);
        
        return view('bitacora.edit', compact('tesistas', 'profesores','bitacora'));
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

        $profesor1= $request->input('profesor1_id');
        $profesor2= $request->input('profesor2_id');
        $tesista1 = $request->input('tesista1_id');
        $tesista2 = $request->input('tesista2_id');
        $tesista3 = $request->input('tesista3_id');
        $tesista4 = $request->input('tesista4_id');
        $bitacora = Bitacora::find($id);

        if($tesista1 != $tesista2 and $tesista1 != $tesista3 and $tesista1 != $tesista4 and $tesista2 != $tesista3 and $tesista2 != $tesista4 and $tesista3 != $tesista4){
            if($profesor1 != $profesor2){

        
                $bitacora->nombre=$request->input('nombre');
                $bitacora->profesor1_id=$request->input('profesor1_id');
                $bitacora->tesista1_id=$request->input('tesista1_id');
                if($bitacora->profesor2_id=$request->input('profesor2_id')==100){
                    $bitacora->profesor2_id=null;
                }else{
                    $bitacora->profesor2_id=$request->input('profesor2_id');
                }
                
                if($bitacora->tesista2_id=$request->input('tesista2_id')==101){
                    $bitacora->tesista2_id=null;
                }else{
                    $bitacora->tesista2_id=$request->input('tesista2_id');
                }

                if($bitacora->tesista3_id=$request->input('tesista3_id')==102){
                    $bitacora->tesista3_id=null;
                }else{
                    $bitacora->tesista3_id=$request->input('tesista3_id');
                }

                if($bitacora->tesista4_id=$request->input('tesista4_id')==103){
                    $bitacora->tesista4_id=null;
                }else{
                    $bitacora->tesista4_id=$request->input('tesista4_id');
                }

                $bitacora->save();
                return redirect()->route('bitacora.index')->with('info', 'Actualizado correctamente');

            }else{
                return back()->with('error', 'Ha ingresado dos profesores iguales en los campos');
            }
        }else{
            return back()->with('error', 'Ha ingresado el mismo estudiante en los campos');
        }
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bitacora = Bitacora::find($id);
        if($bitacora->status == "En Desarollo")
        {
            $bitacora->status="No continuidad";
        }
        else
        {
            $bitacora->status="En Desarollo";
        }
        $bitacora->save();

        return redirect()->route('bitacora.index')->with('info','Bitacora Finalizada por no continuidad');
        
    }
    public function cambio($id)
    {
        $bitacora = Bitacora::find($id);
        if($bitacora->status == "En Desarollo")
        {
            $bitacora->status="Aprobacion";
        }
        else
        {
            $bitacora->status="En Desarollo";
        }
        $bitacora->save();

        return redirect()->route('bitacora.index')->with('info','Bitacora Finalizada por aprobacion');
        
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

    private function sendEmailInicioTrabajo($bitacora)
    {
        $user = user::find($bitacora->profesor1_id);
        $para      = $user->email;
        $titulo    = 'Inicio de trabajo: '.$bitacora->nombre;
        $mensaje   = 'Se ha iniciado un trabajo de titulo';
        $cabeceras = 'From: lucarionot@gmail.com' . "\r\n" .
            'Reply-To: lucarionot@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($para, $titulo, $mensaje, $cabeceras);

        $user = user::find($bitacora->tesista1_id);
        $para      = $user->email;
        $titulo    = 'Inicio de trabajo: '.$bitacora->nombre;
        $mensaje   = 'Se ha iniciado un trabajo de titulo';
        $cabeceras = 'From: lucarionot@gmail.com' . "\r\n" .
            'Reply-To: lucarionot@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($para, $titulo, $mensaje, $cabeceras);

        if ($bitacora->profesor2_id){
            $user = user::find($bitacora->profesor2_id);
            $para      = $user->email;
            $titulo    = 'Inicio de trabajo: '.$bitacora->nombre;
            $mensaje   = 'Se ha iniciado un trabajo de titulo';
            $cabeceras = 'From: lucarionot@gmail.com' . "\r\n" .
                'Reply-To: lucarionot@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    
            mail($para, $titulo, $mensaje, $cabeceras);

        }

        if ($bitacora->tesista2_id){
            $user = user::find($bitacora->tesista2_id);
            $para      = $user->email;
            $titulo    = 'Inicio de trabajo: '.$bitacora->nombre;
            $mensaje   = 'Se ha iniciado un trabajo de titulo';
            $cabeceras = 'From: lucarionot@gmail.com' . "\r\n" .
            'Reply-To: lucarionot@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            mail($para, $titulo, $mensaje, $cabeceras);
        }

        if ($bitacora->tesista3_id){
            $user = user::find($bitacora->tesista3_id);
            $para      = $user->email;
            $titulo    = 'Inicio de trabajo: '.$bitacora->nombre;
            $mensaje   = 'Se ha iniciado un trabajo de titulo';
            $cabeceras = 'From: lucarionot@gmail.com' . "\r\n" .
            'Reply-To: lucarionot@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            mail($para, $titulo, $mensaje, $cabeceras);
        }

        if ($bitacora->tesista4_id){
            $user = user::find($bitacora->tesista4_id);
            $para      = $user->email;
            $titulo    = 'Inicio de trabajo: '.$bitacora->nombre;
            $mensaje   = 'Se ha iniciado un trabajo de titulo';
            $cabeceras = 'From: lucarionot@gmail.com' . "\r\n" .
            'Reply-To: lucarionot@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            mail($para, $titulo, $mensaje, $cabeceras);
        }

    }

}
