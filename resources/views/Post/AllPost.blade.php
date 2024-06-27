<!DOCTYPE html>
<html lang="en">
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/
    sweetalert/2.1.2/sweetalert.min.js" integrity="
    sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7L
    bgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" 
    referrerpolicy="no-referrer"></script>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Post</title>

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
                <br>
                <br>
                <table>
                    <tr>
                        <th> Post Title </th>

                        <th> Caption </th>

                        <th> Image </th>

                        <th> Edit </th>

                        <th> Delete </th>
                    </tr>
                    
                    @foreach($post as $post)
                    <tr>
                        <td>{{$post->title}}</td>

                        <td>{{$post->caption}}</td>

                        <td>
                            <img width="150px" src="postimage/{{$post->image}}">
                        </td>
                        
                        <td>
                            <a href="{{url('edit_post', $post->id)}}">
                                <button>
                                    Edit
                                </button>
                            </a>
                        </td>

                        <td>
                            <a href="{{url('delete_post', $post->id)}}">
                                <button class="btn-danger" onclick="confirmation()">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>   
                    @endforeach
                </table>   
            </center>
        </div>

        <script>
            function confirmation()
            {
                if (window.confirm('Are you sure want to delete this post?')) {
                    router.delete(route('post.destroy', props.post), {
                        preserveScroll: true
                    });
                }
            }
        </script>
    </body>
</html>