<?php namespace Syscover\Hotels\Controllers;

use Syscover\Pulsar\Core\Controller;
use Syscover\Hotels\Models\Environment;

/**
 * Class EnvironmentController
 * @package Syscover\Hotels\Controllers
 */

class EnvironmentController extends Controller
{
    protected $routeSuffix  = 'hotelsEnvironment';
    protected $folder       = 'environment';
    protected $package      = 'hotels';
    protected $indexColumns = ['id_150', 'name_001', 'name_150'];
    protected $nameM        = 'name_150';
    protected $model        = Environment::class;
    protected $icon         = 'fa fa-picture-o';
    protected $objectTrans  = 'environment';

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
            $id     = $this->request->input('id');
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
            'lang_id_150'   => $this->request->input('lang'),
            'name_150'      => $this->request->input('name'),
            'data_lang_150' => Environment::addLangDataRecord($this->request->input('lang'), $idLang)
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        Environment::where('id_150', $parameters['id'])->where('lang_id_150', $this->request->input('lang'))->update([
            'name_150'  => $this->request->input('name')
        ]);
    }
}