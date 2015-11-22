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

class Service extends Model {

    use TraitModel;

	protected $table        = '007_153_service';
    protected $primaryKey   = 'id_153';
    protected $sufix        = '153';
    public $timestamps      = false;
    protected $fillable     = ['id_153', 'lang_153', 'name_153', 'icon_153', 'data_lang_153', 'data_153'];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function lang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_153');
    }

    public static function addToGetRecordsLimit($parameters)
    {
        $query =  Service::join('001_001_lang', '007_153_service.lang_153', '=', '001_001_lang.id_001')->newQuery();

        if(isset($parameters['lang'])) $query->where('lang_153', $parameters['lang']);

        return $query;
    }
}