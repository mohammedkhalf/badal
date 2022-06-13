<?php

namespace Botble\RealEstate\Models;

use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature2 extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * 
     * @var string
     */
    protected $table = 're_features2';

    /**
     * @var bool disable timestamp
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'icon',
    ];

    /**
     * @return BelongsToMany
     */
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 're_property_features2', 'feature_id', 'property_id');
    }
}
