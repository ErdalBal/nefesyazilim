<?php

namespace App\Services;

use App\Models\Portfolio;
use App\Repositories\PortfolioRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PortfolioService
{
    public function __construct(private readonly PortfolioRepository $portfolioRepository)
    {
        
    }

    public function all() : LengthAwarePaginator
    {
        return $this->portfolioRepository->all();
    }


     public function find(int $id) : Portfolio
    {
        return $this->portfolioRepository->find($id);
    }



    public function create(array $data) : Portfolio
    {
        return $this->portfolioRepository->create($data);
    }


    public function update(array $data,$id) : Portfolio
    {
        return $this->portfolioRepository->update($data,$id);
    }
   
   
    public function delete(int $id) : bool
    {
        return $this->portfolioRepository->delete($id);
    }


    public function getActive(): Collection
    {
        return $this->portfolioRepository->model()::active()->get();
    }


}