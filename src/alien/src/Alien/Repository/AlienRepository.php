<?php
namespace XCom\Alien\Repository;

use XCom\Alien\AlienRepositoryInterface;
use XCom\Alien\Entity\Alien;
use XCom\Pod\Entity\Pod;

class AlienRepository implements AlienRepositoryInterface
{
    /**
     * The ORM handler for aliens
     *
     * @var Alien
     */
    protected $alienModel;

    public function __construct(Alien $alien)
    {
        $this->alienModel = $alien;
    }

    /**
     * @param Pod $pod
     * @return Alien
     */
    public function create(Pod $pod)
    {
        $params = array_merge($this->alienDefaults(), ['pod_id' => $pod->id]);

        return $this->alienModel->create($params);
    }

    private function alienDefaults()
    {
        return [
            'type' => Alien::TYPE_UNKNOWN,
        ];
    }

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->alienModel->get();
    }

    public function findById($id)
    {
        return ($alien = $this->alienModel->find($id)) ? $alien : false;
    }

    public function destroy(Alien $alien)
    {
        return $alien->delete();
    }
}
