<?php
namespace App\Interfaces;

use App\Models\ServiceAbout;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface AboutServiceRepositoryInterface

{

    public function all() : LengthAwarePaginator;

    public function find(int $id) : ServiceAbout;

    public function create(array $data) : ServiceAbout;

    public function update(array $data,$id) : ServiceAbout;
    
    public function delete(int $id) : bool; 
   
    public function getActive(): Collection;

}

