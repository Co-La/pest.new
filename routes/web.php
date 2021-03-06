<?php



Route::resource('/', 'Site\IndexController', ['names' => ['index' => 'home']]);
Route::resource('/articles', 'Site\ArticleController', ['names' => ['index' => 'articles', 'show' => 'article']]);
Route::get('/filter/{id}', 'Site\AjaxController@filter')->name('filter');
Route::resource('/companies', 'Site\CompanieController', ['names' => ['index' => 'companies', 'show' => 'company']]);
Route::get('/search', 'Site\SearchController@index')->name('search');
Route::get('/ajax/{id?}', 'Site\AjaxController@ajaxIndex')->name('ajax');
Route::group(['prefix' => 'bag'], function() {
    
    Route::get('/', 'Site\BagController@index')->name('bag');
    Route::get('/adress', 'Site\BagController@add_adress')->name('adressP');
    Route::get('/del/{id}', 'Site\BagController@del_item')->name('del');
    Route::post('/plus', 'Site\BagController@plusItem')->name('plus');
    Route::post('/minus', 'Site\BagController@minusItem')->name('minus');
    Route::post('/customer', 'Site\BagController@bagAdd')->name('customer');
    Route::get('/delivery', 'Site\BagController@delivery')->name('deliv');
    Route::post('/confirm', 'Site\BagController@confirm')->name('confirm');
    Route::post('/payed', 'Site\BagController@payed')->name('payed');
    Route::get('/test', 'Site\BagController@test')->name('test');
    Route::get('/errors', 'Site\BagController@errors')->name('errors');
    Route::get('/success', 'Site\BagController@success')->name('success');
    
});

Route::resource('/blogs', 'Site\BlogController', ['names' => ['index' => 'blogs', 'show' => 'article']]);
Route::post('/addcomment', 'Site\CommentsController@addcomment')->name('addcom');
Route::get('/comments', 'Site\CommentsController@index')->name('comment');


Route::get('/schems', 'Site\SchemesController@index')->name('schems');
Route::get('/contacts', 'Site\ContactsController@index')->name('contacts');
Route::post('/contacts', 'Site\ContactsController@message')->name('message');
Route::get('getproduct', 'GetProductsController@index')->name('getproduct');
Route::get('/ajaxpr', 'GetAjaxProduct@index')->name('ajaxpr');
Route::get('/cache', function() {

    //return DB::table('articles')->select('*')->get();
   Cache::put('articles', DB::table('articles')->select('*')->get(), 20);
    return (Cache::get('articles'));
});


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::get('/', 'Admin\IndexController@index')->name('home');  
    Route::resource('/categories', 'Admin\CategoryController', ['names' => ['index' => 'categories']]);
    Route::resource('/companies', 'Admin\CompaniesController', ['names' => ['index'     =>  'companies',
                                                                            'destroy'   =>  'delComp' ,
                                                                            'create'    =>  'newComp',  
                                                                            'store'     =>  'storeComp',
                                                                            'edit'      =>  'editComp',
                                                                            'update'    =>  'updateComp'    
                                                                            ]]);
    Route::resource('products', 'Admin\ProductsController', ['names' =>     [ 'show'     =>  'products',
                                                                                'create'    =>  'newProd',
                                                                                'store'     =>  'storeProd',
                                                                                'edit'      =>  'editProd',
                                                                                'update'    =>  'updateProd',
                                                                                'destroy' => 'delProd']]);

    Route::resource('/permissions', 'Admin\PermissionsController', ['names' => ['index' => 'permissions', 'store' => 'save']]);

    Route::resource('/cultures', 'Admin\CulturesController', ['names' => ['index'       => 'cultures',
                                                                                                            'create'        => 'newCult',
                                                                                                            'store'         => 'storeCult',
                                                                                                            'update'      =>    'updateCult',
                                                                                                            'edit'          =>  'editCult',
                                                                                                            'destroy'    =>  'delCult'
                                                                                                            ]]);

    Route::resource('/parazites', 'Admin\ParazitesController', ['names' => ['index'   => 'parazites',
                                                                                                            'create'        => 'newParaz',
                                                                                                            'store'         => 'storeParaz',
                                                                                                            'update'      =>    'updateParaz',
                                                                                                            'edit'          =>  'editParaz',
                                                                                                            'destroy'    =>  'delParaz'
                                                                                                            ]]);
    Route::resource('/methods', 'Admin\MethodsController', ['names' => ['index'   => 'methods',
                                                                            'create'  => 'newMeth',
                                                                            'store'   => 'storeMeth',
                                                                            'update'  =>  'updateMeth',
                                                                            'edit'    =>  'editMeth',
                                                                            'destroy' =>  'delMeth'
                                                                        ]]);

    Route::resource('/registers', 'Admin\RegistersController', ['names' => ['index'   => 'registers',
                                                                        'create'  => 'newReg',
                                                                        'store'   => 'storeReg',
                                                                        'update'  =>  'updateReg',
                                                                        'edit'    =>  'editReg',
                                                                        'destroy' =>  'delReg'
                                                                    ]]);

    Route::resource('/articles', 'Admin\ArticlesController', ['names' => ['index'   => 'articles',
                                                                'create'  => 'newArt',
                                                                'store'   => 'storeArt',
                                                                'update'  =>  'updateArt',
                                                                'edit'    =>  'editArt',
                                                                'destroy' =>  'delArt'
                                                                ]]);
});
