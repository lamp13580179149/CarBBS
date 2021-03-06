<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\Comment;
use App\models\admin\Reply;
use App\models\home\News_Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $params = $request->all();
        //搜索分页功能
        $search_count = $request->input('search_count',5);
        $search_name = $request->input('search_name','');
        $search_type = $request->input('search_type',0);

        if($search_type == 1){
            //获取文章评论数据
            $comment = Comment::where('content','like','%'.$search_name.'%')->paginate($search_count);
             $new_comment = News_Comment::where('content','like','%#$%###@$@$')->paginate($search_count);
        }else if($search_type == 2){
             //获取新闻评论数据
            $new_comment = News_Comment::where('content','like','%'.$search_name.'%')->paginate($search_count);
            $comment = Comment::where('content','like','%#$%###@$@$')->paginate($search_count);
        }else{
            //获取文章评论数据
            $comment = Comment::where('content','like','%'.$search_name.'%')->paginate($search_count);
            //获取新闻评论数据
            $new_comment = News_Comment::where('content','like','%'.$search_name.'%')->paginate($search_count);
        }

       
       
        return view('admin.comment.index',['title'=>'后台评论管理','comment'=>$comment,'new_comment'=>$new_comment,'params'=>$params]);
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
        $comment = Comment::find($id);
        $res = $comment->delete();
        if($res){
            return redirect('/admin/comment')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }
}
