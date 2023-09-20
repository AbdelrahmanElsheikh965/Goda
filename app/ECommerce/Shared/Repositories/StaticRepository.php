<?php


namespace App\ECommerce\Shared\Repositories;

use App\ECommerce\Shared\RepositoryInterface\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class StaticRepository implements RepositoryInterface
{
    public function __construct(protected Model $model) {}

    public function getModel(): Model
    {
        return $this->model;
    }


    public function setModel(Model $model): void
    {
        $this->model = $model;
    }


    public function index(string $viewName)
    {
        //
    }

    public function update(array $data, ?array $ids)
    {
        //
    }
}
