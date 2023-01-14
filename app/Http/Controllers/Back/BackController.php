<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\BaseController;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BackController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.home');
    }

    public function getPost(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::latest('id')->with('tags');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('user_id', function ($data) {
                    return $data->users->name;
                })
                ->editColumn('category_id', function ($data) {
                    return $data->category->category_name;
                })
                ->addColumn('tag_id', function ($data) {
                    return $data->tags->pluck('tag_list')->toArray();
                })
                ->editColumn('post_image', function ($data) {
                    if ($data->post_image) {
                        return sprintf(
                            // "<img class='img-responsive' src='" . $data->image . "'>",
                            "<img class='img-responsive' src='" . ($data->imageAsset()) . "' alt='image' border='0' height='100' width='200'>",
                        );
                    }
                    return '';
                })
                ->addColumn('action', function ($data) {
                    $route = route('post.edit', $data->id);
                    return view('components.action-button', compact('data', 'route'));
                })
                ->rawColumns(['post_image'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
