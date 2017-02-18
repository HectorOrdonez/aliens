<?php
namespace XCom\Alien;

use XCom\Alien\Entity\Alien;
use XCom\AlienType\Entity\AlienType;
use XCom\Pod\Entity\Pod;

interface AlienRepositoryInterface
{
    /**
     * Gives an empty instance of an alien
     *
     * @return Alien
     */
    public function model();

    /**
     * Creates an alien for given pod based on given alien type
     *
     * @param Pod $pod
     * @param AlienType $alienType
     * @return Alien
     */
    public function create(Pod $pod, AlienType $alienType);

    /**
     * Tries to find alien by id or returns false
     *
     * @param int $id
     * @return Alien|false
     */
    public function findById($id);

    /**
     * Destroys given alien
     *
     * @param Alien $alien
     * @return boolean
     */
    public function destroy(Alien $alien);

    public function update(Alien $alien, array $params);
}
