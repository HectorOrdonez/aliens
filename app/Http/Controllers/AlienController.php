<?php

namespace App\Http\Controllers;

use App\Alien;

class AlienController extends Controller
{
    public function index()
    {
        return view('alien.index', ['aliens' =>Alien::all()]);
    }

    public function store()
    {
        $alien = new Alien();
        $alien->save();

        return redirect(route('alien.index'));
    }

    public function destroy($id)
    {
        $alien = Alien::find($id);
        $alien->delete();

        return redirect(route('alien.index'));
    }
}
