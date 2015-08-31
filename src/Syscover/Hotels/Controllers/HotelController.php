<?php namespace Syscover\Hotels\Controllers;

/**
 * @package	    Hotels
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Support\Facades\Request;
use Syscover\Hotels\Models\Decoration;
use Syscover\Hotels\Models\Environment;
use Syscover\Hotels\Models\Relationship;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Hotel;
use Syscover\Hotels\Models\HotelLang;

class HotelController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'Hotel';
    protected $folder       = 'hotels';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_170', 'name_001', 'name_170'];
    protected $nameM        = 'name_170';
    protected $model        = '\Syscover\Hotels\Models\Hotel';
    protected $icon         = 'fa fa-h-square';
    protected $objectTrans  = 'hotel';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang');
        // init record on tap 1
        $parameters['urlParameters']['tab']     = 4;

        return $parameters;
    }

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['tab'] = 4;

        return $actionUrlParameters;
    }

    public function createCustomRecord($parameters)
    {
        $parameters['environments']     = Environment::getTranslationsRecords($parameters['lang']);
        $parameters['decorations']      = Decoration::getTranslationsRecords($parameters['lang']);
        $parameters['relationships']    = Relationship::getTranslationsRecords($parameters['lang']);
        $parameters['restaurantTypes']  = [
            (object)['id' => 0, 'name' => trans('hotels::pulsar.open_public')],
            (object)['id' => 1, 'name' => trans('hotels::pulsar.open_by_reservation')],
            (object)['id' => 2, 'name' => trans('hotels::pulsar.only_guest')],
            (object)['id' => 3, 'name' => trans('hotels::pulsar.only_guest_reservation')]
        ];


        return $parameters;
    }

    public function storeCustomRecord()
    {
        $hotel = Hotel::create([
            'name_170'                  => Request::input('name'),
            'web_170'                   => Request::input('web'),
            'contact_170'               => Request::input('contact'),
            'email_170'                 => Request::input('email'),
            'booking_email_170'         => Request::input('bookingEmail'),
            'booking_email_170'         => Request::input('bookingEmail'),
            'phone_170'                 => Request::input('phone'),
            'mobile_170'                => Request::input('mobile'),
            'fax_170'                   => Request::input('fax'),
            'n_rooms_170'               => Request::input('nRooms'),
            'n_places_170'              => Request::input('nPlaces'),
            'n_events_rooms_170'        => Request::input('nEventsRooms'),
            'n_places_events_rooms_170' => Request::input('nPlacesEventsRooms'),
            'country_170'               => Request::input('country'),
            'territorial_area_1_170'    => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_170'    => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_170'    => Request::has('territorialArea3')? Request::input('territorialArea3f') : null,
            'cp_170'                    => Request::input('cp'),
            'locality_170'              => Request::input('locality'),
            'address_170'               => Request::input('address'),
            'latitude_170'              => Request::input('latitude'),
            'longitude_170'             => Request::input('longitude')
        ]);

        Hotel::where('id_170', $hotel->id_170)->update([
            'data_170'                 => HotelLang::addLangDataRecord($hotel->id_170, Request::input('lang'))
        ]);

        HotelLang::create([
            'id_171'                    => $hotel->id_170,
            'lang_171'                  => Request::input('lang'),
            'description_171'           => Request::input('description')
        ]);
    }
/*
    public function updateCustomRecord($parameters)
    {
        Decoration::where('id_151', $parameters['id'])->where('lang_151', Request::input('lang'))->update([
            'name_151'  => Request::input('name')
        ]);
    }*/
}