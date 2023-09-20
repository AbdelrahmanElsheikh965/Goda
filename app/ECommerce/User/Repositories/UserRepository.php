<?php


namespace App\ECommerce\User\Repositories;

use App\ECommerce\Shared\Repositories\Repository;
use App\ECommerce\User\Models\User;

class UserRepository extends Repository
{
    public function __construct(protected User $user)
    {
        $this->setModel($user);
    }
}
