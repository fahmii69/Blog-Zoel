<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{

    public function index()
    {
        $category_widget = Category::all();
        $posts = Post::latest()->take(8)->get();
        $allPosts = Post::all();
        $tag = Tags::all();

        return view('front.dashboard', compact('posts', 'category_widget', 'allPosts', 'tag'));
    }

    public function list_blog()
    {
        $category_widget = Category::all();
        $posts = Post::latest()->paginate(5);
        $tag = Tags::all();

        return view('front.article', compact('posts', 'category_widget', 'tag'));
    }

    public function list_category(Category $category)
    {
        // dd($category->category_name);
        $title = $category->category_name;
        $category_widget = Category::all();
        $tag = Tags::all();

        $posts = Post::latest()->whereCategoryId($category->id)->paginate(5);
        // dd($posts);
        return view('front.article', compact('posts', 'category_widget', 'tag', 'title'));
    }

    public function list_tag(Tags $tags)
    {
        // dd($tags->id);
        $title = $tags->tag_name;
        $category_widget = Category::all();
        $tag = Tags::all();

        $posts = Post::latest()->whereTagId($tags->id)->paginate(5);
        // dd($posts);
        return view('front.article', compact('posts', 'category_widget', 'tag', 'title'));
    }

    public function list_user(User $user)
    {
        // dd($tags->id);
        $title = $user->name;
        $category_widget = Category::all();
        $tag = Tags::all();

        $posts = Post::latest()->whereTagId($user->id)->paginate(5);
        // dd($posts);
        return view('front.article', compact('posts', 'category_widget', 'tag', 'title'));
    }

    public function post_detail(Post $post)
    {
        // dd($post->tags->tag_name);
        // dd($tags->id);
        // $title = $post->post_title;
        $category_widget = Category::all();
        $tag = Tags::all();

        // $posts = Post::latest()->whereTagId($user->id)->paginate(5);
        // dd($posts);
        return view('front.detail', compact('post', 'category_widget', 'tag'));
    }
}
