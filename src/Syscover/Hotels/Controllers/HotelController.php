<?php namespace Syscover\Hotels\Controllers;

use Syscover\Pulsar\Core\Controller;
use Illuminate\Support\Facades\Hash;
use Syscover\Hotels\Models\Decoration;
use Syscover\Hotels\Models\Environment;
use Syscover\Hotels\Models\HotelProduct;
use Syscover\Hotels\Models\Publication;
use Syscover\Hotels\Models\Relationship;
use Syscover\Hotels\Models\Service;
use Syscover\Market\Models\Product;
use Syscover\Pulsar\Libraries\AttachmentLibrary;
use Syscover\Pulsar\Libraries\CustomFieldResultLibrary;
use Syscover\Pulsar\Models\Attachment;
use Syscover\Pulsar\Models\AttachmentFamily;
use Syscover\Pulsar\Models\CustomFieldGroup;
use Syscover\Hotels\Models\Hotel;
use Syscover\Hotels\Models\HotelLang;

/**
 * Class HotelController
 * @package Syscover\Hotels\Controllers
 */

class HotelController extends Controller
{
    protected $routeSuffix  = 'hotel';
    protected $folder       = 'hotel';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_170', 'name_001', 'name_002', 'name_003', 'name_170', ['data' => 'active_170', 'type' => 'active']];
    protected $nameM        = 'name_170';
    protected $model        = Hotel::class;
    protected $langModel    = HotelLang::class;
    protected $icon         = 'fa fa-h-square';
    protected $objectTrans  = 'hotel';

    public function customIndex($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang')->id_001;
        // init record on tap 4
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
        $parameters['services']             = Service::where('lang_153', $parameters['lang']->id_001)->get();
        $parameters['environments']         = Environment::where('lang_150', $parameters['lang']->id_001)->get();
        $parameters['decorations']          = Decoration::where('lang_151', $parameters['lang']->id_001)->get();
        $parameters['relationships']        = Relationship::where('lang_152', $parameters['lang']->id_001)->get();
        $parameters['publications']         = Publication::all();
        $parameters['restaurantTypes']      = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        }, config('hotels.restaurantTypes'));
        $parameters['attachmentFamilies']   = AttachmentFamily::getAttachmentFamilies(['resource_015' => 'hotels-hotel']);
        $parameters['customFieldGroups']    = CustomFieldGroup::where('resource_025', 'hotels-hotel')->get();
        $parameters['attachmentsInput']     = json_encode([]);
        $parameters['hotelProductsIds']     = json_encode([]);

        $parameters['products']             = Product::getRecords(['active_111' => true, 'lang_112' => $parameters['lang']->id_001]);

        // get attachments products with photo list
        $parameters['attachmentsProducts']  = Attachment::builder()
            ->where('lang_016', $parameters['lang']->id_001)
            ->where('resource_016', 'market-product')
            ->where('family_016', config('hotels.idAttachmentsFamily.productList'))
            ->get()
            ->keyBy('object_016');

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

    public function checkSpecialRulesToStore($parameters)
    {
        if(isset($parameters['id']))
        {
            $hotel = Hotel::find($parameters['id']);

            $parameters['specialRules']['emailRule']    = $this->request->input('email') == $hotel->email_170? true : false;
            $parameters['specialRules']['userRule']     = $this->request->input('user') == $hotel->user_170? true : false;
            $parameters['specialRules']['passRule']     = $this->request->input('password') == ""? true : false;
        }

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        if(!$this->request->has('id'))
        {
            // create new hotel
            $hotel = Hotel::create([
                'custom_field_group_170'                        => $this->request->has('customFieldGroup')? $this->request->input('customFieldGroup') : null,
                'name_170'                                      => $this->request->input('name'),
                'slug_170'                                      => $this->request->input('slug'),
                'web_170'                                       => $this->request->input('web'),
                'web_url_170'                                   => $this->request->input('webUrl'),
                'contact_170'                                   => $this->request->input('contact'),
                'email_170'                                     => $this->request->input('email'),
                'booking_email_170'                             => $this->request->input('bookingEmail'),
                'phone_170'                                     => $this->request->input('phone'),
                'mobile_170'                                    => $this->request->input('mobile'),
                'fax_170'                                       => $this->request->input('fax'),
                'environment_170'                               => $this->request->has('environment')? $this->request->input('environment') : null,
                'decoration_170'                                => $this->request->has('decoration')? $this->request->input('decoration') : null,
                'relationship_170'                              => $this->request->has('relationship')? $this->request->input('relationship') : null,
                'n_rooms_170'                                   => $this->request->input('nRooms'),
                'n_places_170'                                  => $this->request->input('nPlaces'),
                'n_events_rooms_170'                            => $this->request->input('nEventsRooms'),
                'n_events_rooms_places_170'                     => $this->request->input('nEventsRoomsPlaces'),
                'user_170'                                      => $this->request->input('user'),
                'password_170'                                  => Hash::make($this->request->input('password')),
                'active_170'                                    => $this->request->has('active'),
                'country_170'                                   => $this->request->input('country'),
                'territorial_area_1_170'                        => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
                'territorial_area_2_170'                        => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
                'territorial_area_3_170'                        => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
                'cp_170'                                        => $this->request->has('cp')? $this->request->input('cp') : null,
                'locality_170'                                  => $this->request->input('locality'),
                'address_170'                                   => $this->request->input('address'),
                'latitude_170'                                  => str_replace(',', '', $this->request->input('latitude')),   // replace ',' character, can contain this character that damage script
                'longitude_170'                                 => str_replace(',', '', $this->request->input('longitude')),  // replace ',' character, can contain this character that damage script
                'booking_url_170'                               => $this->request->input('bookingUrl'),
                'country_chef_restaurant_170'                   => $this->request->has('countryChefRestaurant'),
                'country_chef_url_170'                          => $this->request->input('countryChefUrl'),
                'restaurant_name_170'                           => $this->request->input('restaurantName'),
                'restaurant_type_170'                           => $this->request->has('restaurantType')? $this->request->input('restaurantType') : null,
                'restaurant_terrace_170'                        => $this->request->has('restaurantTerrace'),
                'billing_name_170'                              => $this->request->input('billingName'),
                'billing_surname_170'                           => $this->request->input('billingSurname'),
                'billing_company_name_170'                      => $this->request->input('billingCompanyName'),
                'billing_tin_170'                               => $this->request->input('billingTin'),
                'billing_country_170'                           => $this->request->has('billingCountry')? $this->request->input('billingCountry') : null,
                'billing_territorial_area_1_170'                => $this->request->has('billingTerritorialArea1')? $this->request->input('billingTerritorialArea1') : null,
                'billing_territorial_area_2_170'                => $this->request->has('billingTerritorialArea2')? $this->request->input('billingTerritorialArea2') : null,
                'billing_territorial_area_3_170'                => $this->request->has('billingTerritorialArea3')? $this->request->input('billingTerritorialArea3') : null,
                'billing_cp_170'                                => $this->request->has('billingCp')? $this->request->input('billingCp') : null,
                'billing_locality_170'                          => $this->request->input('billingLocality'),
                'billing_address_170'                           => $this->request->input('billingAddress'),
                'billing_phone_170'                             => $this->request->input('billingPhone'),
                'billing_email_170'                             => $this->request->input('billingEmail'),
                'billing_iban_country_170'                      => $this->request->input('billingIbanCountry'),
                'billing_iban_check_digits_170'                 => $this->request->input('billingIbanCheckDigits'),
                'billing_iban_basic_bank_account_number_170'    => $this->request->input('billingIbanBasicBankAccountNumber'),
                'billing_bic_170'                               => $this->request->input('billingBic')
            ]);

            $id     = $hotel->id_170;
            $idLang = null;

            // publications
            if(is_array($this->request->input('published')))
                $hotel->getPublications()->sync($this->request->input('published'));

            // services
            if(is_array($this->request->input('services')))
                $hotel->getServices()->sync($this->request->input('services'));
        }
        else
        {
            // create hotel language
            $id     = $this->request->input('id');
            $idLang = $id;
        }

        Hotel::where('id_170', $id)->update([
            'data_lang_170'                 => Hotel::addLangDataRecord($this->request->input('lang'), $idLang)
        ]);

        HotelLang::create([
            'id_171'                        => $id,
            'lang_171'                      => $this->request->input('lang'),
            'cuisine_171'                   => $this->request->has('cuisine')? $this->request->input('cuisine') : null,
            'special_dish_171'              => $this->request->has('specialDish')? $this->request->input('specialDish') : null,
            'indications_171'               => $this->request->has('indications')? $this->request->input('indications') : null,
            'interest_points_171'           => $this->request->has('interestPoints')? $this->request->input('interestPoints') : null,
            'environment_description_171'   => $this->request->has('environmentDescription')? $this->request->input('environmentDescription') : null,
            'construction_171'              => $this->request->has('construction')? $this->request->input('construction') : null,
            'activities_171'                => $this->request->has('activities')? $this->request->input('activities') : null,
            'description_title_171'         => $this->request->has('descriptionTitle')? $this->request->input('descriptionTitle') : null,
            'description_171'               => $this->request->has('description')? $this->request->input('description') : null,
        ]);

        // set hotel products
        $hotelProducts = [];
        $products = json_decode($this->request->input('products'));
        foreach($products as $product)
        {
            $hotelProducts[] = [
                'hotel_177'         => $id,
                'product_177'       => $product,
                'lang_177'          => $this->request->input('lang'),
                'description_177'   => $this->request->input('d' . $product),
            ];
        }

        if(count($hotelProducts) > 0)
            HotelProduct::insert($hotelProducts);

        // set attachments
        $attachments = json_decode($this->request->input('attachments'));
        AttachmentLibrary::storeAttachments($attachments, $this->package, 'hotels-hotel', $id, $this->request->input('lang'));

        // set custom fields
        if(!empty($this->request->input('customFieldGroup')))
            CustomFieldResultLibrary::storeCustomFieldResults($this->request, $this->request->input('customFieldGroup'), 'hotels-hotel', $id, $this->request->input('lang'));
    }

    public function editCustomRecord($parameters)
    {
        $parameters['services']             = Service::where('lang_153', $parameters['lang']->id_001)->get();
        $parameters['environments']         = Environment::where('lang_150', $parameters['lang']->id_001)->get();
        $parameters['decorations']          = Decoration::where('lang_151', $parameters['lang']->id_001)->get();
        $parameters['relationships']        = Relationship::where('lang_152', $parameters['lang']->id_001)->get();
        $parameters['publications']         = Publication::all();
        $parameters['restaurantTypes']      = array_map(function($object){
            $object->name = trans($object->name);
            return $object;
        }, config('hotels.restaurantTypes'));

        // get attachments elements
        $attachments = AttachmentLibrary::getRecords($this->package, 'hotels-hotel', $parameters['object']->id_170, $parameters['lang']->id_001);

        $parameters['products']             = Product::builder()->where('active_111',true)->where('lang_112', $parameters['lang']->id_001)->get();

        // get attachments products with photo list
        $parameters['attachmentsProducts']  = Attachment::builder()
            ->where('lang_016', $parameters['lang']->id_001)
            ->where('resource_016', 'market-product')
            ->where('family_016', config('hotels.idAttachmentsFamily.productList'))
            ->get()
            ->keyBy('object_016');

        // merge parameters and attachments array
        $parameters['customFieldGroups']    = CustomFieldGroup::builder()->where('resource_025', 'hotels-hotel')->get();
        $parameters['attachmentFamilies']   = AttachmentFamily::getAttachmentFamilies(['resource_015' => 'hotels-hotel']);
        $parameters                         = array_merge($parameters, $attachments);

        // get hotel products
        $parameters['hotelProducts']        = $parameters['object']->getHotelProducts->keyBy('product_177');
        $parameters['hotelProductsIds']     = json_encode($parameters['hotelProducts']->keys()->map(function($item, $key) { return strval($item); }));

        return $parameters;
    }

    public function checkSpecialRulesToUpdate($parameters)
    {
        $hotel = Hotel::find($parameters['id']);

        $parameters['specialRules']['emailRule']    = $this->request->input('email') == $hotel->email_170? true : false;
        $parameters['specialRules']['userRule']     = $this->request->input('user') == $hotel->user_170? true : false;
        $parameters['specialRules']['passRule']     = $this->request->input('password') == ""? true : false;

        return $parameters;
    }

    public function updateCustomRecord($parameters)
    {
        $hotel = [
            'custom_field_group_170'                        => $this->request->has('customFieldGroup')? $this->request->input('customFieldGroup') : null,
            'name_170'                                      => $this->request->input('name'),
            'slug_170'                                      => $this->request->input('slug'),
            'web_170'                                       => $this->request->input('web'),
            'web_url_170'                                   => $this->request->input('webUrl'),
            'contact_170'                                   => $this->request->input('contact'),
            'email_170'                                     => $this->request->input('email'),
            'booking_email_170'                             => $this->request->input('bookingEmail'),
            'phone_170'                                     => $this->request->input('phone'),
            'mobile_170'                                    => $this->request->input('mobile'),
            'fax_170'                                       => $this->request->input('fax'),
            'environment_170'                               => $this->request->has('environment')? $this->request->input('environment') : null,
            'decoration_170'                                => $this->request->has('decoration')? $this->request->input('decoration') : null,
            'relationship_170'                              => $this->request->has('relationship')? $this->request->input('relationship') : null,
            'n_rooms_170'                                   => $this->request->input('nRooms'),
            'n_places_170'                                  => $this->request->input('nPlaces'),
            'n_events_rooms_170'                            => $this->request->input('nEventsRooms'),
            'n_events_rooms_places_170'                     => $this->request->input('nEventsRoomsPlaces'),
            'user_170'                                      => $this->request->input('user'),
            'active_170'                                    => $this->request->has('active'),
            'country_170'                                   => $this->request->input('country'),
            'territorial_area_1_170'                        => $this->request->has('territorialArea1')? $this->request->input('territorialArea1') : null,
            'territorial_area_2_170'                        => $this->request->has('territorialArea2')? $this->request->input('territorialArea2') : null,
            'territorial_area_3_170'                        => $this->request->has('territorialArea3')? $this->request->input('territorialArea3') : null,
            'cp_170'                                        => $this->request->has('cp')? $this->request->input('cp') : null,
            'locality_170'                                  => $this->request->input('locality'),
            'address_170'                                   => $this->request->input('address'),
            'latitude_170'                                  => str_replace(',', '', $this->request->input('latitude')),       // replace ',' character, can contain this character that damage script
            'longitude_170'                                 => str_replace(',', '', $this->request->input('longitude')),      // replace ',' character, can contain this character that damage script
            'booking_url_170'                               => $this->request->input('bookingUrl'),
            'country_chef_restaurant_170'                   => $this->request->has('countryChefRestaurant'),
            'country_chef_url_170'                          => $this->request->input('countryChefUrl'),
            'restaurant_name_170'                           => $this->request->input('restaurantName'),
            'restaurant_type_170'                           => $this->request->has('restaurantType')? $this->request->input('restaurantType') : null,
            'restaurant_terrace_170'                        => $this->request->has('restaurantTerrace'),
            'billing_name_170'                              => $this->request->input('billingName'),
            'billing_surname_170'                           => $this->request->input('billingSurname'),
            'billing_company_name_170'                      => $this->request->input('billingCompanyName'),
            'billing_tin_170'                               => $this->request->input('billingTin'),
            'billing_country_170'                           => $this->request->has('billingCountry')? $this->request->input('billingCountry') : null,
            'billing_territorial_area_1_170'                => $this->request->has('billingTerritorialArea1')? $this->request->input('billingTerritorialArea1') : null,
            'billing_territorial_area_2_170'                => $this->request->has('billingTerritorialArea2')? $this->request->input('billingTerritorialArea2') : null,
            'billing_territorial_area_3_170'                => $this->request->has('billingTerritorialArea3')? $this->request->input('billingTerritorialArea3') : null,
            'billing_cp_170'                                => $this->request->has('billingCp')? $this->request->input('billingCp') : null,
            'billing_locality_170'                          => $this->request->input('billingLocality'),
            'billing_address_170'                           => $this->request->input('billingAddress'),
            'billing_phone_170'                             => $this->request->input('billingPhone'),
            'billing_email_170'                             => $this->request->input('billingEmail'),
            'billing_iban_country_170'                      => $this->request->input('billingIbanCountry'),
            'billing_iban_check_digits_170'                 => $this->request->input('billingIbanCheckDigits'),
            'billing_iban_basic_bank_account_number_170'    => $this->request->input('billingIbanBasicBankAccountNumber'),
            'billing_bic_170'                               => $this->request->input('billingBic')
        ];

        if($parameters['specialRules']['emailRule'])  $hotel['email_170']       = $this->request->input('email');
        if($parameters['specialRules']['userRule'])   $hotel['user_170']        = $this->request->input('user');
        if(!$parameters['specialRules']['passRule'])  $hotel['password_170']    = Hash::make($this->request->input('password'));

        Hotel::where('id_170', $parameters['id'])->update($hotel);

        $hotel = Hotel::find($parameters['id']);

        // publications
        if(is_array($this->request->input('published')))
        {
            $hotel->getPublications()->sync($this->request->input('published'));
        }
        else
        {
            $hotel->getPublications()->detach();
        }

        // services
        if(is_array($this->request->input('services')))
        {
            $hotel->getServices()->sync($this->request->input('services'));
        }
        else
        {
            $hotel->getServices()->detach();
        }

        HotelLang::where('id_171', $parameters['id'])->where('lang_171', $this->request->input('lang'))->update([
            'cuisine_171'                   => $this->request->has('cuisine')? $this->request->input('cuisine') : null,
            'special_dish_171'              => $this->request->has('specialDish')? $this->request->input('specialDish') : null,
            'indications_171'               => $this->request->has('indications')? $this->request->input('indications') : null,
            'interest_points_171'           => $this->request->has('interestPoints')? $this->request->input('interestPoints') : null,
            'environment_description_171'   => $this->request->has('environmentDescription')? $this->request->input('environmentDescription') : null,
            'construction_171'              => $this->request->has('construction')? $this->request->input('construction') : null,
            'activities_171'                => $this->request->has('activities')? $this->request->input('activities') : null,
            'description_title_171'         => $this->request->has('descriptionTitle')? $this->request->input('descriptionTitle') : null,
            'description_171'               => $this->request->has('description')? $this->request->input('description') : null,
        ]);

        // set hotel products
        HotelProduct::where('hotel_177', $parameters['id'])->where('lang_177', $this->request->input('lang'))->delete();
        $hotelProducts = [];
        $products = json_decode($this->request->input('products'));

        foreach($products as $product)
        {
            $hotelProducts[] = [
                'hotel_177'         => $parameters['id'],
                'product_177'       => $product,
                'lang_177'          => $this->request->input('lang'),
                'description_177'   => $this->request->input('d' . $product),
            ];
        }

        if(count($hotelProducts) > 0)
            HotelProduct::insert($hotelProducts);

        // set custom fields
        if(!empty($this->request->input('customFieldGroup')))
        {
            CustomFieldResultLibrary::deleteCustomFieldResults('hotels-hotel', $parameters['id'], $this->request->input('lang'));
            CustomFieldResultLibrary::storeCustomFieldResults($this->request, $this->request->input('customFieldGroup'), 'hotels-hotel', $parameters['id'], $this->request->input('lang'));
        }
    }

    public function deleteCustomRecord($object)
    {
        // delete all attachments
        AttachmentLibrary::deleteAttachment($this->package, 'hotels-hotel', $object->id_170);
    }

    public function deleteCustomTranslationRecord($object)
    {
        // delete all attachments from lang object
        AttachmentLibrary::deleteAttachment($this->package, 'hotels-hotel', $object->id_171, $object->lang_171);
    }

    public function deleteCustomRecordsSelect($ids)
    {
        foreach($ids as $id)
        {
            AttachmentLibrary::deleteAttachment($this->package, 'hotels-hotel', $id);
        }
    }

    public function apiCheckSlug()
    {
        return response()->json([
            'status'    => 'success',
            'slug'      => Hotel::checkSlug('slug_170', $this->request->input('slug'), $this->request->input('id'))
        ]);
    }
}