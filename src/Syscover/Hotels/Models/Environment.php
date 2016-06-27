<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Environment
 *
 * Model with properties
 * <br><b>[id, lang_id, name, icon, data_lang, data]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class Environment extends Model
{
    use Eloquence, Mappable;

	protected $table        = '007_150_environment';
    protected $primaryKey   = 'id_150';
    protected $suffix        = '150';
    public $timestamps      = false;
    protected $fillable     = ['id_150', 'lang_id_150', 'name_150', 'data_lang_150', 'data_150'];
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
        return $query->join('001_001_lang', '007_150_environment.lang_id_150', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_id_150');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        $query =  $this->builder();

        if(isset($parameters['lang'])) $query->where('lang_id_150', $parameters['lang']);

        return $query;
    }

    public static function customCount($request, $parameters)
    {
        return Environment::where('lang_id_150', $parameters['lang'])->getQuery();
    }
}