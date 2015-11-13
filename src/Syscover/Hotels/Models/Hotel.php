<?php namespace Syscover\Hotels\Models;

/**
 * @package	    Pulsar
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;

class Hotel extends Model {

    use TraitModel;

	protected $table        = '007_170_hotel';
    protected $primaryKey   = 'id_170';
    protected $sufix        = '170';
    public $timestamps      = false;
    protected $fillable     = ['id_170', 'name_170', 'slug_170', 'web_170', 'web_url_170', 'contact_170', 'email_170', 'phone_170', 'mobile_170', 'fax_170', 'environment_170', 'decoration_170', 'relationship_170', 'n_rooms_170', 'n_places_170', 'n_events_rooms_170', 'n_events_rooms_places_170', 'user_170', 'password_170', 'active_170', 'country_170', 'territorial_area_1_170', 'territorial_area_2_170', 'territorial_area_3_170', 'cp_170', 'locality_170', 'address_170', 'latitude_170', 'longitude_170', 'booking_url_170', 'booking_email_170', 'country_chef_restaurant_170', 'country_chef_url_170', 'restaurant_name_170', 'restaurant_terrace_170', 'restaurant_type_170', 'billing_name_170', 'billing_surname_170', 'billing_company_name_170', 'billing_tin_170', 'billing_country_170', 'billing_territorial_area_1_170', 'billing_territorial_area_2_170', 'billing_territorial_area_3_170', 'billing_cp_170', 'billing_locality_170', 'billing_address_170', 'billing_phone_170', 'billing_email_170', 'billing_iban_country_170', 'billing_iban_check_digits_170', 'billing_iban_basic_bank_account_number_170', 'billing_bic_170', 'data_lang_170', 'data_170'];
    private static $rules   = [
        'name'      => 'required|between:2,100',
        'email'     => 'required|between:2,50|email|unique:007_170_hotel,email_170',
        'user'      => 'required|between:2,50|unique:007_170_hotel,user_170',
        'password'  => 'required|between:4,50|same:repassword'
    ];

    public static function validate($data, $specialRules = [])
    {
        if(isset($specialRules['emailRule']) && $specialRules['emailRule']) static::$rules['email'] = 'required|between:2,50|email';
        if(isset($specialRules['userRule']) && $specialRules['userRule']) static::$rules['user'] = 'required|between:2,50';
        if(isset($specialRules['passRule']) && $specialRules['passRule']) static::$rules['password'] = '';

        return Validator::make($data, static::$rules);
	}

    public function publications()
    {
        return $this->belongsToMany('Syscover\Hotels\Models\Publication', '007_175_hotels_publications', 'hotel_175', 'publication_175');
    }

    public function services()
    {
        return $this->belongsToMany('Syscover\Hotels\Models\Service', '007_176_hotels_services', 'hotel_176', 'service_176');
    }

    public static function getCustomRecordsLimit($parameters)
    {
        $query =  Hotel::join('007_171_hotel_lang', '007_170_hotel.id_170', '=', '007_171_hotel_lang.id_171')
            ->join('001_001_lang', '007_171_hotel_lang.lang_171', '=', '001_001_lang.id_001')
            ->join('001_002_country', function ($join) {
                $join->on('007_170_hotel.country_170', '=', '001_002_country.id_002')
                ->on('001_002_country.lang_002', '=', '001_001_lang.id_001');
            })
            ->leftJoin('001_003_territorial_area_1', '007_170_hotel.territorial_area_1_170', '=', '001_003_territorial_area_1.id_003')
            ->newQuery();

        if(isset($parameters['lang'])) $query->where('lang_171', $parameters['lang']);

        return $query;
    }

    public static function getCustomTranslationRecord($parameters)
    {
        return Hotel::join('007_171_hotel_lang', '007_170_hotel.id_170', '=', '007_171_hotel_lang.id_171')
            ->join('001_001_lang', '007_171_hotel_lang.lang_171', '=', '001_001_lang.id_001')
            ->where('id_170', $parameters['id'])->where('lang_171', $parameters['lang'])
            ->first();
    }

    public static function getRecords($parameters)
    {
        $query = Hotel::join('007_171_hotel_lang', '007_170_hotel.id_170', '=', '007_171_hotel_lang.id_171')
            ->join('001_001_lang', '007_171_hotel_lang.lang_171', '=', '001_001_lang.id_001')
            ->join('001_002_country', function($join){
                $join->on('007_170_hotel.country_170', '=', '001_002_country.id_002')
                    ->on('001_002_country.lang_002', '=', '007_171_hotel_lang.lang_171');
            })
            ->leftJoin('007_150_environment', function($join){
                $join->on('007_170_hotel.environment_170', '=', '007_150_environment.id_150')
                    ->on('007_150_environment.lang_150', '=', '007_171_hotel_lang.lang_171');
            })
            ->leftJoin('007_151_decoration', function($join){
                $join->on('007_170_hotel.decoration_170', '=', '007_151_decoration.id_151')
                    ->on('007_151_decoration.lang_151', '=', '007_171_hotel_lang.lang_171');
            })
            ->leftJoin('007_152_relationship', function($join){
                $join->on('007_170_hotel.relationship_170', '=', '007_152_relationship.id_152')
                    ->on('007_152_relationship.lang_152', '=', '007_171_hotel_lang.lang_171');
            })
            ->newQuery();

        if(isset($parameters['slug_170'])) $query->where('slug_170', $parameters['slug_170']);
        if(isset($parameters['lang_171'])) $query->where('lang_171', $parameters['lang_171']);
        if(isset($parameters['territorial_area_1_170'])) $query->where('territorial_area_1_170', $parameters['territorial_area_1_170']);

        if(isset($parameters['publication_175'])) $query->whereIn('id_170', function($query) use ($parameters) {
            $query->select('hotel_175')
                ->from('007_175_hotels_publications')
                ->whereIn('publication_175', $parameters['publication_175']);
        });

        if(isset($parameters['active_170'])) $query->where('active_170', true);

        return $query->get();
    }
}