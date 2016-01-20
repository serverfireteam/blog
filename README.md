# blog
A nice blog system with laravel 5 and laravelpanel 

## Demo 
You can check the [live demo here](http://demo.serverfire.net/blog) and [live admin demo here](http://demo.serverfire.net/panel) .
User: admin@change.me
Pass: 12345 

## Screen shot 
- This is a custom CRUD with few lines of code :
![Gallery](http://laravelpanel.com/assets/img/create-gallery-2.png)
![dashboard of panel](https://raw.githubusercontent.com/serverfireteam/panel/master/public/img/serverfire-panel-dashboard.jpg)
![Edit Pages](https://raw.githubusercontent.com/serverfireteam/panel/master/public/img/serverfire-panel-crud-edit.jpg)

##Installations for laravel 5
Note: if you face any problem in any of the steps you should report it at [github](https://github.com/serverfireteam/blog/issues/new)


1. First you need to create a laravel 5 project

2. Add our package to require section of composer :
    for laravel 5.2
    ```json
    {
        "require": {
            "serverfireteam/blog": "2.*"
        },
    }
    ```
    for laravel 5.1
    ```json
    {
        "require": {
            "serverfireteam/blog": "1.*"
        },
    }
    ```
3. composer update 


4. Add the ServiceProvider of the package to the list of providers in the config/app.php file

    ```php
    'providers' => array(
        'Serverfireteam\Blog\BlogServiceProvider'
    )
    ```

5. Run the following command in order to publish configs, views and assets.  

    ```bash
    php artisan blog:install

    ```

6. Go to your domain.com/panel and you can login with the following username and password :

    user : admin@change.me
    password : 12345
    
7. check your blog at domain.com/blog
