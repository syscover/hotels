<?php namespace Syscover\Hotels\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Publication;

/**
 * Class PublicationController
 * @package Syscover\Hotels\Controllers
 */

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

