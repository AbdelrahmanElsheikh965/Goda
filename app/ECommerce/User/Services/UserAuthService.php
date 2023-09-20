<?php


namespace App\ECommerce\User\Services;

use App\ECommerce\User\Repositories\UserRepository;

class UserAuthService
{
    public function __construct(protected UserRepository $repository) { }

    public function index(String $view)
    {
        return $this->repository->main($view);
    }

}
