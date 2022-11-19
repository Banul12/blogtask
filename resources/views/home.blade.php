 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Post</title>
    </head>
    <body >
        @foreach ($posts as $post)
            {{$post->title}}
            {{$post->body}}
            <br>
        @endforeach
        {{$posts->links()}}
</body>
    
</html>

