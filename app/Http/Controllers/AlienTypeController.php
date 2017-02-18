<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use XCom\AlienType\AlienTypeRepositoryInterface;

class AlienTypeController extends Controller
{
    public function index(AlienTypeRepositoryInterface $alienTypeRepository)
    {
        $alienTypes = $alienTypeRepository->findAll();

        return view('alien_types.index', compact('alienTypes'));
    }

    public function create()
    {
        return view('alien_types.create');
    }

    public function store(AlienTypeRepositoryInterface $alienTypeRepository, Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'image_link' => $request->get('image_link'),
            'health' => $request->get('health'),
            'ammo' => $request->get('ammo'),
        ];

        $alienTypeRepository->create($data);

        return redirect(route('alien_types.index'));
    }
}
