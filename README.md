# School board

USAGE

- Clone this repository and run: composer install
- Application should be cloned in Apache server root directory (Ubuntu example): /var/www/html/
- index.php file is entry point for every request entering the application, so mod_rewrite should be enabled in Apache configuration
- Import sql file to MySQL Server
- MySQL credentials should be changed in app/Config/Database.php file on line 19:
