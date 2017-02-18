<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePodRequest;
use Illuminate\Http\Request;
use XCom\Alien\AlienRepositoryInterface;
use XCom\AlienType\AlienTypeRepositoryInterface;
use XCom\Pod\PodRepositoryInterface;

class PodController extends Controller
{
    const POD_CREATED = 'Pod created successfully';
    const POD_DESTROYED = 'Pod destroyed successfully';
    const ERROR_POD_NOT_FOUND = 'The Pod with id %d could not be found.';
    const ERROR_POD_TYPE_UNKNOWN = 'Pod type %s is unknown.';
    const ERROR_POD_NOT_DESTROYED = 'The Pod with id %d could not be destroyed.';

    public function index(PodRepositoryInterface $podRepository)
    {
        $pods = $podRepository->findAll();

        return view('pods.index', compact('pods'));
    }

    public function store(
        PodRepositoryInterface $podRepository,
        AlienTypeRepositoryInterface $alienTypeRepository,
        AlienRepositoryInterface $alienRepository,
        Request $request)
    {
        // [id => amount]
        $rawAlienTypes = $request->get('alien_types');

        $alienTypes = $this->clearEmpties($rawAlienTypes);

        $pod = $podRepository->create();

        foreach ($alienTypes as $alienTypeId => $amount) {
            $alienType = $alienTypeRepository->findById($alienTypeId);
            for ($i = 0; $i < $amount; $i++) {
                $alienRepository->create($pod, $alienType);
            }
        }

        flash(self::POD_CREATED, 'success');

        return redirect(route('pods.index'));
    }

    /**
     * Receives an array of alien types and amounts. Some of these amounts might be 0, in which case they will
     * be removed
     *
     * @param array $rawAlienTypes
     * @return array
     */
    private function clearEmpties(array $rawAlienTypes)
    {
        $sanitized = [];

        foreach ($rawAlienTypes as $alienTypeId => $amount) {
            if ($amount > 0) {
                $sanitized[$alienTypeId] = $amount;
            }
        }

        return $sanitized;
    }

    public function destroy(PodRepositoryInterface $podRepository, $id)
    {
        $pod = $podRepository->findById($id);

        if (!$pod) {
            flash(sprintf(self::ERROR_POD_NOT_FOUND, $id), 'danger');
        } else if (!$podRepository->destroy($pod)) {
            flash(sprintf(self::ERROR_POD_NOT_DESTROYED, $id), 'danger');
        } else {
            flash(self::POD_DESTROYED, 'success');
        }

        return redirect(route('pods.index'));
    }

    public function create(AlienTypeRepositoryInterface $alienTypeRepository)
    {
        $alienTypes = $alienTypeRepository->findAll();

        return view('pods.create', compact('alienTypes'));
    }
}
