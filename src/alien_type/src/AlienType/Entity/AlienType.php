<?php
namespace XCom\AlienType\Entity;

use Illuminate\Database\Eloquent\Model;
use XCom\Alien\Entity\Alien;
use XCom\Pod\Entity\Pod;

/**
 * Class AlienType
 *
 * @mixin \Eloquent
 *
 * @package XCom\AlienType\Entity
 */
class AlienType extends Model
{
    /**
     * @inheritdoc
     */
    public function newCollection(array $models = [])
    {
        return new AlienTypeCollection($models);
    }

    public function aliens()
    {
        return $this->hasMany(Alien::class);
    }
}
