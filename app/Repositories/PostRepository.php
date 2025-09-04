<?php
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Str;


use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository implements PostRepositoryInterface
{


    public function all() : LengthAwarePaginator
    {
        return Post::query()->with('category')->latest()->paginate(10);
    }

    public function find(int $id) : Post
    {
        return Post::find($id);
    }

    public function create(array $data) : Post
    {
        $data['slug']=Str::slug($data['blog_title']);
        $data['author_id']=Auth::user()->id;
        
      //  dd($data);
        if (isset($data['blog_file'])) {
            $file=$data['blog_file'];
           // $manager = new ImageManager(Driver::class);
           $image = ImageManager::withDriver(Driver::class)->read($file);
           /// $image = $manager->read($file);
           $image->contain(895, 552);
            // Dosya adı oluştur
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Kaydet
            $filePath = public_path("backend/uploads/{$fileName}");
            $image->save($filePath);

            // Veriye ekle
            $data['blog_file'] = $fileName;
        }
        return Post::create($data);
    }

    public function update(array $data,$id) : Post
    {
        $posts = Post::find($id);
        if (isset($data['blog_title'])) {
            $data['slug'] =Str::slug($data['blog_title']);
        }

        if (isset($data['blog_file'])) {
            $file=$data['blog_file'];
           // $manager = new ImageManager(Driver::class);
           $image = ImageManager::withDriver(Driver::class)->read($file);
           /// $image = $manager->read($file);
           $image->contain(900, 552);
            // Dosya adı oluştur
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Kaydet
            $filePath = public_path("backend/uploads/{$fileName}");
            $image->save($filePath);
           
            $data['blog_file'] = $fileName;

            if ($data['blog_file']) {
                $filePath = public_path('backend/uploads/' . $posts['blog_file']);
                        if (file_exists($filePath)) {
                            
                            @unlink($filePath);
                        } 
            }


        }


        if ($posts) {
            $posts->update($data);
            return $posts;
        }
        return null;
    }

    public function delete(int $id) : bool
    {
        $posts = Post::find($id);
        if ($posts) {
           $delete=$posts->delete();

            if ($delete) {
                $filePath = public_path('backend/uploads/' . $posts['blog_file']);
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
        return Post::active()->get(); 
    }


}


