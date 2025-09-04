<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    public function __construct(private readonly PostService $postService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postlist=$this->postService->all();
        return view('backend.post.index',compact('postlist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::where('parent_id','!=','0')->get();
       
        return view('backend.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $postrequest)
    {

       
        
        $postrequest=$this->postService->create($postrequest->all());


        if ($postrequest) {
            return redirect()
            ->route('posts.index')
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
    public function edit(string $id)
    {
        $categories=Category::where('parent_id','!=','0')->get();
        $post=$this->postService->find($id);
        return view('backend.post.edit',compact('categories'))->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $postrequest, string $id)
    {
        $post=$this->postService->update($postrequest->all(),$id);

        if ($post) {
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
        $file=$this->postService->find($id);
        $post=$this->postService->delete($id);
        if ($post) {
            $filePath = public_path('backend/uploads/' . $file->blog_file);
            if (file_exists($filePath)) {
                
                @unlink($filePath);
            } 
           return '1';

          

        } else {
            return '0';
        }
    }
}
