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

class AttachmentFamily extends Model {

    use TraitModel;

	protected $table        = '007_155_attachment_family';
    protected $primaryKey   = 'id_155';
    public $timestamps      = false;
    protected $fillable     = ['id_155', 'name_155', 'width_155', 'height_155', 'data_155'];
    private static $rules   = [
        'name'      => 'required|between:2,100',
        'width'     => 'numeric',
        'height'    => 'numeric'
    ];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}
}