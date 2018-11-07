<?php

namespace App\Http\Controllers;

class InquilinoController extends Controller
{
    public function index()
    {
        return view('inquilino/index');
    }

    public function historial()
    {
        return view('inquilino/historial');
    }

    public function anular()
    {
        return view('inquilino/anular');
    }

    public function busqueda()
    {
        return view('inquilino/busqueda');
    }
}
