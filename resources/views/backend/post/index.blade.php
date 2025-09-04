@extends('backend.layout.master')
@section('title')
   Blog List 
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
            </div>
          <div class="ms-auto"><a href="{{route('posts.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Post Ekle</a></div>

         
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('success') }}</p>
          </div>
        @endif
      
@if (count($postlist)==0)
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
                <th>Başlık</th>
                <th>İçerik</th>
                <th>Yazar</th>
                <th>Kategorisi</th>
                <th>Görülme</th>
                <th>Beğeni</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postlist as $key => $item)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                      
                        <div class="ms-2">
                            <h6 class="mb-0 font-14">#{{$key+1}}</h6>
                        </div>
                    </div>
                </td>
                <td>
                    
                    <img width="100" height="75" src="{{asset('backend/uploads/'.$item->blog_file)}}" alt="">
                </td>
                <td>{{$item->blog_title}}</td>
                <td>{!!mb_substr($item->content,0,25)!!}</td>
                <td>{{$item->user->name}}</td>
                <td>
                     {{ $item->blog_category!=null ? $item->blog_category->title : 'Kategori Bulunamadı' }}
                </td>
                <td>{{$item->blog_see ? $item->blog_see : '0' }}</td>
                <td>{{$item->blog_like ? $item->blog_like : '0'}}</td>
                <td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>{{$item->status==1 ? 'Aktif' : 'Pasif' }}</div></td>
               
                <td>
                    <div class="d-flex order-actions">
                        <a href="{{route('posts.edit',$item->id)}}" class=""><i class='bx bxs-edit'></i></a>
                        <a  href="javascript:;" class="ms-3"><i data-id="{{$item->id}}" class='bx bxs-trash'></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
            
           
        </tbody>
    </table>

    <nav style="margin-top: 25px;position: absolute;right: 0px;" aria-label="paginate">
        <ul class="pagination pagination-sm">
            @if ($postlist->onFirstPage())
            <li class="page-item disabled"><a class="page-link" href="javascript:;" tabindex="-1" aria-disabled="true">Önceki</a>
            </li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $postlist->previousPageUrl() }}" tabindex="-1" >Önceki</a>
        </li>
           
        @endif

           
    {{-- Sayfa Numaraları --}}
    @foreach ($postlist->links()->elements[0] as $page => $url)
    @if ($page == $postlist->currentPage())
    <li class="page-item active" aria-current="page"><a class="page-link" href="javascript:;">{{ $page }}<span class="visually-hidden"></span></a>
    </li>
        
    @else
    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
    </li>
       
    @endif
@endforeach

 {{-- Sonraki Sayfa --}}
 @if ($postlist->hasMorePages())
 <li class="page-item"><a class="page-link" href="{{ $postlist->nextPageUrl() }}">Sonraki</a></li>
@else
<li class="page-item disabled"><a class="page-link" href="javascript:;">Sonraki</a>
@endif
           

           
           
        </ul>
    </nav>

</div>
</div>



</div>
@endif
      
</div>
@endsection
@section('js')
    <script>

          var deleteUrl = "{{ route('posts.delete', ':id') }}";
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