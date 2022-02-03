<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(){
        $series = [
            'Smalville',
            'Lost',
            'Agents'
        ];
        return view('series.index', compact('series'));
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){
        $serie = new Serie();
        $serie->nome = $request->nome;
        $serie->save();
    }
}
