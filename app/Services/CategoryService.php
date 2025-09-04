<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    public function __construct(private readonly CategoryRepository $categoryRepository)
    {
        
    }

    public function all() : LengthAwarePaginator
    {
        return $this->categoryRepository->all();
    }


     public function find(int $id) : Category
    {
        return $this->categoryRepository->find($id);
    }



    public function create(array $data) : Category
    {
        return $this->categoryRepository->create($data);
    }


    public function update(array $data,$id) : Category
    {
        return $this->categoryRepository->update($data,$id);
    }
   
   
    public function delete(int $id) : bool
    {
        return $this->categoryRepository->delete($id);
    }


    public function getActive(): Collection
    {
        return $this->categoryRepository->model()::active()->get();
    }


}