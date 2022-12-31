<?php

namespace Modules\Cms\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\Cms\Entities\Post;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Cms\Entities\PostCategory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function index()
    {
        return view('cms::posts.__posts',[
            'categories' => PostCategory::get()
        ]);
    }

   
    public function create()
    {
        return view('cms::posts.__create',[
            'categories' => PostCategory::get()
        ]);
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'title'         => 'required',
                'category_id'   => 'required',
                'content'       => 'required',
                'post_image'    => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);




        $postdata = array(
            'title'             => $request->title,
            'post_category_id'  => $request->category_id,
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,

        );

       
        if ($request->file('post_image')) {
            
            $request_file = $request->file('post_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('post_image', $filename, 'public');
            $postdata['post_image']    = $path;

        }else{
            $postdata['post_image']    = '';
        }

        if(Post::create($postdata)){
            $this->sitemapXml();
            Toastr::success('Added successfully', 'Success');
            return redirect()->route('posts.index');
        }else{
            Toastr::error('Oops! Something went wrong, Please try again', 'Failed');
            return redirect()->route('posts.index');
        }

    }

  
    public function show($id)
    {
        return view('cms::show');
    }

  
    public function edit($id)
    {

        return view('cms::posts.__edit',[
            'categories' => PostCategory::get(),
            'post' => Post::firstWhere('id',$id)
        ]);


    }


    public function update(Request $request, $id)
    {

        
        $request->validate(
        [
            'title' => 'required|string|between:2,100',
            'category_id' => 'required',
            'content' => 'required',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);


        

        $postdata = array(
            'title'             => $request->title,
            'post_category_id'  => $request->category_id,
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,

        );

       
        if ($request->file('post_image')) {
            $request_file = $request->file('post_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('post_image', $filename, 'public');
            $postdata['post_image']    = $path;
        }


        if(Post::where('id',$id)->update($postdata)){

            $this->sitemapXml();

            Toastr::success('Update successfully', 'Success');
            return redirect()->route('posts.index');

        }else{
            Toastr::error('Oops! Something went wrong, Please try again', 'Failed');
            return redirect()->route('posts.index');
        }


    }

  
    public function destroy($id)
    {

        try {
            Post::where('id',$id)->delete();
            $response = array(
                'success'   => true,
                'title'     => 'Post',
                'message'   => 'Delete Successfully'
            );
        
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Post',
                'message'   => $e->getMessage()
            );
            return json_encode($response);
        }
       
    }
    

    public function getPost(Request $request)
    {

        
        if ($request->ajax()) {

            $data = Post::where('status',1)->latest()->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('post_image', function ($data) {
                    return '<img src="'.getImage($data->post_image).'" width="50">';
                })
                
                ->addColumn('title', function ($data) {
                    return $data->title;
                })

                ->addColumn('meta_title', function ($data) {
                    return $data->meta_title;
                })

                ->addColumn('meta_description', function ($data) {
                    return $data->meta_description;
                })

                ->addColumn('content', function ($data) {
                    return Str::limit($data->content,80);
                })

                ->addColumn('action', function($data){
                    $actionBtn = '<a href="'.route('posts.edit',$data->id).'"  data-update-route="'.route('posts.update',$data->id).'" data-edit-route="'.route('posts.edit',$data->id).'" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a> '; 
                    $actionBtn .= '<a href="javascript:void(0)" id="deleteAction" data-delete-route="'.route('delete-post',$data->id).'" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>';
                    return $actionBtn;
                })

            ->rawColumns(['post_image', 'title','meta_title','meta_description','content','action'])
            ->make(true);
        }

    }



    public function sitemapXml(){

        @$info =  PostCategory::withCount('posts')->get();

        $posts  = Post::with('user','category')->latest('created_at')->limit(20)->get();



        $xml ="<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml.="<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
        
        foreach ($info as $key => $cat) {
            
            if($cat->posts_count>0){
            $xml.="
                <url>
                    <loc>" .url('category-post').'/'.$cat->category_slug. "</loc>
                    <lastmod> always </lastmod>
                    <priority>1.0</priority>    
                </url>\n";
            }   
        }

        foreach ($posts as $key => $value) {
            if($value->title!=''){
            $xml.="
                <url>
                    
                    <loc>" . url('post-detail',$value->uuid) . "</loc>
                    <lastmod> ".date('d M Y',strtotime($value->post_date))." </lastmod>
                    <priority>1.0</priority>    
                </url>\n";
            } 
        }

        $xml.="</urlset>\n";
        $file = fopen("sitemap.xml","w");
        fwrite($file,$xml);
        fclose($file);
    }  
 

}
