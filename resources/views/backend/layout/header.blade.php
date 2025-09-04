<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                </div>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon">
                        <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                        </a>
                    </li>
                   
                    <li class="nav-item dropdown dropdown-large">
                       
                        <div class="dropdown-menu dropdown-menu-end">
                          
                            <div class="header-notifications-list">
                               
                              
                              
                            </div>
                           
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                     
                        <div class="dropdown-menu dropdown-menu-end">
                          
                            <div class="header-message-list">
                               
                            </div>
                           
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  
                  @if (Auth::user()->file==null)
                   <img src="{{ asset('backend/assets/images/icons/unnamed.jpg')}}" class="user-img" alt="user avatar">
                  @else
                   <img src="{{ asset('backend/uploads/user/'.Auth::user()->file)}}" class="user-img" alt="user avatar"> 
                  @endif
                    
                    
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">{{Auth::user()->name}}</p>
                        <p class="designattion mb-0">{{Auth::user()->role}}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{route('author.show',Auth::user()->id)}}"><i class="bx bx-user"></i><span>Profil</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('settings.index')}}"><i class="bx bx-cog"></i><span>Genel Ayarlar</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('Dashboard')}}"><i class='bx bx-home-circle'></i><span>Anasayfa</span></a>
                    </li>
                   
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="{{route('Logout')}}"><i class='bx bx-log-out-circle'></i><span>Çıkış Yap</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>