<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Service
 *
 * Model with properties
 * <br><b>[id, lang_id, name, icon, data_lang, data]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class Service extends Model
{
    use Eloquence, Mappable;

	protected $table        = '007_153_service';
    protected $primaryKey   = 'id_153';
    protected $suffix       = '153';
    public $timestamps      = false;
    protected $fillable     = ['id_153', 'lang_id_153', 'name_153', 'slug_153', 'icon_153', 'data_lang_153', 'data_153'];
    protected $maps         = [];
    protected $relationMaps = [
        'lang'  => \Syscover\Pulsar\Models\Lang::class
    ];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('001_001_lang', '007_153_service.lang_id_153', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_id_153');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        $query =  $this->builder();

        if(isset($parameters['lang'])) $query->where('lang_id_153', $parameters['lang']);

        return $query;
    }

    public static function customCount($request, $parameters)
    {
        return Service::where('lang_id_153', $parameters['lang'])->getQuery();
    }
}