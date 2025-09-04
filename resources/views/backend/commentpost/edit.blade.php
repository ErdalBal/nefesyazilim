@extends('backend.layout.master')
@section('title')
   Comment Güncelle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('commentpost.update',$commentpost->id)}}">
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
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Yorum İçerik</h6>
                    <hr/>
                        <textarea  id="editor" class="@error('content') is-invalid @enderror">{{old('content',$commentpost->message)}}</textarea>
                        
                </div>
               
            </div>
           
        </div>
            <div class="mb-3">
                <label  class="form-label">Durum:</label>
                <select name="status" class="form-select">
                    <option selected="" disabled="" value="">Seç</option>
                    <option {{$commentpost->status==1 ? 'selected' : ''}} value="1" >Aktif</option>
                    <option {{$commentpost->status==0 ? 'selected' : ''}} value="0" >Pasif</option>
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
       
        removePlugins: 'image, imageupload' // Görsel yükleme eklentilerini kaldır
    });
    </script>
@endsection