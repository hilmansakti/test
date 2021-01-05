<?php
namespace App\Repository;

use App\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   public function all(): Collection;

   /**
    * @param array $attributes
    * @return Model
    */
    public function create(array $attributes): User;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?User;

    public function update($id, array $attributes): User;
    public function setMembership(array $attributes);
}