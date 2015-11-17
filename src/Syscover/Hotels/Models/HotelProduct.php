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
    protected $sufix        = '177';
    public $timestamps      = false;
    protected $fillable     = ['hotel_177', 'product_177', 'lang_177', 'description_177'];
    private static $rules   = [];

    public static function validate($data, $specialRules = [])
    {
        return Validator::make($data, static::$rules);
	}
}