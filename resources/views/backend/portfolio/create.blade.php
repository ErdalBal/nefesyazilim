@extends('backend.layout.master')
@section('title')
   Portfolio Ekle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('portfolio.store')}}" enctype="multipart/form-data">
        @csrf


        @if (session()->has('hata'))
        <div class="alert alert-danger">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('hata') }}</p>
          </div>
        @endif
        
       

            <div class="mb-3">
                <label class="form-label">Başlık:</label>
                <input type="text" name="title" value="{{old('title')}}"  class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Alt Başlık:</label>
                <input type="text" name="subtitle" value="{{old('subtitle')}}"  class="form-control @error('subtitle') is-invalid @enderror">
                @error('subtitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Resim:</label>
                <input type="file" name="file"  class="form-control @error('file') is-invalid @enderror">
                @error('file')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            
            <div class="mb-3">
                <label class="form-label">Firma:</label>
                <input type="text" name="client" value="{{old('client')}}"  class="form-control @error('client') is-invalid @enderror">
                @error('client')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
           
            <div class="mb-3">
                <label class="form-label">Firma Web:</label>
                <input type="text" name="client_web" value="{{old('client_web')}}"  class="form-control @error('client_web') is-invalid @enderror">
                @error('client_web')
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