<?php

namespace App\ECommerce\Shared\RepositoryInterface;

interface RepositoryInterface
{
    public function index(string $viewName);
    public function update(array $data, ?array $ids);
}
