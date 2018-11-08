<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Dueno;;
use App\Http\Requests\DuenoRequest;
class DuenoController extends Controller
{
    public function index()
    {
        //propiedades del dueno
        //$duenos = Dueno::orderBy('id_dueno', 'ASC')->paginate(5);
        //return view('duenos.index', compact('duenos') );
        return view('duenos.index');
    }
    public function create(){

        return view('duenos.create');
    }



}
