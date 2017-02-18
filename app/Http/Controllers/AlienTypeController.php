<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use XCom\AlienType\AlienTypeRepositoryInterface;

class AlienTypeController extends Controller
{
    const ERROR_ALIEN_TYPE_NOT_FOUND = 'Alien Type %d not found';
    const ERROR_ALIEN_TYPE_NOT_DESTROYED = 'Alien Type %d could not be destroyed';
    const ALIEN_TYPE_DESTROYED = 'Alien Type successfully destroyed';

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

    public function destroy(AlienTypeRepositoryInterface $alienTypeRepository, $id)
    {
        $alienType = $alienTypeRepository->findById($id);

        if (!$alienType) {
            flash(sprintf(self::ERROR_ALIEN_TYPE_NOT_FOUND, $id), 'danger');
        } else if (!$alienTypeRepository->destroy($alienType)) {
            flash(sprintf(self::ERROR_ALIEN_TYPE_NOT_DESTROYED, $id), 'danger');
        } else {
            flash(self::ALIEN_TYPE_DESTROYED, 'success');
        }

        return redirect(route('alien_types.index'));
    }
}
