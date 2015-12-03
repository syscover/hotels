<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Relationship
 *
 * Model with properties
 * <br><b>[id, lang, name, icon, data_lang, data]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class Relationship extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '007_152_relationship';
    protected $primaryKey   = 'id_152';
    protected $suffix        = '152';
    public $timestamps      = false;
    protected $fillable     = ['id_152', 'lang_152', 'name_152', 'data_lang_152', 'data_152'];
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
        return $query->join('001_001_lang', '007_152_relationship.lang_152', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_152');
    }

    public static function addToGetRecordsLimit($parameters)
    {
        $query =  Relationship::builder();

        if(isset($parameters['lang'])) $query->where('lang_152', $parameters['lang']);

        return $query;
    }
}