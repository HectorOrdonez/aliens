<?php
namespace XCom\Alien\Entity;

use Illuminate\Database\Eloquent\Model;
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
    const TYPE_SECTOID = 'sectoid';
    const TYPE_FLOATER = 'floater';
    const TYPE_UNKNOWN = 'unknown';

    public $timestamps = false;

    protected $fillable = ['type', 'pod_id'];

    /**
     * @inheritdoc
     */
    public function newCollection(array $models = [])
    {
        return new AlienCollection($models);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return (string) $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = (string) $type;
    }

    public function pod()
    {
        return $this->belongsTo(Pod::class);
    }
}
