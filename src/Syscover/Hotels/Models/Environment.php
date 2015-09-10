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
use Syscover\Pulsar\Traits\TraitModel;

class Environment extends Model {

    use TraitModel;

	protected $table        = '007_150_environment';
    protected $primaryKey   = 'id_150';
    protected $sufix        = '150';
    public $timestamps      = false;
    protected $fillable     = ['id_150', 'lang_150', 'name_150', 'data_lang_150', 'data_150'];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function lang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_150');
    }

    public static function getCustomRecordsLimit($parameters)
    {
        $query =  Environment::join('001_001_lang', '007_150_environment.lang_150', '=', '001_001_lang.id_001')->newQuery();

        if(isset($parameters['lang'])) $query->where('lang_150', $parameters['lang']);

        return $query;
    }
}