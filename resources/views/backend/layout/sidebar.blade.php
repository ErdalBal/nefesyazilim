<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Blog Sitesi</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('Dashboard')}}" >
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Ana Sayfa</div>
            </a>
           
        </li>
       
        @if (Auth::user()->role=='admin')
        <li>
            <a href="{{route('category.index')}}">
                <div class="parent-icon"><i class='lni lni-comments-reply'></i>
                </div>
                <div class="menu-title">Blog Kategori</div>
            </a>
        </li>

        
        @endif
       


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-trello'></i>
                </div>
                <div class="menu-title">Blog</div>
            </a>
      
        
            <ul>

                <li> <a href="{{route('posts.index')}}"><i class="bx bx-right-arrow-alt"></i>Post</a>
                </li> 
                @if (Auth::user()->role=='admin')
                <li> <a href="{{route('author.index')}}"><i class="bx bx-right-arrow-alt"></i>Yazarlar</a>
                </li> 
                <li> <a href="{{route('commentpost.index')}}"><i class="bx bx-right-arrow-alt"></i>Yorumlar</a>
                </li> 
                @endif
                {{-- @foreach($activeCategories as $category)
                
                <li> <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>{{ $category->title }}</a>
                </li>

                  @endforeach  --}}
            </ul>
        </li>

        @if (Auth::user()->role=='admin')
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='lni lni-comments-reply'></i>
                </div>
                <div class="menu-title">Site Ayarları</div>
            </a>
            <ul>

                <li> <a href="{{route('settings.index')}}"><i class="bx bx-right-arrow-alt"></i>Genel Ayarlar</a>
                </li> 
                
               
                <li> <a href="{{route('portfolio.index')}}"><i class="bx bx-right-arrow-alt"></i>Portfolio</a>
                </li> 
                <li> <a href="{{route('about.index')}}"><i class="bx bx-right-arrow-alt"></i>Hakkında</a>
                </li> 
                <li> <a href="{{route('aboutservice.index')}}"><i class="bx bx-right-arrow-alt"></i>Deneyim</a>
                </li>
            </ul>

        </li>
        @endif
      

       
      
{{--        
        <li>
            <a href="user-profile.html">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li> --}}
       
       
    
    </ul>
    <!--end navigation-->
</div>