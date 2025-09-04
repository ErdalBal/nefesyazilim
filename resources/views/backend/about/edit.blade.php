@extends('backend.layout.master')
@section('title')
   Hakkında Güncelle
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
        <form method="POST" action="{{route('about.update',$about->id)}}" enctype="multipart/form-data">
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
            <label class="form-label">Yüklü Resim:</label>
            <img width="200" height="150" src="{{asset('backend/uploads/about/'.$about->file)}}" alt="">
           
        </div>

        <div class="mb-3">
            <label class="form-label">Resim Değiştir:</label>
            <input type="file" name="file"  class="form-control @error('file') is-invalid @enderror">
            @error('file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>


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

            
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">Hakkında İçerik</h6>
                        <hr/>
                            <textarea name="content" id="editor" class="@error('content') is-invalid @enderror">{{old('content',$about->content)}}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                </div>
               
            </div>
            
            
            <div class="col">
                <button type="submit" class="btn btn-outline-success px-5">Güncelle</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
	</script>
    <script>
        CKEDITOR.replace( 'editor' , {
        toolbar: [
            ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink', '-', 'Undo', 'Redo'] // Image butonu eklenmedi
        ],
        removePlugins: 'image, imageupload' // Görsel yükleme eklentilerini kaldır
    });
    </script>
@endsection