<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" midleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('KhoaHoc', function () {
    return "Xin chao ban";
});

Route::get('KhoaHoc/Laravel', function () {
    echo "Khoa hoc - Laravel";
});

//truyền tham số

Route::get('HoTen/{ten}', function ($ten) {
    echo "Ten cua ban la:" . $ten;
});

/*
 * điều kiện Regular Expression
 * */

Route::get('Laravel/{ngay}', function ($ngay) {
    echo "Khoa pham :" . $ngay;
})->where(['ngay' => '[0-9]+']);

Route::get('Laravel/{kubo}', function ($kubo) {
    echo "Khoa pham :" . $kubo;
})->where(['kubo' => '[a-zA-Z]+']);

//Định danh

Route::get('Route1', ['as' => 'myRoute', function () {
    echo "Xin chao cac ban";
}]);
/*
 * GoiTen se goi len Route1
 * */
Route::get('GoiTen', function () {
    return redirect()->route('myRoute');
});

Route::get('Route2', function () {
    echo "Day la Route2";
})->name('MyRoute2');

Route::get('GoiTen', function () {
    return redirect()->route('MyRoute2');
});

/*
 * route Group
 * */

Route::group(['prefix' => 'MyGroup'], function () {
    Route::get('User1', function () {
        echo "User1";
    });
    Route::get('User2', function () {
        echo "User2";
    });
});

//Gọi Controller

Route::get('GoiController', 'MyController@XinChao');

Route::get('ThamSo/{ten}', 'MyController@KhoaHoc');


//URL

Route::get('MyRequest', 'MyController@GetURL');

//Gửi , nhận dữ liệu với request

Route::get('getForm', function () {
    return view('postForm');
});


/*
 * 'as'=>'postFile' : đặt tên là postFile
 * */

Route::post('postForm', [
    'as' => 'postForm',
    'uses' => 'MyController@postForm'
]);

//Route::post('postForm',['as'=>'postForm','uses'=>'MyController@postForm']);
//Route::post('postForm','MyController@postForm')->name('postForm');

/*
 * Cookie
 * */

Route::get('setCookie', 'MyController@setCookie');
Route::get('getCookie', 'MyController@getCookie');

/*
 * Upload file
 * */

Route::get('uploadFile', function () {
    return view('postFile');
});

//'as'=>'postFile' : đặt tên là postFile
Route::post('postFile', ['as' => 'postFile', 'uses' => 'MyController@postFile']);


/*
 * Json
 * */

Route::get('getJson','MyController@getJson');

/*
 * Views
 * */

Route::get('myView','MyController@myView');

//Có truyền tham số sang views
Route::get('Time/{t}','MyController@Time');

//Dùng chung dữ liệu trên views và route

View::share('KhoaHoc','Laravel');

/*
 * Blade template
 * */

Route::get('blade',function (){
   return view('pages.laravel');
});

//có truyền tham số sang view
Route::get('BladeTemplate/{str}','MyController@blade');

/*
 * Database
 * */

Route::get('database',function(){

//    //Tạo bảng loaisanpham
//   Schema::create('loaisanpham',function($table){
//       $table->increments('id');
//       $table->string('ten',200);
//   }) ;

    //Tạo bảng theloai
    Schema::create('theloai',function($table){
        $table->increments('id');
        $table->string('ten',200)->nullable();
        $table->string('nsx')->default('Nha san xuat');
    }) ;

   echo "Đẵ thực hiện lệnh tạo bảng";
});


Route::get('lienketbang',function(){
    //tạo bảng sanpham có liên kết khóa ngoài vs bảng loaisanpham
   Schema::create('sanpham',function($table){
       $table->increments('id');
       $table->string('ten');
       $table->float('gia');
       $table->integer('soluong')->default(0);
       $table->integer('id_loaisanpham')->unsigned();
       $table->foreign('id_loaisanpham')->references('id')->on('loaisanpham');

   }) ;

   echo "Đã tạo bảng sanpham";
});

//Sữa bảng

Route::get('suabang',function(){
   Schema::table('theloai',function($table){
      $table->dropColumncle('nsx');
   });
   echo "Đã xóa cột";
});

//Thêm bảng

Route::get('themcot',function (){
   Schema::table('theloai',function($table){
       $table->string('email');
   }) ;

   echo "Đã thêm cột";
});

//Đổi tên bảng

Route::get('doiten',function(){
    Schema::rename('theloai','nguoidung');

    echo " Đã đổi tên bảng";
});

//Xóa bảng

Route::get('xoabang',function(){
//    Schema::drop('nguoidung');
    Schema::dropifExists('nguoidung');

    echo "Xóa thành công !!";
});

//Tạo bảng

Route::get('taobang',function(){

    Schema::create('nguoidung',function($table){
        $table->increments('id');
        $table->string('ten',200)->nullable();
    }) ;

    echo "tạo bảng thành công !";
});

/*!
 * queryBuilder
 * */
//select * from users
Route::get('qb/get',function(){
    //get() : lấy tất cả dữ liệu trong bảng users
   $data = DB::table('users')->get();
   echo "<pre>";
   print_r($data);
   echo "</pre>";

});

//select * from users where id = 7;
Route::get('qb/where',function(){

    $data = DB::table('users')->where('id',7)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";

});

//select id,name,email . . .

Route::get('qb/select',function (){
    $data = DB::table('users')->select(['id','name','email'])->where('id',7)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
//raw : Sử dụng đổi tên cột
Route::get('qb/raw',function (){
    $data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id',7)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

//orderby
Route::get('qb/orderby',function (){
    $data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id','>','1')->orderBy('id','desc')->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});

//skip, take : tương đương LIMIT(skip,take)

Route::get('qb/limit',function (){
    $data = DB::table('users')->select(DB::raw('id,name as hoten,email'))->where('id','>','1')->orderBy('id','desc')->skip(1)->take(5)->get();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
//count()

Route::get('qb/count',function (){
    $soObject = DB::table('users')->count();
    echo "Số Object là :".$soObject;
});

//update

Route::get('qb/update',function(){
   DB::table('users')->where('id',7)->update(['name'=>'Tiến tiền tỷ','email'=>'tien.nguyentat.1@gmail.com']);
   echo "Đã update";
});

//Delete

Route::get('qb/delete',function (){
   DB::table('users')->where('id',9)->delete();
    echo "Đã xóa";
});

/*
 * model
 * */
Route::get('model/save',function (){
   $users = new \App\User();
   $users->name = "Mai";
   $users->email = "Mai@gamil.com";
   $users->password = "Mat khau";

   $users->save();

   echo "Đã thực hiện save";
});

//model kết hợp query

Route::get('model/query',function (){
    $user = \App\User::find(7);
    echo $user->name;
});

Route::get('model/sanpham/save',function(){
   $sanpham = new App\SanPham();
   $sanpham->ten = "Iphone 6";
   $sanpham->soluong = 100;
   $sanpham->save();

   echo "Đã thực hiện lệnh save()";
});

Route::get('model/sanpham/save/{ten}',function($ten){
    $sanpham = new App\SanPham();
    $sanpham->ten = $ten;
    $sanpham->soluong = 100;
    $sanpham->save();

    echo "Đã lưu". $ten;
});


Route::get('model/sanpham/all',function (){
   $sanpham = App\SanPham::all()->toJson();
   echo $sanpham;
});

//model kết hợp query Buider

Route::get('model/sanpham/ten',function(){
   $sanpham = \App\SanPham::where('ten','Laptop')->get();
//   echo $sanpham;
    echo $sanpham[0]['ten'];
});

//Xóa sản phẩm có id = 3 trong bảng sanpham

Route::get('model/sanpham/delete',function(){
    \App\SanPham::destroy(3);
    echo "Đã xóa";
});


/*
 * Liên kết bảng
 * */

Route::get('taocot',function (){
    Schema::table('sanpham',function($table){
       $table->integer('id_loaisanpham')->unsigned();
    });
});

Route::get('lienket',function(){
   $data = \App\SanPham::find(2)->loaisanpham->toArray();
   echo "<pre>";
   print_r($data);
   echo "</pre>";
});

Route::get('lienketloaisanpham',function(){
   $data = \App\LoaiSanPham::find(1)->sanpham->toArray();
   echo "<pre>";
   print_r($data);
   echo "</pre>";
});

/*
 * Middleware
 * */

Route::get('diem',function(){
    echo " Bạn đã đủ điểm";
})->middleware('MyMiddle')->name('diem');

Route::get('loi',function(){
    echo "Bạn chưa đủ điểm";
})->name('loi');

Route::get('nhapdiem',function (){
    return view('nhapdiem');
})->name('nhapdiem');


/*
 * Auth
 * */

Route::get('dangnhap',function (){
    return view('dangnhap');
});

//đặt tên là :login
Route::post('login','AuthController@login')->name('login');

Route::get('logout','AuthController@logout');

/*
 * session
 * */

Route::group(['middleware' => ['web']],function(){
    //
    Route::get('Session',function(){
        //Session::put : taọ session
       Session::put('KhoaHoc','Laravel');
       Session::put('LapTrinh','Web');
       echo "Đã tạo session thành công";
       echo "<br>";
        //Session::flash :session này chỉ tồn tại trong 1 route duy nhất
       Session::flash('mess','Hello');
//       //Session::flush() : xóa tất cả session
//       Session::flush();
        echo Session::get('mess');
       //Session::forget :Xóa 1 session
//       Session::forget('KhoaHoc');

//       echo Session::get('KhoaHoc');
        //Session::has : kiểm tra xem session có tồn tại hay không
//        if(Session::has('KhoaHoc'))
//            echo "Đã có Session Khoa Hoc";
//        else
//            echo "Session Khóa học không tồn tại";
    });

    Route::get('Session/flash',function (){
//       echo Session::get('mess');
        echo Session('mes');
    });
});

/*
 * Phân trang
 * */

Route::get('tin','TinController@index');

Route::get('tinhai','TinHaiController@index');

//
