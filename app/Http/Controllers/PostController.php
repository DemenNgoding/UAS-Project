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

        return view('AllPost', compact('post'));
    }

}
?>