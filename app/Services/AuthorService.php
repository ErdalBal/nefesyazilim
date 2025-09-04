<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthorRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorService
{
    public function __construct(private readonly AuthorRepository $authorRepository)
    {
        
    }

    public function all() : LengthAwarePaginator
    {
        return $this->authorRepository->all();
    }


     public function find(int $id) : User
    {
        return $this->authorRepository->find($id);
    }



    public function create(array $data) : User
    {
        return $this->authorRepository->create($data);
    }


    public function update(array $data,$id) : User
    {
        return $this->authorRepository->update($data,$id);
    }
   
   
    public function delete(int $id) : bool
    {
        return $this->authorRepository->delete($id);
    }


    public function getActive(): Collection
    {
        return $this->authorRepository->model()::active()->get();
    }


}