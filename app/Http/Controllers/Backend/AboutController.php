<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\AboutService;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
  public function __construct(private readonly AboutService $aboutService)
  {

  }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutlist=$this->aboutService->all();
        return view('backend.about.index',compact('aboutlist'));
        
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
        $about=$this->aboutService->find($id);
        return view('backend.about.edit')->with('about',$about);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $about, string $id)
    {
        $about=$this->aboutService->update($about->all(),$id);

        if ($about) {
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
