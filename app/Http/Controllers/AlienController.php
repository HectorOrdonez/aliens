<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlienRequest;
use Illuminate\Http\Request;
use XCom\Alien\Entity\Alien;
use XCom\Alien\Entity\AlienRepositoryInterface;

class AlienController extends Controller
{
    const ALIEN_CREATED = 'Alien created successfully';
    const ERROR_ALIEN_NOT_FOUND = 'The Alien with id %d could not be found.';
    const ERROR_ALIEN_TYPE_UNKNOWN = 'Alien type %s is unknown.';
    const ERROR_ALIEN_NOT_DESTROYED = 'The Alien with id %d could not be destroyed.';

    public function index(AlienRepositoryInterface $alienRepository)
    {
        $aliens = $alienRepository->findAll();

        return view('aliens.index', compact('aliens'));
    }

    public function store(AlienRepositoryInterface $alienRepository, CreateAlienRequest $request)
    {
        if ($request->get('type') === Alien::TYPE_SECTOID) {
            $alienRepository->createSectoid();
            flash(self::ALIEN_CREATED, 'success');
        } elseif ($request->get('type') === Alien::TYPE_FLOATER) {
            $alienRepository->createFloater();
            flash(self::ALIEN_CREATED, 'success');
        } else {
            flash(sprintf(self::ERROR_ALIEN_TYPE_UNKNOWN, $request->get('type')), 'danger');
        }

        return redirect(route('aliens.index'));
    }

    public function destroy(AlienRepositoryInterface $alienRepository, $id)
    {
        $alien = $alienRepository->findById($id);

        if (!$alien) {
            flash(sprintf(self::ERROR_ALIEN_NOT_FOUND, $id), 'danger');
        } else if (!$alienRepository->destroy($alien)) {
            flash(sprintf(self::ERROR_ALIEN_NOT_DESTROYED, $id), 'danger');
        }

        return redirect(route('aliens.index'));
    }
}
