<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return view("cursos.index");
    }

    public function create()
    {
        return view("cursos.create");
    }

    public function show($curso)
    {
        return view("cursos.show", compact('curso'));
    }

    // Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
    //     if ($categoria) {
    //         return "Bienvenido al curso de $curso de la categoria $categoria";
    //     } else {
    //         return "Bienvenido al curso de $curso";
    //     }
    // });
}
