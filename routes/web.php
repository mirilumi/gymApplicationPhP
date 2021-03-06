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
//    return view('auth.login');
    return view('auth.login');
});
Route::get('/paypalIndex', 'PaymentController@index')->name('payment1');
Route::get('/paypalIndex2', 'PaymentController@index2')->name('payment2');

// route for processing payment
Route::post('paypal', 'PaymentController@payWithpaypal')->name('pay');
Route::post('paySecond', 'PaymentController@paySecond')->name('paySecond');

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
    Route::get('user', 'UserController@index')->name('user.index');
    Route::post('user', 'UserController@store')->name('user.store');
    Route::get('user/addOrRemove/{userId}/programme/{programmeId}', 'UserController@addOrRemove')->name('user.programme.addOrRemove');
    Route::get('user/default/programme/{id}', 'UserController@adminPreview')->name('user.programme.default');
    Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');
    Route::get('user/delete/makeAdmin/{id}', 'UserController@makeAdmin')->name('user.makeAdmin');
    Route::get('user/delete/preview/{id}', 'UserController@preview')->name('user.preview');
    Route::get('user/programme/{id}', 'UserController@see')->name('user.programme');
    Route::get('user/resetPassword/{id}', 'UserController@resetPassword')->name('user.resetPassword');
    Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy');
    Route::put('user/{user}', 'UserController@update')->name('user.update');
    Route::get('user/{user}', 'UserController@show')->name('user.show');
    Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit');
//    Route::get('user/delete/programme/delete/{id}', 'DefaultProgramController@preview')->name('admin.default.program.delete');
    Route::resource('usersTable', 'UserTableController');
    Route::resource('usersTableDefault', 'UserTableControllerDefault');
    Route::post('blankPage/{blankPageId}/blankPageEdit/{defaultProgramId}', 'BlankPageControllerDefault@editBlankPage')->name('blankPageEdit');
    Route::post('blankPageStore/{blankPageId}', 'BlankPageControllerDefault@save')->name('blankPageStore');
    Route::post('thirdBoxDefault/{thirdBoxId}/thirdBoxDefaultEdit/{defaultProgramId}', 'ThirdBoxControllerDefault@editThirdBox')->name('thirdBoxDefaultEdit');
    Route::post('secondBoxDefault/{secondBoxId}/secondBoxDefaultEdit/{defaultProgramId}', 'SecondBoxControllerDefault@editsecondBox')->name('secondBoxDefaultEdit');
    Route::post('secondBoxDefaultStore/{defaultProgramId}', 'SecondBoxControllerDefault@save')->name('secondBoxDefault.save');
    Route::post('thirdBoxDefaultStore/{defaultProgramId}', 'ThirdBoxControllerDefault@save')->name('thirdBoxDefault.save');
    Route::post('userTableDefaultStore/{defaultProgramId}', 'UserTableControllerDefault@save')->name('userTableDefault.save');
    Route::get('secondBox', 'SecondBoxController@index')->name('secondBox.index');
    Route::post('secondBox', 'SecondBoxController@store')->name('secondBox.store');
    Route::get('secondBox/create', 'SecondBoxController@create')->name('secondBox.create');
    Route::put('secondBox/{secondBox}', 'SecondBoxController@update')->name('secondBox.update');
    Route::get('secondBox/{secondBox}/{pageId}', 'SecondBoxController@show')->name('secondBox.show');
    Route::delete('secondBox/{secondBox}', 'SecondBoxController@destroy')->name('secondBox.destroy');
    Route::get('secondBox/{secondBox}/edit', 'SecondBoxController@edit')->name('secondBox.edit');
    Route::get('secondBox', 'ThirdBoxController@index')->name('thirdBox.index');
    Route::post('thirdBox', 'ThirdBoxController@store')->name('thirdBox.store');
    Route::get('thirdBox/create', 'ThirdBoxController@create')->name('thirdBox.create');
    Route::put('thirdBox/{secondBox}', 'ThirdBoxController@update')->name('thirdBox.update');
    Route::get('thirdBox/{secondBox}/{pageId}', 'ThirdBoxController@show')->name('thirdBox.show');
    Route::delete('thirdBox/{secondBox}', 'ThirdBoxController@destroy')->name('thirdBox.destroy');
    Route::get('thirdBox/{secondBox}/edit', 'ThirdBoxController@edit')->name('thirdBox.edit');
    Route::resource('buyer', 'BuyerController');
    Route::resource('ads', 'ADSController');
    Route::post('ads/{id}', 'ADSController@save')->name('ads.save');
    Route::get('buyer/csv/download', 'BuyerController@csv')->name('csv');
    Route::resource('thirdBoxDefault', 'ThirdBoxControllerDefault');
    Route::resource('defaultProgramm', 'DefaultProgramController');
    Route::get('defaultProgram/see', 'DefaultProgramController@see')->name('defaultProgramm.see');
    Route::get('defaultProgram/replicate/{id}', 'DefaultProgramController@replicate')->name('defaultProgramm.replicate');
    Route::post('defaultProgram/add', 'DefaultProgramController@add')->name('defaultProgramm.add');
    Route::get('usersTable/delete/{id}/{pageId}',  'UserTableController@delete')->name('usersTable.delete');
    Route::get('usersTable/replicate/{id}/{page_nr}',  'UserTableController@replicate')->name('usersTable.replicate');
    Route::get('usersTable/userId/{userId}/replicate/{id}/{page_nr}',  'UserController@replicate')->name('usersTable.user.replicate');
    Route::post('thirdBox/{id}/thirdBoxEdit',  'ThirdBoxController@thirdBoxEdit')->name('thirdBoxEdit.edit');
    Route::get('user/preview/{id}/{page_nr}',  'UserController@preview')->name('user.preview');
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
Route::resource('chart',  'ChartController');
Route::get('chart/peso/{id}',  'ChartController@indexPeso')->name('chart.peso');
Route::get('chart/persi/{id}',  'ChartController@indexPersi')->name('chart.peso');
Route::get('chart/presi/{id}',  'ChartController@indexPresi')->name('chart.presi');

Route::get('chart/fianchi/{id}',  'ChartController@indexFianchi')->name('chart.peso');
Route::get('chart/girocoscia/{id}',  'ChartController@indexGirocoscia')->name('chart.peso');
Route::get('chart/girovita/{id}',  'ChartController@indexGirovita')->name('chart.presi');
Route::get('chart/cft/{id}',  'ChartController@indexCft')->name('chart.presi');
Route::resource('progress', 'ProgressController');
Route::get('edit/progress/{id}', 'ProgressController@editProgress')->name('edit.progress');
Route::get('changePassword',  'UserController@changePassowrdIndex')->name('changePasswordIndex');
Route::get('admin/user/{id}/{pageId}',  'UserController@show3')->name('show3');
Route::post('changePassword',  'UserController@changePassowrd')->name('changePassword');
Route::resource('email', 'EmailController');
Route::resource('profile', 'ProfileController');
Route::resource('peso', 'PesoController');
Route::resource('persi', 'ChilePersiController');
Route::resource('presi', 'ChilePresiController');
Route::resource('fianchi', 'FianchiController');
Route::resource('girocoscia', 'GirocosciaController');
Route::resource('girovita', 'GirovitaController');
Route::resource('cft', 'CirconferenzaToraciaController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('fitnessUser', 'FitnessUserController');
Route::get('user/pages/{page_nr}', 'FitnessUserController@userPages')->name('user.pages');
Route::get('/myQuestionnare','FitnessUserController@myQuestionare')->name('myQuestionare');
Route::get('user/default/programme/{id}',  'UserController@preview1')->name('user.programme.default');
Route::get('user/pdf/{page_nr}',  'FitnessUserController@pdfGenerate')->name('user.pdf.generate');

