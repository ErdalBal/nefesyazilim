<?php

namespace App\Services;

use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentService
{
    public function __construct(private readonly CommentRepository $commentRepository)
    {
        
    }

    public function all() : LengthAwarePaginator
    {
        return $this->commentRepository->all();
    }


     public function find(int $id) : Comment
    {
        return $this->commentRepository->find($id);
    }



    public function create(array $data) : Comment
    {
        return $this->commentRepository->create($data);
    }


    public function update(array $data,$id) : Comment
    {
        return $this->commentRepository->update($data,$id);
    }
   
   
    public function delete(int $id) : bool
    {
        return $this->commentRepository->delete($id);
    }


    public function getActive(): Collection
    {
        return $this->categoryRepository->model()::active()->get();
    }


}