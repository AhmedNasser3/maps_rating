طريقة الإعداد
إنشاء الملف .env وتعيين قيم الإتصال بقاعدة البيانات
composer install
php artisan migrate --seed
php artisan storage:link
php artisan key:generate
php artisan serve
 قم بضبط الإعدادات في ملفenv بالشكل التالي:

سجل في الموقع https://mailtrap.io لمحاكاة إرسال البريد
انتقل إلى https://mailtrap.io/inboxes/ ثم Demo inbox
انسخ اسم المستخدم وكلمة المرور إلى ملف env ، لتصبح الإعدادات كالتالي:
MAIL_USERNAME=اسم المستخدم

MAIL_PASSWORD= كلمة المرور
