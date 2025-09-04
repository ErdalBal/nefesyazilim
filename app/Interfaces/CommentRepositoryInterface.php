<?php
namespace App\Interfaces;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface CommentRepositoryInterface

{

    public function all() : LengthAwarePaginator;

    public function find(int $id) : Comment;

    public function create(array $data) : Comment;

    public function update(array $data,$id) : Comment;
    
    public function delete(int $id) : bool; 
   
    public function getActive(): Collection;

}

