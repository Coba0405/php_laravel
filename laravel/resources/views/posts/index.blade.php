<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    </head>
    <body>
        @extends('layouts.app')
        @section('title', 'TOP page')

        @section('content')
        <div class="container">
            <div class="row">
                <!-- メイン -->
                <div class="col-10 col-md-8 offset-1 offset-md-2">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th colspan="3">作品名</th>
                            </tr>
                            
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                
                                <td>
                                    <a href="{{ url('posts/'.$post->id) }}" class="btn btn-success">詳細</a>
                                <!-- @auth~@endauthでログインしているときに表示される -->
                                </td>
                                <td>
                                @auth
                                    <form method="POST" action="/posts/{{ $post->id }}/delete">
                                    <!-- <form action="/posts/delete/{{$post->id}}" method="POST"> -->
                                        {{ csrf_field() }}
                                        <!-- @method('DELETE') -->
                                        <button type="submit" class="btn btn-danger post_del_btn">削除</button>
                                        <!-- <input type="submit" value="削除" class="btn btn-danger post_del_btn"> -->
                                    </form>
                                @endauth
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
        @endsection
    <footer>
    </footer>
    </body>
</html>
<DOCTYPE>