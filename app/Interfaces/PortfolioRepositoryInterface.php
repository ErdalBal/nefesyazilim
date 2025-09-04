<?php
namespace App\Interfaces;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


interface PortfolioRepositoryInterface

{

    public function all() : LengthAwarePaginator;

    public function find(int $id) : Portfolio;

    public function create(array $data) : Portfolio;

    public function update(array $data,$id) : Portfolio;
    
    public function delete(int $id) : bool; 
   
    public function getActive(): Collection;

}

