<?php
namespace XCom\Pod;

use XCom\Pod\Entity\Pod;

interface PodRepositoryInterface
{
    /**
     * Returns all Pods
     *
     * @return Pod[]
     */
    public function findAll();

    /**
     * Creates an Pod of type Sectoid
     * @return Pod
     */
    public function create();

    /**
     * Tries to find Pod by id or returns false
     *
     * @param int $id
     * @return Pod|false
     */
    public function findById($id);

    /**
     * Destroys given Pod
     *
     * @param Pod $Pod
     * @return boolean
     */
    public function destroy(Pod $Pod);
}
