<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Page::orderBy('id','desc')->paginate(10);
        //return $pools;
        return view("admin.modules.pages.index",compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.modules.pages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $page_master = $request->all();
        $page_master['slug'] = Str::slug($request->title);
        $page_master['user_id'] = auth()->user()->id;
        $page = Page::create($page_master);
        // if($request->hasFile('image')){
        //     foreach($request->file('image') as $file)
        //     {
        //         if($file){
        //             $name = $pool->id.'_'.time().rand(1,100).'.'.$file->extension();
        //             $file->move(public_path('uploads'), $name);
        //             $image = new Pool_image();
        //             $image->name = $name;
        //             $pool->images()->save($image);
        //         }
        //     }
        // }

        return redirect('module/page')->with('message','Page created');
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
        $result =  Page::find($id);

        //return $result->session_wise_price->groupBy('date');
        return view('admin.modules.pages.edit',compact('result'));
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
        $page = Page::find($id);
        $page_master = $request->all();
        $page_master['slug'] = Str::slug($request->title);
        $page->fill($page_master)->save();
        return redirect('module/page')->with('message','Page Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
