@extends('backend.layout.master')
@section('title')
   Deneyim Güncelle
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{route('aboutservice.update',$experience->id)}}" enctype="multipart/form-data">
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
                <label class="form-label">Başlık:</label>
                <input type="text" name="title" value="{{old('title',$experience->title)}}"  class="form-control @error('title') is-invalid @enderror">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        
            <div class="mb-3">
                <label class="form-label">İlk Tarih:</label>
                <input type="text" disabled value="{{$experience->service_start}}"  class="form-control">
                
            </div>

            <div class="mb-3">
                <label class="form-label">İlk Tarihi Değiş:</label>
                <input type="date" name="service_start" value="{{old('service_start',$experience->service_start)}}"  class="form-control @error('service_start') is-invalid @enderror">
                @error('service_start')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>


            <div class="mb-3">
                <label class="form-label">Son Tarih:</label>
                <input type="text" disabled value="{{$experience->service_finish}}"  class="form-control">
                
            </div>

            <div class="mb-3">
                <label class="form-label">Son Tarihi Değiş:</label>
                <input type="date" name="service_finish" value="{{old('service_finish',$experience->service_finish)}}"  class="form-control @error('service_finish') is-invalid @enderror">
                @error('service_finish')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            
           


            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">İçerik</h6>
                        <hr/>
                            <textarea name="description" id="editor" class="@error('description') is-invalid @enderror">{{old('description',$experience->description)}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                </div>
               
            </div>


           

            <div class="mb-3">
                <label  class="form-label">Durum:</label>
                <select name="status" class="form-select">
                    
                    <option {{$experience->status==1 ? 'selected' : ''}} value="1" >Aktif</option>
                    <option {{$experience->status==0 ? 'selected' : ''}} value="0" >Pasif</option>
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