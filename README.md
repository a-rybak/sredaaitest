<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Run application
**Important!**
Install and enable GD library in your system or web-server for ability to generate QR code.

Running as usual:

- git clone https://github.com/a-rybak/sredaaitest.git . (to current directory)
- composer update
- php -r "file_exists('.env') || copy('.env.example', '.env');"
- php artisan key:gen
- php artisan migrate (agree with create new DB)
- npm i && npm run build (to enable tailwind css and make assets)
- php artisan serve
- enjoy :)

Confirmation URL is set in ENV-file (can set anything you want)

*hint - certificate's number format is XXXXX-XXXX (only numbers)
