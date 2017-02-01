<?php
namespace XCom\Pod\Entity;

use Illuminate\Database\Eloquent\Collection;

class PodCollection extends Collection
{
    /**
     * @var Pod[]
     */
    protected $items;
}
