@extends('backend.layout.master')
@section('title')
   Hizmet  Ekle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('category.store')}}">
        @csrf


        @if (session()->has('hata'))
        <div class="alert alert-danger">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('hata') }}</p>
          </div>
        @endif
        
       

            <div class="mb-3">
                <label class="form-label">Başlık:</label>
                <input type="text" name="title"  class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            
            <div class="mb-3">
                <label  class="form-label">Durum:</label>
                <select name="status" class="form-select">
                    <option selected="" disabled="" value="">Seç</option>
                    <option value="1" >Aktif</option>
                    <option value="0" >Pasif</option>
                </select>
                
            </div>
            <div class="col">
                <button type="submit" class="btn btn-outline-success px-5">Ekle</button>
            </div>
        </form>
    </div>
</div>
@endsection