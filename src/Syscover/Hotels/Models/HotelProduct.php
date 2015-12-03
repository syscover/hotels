<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class HotelProduct
 *
 * Model with properties
 * <br><b>[hotel, product, lang, description]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class HotelProduct extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '007_177_hotels_products';
    protected $primaryKey   = 'hotel_177';
    protected $suffix        = '177';
    public $timestamps      = false;
    protected $fillable     = ['hotel_177', 'product_177', 'lang_177', 'description_177'];
    protected $maps         = [];
    protected $relationMaps = [
        'lang'  => \Syscover\Pulsar\Models\Lang::class
    ];
    private static $rules   = [];

    public static function validate($data, $specialRules = [])
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('001_001_lang', '007_177_hotels_products.lang_177', '=', '001_001_lang.id_001');
    }

    public static function getRecords($parameters)
    {
        $query = HotelProduct::builder();

        if(isset($parameters['hotel_177'])) $query->where('hotel_177', $parameters['hotel_177']);
        if(isset($parameters['lang_177'])) $query->where('lang_177', $parameters['lang_177']);

        return $query->get();
    }
}