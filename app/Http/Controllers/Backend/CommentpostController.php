<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\CommentService;
use App\Http\Controllers\Controller;

class CommentpostController extends Controller
{

    public function __construct(private readonly CommentService $commentService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $commentlist=$this->commentService->all();
       return view('backend.commentpost.index',compact('commentlist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $commentpost=$this->commentService->find($id);
        return view('backend.commentpost.edit')->with('commentpost',$commentpost);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commentpost=$this->commentService->update($request->all(),$id);

        if ($commentpost) {
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
        //
    }
}
