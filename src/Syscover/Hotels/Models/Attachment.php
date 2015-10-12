<?php namespace Syscover\Hotels\Models;

/**
 * @package	    Hotels
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

class Attachment extends Model {

    use TraitModel;

	protected $table        = '013_156_attachment';
    protected $primaryKey   = 'id_156';
    protected $sufix        = '156';
    public $timestamps      = false;
    public $incrementing    = false;
    protected $fillable     = ['id_156', 'lang_156', 'article_156', 'family_156', 'library_156', 'library_file_name_156', 'sorting_156', 'name_156', 'file_name_156', 'mime_156', 'size_156', 'type_156', 'type_text_156', 'width_156', 'height_156', 'data_lang_156', 'data_156'];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public static function getTranslationsAttachmentsArticle($parameters)
    {
        return Attachment::leftJoin('007_155_attachment_family', '013_156_attachment.family_156', '=', '007_155_attachment_family.id_155')
            ->where('lang_156', $parameters['lang'])
            ->where('article_156', $parameters['article'])
            ->orderBy('sorting_156')
            ->get();
    }

    public static function getCustomTranslationRecord($parameters)
    {
        return Attachment::leftJoin('007_155_attachment_family', '013_156_attachment.family_156', '=', '007_155_attachment_family.id_155')
            ->where('id_156', $parameters['id'])
            ->where('lang_156', $parameters['lang'])
            ->first();
    }
}