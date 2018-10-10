<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>E-Learning</title>    
        {!!Html::style('assets/css/bootstrap.css')!!}
        {!!Html::style('assets/css/font-awesome.css')!!}
        {!!Html::style('assets/css/style.css')!!}
        {!!Html::script('assets/js/tinymce/tiny_mce.js')!!}
        <link href="{{ asset('assets2/css/jquery.dataTables.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets2/css/smoke.min.css') }}" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" rel="stylesheet"/>
        
      
        @yield('text')
        {!!Html::script('assets/js/jquery-1.11.1.js')!!}
        {!!Html::script('assets/js/bootstrap.js')!!}
        <script src="{{ asset('assets2/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets2/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets2/js/smoke.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
        
        
</head>
<body>
    <header>
        <div class="container">
            <div class="btn-group">
               <a href="{{url('/helpdosen')}}" class="btn btn-md btn-primary" >Bantuan</a>
            </div>
                <div class="btn-group">
                     <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="glyphicon glyphicon-user"></span>&nbsp; {{ Auth::guard('dosen')->user()->nama }} <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                        <li><a href="{{url('/profiledosen')}}"> <span class="glyphicon glyphicon-user"></span> &nbsp; Profil</a></li>
                        <li><a href="{{url('/keluar')}}"> <span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</a></li>
                        </ul>
                </div>
        </div>        
    </header>   
      {!! Html::image('img/logo.jpg') !!}
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="{{ URL::to('/homedosen') }}">Beranda</a></li>
                             <li><a href="{{ URL::to('/pengumuman') }}">Pengumuman</a></li>                           
                            <li><a href="{{ URL::to('/bahanajardosen') }}">Materi</a></li>                            
                            <li><a href="{{ URL::to('/bahanajartugasdosen') }}">Tugas</a></li>
                             <!-- <li><a href="{{  route('kuis.group') }}">Kuis</a></li> -->
                            <li>
                            <a data-toggle="dropdown" href"{{  route('kuis.group') }}">
                                Kuis <span class="caret"></span>
                            </a>
                                <ul class="dropdown-menu" style="background: #337ab7;">
                                    <li><a href="{{  route('kuis.group')  }}">Kuis Pilihan Ganda</a></li>
                                    <li><a href="{{ route('kuis.group.essay')  }}" >Kuis Essay </a></li>
                                </ul>
                            </li>  
                             <li><a href="{{ URL::to('logActivity2') }}">Log History</a></li>       
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">                  
                @yield('content')
                </div>
            </div>       
        </div>
    </div> 
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <h5> &copy; 2018 E-Learning | Politeknik Caltex Riau </h5>
                </div>
            </div>
        </div>
    </footer> 
            @yield('script')
</body>
</html>
                                  
                                                                     
