<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 *  	目录名称一律小写    控制器双驼峰命名法(加 s )    模型名称首字母大写(加 s ) 
 *		函数与方法名大括号一律换行 (推荐使用 Tab 键补全)	名称使用单驼峰命名法
 *		for foreach 大括号不换行  (推荐使用 Tab 键补全)
 *		每段较大的程序体,上下之间加一个空行
 *		类名由多个单词组成的,首字母大写,中间加 _ ;例( User_info )
 *		注释规范( 方法体上方多行注释	方法体内单行注释	 路由必须添加注释		在每个文件首部增加注释说明)
 */



 





















/*------------------------------------------------------------  zhuangyuanhui 52 ----------------------------------------------*/
Route::get('home/users/sign','home\UsersController@sign');      //用户签到
Route::get('admin/husers/message/{id}','admin\HUsersController@message');     	//后台给前台发送私信
Route::get('admin/husers/messageall','admin\HUsersController@messageall');			//后台管理群发私信页面
Route::post('admin/husers/sendall','admin\HUsersController@sendall');			//执行后台管理群发私信
Route::post('admin/husers/store','admin\HUsersController@store');     	//执行发送私信
Route::resource('admin/comment','admin\CommentsController');	//评论后台管理
Route::resource('admin/news','admin\NewsController');		//后台新闻管理
Route::resource('admin/girls','admin\GirlsController');		//后台车模管理
Route::resource('admin/label','admin\LabelController');		//后台云标签管理
Route::resource('admin/husers','admin\HUsersController');     	//前台用户后台管理
Route::resource('admin/reports','admin\ReportsController');		//用户举报后台管理


Route::get('home/users/send/{tel}','home\UsersController@sendTelCode');     //发送手机号验证码
Route::get('home/users/checkname/{name}','home\UsersController@checkname');     //注册页面ajax检测用户是否存在
Route::get('home/users/checktel/{tel}','home\UsersController@checktel');     //注册页面ajax检测手机号是否已注册
Route::resource('home/users','home\UsersController');		//前台用户页面

Route::get('home/login/login','home\LoginController@login');	//前台用户登录
Route::get('home/login/checkphone/{phone}','home\LoginController@checkphone');	//登陆检测用户是否存在
Route::post('home/login/dologin','home\LoginController@dologin');		//前台用户提交登陆

Route::get('home/login/forget','home\LoginController@forget');		//用户忘记密码修改页面
Route::get('home/login/checkname/{name}','home\LoginController@checkname');	//前台用户忘记密码检测用户是否存在
Route::get('home/login/checktel/{tel}','home\LoginController@checktel');	//前台用户忘记密码检测手机号是否正确
Route::get('home/login/send/{tel}','home\LoginController@sendTelCode');     //发送手机号验证码
Route::post('home/login/alert','home\LoginController@alert');		//修改用户密码

Route::get('home/news/index/{id}','home\NewsController@index');        //前台页面新闻列表

Route::get('home/rank/index/{type}','home\RankController@index');			//前台用户排行页面
Route::get('home/rank/news/{type}','home\RankController@news');			//前台新闻排行页面
Route::get('home/rank/articles/{type}','home\RankController@articles');			//前台文章排行页面
Route::get('home/rank/girls/{type}','home\RankController@girls');			//前台车模排行页面
Route::get('home/personal/index/{id}','home\PersonalController@index');			//前台个人首页
Route::post('home/personal/image','home\PersonalController@image');			//前台个人资料修改头像
Route::post('home/personal/store/{id}','home\PersonalController@store');			//前台个人资料提交修改
Route::get('home/personal/edit/{id}','home\PersonalController@edit');		//前台个人首页
Route::get('home/personal/articles/{id}','home\PersonalController@articles');	//前台个人文章
Route::get('home/personal/users_articles/{id}','home\PersonalController@users_articles');	//前台个人文章收藏
Route::get('home/personal/users_news/{id}','home\PersonalController@users_news');	//前台个人新闻收藏
Route::get('home/personal/users_girls/{id}','home\PersonalController@users_girls');	//前台个人车模收藏
Route::get('home/personal/report/{id}','home\PersonalController@report');	//前台用户举报页面
Route::post('home/personal/report_store','home\PersonalController@report_store'); //执行举报写入数据库
Route::get('home/users/concern/{id}','home\UsersController@concern');     //前台用户关注l
Route::get('home/layout/personal/{id}','home\LayoutControlle@index');		//前台个人空间公共页面
Route::post('home/news/news_comment','home\NewsController@news_comment');      //前台新闻评论
Route::post('home/news/news_reply','home\NewsController@news_reply');      //前台新闻回复
Route::get('home/news/deletecomment/{id}','home\NewsController@deletecomment');  //前台新闻评论回复ajax删除
Route::get('home/news/collect/{id}','home\NewsController@collect');			//前台新闻收藏功能ajax

/*------------------------------------------------------------  zhangjianjun 104 ----------------------------------------------*/
Route::resource('admin/cates','admin\CatesController');   //后台类别管理
Route::resource('admin/links','admin\LinksController');   //友情链接管理
Route::resource('admin/basics','admin\BasicsController');   //网站基本配置管理
Route::resource('admin/areports','admin\AreportsController');   //文章举报管理
// 未完成页面  缺少用户  无法点赞
Route::get('home/girls/zan/{id}','home\GirlsController@zan');   //前台车模点赞  
Route::resource('home/girls','home\GirlsController');   //前台车模列表
Route::get('home/girls/collect/{id}','home\GirlsController@collect');   //前台车模收藏


Route::get('home/index','home\IndexController@index');   //前台首页
Route::get('/home/index/{id}','home\IndexController@index');   //前台首页
Route::get('home/personal/concern/{id}','home\PersonalController@concern');	//前台个人关注
Route::get('home/personal/care/{id}','home\PersonalController@care');	//取消关注 ajax


Route::get('home/personal/pass/{id}','home\PersonalController@pass');		//前台个人密码修改
Route::get('home/personal/hold/{pass}','home\PersonalController@hold');		//验证原密码
Route::post('home/personal/save/{id}','home\PersonalController@save');		//前台个人密码修改确认































/*------------------------------------------------------------  shaomingshuo 155 ----------------------------------------------*/
Route::get('admin/users/sendemail/{email}','admin\UsersController@sendEmailCode');     //发送邮箱验证码
Route::get('admin/loginout','admin\LoginController@loginout');                         //退出登录
Route::get('admin/login/forget','admin\LoginController@forget');                       //忘记密码                 
Route::get('admin/login/sendemail/{email}','admin\LoginController@sendEmailCode');     //发送邮箱验证码
Route::get('admin/login/reset','admin\LoginController@reset');                         //跳转修改密码
Route::get('admin/layout','admin\LayoutController@index');                             //后台主页面
Route::get('home/articles/click','home\ArtRankController@click');                      //根据点击量进行排行
Route::get('home/articles/time','home\ArtRankController@time');                        //根据时间进行排行
Route::get('home/articles/praise','home\ArtRankController@praise');                    //根据点赞进行排行
Route::get('home/articles/create','home\ArticlesControlle@create');                    //前台文章发表
Route::put('home/drafts/save/{id}','home\DraftsController@save');                      //前台文章发表
Route::get('home/articles/{id}','home\ArticlesControlle@index');                       //前台文章分类排行
Route::get('home/news/{id}/details','home\NewsController@details');                    //前台新闻详情
Route::get('home/drafts/{id}/index','home\DraftsController@index');                    //草稿箱主页
Route::get('home/articles/collect/{id}','home\ArticlesControlle@collect');             //文章收藏
Route::get('home/message/system','home\MessageController@system');                     //系统消息
Route::get('home/message/send','home\MessageController@send');                         //发件消息
Route::get('home/message/send_system','home\MessageController@send_system');           //发件消息
Route::get('home/message/sdelete/{id}','home\MessageController@sdelete');              //删除收件消息
Route::get('home/message/fdelete/{id}','home\MessageController@fdelete');              //删除发件消息
Route::get('home/message/look/{id}','home\MessageController@look');              //删除发件消息


Route::post('admin/login/check','admin\LoginController@check');                        //检查登录
Route::post('admin/login/checkemail','admin\LoginController@checkemail');              //审查邮箱                 
Route::post('admin/login/changepwd','admin\LoginController@changepwd');                //修改密码
Route::post('home/message/store_system','home\MessageController@store_system');        //发件消息






Route::resource('admin/users','admin\UsersController');                                //后台用户路由
Route::resource('admin/adverts','admin\AdvertsController');                            //广告位路由
Route::resource('admin/slides','admin\SlidesController');                              //轮播图路由  
Route::resource('admin/articles','admin\HArticlesController')->middleware('login');    //后台文章管理
Route::resource('admin/login','admin\LoginController');                                //后台登录管理
Route::resource('home/layout','home\LayoutControlle');                                 //Layout图路由 
Route::resource('home/drafts','home\DraftsController');                                //草稿箱路由
Route::resource('home/message','home\MessageController');                              //用户私信




//home
Route::resource('home/articles','home\ArticlesControlle');                            //前台文章路由












































