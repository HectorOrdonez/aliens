<?php
namespace XCom\AlienType\Entity;

use Illuminate\Database\Eloquent\Model;
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
        return new AlienTypeCollection($models);
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
