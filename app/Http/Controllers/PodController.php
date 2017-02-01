<?php

namespace App\Http\Controllers;

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

    public function store(PodRepositoryInterface $podRepository)
    {
        $podRepository->create();
        flash(self::POD_CREATED, 'success');

        return redirect(route('pods.index'));
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
}
