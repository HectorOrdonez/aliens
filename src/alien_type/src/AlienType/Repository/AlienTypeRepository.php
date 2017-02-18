<?php
namespace XCom\AlienType\Repository;

use XCom\AlienType\AlienTypeRepositoryInterface;
use XCom\AlienType\Entity\AlienType;
use XCom\Pod\Entity\Pod;

class AlienTypeRepository implements AlienTypeRepositoryInterface
{
    /**
     * The ORM handler for AlienTypes
     *
     * @var AlienType
     */
    protected $alienTypeModel;

    public function __construct(AlienType $AlienType)
    {
        $this->alienTypeModel = $AlienType;
    }

    /**
     * @inheritdoc
     */
    public function model()
    {
        return $this->alienTypeModel->newInstance();
    }

    /**
     * @inheritdoc
     */
    public function create(array $params = [])
    {
        $alienType = $this->model();
        $alienType->name = $params['name'];
        $alienType->image_link = $params['image_link'];
        $alienType->health = $params['health'];
        $alienType->ammo = $params['ammo'];
        $alienType->save();

        return $alienType;
    }

    /**
     * @inheritdoc
     */
    public function findAll()
    {
        return $this->alienTypeModel->get();
    }

    public function findById($id)
    {
        return ($AlienType = $this->alienTypeModel->find($id)) ? $AlienType : false;
    }

    public function destroy(AlienType $AlienType)
    {
        return $AlienType->delete();
    }

    public function update(AlienType $AlienType, array $params)
    {
        if(isset($params['ammo']))
        {
            $AlienType->ammo = $params['ammo'];
            $AlienType->save();
        }

        return true;
    }
}
