<?php

namespace App\Services;

use App\Models\ServiceAbout;
use App\Repositories\AboutServiceRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AboutServiceService
{
    public function __construct(private readonly AboutServiceRepository $aboutserviceRepository)
    {
        
    }

    public function all() : LengthAwarePaginator
    {
        return $this->aboutserviceRepository->all();
    }


     public function find(int $id) : ServiceAbout
    {
        return $this->aboutserviceRepository->find($id);
    }



    public function create(array $data) : ServiceAbout
    {
        return $this->aboutserviceRepository->create($data);
    }


    public function update(array $data,$id) : ServiceAbout
    {
        return $this->aboutserviceRepository->update($data,$id);
    }
   
   
    public function delete(int $id) : bool
    {
        return $this->aboutserviceRepository->delete($id);
    }


    public function getActive(): Collection
    {
        return $this->aboutserviceRepository->model()::active()->get();
    }


}