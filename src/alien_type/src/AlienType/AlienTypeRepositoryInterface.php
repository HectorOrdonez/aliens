<?php
namespace XCom\AlienType;

use XCom\AlienType\Entity\AlienType;
use XCom\AlienType\Entity\AlienTypeCollection;
use XCom\Pod\Entity\Pod;

interface AlienTypeRepositoryInterface
{
    /**
     * Creates an AlienType
     *
     * @param array $params
     * @return AlienType
     */
    public function create(array $params = []);

    /**
     * Tries to find AlienType by id or returns false
     *
     * @param int $id
     * @return AlienType|false
     */
    public function findById($id);

    /**
     * Returns all alien types
     *
     * @return AlienType[]|AlienTypeCollection
     */
    public function findAll();

    /**
     * Destroys given AlienType
     *
     * @param AlienType $AlienType
     * @return boolean
     */
    public function destroy(AlienType $AlienType);

    public function update(AlienType $AlienType, array $params);
}
