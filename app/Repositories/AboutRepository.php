<?php
namespace App\Repositories;

use App\Models\About;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Interfaces\AboutRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;


class AboutRepository implements AboutRepositoryInterface
{


    public function all() : Collection
    {
        return About::query()->latest()->get();
    }

    public function find(int $id) : About
    {
        return About::find($id);
    }

    public function create(array $data) : About
    {
        
        return About::create($data);
    }

    public function update(array $data,$id) : About
    {
        $about = About::find($id);

       
        if (isset($data['file'])) {
            $file=$data['file'];
            
           // $manager = new ImageManager(Driver::class);
           $image = ImageManager::withDriver(Driver::class)->read($file);
           /// $image = $manager->read($file);
          // dd($image);
           $image->contain(750, 1020);
            // Dosya adı oluştur
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Kaydet
            $filePath = public_path("backend/uploads/about/{$fileName}");
            $image->save($filePath);
           
            $data['file'] = $fileName;

            if ($data['file']) {
                $filePath = public_path('backend/uploads/about/' . $about['file']);
                        if (file_exists($filePath)) {
                            
                            @unlink($filePath);
                        } 
            }


        }
        if ($about) {
            $about->update($data);
            return $about;
        }
        return null;
    }

    public function delete(int $id) : bool
    {
        $about = About::find($id);
        if ($about) {
            $delete=$about->delete();

            if ($delete) {
                $filePath = public_path('backend/uploads/about/' . $about['file']);
                        if (file_exists($filePath)) {
                            
                            @unlink($filePath);
                        } 


            }

            return true;
        }
        return false;
    }


    public function getActive(): Collection
    {
        return About::active()->get(); 
    }


}


