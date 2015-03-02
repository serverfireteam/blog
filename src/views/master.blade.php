<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>{{$title}} | {{ \Config::get('blog.title')}} </title>
		<link rel="shortcut icon" href="../favicon.ico">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        {!! Html::style('packages/serverfireteam/blog/css/styles.css') !!}
        <!-- Include *at least* the core style and default theme -->
		<link href="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/styles/shCore.css")}}" rel="stylesheet" type="text/css" />
		<link href="{{asset("packages/serverfireteam/blog/libs/syntaxhighlighter/styles/shThemeDefault.css")}}" rel="stylesheet" type="text/css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body >
            @yield('body')
	</body>
</html>