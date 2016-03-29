<?php namespace Syscover\Hotels\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Decoration;

/**
 * Class DecorationController
 * @package Syscover\Hotels\Controllers
 */

class DecorationController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'hotelsDecoration';
    protected $folder       = 'decoration';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_151', 'name_001', 'name_151'];
    protected $nameM        = 'name_151';
    protected $model        = Decoration::class;
    protected $icon         = 'icon-lightbulb';
    protected $objectTrans  = 'decoration';

    public function customIndex($parameters)
    {
        $parameters['urlParameters']['lang']    = session('baseLang')->id_001;

        return $parameters;
    }

    public function storeCustomRecord($parameters)
    {
        // check if there is id
        if($this->request->has('id'))
        {
            $id = $this->request->input('id');
            $idLang = $id;
        }
        else
        {
            $id = Decoration::max('id_151');
            $id++;
            $idLang = null;
        }

        Decoration::create([
            'id_151'        => $id,
            'lang_151'      => $this->request->input('lang'),
            'name_151'      => $this->request->input('name'),
            'data_lang_151' => Decoration::addLangDataRecord($this->request->input('lang'), $idLang)
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        Decoration::where('id_151', $parameters['id'])->where('lang_151', $this->request->input('lang'))->update([
            'name_151'  => $this->request->input('name')
        ]);
    }
}