<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePodRequest;
use Illuminate\Http\Request;
use XCom\Alien\AlienRepositoryInterface;
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

    public function store(PodRepositoryInterface $podRepository, AlienRepositoryInterface $alienRepository, Request $request)
    {
        // @todo Validate pod is sent?
        $rawPodData = $request->get('pod');
        $podData = $this->sanitizePod($rawPodData);

        $pod = $podRepository->create();
        foreach ($podData as $alienType => $amount) {
            for ($i = 0; $i < $amount; $i++) {
                $alienRepository->create($pod, ['type' => $alienType]);
            }
        }

        flash(self::POD_CREATED, 'success');

        return redirect(route('pods.index'));
    }

    /**
     * Receives an array of alien types and amounts. Some of these amounts might be 0, in which case they will
     * be removed
     *
     * @param array $pod
     * @return array
     */
    private function sanitizePod(array $pod)
    {
        $sanitizedPod = [];

        foreach ($pod as $alienType => $amount) {
            if ($amount > 0) {
                $sanitizedPod[$alienType] = $amount;
            }
        }

        return $sanitizedPod;
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

    public function create()
    {
        return view('pods.create');
    }
}
