@extends('backend.layout.master')
@section('title')
   Kategori List 
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
            </div>
          <div class="ms-auto"><a href="{{route('category.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Blog Kategori Ekle</a></div>

         
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('success') }}</p>
          </div>
        @endif
      
@if (count($categorylist)==0)
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
                <th>Başlık</th>
                <th>Kategorisi</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorylist as $key => $item)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                      
                        <div class="ms-2">
                            <h6 class="mb-0 font-14">#{{$key+1}}</h6>
                        </div>
                    </div>
                </td>
                <td>{{$item->title}}</td>
                <td>
                     {{ $item->parent_id == 0 ? 'Ana Kategori' : ($item->parent ? $item->parent->title : 'Ana Kategori Bulunamadı') }}
                </td>
                <td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>{{$item->status==1 ? 'Aktif' : 'Pasif' }}</div></td>
               
                <td>
                    <div class="d-flex order-actions">
                        <a href="{{route('category.edit',$item->id)}}" class=""><i class='bx bxs-edit'></i></a>
                        <a  href="javascript:;" class="ms-3"><i data-id="{{$item->id}}" class='bx bxs-trash'></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
            
           
        </tbody>
    </table>
    <nav style="margin-top: 25px;position: absolute;right: 0px;" aria-label="paginate">
        <ul class="pagination pagination-sm">
            @if ($categorylist->onFirstPage())
            <li class="page-item disabled"><a class="page-link" href="javascript:;" tabindex="-1" aria-disabled="true">Önceki</a>
            </li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $categorylist->previousPageUrl() }}" tabindex="-1" >Önceki</a>
        </li>
           
        @endif

           
    {{-- Sayfa Numaraları --}}
    @foreach ($categorylist->links()->elements[0] as $page => $url)
    @if ($page == $categorylist->currentPage())
    <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:;">{{ $page }}<span class="visually-hidden"></span></a>
    </li>
        
    @else
    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
    </li>
       
    @endif
@endforeach

 {{-- Sonraki Sayfa --}}
 @if ($categorylist->hasMorePages())
 <li class="page-item"><a class="page-link" href="{{ $categorylist->nextPageUrl() }}">Sonraki</a></li>
@else
<li class="page-item disabled"><a class="page-link" href="javascript:;">Sonraki</a>
@endif
           

           
           
        </ul>
    </nav>
</div>
@endif
      
</div>
@endsection
@section('js')
    <script>

          var deleteUrl = "{{ route('category.delete', ':id') }}";
        $(function(){
            $('.bxs-trash').click(function(){
              var id=$(this).attr('data-id')
              var url = deleteUrl.replace(':id', id);
              Swal.fire({
                    title: "Eminmisin?",
                    text: "Bunu geri alamazsınız!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Evet, Sil!"
           }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
            url: url, 
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') 
            },
            success: function (response) {
                Swal.fire({
                title: "Silindi!",
                text: "Veriniz silindi.",
                icon: "success"
            }).then(() => {
                setTimeout(() => {
                    location.reload();
                }, 1000); 
            });
               
            },
            error: function (error) {
                alert('Bir hata oluştu!');
            }
        });
                    
                }
          });





            
    });
           
        })
    </script>
@endsection