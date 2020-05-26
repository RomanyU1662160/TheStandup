<?php

Route::get('lang/{locale}', 'LocalizationController@setLocale')->name('locale');

Route::get('/', function () {

    return view('landing');
});

Route::get('/login/{provider}', "SocialController@redirectToProvider")->name('register.socialite');
Route::get('login/{provider}/callback', "SocialController@handleProviderCallback");

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'Auth\AuthController@getRegister')->name('register');
Route::post('/register/socialite', 'SocialController@completeRegister')->name('socialite.completeRegister');

/*Admin Routes Group
Authorization using the laravel auth middleware and  admin middleware
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin'], function () {
    Route::get('/dashboard', "AdminController@index")->name('.dashboard');
    Route::get('/newProject', "AdminController@createProject")->name('.newProject');
    Route::post('/newProject', "ProjectController@store");
    Route::get('/newTeam', "AdminController@createTeam")->name('.newTeam');
    Route::post('/newTeam', "TeamController@store");
    Route::get('/allprojects', "AdminController@getAllProjects")->name('.allProjects');
    Route::get('/allteams', "AdminController@getAllTeams")->name('.allTeams');
    Route::post('/update/{project}', "ProjectController@update")->name('.updateProject');
    Route::get('/dissociate/{team}', "ProjectController@dissociateTeam")->name('.dissociateTeam');
    Route::get('/allmembers', "AdminController@getAllMembers")->name('.allMembers');
    Route::post('/roles/{user}', "AdminController@updateRoles")->name('.updateRoles');
    Route::get('/{user}/delete', "AdminController@removeUser")->name('.delete.user');
    Route::post('/{user}/assignToTeam', "AdminController@AssignMemeberToTeam")->name('.user.assignToTeam');
});

//Projects Routes Group
Route::group(['prefix' => 'project', 'middleware' => 'auth', 'as' => 'project'], function () {
    Route::get('/all', 'ProjectController@index')->name('.all');
    Route::get('/search', 'ProjectController@search')->name('.search');
});

//Teams Routes Group
Route::group(['prefix' => 'team', 'middleware' => 'auth', 'as' => 'team'], function () {
    Route::get('/all', 'TeamController@index')->name('.all');
    Route::get('/{team}/{user}', 'TeamController@removeMember')->name('.removeMember');
    Route::post('/update/{team}', "TeamController@update")->name('.updateTeam');
    Route::post('/update/members/{team}', "TeamController@associateMember")->name('.associateMember');
    Route::get('/search', 'TeamController@search')->name('.search');
    Route::get('/page/details/{id}', 'TeamController@show')->name('.page');
});

//Members Routes Group
Route::group(['prefix' => 'member', 'middleware' => 'auth', 'as' => 'member'], function () {
    Route::get('/all', 'UserController@index')->name('.all');
    Route::get('/search', 'UserController@search')->name('.search');
    Route::post('/days/{user}', "UserController@updateWorkingDays")->name('.updateWorkingDays');
    Route::get('/page/{id}', 'UserController@show')->name('.page');
});

//Stand up Routes Group
Route::group(['prefix' => 'standup', 'middleware' => 'auth', 'as' => 'standup'], function () {
    Route::get('/addNew', 'StandupController@create')->name('.addNew');
    Route::post('/addNew', 'StandupController@store');
});

//Members Routes Group
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth', 'as' => 'dashboard'], function () {
    Route::get('moral/{user}', 'DashboardController@getDashboard')->name('.moral.index');
    Route::get('{user}/data', 'DashboardController@getUserData')->name('.user.data');
    Route::get('{user}/issues', 'DashboardController@getReportedIssues')->name('.user.issues');
    Route::get('standup/addNew', 'DashboardController@getnewStandupForm')->name('.user.newStandup');
    Route::get('/updatePassword/{user}', 'DashboardController@editPassword')->name('.user.updatePassword');
    Route::post('/updatePassword/{user}', 'DashboardController@updatePassword')->name('.user.updatePassword');
});

//Days Routes
Route::get('/days', 'DayController@index');
Route::get('/day/{user}', 'UserController@getWorkingDays');

//Issue
Route::get('issues/toggle/{issue}', 'IssueController@toggleStatus')->name('issue.toggle');
Route::get('issues/delete/{issue}', 'IssueController@destroy')->name('issue.delete');
