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
    protected $AlienTypeModel;

    public function __construct(AlienType $AlienType)
    {
        $this->AlienTypeModel = $AlienType;
    }

    /**
     * @inheritdoc
     */
    public function create(array $params = [])
    {
        $alienType = $this->AlienTypeModel->newInstance();
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
        return $this->AlienTypeModel->get();
    }

    public function findById($id)
    {
        return ($AlienType = $this->AlienTypeModel->find($id)) ? $AlienType : false;
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
