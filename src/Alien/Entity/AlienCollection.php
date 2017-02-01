<?php
namespace XCom\Alien\Entity;

use Illuminate\Database\Eloquent\Collection;

class AlienCollection extends Collection
{
    /**
     * @var Alien[]
     */
    protected $items;
}
