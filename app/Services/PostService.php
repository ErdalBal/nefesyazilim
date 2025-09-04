<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService
{
    public function __construct(private readonly PostRepository $postRepository)
    {
        
    }

    public function all() : LengthAwarePaginator
    {
        return $this->postRepository->all();
    }


     public function find(int $id) : Post
    {
        return $this->postRepository->find($id);
    }



    public function create(array $data) : Post
    {
        return $this->postRepository->create($data);
    }


    public function update(array $data,$id) : Post
    {
        return $this->postRepository->update($data,$id);
    }
   
   
    public function delete(int $id) : bool
    {
        return $this->postRepository->delete($id);
    }


    public function getActive(): Collection
    {
        return $this->postRepository->model()::active()->get();
    }


}