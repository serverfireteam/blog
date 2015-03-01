@extends('blog.master')

@section('body')
<div id="blog" class="blog intro-effect-push">
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
        <h1>{{$post['title']}}</h1>
        <p class="subline">{{$post['socialPoint']}} People did share it . </p>
        <p>by <strong>{{$post['author']}}</strong> &#8212; Posted in <strong>Serverfire</strong> on <strong>{{$post['created_at']}}</strong></p>
    </div>
    <article class="content post-content">
        <div>{{$post['content']}}</div>
    </article>
    <section class="related">
        <p>If you enjoyed these post share it in social network:</p>
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
        var disqus_shortname = 'serverfire'; // required: replace example with your forum shortname

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





{{HTML::script('js/classie.js')}}
<script>
    (function () {

        // detect if IE : from http://stackoverflow.com/a/16657946		
        var ie = (function () {
            var undef, rv = -1; // Return value assumes failure.
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf('MSIE ');
            var trident = ua.indexOf('Trident/');

            if (msie > 0) {
                // IE 10 or older => return version number
                rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
            } else if (trident > 0) {
                // IE 11 (or newer) => return version number
                var rvNum = ua.indexOf('rv:');
                rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
            }

            return ((rv > -1) ? rv : undef);
        }());


        // disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179					
        // left: 37, up: 38, right: 39, down: 40,
        // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
        var keys = [32, 37, 38, 39, 40], wheelIter = 0;

        function preventDefault(e) {
            e = e || window.event;
            if (e.preventDefault)
                e.preventDefault();
            e.returnValue = false;
        }

        function keydown(e) {
            for (var i = keys.length; i--; ) {
                if (e.keyCode === keys[i]) {
                    preventDefault(e);
                    return;
                }
            }
        }

        function touchmove(e) {
            preventDefault(e);
        }

        function wheel(e) {
            // for IE 
            //if( ie ) {
            //preventDefault(e);
            //}
        }

        function disable_scroll() {
            window.onmousewheel = document.onmousewheel = wheel;
            document.onkeydown = keydown;
            document.body.ontouchmove = touchmove;
        }

        function enable_scroll() {
            window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;
        }

        var docElem = window.document.documentElement,
                scrollVal,
                isRevealed,
                noscroll,
                isAnimating,
                container = document.getElementById('blog'),
                trigger = container.querySelector('button.trigger');

        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }

        function scrollPage() {
            scrollVal = scrollY();

            if (noscroll && !ie) {
                if (scrollVal < 0)
                    return false;
                // keep it that way
                window.scrollTo(0, 0);
            }

            if (classie.has(container, 'notrans')) {
                classie.remove(container, 'notrans');
                return false;
            }

            if (isAnimating) {
                return false;
            }

            if (scrollVal <= 0 && isRevealed) {
                toggle(0);
            }
            else if (scrollVal > 0 && !isRevealed) {
                toggle(1);
            }
        }

        function toggle(reveal) {
            isAnimating = true;

            if (reveal) {
                classie.add(container, 'modify');
            }
            else {
                noscroll = true;
                disable_scroll();
                classie.remove(container, 'modify');
            }

            // simulating the end of the transition:
            setTimeout(function () {
                isRevealed = !isRevealed;
                isAnimating = false;
                if (reveal) {
                    noscroll = false;
                    enable_scroll();
                }
            }, 1200);
        }

        // refreshing the page...
        var pageScroll = scrollY();
        noscroll = pageScroll === 0;

        disable_scroll();

        if (pageScroll) {
            isRevealed = true;
            classie.add(container, 'notrans');
            classie.add(container, 'modify');
        }

        window.addEventListener('scroll', scrollPage);
        trigger.addEventListener('click', function () {
            toggle('reveal');
        });
    })();
</script>


<!-- Include required JS files -->
<script type="text/javascript" src="{{asset("js/libs/syntaxhighlighter/scripts/shCore.js")}}"></script>
<!--
    At least one brush, here we choose JS. You need to include a brush for every 
    language you want to highlight
-->
<script type="text/javascript" src="{{asset("js/libs/syntaxhighlighter/scripts/shBrushJScript.js")}}"></script>
<script type="text/javascript" src="{{asset("js/libs/syntaxhighlighter/scripts/shBrushCss.js")}}"></script>
<script type="text/javascript" src="{{asset("js/libs/syntaxhighlighter/scripts/shBrushPhp.js")}}"></script>
 
<!-- Include *at least* the core style and default theme -->
<link href="{{asset("js/libs/syntaxhighlighter/styles/shCore.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset("js/libs/syntaxhighlighter/styles/shThemeDefault.css")}}" rel="stylesheet" type="text/css" />
<script type="text/javascript">
     SyntaxHighlighter.all()
</script>

@stop