<?php
namespace App\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface AuthorRepositoryInterface

{

    public function all() : LengthAwarePaginator;

    public function find(int $id) : User;

    public function create(array $data) : User;

    public function update(array $data,$id) : User;
    
    public function delete(int $id) : bool; 
   
    public function getActive(): Collection;

}

