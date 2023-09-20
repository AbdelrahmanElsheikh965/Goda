<?php


namespace App\ECommerce\User\Services;

use App\ECommerce\User\Repositories\UserRepository;

class MainService
{
    public function __construct(protected UserRepository $repository) { }

    public function main(String $view)
    {
        return $this->repository->main($view);
    }
}
