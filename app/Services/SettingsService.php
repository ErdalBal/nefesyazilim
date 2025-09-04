<?php

namespace App\Services;

use App\Models\Settings;
use App\Repositories\SettingsRepository;
use Illuminate\Database\Eloquent\Collection;

class SettingsService
{
    public function __construct(private readonly SettingsRepository $settingsRepository)
    {
        
    }

    public function all() : Collection
    {
        return $this->settingsRepository->all();
    }


     public function find(int $id) : Settings
    {
        return $this->settingsRepository->find($id);
    }



    public function create(array $data) : Settings
    {
        return $this->settingsRepository->create($data);
    }


    public function update(array $data,$id) : Settings
    {
        return $this->settingsRepository->update($data,$id);
    }
   
   
    public function delete(int $id) : bool
    {
        return $this->settingsRepository->delete($id);
    }


    public function getActive(): Collection
    {
        return $this->authorRepository->model()::active()->get();
    }


}