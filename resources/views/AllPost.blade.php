<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Post</title>

        {{-- Import css --}}
        <link rel="stylesheet" href="{{asset('assets/css/Post.css')}}">
    </head>

    <body>
        <div>
            <center>
                <h3> ALL POST </h3>
                <a href="{{url('create_post/{user_id}')}}">
                    <button> Create Post </button>
                </a>
                <table>
                    <tr>
                        <th> Post Title </th>

                        <th> Caption </th>

                        <th> Image </th>
                    </tr>
                    
                    @foreach($post as $post)
                    <tr>
                        <td>{{$post->title}}</td>

                        <td>{{$post->caption}}</td>

                        <td>
                            <img width="150px" src="postimage/{{$post->image}}">
                        </td>
                        
                    </tr>
                    @endforeach
                </table>
            </center>
        </div>
    </body>
</html>
