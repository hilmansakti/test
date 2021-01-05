<?php
namespace App\Repository;

use App\Models\Membership;
use Illuminate\Support\Collection;

interface MembershipRepositoryInterface
{
   public function all(): Collection;

   /**
    * @param array $attributes
    * @return Model
    */
    public function create(array $attributes): Membership;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Membership;
}