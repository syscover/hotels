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
use Syscover\Hotels\Models\Relationship;

class RelationshipController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'HotelsRelationship';
    protected $folder       = 'relationship';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_152', 'name_001', 'name_152'];
    protected $nameM        = 'name_152';
    protected $model        = '\Syscover\Hotels\Models\Relationship';
    protected $icon         = 'fa fa-group';
    protected $objectTrans  = 'relationship';

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
            $id = Relationship::max('id_152');
            $id++;
            $idLang = null;
        }

        Relationship::create([
            'id_152'        => $id,
            'lang_152'      => $request->input('lang'),
            'name_152'      => $request->input('name'),
            'data_lang_152' => Relationship::addLangDataRecord($request->input('lang'), $idLang)
        ]);
    }

    public function updateCustomRecord($request, $parameters)
    {
        Relationship::where('id_152', $parameters['id'])->where('lang_152', $request->input('lang'))->update([
            'name_152'  => $request->input('name')
        ]);
    }
}