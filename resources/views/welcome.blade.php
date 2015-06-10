@extends('app')

@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="img/slide/slide4.jpg"  alt="">
            </div>

            <div class="item">
                <img src="img/slide/slide2.jpg"  alt="">
            </div>

            <div class="item">
                <img src="img/slide/slide3.jpg"  alt="">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container" style="padding-top:70px; padding-bottom: 70px;">
        <hr>
        <div class=" text-center" >

            <h1 class="orange-title">Features</h1>
            <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                <br>
                et dolore magna aliqua. Ut enim ad minim veniam
            </p>
        </div>
        <hr>
        <div class="row" style="padding-top: 30px;">
            <div class="col-md-4 col-sm-6"">
            <div class="feature-wrap text-center">
                <i class="fa fa-bullhorn"><img class="service-icon" src="img/icons/1.png"  alt=""></i>
                <h2 class="orange-title">Fresh and Clean</h2>
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 ">
            <div class="feature-wrap text-center">
                <i class="fa fa-comments"><img class="service-icon" src="img/icons/2.png"  alt=""></i>
                <h2 class="orange-title">Retina ready</h2>
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 " >
            <div class="feature-wrap text-center" >
                <i class="fa fa-cloud-download"><img class="service-icon" src="img/icons/3.png"  alt=""></i>
                <h2 class="orange-title">Easy to customize</h2>
                <h4 >Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
            </div>
        </div>
    </div>
@endsection
