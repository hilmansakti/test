<?php
namespace App\Repository;

use App\Models\UserCreditCard;
use Illuminate\Support\Collection;

interface UserCreditCardRepositoryInterface
{
   public function all(): Collection;

   /**
    * @param array $attributes
    * @return Model
    */
    public function create(array $attributes): UserCreditCard;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?UserCreditCard;
}