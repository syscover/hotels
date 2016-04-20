<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class HotelLang
 *
 * Model with properties
 * <br><b>[id, lang, cuisine, special_dish, indications, interest_points, environment_description, construction, activities, description_title, description]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class HotelLang extends Model
{
    use Eloquence, Mappable;

	protected $table        = '007_171_hotel_lang';
    protected $primaryKey   = 'id_171';
    protected $suffix       = '171';
    public $timestamps      = false;
    protected $fillable     = ['id_171', 'lang_171', 'cuisine_171', 'special_dish_171', 'indications_171', 'interest_points_171', 'environment_description_171', 'construction_171', 'activities_171', 'description_title_171', 'description_171'];
    protected $maps         = [];
    protected $relationMaps = [
        'lang'  => \Syscover\Pulsar\Models\Lang::class
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_171');
    }
}