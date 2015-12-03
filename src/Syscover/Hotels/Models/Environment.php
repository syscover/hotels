<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Environment
 *
 * Model with properties
 * <br><b>[id, lang, name, icon, data_lang, data]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class Environment extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '007_150_environment';
    protected $primaryKey   = 'id_150';
    protected $suffix        = '150';
    public $timestamps      = false;
    protected $fillable     = ['id_150', 'lang_150', 'name_150', 'data_lang_150', 'data_150'];
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
        return $query->join('001_001_lang', '007_150_environment.lang_150', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_150');
    }

    public static function addToGetRecordsLimit($parameters)
    {
        $query =  Environment::builder();

        if(isset($parameters['lang'])) $query->where('lang_150', $parameters['lang']);

        return $query;
    }
}