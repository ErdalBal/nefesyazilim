<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AboutServiceService;
use App\Http\Requests\ServiceAboutRequest;

class ServiceAboutController extends Controller
{

    public function __construct(private readonly AboutServiceService $aboutservice)
{
    
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiencelist=$this->aboutservice->all();
        return view('backend.experience.index',compact('experiencelist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceAboutRequest $request)
    {
        $experience=$this->aboutservice->create($request->all());


        if ($experience) {
            return redirect()
            ->route('aboutservice.index')
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
        $experience=$this->aboutservice->find($id);
        return view('backend.experience.edit')->with('experience',$experience);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceAboutRequest $request, string $id)
    {
        $experience=$this->aboutservice->update($request->all(),$id);

        if ($experience) {
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
        $experience=$this->aboutservice->delete($id);
        if ($experience) {
           return '1';
        } else {
            return '0';
        }
    }
}
