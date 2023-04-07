<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Suppor\Facades\Storage;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['peliculas']=Pelicula::paginate(5);
        return view('pelicula.index',$datos);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pelicula.create');
        

    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\http\Request $request
     * @return \Illuminate\http\Response


     */

    public function store(Request $request)
    {
        //

        $campos=[
            'Nombre'=>'required|String|max:100',
            'duracion_horas'=>'required|Integer|max:100',
            'duracion_minutos'=>'required|Integer|max:100',
            'duracion_segundos'=>'required|Integer|max:100',
        ];
        $mensaje=[
            'required'=>'El :atributo es requerido'
        ];

        $this->validate($request, $campos,$mensaje);


        //$datosPelicula = request()->all();
        $datosPelicula = request()->except('_token');
        Pelicula::insert($datosPelicula);

        //return response()->json($datosPelicula);

        return redirect('pelicula')->with('mensaje','Pelicula agregada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $pelicula=Pelicula::findOrFail($id);
        
        return view('pelicula.edit',compact('pelicula'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosPelicula = request()->except(['_token','_method']);
        Pelicula::where('id','=',$id)->update($datosPelicula);

        $pelicula=Pelicula::findOrFail($id);
        return view('pelicula.edit',compact('pelicula'));

    }

    /**
     * Remove the specified resource from storage.
     * 
     * 
     */
    public function destroy($id)
    {
        //
        Pelicula::destroy($id);
        return redirect('pelicula')->with('mensaje','Pelicula Borrada con exito');
    }
}
