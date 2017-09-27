<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags.index')->with('tags',Tag::all());
           }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $tags = Tag::all();

        if($tags->count() == 0){
            Session::flash('info','You must have some category.');
            
        }
        Session::flash('success','Tag created successfully');
        return view('admin.tags.create')->with('tags', $tags);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $this->validate($request,[
              'tag' => 'required'
            ]);
        Tag::create([
          'tag'=>$request->tag
        ]);
        Session::flash('success','Tag updated successfully');
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        Session::flash('success','Tag update successfully');
        return view('admin.tags.edit')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tag'=>'required'

        ]);

        $tag =Tag::find($id);
        $tag->tag = $request->tag;
        $tag->save();
        Session::flash('success','Tag update');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Tag::destroy($id);
        Session::flash('success','tag deleted.');
        return redirect()->back();

    }
}
