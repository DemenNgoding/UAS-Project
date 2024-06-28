<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Post</title>

        {{-- Import css --}}
        <link rel="stylesheet" href="{{asset('assets/css/Post.css')}}">
    </head>

    <body>
        <div>
            <center>
                <a href="{{url('view_post')}}">
                    <button class="btn btn-secondary"> 
                        Back
                    </button>
                </a>
                
                <h1> Update POST </h1>
                
                <form action="{{url('update_post', $data->id)}}" method="POST" enctype ="multipart/form-data">

                @csrf

                    <div class="div_deg">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$data->title}}">
                    </div>

                    <div class="div_deg">
                        <label>Caption</label>
                        <textarea name="caption">{{$data->caption}}</textarea>
                    </div>

                    <div>
                        <label class="div_deg">Old Image</label>
                        <img width="150px" src="/postimage/{{$data->image}}">
                    </div>

                    <div class="div_deg">
                        <label>Change Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="div_deg">
                        <input type="submit" value="Update Post">
                    </div>
                </form>
            </center>
        </div>
    </body>
</html>
