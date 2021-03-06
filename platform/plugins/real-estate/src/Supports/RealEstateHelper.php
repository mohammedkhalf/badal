<?php

namespace Botble\RealEstate\Supports;

class RealEstateHelper
{
    /**
     * @return bool
     */
    public function isRegisterEnabled(): bool
    {
        return setting('real_estate_enabled_register', '1') == '1';
    }

    /**
     * @return int
     */
    public function propertyExpiredDays()
    {
        $days = (int)setting('property_expired_after_days');

        if ($days > 0) {
            return $days;
        }

        return config('plugins.real-estate.real-estate.property_expired_after_x_days');
    }

    public function rewiewCreateCoast()
    {
        $coast = (int)setting('rewiew_create_coast');

        if ($coast > 0) {
            return $coast;
        }

        return config('plugins.real-estate.real-estate.rewiew_create_coast');
    }

    
}
