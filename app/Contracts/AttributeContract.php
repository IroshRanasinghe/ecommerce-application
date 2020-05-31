<?php


namespace App\Contracts;

/**
 * Interface AttributeContract
 * @package App\Contracts
 */
interface AttributeContract
{

    /**
     * list attribute order by desc
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listAttributes(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * Find attribute by id
     *
     * @param int $id
     * @return mixed
     */
    public function findAttributeById(int $id);

    /**
     * create attribute
     *
     * @param array $params
     * @return mixed
     */
    public function createAttribute(array $params);

    /**
     * Update attribute
     *
     * @param array $params
     * @return mixed
     */
    public function updateAttribute(array $params);

    /**
     * delete attribute by id
     *
     * @param $id
     * @return mixed
     */
    public function deleteAttribute($id);

}
