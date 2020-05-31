<?php


namespace App\Contracts;

/**
 * Interface BrandContract
 * @package App\Contracts
 */
interface BrandContract
{
    /**
     * list brand order by desc
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * Find brand by id
     *
     * @param int $id
     * @return mixed
     */
    public function findBrandById(int $id);

    /**
     * create brand
     *
     * @param array $params
     * @return mixed
     */
    public function createBrand(array $params);

    /**
     * Update brand by id
     *
     * @param array $params
     * @return mixed
     */
    public function updateBrand(array $params);

    /**
     * delete brand by id
     *
     * @param $id
     * @return mixed
     */
    public function deleteBrand($id);
}
