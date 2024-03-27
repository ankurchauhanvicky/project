<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Singer;
use App\Models\Song;

class SongController extends Controller
{
    public function add_song()
    {
        $song = new Song();
        $song->tittle = 'hello';
        $song->save();
    }
    public function show_song($id)
    {
        $songs = Singer::find($id)->songs;
        return $songs;
    }


}
