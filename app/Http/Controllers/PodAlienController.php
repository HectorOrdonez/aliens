<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlienRequest;
use Illuminate\Http\Request;
use XCom\Alien\AlienRepositoryInterface;
use XCom\Pod\PodRepositoryInterface;

class PodAlienController extends Controller
{
    const ALIEN_CREATED = 'Alien created successfully';
    const ALIEN_UPDATED = 'Alien updated successfully';
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
        $params = [];
        $params['type'] = $request->exists('type') ? $request->get('type') : 'unknown';

        $pod = $podRepository->findById($podId);
        $alienRepository->create($pod, $params);

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

    /**
     * @param AlienRepositoryInterface $alienRepository
     * @param $podId
     * @param $alienId
     * @todo validate pod blabla
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AlienRepositoryInterface $alienRepository, $podId, $alienId, Request $request)
    {
        $alien = $alienRepository->findById($alienId);
        $alienRepository->update($alien, ['ammo' => $request->get('ammo')]);

        flash(sprintf(self::ALIEN_UPDATED, $alienId), 'success');

        return redirect(route('pods.index'));
    }
}
