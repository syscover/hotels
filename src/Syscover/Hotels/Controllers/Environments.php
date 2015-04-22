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

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\ControllerTrait;
use Syscover\Pulsar\Models\Lang;
use Syscover\Hotels\Models\Environment;

class Environments extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'HotelsEnvironment';
    protected $folder       = 'environments';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_150', 'name_001', 'name_150'];
    protected $nameM        = 'name_150';
    protected $model        = '\Syscover\Hotels\Models\Environment';
    protected $icon         = 'icon-picture';
    protected $objectTrans  = 'environment';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = Session::get('baseLang');

        return $parameters;
    }

    public function createCustomRecord($parameters)
    {
        if(isset($parameters['id']))
        {
            $parameters['object'] = Environment::getTranslationRecord($parameters['id'], Session::get('baseLang')->id_001);
        }

        $parameters['lang'] = Lang::find($parameters['lang']);

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
            $id = Environment::max('id_150');
            $id++;
        }

        Environment::create([
            'id_150'    => $id,
            'lang_150'  => Request::input('lang'),
            'name_150'  => Request::input('name'),
            'data_150'  => Environment::addLangDataRecord($id, Request::input('lang'))
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['object']   = Environment::getTranslationRecord($parameters['id'], $parameters['lang']);
        $parameters['lang']     = $parameters['object']->lang;

        return $parameters;
    }

    public function updateCustomRecord($parameters)
    {
        Environment::where('id_150', $parameters['id'])->where('lang_150', Request::input('lang'))->update([
            'name_150'  => Request::input('name')
        ]);
    }
}