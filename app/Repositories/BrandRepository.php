<?php


namespace App\Repositories;

use App\Contracts\BrandContract;
use App\Models\Brand;
use App\Traits\UploadAble;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

/**
 * Class BrandRepository
 * @package App\Repositories
 */
class BrandRepository extends BaseRepository implements BrandContract
{
    use UploadAble;

    /**
     * BrandRepository constructor.
     * @param BrandContract $model
     */
    public function __construct(BrandContract $model)
    {
        Log::info(__LINE__);
        parent::__construct($model);
        $this->model = $model;
        Log::info(__LINE__);
    }

    /**
     * list brand order by desc
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        Log::info(__LINE__);
        return $this->all($columns, $order, $sort);

    }

    /**
     * Find brand by id
     *
     * @param int $id
     * @return mixed
     */
    public function findBrandById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $exception) {
            throw new ModelNotFoundException($exception);
        }
    }

    /**
     * create brand
     *
     * @param array $params
     * @return mixed
     */
    public function createBrand(array $params)
    {
        try {
            $collection = collect($params);
            $logo = null;

            if ($collection->has('logo') && ($params['logo'] instanceof UploadedFile)) {
                $logo = $this->uploadOne($params['logo'], 'brands');
            }
            $merge = $collection->merge(compact('logo'));
            $brand = new Brand($merge->all());
            $brand->save();
            return $brand;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * Update brand by id
     *
     * @param array $params
     * @return mixed
     */
    public function updateBrand(array $params)
    {
        $brand = $this->findBrandById($params['id']);
        $collection = collect($params)->except('_token');

        if ($collection->has('logo') && ($params['logo'] instanceof UploadedFile)) {
            if ($brand->logo != null) {
                $this->deleteOne($brand->logo);
            }
            $logo = $this->uploadOne($params['logo'], 'brands');
        }

        $merge = $collection->merge(compact('logo'));
        $brand->update($merge->all());

        return $brand;
    }

    /**
     * delete brand by id
     *
     * @param $id
     * @return mixed
     */
    public function deleteBrand($id)
    {
        $brand = $this->findBrandById($id);

        if ($brand->logo != null) {
            $this->deleteOne($brand->logo);
        }

        $brand->delete();
        return $brand;
    }
}
