<?php


namespace App\ECommerce\Shared\Repositories;

use Barryvdh\Debugbar\LaravelDebugbar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

abstract class Repository implements RepositoryInterface
{
    public function __construct(protected Model $model) {}

    public function index(Request $request)
    {
        // Filter with search keyword if found.
        if ($needle = $request->q)
            return $this->model::where('name', 'Like',"%$needle%")->get();

        // Filter with category name if found.
        if ($category = $request->category)
            return $this->model::with('category')->whereRaw('category_id = ' . $category)->paginate(9);

        // Get products from cache, if not store then, return them.
        return Cache::remember('data', now()->addDay(), function (){
            return $this->model->paginate(9);
        });
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
