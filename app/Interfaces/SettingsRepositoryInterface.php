<?php
namespace App\Interfaces;

use App\Models\Settings;
use Illuminate\Database\Eloquent\Collection;

interface SettingsRepositoryInterface

{

    public function all() : Collection;

    public function find(int $id) : Settings;

   

    public function update(array $data,$id) : Settings;
    
    public function delete(int $id) : bool; 
   
    public function getActive(): Collection;

}

