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
use Syscover\Pulsar\Traits\ControllerTrait;
use Syscover\Hotels\Models\Relationship;

class Relationships extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'HotelsRelationship';
    protected $folder       = 'relationships';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_152', 'name_001', 'name_152'];
    protected $nameM        = 'name_152';
    protected $model        = '\Syscover\Hotels\Models\Relationship';
    protected $icon         = 'icon-group';
    protected $objectTrans  = 'relationship';

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
            $id = Relationship::max('id_152');
            $id++;
        }

        Relationship::create([
            'id_152'    => $id,
            'lang_152'  => Request::input('lang'),
            'name_152'  => Request::input('name'),
            'data_152'  => Relationship::addLangDataRecord($id, Request::input('lang'))
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        Relationship::where('id_152', $parameters['id'])->where('lang_152', Request::input('lang'))->update([
            'name_152'  => Request::input('name')
        ]);
    }
}