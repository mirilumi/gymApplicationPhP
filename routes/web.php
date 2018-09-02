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
    Route::resource('thirdBoxDefault', 'ThirdBoxControllerDefault');
    Route::resource('defaultProgramm', 'DefaultProgramController');
    Route::get('defaultProgram/see', 'DefaultProgramController@see')->name('defaultProgramm.see');
    Route::get('usersTable/delete/{id}',  'UserTableController@delete')->name('usersTable.delete');
    Route::post('thirdBox/{id}/thirdBoxEdit',  'ThirdBoxController@thirdBoxEdit')->name('thirdBoxEdit.edit');
    Route::get('user/preview/{id}',  'UserController@preview')->name('user.preview');
    Route::get('user/programme/{id}',  'UserController@see')->name('user.programme');
    Route::get('user/addOrRemove/{userId}/programme/{programmeId}',  'UserController@addOrRemove')->name('user.programme.addOrRemove');
    Route::get('userQuestionare/{id}',  'UserController@userQuestionare')->name('userQuestionare');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('fitnessUser', 'FitnessUserController');
Route::get('/myQuestionnare','FitnessUserController@myQuestionare')->name('myQuestionare');
Route::get('user/default/programme/{id}',  'UserController@preview')->name('user.programme.default');

