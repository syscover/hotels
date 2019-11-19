<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Hotel
 *
 * Model with properties
 * <br><b>[id, field_group_id, name, slug, web, web_url, contact, email, phone, mobile, fax, environment, decoration, relationship, n_rooms, n_places, n_events_rooms, n_events_rooms_places, user, password, active, country_id, territorial_area_1_id, territorial_area_2_id, territorial_area_3_id, cp, locality, address, latitude, longitude, booking_data, booking_email, country_chef_restaurant, country_chef_url, restaurant_name, restaurant_terrace, restaurant_type_id, billing_name, billing_surname, billing_company_name, billing_tin, billing_country_id, billing_territorial_area_1_id, billing_territorial_area_2_id, billing_territorial_area_3_id, billing_cp, billing_locality, billing_address, billing_phone, billing_email, billing_iban_country, billing_iban_check_digits, billing_iban_basic_bank_account_number, billing_bic, data_lang, data, map_url]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class Hotel extends Model
{
    use Eloquence, Mappable;

	protected $table        = '007_170_hotel';
    protected $primaryKey   = 'id_170';
    protected $suffix       = '170';
    public $timestamps      = false;
    protected $fillable     = ['id_170', 'field_group_id_170', 'name_170', 'slug_170', 'web_170', 'web_url_170', 'contact_170', 'email_170', 'phone_170', 'mobile_170', 'fax_170', 'environment_170', 'decoration_170', 'relationship_170', 'n_rooms_170', 'n_places_170', 'n_events_rooms_170', 'n_events_rooms_places_170', 'user_170', 'password_170', 'active_170', 'country_id_170', 'territorial_area_1_id_170', 'territorial_area_2_id_170', 'territorial_area_3_id_170', 'cp_170', 'locality_170', 'address_170', 'latitude_170', 'longitude_170', 'booking_data_170', 'booking_email_170', 'country_chef_restaurant_170', 'country_chef_url_170', 'restaurant_name_170', 'restaurant_terrace_170', 'restaurant_type_id_170', 'billing_name_170', 'billing_surname_170', 'billing_company_name_170', 'billing_tin_170', 'billing_country_id_170', 'billing_territorial_area_1_id_170', 'billing_territorial_area_2_id_170', 'billing_territorial_area_3_id_170', 'billing_cp_170', 'billing_locality_170', 'billing_address_170', 'billing_phone_170', 'billing_email_170', 'billing_iban_country_170', 'billing_iban_check_digits_170', 'billing_iban_basic_bank_account_number_170', 'billing_bic_170', 'data_lang_170', 'data_170', 'map_url_170 '];
    protected $maps         = [];
    protected $relationMaps = [
        'lang'          => \Syscover\Pulsar\Models\Lang::class,
        'hotel_lang'    => \Syscover\Hotels\Models\HotelLang::class,
        'country'       => \Syscover\Pulsar\Models\Country::class
    ];
    private static $rules   = [
        'name'      => 'required|between:2,100',
        'email'     => 'required|between:2,50|email|unique:mysql2.007_170_hotel,email_170',
        'user'      => 'required|between:2,50|unique:mysql2.007_170_hotel,user_170',
        'password'  => 'required|between:4,50|same:repassword'
    ];

    public static function validate($data, $specialRules = [])
    {
        if(isset($specialRules['emailRule']) && $specialRules['emailRule']) static::$rules['email'] = 'required|between:2,50|email';
        if(isset($specialRules['userRule']) && $specialRules['userRule']) static::$rules['user'] = 'required|between:2,50';
        if(isset($specialRules['passRule']) && $specialRules['passRule']) static::$rules['password'] = '';

        return Validator::make($data, static::$rules);
	}

    /**
     * @param   \Sofa\Eloquence\Builder     $query
     * @return  mixed
     */
    public function scopeBuilder($query)
    {
        return $query->join('007_171_hotel_lang', '007_170_hotel.id_170', '=', '007_171_hotel_lang.id_171')
            ->join('001_001_lang', '007_171_hotel_lang.lang_id_171', '=', '001_001_lang.id_001')
            ->join('001_002_country', function ($join) {
                $join->on('007_170_hotel.country_id_170', '=', '001_002_country.id_002')
                    ->on('001_002_country.lang_id_002', '=', '001_001_lang.id_001');
            })
            ->leftJoin('001_003_territorial_area_1', '007_170_hotel.territorial_area_1_id_170', '=', '001_003_territorial_area_1.id_003')
            ->leftJoin('001_004_territorial_area_2', '007_170_hotel.territorial_area_2_id_170', '=', '001_004_territorial_area_2.id_004')
            ->leftJoin('007_150_environment', function($join){
                $join->on('007_170_hotel.environment_170', '=', '007_150_environment.id_150')
                    ->on('007_150_environment.lang_id_150', '=', '007_171_hotel_lang.lang_id_171');
            })
            ->leftJoin('007_151_decoration', function($join){
                $join->on('007_170_hotel.decoration_170', '=', '007_151_decoration.id_151')
                    ->on('007_151_decoration.lang_id_151', '=', '007_171_hotel_lang.lang_id_171');
            })
            ->leftJoin('007_152_relationship', function($join){
                $join->on('007_170_hotel.relationship_170', '=', '007_152_relationship.id_152')
                    ->on('007_152_relationship.lang_id_152', '=', '007_171_hotel_lang.lang_id_171');
            });
    }

    /**
     * @param   \Sofa\Eloquence\Builder   $query
     * @param   array                     $publications
     * @return  mixed
     */
    public function scopePublishedOn($query, $publications)
    {
        return $query->whereIn('id_170', function($query) use ($publications) {
            $query->select('hotel_id_175')
                ->from('007_175_hotels_publications')
                ->whereIn('publication_id_175', $publications);
        });
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_id_171');
    }

    public function getPublications()
    {
        return $this->belongsToMany('Syscover\Hotels\Models\Publication', '007_175_hotels_publications', 'hotel_id_175', 'publication_id_175');
    }

    public function getServices()
    {
        return $this->belongsToMany('Syscover\Hotels\Models\Service', '007_176_hotels_services', 'hotel_id_176', 'service_id_176');
    }

    public function getHotelProducts()
    {
        return $this->hasMany('Syscover\Hotels\Models\HotelProduct', 'hotel_id_177')
            ->where('007_177_hotels_products.lang_id_177', $this->lang_id_171);
    }

    public function getProducts()
    {
        return $this->belongsToMany('Syscover\Market\Old\Models\Product', '007_177_hotels_products', 'hotel_id_177', 'product_id_177');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        $query =  $this->builder();

        if(isset($parameters['lang'])) $query->where('lang_id_171', $parameters['lang']);

        return $query;
    }

    public static function getTranslationRecord($parameters)
    {
        return Hotel::join('007_171_hotel_lang', '007_170_hotel.id_170', '=', '007_171_hotel_lang.id_171')
            ->join('001_001_lang', '007_171_hotel_lang.lang_id_171', '=', '001_001_lang.id_001')
            ->where('id_170', $parameters['id'])->where('lang_id_171', $parameters['lang'])
            ->first();
    }

    public static function getRecords($parameters)
    {
        $query = Hotel::builder();

        if(isset($parameters['slug_170'])) $query->where('slug_170', $parameters['slug_170']);
        if(isset($parameters['lang_id_171'])) $query->where('lang_id_171', $parameters['lang_id_171']);
        if(isset($parameters['territorial_area_1_id_170'])) $query->where('territorial_area_1_id_170', $parameters['territorial_area_1_id_170']);

        if(isset($parameters['publication_id_175'])) $query->whereIn('id_170', function($query) use ($parameters) {
            $query->select('hotel_id_175')
                ->from('007_175_hotels_publications')
                ->whereIn('publication_id_175', $parameters['publication_id_175']);
        });

        if(isset($parameters['active_170'])) $query->where('active_170', true);

        return $query->get();
    }
}