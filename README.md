# blog
A nice blog system with laravel 5 and laravelpanel 


##Installations for laravel 5
Note: if you face any problem in any of the steps you should report it at [github](https://github.com/serverfireteam/panel/issues/new)

Note : we are working on laravel 5 version in laravel5 bransh of repo 

1. First you need to create a laravel 5 project

2. Add our package to require section of composer :

    ```json
    {
        "require": {
            "serverfireteam/blog": "dev-master"
        },
    }
    ```
And run the composer update command, the package and its dependencies will be installed.


3. Add the ServiceProvider of the package to the list of providers in the config/app.php file

    ```php
    'providers' => array(
        'Serverfireteam\blog\BlogServiceProvider'
    )
    ```

4. Run the following command in order to publish configs, views and assets.  

    ```bash
    php artisan blog:install

    ```

5. Go to your domain.com/public/panel and you can login with the following username and password :

    user : admin@change.me
    password : 12345