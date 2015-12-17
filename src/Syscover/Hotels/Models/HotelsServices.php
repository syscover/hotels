<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Models\Model;
use Illuminate\Support\Facades\Validator;
use Syscover\Pulsar\Traits\TraitModel;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

/**
 * Class HotelsServices
 *
 * Model with properties
 * <br><b>[hotel, service]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class HotelsServices extends Model {

    use TraitModel;
    use Eloquence, Mappable;

	protected $table        = '007_176_hotels_services';
    protected $primaryKey   = 'hotel_176';
    protected $suffix       = '176';
    public $timestamps      = false;
    protected $fillable     = ['hotel_176', 'service_176'];
    protected $maps         = [];
    protected $relationMaps = [
        'service'  => \Syscover\Hotels\Models\Service::class
    ];
    private static $rules   = [];

    public static function validate($data)
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->join('007_153_service', '007_176_hotels_services.service_176', '=', '007_153_service.id_153');
    }
}