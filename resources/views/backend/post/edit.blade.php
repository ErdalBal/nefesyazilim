@extends('backend.layout.master')
@section('title')
   Post Güncelle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
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
            <img width="200" height="100" src="{{asset('backend/uploads/'.$post->blog_file)}}" alt="">
           
        </div>

        <div class="mb-3">
            <label  class="form-label">Post Kategori:</label>
            <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                <option selected="" disabled="" value="">Seç</option>
                @foreach ($categories as $item)
                    <option {{$post->blog_category->id==$item->id ? 'selected' : '' }} value="{{$post->blog_category->id==$item->id ? $post->blog_category->id : $item->id }}" >{{$post->category_id==$item->id ? $post->blog_category->title : $item->title }}</option>
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
                <input type="text" name="blog_title" value="{{old('blog_title',$post->blog_title)}}"  class="form-control @error('blog_title') is-invalid @enderror">
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
                            <textarea name="content" id="editor" class="@error('content') is-invalid @enderror">{{old('content',$post->content)}}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                </div>
               
            </div>

            <div class="mb-3">
                <label class="form-label">Post Resim Değiştir:</label>
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
                    
                    <option {{$post->status==1 ? 'selected' : ''}} value="1" >Aktif</option>
                    <option {{$post->status==0 ? 'selected' : ''}} value="0" >Pasif</option>
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