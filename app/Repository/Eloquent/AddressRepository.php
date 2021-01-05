<?php

namespace App\Repository\Eloquent;

use App\Models\Address;
use App\Repository\AddressRepositoryInterface;
use Illuminate\Support\Collection;
use Hash;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{

   /**
    * AddressRepository constructor.
    *
    * @param Address $model
    */
   public function __construct(Address $model)
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
    * @return Address
    */
    public function create(array $attributes): Address
    { 
        return $this->model->create($attributes);
    }
 
    /**
    * @param $id
    * @return Address
    */
    public function find($id): ?Address
    {
        return $this->model->find($id);
    }

}