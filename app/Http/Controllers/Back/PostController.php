<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tags;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('back.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tag      = Tags::all();      // dd($category);

        return view('back.post.create', compact('category', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->all());

        DB::beginTransaction();

        try {
            $post = new Post($request->safe(
                ['post_title', 'category_id', 'post_body', 'post_image']
            ));

            $post->user_id = 1;
            $post->save();

            // dd($request->tag_list);
            if ($request->tag_list) {
                foreach ($request->tag_list as $item => $value) {
                    // dd(123);
                    if (!is_numeric($value)) {

                        $tag = new Tags();
                        $tag->tag_name = $value;
                        $tag->save();

                        $value = $tag->id;
                    }
                    // dd($value);
                    PostTag::create([
                        "post_id" => $post->id,
                        "tag_id" => $value,
                    ]);
                };
            }

            // dd(456);
            $notification = array(
                'message'    => 'Post data has been added!',
                'alert-type' => 'success'
            );
        } catch (Exception $e) {
            DB::rollBack();
            $notification = array(
                'message'    => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification)->withInput();
        }
        DB::commit();
        return redirect()
            ->route('post.index')
            ->with($notification);
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
    public function edit(Post $post)
    {
        $category = Category::get();
        $tag      = Tags::get();
        $listTag = $post->tags->pluck('tag_list');

        return view('back.post.edit', compact('category', 'tag', 'listTag', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // dd($request->all());

        DB::beginTransaction();

        try {
            $post->fill($request->safe(
                ['post_title', 'category_id', 'post_body', 'post_image']
            ));

            $post->user_id = 1;
            $post->update();

            // dd($request->tag_list);
            PostTag::where('post_id', $post->id)->delete();
            if ($request->tag_list) {
                foreach ($request->tag_list as $item => $value) {
                    // dd(123);
                    if (!is_numeric($value)) {

                        $tag = new Tags();
                        $tag->tag_name = $value;
                        $tag->save();

                        $value = $tag->id;
                    }
                    // dd($value);
                    PostTag::create([
                        "post_id" => $post->id,
                        "tag_id" => $value,
                    ]);
                };
            }

            // dd(456);
            $notification = array(
                'message'    => 'Post data has been Updated!',
                'alert-type' => 'success'
            );
        } catch (Exception $e) {
            DB::rollBack();
            $notification = array(
                'message'    => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification)->withInput();
        }
        DB::commit();
        return redirect()
            ->route('post.index')
            ->with($notification);
    }

    /**
     * Delete data.
     *
     * @param Post $Post
     * @return JsonResponse
     */
    public function destroy(Post $post): JsonResponse
    {
        Post::destroy($post->id);

        return response()->json(['success' => true, 'message' => 'Post Data has been DELETED !']);
    }
}
