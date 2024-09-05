# استخدام صورة PHP مع Apache
FROM php:8.2-apache

# تثبيت الإضافات المطلوبة
RUN docker-php-ext-install mysqli pdo pdo_mysql

# نسخ ملفات المشروع إلى الحاوية
COPY . /var/www/html/

# تعيين الأذونات المناسبة
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/
