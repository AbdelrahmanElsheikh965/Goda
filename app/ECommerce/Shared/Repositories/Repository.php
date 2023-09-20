<?php


namespace App\ECommerce\Shared\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    public function __construct(protected Model $model) {}

    public function index()
    {
        return $this->model->paginate(9);
    }

    public function show(Model $model) : ?Model
    {
        return $model;
    }
    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }


}
