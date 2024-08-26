<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

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
            return response('', 400);
        }
         
        return response('', 200);
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
        $blog = Blog::create([
            'title' => request('title'),
            'containt' => request('containt'),
            'epilog' => request('epilog'),
            'user_id' => $id,
        ]);

        return redirect('/blog/' . $blog->id);
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

        $blog->title = request('title');
        $blog->containt = request('containt');
        $blog->epilog = request('epilog');
        $blog->save();

        return response('', 200);
    }
}
