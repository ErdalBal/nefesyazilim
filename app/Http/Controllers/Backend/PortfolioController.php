<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Services\PortfolioService;
use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
{


    public function __construct(private readonly PortfolioService $portfolioService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $portfoliolist=$this->portfolioService->all();
        return view('backend.portfolio.index',compact('portfoliolist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest  $portfoliorequest)
    {
        $portfoliorequest=$this->portfolioService->create($portfoliorequest->all());


        if ($portfoliorequest) {
            return redirect()
            ->route('portfolio.index')
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
        $portfolio=$this->portfolioService->find($id);
        return view('backend.portfolio.edit')->with('portfolio',$portfolio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest  $portfoliorequest, string $id)
    {
        $portfolio=$this->portfolioService->update($portfoliorequest->all(),$id);

        if ($portfolio) {
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
        $portfolio=$this->portfolioService->delete($id);
        if ($portfolio) {
           return '1';
        } else {
            return '0';
        }
    }
}
