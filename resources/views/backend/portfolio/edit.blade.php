@extends('backend.layout.master')
@section('title')
   Portfolio Güncelle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('portfolio.update',$portfolio->id)}}" enctype="multipart/form-data">
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
            <img width="200" height="100" src="{{asset('backend/uploads/portfolio/'.$portfolio->file)}}" alt="">
           
        </div>

      

            <div class="mb-3">
                <label class="form-label">Başlık:</label>
                <input type="text" name="title" value="{{old('title',$portfolio->title)}}"  class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alt Başlık:</label>
                <input type="text" name="subtitle" value="{{old('subtitle',$portfolio->subtitle)}}"  class="form-control @error('subtitle') is-invalid @enderror">
                @error('subtitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Firma:</label>
                <input type="text" name="client" value="{{old('client',$portfolio->client)}}"  class="form-control @error('client') is-invalid @enderror">
                @error('client')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>


            <div class="mb-3">
                <label class="form-label">Firma Web:</label>
                <input type="text" name="client_web" value="{{old('client_web',$portfolio->client_web)}}"  class="form-control @error('client_web') is-invalid @enderror">
                @error('client_web')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
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
                <label  class="form-label">Durum:</label>
                <select name="status" class="form-select">
                    
                    <option {{$portfolio->status==1 ? 'selected' : ''}} value="1" >Aktif</option>
                    <option {{$portfolio->status==0 ? 'selected' : ''}} value="0" >Pasif</option>
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