<?php

namespace Botble\RealEstate\Models;

use Botble\RealEstate\Models\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyReplacement extends Model
{
    use HasFactory;

    protected $table = 're_property_replacements';

    public function property()
    {
        return $this->hasMany(Property::class);
    }
}
