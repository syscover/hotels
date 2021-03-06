<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Relationship
 *
 * Model with properties
 * <br><b>[id, lang_id, name, icon, data_lang, data]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class Relationship extends Model
{
    use Eloquence, Mappable;

	protected $table        = '007_152_relationship';
    protected $primaryKey   = 'id_152';
    protected $suffix        = '152';
    public $timestamps      = false;
    protected $fillable     = ['id_152', 'lang_id_152', 'name_152', 'data_lang_152', 'data_152'];
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
        return $query->join('001_001_lang', '007_152_relationship.lang_id_152', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_id_152');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        $query = $this->builder();

        if(isset($parameters['lang'])) $query->where('lang_id_152', $parameters['lang']);

        return $query;
    }

    public static function customCount($request, $parameters)
    {
        return Relationship::where('lang_id_152', $parameters['lang'])->getQuery();
    }
}