@extends('backend.layout.master')
@section('title')
   Post Ekle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf


        @if (session()->has('hata'))
        <div class="alert alert-danger">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('hata') }}</p>
          </div>
        @endif
        
        <div class="mb-3">
            <label  class="form-label">Post Kategori:</label>
            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                <option selected="" disabled="" value="">Seç</option>
                @foreach ($categories as $item)
                    <option value="{{$item->id}}" >{{$item->title}}</option>
                @endforeach
               
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

            <div class="mb-3">
                <label class="form-label">Başlık:</label>
                <input type="text" name="blog_title" value="{{old('blog_title')}}"  class="form-control @error('blog_title') is-invalid @enderror">
                @error('blog_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>


            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">Post İçerik</h6>
                        <hr/>
                            <textarea name="content" id="editor" class="@error('content') is-invalid @enderror">{{old('content')}}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                </div>
               
            </div>

            <div class="mb-3">
                <label class="form-label">Post Resim:</label>
                <input type="file" name="blog_file"  class="form-control @error('blog_file') is-invalid @enderror">
                @error('blog_file')
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
    
        removePlugins: 'image, imageupload' // Görsel yükleme eklentilerini kaldır
    });
    </script>
@endsection