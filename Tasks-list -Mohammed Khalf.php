
Fix notification from dashboard

--controle
platform\plugins\real-estate\src\Http\Controllers\ReviewController.php
platform\plugins\real-estate\src\Http\Controllers\PropertyController.php
platform\plugins\real-estate\src\Http\Controllers\AccountPropertyController.php

--view
platform\themes\resido\partials\footer.blade.php
platform\themes\resido\views\partials\notification.blade.php

--DB save
platform\plugins\real-estate\database\migrations\2018_01_01_192824_create_re_notifications_table
platform\plugins\real-estate\src\Tables\NotificationTable.php
platform\plugins\real-estate\routes\web.php



Add dynamic map

platform\plugins\real-estate\src\Providers\RealEstateServiceProvider.php
platform\plugins\real-estate\src\Forms\PropertyForm.php

	