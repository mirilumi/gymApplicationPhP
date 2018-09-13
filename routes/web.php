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
    return view('auth.login');
});
Route::get('/paypalIndex', 'PaymentController@index');

// route for processing payment
Route::post('paypal', 'PaymentController@payWithpaypal')->name('pay');

// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');
Route::get('addmoney/stripe', array('as' => 'addmoney.paywithstripe','uses' => 'AddMoneyController@payWithStripe'));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'AddMoneyController@postPaymentWithStripe'));
//Route::get('/questionnare ', function () {
//    return view('questionnare.questionnare');
//});
Route::post('/createQuestionare','QuestionnareController@createQuestionare')->name('createQuestionare');
Route::resource('questionnare', 'QuestionnareController');
Auth::routes();

Route::group(['middleware' => 'admin','prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('secondBox', 'SecondBoxController');
    Route::resource('secondBoxDefault', 'SecondBoxControllerDefault');
    Route::resource('user', 'UserController');
    Route::resource('usersTable', 'UserTableController');
    Route::resource('usersTableDefault', 'UserTableControllerDefault');
    Route::post('thirdBoxDefault/{thirdBoxId}/thirdBoxDefaultEdit/{defaultProgramId}', 'ThirdBoxControllerDefault@editThirdBox')->name('thirdBoxDefaultEdit');
    Route::post('secondBoxDefault/{secondBoxId}/secondBoxDefaultEdit/{defaultProgramId}', 'SecondBoxControllerDefault@editsecondBox')->name('secondBoxDefaultEdit');
    Route::post('secondBoxDefaultStore/{defaultProgramId}', 'SecondBoxControllerDefault@save')->name('secondBoxDefault.save');
    Route::post('thirdBoxDefaultStore/{defaultProgramId}', 'ThirdBoxControllerDefault@save')->name('thirdBoxDefault.save');
    Route::post('userTableDefaultStore/{defaultProgramId}', 'UserTableControllerDefault@save')->name('userTableDefault.save');
    Route::resource('secondBox', 'SecondBoxController');
    Route::resource('thirdBox', 'ThirdBoxController');
    Route::resource('buyer', 'BuyerController');
    Route::resource('thirdBoxDefault', 'ThirdBoxControllerDefault');
    Route::resource('defaultProgramm', 'DefaultProgramController');
    Route::get('defaultProgram/see', 'DefaultProgramController@see')->name('defaultProgramm.see');
    Route::get('defaultProgram/replicate/{id}', 'DefaultProgramController@replicate')->name('defaultProgramm.replicate');
    Route::post('defaultProgram/add', 'DefaultProgramController@add')->name('defaultProgramm.add');
    Route::get('usersTable/delete/{id}',  'UserTableController@delete')->name('usersTable.delete');
    Route::get('usersTable/replicate/{id}',  'UserTableController@replicate')->name('usersTable.replicate');
    Route::get('usersTable/userId/{userId}/replicate/{id}',  'UserController@replicate')->name('usersTable.user.replicate');
    Route::post('thirdBox/{id}/thirdBoxEdit',  'ThirdBoxController@thirdBoxEdit')->name('thirdBoxEdit.edit');
    Route::get('user/preview/{id}',  'UserController@preview')->name('user.preview');
    Route::get('user/makeAdmin/{id}',  'UserController@makeAdmin')->name('user.makeAdmin');
    Route::get('user/resetPassword/{id}',  'UserController@resetPassword')->name('user.resetPassword');
    Route::get('user/programme/{id}',  'UserController@see')->name('user.programme');
    Route::get('user/addOrRemove/{userId}/programme/{programmeId}',  'UserController@addOrRemove')->name('user.programme.addOrRemove');
    Route::get('userQuestionare/{id}',  'UserController@userQuestionare')->name('userQuestionare');
    Route::post('editQuestionare/{id}',  'UserController@editQuestionare')->name('editQuestionare');
    Route::get('user/default/programme/{id}',  'UserController@adminPreview')->name('user.programme.admin.default');
    Route::get('user/programme/delete/{id}',  'DefaultProgramController@delete')->name('default.program.delete');
    Route::get('user/delete/{id}',  'UserController@delete')->name('user.delete');
});
Route::resource('progress', 'ProgressController');
Route::get('edit/progress/{id}', 'ProgressController@editProgress')->name('edit.progress');
Route::get('changePassword',  'UserController@changePassowrdIndex')->name('changePasswordIndex');
Route::post('changePassword',  'UserController@changePassowrd')->name('changePassword');
Route::resource('email', 'EmailController');
Route::resource('profile', 'ProfileController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('fitnessUser', 'FitnessUserController');
Route::get('/myQuestionnare','FitnessUserController@myQuestionare')->name('myQuestionare');
Route::get('user/default/programme/{id}',  'UserController@preview')->name('user.programme.default');
Route::get('user/pdf',  'FitnessUserController@pdfGenerate')->name('user.pdf.generate');

