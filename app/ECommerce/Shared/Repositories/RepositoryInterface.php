<?php

namespace App\ECommerce\Shared\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function index();
    public function show(Model $model) : ?Model;
}
