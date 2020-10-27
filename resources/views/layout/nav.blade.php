<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark text-white">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}} ">Project 2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            
            </ul>            
            
            <ul class="navbar-nav">   
                @if(Auth::check())                                       
                    @if(Auth::user()->hasRole('manager'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('admin/panel')}}">
                                <i class="fas fa-cogs" title="tools"></i>                            
                            </a>
                        </li>   
                    @endif  
                @endif
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::check())
                            {{Auth::user()->name}}
                        @else
                            action
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::check())
                            <a class="dropdown-item" href="{{url('logout')}}">
                                <i class="fas fa-users-cog"></i> options
                            </a>
                            <a class="dropdown-item" href="{{url('logout')}}">
                               <i class="fas fa-sign-out-alt"></i> logout
                            </a>
                        @else
                        <a class="dropdown-item" href="{{url('login')}}">
                            <i class="fas fa-sign-in-alt"></i> login
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href=" {{url('register')}} ">
                            <i class="fas fa-user-plus"></i> register
                        </a>
                        @endif                    
                    </div>
                </li>            
            </ul>
        </div>
    </div>
</nav>
