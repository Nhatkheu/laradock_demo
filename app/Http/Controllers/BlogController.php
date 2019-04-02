<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Storage;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs            = Blog::all();
        return view('blog.index', compact('blogs','image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request->hasFile('imageTest')){
         $fileNameWithEx  = $request->file('imageTest')->getClientOriginalName();
         $fileNameToStore = time(). '_' .$fileNameWithEx;
         $path            = $request->file('imageTest')->move('upload', $fileNameToStore);
      } else {
         $fileNameToStore = 'noName.jpg';
      }

        $blog             = new Blog();
        $blog->title      = $request->title;
        $blog->content    = $request->content;
        $blog->image      = $fileNameToStore;
        $blog->save();
        return redirect('blog')->with('status','Upload Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog             = Blog::find($id);
        return view('blog.edit', compact('blog','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $blog               = Blog::find($id);
      if ($request->hasFile('imageTest')){
         File::delete(public_path()."/upload/".$blog->image);
         $fileNameWithEx  = $request->file('imageTest')->getClientOriginalName();
         $fileNameToStore = time(). '_' .$fileNameWithEx;
         $path            = $request->file('imageTest')->move('upload', $fileNameToStore);
      } else {
         $fileNameToStore = 'noName.jpg';
      }

      $blog->title        = $request->title;
      $blog->content      = $request->content;
      $blog->image        = $fileNameToStore;
      $blog->save();
      return redirect('blog')->with('status','Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog             = Blog::find($id);
        $path             = public_path()."/upload/".$blog->image;
        unlink($path);
        $blog->delete();
        return redirect('blog')->with('status','Deleted');
    }
}
