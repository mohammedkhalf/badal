<?php

namespace Botble\RealEstate\Models;

use Botble\RealEstate\Enums\NotificationStatusEnum;
use Botble\Base\Traits\EnumCastable;
use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 're_notifications';

    /**
     * @var array
     */
    protected $fillable = [
        'message',
        'reciever_id',
        'property_id',
        'account_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => NotificationStatusEnum::class,
    ];

    /**
     * @return BelongsTo
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function reciever(): BelongsTo
    {
        return $this->belongsTo(Account::class,'reciever_id');
    }
}
