<?php
namespace App\Repositories;

use App\Models\Settings;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\SettingsRepositoryInterface;
use Intervention\Image\Laravel\Facades\Image;

class SettingsRepository implements SettingsRepositoryInterface
{


    public function all() : Collection
    {
        return Settings::query()->latest()->get();
    }

    public function find(int $id) : Settings
    {
        return Settings::find($id);
    }

   

    public function update(array $data,$id) : Settings
    {
        //dd($data);
       
        $setting = Settings::find($id);
       
        if (isset($data['settings_value']) && $data['settings_value'] instanceof \Illuminate\Http\UploadedFile) {
           
            $file=$data['settings_value'];
           
           $image = ImageManager::withDriver(Driver::class)->read($file);           
           $image->contain(300, 300);           
            $fileName = time() . '_' . $file->getClientOriginalName();           
            $filePath = public_path("backend/uploads/setting/{$fileName}");

           

            $image->save($filePath);
            $data['settings_value'] = $fileName;
            if ($data['settings_value']) {
                $filePath = public_path('backend/uploads/setting/' . $setting['settings_value']);
                        if (file_exists($filePath)) {
                            
                            @unlink($filePath);
                        } 
            }


        }

        if ($setting) {
            $setting->update($data);
            return $setting;
        }
        return null;
    }

    public function delete(int $id) : bool
    {
        $setting = Settings::find($id);
        if ($setting) {
            return $setting->delete();
        }
        return false;
    }


    public function getActive(): Collection
    {
        return Settings::active()->get(); 
    }


}


