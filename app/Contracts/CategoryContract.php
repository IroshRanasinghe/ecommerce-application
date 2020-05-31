<?php

namespace App\Contracts;
/**
 * Interface CategoryContract
 * @package App\Contracts
 *
 */
interface CategoryContract
{
    /**
     * list category order by desc
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * Find category by id
     *
     * @param int $id
     * @return mixed
     */
    public function findCategoryById(int $id);

    /**
     * create category
     *
     * @param array $params
     * @return mixed
     */
    public function createCategory(array $params);

    /**
     * Update category
     *
     * @param array $params
     * @return mixed
     */
    public function updateCategory(array $params);

    /**
     * delete category by id
     *
     * @param $id
     * @return mixed
     */
    public function deleteCategory($id);
}
