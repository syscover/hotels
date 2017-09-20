<?php namespace Syscover\Hotels\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Hotels\Models\Decoration;

/**
 * Class DecorationController
 * @package Syscover\Hotels\Controllers
 */

class DecorationController extends Controller
{
    protected $routeSuffix  = 'hotelsDecoration';
    protected $folder       = 'decoration';
    protected $package      = 'hotels';
    protected $indexColumns = ['id_151', 'name_001', 'name_151'];
    protected $nameM        = 'name_151';
    protected $model        = Decoration::class;
    protected $icon         = 'icon-lightbulb';
    protected $objectTrans  = 'decoration';

    public function customIndex($parameters)
    {
        $parameters['urlParameters']['lang'] = base_lang2()->id_001;

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
            'lang_id_151'   => $this->request->input('lang'),
            'name_151'      => $this->request->input('name'),
            'data_lang_151' => Decoration::addLangDataRecord($this->request->input('lang'), $idLang)
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        Decoration::where('id_151', $parameters['id'])->where('lang_id_151', $this->request->input('lang'))->update([
            'name_151'  => $this->request->input('name')
        ]);
    }
}