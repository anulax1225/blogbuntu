<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.list', [
            'blogs' => Blog::mostViewed()
        ]);
    }

    public function list()
    {
        return view('blog.list', [
            'blogs' => Blog::mostRecent()
        ]);
    }

    public function single($id)
    {
        $blog = Blog::find($id);
        if (!$blog) return response('', 404);
        $blog->views += 1;
        $blog->save();
        return view('blog.single', [
            'blog' => $blog
        ]);
    }

    public function like($id)
    {
        $blog = Blog::find($id);
        try {
            $blog->likes()->attach(request()->user()->id);
        } catch(QueryException $e) {
            return redirect('/blog/' . $id)->withErrors([
                "error" => "Blog already liked"
            ]);
        }
        return redirect('/blog/' . $id);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function insert()
    {
        request()->validate([
            'title' => 'required',
        ]);

        $id = request()->user()->id;

        $image = BlogController::getRequestImage();
        
        Log::info($image);
        Log::info("Helllo");
        $blog = Blog::create([
            'title' => request('title'),
            'containt' => request('containt'),
            'epilog' => request('epilog'),
            'user_id' => $id,
        ]);
        if($image) $blog->image = $image;
        $blog->save();

        return redirect('/blog/' . $blog->id);
    }

    private static function getRequestImage()
    {
        if(request()->hasFile('image'))
        {
            $hash = request()->file('image')->hashName();
            request()->file('image')->store('public/images/blog');
            return $hash;
        }
        else return "";
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        if (!$blog) return response('', 404);
        if (request()->user()->id != $blog->user->id) return response('', 401);
        $blog->delete();
        return response('', 200);
    }

    public function update($id)
    {
        request()->validate([
            'title' => 'required',
        ]);

        $blog = Blog::find($id);

        if (!$blog) return response('', 404);
        if (request()->user()->id != $blog->user->id) return response('', 401);

        $image = BlogController::getRequestImage();

        $blog->title = request('title');
        $blog->containt = request('containt');
        $blog->epilog = request('epilog');
        if($image) $blog->image = $image;
        $blog->save();

        return response('', 200);
    }
}
