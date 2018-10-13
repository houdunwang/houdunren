<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document1111</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    @include('layouts._hdjs')
    <script>
        require(['bootstrap'])
    </script>
</head>
<body>
<h1>{{$category['title']}}</h1>
@foreach($articles as $article)
    <a href="{{route('content.article',$article)}}">{{$article['title']}}</a>
@endforeach
<hr>
{!! $articles->links() !!}
</body>
</html>