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
                <a href="{{url('view_post')}}">
                    <button class="btn btn-secondary"> 
                        View Post
                    </button>
                </a>
                
                <h1> CREATE POST </h1>
                <form action="{{url('create_post/{user_id}')}}" method="POST" enctype ="multipart/form-data">

                    @csrf

                    {{-- Input Title --}}
                    <div>
                        <label class="div_deg">Title</label><br>
                        <input type="text" name="title">
                    </div>
                    <br>
                    {{-- Input Caption --}}
                    <div>
                        <label class="div_deg">Caption</label><br>
                        <textarea name="caption"></textarea>
                    </div>
                    <br>
                    {{-- Input Image --}}
                    <div>
                        <label class="div_deg">Add Image</label><br>
                        <input type="file" name="image">
                    </div>
                    <br>
                    <br>
                    {{-- Submit Button --}}
                    <div>
                        <input type="submit" value="Create Post" class = "btn btn-primary">
                    </div>
                </form>
            </center>
        </div>
    </body>
</html>
