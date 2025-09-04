<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function __construct(private readonly CategoryService $categoryService)
{
    
}


    public function index()
    {
        $categorylist=$this->categoryService->all();
        return view('backend.category.index',compact('categorylist'));
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=$this->categoryService->all();
        return view('backend.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $category)
    {

        $category=$this->categoryService->create($category->all());


        if ($category) {
            return redirect()
            ->route('category.index')
            ->with('success', 'Kayıt Başarılı');
        } else {
            return redirect()
            ->back()
            ->with('hata', 'Kayıt sırasında bir hata oluştu');
        }
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category=$this->categoryService->find($id);
        return view('backend.category.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $category, string $id)
    {
        $category=$this->categoryService->update($category->all(),$id);

        if ($category) {
            return redirect()
            ->back()
            ->with('success', 'Güncelleme Başarılı');
        } else {
            return redirect()
            ->back()
            ->with('hata', 'Güncelleme sırasında bir hata oluştu');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=$this->categoryService->delete($id);
        if ($category) {
           return '1';
        } else {
            return '0';
        }
        
    }
}
