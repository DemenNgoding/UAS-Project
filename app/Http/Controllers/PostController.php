<?php 
    namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function create_post(Request $request)
    {
        $data = new Post;

        $data['user_id'] = Auth::id();

        $data->title = $request->title;
        $data->caption = $request->caption;
        $image = $request->image;

        if ($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
        }

        $data->post_date = now();
        $data->save();

        return redirect()->back()->with('success', 'Post Created Successfully');
    }

    public function view_post()
    {
        $post = Post::all();

        return view('Post.AllPost', compact('post'));
    }

    public function edit_post($id)
    {
        $data = Post::find($id);

        return view('Post.UpdatePost', compact('data'));
    }

    public function update_post(Request $request, $id)
    {
        $post = Post::find($id);

        $post['user_id'] = Auth::id();

        $post->title = $request->title;
        $post->caption = $request->caption;

        $post->post_date = now();
        $post->save();

        return redirect()->back();
    }
}
?>