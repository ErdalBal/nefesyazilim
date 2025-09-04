@extends('backend.layout.master')
@section('title')
   Ayarlar List 
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative">
                <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
            </div>
          {{-- <div class="ms-auto"><a href="{{route('author.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Yazar Ekle</a></div> --}}

         
        </div>

        @if (session()->has('success'))
        <div class="alert alert-success">
            <p style="font-size: 27px; font-weight: 500; color: white;" class="text-center">{{ session('success') }}</p>
          </div>
        @endif
      
@if (count($settingslist)==0)
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
                <th>Değer</th>               
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settingslist as $key => $item)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                      
                        <div class="ms-2">
                            <h6 class="mb-0 font-14">#{{$key+1}}</h6>
                        </div>
                    </div>
                </td>
                {{-- <td>
                    
                    <img width="100" height="75" src="{{asset('backend/uploads/user/'.$item->file)}}" alt="">
                </td> --}}
                <td>{{$item->settings_description}}</td>                
                <td>
                    @if ($item->settings_type=='file' )
                    <img width="100" height="75" src="{{asset('backend/uploads/setting/'.$item->settings_value)}}" alt="">
                @else
                {{$item->settings_value}}
                @endif
                    
                </td>
                <td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>{{$item->settings_status==1 ? 'Aktif' : 'Pasif' }}</div></td>
               
                <td>
                    <div class="d-flex order-actions">
                        <a href="{{route('settings.edit',$item->id)}}" class=""><i class='bx bxs-edit'></i></a>
                        <a  href="javascript:;" class="ms-3"><i data-id="{{$item->id}}" class='{{$item->settings_delete==0 ? "lni lni-ban" : "bx bxs-trash"}}'></i></a>
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
    <script>

          var deleteUrl = "{{ route('settings.delete', ':id') }}";
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