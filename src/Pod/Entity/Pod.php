<?php
namespace XCom\Pod\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pod
 *
 * @mixin \Eloquent
 *
 * @package XCom\Pod\Entity
 */
class Pod extends Model
{
    const TYPE_SECTOID = 'sectoid';
    const TYPE_FLOATER = 'floater';

    public $timestamps = false;

    protected $fillable = ['type'];

    /**
     * @inheritdoc
     */
    public function newCollection(array $models = [])
    {
        return new PodCollection($models);
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
}
