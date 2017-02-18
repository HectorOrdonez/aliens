<?php
namespace XCom\Alien\Repository;

use XCom\Alien\AlienRepositoryInterface;
use XCom\Alien\Entity\Alien;
use XCom\AlienType\Entity\AlienType;
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
     * @inheritdoc
     */
    public function model()
    {
        return $this->alienModel->newInstance();
    }

    /**
     * @inheritdoc
     */
    public function create(Pod $pod, AlienType $alienType)
    {
        $alien = $this->model();
        $alien->pod_id = $pod->id;
        $alien->alien_type_id = $alienType->id;
        $alien->health = $alienType->health;
        $alien->ammo = $alienType->ammo;
        $alien->save();

        return $alien;
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

    public function update(Alien $alien, array $params)
    {
        if (isset($params['ammo'])) {
            $alien->ammo = $params['ammo'];
            $alien->save();
        }

        return true;
    }
}
