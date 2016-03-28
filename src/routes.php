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

Route::group(['middleware' => ['web', 'pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | HOTELS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/hotels/hotels/{lang}/{offset?}',                                    ['as'=>'hotel',                    'uses'=>'Syscover\Hotels\Controllers\HotelController@index',                      'resource' => 'hotels-hotel',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/hotels/hotels/json/data/{lang}',                                    ['as'=>'jsonDataHotel',            'uses'=>'Syscover\Hotels\Controllers\HotelController@jsonData',                   'resource' => 'hotels-hotel',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/hotels/hotels/create/{lang}/{offset}/{tab}/{id?}',                  ['as'=>'createHotel',              'uses'=>'Syscover\Hotels\Controllers\HotelController@createRecord',               'resource' => 'hotels-hotel',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/hotels/hotels/store/{lang}/{offset}/{tab}/{id?}',                  ['as'=>'storeHotel',               'uses'=>'Syscover\Hotels\Controllers\HotelController@storeRecord',                'resource' => 'hotels-hotel',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/hotels/hotels/{id}/edit/{lang}/{offset}/{tab}',                     ['as'=>'editHotel',                'uses'=>'Syscover\Hotels\Controllers\HotelController@editRecord',                 'resource' => 'hotels-hotel',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/hotels/hotels/update/{lang}/{id}/{offset}/{tab}',                   ['as'=>'updateHotel',              'uses'=>'Syscover\Hotels\Controllers\HotelController@updateRecord',               'resource' => 'hotels-hotel',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/hotels/hotels/delete/{lang}/{id}/{offset}',                         ['as'=>'deleteHotel',              'uses'=>'Syscover\Hotels\Controllers\HotelController@deleteRecord',               'resource' => 'hotels-hotel',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/hotels/hotels/delete/translation/{lang}/{id}/{offset}',             ['as'=>'deleteTranslationHotel',   'uses'=>'Syscover\Hotels\Controllers\HotelController@deleteTranslationRecord',    'resource' => 'hotels-hotel',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/hotels/hotels/delete/select/records/{lang}',                     ['as'=>'deleteSelectHotel',        'uses'=>'Syscover\Hotels\Controllers\HotelController@deleteRecordsSelect',        'resource' => 'hotels-hotel',        'action' => 'delete']);
    Route::post(config('pulsar.appName') . '/hotels/hotels/check/hotel/slug',                                   ['as'=>'apiCheckSlugHotel',        'uses'=>'Syscover\Hotels\Controllers\HotelController@apiCheckSlug',               'resource' => 'hotels-hotel',        'action' => 'access']);

    /*
    |--------------------------------------------------------------------------
    | PUBLICATIONS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/hotels/publications/{offset?}',                                     ['as'=>'hotelsPublication',                 'uses'=>'Syscover\Hotels\Controllers\PublicationController@index',                  'resource' => 'hotels-publication',         'action' => 'access']);
    Route::any(config('pulsar.appName') . '/hotels/publications/json/data',                                     ['as'=>'jsonDataHotelsPublication',         'uses'=>'Syscover\Hotels\Controllers\PublicationController@jsonData',               'resource' => 'hotels-publication',         'action' => 'access']);
    Route::get(config('pulsar.appName') . '/hotels/publications/create/{offset}',                               ['as'=>'createHotelsPublication',           'uses'=>'Syscover\Hotels\Controllers\PublicationController@createRecord',           'resource' => 'hotels-publication',         'action' => 'create']);
    Route::post(config('pulsar.appName') . '/hotels/publications/store/{offset}',                               ['as'=>'storeHotelsPublication',            'uses'=>'Syscover\Hotels\Controllers\PublicationController@storeRecord',            'resource' => 'hotels-publication',         'action' => 'create']);
    Route::get(config('pulsar.appName') . '/hotels/publications/{id}/edit/{offset}',                            ['as'=>'editHotelsPublication',             'uses'=>'Syscover\Hotels\Controllers\PublicationController@editRecord',             'resource' => 'hotels-publication',         'action' => 'access']);
    Route::put(config('pulsar.appName') . '/hotels/publications/update/{id}/{offset}',                          ['as'=>'updateHotelsPublication',           'uses'=>'Syscover\Hotels\Controllers\PublicationController@updateRecord',           'resource' => 'hotels-publication',         'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/hotels/publications/delete/{id}/{offset}',                          ['as'=>'deleteHotelsPublication',           'uses'=>'Syscover\Hotels\Controllers\PublicationController@deleteRecord',           'resource' => 'hotels-publication',         'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/hotels/publications/delete/select/records',                      ['as'=>'deleteSelectHotelsPublication',     'uses'=>'Syscover\Hotels\Controllers\PublicationController@deleteRecordsSelect',    'resource' => 'hotels-publication',         'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | SERVICES
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/hotels/services/{lang}/{offset?}',                                  ['as'=>'hotelsService',                    'uses'=>'Syscover\Hotels\Controllers\ServiceController@index',                      'resource' => 'hotels-service',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/hotels/services/json/data/{lang}',                                  ['as'=>'jsonDataHotelsService',            'uses'=>'Syscover\Hotels\Controllers\ServiceController@jsonData',                   'resource' => 'hotels-service',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/hotels/services/create/{lang}/{offset}/{id?}',                      ['as'=>'createHotelsService',              'uses'=>'Syscover\Hotels\Controllers\ServiceController@createRecord',               'resource' => 'hotels-service',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/hotels/services/store/{lang}/{offset}/{id?}',                      ['as'=>'storeHotelsService',               'uses'=>'Syscover\Hotels\Controllers\ServiceController@storeRecord',                'resource' => 'hotels-service',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/hotels/services/{id}/edit/{lang}/{offset}',                         ['as'=>'editHotelsService',                'uses'=>'Syscover\Hotels\Controllers\ServiceController@editRecord',                 'resource' => 'hotels-service',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/hotels/services/update/{lang}/{id}/{offset}',                       ['as'=>'updateHotelsService',              'uses'=>'Syscover\Hotels\Controllers\ServiceController@updateRecord',               'resource' => 'hotels-service',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/hotels/services/delete/{lang}/{id}/{offset}',                       ['as'=>'deleteHotelsService',              'uses'=>'Syscover\Hotels\Controllers\ServiceController@deleteRecord',               'resource' => 'hotels-service',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/hotels/services/delete/translation/{lang}/{id}/{offset}',           ['as'=>'deleteTranslationHotelsService',   'uses'=>'Syscover\Hotels\Controllers\ServiceController@deleteTranslationRecord',    'resource' => 'hotels-service',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/hotels/services/delete/select/records/{lang}',                   ['as'=>'deleteSelectHotelsService',        'uses'=>'Syscover\Hotels\Controllers\ServiceController@deleteRecordsSelect',        'resource' => 'hotels-service',        'action' => 'delete']);
    Route::post(config('pulsar.appName') . '/hotels/services/check/service/slug',                               ['as'=>'apiCheckSlugHotelsService',        'uses'=>'Syscover\Hotels\Controllers\ServiceController@apiCheckSlug',               'resource' => 'hotels-service',        'action' => 'access']);

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/hotels/relationships/{lang}/{offset?}',                             ['as'=>'hotelsRelationship',                    'uses'=>'Syscover\Hotels\Controllers\RelationshipController@index',                      'resource' => 'hotels-relationship',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/hotels/relationships/json/data/{lang}',                             ['as'=>'jsonDataHotelsRelationship',            'uses'=>'Syscover\Hotels\Controllers\RelationshipController@jsonData',                   'resource' => 'hotels-relationship',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/hotels/relationships/create/{lang}/{offset}/{id?}',                 ['as'=>'createHotelsRelationship',              'uses'=>'Syscover\Hotels\Controllers\RelationshipController@createRecord',               'resource' => 'hotels-relationship',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/hotels/relationships/store/{lang}/{offset}/{id?}',                 ['as'=>'storeHotelsRelationship',               'uses'=>'Syscover\Hotels\Controllers\RelationshipController@storeRecord',                'resource' => 'hotels-relationship',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/hotels/relationships/{id}/edit/{lang}/{offset}',                    ['as'=>'editHotelsRelationship',                'uses'=>'Syscover\Hotels\Controllers\RelationshipController@editRecord',                 'resource' => 'hotels-relationship',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/hotels/relationships/update/{lang}/{id}/{offset}',                  ['as'=>'updateHotelsRelationship',              'uses'=>'Syscover\Hotels\Controllers\RelationshipController@updateRecord',               'resource' => 'hotels-relationship',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/hotels/relationships/delete/{lang}/{id}/{offset}',                  ['as'=>'deleteHotelsRelationship',              'uses'=>'Syscover\Hotels\Controllers\RelationshipController@deleteRecord',               'resource' => 'hotels-relationship',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/hotels/relationships/delete/translation/{lang}/{id}/{offset}',      ['as'=>'deleteTranslationHotelsRelationship',   'uses'=>'Syscover\Hotels\Controllers\RelationshipController@deleteTranslationRecord',    'resource' => 'hotels-relationship',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/hotels/relationships/delete/select/records/{lang}',              ['as'=>'deleteSelectHotelsRelationship',        'uses'=>'Syscover\Hotels\Controllers\RelationshipController@deleteRecordsSelect',        'resource' => 'hotels-relationship',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | ENVIROMENTS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/hotels/environments/{lang}/{offset?}',                              ['as'=>'hotelsEnvironment',                     'uses'=>'Syscover\Hotels\Controllers\EnvironmentController@index',                      'resource' => 'hotels-environment',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/hotels/environments/json/data/{lang}',                              ['as'=>'jsonDataHotelsEnvironment',             'uses'=>'Syscover\Hotels\Controllers\EnvironmentController@jsonData',                   'resource' => 'hotels-environment',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/hotels/environments/create/{lang}/{offset}/{id?}',                  ['as'=>'createHotelsEnvironment',               'uses'=>'Syscover\Hotels\Controllers\EnvironmentController@createRecord',               'resource' => 'hotels-environment',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/hotels/environments/store/{lang}/{offset}/{id?}',                  ['as'=>'storeHotelsEnvironment',                'uses'=>'Syscover\Hotels\Controllers\EnvironmentController@storeRecord',                'resource' => 'hotels-environment',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/hotels/environments/{id}/edit/{lang}/{offset}',                     ['as'=>'editHotelsEnvironment',                 'uses'=>'Syscover\Hotels\Controllers\EnvironmentController@editRecord',                 'resource' => 'hotels-environment',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/hotels/environments/update/{lang}/{id}/{offset}',                   ['as'=>'updateHotelsEnvironment',               'uses'=>'Syscover\Hotels\Controllers\EnvironmentController@updateRecord',               'resource' => 'hotels-environment',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/hotels/environments/delete/{lang}/{id}/{offset}',                   ['as'=>'deleteHotelsEnvironment',               'uses'=>'Syscover\Hotels\Controllers\EnvironmentController@deleteRecord',               'resource' => 'hotels-environment',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/hotels/environments/delete/translation/{lang}/{id}/{offset}',       ['as'=>'deleteTranslationHotelsEnvironment',    'uses'=>'Syscover\Hotels\Controllers\EnvironmentController@deleteTranslationRecord',    'resource' => 'hotels-environment',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/hotels/environments/delete/select/records/{lang}',               ['as'=>'deleteSelectHotelsEnvironment',         'uses'=>'Syscover\Hotels\Controllers\EnvironmentController@deleteRecordsSelect',        'resource' => 'hotels-environment',        'action' => 'delete']);

    /*
    |--------------------------------------------------------------------------
    | DECORATIONS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/hotels/decorations/{lang}/{offset?}',                               ['as'=>'hotelsDecoration',                      'uses'=>'Syscover\Hotels\Controllers\DecorationController@index',                        'resource' => 'hotels-decoration',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/hotels/decorations/json/data/{lang}',                               ['as'=>'jsonDataHotelsDecoration',              'uses'=>'Syscover\Hotels\Controllers\DecorationController@jsonData',                     'resource' => 'hotels-decoration',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/hotels/decorations/create/{lang}/{offset}/{id?}',                   ['as'=>'createHotelsDecoration',                'uses'=>'Syscover\Hotels\Controllers\DecorationController@createRecord',                 'resource' => 'hotels-decoration',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/hotels/decorations/store/{lang}/{offset}/{id?}',                   ['as'=>'storeHotelsDecoration',                 'uses'=>'Syscover\Hotels\Controllers\DecorationController@storeRecord',                  'resource' => 'hotels-decoration',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/hotels/decorations/{id}/edit/{lang}/{offset}',                      ['as'=>'editHotelsDecoration',                  'uses'=>'Syscover\Hotels\Controllers\DecorationController@editRecord',                   'resource' => 'hotels-decoration',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/hotels/decorations/update/{lang}/{id}/{offset}',                    ['as'=>'updateHotelsDecoration',                'uses'=>'Syscover\Hotels\Controllers\DecorationController@updateRecord',                 'resource' => 'hotels-decoration',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/hotels/decorations/delete/{lang}/{id}/{offset}',                    ['as'=>'deleteHotelsDecoration',                'uses'=>'Syscover\Hotels\Controllers\DecorationController@deleteRecord',                 'resource' => 'hotels-decoration',        'action' => 'delete']);
    Route::get(config('pulsar.appName') . '/hotels/decorations/delete/translation/{lang}/{id}/{offset}',        ['as'=>'deleteTranslationHotelsDecoration',     'uses'=>'Syscover\Hotels\Controllers\DecorationController@deleteTranslationRecord',      'resource' => 'hotels-decoration',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/hotels/decorations/delete/select/records/{lang}',                ['as'=>'deleteSelectHotelsDecoration',          'uses'=>'Syscover\Hotels\Controllers\DecorationController@deleteRecordsSelect',          'resource' => 'hotels-decoration',        'action' => 'delete']);

});