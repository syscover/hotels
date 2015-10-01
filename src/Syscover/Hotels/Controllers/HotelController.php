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

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Syscover\Hotels\Models\Decoration;
use Syscover\Hotels\Models\Environment;
use Syscover\Hotels\Models\Publication;
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
    protected $langModel    = '\Syscover\Hotels\Models\HotelLang';
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
        $parameters['publications']     = Publication::all();
        $parameters['restaurantTypes']  = [
            (object)['id' => 0, 'name' => trans('hotels::pulsar.open_public')],
            (object)['id' => 1, 'name' => trans('hotels::pulsar.open_by_reservation')],
            (object)['id' => 2, 'name' => trans('hotels::pulsar.only_guest')],
            (object)['id' => 3, 'name' => trans('hotels::pulsar.only_guest_reservation')]
        ];

        return $parameters;
    }

    public function checkSpecialRulesToStore($parameters)
    {
        if(isset($parameters['id']))
        {
            $hotel = Hotel::find($parameters['id']);

            $parameters['specialRules']['emailRule']    = Request::input('email') == $hotel->email_170? true : false;
            $parameters['specialRules']['userRule']     = Request::input('user') == $hotel->user_170? true : false;
            $parameters['specialRules']['passRule']     = Request::input('password') == ""? true : false;
        }

        return $parameters;
    }

    public function storeCustomRecord()
    {
        if(!Request::has('id'))
        {
            $hotel = Hotel::create([
                'name_170' => Request::input('name'),
                'web_170' => Request::input('web'),
                'web_url_170' => Request::input('webUrl'),
                'contact_170' => Request::input('contact'),
                'email_170' => Request::input('email'),
                'booking_email_170' => Request::input('bookingEmail'),
                'phone_170' => Request::input('phone'),
                'mobile_170' => Request::input('mobile'),
                'fax_170' => Request::input('fax'),
                'environment_170' => Request::has('environment') ? Request::input('environment') : null,
                'decoration_170' => Request::has('decoration') ? Request::input('decoration') : null,
                'relationship_170' => Request::has('relationship') ? Request::input('relationship') : null,
                'n_rooms_170' => Request::input('nRooms'),
                'n_places_170' => Request::input('nPlaces'),
                'n_events_rooms_170' => Request::input('nEventsRooms'),
                'n_events_rooms_places_170' => Request::input('nEventsRoomsPlaces'),
                'user_170' => Request::input('user'),
                'password_170' => Hash::make(Request::input('password')),
                'active_170' => Request::has('active'),
                'country_170' => Request::input('country'),
                'territorial_area_1_170' => Request::has('territorialArea1') ? Request::input('territorialArea1') : null,
                'territorial_area_2_170' => Request::has('territorialArea2') ? Request::input('territorialArea2') : null,
                'territorial_area_3_170' => Request::has('territorialArea3') ? Request::input('territorialArea3') : null,
                'cp_170' => Request::input('cp'),
                'locality_170' => Request::input('locality'),
                'address_170' => Request::input('address'),
                'latitude_170' => Request::input('latitude'),
                'longitude_170' => Request::input('longitude'),
                'booking_url_170' => Request::input('bookingUrl'),
                'country_chef_restaurant_170' => Request::has('countryChefRestaurant'),
                'country_chef_url_170' => Request::input('countryChefUrl'),
                'restaurant_name_170' => Request::input('restaurantName'),
                'restaurant_type_170' => Request::has('restaurantType')? Request::input('restaurantType') : null,
                'restaurant_terrace_170' => Request::has('restaurantTerrace'),
                'billing_name_170' => Request::input('billingName'),
                'billing_surname_170' => Request::input('billingSurname'),
                'billing_company_name_170' => Request::input('billingCompanyName'),
                'billing_tin_170' => Request::input('billingTin'),
                'billing_country_170' => Request::has('billingCountry')? Request::input('billingCountry') : null,
                'billing_territorial_area_1_170' => Request::has('billingTerritorialArea1')? Request::input('billingTerritorialArea1') : null,
                'billing_territorial_area_2_170' => Request::has('billingTerritorialArea2')? Request::input('billingTerritorialArea2') : null,
                'billing_territorial_area_3_170' => Request::has('billingTerritorialArea3')? Request::input('billingTerritorialArea3') : null,
                'billing_cp_170' => Request::input('billingCp'),
                'billing_locality_170' => Request::input('billingLocality'),
                'billing_address_170' => Request::input('billingAddress'),
                'billing_phone_170' => Request::input('billingPhone'),
                'billing_email_170' => Request::input('billingEmail'),
                'billing_iban_country_170' => Request::input('billingIbanCountry'),
                'billing_iban_check_digits_170' => Request::input('billingIbanCheckDigits'),
                'billing_iban_basic_bank_account_number_170' => Request::input('billingIbanBasicBankAccountNumber'),
                'billing_bic_170' => Request::input('billingBic')
            ]);

            $id = $hotel->id_170;

            // publications
            if(is_array(Request::input('published')))
            {
                $hotel->publications()->sync(Request::input('published'));
            }
        }
        else
        {
            $id = Request::input('id');
        }

        Hotel::where('id_170', $id)->update([
            'data_lang_170'                 => Hotel::addLangDataRecord($id, Request::input('lang'))
        ]);

        HotelLang::create([
            'id_171'                        => $id,
            'lang_171'                      => Request::input('lang'),
            'cuisine_171'                   => Request::input('cuisine'),
            'special_dish_171'              => Request::input('specialDish'),
            'indications_171'               => Request::input('indications'),
            'interest_points_171'           => Request::input('interestPoints'),
            'environment_description_171'   => Request::input('environmentDescription'),
            'construction_171'              => Request::input('construction'),
            'activities_171'                => Request::input('activities'),
            'description_title_171'         => Request::input('descriptionTitle'),
            'description_171'               => Request::input('description')
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['environments']     = Environment::getTranslationsRecords($parameters['lang']->id_001);
        $parameters['decorations']      = Decoration::getTranslationsRecords($parameters['lang']->id_001);
        $parameters['relationships']    = Relationship::getTranslationsRecords($parameters['lang']->id_001);
        $parameters['publications']     = Publication::all();
        $parameters['restaurantTypes']  = [
            (object)['id' => 0, 'name' => trans('hotels::pulsar.open_public')],
            (object)['id' => 1, 'name' => trans('hotels::pulsar.open_by_reservation')],
            (object)['id' => 2, 'name' => trans('hotels::pulsar.only_guest')],
            (object)['id' => 3, 'name' => trans('hotels::pulsar.only_guest_reservation')]
        ];

        return $parameters;
    }

    public function checkSpecialRulesToUpdate($parameters)
    {
        $hotel = Hotel::find($parameters['id']);

        $parameters['specialRules']['emailRule']    = Request::input('email') == $hotel->email_170? true : false;
        $parameters['specialRules']['userRule']     = Request::input('user') == $hotel->user_170? true : false;
        $parameters['specialRules']['passRule']     = Request::input('password') == ""? true : false;

        return $parameters;
    }

    public function updateCustomRecord($parameters)
    {
        $hotel = [
            'name_170'                                      => Request::input('name'),
            'web_170'                                       => Request::input('web'),
            'web_url_170'                                   => Request::input('webUrl'),
            'contact_170'                                   => Request::input('contact'),
            'booking_email_170'                             => Request::input('bookingEmail'),
            'phone_170'                                     => Request::input('phone'),
            'mobile_170'                                    => Request::input('mobile'),
            'fax_170'                                       => Request::input('fax'),
            'environment_170'                               => Request::has('environment')? Request::input('environment') : null,
            'decoration_170'                                => Request::has('decoration')? Request::input('decoration') : null,
            'relationship_170'                              => Request::has('relationship')? Request::input('relationship') : null,
            'n_rooms_170'                                   => Request::input('nRooms'),
            'n_places_170'                                  => Request::input('nPlaces'),
            'n_events_rooms_170'                            => Request::input('nEventsRooms'),
            'n_events_rooms_places_170'                     => Request::input('nEventsRoomsPlaces'),
            'active_170'                                    => Request::has('active'),
            'country_170'                                   => Request::input('country'),
            'territorial_area_1_170'                        => Request::has('territorialArea1')? Request::input('territorialArea1') : null,
            'territorial_area_2_170'                        => Request::has('territorialArea2')? Request::input('territorialArea2') : null,
            'territorial_area_3_170'                        => Request::has('territorialArea3')? Request::input('territorialArea3') : null,
            'cp_170'                                        => Request::input('cp'),
            'locality_170'                                  => Request::input('locality'),
            'address_170'                                   => Request::input('address'),
            'latitude_170'                                  => Request::input('latitude'),
            'longitude_170'                                 => Request::input('longitude'),
            'booking_url_170'                               => Request::input('bookingUrl'),
            'country_chef_restaurant_170'                   => Request::has('countryChefRestaurant'),
            'country_chef_url_170'                          => Request::input('countryChefUrl'),
            'restaurant_name_170'                           => Request::input('restaurantName'),
            'restaurant_type_170'                           => Request::has('restaurantType')? Request::input('restaurantType') : null,
            'restaurant_terrace_170'                        => Request::has('restaurantTerrace'),
            'billing_name_170'                              => Request::input('billingName'),
            'billing_surname_170'                           => Request::input('billingSurname'),
            'billing_company_name_170'                      => Request::input('billingCompanyName'),
            'billing_tin_170'                               => Request::input('billingTin'),
            'billing_country_170'                           => Request::has('billingCountry')? Request::input('billingCountry') : null,
            'billing_territorial_area_1_170'                => Request::has('billingTerritorialArea1')? Request::input('billingTerritorialArea1') : null,
            'billing_territorial_area_2_170'                => Request::has('billingTerritorialArea2')? Request::input('billingTerritorialArea2') : null,
            'billing_territorial_area_3_170'                => Request::has('billingTerritorialArea3')? Request::input('billingTerritorialArea3') : null,
            'billing_cp_170'                                => Request::input('billingCp'),
            'billing_locality_170'                          => Request::input('billingLocality'),
            'billing_address_170'                           => Request::input('billingAddress'),
            'billing_phone_170'                             => Request::input('billingPhone'),
            'billing_email_170'                             => Request::input('billingEmail'),
            'billing_iban_country_170'                      => Request::input('billingIbanCountry'),
            'billing_iban_check_digits_170'                 => Request::input('billingIbanCheckDigits'),
            'billing_iban_basic_bank_account_number_170'    => Request::input('billingIbanBasicBankAccountNumber'),
            'billing_bic_170'                               => Request::input('billingBic')
        ];

        if($parameters['specialRules']['emailRule'])  $hotel['email_170']       = Request::input('email');
        if($parameters['specialRules']['userRule'])   $hotel['user_170']        = Request::input('user');
        if(!$parameters['specialRules']['passRule'])  $hotel['password_170']    = Hash::make(Request::input('password'));

        Hotel::where('id_170', $parameters['id'])->update($hotel);

        $hotel = Hotel::find($parameters['id']);

        // publications
        if(is_array(Request::input('published')))
        {
            $hotel->publications()->sync(Request::input('published'));
        }
        else
        {
            $hotel->publications()->detach();
        }

        HotelLang::where('id_171', $parameters['id'])->where('lang_171', Request::input('lang'))->update([
            'cuisine_171'                   => Request::input('cuisine'),
            'special_dish_171'              => Request::input('specialDish'),
            'indications_171'               => Request::input('indications'),
            'interest_points_171'           => Request::input('interestPoints'),
            'environment_description_171'   => Request::input('environmentDescription'),
            'construction_171'              => Request::input('construction'),
            'activities_171'                => Request::input('activities'),
            'description_title_171'         => Request::input('descriptionTitle'),
            'description_171'               => Request::input('description')
        ]);
    }
}