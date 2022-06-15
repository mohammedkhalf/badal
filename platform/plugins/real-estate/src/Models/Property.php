<?php

namespace Botble\RealEstate\Models;

use Botble\Base\Models\BaseModel;
use Botble\Base\Traits\EnumCastable;
use Botble\Location\Models\City;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Enums\PropertyPeriodEnum;
use Botble\RealEstate\Enums\PropertyTypeEnum;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Arr;
use RvMedia;
use Illuminate\Support\Str;

class Property extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 're_properties';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'description',
        'content',
        'location',
        'images',
        'number_bedroom',
        'number_bathroom',
        'number_floor',
        'number_floor2',
        'number_floor3',
        'number_floor4',
        'number_floor5',
        'number_floor6',
        'square',
        'price',
        'is_featured',
        'is_featured2',
        'is_featured3',
        'is_featured4',
        'is_featured5',
        'is_featured6',
        'currency_id',
        'city_id',
        'period',
        'author_id',
        'author_type',
        'category_id',
        'expire_date',
        'auto_renew',
        'latitude',
        'longitude',
        'coords_map',
        'type_id',
        'replacement_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'moderation_status' => ModerationStatusEnum::class,
        'period'            => PropertyPeriodEnum::class,
    ];

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'expire_date',
    ];

    /**
     * @return BelongsToMany
     */
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 're_property_features', 'property_id', 'feature_id');
    }

    public function features2(): BelongsToMany
    {
        return $this->belongsToMany(Feature2::class, 're_property_features2', 'property_id', 'feature_id');
    }

    public function features3(): BelongsToMany
    {
        return $this->belongsToMany(Feature3::class, 're_property_features3', 'property_id', 'feature_id');
    }
    public function features4(): BelongsToMany
    {
        return $this->belongsToMany(Feature4::class, 're_property_features4', 'property_id', 'feature_id');
    }
    public function features5(): BelongsToMany
    {
        return $this->belongsToMany(Feature5::class, 're_property_features5', 'property_id', 'feature_id');
    }
    public function features6(): BelongsToMany
    {
        return $this->belongsToMany(Feature6::class, 're_property_features6', 'property_id', 'feature_id');
    }
    public function features7(): BelongsToMany
    {
        return $this->belongsToMany(Feature7::class, 're_property_features7', 'property_id', 'feature_id');
    }
    public function features8(): BelongsToMany
    {
        return $this->belongsToMany(Feature8::class, 're_property_features8', 'property_id', 'feature_id');
    }
    public function features9(): BelongsToMany
    {
        return $this->belongsToMany(Feature9::class, 're_property_features9', 'property_id', 'feature_id');
    }
    public function features10(): BelongsToMany
    {
        return $this->belongsToMany(Feature10::class, 're_property_features10', 'property_id', 'feature_id');
    }
    public function features11(): BelongsToMany
    {
        return $this->belongsToMany(Feature11::class, 're_property_features11', 'property_id', 'feature_id');
    }
    /**
     * @return BelongsToMany
     */
    public function facilities(): BelongsToMany
    {
        return $this->morphToMany(Facility::class, 'reference', 're_facilities_distances')->withPivot('distance');
    }

    /**
     * @param string $value
     * @return array
     */
    public function getImagesAttribute($value)
    {
        try {
            if ($value === '[null]') {
                return [];
            }

            $images = json_decode((string)$value, true);

            if (is_array($images)) {
                $images = array_filter($images);
            }

            return $images ?: [];
        } catch (Exception $exception) {
            return [];
        }
    }

    /**
     * @return string|null
     */
    public function getImageAttribute(): ?string
    {
        return Arr::first($this->images) ?? null;
    }

    /**
     * @return string
     */
    public function getSquareTextAttribute()
    {
        return $this->square . ' ' . setting('real_estate_square_unit', 'm²');
    }

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class)->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class)->withDefault();
    }

    /**
     * @return MorphTo
     */
    public function author(): MorphTo
    {
        return $this->morphTo()->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id')->withDefault();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNotExpired($query)
    {
        return $query->where(function ($query) {
            $query->where('expire_date', '>=', now()->toDateTimeString())
                ->orWhere('never_expired', true);
        });
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpired($query)
    {
        return $query->where(function ($query) {
            $query->where('expire_date', '<', now()->toDateTimeString())
                ->where('never_expired', false);
        });
    }

    
    /**
     * @return string
     */
    public function getCityNameAttribute()
    {
        return $this->city->name . ', ' . $this->city->state->name;
    }

    /**
     * @return string
     */
    public function getTypeNameAttribute()
    {
        return $this->type->name;
    }

    /**
     * @return string
     */
    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    /**
     * @return string|null
     */
    public function getImageThumbAttribute()
    {
        return $this->image ? RvMedia::getImageUrl($this->image, 'medium', false, RvMedia::getDefaultImage()) : null;
    }

    /**
     * @return string|null
     */
    public function getImageSmallAttribute()
    {
        return $this->image ? RvMedia::getImageUrl($this->image, 'thumb', false, RvMedia::getDefaultImage()) : null;
    }

    /**
     * @return string
     */
    public function getPriceHtmlAttribute()
    {
        $price = $this->price_format;

        if ($this->type->slug == PropertyTypeEnum::RENT) {
            $price .= ' / ' . Str::lower($this->period->label());
        }
        return $price;
    }

    /**
     * @return string
     */
    public function getPriceFormatAttribute()
    {
        if ($this->price_formatted) {
            return $this->price_formatted;
        }
        return $this->price_formatted = format_price($this->price, $this->currency);
    }

    /**
     * @return string
     */
    public function getMapIconAttribute()
    {
        return $this->type_name . ': ' . $this->price_format;
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function propertyReplacement()
    {
        return $this->belongsTo(PropertyReplacement::class, 'replacement_id');
    }
}
