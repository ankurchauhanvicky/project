<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Singer;
use App\Models\Song;


class SingerController extends Controller
{
    public function add_singer()
    {
        $singer= new Singer();
        $singer->name= 'Diljit';
        $singer->save();

         $songids= [1,2];
        $singer->songs()->attach($songids);

    }

    public function show_singer($id)
    {
        $singer= Song::find($id)->singer;
        return $singer;
    }

}
