<?php namespace Syscover\Hotels\Controllers;

use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Service;

/**
 * Class ServiceController
 * @package Syscover\Hotels\Controllers
 */

class ServiceController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'hotelsService';
    protected $folder       = 'service';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_153', 'name_001', 'name_153', 'slug_153', 'icon_153'];
    protected $nameM        = 'name_153';
    protected $model        = Service::class;
    protected $icon         = 'icomoon-icon-wand-2';
    protected $objectTrans  = 'service';

    public function indexCustom($parameters)
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
            $id = Service::max('id_153');
            $id++;
            $idLang = null;
        }

        Service::create([
            'id_153'        => $id,
            'lang_153'      => $this->request->input('lang'),
            'name_153'      => $this->request->input('name'),
            'slug_153'      => $this->request->input('slug'),
            'icon_153'      => $this->request->input('icon'),
            'data_lang_153' => Service::addLangDataRecord($this->request->input('lang'), $idLang)
        ]);
    }

    public function updateCustomRecord($parameters)
    {
        Service::where('id_153', $parameters['id'])->where('lang_153', $this->request->input('lang'))->update([
            'name_153'  => $this->request->input('name'),
            'slug_153'  => $this->request->input('slug'),
            'icon_153'  => $this->request->input('icon')
        ]);
    }

    public function apiCheckSlug()
    {
        $slug = $this->request->input('slug');

        $query = Service::where('lang_153', $this->request->input('lang'))
            ->where('slug_153', $slug);

        if($this->request->has('id'))
            $query->whereNotIn('id_153', [$this->request->input('id')]);

        $nObjects = $query->count();

        if($nObjects > 0)
        {
            $suffix = 0;
            while($nObjects > 0)
            {
                $suffix++;
                $slug = $this->request->input('slug') . '-' . $suffix;
                $nObjects = Service::where('lang_153', $this->request->input('lang'))
                    ->where('slug_153', $slug)
                    ->count();
            }
        }

        return response()->json([
            'status'    => 'success',
            'slug'      => $slug
        ]);
    }
}