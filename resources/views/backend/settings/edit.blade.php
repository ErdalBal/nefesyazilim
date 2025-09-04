@extends('backend.layout.master')
@section('title')
   Ayarlar Güncelle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('settings.update',$settings->id)}}" enctype="multipart/form-data">
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
@if ($settings->settings_type=='file')
<div class="mb-3">
    <label class="form-label">{{$settings->settings_description}} Resim:</label>
    <img width="150" height="150" src="{{asset('backend/uploads/setting/'.$settings->settings_value)}}" alt="">
   
</div>


<div class="mb-3">
    <label class="form-label">{{$settings->settings_description}}  Resmi Değiştir:</label>
    <input type="file" accept=".jpg,.png,.jpeg," name="settings_value"  class="form-control @error('settings_value') is-invalid @enderror">
    @error('settings_value')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>

@else

<div class="mb-3">
    <label class="form-label">{{$settings->settings_description}}:</label>
    <input type="text" name="settings_value" value="{{old('settings_value',$settings->settings_value)}}"  class="form-control @error('settings_value') is-invalid @enderror">
    @error('settings_value')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>



@endif  

       
        
           

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