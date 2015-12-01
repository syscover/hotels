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

class HotelLang extends Model {

    use TraitModel;

	protected $table        = '007_171_hotel_lang';
    protected $primaryKey   = 'id_171';
    protected $suffix        = '171';
    public $timestamps      = false;
    protected $fillable     = ['id_171', 'lang_171', 'cuisine_171', 'special_dish_171', 'indications_171', 'interest_points_171', 'environment_description_171', 'construction_171', 'activities_171', 'description_title_171', 'description_171', 'data_171'];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function lang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_171');
    }
}