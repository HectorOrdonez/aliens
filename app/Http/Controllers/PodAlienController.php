<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlienRequest;
use XCom\Alien\AlienRepositoryInterface;
use XCom\Pod\PodRepositoryInterface;

class PodAlienController extends Controller
{
    const ALIEN_CREATED = 'Alien created successfully';
    const ERROR_ALIEN_NOT_FOUND = 'The Alien with id %d could not be found.';
    const ERROR_ALIEN_TYPE_UNKNOWN = 'Alien type %s is unknown.';
    const ERROR_ALIEN_NOT_DESTROYED = 'The Alien with id %d could not be destroyed.';

    /**
     * @param PodRepositoryInterface $podRepository
     * @param AlienRepositoryInterface $alienRepository
     * @param CreateAlienRequest $request
     * @param $podId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(
        PodRepositoryInterface $podRepository,
        AlienRepositoryInterface $alienRepository,
        CreateAlienRequest $request,
        $podId
    )
    {
        $pod = $podRepository->findById($podId);
        $alienRepository->create($pod);

        return redirect(route('pods.index'));
    }

    /**
     * @param AlienRepositoryInterface $alienRepository
     * @param $podId
     * @param $alienId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @todo Validate pod existance and belonging
     */
    public function destroy(AlienRepositoryInterface $alienRepository, $podId, $alienId)
    {
        $alien = $alienRepository->findById($alienId);

        if (!$alien) {
            flash(sprintf(self::ERROR_ALIEN_NOT_FOUND, $alienId), 'danger');
        } else if (!$alienRepository->destroy($alien)) {
            flash(sprintf(self::ERROR_ALIEN_NOT_DESTROYED, $alienId), 'danger');
        }

        return redirect(route('pods.index'));
    }
}
