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
use Syscover\Hotels\Models\Decoration;

class Decorations extends Controller {

    use ControllerTrait;

    protected $routeSuffix  = 'HotelsDecoration';
    protected $folder       = 'decorations';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_151', 'name_001', 'name_151'];
    protected $nameM        = 'name_151';
    protected $model        = '\Syscover\Hotels\Models\Decoration';
    protected $icon         = 'icon-lightbulb';
    protected $objectTrans  = 'decoration';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = Session::get('baseLang');

        return $parameters;
    }

    public function createCustomRecord($parameters)
    {
        if(isset($parameters['id']))
        {
            $parameters['object'] = Decoration::getTranslationRecord($parameters['id'], Session::get('baseLang')->id_001);
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
            $id = Decoration::max('id_151');
            $id++;
        }

        Decoration::create([
            'id_151'    => $id,
            'lang_151'  => Request::input('lang'),
            'name_151'  => Request::input('name'),
            'data_151'  => Decoration::addLangDataRecord($id, Request::input('lang'))
        ]);
    }

    public function editCustomRecord($parameters)
    {
        $parameters['object']   = Decoration::getTranslationRecord($parameters['id'], $parameters['lang']);
        $parameters['lang']     = $parameters['object']->lang;

        return $parameters;
    }

    public function updateCustomRecord($parameters)
    {
        Decoration::where('id_151', $parameters['id'])->where('lang_151', Request::input('lang'))->update([
            'name_151'  => Request::input('name')
        ]);
    }
}