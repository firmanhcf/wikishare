<aside class="main-sidebar">
  <section class="sidebar">
    
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{is_null(Auth::user()->photo)?url('assets/images/avatar2.png'):url('assets/img/'.Auth::user()->photo)}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
         <div> @if(Auth::user()->admin==0)
            Staf
          @elseif(Auth::user()->admin==1)
            Administrator
          @elseif(Auth::user()->admin==2)
            Manajer
          @else
            Asisten Manajer
          @endif</div>
        <a href="{{url('auth/logout')}}"><i class="fa fa-sign-out"></i>Logout</a>
      </div>
    </div>
    
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      @if(Auth::user()->admin==0)
      <li class="{{(Route::currentRouteName() == 'profile')?'active':''}}">
        <a href="{{route('profile')}}">
          <i class="fa fa-file-text"></i> <span>Artikel</span>
        </a>
      </li>
      @elseif(Auth::user()->admin==2 || Auth::user()->admin==1)
      <li class="{{(Route::currentRouteName() == 'admin.dashboard')?'active':''}}">
        <a href="{{route('admin.dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="{{(Route::currentRouteName() == 'admin.member')?'active':''}}">
        <a href="{{route('admin.member')}}">
          <i class="fa fa-user"></i> <span>Member</span>
        </a>
      </li>
      <li class="{{(Route::currentRouteName() == 'admin.article')?'active':''}}">
        <a href="{{route('admin.article')}}">
          <i class="fa fa-file-text"></i> <span>Artikel</span>
        </a>
      </li>
      @elseif(Auth::user()->admin==3)
      <li class="{{(Route::currentRouteName() == 'admin.dashboard')?'active':''}}">
        <a href="{{route('admin.dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="{{(Route::currentRouteName() == 'admin.article')?'active':''}}">
        <a href="{{route('admin.article')}}">
          <i class="fa fa-file-text"></i> <span>Artikel</span>
        </a>
      </li>
      @endif
      @if(Auth::user()->admin==1)
        <li class="{{(Route::currentRouteName() == 'admin.division')?'active':''}}">
          <a href="{{route('admin.division')}}">
            <i class="fa fa-puzzle-piece"></i> <span>Divisi</span>
          </a>
        </li>
      @endif
      <li class="{{(Route::currentRouteName() == 'member.settings.view')?'active':''}}">
        <a href="{{route('member.settings.view')}}">
          <i class="fa fa-gear"></i> <span>Pengaturan</span>
        </a>
      </li>
      
    </ul>
  </section>

</aside>