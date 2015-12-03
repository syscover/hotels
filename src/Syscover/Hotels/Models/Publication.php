<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class Publication
 *
 * Model with properties
 * <br><b>[id, name]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class Publication extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '007_174_publication';
    protected $primaryKey   = 'id_174';
    public $timestamps      = false;
    protected $fillable     = ['id_174', 'name_174'];
    protected $maps         = [];
    protected $relationMaps = [];
    private static $rules   = [
        'name'    =>  'required|between:2,50'
    ];
        
    public static function validate($data, $specialRules = [])
    {
        return Validator::make($data, static::$rules);
	}
}