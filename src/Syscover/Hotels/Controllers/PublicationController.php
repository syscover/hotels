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

    protected $routeSuffix  = 'hotelsPublication';
    protected $folder       = 'publication';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_174', 'name_174'];
    protected $nameM        = 'name_174';
    protected $model        = Publication::class;
    protected $icon         = 'fa fa-object-ungroup';
    protected $objectTrans  = 'publication';

    public function storeCustomRecord($parameters)
    {
        Publication::create([
            'name_174'      => $this->request->input('name')
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        Publication::where('id_174', $parameters['id'])->update([
            'name_174'      => $this->request->input('name')
        ]);
    }
}

