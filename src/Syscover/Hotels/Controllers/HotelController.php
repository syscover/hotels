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
use Illuminate\Http\Request;
use Syscover\Hotels\Models\Decoration;
use Syscover\Hotels\Models\Environment;
use Syscover\Hotels\Models\HotelProduct;
use Syscover\Hotels\Models\Publication;
use Syscover\Hotels\Models\Relationship;
use Syscover\Hotels\Models\Service;
use Syscover\Market\Models\Product;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Libraries\AttachmentLibrary;
use Syscover\Pulsar\Models\Attachment;
use Syscover\Pulsar\Models\AttachmentFamily;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Hotel;
use Syscover\Hotels\Models\HotelLang;

class HotelController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'Hotel';
    protected $folder       = 'hotel';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_170', 'name_001', 'name_002', 'name_003', 'name_170'];
    protected $nameM        = 'name_170';
    protected $model        = '\Syscover\Hotels\Models\Hotel';
    protected $langModel    = '\Syscover\Hotels\Models\HotelLang';
    protected $icon         = 'fa fa-h-square';
    protected $objectTrans  = 'hotel';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang');
        // init record on tap 4
        $parameters['urlParameters']['tab']     = 4;

        return $parameters;
    }

    public function customActionUrlParameters($actionUrlParameters, $parameters)
    {
        $actionUrlParameters['tab'] = 4;

        return $actionUrlParameters;
    }

    public function createCustomRecord($request, $parameters)
    {
        $parameters['services']         = Service::getTranslationsRecords($parameters['lang']);
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
        $parameters['attachmentFamilies']   = AttachmentFamily::getAttachmentFamilies(['resource_015' => 'hotels-hotel']);
        $parameters['attachmentsInput']     = json_encode([]);
        $parameters['hotelProductsIds']     = json_encode([]);

        $parameters['products']             = Product::getRecords(['active_111' => true, 'lang_112' => $parameters['lang']]);

        // TODO: especificar que familia de attachments coger
        $parameters['attachmentsProducts']  = Attachment::getRecords(['lang_016' => $parameters['lang'], 'resource_016' => 'market-product'])->keyBy('object_016');

        if(isset($parameters['id']))
        {
            // get attachments from base lang
            $attachments = AttachmentLibrary::getRecords($this->package, 'hotels-hotel', $parameters['id'], session('baseLang')->id_001, true);

            // merge parameters and attachments array
            $parameters  = array_merge($parameters, $attachments);

            // get hotel products
            $parameters['hotelProducts']        = HotelProduct::getRecords(['hotel_177' => $parameters['id'], 'lang_177' => session('baseLang')->id_001])->keyBy('product_177');
            $parameters['hotelProductsIds']     = json_encode($parameters['hotelProducts']->keys()->map(function($item, $key) { return strval($item); }));
        }

        return $parameters;
    }

    public function checkSpecialRulesToStore($request, $parameters)
    {
        if(isset($parameters['id']))
        {
            $hotel = Hotel::find($parameters['id']);

            $parameters['specialRules']['emailRule']    = $request->input('email') == $hotel->email_170? true : false;
            $parameters['specialRules']['userRule']     = $request->input('user') == $hotel->user_170? true : false;
            $parameters['specialRules']['passRule']     = $request->input('password') == ""? true : false;
        }

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        if(!$request->has('id'))
        {
            // create new hotel
            $hotel = Hotel::create([
                'name_170'                                      => $request->input('name'),
                'slug_170'                                      => $request->input('slug'),
                'web_170'                                       => $request->input('web'),
                'web_url_170'                                   => $request->input('webUrl'),
                'contact_170'                                   => $request->input('contact'),
                'email_170'                                     => $request->input('email'),
                'booking_email_170'                             => $request->input('bookingEmail'),
                'phone_170'                                     => $request->input('phone'),
                'mobile_170'                                    => $request->input('mobile'),
                'fax_170'                                       => $request->input('fax'),
                'environment_170'                               => $request->has('environment') ? $request->input('environment') : null,
                'decoration_170'                                => $request->has('decoration') ? $request->input('decoration') : null,
                'relationship_170'                              => $request->has('relationship') ? $request->input('relationship') : null,
                'n_rooms_170'                                   => $request->input('nRooms'),
                'n_places_170'                                  => $request->input('nPlaces'),
                'n_events_rooms_170'                            => $request->input('nEventsRooms'),
                'n_events_rooms_places_170'                     => $request->input('nEventsRoomsPlaces'),
                'user_170'                                      => $request->input('user'),
                'password_170'                                  => Hash::make($request->input('password')),
                'active_170'                                    => $request->has('active'),
                'country_170'                                   => $request->input('country'),
                'territorial_area_1_170'                        => $request->has('territorialArea1') ? $request->input('territorialArea1') : null,
                'territorial_area_2_170'                        => $request->has('territorialArea2') ? $request->input('territorialArea2') : null,
                'territorial_area_3_170'                        => $request->has('territorialArea3') ? $request->input('territorialArea3') : null,
                'cp_170'                                        => $request->input('cp'),
                'locality_170'                                  => $request->input('locality'),
                'address_170'                                   => $request->input('address'),
                'latitude_170'                                  => $request->input('latitude'),
                'longitude_170'                                 => $request->input('longitude'),
                'booking_url_170'                               => $request->input('bookingUrl'),
                'country_chef_restaurant_170'                   => $request->has('countryChefRestaurant'),
                'country_chef_url_170'                          => $request->input('countryChefUrl'),
                'restaurant_name_170'                           => $request->input('restaurantName'),
                'restaurant_type_170'                           => $request->has('restaurantType')? $request->input('restaurantType') : null,
                'restaurant_terrace_170'                        => $request->has('restaurantTerrace'),
                'billing_name_170'                              => $request->input('billingName'),
                'billing_surname_170'                           => $request->input('billingSurname'),
                'billing_company_name_170'                      => $request->input('billingCompanyName'),
                'billing_tin_170'                               => $request->input('billingTin'),
                'billing_country_170'                           => $request->has('billingCountry')? $request->input('billingCountry') : null,
                'billing_territorial_area_1_170'                => $request->has('billingTerritorialArea1')? $request->input('billingTerritorialArea1') : null,
                'billing_territorial_area_2_170'                => $request->has('billingTerritorialArea2')? $request->input('billingTerritorialArea2') : null,
                'billing_territorial_area_3_170'                => $request->has('billingTerritorialArea3')? $request->input('billingTerritorialArea3') : null,
                'billing_cp_170'                                => $request->input('billingCp'),
                'billing_locality_170'                          => $request->input('billingLocality'),
                'billing_address_170'                           => $request->input('billingAddress'),
                'billing_phone_170'                             => $request->input('billingPhone'),
                'billing_email_170'                             => $request->input('billingEmail'),
                'billing_iban_country_170'                      => $request->input('billingIbanCountry'),
                'billing_iban_check_digits_170'                 => $request->input('billingIbanCheckDigits'),
                'billing_iban_basic_bank_account_number_170'    => $request->input('billingIbanBasicBankAccountNumber'),
                'billing_bic_170'                               => $request->input('billingBic')
            ]);

            $id     = $hotel->id_170;
            $idLang = null;

            // publications
            if(is_array($request->input('published')))
                $hotel->publications()->sync($request->input('published'));

            // services
            if(is_array($request->input('services')))
                $hotel->services()->sync($request->input('services'));
        }
        else
        {
            // create hotel language
            $id     = $request->input('id');
            $idLang = $id;
        }

        Hotel::where('id_170', $id)->update([
            'data_lang_170'                 => Hotel::addLangDataRecord($request->input('lang'), $idLang)
        ]);

        HotelLang::create([
            'id_171'                        => $id,
            'lang_171'                      => $request->input('lang'),
            'cuisine_171'                   => $request->input('cuisine'),
            'special_dish_171'              => $request->input('specialDish'),
            'indications_171'               => $request->input('indications'),
            'interest_points_171'           => $request->input('interestPoints'),
            'environment_description_171'   => $request->input('environmentDescription'),
            'construction_171'              => $request->input('construction'),
            'activities_171'                => $request->input('activities'),
            'description_title_171'         => $request->input('descriptionTitle'),
            'description_171'               => $request->input('description')
        ]);

        // set hotel products
        $hotelProducts = [];
        $products = json_decode($request->input('products'));
        foreach($products as $product)
        {
            $hotelProducts[] = [
                'hotel_177'         => $id,
                'product_177'       => $product,
                'lang_177'          => $request->input('lang'),
                'description_177'   => $request->input('d' . $product)
            ];
        }

        if(count($hotelProducts) > 0)
            HotelProduct::insert($hotelProducts);

        // set attachments
        $attachments = json_decode($request->input('attachments'));
        AttachmentLibrary::storeAttachments($attachments, 'hotels', 'hotels-hotel', $id, $request->input('lang'));
    }

    public function editCustomRecord($request, $parameters)
    {
        $parameters['services']         = Service::getTranslationsRecords($parameters['lang']->id_001);
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

        // get attachments elements
        $attachments = AttachmentLibrary::getRecords('hotels', 'hotels-hotel', $parameters['object']->id_170, $parameters['lang']->id_001);

        $parameters['products']             = Product::getRecords(['active_111' => true, 'lang_112' => $parameters['lang']->id_001]);
        // TODO: especificar que familia de attachments coger
        $parameters['attachmentsProducts']  = Attachment::getRecords(['lang_016' => $parameters['lang']->id_001, 'resource_016' => 'market-product'])->keyBy('object_016');

        // merge parameters and attachments array
        $parameters['attachmentFamilies']   = AttachmentFamily::getAttachmentFamilies(['resource_015' => 'hotels-hotel']);
        $parameters                         = array_merge($parameters, $attachments);

        // get hotel products
        $parameters['hotelProducts']        = $parameters['object']->hotelProducts->keyBy('product_177');
        $parameters['hotelProductsIds']     = json_encode($parameters['hotelProducts']->keys()->map(function($item, $key) { return strval($item); }));

        return $parameters;
    }

    public function checkSpecialRulesToUpdate($request, $parameters)
    {
        $hotel = Hotel::find($parameters['id']);

        $parameters['specialRules']['emailRule']    = $request->input('email') == $hotel->email_170? true : false;
        $parameters['specialRules']['userRule']     = $request->input('user') == $hotel->user_170? true : false;
        $parameters['specialRules']['passRule']     = $request->input('password') == ""? true : false;

        return $parameters;
    }

    public function updateCustomRecord($request, $parameters)
    {
        $hotel = [
            'name_170'                                      => $request->input('name'),
            'slug_170'                                      => $request->input('slug'),
            'web_170'                                       => $request->input('web'),
            'web_url_170'                                   => $request->input('webUrl'),
            'contact_170'                                   => $request->input('contact'),
            'booking_email_170'                             => $request->input('bookingEmail'),
            'phone_170'                                     => $request->input('phone'),
            'mobile_170'                                    => $request->input('mobile'),
            'fax_170'                                       => $request->input('fax'),
            'environment_170'                               => $request->has('environment')? $request->input('environment') : null,
            'decoration_170'                                => $request->has('decoration')? $request->input('decoration') : null,
            'relationship_170'                              => $request->has('relationship')? $request->input('relationship') : null,
            'n_rooms_170'                                   => $request->input('nRooms'),
            'n_places_170'                                  => $request->input('nPlaces'),
            'n_events_rooms_170'                            => $request->input('nEventsRooms'),
            'n_events_rooms_places_170'                     => $request->input('nEventsRoomsPlaces'),
            'active_170'                                    => $request->has('active'),
            'country_170'                                   => $request->input('country'),
            'territorial_area_1_170'                        => $request->has('territorialArea1')? $request->input('territorialArea1') : null,
            'territorial_area_2_170'                        => $request->has('territorialArea2')? $request->input('territorialArea2') : null,
            'territorial_area_3_170'                        => $request->has('territorialArea3')? $request->input('territorialArea3') : null,
            'cp_170'                                        => $request->input('cp'),
            'locality_170'                                  => $request->input('locality'),
            'address_170'                                   => $request->input('address'),
            'latitude_170'                                  => $request->input('latitude'),
            'longitude_170'                                 => $request->input('longitude'),
            'booking_url_170'                               => $request->input('bookingUrl'),
            'country_chef_restaurant_170'                   => $request->has('countryChefRestaurant'),
            'country_chef_url_170'                          => $request->input('countryChefUrl'),
            'restaurant_name_170'                           => $request->input('restaurantName'),
            'restaurant_type_170'                           => $request->has('restaurantType')? $request->input('restaurantType') : null,
            'restaurant_terrace_170'                        => $request->has('restaurantTerrace'),
            'billing_name_170'                              => $request->input('billingName'),
            'billing_surname_170'                           => $request->input('billingSurname'),
            'billing_company_name_170'                      => $request->input('billingCompanyName'),
            'billing_tin_170'                               => $request->input('billingTin'),
            'billing_country_170'                           => $request->has('billingCountry')? $request->input('billingCountry') : null,
            'billing_territorial_area_1_170'                => $request->has('billingTerritorialArea1')? $request->input('billingTerritorialArea1') : null,
            'billing_territorial_area_2_170'                => $request->has('billingTerritorialArea2')? $request->input('billingTerritorialArea2') : null,
            'billing_territorial_area_3_170'                => $request->has('billingTerritorialArea3')? $request->input('billingTerritorialArea3') : null,
            'billing_cp_170'                                => $request->input('billingCp'),
            'billing_locality_170'                          => $request->input('billingLocality'),
            'billing_address_170'                           => $request->input('billingAddress'),
            'billing_phone_170'                             => $request->input('billingPhone'),
            'billing_email_170'                             => $request->input('billingEmail'),
            'billing_iban_country_170'                      => $request->input('billingIbanCountry'),
            'billing_iban_check_digits_170'                 => $request->input('billingIbanCheckDigits'),
            'billing_iban_basic_bank_account_number_170'    => $request->input('billingIbanBasicBankAccountNumber'),
            'billing_bic_170'                               => $request->input('billingBic')
        ];

        if($parameters['specialRules']['emailRule'])  $hotel['email_170']       = $request->input('email');
        if($parameters['specialRules']['userRule'])   $hotel['user_170']        = $request->input('user');
        if(!$parameters['specialRules']['passRule'])  $hotel['password_170']    = Hash::make($request->input('password'));

        Hotel::where('id_170', $parameters['id'])->update($hotel);

        $hotel = Hotel::find($parameters['id']);

        // publications
        if(is_array($request->input('published')))
        {
            $hotel->publications()->sync($request->input('published'));
        }
        else
        {
            $hotel->publications()->detach();
        }

        // services
        if(is_array($request->input('services')))
        {
            $hotel->services()->sync($request->input('services'));
        }
        else
        {
            $hotel->services()->detach();
        }

        HotelLang::where('id_171', $parameters['id'])->where('lang_171', $request->input('lang'))->update([
            'cuisine_171'                   => $request->input('cuisine'),
            'special_dish_171'              => $request->input('specialDish'),
            'indications_171'               => $request->input('indications'),
            'interest_points_171'           => $request->input('interestPoints'),
            'environment_description_171'   => $request->input('environmentDescription'),
            'construction_171'              => $request->input('construction'),
            'activities_171'                => $request->input('activities'),
            'description_title_171'         => $request->input('descriptionTitle'),
            'description_171'               => $request->input('description')
        ]);

        // set hotel products
        HotelProduct::where('hotel_177', $parameters['id'])->where('lang_177', $request->input('lang'))->delete();
        $hotelProducts = [];
        $products = json_decode($request->input('products'));
        foreach($products as $product)
        {
            $hotelProducts[] = [
                'hotel_177'         => $parameters['id'],
                'product_177'       => $product,
                'lang_177'          => $request->input('lang'),
                'description_177'   => $request->input('d' . $product)
            ];
        }

        if(count($hotelProducts) > 0)
            HotelProduct::insert($hotelProducts);
    }

    public function deleteCustomRecord($request, $object)
    {
        // delete all attachments
        AttachmentLibrary::deleteAttachment($this->package, 'hotels-hotel', $object->id_170);
    }

    public function addToDeleteTranslationRecord($request, $object)
    {
        // delete all attachments from lang object
        AttachmentLibrary::deleteAttachment($this->package, 'hotels-hotel', $object->id_171, $object->lang_171);
    }

    public function deleteCustomRecords($request, $ids)
    {
        foreach($ids as $id)
        {
            AttachmentLibrary::deleteAttachment($this->package, 'hotels-hotel', $id);
        }
    }

    public function apiCheckSlug(Request $request)
    {
        return response()->json([
            'status'    => 'success',
            'slug'      => Hotel::checkSlug('slug_170', $request->input('slug'), $request->input('id'))
        ]);
    }
}