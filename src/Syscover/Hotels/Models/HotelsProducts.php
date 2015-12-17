<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class HotelsProducts
 *
 * Model with properties
 * <br><b>[hotel, product, lang]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class HotelsProducts extends Model
{
    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '007_177_hotels_products';
    protected $primaryKey   = 'hotel_177';
    protected $suffix       = '177';
    public $timestamps      = false;
    protected $fillable     = ['hotel_177', 'product_177', 'lang_177', 'description_177'];
    protected $maps         = [];
    protected $relationMaps = [
        'service'  => \Syscover\Market\Models\Product::class,
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('012_111_product', '007_177_hotels_products.product_177', '=', '012_111_product.id_111');
    }
}