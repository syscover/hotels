<?php namespace Syscover\Hotels\Controllers;

use Illuminate\Http\Request;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Service;

/**
 * Class ServiceController
 * @package Syscover\Hotels\Controllers
 */

class ServiceController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'HotelsService';
    protected $folder       = 'service';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_153', 'name_001', 'name_153', 'slug_153', 'icon_153'];
    protected $nameM        = 'name_153';
    protected $model        = '\Syscover\Hotels\Models\Service';
    protected $icon         = 'icomoon-icon-wand-2';
    protected $objectTrans  = 'service';

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
            $id = Service::max('id_153');
            $id++;
            $idLang = null;
        }

        Service::create([
            'id_153'        => $id,
            'lang_153'      => $request->input('lang'),
            'name_153'      => $request->input('name'),
            'slug_153'      => $request->input('slug'),
            'icon_153'      => $request->input('icon'),
            'data_lang_153' => Service::addLangDataRecord($request->input('lang'), $idLang)
        ]);
    }

    public function updateCustomRecord($request, $parameters)
    {
        Service::where('id_153', $parameters['id'])->where('lang_153', $request->input('lang'))->update([
            'name_153'  => $request->input('name'),
            'slug_153'  => $request->input('slug'),
            'icon_153'  => $request->input('icon')
        ]);
    }

    public function apiCheckSlug(Request $request)
    {
        $slug = $request->input('slug');

        $query = Service::where('lang_153', $request->input('lang'))
            ->where('slug_153', $slug);

        if($request->input('id'))
        {
            $query->whereNotIn('id_153', [$request->input('id')]);
        }

        $nObjects = $query->count();

        if($nObjects > 0)
        {
            $suffix = 0;
            while($nObjects > 0)
            {
                $suffix++;
                $slug = $request->input('slug') . '-' . $suffix;
                $nObjects = Service::where('lang_153', $request->input('lang'))
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