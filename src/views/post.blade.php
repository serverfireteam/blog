@extends('blog::master')

@section('body')
<div id="blog" class="">
    <!-- Top Navigation -->
    <div class="codrops-top clearfix">
        <a class="fa fa-reply" href="{{url('/')}}"><span style="color:{{$post['color']}}">Back to the Serverfire website</span></a>
        <span class="right"><a style="color:{{$post['color']}}" class="fa fa-list" href="{{url('/blog')}}"><span style="color:{{$post['color']}}">Last Post</span></a></span>

    </div>
    <header class="header">
        <div class="bg-img"><img src="{{url('uploads/'.$post['image'])}}" alt="Background Image"/></div>
        <div class="title">
            <h1 style="color:{{$post['color']}}">{{$post['title']}}</h1>
        </div>
    </header>
    <button class="trigger" data-info="Read the Post"><span>Trigger</span></button>
    <div class="title">
        
        <p class="subline">{{$post['socialPoint']}} People did share it . </p>
        <p>by <strong>{{$post['author']}}</strong> &#8212; Posted in <strong>Serverfire</strong> on <strong>{{$post['created_at']}}</strong></p>
    </div>
    <article class="content post-content">
        <div>{!! $post['content'] !!}</div>
    </article>
    <section class="related">
        <p>If you enjoyed this post, share it on social networks :</p>
        <p>  <a target="_blank" href="{{ Config::get('app.url')  .'/blog/share/'. $post['id']}}/facebook"><i id="social" class="fa fa-facebook-square fa-3x social-fb"></i></a>
            <a target="_blank" href="{{ Config::get('app.url')  .'/blog/share/'. $post['id']}}/twitter"><i id="social" class="fa fa-twitter-square fa-3x social-tw"></i></a>
            <a target="_blank" href="{{ Config::get('app.url')  .'/blog/share/'. $post['id']}}/googlePlus"><i id="social" class="fa fa-google-plus-square fa-3x social-gp"></i></a>
            <a target="_blank" href="{{ Config::get('app.url')  .'/blog/share/'. $post['id']}}/linkedIn"><i id="social" class="fa fa-linkedin-square fa-3x social-gp"></i></a>
        </p>
        <p class="post-button">

            @if($post->nextPost())
            <a class="pull-right btn btn-default" href="{{$post->nextPost()->getUrl()}}">Next : {{$post->nextPost()['title']}}

                <span class="fa fa-angle-right" aria-hidden="true"></span></a>
            @endif

            @if($post->previousPost())
            <a class="pull-left btn btn-default" href="{{$post->previousPost()->getUrl()}}">Previus : {{$post->previousPost()['title']}}
                <span class="fa fa-angle-left" aria-hidden="true"></span>
            </a>
            @endif
        </p>


    </section>
    <section class="content">
<div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = '{{\Config::get('blog.disqus')}}'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    
    </section>


</div><!-- /blog -->





{!! Html::script('js/classie.js') !!}
<script src="//cdnjs.cloudflare.com/ajax/libs/mobile-detect/0.4.3/mobile-detect.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $('.header').css('height',$(window).height());
</script>


<!-- Include required JS files -->
<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shCore.js")}}"></script>
<!--
    At least one brush, here we choose JS. You need to include a brush for every 
    language you want to highlight
-->

<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shAutoloader.js")}}"></script>
<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shBrushJScript.js")}}"></script>
<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shBrushCss.js")}}"></script>
<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shBrushPhp.js")}}"></script>
<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shBrushXml.js")}}"></script>
<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shBrushPlain.js")}}"></script>
<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shBrushSql.js")}}"></script>
<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shBrushBash.js")}}"></script>
<script type="text/javascript" src="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/scripts/shLegacy.js")}}"></script>
 

<script type="text/javascript">
     SyntaxHighlighter.all()
</script>

@stop