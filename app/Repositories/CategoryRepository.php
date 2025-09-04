<?php
namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository implements CategoryRepositoryInterface
{


    public function all() : LengthAwarePaginator
    {
        return Category::query()->with('parent')->latest()->paginate(10);
    }

    public function find(int $id) : Category
    {
        return Category::find($id);
    }

    public function create(array $data) : Category
    {
        $data['slug']=Str::slug($data['title']);
        return Category::create($data);
    }

    public function update(array $data,$id) : Category
    {
        $category = Category::find($id);
        if (isset($data['title'])) {
            $data['slug'] =Str::slug($data['title']);
        }
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }

    public function delete(int $id) : bool
    {
        $category = Category::find($id);
        if ($category) {
            return $category->delete();
        }
        return false;
    }


    public function getActive(): Collection
    {
        return Category::active()->get(); 
    }


}


