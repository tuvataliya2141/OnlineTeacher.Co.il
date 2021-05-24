<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/mail1', function () {
//     return view('mail1');
// });
// Route::get('/mail2', function () {
//     return view('mail2');
// });

Auth::routes();
Route::get('/', 'UserController@loginForm')->name('login');
// Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/logout', 'HomeController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', 'UserController@profile');
    Route::post('update_profile', 'UserController@update_profile');
    // Route::get('update_admin_profile', 'UserController@edit_admin_profile');

    // Route::get('slider', 'UserController@edit_admin_profile');

    Route::post('update_password', 'UserController@update_password');

    Route::post('/users/edit/{id}', 'UserController@updateUser');
    Route::get('change_password', 'UserController@edit_password');
    Route::post('update_password1', 'UserController@update_password1');
    Route::get('profile_setting', 'UserController@profile_setting')->name('profile_setting');
    Route::get('/dashboard', 'UserController@profile_setting')->name('dashboard');

    Route::get('footer_setting', 'UserController@footer_edit');
    Route::post('footer_update', 'UserController@footer_update');


  

    //users listing
    Route::get('users', 'UserController@show_users');
    Route::get('/users/add', 'UserController@addUser')->name('users.add');
    Route::post('/users/add', 'UserController@saveUser');
    Route::get('/users/edit/{id}', 'UserController@editUser')->name('users.edit');
    // Route::post('/users/edit/{id}', 'UserController@updateUser');
    Route::post('/user_status', 'UserController@user_stauts');
    Route::post('/delete-User', 'UserController@user_delete');



        //work listing
        Route::get('work', 'WorkController@show');
        Route::get('work/add', 'WorkController@addwork');

        Route::post('/saveWork', 'WorkController@saveWork');
        Route::get('work/edit/{id}', 'WorkController@editwork');
        // Route::post('work/edit/{id}', 'WorkController@updatework');
        Route::post('updateWork', 'WorkController@updatework');
        Route::post('/work_status', 'WorkController@work_status');
        Route::post('/delete-Work', 'WorkController@work_delete'); 


//subject listing
Route::get('subject', 'SubjectController@show');
Route::get('subject/add', 'SubjectController@addsubject');

Route::post('/saveSubject', 'SubjectController@saveSubject');
Route::get('subject/edit/{id}', 'SubjectController@editsubject');
// Route::post('subject/edit/{id}', 'SubjectController@updateSubject');
Route::post('updateSubject', 'SubjectController@updateSubject');
Route::post('/subject_status', 'SubjectController@subject_status');
Route::post('/delete-subject', 'SubjectController@subject_delete'); 









        

//service listing
Route::get('service', 'ServiceController@show');
Route::get('service/add', 'ServiceController@addservice');

Route::post('/saveService', 'ServiceController@Saveservice');
Route::get('service/edit/{id}', 'ServiceController@editservice');
// Route::post('service/edit/{id}', 'ServiceController@updateservice');
Route::post('updateService', 'ServiceController@updateService');
Route::post('/service_status', 'ServiceController@service_status');
Route::post('/delete-service', 'ServiceController@service_delete'); 


Route::get('plan', 'PlanController@show');
Route::get('plan/add', 'PlanController@addplan');
Route::post('savePlan', 'PlanController@savePlan');



    // Contact Us 
    Route::get('contact-us', 'ContactUsController@show');
    Route::get('/contact-us/view/{id}', 'ContactUsController@viewContact');
    Route::post('/ContactReplyMail', 'ContactUsController@sendmail');   
    Route::post('/delete-contactus', 'ContactUsController@contact_delete');
  

    // Subscriber
    Route::get('subscribers', 'SubscriberController@show');
    // Route::post('sendnewsletter','MailController@send_email');
    Route::post('/saveMail', 'SubscriberController@savemail');
 
    Route::post('/delete-subscribers', 'SubscriberController@subscriber_delete');
    // Route::get('/orders/edit/{id}', 'OrderController@fetchOrder');
     // Route::get('/orders/view/{id}', 'OrderController@viewOrder');


 





    //slider listing
    // Route::get('slider', 'SliderController@show');
    Route::get('slider/add', 'SliderController@addslider');
    Route::post('/saveSlider', 'SliderController@saveSlider');
    Route::get('slider/edit/{id}', 'SliderController@editSlider');
    // Route::post('slider/edit/{id}', 'SliderController@updateSlider');
    Route::post('updateSlider', 'SliderController@updateSlider');
    Route::post('/slider_status', 'SliderController@slider_status');
    Route::post('/delete-Slider', 'SliderController@slider_delete');



    //product listing
    Route::get('product', 'ProductController@show');
    Route::get('product/add', 'ProductController@addproduct');

    Route::post('/related_product', 'ProductController@get_Relatedproducts');
    Route::post('get_subcategories', 'CategoryController@get_SubCategory');
    Route::post('saveProduct', 'ProductController@saveProduct');
    Route::get('product/edit/{id}', 'ProductController@editProduct');
    // Route::post('product/edit/{id}', 'ProductController@updateProduct');
    Route::get('/product-image/delete/{id}', 'ProductController@deleteProduct_Image')->name('product_image.delete');
    Route::post('update-product', 'ProductController@updateproduct');
    Route::post('/product_status', 'ProductController@product_status');
    Route::post('/delete-Product', 'ProductController@product_delete');




    //CMS Page 
    Route::get('/cmspage', 'CMSpageController@show')->name('cmspage');
    Route::post('/cmspage/about', 'CMSpageController@updateAbout')->name('cmspage.updateAbout');
    Route::post('/cmspage/help', 'CMSpageController@updateHelp')->name('cmspage.updateHelp');
    Route::post('/cmspage/privacy_policies', 'CMSpageController@updatePrivacyPolicies')->name('cmspage.updatePrivacyPolicies');
});
