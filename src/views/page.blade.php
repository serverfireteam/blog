@extends('layouts.inner')

@section('head')
  <link rel="stylesheet" type="text/css" href="css/grid/component.css" />
@show

@section('content')
    @include('header')
    <section>
        
        <div class="row title">
              <div class="col-md-8 col-md-offset-2 wp1 animated fadeInLeft">
                <h1 class="arrow">{{$page->title}}</h1>
              </div>
        </div>
        <div class="row">
            {{$page->content}}
        </div>
        
    </section>
    @include('footer')


    <script src="js/libs/grid/modernizr.custom.js"></script>
    <script src="js/libs/grid/imagesloaded.pkgd.min.js"></script>
    <script src="js/libs/grid/masonry.pkgd.min.js"></script>
    <script src="js/libs/grid/classie.js"></script>
    <script src="js/libs/grid/cbpGridGallery.js"></script>
    <script>
            new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
    </script>
    
@stop