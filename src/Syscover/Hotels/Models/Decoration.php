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

class Decoration extends Model {

    use TraitModel;

	protected $table        = '007_151_decoration';
    protected $primaryKey   = 'id_151';
    protected $sufix        = '151';
    public $timestamps      = false;
    protected $fillable     = ['id_151', 'lang_151', 'name_151', 'data_lang_151', 'data_151'];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function lang()
    {
        return $this->belongsTo('Syscover\Pulsar\Models\Lang', 'lang_151');
    }

    public static function addToGetRecordsLimit($parameters)
    {
        $query =  Decoration::join('001_001_lang', '007_151_decoration.lang_151', '=', '001_001_lang.id_001')
            ->newQuery();

        if(isset($parameters['lang'])) $query->where('lang_151', $parameters['lang']);

        return $query;
    }
}