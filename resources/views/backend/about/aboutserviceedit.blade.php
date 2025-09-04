@extends('backend.layout.master')
@section('title')
   Hizmet Güncelle
@endsection

@section('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('about.update',$about->id)}}">
        @csrf
@method('PUT')

        @if (session()->has('hata'))
        <div class="alert alert-danger">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('hata') }}</p>
          </div>
        @endif
        @if (session()->has('success'))
        <div class="alert alert-success">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('success') }}</p>
          </div>
        @endif

            <div class="mb-3">
                <label class="form-label">Ad:</label>
                <input type="text" name="name" value="{{$about->name}}"  class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Soyad:</label>
                <input type="text" name="surename" value="{{$about->surename}}"  class="form-control @error('surename') is-invalid @enderror">
                @error('surename')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Yaş:</label>
                <input type="number" min="0" name="age" value="{{$about->age}}"  class="form-control @error('age') is-invalid @enderror">
                @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            
            
            <div class="col">
                <button type="submit" class="btn btn-outline-success px-5">Güncelle</button>
            </div>
        </form>
    </div>
</div>
@endsection