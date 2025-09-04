@extends('backend.layout.master')
@section('title')
   Yazar Ekle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('author.store')}}" enctype="multipart/form-data">
        @csrf


        @if (session()->has('hata'))
        <div class="alert alert-danger">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('hata') }}</p>
          </div>
        @endif
        
        

            <div class="mb-3">
                <label class="form-label">Yazar:</label>
                <input type="text" name="name" value="{{old('name')}}"  class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>


            <div class="mb-3">
                <label class="form-label">Yazar E-posta:</label>
                <input type="email" name="email" value="{{old('email')}}"  class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>


           

            <div class="mb-3">
                <label class="form-label">Şifre:</label>
                <input type="text" name="password"  class="form-control @error('password') is-invalid @enderror">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
           
           
            <div class="mb-3">
                <label class="form-label">Yazar Resim:</label>
                <input type="file" name="file"  class="form-control @error('file') is-invalid @enderror">
                @error('file')
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

