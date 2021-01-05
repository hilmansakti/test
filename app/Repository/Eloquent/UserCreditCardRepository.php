<?php

namespace App\Repository\Eloquent;

use App\Models\UserCreditCard;
use App\Repository\UserCreditCardRepositoryInterface;
use Illuminate\Support\Collection;

class UserCreditCardRepository extends BaseRepository implements UserCreditCardRepositoryInterface
{

   /**
    * UserCreditCardRepository constructor.
    *
    * @param UserCreditCard $model
    */
   public function __construct(UserCreditCard $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();    
   }

   /**
    * @param array $attributes
    *
    * @return UserCreditCard
    */
    public function create(array $attributes): UserCreditCard
    { 
        return $this->model->create($attributes);
    }
 
    /**
    * @param $id
    * @return UserCreditCard
    */
    public function find($id): ?UserCreditCard
    {
        return $this->model->find($id);
    }

}