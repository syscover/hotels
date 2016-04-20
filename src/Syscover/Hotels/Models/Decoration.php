<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class Decoration
 *
 * Model with properties
 * <br><b>[id, lang, name, icon, data_lang, data]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class Decoration extends Model
{
    use Eloquence, Mappable;

	protected $table        = '007_151_decoration';
    protected $primaryKey   = 'id_151';
    protected $suffix       = '151';
    public $timestamps      = false;
    protected $fillable     = ['id_151', 'lang_151', 'name_151', 'data_lang_151', 'data_151'];
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
        return $query->join('001_001_lang', '007_151_decoration.lang_151', '=', '001_001_lang.id_001');
    }

    public function getLang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_151');
    }

    public function addToGetIndexRecords($request, $parameters)
    {
        $query =  $this->builder();

        if(isset($parameters['lang'])) $query->where('lang_151', $parameters['lang']);

        return $query;
    }

    public static function customCount($request, $parameters)
    {
        return Decoration::where('lang_151', $parameters['lang'])->getQuery();
    }
}