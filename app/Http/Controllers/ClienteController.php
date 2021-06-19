<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\File;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $clientes = Cliente::all();
         return view('cliente.index',compact('clientes'));
  
    }

 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getlistClient(Request $request)
    {

       

         $clientes = Cliente::when($request->email, function ($query, $email) {
            return $query->where('email', 'like', "%{$email}%");
        })->when($request->nombre, function ($query, $nombre) {
            return $query->where('nombre', 'like', "%{$nombre}%");
        })->when($request->apellidos, function ($query,$apellidos){
            return $query->where('apellidos', 'like',"%{$apellidos}%");
        })->paginate(5);
         return $clientes;
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


       /* $request->validate([
            'email'=>'required',
            'telefono'=>'required',
            'nombre'=>'required',
            'apellidos'=>'required',
            'direccion'=>'required',
            'foto'=>'required'

        ]);*/


        //
        $cliente = new Cliente;
        $res ='';
        $clientesearch = Cliente::find($request->get('email'));
        if(!$clientesearch)
        {

            $cliente->email=$request->get('email');
            $cliente->telefono=$request->get('telefono');
            $cliente->nombre=$request->get('nombre');
            $cliente->apellidos=$request->get('apellidos');
            $cliente->direccion=$request->get('direccion');
            $url_image = $this->upload($request->file('foto'),$request->get('email'));
            $cliente->foto = $url_image;

           $res = $cliente->save();

        }
        
        if ($res) {
            return response()->json(['message' => 'Successfully created client'], 200);
        }
        return response()->json(['message' => 'Error to create client, the client already exists'], 500);
        




    }

    private function upload($image,$email)
    {
        $path_info = pathinfo($image->getClientOriginalName());
        $post_path = 'images/fotos';

        $rename = $email . '.' . $path_info['extension'];
        $image->move(public_path() . "/$post_path", $rename);
        return "$post_path/$rename";
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
        $cliente = Cliente::findOrFail(Crypt::decrypt($id));
        return view('cliente.show',compact('cliente'));
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
    //public function update(Request $request, $id)
    public function update(Request $request)
    {
        //
         $cliente = Cliente::findOrFail($request->get('email'));
         $cliente->telefono = $request->has('telefono') ? $request->get('telefono') : $cliente->telefono;
         $cliente->nombre = $request->has('nombre') ? $request->get('nombre') : $cliente->nombre;
         $cliente->apellidos = $request->has('apellidos') ? $request->get('apellidos') : $cliente->apellidos;
         $cliente->direccion = $request->has('direccion') ? $request->get('direccion') : $cliente->direccion;
         //$cliente->foto = $request->has('foto') ? $request->file('foto') : $cliente->foto;
         if($request->has('foto')){
             $url_image = $this->upload($request->file('foto'),$request->get('email'));
             $cliente->foto = $url_image;
         }
         
         $res = $cliente->save();

         if ($res) {
            return response()->json(['message' => 'Updated client succesfully'], 201);
        }
        return response()->json(['message' => 'Error to update client'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
       
        
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($email)
    {
        //
        $cliente = Cliente::findOrFail($email);
        

        $image_path = $cliente->foto;

     
        if(file_exists($image_path))
        {
           unlink($image_path); 

        }
       
       
      
        $res = $cliente->delete();
        if ($res) {
           

            return response()->json(['message' => 'Client has been delete','codaccion' => '01'], 201);
        }
        return response()->json(['message' => 'Error to delete Client','codaccion' => '02'], 500);



    }
}
