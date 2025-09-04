@extends('backend.layout.master')
@section('title')
   Yazar Güncelle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('author.update',$author->id)}}" enctype="multipart/form-data">
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
            <img width="200" height="100" src="{{asset('backend/uploads/user/'.$author->file)}}" alt="">
           
        </div>

        <div class="mb-3">
            <label class="form-label">Yazar:</label>
            <input type="text" name="name" value="{{old('name',$author->name)}}"  class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Yazar E-posta:</label>
            <input type="email" name="email" value="{{old('email',$author->email)}}"  class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

        
        
        <div class="mb-3">
            <label class="form-label">Şifre:</label>
            <input type="text" name="password" value="{{old('password',$author->public_password)}}"  class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
       

        <div class="mb-3">
            <label class="form-label">Resmi Değiştir:</label>
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
                    
                    <option {{$author->status==1 ? 'selected' : ''}} value="1" >Aktif</option>
                    <option {{$author->status==0 ? 'selected' : ''}} value="0" >Pasif</option>
                </select>
                
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