<?php namespace Syscover\Hotels\Controllers;

/**
 * @package	    Pulsar
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Publication;

class PublicationController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'HotelsPublication';
    protected $folder       = 'publication';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_174', 'name_174'];
    protected $nameM        = 'name_174';
    protected $model        = '\Syscover\Hotels\Models\Publication';
    protected $icon         = 'fa fa-object-ungroup';
    protected $objectTrans  = 'publication';

    public function storeCustomRecord($request, $parameters)
    {
        Publication::create([
            'name_174'      => $request->input('name')
        ]);
    }

    public function updateCustomRecord($request, $parameters)
    {
        Publication::where('id_174', $parameters['id'])->update([
            'name_174'      => $request->input('name')
        ]);
    }
}

