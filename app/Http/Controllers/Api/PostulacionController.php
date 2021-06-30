<?php

namespace App\Http\Controllers\Api;

use App\Models\Postulacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();

        $postulacions = Postulacion::
        join('practicantes', 'postulacions.practicante_id', '=', 'practicantes.id')
        ->where('practicantes.id', 251)
        ->select('postulacions.*', 'postulacions.id')
        ->orderBy('postulacions.id', 'desc')
        ->paginate(1000);
        
        return response()->json($postulacions, 200);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Postulacion $postulacion)
    {
        return response()->json($postulacion, 200);
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

    public function get_all_by_practicante($id)
    {
        //$practicante = auth()->user();

        $postulacions = Postulacion::
        join('practicantes', 'postulacions.practicante_id', '=', 'practicantes.id')
        ->where('postulacions.practicante_id', $id)
        //->select('postulacions.*')
        ->orderBy('postulacions.id', 'desc')
        ->paginate(1000);
        
        return response()->json($postulacions, 200);
    }
    
}
