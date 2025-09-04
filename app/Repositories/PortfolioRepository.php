<?php
namespace App\Repositories;

use App\Models\Portfolio;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Collection;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Interfaces\PortfolioRepositoryInterface;

class PortfolioRepository implements PortfolioRepositoryInterface
{


    public function all() : LengthAwarePaginator
    {
        return Portfolio::query()->latest()->paginate(10);
    }

    public function find(int $id) : Portfolio
    {
        return Portfolio::find($id);
    }

    public function create(array $data) : Portfolio
    {
        
       
        
      //  dd($data);
        if (isset($data['file'])) {
            $file=$data['file'];
           // $manager = new ImageManager(Driver::class);
           $image = ImageManager::withDriver(Driver::class)->read($file);
           /// $image = $manager->read($file);
           $image->contain(900, 600);
            // Dosya adı oluştur
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Kaydet
            $filePath = public_path("backend/uploads/portfolio/{$fileName}");
            $image->save($filePath);

            // Veriye ekle
            $data['file'] = $fileName;
        }
        return Portfolio::create($data);
    }

    public function update(array $data,$id) : Portfolio
    {
        $portfolio = Portfolio::find($id);
       
        if (isset($data['file'])) {
            $file=$data['file'];
           // $manager = new ImageManager(Driver::class);
           $image = ImageManager::withDriver(Driver::class)->read($file);
           /// $image = $manager->read($file);
           $image->contain(900, 600);
            // Dosya adı oluştur
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Kaydet
            $filePath = public_path("backend/uploads/portfolio/{$fileName}");
            $image->save($filePath);
           
            $data['file'] = $fileName;

            if ($data['file']) {
                $filePath = public_path('backend/uploads/portfolio/' . $portfolio['file']);
                        if (file_exists($filePath)) {
                            
                            @unlink($filePath);
                        } 
            }


        }


        if ($portfolio) {
            $portfolio->update($data);
            return $portfolio;
        }
        return null;
    }

    public function delete(int $id) : bool
    {
        $portfolio = Portfolio::find($id);
        if ($portfolio) {
           $delete=$portfolio->delete();

            if ($delete) {
                $filePath = public_path('backend/uploads/portfolio/' . $portfolio['file']);
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
        return Portfolio::active()->get(); 
    }


}


