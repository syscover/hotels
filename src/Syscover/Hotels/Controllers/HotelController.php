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
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Hotel;

class HotelController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'Hotel';
    protected $folder       = 'hotels';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_170', 'name_001', 'name_170'];
    protected $nameM        = 'name_170';
    protected $model        = '\Syscover\Hotels\Models\Hotel';
    protected $icon         = 'icomoon-icon-home-7';
    protected $objectTrans  = 'hotel';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang');
        // init record on tap 1
        $parameters['urlParameters']['tab']     = 4;

        return $parameters;
    }

    public function storeCustomRecord()
    {

        dd([
            //'name_170'                  => Request::input('name'),
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
            'territorial_area_1_170'    => Request::input('territorialArea1'),
            'territorial_area_2_170'    => Request::input('territorialArea2'),
            'territorial_area_3_170'    => Request::input('territorialArea3'),
            'cp_170'                    => Request::input('cp'),
            'locality_170'              => Request::input('locality'),
            'address_170'               => Request::input('address'),
            'latitude_170'              => Request::input('latitude'),
            'longitude_170'             => Request::input('longitude'),
        ]);

        Hotel::create();
    }

    public function updateCustomRecord($parameters)
    {
        Decoration::where('id_151', $parameters['id'])->where('lang_151', Request::input('lang'))->update([
            'name_151'  => Request::input('name')
        ]);
    }
}