<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can any all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['middleware' => ['auth.pulsar','permission.pulsar','locale.pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/hotels/relationships/{lang}/{offset?}',                             ['as'=>'HotelsRelationship',                    'uses'=>'Syscover\Hotels\Controllers\Relationships@index',                      'resource' => 'hotels-relationship',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/hotels/relationships/json/data/{lang}',                             ['as'=>'jsonDataHotelsRelationship',            'uses'=>'Syscover\Hotels\Controllers\Relationships@jsonData',                   'resource' => 'hotels-relationship',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/hotels/relationships/create/{lang}/{offset}/{id?}',                 ['as'=>'createHotelsRelationship',              'uses'=>'Syscover\Hotels\Controllers\Relationships@createRecord',               'resource' => 'hotels-relationship',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/hotels/relationships/store/{lang}/{offset}/{id?}',                 ['as'=>'storeHotelsRelationship',               'uses'=>'Syscover\Hotels\Controllers\Relationships@storeRecord',                'resource' => 'hotels-relationship',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/hotels/relationships/{id}/edit/{lang}/{offset}',                    ['as'=>'editHotelsRelationship',                'uses'=>'Syscover\Hotels\Controllers\Relationships@editRecord',                 'resource' => 'hotels-relationship',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/hotels/relationships/update/{lang}/{id}/{offset}',                  ['as'=>'updateHotelsRelationship',              'uses'=>'Syscover\Hotels\Controllers\Relationships@updateRecord',               'resource' => 'hotels-relationship',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/hotels/relationships/delete/{lang}/{id}/{offset}',                  ['as'=>'deleteHotelsRelationship',              'uses'=>'Syscover\Hotels\Controllers\Relationships@deleteRecord',               'resource' => 'hotels-relationship',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/hotels/relationships/delete/translation/{lang}/{id}/{offset}',      ['as'=>'deleteTranslationHotelsRelationship',   'uses'=>'Syscover\Hotels\Controllers\Relationships@deleteTranslationRecord',    'resource' => 'hotels-relationship',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/hotels/relationships/delete/select/records/{lang}',              ['as'=>'deleteSelectHotelsRelationship',        'uses'=>'Syscover\Hotels\Controllers\Relationships@deleteRecordsSelect',        'resource' => 'hotels-relationship',        'action' => 'delete']);


    /*
    |--------------------------------------------------------------------------
    | ENVIROMENTS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/hotels/environments/{lang}/{offset?}',                              ['as'=>'HotelsEnvironment',                     'uses'=>'Syscover\Hotels\Controllers\Environments@index',                      'resource' => 'hotels-environment',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/hotels/environments/json/data/{lang}',                              ['as'=>'jsonDataHotelsEnvironment',             'uses'=>'Syscover\Hotels\Controllers\Environments@jsonData',                   'resource' => 'hotels-environment',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/hotels/environments/create/{lang}/{offset}/{id?}',                  ['as'=>'createHotelsEnvironment',               'uses'=>'Syscover\Hotels\Controllers\Environments@createRecord',               'resource' => 'hotels-environment',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/hotels/environments/store/{lang}/{offset}/{id?}',                  ['as'=>'storeHotelsEnvironment',                'uses'=>'Syscover\Hotels\Controllers\Environments@storeRecord',                'resource' => 'hotels-environment',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/hotels/environments/{id}/edit/{lang}/{offset}',                     ['as'=>'editHotelsEnvironment',                 'uses'=>'Syscover\Hotels\Controllers\Environments@editRecord',                 'resource' => 'hotels-environment',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/hotels/environments/update/{lang}/{id}/{offset}',                   ['as'=>'updateHotelsEnvironment',               'uses'=>'Syscover\Hotels\Controllers\Environments@updateRecord',               'resource' => 'hotels-environment',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/hotels/environments/delete/{lang}/{id}/{offset}',                   ['as'=>'deleteHotelsEnvironment',               'uses'=>'Syscover\Hotels\Controllers\Environments@deleteRecord',               'resource' => 'hotels-environment',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/hotels/environments/delete/translation/{lang}/{id}/{offset}',       ['as'=>'deleteTranslationHotelsEnvironment',    'uses'=>'Syscover\Hotels\Controllers\Environments@deleteTranslationRecord',    'resource' => 'hotels-environment',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/hotels/environments/delete/select/records/{lang}',               ['as'=>'deleteSelectHotelsEnvironment',         'uses'=>'Syscover\Hotels\Controllers\Environments@deleteRecordsSelect',        'resource' => 'hotels-environment',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | DECORATIONS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/hotels/decorations/{lang}/{offset?}',                               ['as'=>'HotelsDecoration',                      'uses'=>'Syscover\Hotels\Controllers\Decorations@index',                        'resource' => 'hotels-decoration',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/hotels/decorations/json/data/{lang}',                               ['as'=>'jsonDataHotelsDecoration',              'uses'=>'Syscover\Hotels\Controllers\Decorations@jsonData',                     'resource' => 'hotels-decoration',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/hotels/decorations/create/{lang}/{offset}/{id?}',                   ['as'=>'createHotelsDecoration',                'uses'=>'Syscover\Hotels\Controllers\Decorations@createRecord',                 'resource' => 'hotels-decoration',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/hotels/decorations/store/{lang}/{offset}/{id?}',                   ['as'=>'storeHotelsDecoration',                 'uses'=>'Syscover\Hotels\Controllers\Decorations@storeRecord',                  'resource' => 'hotels-decoration',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/hotels/decorations/{id}/edit/{lang}/{offset}',                      ['as'=>'editHotelsDecoration',                  'uses'=>'Syscover\Hotels\Controllers\Decorations@editRecord',                   'resource' => 'hotels-decoration',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/hotels/decorations/update/{lang}/{id}/{offset}',                    ['as'=>'updateHotelsDecoration',                'uses'=>'Syscover\Hotels\Controllers\Decorations@updateRecord',                 'resource' => 'hotels-decoration',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/hotels/decorations/delete/{lang}/{id}/{offset}',                    ['as'=>'deleteHotelsDecoration',                'uses'=>'Syscover\Hotels\Controllers\Decorations@deleteRecord',                 'resource' => 'hotels-decoration',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/hotels/decorations/delete/translation/{lang}/{id}/{offset}',        ['as'=>'deleteTranslationHotelsDecoration',     'uses'=>'Syscover\Hotels\Controllers\Decorations@deleteTranslationRecord',      'resource' => 'hotels-decoration',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/hotels/decorations/delete/select/records/{lang}',                ['as'=>'deleteSelectHotelsDecoration',          'uses'=>'Syscover\Hotels\Controllers\Decorations@deleteRecordsSelect',          'resource' => 'hotels-decoration',        'action' => 'delete']);

    
});