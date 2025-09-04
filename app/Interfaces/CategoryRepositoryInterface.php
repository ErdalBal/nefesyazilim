<?php
namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryRepositoryInterface

{

    public function all() : LengthAwarePaginator;

    public function find(int $id) : Category;

    public function create(array $data) : Category;

    public function update(array $data,$id) : Category;
    
    public function delete(int $id) : bool; 
   
    public function getActive(): Collection;

}

