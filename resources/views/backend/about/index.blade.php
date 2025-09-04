@extends('backend.layout.master')
@section('title')
   Hakkında 
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
            </div>
          {{-- <div class="ms-auto"><a href="{{route('aboutservice.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Hizmet  Ekle</a></div> --}}

         
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('success') }}</p>
          </div>
        @endif
      
@if (count($aboutlist)==0)
<div class="alert alert-info">
    <p style="font-size: 27px; font-weight: 500; color: white;"  class="text-center">Veri Bulunamadı</p>
   </div>
</div> 
@else
<div class="table-responsive">

    <table class="table mb-0">
        <thead class="table-light">
            <tr>
                <th>NO#</th>
                <th>Resim</th>
                <th>Ad</th>
                <th>Soyad</th>
                <th>Yaş</th>
                <th>İçerik</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aboutlist as $key => $item)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                      
                        <div class="ms-2">
                            <h6 class="mb-0 font-14">#{{$key+1}}</h6>
                        </div>
                    </div>
                </td>
                <td>
                    <img width="200" height="100" src="{{asset('backend/uploads/about/'.$item->file)}}" alt="">
                </td>
                <td>{{$item->name}}</td>
                <td>
                    {{$item->surename}}
                </td>
                <td>{{$item->age}}</td>
                <td>{!!mb_substr($item->content,0,25)!!}</td>
                <td>
                    <div class="d-flex order-actions">
                        <a href="{{route('about.edit',$item->id)}}" class=""><i class='bx bxs-edit'></i></a>
                        
                    </div>
                </td>
            </tr>
            @endforeach
            
           
        </tbody>
    </table>
</div>
@endif
      
</div>
@endsection
@section('js')
 
@endsection