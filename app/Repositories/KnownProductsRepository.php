<?php


namespace App\Repositories;


use App\Models\KnownProducts;

class KnownProductsRepository
{
    /**
     * @param string $name
     */
    public function findByName($name){
        return KnownProducts::where('name', $name)->first();
    }
}
