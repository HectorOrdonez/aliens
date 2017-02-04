<?php
namespace XCom\Alien;

use XCom\Alien\Entity\Alien;
use XCom\Pod\Entity\Pod;

interface AlienRepositoryInterface
{
    /**
     * Creates an alien
     * @param Pod $pod
     * @param array $params
     * @return Alien
     */
    public function create(Pod $pod, array $params = []);

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
