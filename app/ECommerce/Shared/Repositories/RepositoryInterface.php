<?php

namespace App\ECommerce\Shared\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface RepositoryInterface
{
    public function index(Request $request);
    public function show(Model $model) : ?Model;
}
