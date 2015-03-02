@extends('blog::master')

@section('body')
<div class="container index">

    <div class="clearfix top">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li class="active">{!! Html::link('/blog','Last Post') !!}</li>
                <li>{!! Html::link('/','Back to Site') !!}</li>
            </ul>
        </nav>
        <h3 class="text-muted">{!! Html::link('/blog',\Config::get('blog.title')) !!}</h3>
    </div>
     @if(count($last)==0)
               <div class="alert alert-warning" role="alert">Noting to see, go to panel and post something first !</div>
     @else
    <p class="subtitle fancy"><span>MOST RECOMMENDED</span></p>

    <div class="most-recommended-img clearfix">
        <a href="{{$mostRecommended->getUrl()}}"><img src="uploads/{{$mostRecommended['image']}}" class="img-responsive img-rounded col-xs-12 no-padding" alt="{{$mostRecommended['title']}}"></a>
    </div>
    <div class="row most-recommended">
        <a href="{{$mostRecommended->getUrl()}}"><h1>{{$mostRecommended['title']}}</h1>

            <h4>
               {{ str_limit(strip_tags($mostRecommended['content']),150) }}...
            </h4>
            <p>{{$mostRecommended['author']}}</p>
        </a>
    </div>
    <p class="subtitle fancy"><span>LATEST</span></p>
    <div class="lastPost">
        @foreach($last as $post)
            <div class="row post-items">
                <a href="{{$post->getUrl()}}">
                <div class="media col-md-3 no-padding">
                    <figure class="pull-left ">
                        <img class="media-object img-rounded img-responsive"  src="uploads/{{$post['image']}}" alt="{{$post['title']}} " >
                    </figure>
                </div>
                <div class="col-md-9">
                    <h3 class="list-group-item-heading">{{$post['title']}}</h3>
                    <p class="list-group-item-text"> {{substr(strip_tags($post['content']), 0, 150)}}... </p>
                    <small>{{$post['author']}}</small>
                </div>
                </a>
            </div>
        @endforeach
    </div>
    @endif
</div>
<footer class="footer">
      <div class="container">
        <p class="text-muted">Powered by <a href="https://github.com/serverfireteam/panel">Serverfireteam/panel</a> .</p>
      </div>
    </footer>


        


@stop