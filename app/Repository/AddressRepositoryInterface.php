<?php
namespace App\Repository;

use App\Models\Address;
use Illuminate\Support\Collection;

interface AddressRepositoryInterface
{
   public function all(): Collection;

   /**
    * @param array $attributes
    * @return Model
    */
    public function create(array $attributes): Address;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Address;
}