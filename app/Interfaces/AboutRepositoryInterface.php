<?php
namespace App\Interfaces;

use App\Models\About;
use Illuminate\Database\Eloquent\Collection;

interface AboutRepositoryInterface

{

    public function all() : Collection;

    public function find(int $id) : About;

    public function create(array $data) : About;

    public function update(array $data,$id) : About;
    
    public function delete(int $id) : bool; 
   
    public function getActive(): Collection;

}

