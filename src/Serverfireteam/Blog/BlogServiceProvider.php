<?php namespace Serverfireteam\Blog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Route;
use Illuminate\Translation;

class BlogServiceProvider extends ServiceProvider
{
    protected $defer = false;
        
    public function register()
    {
        // register panel service provider 
        $this->app->register('Serverfireteam\Panel\PanelServiceProvider');

        
        include __DIR__."/Commands/Command.php";
        $this->app['blog::install'] = $this->app->share(function()
        {
            return new \Serverfireteam\Blog\Commands\BlogCommand();
        });

        $this->commands('blog::install');
        $this->publishes([
            __DIR__ . '/../../../public' => public_path('packages/serverfireteam/blog')
        ]);
        $this->publishes([
            __DIR__.'/config/blog.php' => config_path('blog.php'),
        ]);
    }
        
    public function boot()
    {        


        $this->loadViewsFrom(__DIR__.'/../../views', 'blog');
        $this->publishes([
            __DIR__.'/../../views' => base_path('resources/views/blog'),
        ]);
        include __DIR__."/../../routes.php";
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
    
    
}
