<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\AuthorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function __construct(private readonly AuthorService $authorService)
    {

    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authorlist=$this->authorService->all();
        return view('backend.author.index',compact('authorlist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $author)
    {
        $authorcreate=$this->authorService->create($author->all());


        if ($authorcreate) {
            return redirect()
            ->route('author.index')
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
       
            $author=$this->authorService->find($id);
            return view('backend.author.show')->with('author',$author);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author=$this->authorService->find($id);
        return view('backend.author.edit')->with('author',$author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $author, string $id)
    {
        $author=$this->authorService->update($author->all(),$id);

        if ($author) {
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
        $file=$this->authorService->find($id);
        $author=$this->authorService->delete($id);
        if ($author) {
            $filePath = public_path('backend/uploads/user/' . $file->file);
            if (file_exists($filePath)) {
                
                @unlink($filePath);
            } 
           return '1';

          

        } else {
            return '0';
        }
    }
}
