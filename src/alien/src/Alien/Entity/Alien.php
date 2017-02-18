<?php
namespace XCom\Alien\Entity;

use Illuminate\Database\Eloquent\Model;
use XCom\AlienType\Entity\AlienType;
use XCom\Pod\Entity\Pod;

/**
 * Class Alien
 *
 * @mixin \Eloquent
 *
 * @package XCom\Alien\Entity
 */
class Alien extends Model
{
    public $timestamps = false;

    /**
     * @inheritdoc
     */
    public function newCollection(array $models = [])
    {
        return new AlienCollection($models);
    }

    public function pod()
    {
        return $this->belongsTo(Pod::class);
    }

    public function alien_type()
    {
        return $this->belongsTo(AlienType::class);
    }
}
