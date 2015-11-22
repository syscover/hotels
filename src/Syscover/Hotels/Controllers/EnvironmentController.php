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

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Environment;

class EnvironmentController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'HotelsEnvironment';
    protected $folder       = 'environment';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_150', 'name_001', 'name_150'];
    protected $nameM        = 'name_150';
    protected $model        = '\Syscover\Hotels\Models\Environment';
    protected $icon         = 'fa fa-picture-o';
    protected $objectTrans  = 'environment';

    public function indexCustom($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang');

        return $parameters;
    }

    public function storeCustomRecord($request, $parameters)
    {
        // check if there is id
        if($request->has('id'))
        {
            $id     = $request->input('id');
            $idLang = $id;
        }
        else
        {
            $id = Environment::max('id_150');
            $id++;
            $idLang = null;
        }

        Environment::create([
            'id_150'        => $id,
            'lang_150'      => $request->input('lang'),
            'name_150'      => $request->input('name'),
            'data_lang_150' => Environment::addLangDataRecord($request->input('lang'), $idLang)
        ]);
    }

    public function updateCustomRecord($request, $parameters)
    {
        Environment::where('id_150', $parameters['id'])->where('lang_150', $request->input('lang'))->update([
            'name_150'  => $request->input('name')
        ]);
    }
}