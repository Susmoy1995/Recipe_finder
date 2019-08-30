<?php

// use Illuminate\Support\Facades\Input;
// use App\User;
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

// Route::get('/', function () {
//     return view('welcome');
// });

/// front page controller
Route::get('/',"loginController@index")->name('front');
///post message to admin
Route::post('/',"messageController@insertMessage");

///getting all posts
Route::get('/',"loginController@getAllPost");



///front page to login page link
Route::get('/login',"loginController@login")->name('loginview');




///login controller post
Route::post('/dashboard',"userdashboardController@loginPosted")->name('dashboard');
///dashbaord
Route::get('/dashboard',"userdashboardController@loadUserPost")->name('userdashboard');



/// front page to sign in page link
Route::get('/sign in',"registrationController@registration")->name('signinview');
///insert blogger to blog site
Route::post('/sign in',"registrationController@bloggerInsert");
///log out from dashboard
Route::get('/logout',"logoutController@loggingout");



///controller for comments 
Route::get('/comments/{post_id}',"commentsControllers@comments")->name('comments');

Route::post('/comments/{post_id}',"commentsControllers@postComments");
//Route::post('/comments/{post_id}',"commentsControllers@postReply");
//Route::post('/reply',"replyController@reply");

///controller for improved ans
Route::get('/improve answer',"improvedAnsControllers@improveAns")->name('impv');
///link to post and also learnmore


Route::get('/post/{id}',"postController@singlePost")->name('title');
Route::post('/userdashboard',"uploadPostController@postInsert");
Route::get('/userdashboard',"userdashboardController@loadUserPost")->name('post.list');





//Route::get('/dashboard/{id}',"userdashboardController@loadUserPost")->name('userdashboard');
///user profile 
Route::get('/profile/{id}',"userprofileController@userprofile")->name('userprofile');
///admin dashboard 
//Route::get('/admin',"adminController@admin")->name('admin');

Route::get('/admin/statistics',"adminController@statistics")->name('stat');

Route::get('/admin/blogger information',"adminController@bloggerInfo")->name('blog_info');
Route::get('/admin/message',"adminController@message")->name('user.message');


Route::get('/user post/{id}','adminController@showPostAdmin')->name('admin.post');
//Route::post('/user post/{id}','adminController@update');

Route::get('/block post/{id}','adminController@gotopost')->name('block.post');
Route::post('/block post/{id}','adminController@block_post');

Route::get('/delete post/{id}','adminController@gotoDeletePost')->name('delete.post');
Route::post('/delete post/{id}','adminController@delete');

Route::get('/approve post/{id}','adminController@gotoApprovePost')->name('approve.post');
Route::post('/approve post/{id}','adminController@update');

Route::get('/delete comments/{id}','adminController@gotoDeleteComments')->name('delete.comments');
Route::post('/delete comments/{id}','adminController@deleting_comments');




Route::get('/block blogger/{id}','adminController@gotoBlockBlogger')->name('block.blogger');
Route::post('/block blogger/{id}','adminController@block_blogger');

Route::get('/unblock blogger/{id}','adminController@gotoUnBlockBlogger')->name('unblock.blogger');
Route::post('/unblock blogger/{id}','adminController@unblock_blogger');

Route::get('/delete blogger/{id}','adminController@gotoDeleteBlogger')->name('delete.blogger');
Route::post('/delete blogger/{id}','adminController@delete_blogger');

Route::get('/edit comments/{id}','adminController@showComments')->name('admin.comments');


Route::get('/edit post/{id}','userdashboardController@gotToEditPost')->name('edit.post');
Route::post('/edit post/{id}','userdashboardController@editing_post');

Route::get('/delete blogger post/{id}','userdashboardController@gotToDeletePost')->name('delete.blogger.post');
Route::post('/delete blogger post/{id}','userdashboardController@deleting_post');

Route::get('/edit profile/{id}','userdashboardController@gotoEditProfile')->name('edit.profile');
Route::post('/edit profile/{id}','userdashboardController@edit_profile');

//Route::get('/like/{id}','likeController@like')->name('like');



// Route::post('/search',function(){
// 	$q=Input::get('search');
// 	if($q !=' '){
//         $user = posts::where('post_title','LIKE','%'.$q.'%')->get();

//         if(count($user)>0){
//         	return view('search.searchview')->with('result',$user);
//         }
// 	}

// 	return 'no data found';
// });


///creating post as registered blogger








