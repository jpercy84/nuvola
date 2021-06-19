<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaViaje;
use App\Models\Cliente;

class ListaViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listaviaje = ListaViaje::all();
        return $listaviaje;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

         $xml = new \SimpleXMLElement(file_get_contents($request->file('archivo')));
         foreach ($xml->viaje as $element) {

            $email =  $element->email;
            $pais =   $element->pais;
            $ciudad = $element->ciudad;
            $fecha =  $element->fecha;
            
            $cliente = Cliente::where('email','=',$email)->get();
            
            if($cliente)
            {
              $viaje = new ListaViaje;   
              $viaje->email = $email;     
              $viaje->pais = $pais;     
              $viaje->ciudad = $ciudad;     
              $viaje->fecha_viaje = $fecha; 
              $res = $viaje->save();    
            }

         }
         $res = $viaje->save(); 
         if ($res) {
            return response()->json(['message' => 'List of travels create succesfully'], 201);
        }
         return response()->json(['message' => 'Error to create List of travels'], 500);
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
