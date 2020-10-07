@extends('layouts.app')
@section('content')
    <div class="hero-image">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <img src="media/umbrella-img/hero.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-spacing">
            <div class="col-sm-3 ">
                <div class="badge-border">
                    <img src="media/umbrella-img/icon-recycle.gif" alt="">
                </div>
                <h2 class="info-descrip">amazing</h2>
                <p class="description">Support</p>
            </div>
            <div class="col-sm-3 ">
                <div class="badge-border">
                    <img src="media/umbrella-img/icon-phone.gif" alt="">
                </div>  
                <h2 class="info-descrip">24 hour</h2>
                <p class="description">Availibility</p>
            </div>
            <div class="col-sm-3 ">
                <div class="badge-border">
                    <img src="media/umbrella-img/icon-cog.gif" alt="">
                </div>
                <h2 class="info-descrip">web</h2>
                <p class="description">Design</p>
            </div>
            <div class="col-sm-3 ">
                <div class="badge-border">
                    <img src="media/umbrella-img/icon-mobile.gif" alt="">
                </div>
                <h2 class="info-descrip">mobile</h2>
                <p class="description">Development</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3>RECENT FROM <span id="portfolio" class="green-txt">PORTFOLIO</span></h3>
                <!-- DASH NOT WORKING AS INTENDED-->
                <!-- <img class="dash-image" src="media/umbrella-img/dash.gif" alt=""> -->
                <div class="dash-line" style="width:auto;height: 1.5px;background-color: rgb(16, 116, 16);"></div>
                <!-- DASH NOT WORKING AS INTENDED-->
            </div>
        </div>
        <div class="row row-spacing">
            <div class="col-sm-6 info-box">
                <img class="margin-spacing img-responsive" src="media/umbrella-img/callout-1.jpg" alt="">
                    <div class="info-txt">
                        <h4>business cards</h4>
                        <button type="button" class="btn btn-default btn-xs">Video</button>
                        <button type="button" class="btn btn-default btn-xs">Interview</button>
                        <p><strong>Lorem ipsum </strong> dolor sit amet consectetur adipisicing elit. Deserunt placeat dolorem maxime velit obcaecati accusantium error fugiat consectetur quo omnis?</p>
                    </div>
            </div>
            <div class="col-sm-6 info-box hide-box">
                <img class="margin-spacing img-responsive" src="media/umbrella-img/callout-2.jpg" alt="">
                    <div class="info-txt">
                        <h4>moo mini cards</h4>
                        <button type="button" class="btn btn-default btn-xs">Video</button>
                        <button type="button" class="btn btn-default btn-xs">Busniess</button>
                        <p><strong>Lorem ipsum </strong>, dolor sit amet consectetur adipisicing elit. Deserunt placeat dolorem maxime velit obcaecati accusantium error fugiat consectetur quo omnis?</p>
                    </div>
            </div>
        </div>
        <div class="row row-spacing">
            <div class="col-sm-6 info-box">
                <img class="margin-spacing img-responsive" src="media/umbrella-img/callout-3.jpg" alt="">
                    <div class="info-txt">
                        <h4>say it in print</h4>
                        <button type="button" class="btn btn-default btn-xs">Audio</button>
                        <button type="button" class="btn btn-default btn-xs">Print</button>
                        <p><strong>Lorem ipsum </strong>, dolor sit amet consectetur adipisicing elit. Deserunt placeat dolorem maxime velit obcaecati accusantium error fugiat consectetur quo omnis?</p>
                    </div>
            </div>
            <div class="col-sm-6 info-box hide-box">
                <img class="margin-spacing img-responsive" src="media/umbrella-img/callout-4.jpg" alt="">
                    <div class="info-txt">
                        <h4>Graphic in print</h4>
                        <button type="button" class="btn btn-default btn-xs">Video</button>
                        <button type="button" class="btn btn-default btn-xs">Graphics</button>
                        <p><strong>Lorem ipsum </strong>, dolor sit amet consectetur adipisicing elit. Deserunt placeat dolorem maxime velit obcaecati accusantium error fugiat consectetur quo omnis?</p>
                    </div>
            </div>
        </div>
        <div class="row row-spacing">
            <div class="col-sm-12">
                <!-- DASH NOT WORKING AS INTENDED-->
                <h3>OUR MAJOR <span class="green-txt">ADVERTISERS</span></h3>
                <!-- DASH NOT WORKING AS INTENDED-->
                <div class="dash-image"></div>
            </div>
        </div>
        <div class="row row-spacing">
            <div class="col-sm-2 ad-images">
                <img src="media/umbrella-img/water.jpg" alt="">
            </div>
            <div class="col-sm-2 ad-images">
                <img src="media/umbrella-img/plant.jpg" alt="">
            </div>
            <div class="col-sm-2 ad-images">
                <img src="media/umbrella-img/inspired.jpg" alt="">
            </div>
            <div class="col-sm-2 ad-images">
                <img src="media/umbrella-img/bird.jpg" alt="">
            </div>
            <div class="col-sm-2 ad-images">
                <img src="media/umbrella-img/man.jpg" alt="">
            </div>
            <div class="col-sm-2 ad-images">
                <img src="media/umbrella-img/solid.jpg" alt="">
            </div>
        </div>
        <!-- green arrow takes you to the top -->
        <div class="row row-spacing">
            <div class="col-sm-12">
                <a href="#top"><img class="link-to-top" src="media/umbrella-img/up.gif" alt=""></a>
            </div>
        </div>
        <!-- green arrow takes you to the top -->
        <!-- end of the container -->
    </div>
    
@endsection