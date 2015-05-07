<?php namespace Syscover\Hotels\Models;

/**
 * @package	    Pulsar
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\ModelTrait;

class Relationship extends Model {

    use ModelTrait;

	protected $table        = '007_152_relationship';
    protected $primaryKey   = 'id_152';
    protected $sufix        = '152';
    public $timestamps      = false;
    protected $fillable     = ['id_152', 'lang_152', 'name_152', 'data_152'];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function lang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_152');
    }

    public static function getCustomRecordsLimit($parameters)
    {
        $query =  Relationship::join('001_001_lang', '007_152_relationship.lang_152', '=', '001_001_lang.id_001')->newQuery();

        if(isset($parameters['lang'])) $query->where('lang_152', $parameters['lang']);

        return $query;
    }
}