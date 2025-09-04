<?php

namespace App\Services;

use App\Models\About;
use App\Repositories\AboutRepository;
use Illuminate\Database\Eloquent\Collection;

class AboutService
{
    public function __construct(private readonly AboutRepository $aboutRepository)
    {
        
    }

    public function all() : Collection
    {
        return $this->aboutRepository->all();
    }


     public function find(int $id) : About
    {
        return $this->aboutRepository->find($id);
    }



    public function create(array $data) : About
    {
        return $this->aboutRepository->create($data);
    }


    public function update(array $data,$id) : About
    {
        return $this->aboutRepository->update($data,$id);
    }
   
   
    public function delete(int $id) : bool
    {
        return $this->aboutRepository->delete($id);
    }


    public function getActive(): Collection
    {
        return $this->aboutRepository->model()::active()->get();
    }


}