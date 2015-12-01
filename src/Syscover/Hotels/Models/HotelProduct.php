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

class HotelProduct extends Model {

    use TraitModel;

	protected $table        = '007_177_hotels_products';
    protected $primaryKey   = 'hotel_177';
    protected $suffix        = '177';
    public $timestamps      = false;
    protected $fillable     = ['hotel_177', 'product_177', 'lang_177', 'description_177'];
    private static $rules   = [];

    public static function validate($data, $specialRules = [])
    {
        return Validator::make($data, static::$rules);
	}

    public static function getRecords($parameters)
    {
        $query = HotelProduct::join('001_001_lang', '007_177_hotels_products.lang_177', '=', '001_001_lang.id_001')
            ->newQuery();

        if(isset($parameters['hotel_177'])) $query->where('hotel_177', $parameters['hotel_177']);
        if(isset($parameters['lang_177'])) $query->where('lang_177', $parameters['lang_177']);

        return $query->get();
    }
}