<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\AuthorRepositoryInterface;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorRepository implements AuthorRepositoryInterface
{


    public function all() : LengthAwarePaginator
    {
        return User::query()->where('role','!=','admin')->latest()->paginate(10);
    }

    public function find(int $id) : User
    {
        return User::find($id);
    }

    public function create(array $data) : User
    {
        $data['role']='user';
        $data['public_password']=$data['password'];
        $data['password']=Hash::make($data['password']);
        if (isset($data['file'])) {
            $file=$data['file'];
           // $manager = new ImageManager(Driver::class);
           $image = ImageManager::withDriver(Driver::class)->read($file);
           /// $image = $manager->read($file);
           $image->contain(300, 300);
            // Dosya adı oluştur
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Kaydet
            $filePath = public_path("backend/uploads/user/{$fileName}");
            $image->save($filePath);

            // Veriye ekle
            $data['file'] = $fileName;
        }
        return User::create($data);
    }

    public function update(array $data,$id) : User
    {
        $user = User::find($id);
       
        

        if (empty($data['password'])) {
            unset($data['password']); // Boşsa password alanını çıkart
        } else {
            $data['public_password'] = $data['password'];
            $data['password'] = Hash::make($data['password']);
        }
        
        if (isset($data['file'])) {
            $file=$data['file'];
           // $manager = new ImageManager(Driver::class);
           $image = ImageManager::withDriver(Driver::class)->read($file);
           /// $image = $manager->read($file);
           $image->contain(300, 300);
            // Dosya adı oluştur
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Kaydet
            $filePath = public_path("backend/uploads/user/{$fileName}");
            $image->save($filePath);
           
            $data['file'] = $fileName;

            if ($data['file']) {
                $filePath = public_path('backend/uploads/user/' . $user['file']);
                        if (file_exists($filePath)) {
                            
                            @unlink($filePath);
                        } 
            }


        }


        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    public function delete(int $id) : bool
    {
        $user = User::find($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }


    public function getActive(): Collection
    {
        return User::active()->get(); 
    }


}


