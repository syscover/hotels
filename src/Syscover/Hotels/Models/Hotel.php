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
    //protected $tableLang    = '007_171_hotel';
    protected $primaryKey   = 'id_170';
    protected $sufix        = '170';
    public $timestamps      = false;
    protected $fillable     = ['id_170', 'name_170', 'web_170', 'contact_170', 'email_170', 'booking_email_170', 'phone_170', 'mobile_170', 'fax_170', 'n_rooms_170', 'n_places_170', 'n_events_rooms_170', 'n_places_events_rooms_170', 'country_170', 'territorial_area_1_170', 'territorial_area_2_170', 'territorial_area_3_170', 'cp_170', 'locality_170', 'address_170', 'latitude_170', 'longitude_170', 'url_booking_170', 'country_chef_url_170', 'restaurant_name_170', 'restaurant_terrace_170', 'restaurant_type_170', 'billing_name_170', 'billing_surname_170', 'billing_company_name_170', 'billing_tin_170', 'billing_country_170', 'billing_territorial_area_1_170', 'billing_territorial_area_2_170', 'billing_territorial_area_3_170', 'billing_cp_170', 'billing_locality_170', 'billing_address_170', 'billing_phone_170', 'billing_email_170', 'billing_iban_170', 'billing_swift_170', 'data_170'];
    private static $rules   = [
        'name'  => 'required|between:2,100'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function lang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_171');
    }
/*
    public static function getCustomRecordsLimit($parameters)
    {
        $query =  Service::join('001_001_lang', '007_153_service.lang_153', '=', '001_001_lang.id_001')->newQuery();

        if(isset($parameters['lang'])) $query->where('lang_153', $parameters['lang']);

        return $query;
    }
*/
}