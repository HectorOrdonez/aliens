<?php
namespace XCom\Pod\Repository;

use XCom\Alien\Entity\Alien;
use XCom\Pod\Entity\Pod;
use XCom\Pod\PodRepositoryInterface;

class PodRepository implements PodRepositoryInterface
{
    /**
     * The ORM handler for Pods
     *
     * @var Pod
     */
    protected $PodModel;

    public function __construct(Pod $Pod)
    {
        $this->PodModel = $Pod;
    }

    /**
     * @param array $params
     *
     * @return Pod
     */
    public function create(array $params = [])
    {
        return $this->PodModel->create($params);
    }

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->PodModel->with('aliens')->get();
    }

    public function findById($id)
    {
        return ($Pod = $this->PodModel->find($id)) ? $Pod : false;
    }

    public function destroy(Pod $Pod)
    {
        return $Pod->delete();
    }
}
