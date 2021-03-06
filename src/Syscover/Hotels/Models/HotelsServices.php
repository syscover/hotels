<?php namespace Syscover\Hotels\Models;

use Syscover\Pulsar\Core\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Illuminate\Support\Facades\Validator;

/**
 * Class HotelsServices
 *
 * Model with properties
 * <br><b>[hotel_id, service_id]</b>
 *
 * @package     Syscover\Hotels\Models
 */

class HotelsServices extends Model
{
    use Eloquence, Mappable;

	protected $table        = '007_176_hotels_services';
    protected $primaryKey   = 'hotel_id_176';
    protected $suffix       = '176';
    public $timestamps      = false;
    protected $fillable     = ['hotel_id_176', 'service_id_176'];
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
        return $query->join('007_153_service', '007_176_hotels_services.service_id_176', '=', '007_153_service.id_153');
    }
}