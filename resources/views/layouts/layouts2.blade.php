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
      
        @yield('text')
        {!!Html::script('assets/js/jquery-1.11.1.js')!!}
        {!!Html::script('assets/js/bootstrap.js')!!}
        <script src="{{ asset('assets2/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets2/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets2/js/smoke.min.js') }}"></script>
        
</head>
</head>
<body>
    <header>
        <div class="container"> 
         <div class="btn-group">
               <a href="{{url('/bantuan')}}" class="btn btn-md btn-primary" >Bantuan</a>
            </div>           
                   <div class="btn-group">
                         <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="glyphicon glyphicon-user"></span>&nbsp; {{ Auth::guard('admin')->user()->nama }} <span class="caret"></span></button>
                        <ul class="dropdown-menu">
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
                            <li><a href="{{ URL::to('/admin') }}">Beranda</a></li>
                            <li><a href="{{ URL::to('/dosen') }}">Dosen</a></li>
                            <li><a href="{{ URL::to('/mahasiswa') }}">Mahasiswa</a></li>                           
                            <li>
                            <a data-toggle="dropdown" href"{{ URL::to('/prodi') }}">
                                Data <span class="caret"></span>
                            </a>
                                <ul class="dropdown-menu" style="background: #337ab7;">
                                    <li><a href="{{ URL::to('/prodi') }}">Prodi</a></li>
                                    <li><a href="{{ URL::to('/kelas') }}" >Kelas</a></li>
                                    <li><a href="{{ URL::to('/angkatan') }}" >Angkatan</a></li>
                                    <li><a href="{{ URL::to('/matakuliah') }}">Matakuliah</a></li>
                                    <li><a href="{{ URL::to('/matakuliahkelas') }}" >Matakuliah Kelas</a></li>                                   
                                </ul>
                            </li>  
                             <li><a href="{{ URL::to('logActivity') }}">Log History</a></li>                                             
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
                   <h4> &copy; 2018 E-Learning | Politeknik Caltex Riau </h4>
                </div>
            </div>
        </div>
    </footer>   
    @yield('script') 
</body>
</html>
