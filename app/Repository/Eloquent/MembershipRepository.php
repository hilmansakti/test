<?php

namespace App\Repository\Eloquent;

use App\Models\Membership;
use App\Repository\MembershipRepositoryInterface;
use Illuminate\Support\Collection;

class MembershipRepository extends BaseRepository implements MembershipRepositoryInterface
{

   /**
    * MembershipRepository constructor.
    *
    * @param Membership $model
    */
   public function __construct(Membership $model)
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
    * @return Membership
    */
    public function create(array $attributes): Membership
    { 
        return $this->model->create($attributes);
    }
 
    /**
    * @param $id
    * @return Membership
    */
    public function find($id): ?Membership
    {
        return $this->model->find($id);
    }

}