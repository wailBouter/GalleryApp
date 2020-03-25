<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('gallery/list')}}">Gallery</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('gallery/list')}}">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div class="dropdown pull-xs-right">
            <button class="btn dropdown-toggle" type="button" id="lr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{auth::user()->name}}
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="lr1">
                <button class="dropdown-item" type="button">Action</button>
                <button class="dropdown-item" type="button">Another action</button>
                <button class="dropdown-item disabled" type="button">Disabled action</button>
                <div class="dropdown-divider"> </div>
                <a class="dropdown-item" href="{{url('user/logout')}}">Logout</a>
            </div>
        </div>
     
    </div>
  </nav>