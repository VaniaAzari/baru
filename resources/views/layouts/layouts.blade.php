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
</head>
<body>
    {!! Html::image('img/logo.jpg') !!}
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
                   <h4> &copy; 2018 E-Learning | By : Politeknik Caltex Riau </h4>
                </div>
            </div>
        </div>
    </footer>  
 {!!Html::script('assets/js/jquery-1.11.1.js')!!}
 {!!Html::script('assets/js/bootstrap.js')!!}
</body>
</html>
