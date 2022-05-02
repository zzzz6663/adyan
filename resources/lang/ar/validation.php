<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute باید پذیرفته شده باشد.',
    'active_url'           => 'آدرس :attribute معتبر نیست.',
    'after'                => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal'       => ':attribute باید تاریخی بعد از :date، یا مطابق با آن باشد.',
    'alpha'                => ':attribute باید فقط حروف الفبا باشد.',
    'alpha_dash'           => ':attribute باید فقط حروف الفبا، اعداد، خط تیره و زیرخط باشد.',
    'alpha_num'            => ':attribute باید فقط حروف الفبا و اعداد باشد.',
    'array'                => ':attribute باید آرایه باشد.',
    'before'               => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal'      => ':attribute باید تاریخی قبل از :date، یا مطابق با آن باشد.',
    'between'              => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file'    => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string'  => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array'   => ':attribute باید بین :min و :max آیتم باشد.',
    ],
    'boolean'              => 'فیلد :attribute فقط می‌تواند true و یا false باشد.',
    'confirmed'            => ':attribute با فیلد تکرار مطابقت ندارد.',
    'date'                 => ':attribute یک تاریخ معتبر نیست.',
    'date_equals'          => ':attribute باید یک تاریخ برابر با تاریخ :date باشد.',
    'date_format'          => ':attribute با الگوی :format مطابقت ندارد.',
    'different'            => ':attribute و :other باید از یکدیگر متفاوت باشند.',
    'digits'               => ':attribute باید :digits رقم باشد.',
    'digits_between'       => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions'           => 'ابعاد تصویر :attribute قابل قبول نیست.',
    'distinct'             => 'فیلد :attribute مقدار تکراری دارد.',
    'email'                => ':attribute باید یک ایمیل معتبر باشد.',
    'ends_with'            => 'فیلد :attribute باید با یکی از مقادیر زیر خاتمه یابد: :values',
    'exists'               => ':attribute انتخاب شده، معتبر نیست.',
    'file'                 => ':attribute باید یک فایل معتبر باشد.',
    'filled'               => 'فیلد :attribute باید مقدار داشته باشد.',
    'gt'                   => [
        'numeric' => ':attribute باید بزرگتر از :value باشد.',
        'file'    => ':attribute باید بزرگتر از :value کیلوبایت باشد.',
        'string'  => ':attribute باید بیشتر از :value کاراکتر داشته باشد.',
        'array'   => ':attribute باید بیشتر از :value آیتم داشته باشد.',
    ],
    'gte'                  => [
        'numeric' => ':attribute باید بزرگتر یا مساوی :value باشد.',
        'file'    => ':attribute باید بزرگتر یا مساوی :value کیلوبایت باشد.',
        'string'  => ':attribute باید بیشتر یا مساوی :value کاراکتر داشته باشد.',
        'array'   => ':attribute باید بیشتر یا مساوی :value آیتم داشته باشد.',
    ],
    'image'                => ':attribute باید یک تصویر معتبر باشد.',
    'in'                   => ':attribute انتخاب شده، معتبر نیست.',
    'in_array'             => 'فیلد :attribute در لیست :other وجود ندارد.',
    'integer'              => ':attribute باید عدد صحیح باشد.',
    'ip'                   => ':attribute باید آدرس IP معتبر باشد.',
    'ipv4'                 => ':attribute باید یک آدرس معتبر از نوع IPv4 باشد.',
    'ipv6'                 => ':attribute باید یک آدرس معتبر از نوع IPv6 باشد.',
    'json'                 => 'فیلد :attribute باید یک رشته از نوع JSON باشد.',
    'lt'                   => [
        'numeric' => ':attribute باید کوچکتر از :value باشد.',
        'file'    => ':attribute باید کوچکتر از :value کیلوبایت باشد.',
        'string'  => ':attribute باید کمتر از :value کاراکتر داشته باشد.',
        'array'   => ':attribute باید کمتر از :value آیتم داشته باشد.',
    ],
    'lte'                  => [
        'numeric' => ':attribute باید کوچکتر یا مساوی :value باشد.',
        'file'    => ':attribute باید کوچکتر یا مساوی :value کیلوبایت باشد.',
        'string'  => ':attribute باید کمتر یا مساوی :value کاراکتر داشته باشد.',
        'array'   => ':attribute باید کمتر یا مساوی :value آیتم داشته باشد.',
    ],
    'max'                  => [
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file'    => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string'  => ':attribute نباید بیشتر از :max کاراکتر داشته باشد.',
        'array'   => ':attribute نباید بیشتر از :max آیتم داشته باشد.',
    ],
    'mimes'                => 'فرمت‌های معتبر فایل عبارتند از: :values.',
    'mimetypes'            => 'فرمت‌های معتبر فایل عبارتند از: :values.',
    'min'                  => [
        'numeric' => ':attribute نباید کوچکتر از :min باشد.',
        'file'    => ':attribute نباید کوچکتر از :min کیلوبایت باشد.',
        'string'  => ':attribute نباید کمتر از :min کاراکتر داشته باشد.',
        'array'   => ':attribute نباید کمتر از :min آیتم داشته باشد.',
    ],
    'not_in'               => ':attribute انتخاب شده، معتبر نیست.',
    'not_regex'            => 'فرمت :attribute معتبر نیست.',
    'numeric'              => ':attribute باید عدد یا رشته‌ای از اعداد باشد.',
    'present'              => 'فیلد :attribute باید در پارامترهای ارسالی وجود داشته باشد.',
    'regex'                => 'فرمت :attribute معتبر نیست.',
    'required'             => 'فیلد :attribute الزامی است.',
    'required_if'          => 'هنگامی که :other برابر با :value است، فیلد :attribute الزامی است.',
    'required_unless'      => 'فیلد :attribute الزامی است، مگر آنکه :other در :values موجود باشد.',
    'required_with'        => 'در صورت وجود فیلد :values، فیلد :attribute نیز الزامی است.',
    'required_with_all'    => 'در صورت وجود فیلدهای :values، فیلد :attribute نیز الزامی است.',
    'required_without'     => 'در صورت عدم وجود فیلد :values، فیلد :attribute الزامی است.',
    'required_without_all' => 'در صورت عدم وجود هر یک از فیلدهای :values، فیلد :attribute الزامی است.',
    'same'                 => ':attribute و :other باید همانند هم باشند.',
    'size'                 => [
        'numeric' => ':attribute باید برابر با :size باشد.',
        'file'    => ':attribute باید برابر با :size کیلوبایت باشد.',
        'string'  => ':attribute باید برابر با :size کاراکتر باشد.',
        'array'   => ':attribute باید شامل :size آیتم باشد.',
    ],
    'starts_with'          => ':attribute باید با یکی از این ها شروع شود: :values',
    'string'               => 'فیلد :attribute باید رشته باشد.',
    'timezone'             => 'فیلد :attribute باید یک منطقه زمانی معتبر باشد.',
    'unique'               => ':attribute قبلا انتخاب شده است.',
    'uploaded'             => 'بارگذاری فایل :attribute موفقیت آمیز نبود.',
    'url'                  => ':attribute معتبر نمی‌باشد.',
    'uuid'                 => ':attribute باید یک UUID معتبر باشد.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'                  => 'الاسم',
        'username'              => 'اسم المستخدم',
        'email'                 => 'ایمیل',
        'first_name'            => 'الاسم',
        'last_name'             => 'اسم العائلة',
        'password'              => 'کلمة المرور',
        'password_confirmation' => 'تکرار کلمة المرور',
        'city'                  => 'المدینة',
        'country'               => 'البلد',
        'address'               => 'العنوان',
        'phone'                 => 'رقم الهاتف',
        'mobile'                => 'رقم الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'الجنس',
        'day'                   => 'یوم',
        'month'                 => 'شهر',
        'year'                  => 'سنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقیقة',
        'second'                => 'ثانیة',
        'title'                 => 'العنوان',
        'text'                  => 'النص',
        'content'               => 'المحتوی',
        'description'           => 'الشرح',
        'excerpt'               => 'ملخص النص',
        'date'                  => 'التاریخ',
        'time'                  => 'الزمن',
        'available'             => 'موجود',
        'size'                  => 'الحجم',
        'terms'                 => 'الشروط',
        'province'              => 'المحافظة',
        'body'                  => 'النص',
        'comment'                  => 'الرأي',
        'info'                  => 'المعلومات  ',
        'price'                  => '  الثمن  ',
        'day_p'                  => '  الفترة الزمنیة   ',
        'sound'                  => '    الملف الصوتي',
        'txt_before'                  => 'النص قبل الاستبیان',
        'txt_after'                  => 'النص بعد اکمال الاستبیان',
        'info_discount'                  => ' شرح الانفخاض',
        'info_sale'                  => '  شرح الشراء  ',
        'type'                  => ' النوع  ',
        'percent'                  => '  في المئة  ',
        'image'                  => '  الصورة  ',

        'code'                  => '  الرقم    ',
        'family'                  => '   اسم العائلة (الکنیة) ',
        'avatar'                  => '   الصورة  ',
        'group'                  => '    المجموعة ',
        'whatsapp'                  => '   رقم الواتساب ',
        'type_job'                  => ' نوع المهنة    ',
        'semat_job'                  => '    مسؤولیة ',
        'job'                  => '  عنوان المهنة   ',
        'org'                  => ' المنظمة / المؤسسة    ',
        'country_id'                  => ' البلد    ',
        'verify'                  => '  تکرار کلمة المرور   ',
        'master_univer'                  => ' اسم الجامعة المتخرج بالبکالوریوس   ',
        'master_course'                  => '   فرع البکالوریوس  ',
        'course'                  => '     الفرع',
        'expert'                  => '    الاختصاص ',
        'tags'                  => '  الکامات المفتاحیة  ',
        'problem'                  => '  بیان المشکلة   ',
        'question'                  => '   السؤال الرئیسي  ',
        'necessity'                  => '   ضرورة البحث  ',
        'innovation'                  => '  الجوانب الابداعي   ',
        'ostad_id'                  => '   المشرف المختار  ',
        'ostad'                  => '   المشرف المقترح  ',
        'resume'                  => '  السیرة الذاتیة (سي وي)   ',
        'masters'                  => '     الاساتذة',
        'user_id'                  => '    المستخدم أو الاستاذ ',
        'master_id'                  => '    المشرف الرئیسي ',
        'curts'                  => '   الاستمارات  ',
        'users'                  => '    الاساتذة ',
        'question'                  => 'السؤال     ',
        'a1'                  => '    الخیار الأول  ',
        'a2'                  => '    الخیار الثاني  ',
        'a3'                  => '     الخیار الثالث',
        'a4'                  => '     الخیار الرابع',
        'answer'                  => '    الخیار الصحیح  ',
        'group_id'                  => 'اللجنة     ',
        'info'                  => '   التوضیحات  ',
        'reason'                  => '    سبب الرفض  ',
        'en_title'                  => '    العنوان بالانجلیزي ',
        'en_tags'                  => '   الکلمات المفتاحیة بالانجلیزية  ',
        'en_title'=>'العنوان بالانجلیزي',
        'enter_en_title'=>'یجب اکمال العنوان بالانجلیزي ',
        'en_tags'=>'الکلمات المفتاحیة بالانجلیزية',
        'sub_question'=>'الاسئلة الفرعیة',
        'hypo'=>'الفرضیات',
        'theory'=>'النظریات المستخدمة
        ',
        'structure'=>'هیکلیة البحث
        ',
        'method'=>'منهجیة البحث
        ',
        'source'=>'المآخذ ',
        'subjects'                  => 'الموضوعات المقبولة     ',
        'plans'                  => '   خطة البحث التفصیلیة  ',

        'curt_id'                  => 'الاستمارة الاولی     ',
        'plan_id'                  => 'خطة البحث التفصیلیة     ',
        'report'                  => '    ملف التقریر إیرانداک (استلال العنوان) ',
        'info_master'                  => ' آراء المشرف  ',
        'confirm_master'                  => '   حالة الاستمارة   ',
        'no_verifyed'                  => '   مازال لم یتم الفحص   ',
        'accept_with_guid_without_plan'=> '  المؤکد مع المشرف دون الخطة التفصیلیة   ',
        'accept_with_guid_with_plan'=> '  المؤکد مع المشرف مع الخطة التفصیلیة   ',
        'accept_without_guid' => '   المؤکد دون المشرف  ',

        'show' => ' عرض    ',
        '' => '     ',
        '' => '     ',
        '' => '     ',
        '' => '     ',
        '' => '     ',
        '' => '     ',
        '' => '     ',
        '' => '     ',
        '' => '     ',



    ],
];
