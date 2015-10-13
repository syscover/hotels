<?php namespace Syscover\Hotels\Controllers;

/**
 * @package	    Cms
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Support\Facades\Request;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\AttachmentFamily;

class AttachmentFamilyController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'HotelsAttachmentFamily';
    protected $folder       = 'attachment_family';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_155', 'name_155'];
    protected $nameM        = 'name_155';
    protected $model        = '\Syscover\Hotels\Models\AttachmentFamily';
    protected $icon         = 'fa fa-picture-o';
    protected $objectTrans  = 'attachment_family';

    public function storeCustomRecord()
    {
        AttachmentFamily::create([
            'name_155'      => Request::input('name'),
            'width_155'     => Request::has('width')? Request::input('width') : null,
            'height_155'    => Request::has('height')? Request::input('height') : null,
            'data_155'      => null
        ]);
    }
    
    public function updateCustomRecord($parameters)
    {
        AttachmentFamily::where('id_155', $parameters['id'])->update([
            'name_155'      => Request::input('name'),
            'width_155'     => Request::has('width')? Request::input('width') : null,
            'height_155'    => Request::has('height')? Request::input('height') : null,
            'data_155'      => null
        ]);
    }
}