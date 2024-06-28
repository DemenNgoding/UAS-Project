<?php 
    namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\PostUserLike;

class PostController extends Controller
{
    public function create_post(Request $request)
    {
        // $user_id = Auth::id();
        // $user = User::find($user_id);
        // $post->name = $user->name;
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
        else {
            $data->image = null;
        }

        $data->post_date = now();
        $data->save();

        return redirect('view_post');
    }

    public function view_post()
    {
        $post = Post::with('user')->get();

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

        if ($post->user_id != Auth::id()) {
            return redirect('view_post');
        }

        $post->title = $request->title;
        $post->caption = $request->caption;
        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        } 
        else {
            $post->image = $post->image;
        }

        $post->post_date = now();
        $post->save();

        return redirect('view_post')->with('success', 'Post Updated Successfully');
    }

    public function delete_post($id)
    {
        $data = Post::find($id);

        if($data->user_id != Auth::id()){
            return redirect()->back()->with('error', 'You cannot delete this post!');
        }

        $data->delete();

        return redirect()->back();
    }

    public function like_post($id)
    {
        $user_id = Auth::id();
        $post = Post::find($id);

        $like = PostUserLike::where('user_id', $user_id)->where('post_id', $id)->first();

        if (!$like) {
            $post->like += 1;
            $post->save();

            PostUserLike::create([
                'user_id' => $user_id,
                'post_id' => $id,
            ]);

            return redirect()->back()->with('success', 'You liked the post');
        }

        return redirect()->back()->with('error', 'You already liked this post');
    }

    public function unlike_post($id)
    {
        $user_id = Auth::id();
        $post = Post::find($id);

        $like = PostUserLike::where('user_id', $user_id)->where('post_id', $id)->first();

        if ($like) {
            $post->like -= 1;
            $post->save();

            $like->delete();

            return redirect()->back()->with('success', 'You unliked the post');
        }

        return redirect()->back()->with('error', 'You have not liked this post');
    }
}
?>