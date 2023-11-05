### Installation

1. Install [PHP](https://windows.php.net/download), [Nodejs](https://nodejs.org/en/download), [MariaDB](https://mariadb.org/download/), [Composer](https://getcomposer.org/download/)
2. Clone this repository 
3. Install laravel 
```properties
composer global require laravel/installer
```
4. Install all the frontend dependencies
```properties
npm install
```
5. Add APP_KEY for your project.
```properties
php artisan key:generate
```
6. Install all the backend dependencies
```properties
composer install --ignore-platform-reqs
composer update --ignore-platform-reqs
```
7. Press `Windows+R` and search for `services.msc` in windows and make sure the `MariaDB` service is running. Ask Broken for a DB copy and use any DB Management Software to import the SQL.
8. Update the Database config in `config/database.php`.
8. Finally, run the webserver with 
```properties
php artisan serve
```

### Setup Debugger (Optional)

1. Make sure you have installed PHP, Laravel and configured the database before proceeding.
2. Use `php -m` command and paste the output in [XDebug Wizard](https://xdebug.org/wizard.php). Then follow the given instructions from the wizard tool.
3. According to XDebug wizard copy the downloaded `xdebug.dll` to the php `ext` folder. Then paste the absolute path of the dll file in this config and paste it all in `php.ini`.
```ini
zend_extension="<path to xdebug dll>"
xdebug.mode=debug
xdebug.start_with_request=yes
xdebug.client_port=9000
xdebug.client_host=127.0.0.1
```
4. Port has to be different than the web server port. (Eg: Web server port is 8000)
5. Install `PHP Debug` & `PHP Extension Pack` in vscode and make a root `.vscode\launch.json` file. Paste this
```json
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for XDebug",
            "type": "php",
            "request": "launch",
            "port": 9000
        }
    ]
}
```
6. Put some breakpoints and run the debugger then start the web server with `php artisan serve`.
7. Pro-tip: Use `@dd or @dd($variable)` to debug blade snippets.
