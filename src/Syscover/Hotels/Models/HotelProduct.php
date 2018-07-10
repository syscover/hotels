<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class HotelProduct
 *
 * Model with properties
 * <br><b>[hotel_id, product_id, lang_id, description]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class HotelProduct extends Model
{
    use Eloquence, Mappable;

	protected $table        = '007_177_hotels_products';
    protected $primaryKey   = 'hotel_id_177';
    protected $suffix        = '177';
    public $timestamps      = false;
    protected $fillable     = ['hotel_id_177', 'product_id_177', 'lang_id_177', 'description_177'];
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
        return $query
            ->join('001_001_lang', '007_177_hotels_products.lang_id_177', '=', '001_001_lang.id_001')
            ->join('007_170_hotel', '007_177_hotels_products.hotel_id_177', '=', '007_170_hotel.id_170');
    }

    public static function getRecords($parameters)
    {
        $query = HotelProduct::builder();

        if(isset($parameters['hotel_id_177'])) $query->where('hotel_id_177', $parameters['hotel_id_177']);
        if(isset($parameters['lang_id_177'])) $query->where('lang_id_177', $parameters['lang_id_177']);

        return $query->get();
    }
}