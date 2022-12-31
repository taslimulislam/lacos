<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Cms\Entities\Post;
use App\Http\Controllers\Controller;
use Modules\Cms\Entities\PostCategory;

class Blogs extends Controller
{
    public function index(Request $request){
        // return Post::with('user','category')->paginate(12);
        return view('frontend.pages.blogs.blog',[
            'post' => $this->posts($request)
        ]);
    }


    public function posts($request)
    {

        if($request->keyword!=''){
            $keyword = $request->keyword;
            $posts = Post::when($keyword, function ($q) use ($keyword) {
                return $q->where('title', 'LIKE', '%' . $keyword . '%');;
            })
            ->with('user','category')->latest()->paginate(12)->appends('keyword', $keyword);
        }else{
            $posts  = Post::with('user','category')->latest()->paginate(12);
        }

        

        $PN = array();
        $i = 1;
        foreach ($posts as $key => $item) {

            @$PN['category_' . $i]    = $item->category->category_name;
            @$PN['title_' . $i]    = $item->title;
            @$PN['content_' . $i]  = $item->content;
            @$PN['link_' . $i]     = url('post-detail',$item->uuid);
            @$PN['image_' . $i]    = getImage($item->post_image);
            @$PN['post_date_'.$i]   = Carbon::parse($item->created_at)->diffForhumans();

            @$PN['author_name_'.$i] = @$item->user->user_name;
            @$PN['author_image_'.$i] = getImage($item->post_image);
            @$PN['author_about_'.$i] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries';

            $i++;

        }
        return $PN;
    }



    public function pagePost($page)
    {

        $posts  = Post::with('user','category')->where('post_category_id',$page)->latest()->paginate(12);
        $PN = array();
        $i = 1;
        foreach ($posts as $key => $item) {

            @$PN['category_' . $i]    = $item->category->category_name;
            @$PN['title_' . $i]    = $item->title;
            @$PN['content_' . $i]  = $item->content;
            @$PN['link_' . $i]     = url('post-detail',$item->uuid);
            @$PN['image_' . $i]    = getImage($item->post_image);
            @$PN['post_date_'.$i]   = Carbon::parse($item->created_at)->diffForhumans();

            @$PN['author_name_'.$i] = @$item->user->user_name;
            @$PN['author_image_'.$i] = getImage($item->post_image);
            @$PN['author_about_'.$i] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries';


            $i++;

        }
        return $PN;
    }


    public function recentPost()
    {

        $posts  = Post::with('user','category')->latest('created_at')->limit(5)->get();
        $PN = array();
        $i = 1;
        foreach ($posts as $key => $item) {

            @$PN['category_' . $i]      = $item->category->category_name;
            @$PN['title_' . $i]         = $item->title;
            @$PN['content_' . $i]       = $item->content;
            @$PN['link_' . $i]          = url('post-detail',$item->uuid);
            @$PN['image_' . $i]         = getImage($item->post_image);
            @$PN['post_date_'.$i]       = Carbon::parse($item->created_at)->diffForhumans();

            $PN['author_name_'.$i]      = @$item->user->user_name;
            $PN['author_image_'.$i]     = getImage($item->post_image);
            $PN['author_about_'.$i]     = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries';

            $i++;
        }
        return $PN;
    }


    public function postDetails($id)
    {

        
        $PN = [];
        if($post = Post::with('user','category')->firstWhere('uuid',$id)){

            $PN['category']    = $post->category->category_name;
            $PN['title']    = $post->title;
            $PN['content']  = $post->content;
            $PN['link']     = url('post-detail',$post->uuid);
            $PN['image']    = getImage($post->post_image);
            $PN['post_date']   = Carbon::parse($post->created_at)->diffForhumans();

            $PN['meta_title'] = @$post->user->meta_title;
            $PN['meta_description'] = $post->meta_description;

            $PN['author_name'] = @$post->user->user_name;
            $PN['author_image'] = getImage($post->post_image);
            $PN['author_about'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries';

        }

        return view('frontend.pages.blogs.blog_detail',[
            'post'          => (object)$PN,
            'rpost'         => $this->pagePost($post->post_category_id),
            'categories'    => PostCategory::withCount('posts')->get(),
            'recentpost'    => $this->recentPost()
        ]);

    }



    public function categoryWisePost($slug)
    {

        $category = PostCategory::where('category_slug',$slug)->first();
        // return $this->pagePost($category->id);
        return view('frontend.pages.blogs.category_post',[
            'post'          => $this->pagePost($category->id)
        ]);

    }


        
    public function postSearch(Request $request)
    {


        return view('frontend.pages.blogs.search_post',[
            'post' => $this->posts($request),
            'keyword'   => $request->keyword?$request->keyword:''
        ]);
    }




}
