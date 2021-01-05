<?php

namespace App\Repository\Eloquent;

use App\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Hash;
use DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(User $model)
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
    * @return user
    */
    public function create(array $attributes): User
    { 
        $attributes['password'] = Hash::make($attributes['password']);
        return $this->model->create($attributes);
    }
 
    /**
    * @param $id
    * @return User
    */
    public function find($id): ?User
    {
        return $this->model->find($id);
    }

    public function update($id, $attributes): User
    {        
        $user = $this->model->find($id);
        $user->update($attributes);
        
        return $user;
    }

    public function setMembership(array $attributes){
        return DB::table("user_membership")->insert($attributes);
    }

    
}