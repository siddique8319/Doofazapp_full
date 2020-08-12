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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', 'HomeController@index');
Route::resource('/designation', 'DesignationController');
Route::resource('/member', 'MemberController');
Route::resource('/incentive', 'IncentiveController');
Route::resource('/salary', 'FixedSalaryController');
Route::resource('/salaryComponent', 'SalaryComponentController');
Route::resource('/salaryComponentInformation', 'SalaryComponentInformationController');
Route::resource('/incomeType', 'IncomeTypeController');
Route::resource('/memberType', 'MemberTypeController');
Route::resource('/designationCondition', 'DesignationConditionController');
Route::resource('/generation', 'GenerationController');
Route::resource('/menu', 'MenuController');
Route::resource('/permissionMenu', 'PermissionMenuController');
Route::resource('/subMenu', 'SubMenuController');
Route::resource('/permissionSubMenu', 'PermissionSubMenuController');
Route::resource('/income', 'IncomeController');
Route::resource('/newMemberEntry', 'NewMemberEntryController');
Route::resource('/offer', 'OfferController');
Route::resource('/software', 'SoftwareEntryController');
Route::resource('/shopTypeCondition', 'ShopConditionController');
Route::resource('/newShopEntry', 'NewShopEntryController');
Route::resource('/message', 'MessageController');
Route::resource('/projectType', 'ProjectTypeController');
Route::resource('/project', 'ProjectController');
Route::resource('/logo', 'LogoController');
Route::resource('/loginImage', 'LoginImageController');
Route::resource('/bannerImage', 'BannerImageController');
Route::post('/teamMessage', 'MessageController@teamMessage');
Route::get('/shopList', 'NewShopEntryController@shopList');
Route::get('/monthlyShop/{id}', 'NewShopEntryController@monthlyShopApprove');
Route::get('/division', 'NewShopEntryController@division');
Route::get('/allDistrict', 'NewShopEntryController@allDistrict');
Route::get('/allThana', 'NewShopEntryController@allThana');
Route::get('/district/{id}', 'NewShopEntryController@district');
Route::get('/thana/{id}', 'NewShopEntryController@thana');
Route::get('/union/{id}', 'NewShopEntryController@union');
Route::get('/search', 'MemberController@search');
Route::get('/searchRefferal', 'MemberController@searchRefferal');
Route::get('/menuShow/{id}', 'PermissionMenuController@menuShow');
Route::get('/userShow', 'PermissionMenuController@userShow');
Route::get('/sponsor', 'NewMemberEntryController@sponsor');
Route::get('/level2', 'NewMemberEntryController@level2');
Route::get('/myGeneration', 'NewMemberEntryController@myGeneration');
Route::get('/myGenerationCount', 'NewMemberEntryController@myGenerationCount');
Route::get('/myGenerationTree', 'NewMemberEntryController@myGenerationTree');
Route::get('/myGenerationMemberCount', 'NewMemberEntryController@myGenerationMemberCount');
Route::get('/generationTree/{id}', 'NewMemberEntryController@generationTree');
Route::get('/backToTop/{id}', 'NewMemberEntryController@backToTop');
Route::get('/treeBackToTop/{id}', 'NewMemberEntryController@treeBackToTop');
Route::get('/searchMember', 'NewMemberEntryController@searchMember');
Route::get('/searchMemberTree', 'NewMemberEntryController@searchMemberTree');
Route::get('/more&{incomeType}&{salesType}', 'HomeController@viewHistory');
Route::get('/{any}', 'HomeController@index')->where('any', '.*');
