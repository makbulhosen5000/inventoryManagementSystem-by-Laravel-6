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

use App\Http\Controllers\employeesController;

Route::get('/', function () {
   return redirect()->route('login');
});


Auth::routes();
//home route start from here.......................
Route::get('/home', 'HomeController@index')->name('home');

// employees Route Start from here................
Route::get('addEmployees','employeesController@addEmployees')->name('addEmployees');
Route::get('allEmployees','employeesController@allEmployees')->name('allEmployees');
Route::post('/insertEmployee','employeesController@insertEmployee');
Route::get('/viewEmployees/{id}','employeesController@viewEmployees');
Route::get('/deleteEmployees/{id}','employeesController@deleteEmployees');
Route::get('/editEmployees/{id}','employeesController@editEmployees');
Route::post('/updateEmployees/{id}','employeesController@updateEmployees');

//customers Route start from here..................
Route::get('addCustomers','customersController@addCustomers')->name('addCustomers');
Route::get('allCustomers','customersController@allCustomers')->name('allCustomers');
Route::post('/insertCustomers','customersController@insertCustomers');
Route::get('/viewCustomers/{id}','customersController@viewCustomers');
Route::get('/deleteCustomers/{id}','customersController@deleteCustomers');
Route::get('/editCustomers/{id}','customersController@editCustomers');
Route::post('/updateCustomers/{id}','customersController@updateCustomers');

//supplier Route start from here..................
Route::get('addSuppliers','suppliersController@addSuppliers')->name('addSuppliers');
Route::get('allSuppliers','suppliersController@allSuppliers')->name('allSuppliers');
Route::post('/insertSuppliers','suppliersController@insertSuppliers');
Route::get('/viewSuppliers/{id}','suppliersController@viewSuppliers');
Route::get('/deleteSuppliers/{id}','suppliersController@deleteSuppliers');
Route::get('/editSuppliers/{id}','suppliersController@editSuppliers');
Route::post('/updateSuppliers/{id}','suppliersController@updateSuppliers');

//Salary Route start from here..................
Route::get('add_advanced_Salaries','salariesController@add_advanced_Salaries')->name('add_advanced_Salaries');
Route::get('all_advanced_Salaries','salariesController@all_advanced_Salaries')->name('all_advanced_Salaries');
Route::post('/insert_advanced_Salaries','salariesController@insert_advanced_Salaries');
Route::get('pay_salary','salariesController@pay_salary')->name('pay_salary');

//category route start from here................
Route::get('addCategory','categoriesController@addCategory')->name('addCategory');
Route::get('allCategory','categoriesController@allCategory')->name('allCategory');
Route::post('insertCategory','categoriesController@insertCategory');
Route::get('/deleteCategory/{id}','categoriesController@deleteCategory');
Route::get('/editCategory/{id}','categoriesController@editCategory');
Route::post('/updateCategory/{id}','categoriesController@updateCategory');

//products route start from here................
Route::get('addProducts','productsController@addProducts')->name('addProducts');
Route::get('allProducts','productsController@allProducts')->name('allProducts');
Route::post('insertProducts','productsController@insertProducts');
Route::get('/deleteProducts/{id}','productsController@deleteProducts');
Route::get('/editProducts/{id}','productsController@editProducts');
Route::post('/updateProducts/{id}','productsController@updateProducts');
Route::get('/viewProducts/{id}','productsController@viewProducts');

//products import and export route start from here.................
Route::get('importProducts','productsController@importProducts')->name('importProducts');
Route::get('export','productsController@export')->name('export');
Route::post('import','productsController@import')->name('import');

//expense route start from here.................
Route::get('addExpense','expensesController@addExpense')->name('addExpense');
Route::get('todayExpense','expensesController@todayExpense')->name('todayExpense');
Route::post('insertExpense','expensesController@insertExpense');
Route::get('/editTodayExpense/{id}','expensesController@editTodayExpense');
Route::post('updateTodayExpense/{id}','expensesController@updateTodayExpense');
Route::get('monthlyExpense','expensesController@monthlyExpense')->name('monthlyExpense');
Route::get('yearlyExpense','expensesController@yearlyExpense')->name('yearlyExpense');
//monthly expense more route start from here
Route::get('januaryExpense','expensesController@januaryExpense')->name('januaryExpense');
Route::get('februaryExpense','expensesController@februaryExpense')->name('februaryExpense');
Route::get('marchExpense','expensesController@marchExpense')->name('marchExpense');
Route::get('aprilExpense','expensesController@aprilExpense')->name('aprilExpense');
Route::get('mayExpense','expensesController@mayExpense')->name('mayExpense');
Route::get('juneExpense','expensesController@juneExpense')->name('juneExpense');
Route::get('julyExpense','expensesController@julyExpense')->name('julyExpense');
Route::get('augustExpense','expensesController@augustExpense')->name('augustExpense');
Route::get('septemberExpense','expensesController@septemberExpense')->name('septemberExpense');
Route::get('octoberExpense','expensesController@octoberExpense')->name('octoberExpense');
Route::get('novemberExpense','expensesController@novemberExpense')->name('novemberExpense');
Route::get('decemberExpense','expensesController@decemberExpense')->name('decemberExpense');

//take attendance route start from here....................
Route::get('takeAttendance','attendanceController@takeAttendance')->name('takeAttendance');
Route::get('allAttendance','attendanceController@allAttendance')->name('allAttendance');
Route::post('/insertAttendance','attendanceController@insertAttendance');
Route::get('/editAttendance/{edit_date}','attendanceController@editAttendance');
Route::post('/updateAttendance','attendanceController@updateAttendance');
Route::get('/viewAttendance/{edit_date}', 'attendanceController@viewAttendance');
Route::get('/deleteAttendance/{edit_date}', 'attendanceController@deleteAttendance');

//setting route start from here....................
Route::get('settings','settingController@settings')->name('settings');
Route::post('updateWebsite/{id}','settingController@updateWebsite');

//POS route start from here.........................
Route::get('pos','posController@pos')->name('pos');
Route::get('pendingOrders','posController@pendingOrders')->name('pendingOrders');
Route::get('viewOrdersStatus/{id}','posController@viewOrdersStatus');
Route::get('posDone/{id}','posController@posDone');
Route::get('successOrders','posController@successOrders');


//Card route and controller start from here.....................
Route::post('addCard','cardController@addCard')->name('addCard');
Route::post('updateCart/{rowId}','cardController@updateCart');
Route::get('cartRemove/{rowId}','cardController@cartRemove');
Route::post('/CartInvoice','cardController@CartInvoice');
Route::post('/finalInvoice','cardController@finalInvoice');



