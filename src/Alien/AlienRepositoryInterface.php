<?php
namespace XCom\Alien;

use XCom\Alien\Entity\Alien;

interface AlienRepositoryInterface
{
    /**
     * Returns all aliens
     *
     * @return Alien[]
     */
    public function findAll();

    /**
     * Creates an alien of type Sectoid
     * @return Alien
     */
    public function createSectoid();

    /**
     * Creates an alien of type Floater
     * @return Alien
     */
    public function createFloater();

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
}
