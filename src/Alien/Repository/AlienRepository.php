<?php
namespace XCom\Alien\Repository;

use XCom\Alien\Entity\Alien;
use XCom\Alien\Entity\AlienRepositoryInterface;

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
    public function createSectoid()
    {
        return $this->create(['type' => Alien::TYPE_SECTOID]);
    }

    /**
     * @param array $params
     *
     * @return Alien
     */
    private function create(array $params = [])
    {
        return $this->alienModel->create($params);
    }

    /**
     * @inheritdoc
     */
    public function createFloater()
    {
        return $this->create(['type' => Alien::TYPE_FLOATER]);
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
