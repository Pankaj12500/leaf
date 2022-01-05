<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        if($validate->fails()){
            return redirect(route('blogs.create'))
                        ->withErrors($validate)
                        ->withInput();
        }
        
        Blog::create([
            'title' => $request->title,
            'type' => $request->type,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect(route('blogs.index'))->with('successMsg', 'Data Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        if($validate->fails()){
            return redirect(route('blogs.edit', $id))
                        ->withErrors($validate)
                        ->withInput();
        }
        
        $blog = Blog::find($id);
        $blog->update([
            'title' => $request->title,
            'type' => $request->type,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect(route('blogs.index'))->with('successMsg', 'Data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if($blog){
            $blog->delete();
            return redirect(route('blogs.index'))->with('successMsg', 'Data Deleted Successfully !');
        }
        return redirect(route('blogs.index'))->with('successError', 'Whoops, Blog Not Found !');
    }
}
