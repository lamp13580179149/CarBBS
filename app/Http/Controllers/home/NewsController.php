<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\home\News;
use App\Http\Controllers\home\CatesController;
use App\models\home\Cates;

class NewsController extends Controller
{	
	/**
	 * 
	 */
    public function index(Request $request,$id = 0)
    {	
    	//获取四个最新分类
    	$cates_four = CatesController::getCatesFour();

    	if($id == 0){
    		//获取所有文章,时间排序
    		$news = News::orderBy('ctime','desc')->paginate(5);
    		$cate = '新闻';
    	}else{
    		$news = News::where('cates_id','=',$id)->orderBy('ctime','desc')->paginate(5);
    		//获取相关分类信息
    		$cate = Cates::find($id);
    	}
    	
    	//获取推荐位
    	$news_top = NewsController::getNewsTop();
    	//获取九个热度最高的,轮播图
    	$news_nine = NewsController::getNewsNine();
    	return view('home.news.index',[
    									'title'=>'新闻列表',
    									'news'=>$news,
    									'news_top'=>$news_top,
    									'news_nine'=>$news_nine,
    									'cates_four'=>$cates_four,
    									'cate' => $cate
    								]);
    }

    /**
     * 根据点击量排序,拿十条数据用于推荐位
     */
    static public function getNewsTop()
    {
    	$news_top = News::orderBy('clicks','desc')->limit(10)->get();

    	return $news_top;
    }

    /**
     * 根据点击量排序,拿九条数据用于轮播图
     */
    static public function getNewsNine()
    {
    	$news_nine = News::orderBy('clicks','desc')->limit(9)->get();

    	return $news_nine;
    }
}