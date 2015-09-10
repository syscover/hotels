<?php namespace Syscover\Hotels\Controllers;

/**
 * @package	    Hotels
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
use Syscover\Hotels\Models\Service;

class ServiceController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'HotelsService';
    protected $folder       = 'services';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_153', 'name_001', 'name_153'];
    protected $nameM        = 'name_153';
    protected $model        = '\Syscover\Hotels\Models\Service';
    protected $icon         = 'icomoon-icon-wand-2';
    protected $objectTrans  = 'service';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang');

        return $parameters;
    }

    public function storeCustomRecord()
    {
        // check if there is id
        if(Request::has('id'))
        {
            $id = Request::get('id');
        }
        else
        {
            $id = Service::max('id_153');
            $id++;
        }

        Service::create([
            'id_153'        => $id,
            'lang_153'      => Request::input('lang'),
            'name_153'      => Request::input('name'),
            'data_lang_153' => Service::addLangDataRecord($id, Request::input('lang'))
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        Service::where('id_153', $parameters['id'])->where('lang_153', Request::input('lang'))->update([
            'name_153'  => Request::input('name')
        ]);
    }
}