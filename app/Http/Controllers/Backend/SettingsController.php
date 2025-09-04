<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\SettingsService;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct(private readonly SettingsService $settingsService)
    {

    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settingslist=$this->settingsService->all();
        return view('backend.settings.index',compact('settingslist'));
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
        $settings=$this->settingsService->find($id);
        return view('backend.settings.edit')->with('settings',$settings);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $data=$request->except('_token');

        $settings=$this->settingsService->update($data,$id);

        if ($settings) {
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
