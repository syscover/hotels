<?php namespace Syscover\Hotels\Models;

/**
 * @package	    Cms
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

class Library extends Model {

    use TraitModel;

	protected $table        = '013_154_library';
    protected $primaryKey   = 'id_154';
    protected $sufix        = '154';
    public $timestamps      = false;
    protected $fillable     = ['id_154', 'file_name_154', 'mime_154', 'size_154', 'type_154', 'type_text_154', 'width_154', 'height_154', 'data_154'];
    private static $rules   = [
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}