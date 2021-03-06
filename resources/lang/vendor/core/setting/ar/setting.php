<?php

return [
    'title' => 'الاعدادات',
    'email_setting_title' => 'إعدادات البريد الإلكتروني',
    'general' => [
        'theme' => 'ثيم',
        'description' => 'تحديد معلومات الموقع',
        'title' => 'عام',
        'general_block' => 'معلومات عامة',
        'rich_editor' => 'Rich Editor',
        'site_title' => 'عنوان الموقع',
        'admin_email' => 'البريد الإلكتروني للوحة التحكم',
        'seo_block' => 'تكوين SEO',
        'seo_title' => 'عنوان SEO',
        'seo_description' => 'وصف SEO',
        'webmaster_tools_block' => 'أدوات مشرفي المواقع من Google',
        'google_site_verification' => 'التحقق من موقع Google',
        'placeholder' => [
            'site_title' => 'عنوان الموقع (بحد أقصى 120 حرفًا)',
            'admin_email' => 'البريد الإلكتروني للوحة التحكم',
            'seo_title' => 'عنوان SEO (بحد أقصى 120 حرفًا)',
            'seo_description' => 'وصف SEO (بحد أقصى 120 حرفًا)',
            'google_analytics' => 'Google Analytics',
            'google_site_verification' => 'Google Site Verification',
        ],
        'cache_admin_menu' => 'قائمة إدارة ذاكرة التخزين المؤقت؟',
        'enable_send_error_reporting_via_email' => 'التمكين من إرسال الإبلاغ عن الخطأ عبر البريد الإلكتروني؟',
        'time_zone' => 'الوحدة زمنية',
        'default_admin_theme' => 'ثيم لوحة التحكم الافتراضي',
        'enable_change_admin_theme' => 'تمكين تغيير ثيم لوحة التحكم؟',
        'enable' => 'تمكين',
        'disable' => 'إلغاء',
        'enable_cache' => 'تمكين ذاكرة التخزين المؤقت؟',
        'cache_time' => 'وقت التخزين المؤقت (بالدقائق)',
        'cache_time_site_map' => 'وقت التخزين خريطة الموقع',
        'admin_logo' => 'لوجو لوحة التحكم',
        'admin_favicon' => 'favicon لوحة التحكم',
        'admin_title' => 'عنوان لوحة التحكم',
        'admin_title_placeholder' => 'عرض العنوان لعلامة تبويب المتصفح',
        'cache_block' => 'ذاكرة التخزين المؤقت',
        'admin_appearance_title' => 'مظهر لوحة التحكم',
        'admin_appearance_description' => 'جارٍ تعيين مظهر لوحة التحكم مثل المحرر واللغة ...',
        'seo_block_description' => 'تحديد عنوان الموقع ، وصف التعريف للموقع ، والكلمة الأساسية للموقع لتحسين SEO',
        'webmaster_tools_description' => 'أدوات مشرفي المواقع من Google (GWT) هي برنامج مجاني يساعدك على إدارة الجانب التقني لموقعك على الويب',
        'cache_description' => 'تكوين ذاكرة التخزين المؤقت للنظام لتحسين السرعة',
        'yes' => 'نعم',
        'no' => 'لا',
        'show_on_front' => 'يتم عرض صفحتك الرئيسية',
        'select' => '— أختر —',
        'show_site_name' => 'إظهار اسم الموقع بعد عنوان الصفحة ، مفصولاً بعلامة "-"؟',
        'locale' => 'لغة الموقع',
        'locale_direction' => 'اتجاه لغة الموقع الأمامي',
        'admin_locale_direction' => 'اتجاه لغة لوحة التحكم',
        'admin_login_screen_backgrounds' => 'Login screen backgrounds (~1366x768)',
    ],
    'email' => [
        'subject' => 'الموضوع',
        'content' => 'محتوى',
        'title' => 'الإعداد لقالب البريد الإلكتروني',
        'description' => 'قالب البريد الإلكتروني باستخدام HTML ومتغيرات النظام.',
        'reset_to_default' => 'إعادة تعيين إلى الافتراضي',
        'back' => 'رجوع إلى الإعدادات',
        'reset_success' => 'إعادة التعيين إلى الافتراضي بنجاح',
        'confirm_reset' => 'تأكيد إعادة تعيين قالب البريد الإلكتروني؟',
        'confirm_message' => 'هل تريد حقًا إعادة تعيين قالب البريد الإلكتروني هذا إلى الإعداد الافتراضي؟',
        'continue' => 'محتوى',
        'sender_name' => 'البريد الإلكتروني المرسل',
        'sender_name_placeholder' => 'الاسم',
        'sender_email' => 'البريد الإلكتروني المرسل',
        'mailer' => 'Mailer',
        'port' => 'منفذ',
        'port_placeholder' => 'Ex: 587',
        'host' => 'مضيف',
        'host_placeholder' => 'مثال: smtp.gmail.com',
        'username' => 'اسم المستخدم',
        'username_placeholder' => 'اسم المستخدم لتسجيل الدخول إلى خادم البريد',
        'password' => 'كلمة المرور',
        'password_placeholder' => 'كلمة المرور لتسجيل الدخول إلى خادم البريد',
        'encryption' => 'التشفير',
        'mail_gun_domain' => 'الدومين',
        'mail_gun_domain_placeholder' => 'الدومين',
        'mail_gun_secret' => 'Secret',
        'mail_gun_secret_placeholder' => 'Secret',
        'mail_gun_endpoint' => 'نقطة النهاية',
        'mail_gun_endpoint_placeholder' => 'نقطة النهاية',
        'log_channel' => 'قناة الدخول',
        'sendmail_path' => 'Sendmail Path',
        'encryption_placeholder' => 'التشفير: ssl أو tls',
        'ses_key' => 'Key',
        'ses_key_placeholder' => 'Key',
        'ses_secret' => 'Secret',
        'ses_secret_placeholder' => 'Secret',
        'ses_region' => 'Region',
        'ses_region_placeholder' => 'Region',
        'postmark_token' => 'Token',
        'postmark_token_placeholder' => 'Token',
        'template_title' => 'قوالب البريد الإلكتروني',
        'template_description' => 'قوالب أساسية لجميع رسائل البريد الإلكتروني',
        'template_header' => 'رأس قالب البريد الإلكتروني',
        'template_header_description' => 'نموذج لرأس رسائل البريد الإلكتروني',
        'template_footer' => 'فوتر قالب البريد الإلكتروني',
        'template_footer_description' => 'نموذج فوتر رسائل البريد الإلكتروني',
        'default' => 'افتراضى',
        'using_queue_to_send_mail' => 'ستخدام وظيفة قائمة الانتظار لإرسال رسائل البريد الإلكتروني (يجب إعداد قائمة الانتظار أولاً https://laravel.com/docs/queues#supervisor-configuration)',
    ],
    'media' => [
        'title' => 'الوسائط',
        'driver' => 'المشغل',
        'description' => 'إعدادات الوسائط',
        'aws_access_key_id' => 'معرف مفتاح الوصول إلى AWS',
        'aws_secret_key' => 'مفتاح AWS السري',
        'aws_default_region' => 'منطقة AWS الافتراضية',
        'aws_bucket' => 'حاوية AWS',
        'aws_url' => 'رابط AWS',
        'do_spaces_access_key_id' => 'DO Spaces Access Key ID',
        'do_spaces_secret_key' => 'DO Spaces Secret Key',
        'do_spaces_default_region' => 'DO Spaces Default Region',
        'do_spaces_bucket' => 'DO Spaces Bucket',
        'do_spaces_endpoint' => 'DO Spaces Endpoint',
        'do_spaces_cdn_enabled' => 'Is DO Spaces CDN enabled?',
        'media_do_spaces_cdn_custom_domain' => 'قم بعمل Spaces CDN custom domain',
        'media_do_spaces_cdn_custom_domain_placeholder' => 'https://your-custom-domain.com',
        'wasabi_access_key_id' => 'معرف مفتاح الوصول Wasabi',
        'wasabi_secret_key' => 'Wasabi Secret Key',
        'wasabi_default_region' => 'منطقة Wasabi الافتراضية',
        'wasabi_bucket' => 'Wasabi Bucket',
        'wasabi_root' => 'Wasabi Root',
        'default_placeholder_image' => 'صورة العنصر النائب الافتراضي',
        'enable_chunk' => 'تمكين تحميل حجم القطعة؟',
        'chunk_size' => 'حجم القطعة (بايت)',
        'chunk_size_placeholder' => 'الافتراضي: 1048576 ~ 1 ميغا بايت',
        'max_file_size' => 'حجم الملف الأقصى للقطعة (ميغا بايت)',
        'max_file_size_placeholder' => 'الافتراضي: 1048576 ~ 1 جيجابايت',
        'enable_watermark' => 'تمكين العلامة المائية؟',
        'watermark_source' => 'صورة العلامة المائية',
        'watermark_size' => 'حجم العلامة المائية (٪)',
        'watermark_size_placeholder' => 'الافتراضي: 10 (٪)',
        'watermark_opacity' => 'عتامة العلامة المائية (٪)',
        'watermark_opacity_placeholder' => 'الافتراضي: 70 (٪)',
        'watermark_position' => 'موضع العلامة المائية',
        'watermark_position_x' => 'موضع العلامة المائية X',
        'watermark_position_y' => 'موضع العلامة المائية Y',
        'watermark_position_top_left' => 'أعلى اليسار',
        'watermark_position_top_right' => 'اعلى اليمين',
        'watermark_position_bottom_left' => 'أسفل اليسار',
        'watermark_position_bottom_right' => 'أسفل اليمين',
        'watermark_position_center' => 'وسط',
        'bunnycdn_hostname' => 'اسم المضيف',
        'bunnycdn_key' => 'كلمة مرور الوصول إلى FTP و API (كلمة مرور الوصول إلى واجهة برمجة تطبيقات منطقة التخزين)',
        'bunnycdn_region' => 'المنطقة (منطقة التخزين)',
        'bunnycdn_zone' => 'اسم المنطقة (اسم منطقة التخزين الخاصة بك)',
        'turn_off_automatic_url_translation_into_latin' => 'هل تريد إيقاف تشغيل الترجمة التلقائية لعناوين URL إلى اللاتينية؟',
    ],
    'license' => [
        'purchase_code' => 'كود الشراء',
        'buyer' => 'وكيل المشتريات',
    ],
    'field_type_not_exists' => 'هذا النوع من الحقول غير موجود',
    'save_settings' => 'حفظ الاعدادات',
    'template' => 'قالب',
    'description' => 'وصف',
    'enable' => 'تمكين',
    'send' => 'إرسال',
    'test_email_description' => 'لإرسال بريد إلكتروني تجريبي ، يرجى التأكد من تحديث التكوين لإرسال البريد!',
    'test_email_input_placeholder' => 'أدخل البريد الإلكتروني الذي تريد إرسال بريد إلكتروني تجريبي.',
    'test_email_modal_title' => 'إرسال بريد إلكتروني تجريبي',
    'test_send_mail' => 'إرسال بريد تجريبي',
    'test_email_send_success' => 'تم أرسال البريد الإلكتروني بنجاح!',
    'locale_direction_ltr' => 'من اليسار إلى اليمين',
    'locale_direction_rtl' => 'من اليمين الى اليسار',
    'saving' => 'يتم الحفظ...',
    'email_add_more' => 'اضافة المزيد',
    'emails_warning' => 'يمكنك إضافة ما يصل إلى: حساب رسائل البريد الإلكتروني',
];
