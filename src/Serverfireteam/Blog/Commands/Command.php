<?php namespace Serverfireteam\Blog\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class BlogCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'blog:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Installs  blog  migrations, configs, views and assets.';

	/**
	 * Create a new command instance.
	 *
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 */
	public function fire()
	{
       
        $this->info('            [ Welcome to ServerFireTeam Blog Installations ]       ');
        
        $this->call('vendor:publish');
        
        $this->call('migrate', array('--path' => 'vendor/serverfireteam/blog/src/database/migrations'));

        $this->call('panel:install');

        // add blog to menu 
        $link = new \Serverfireteam\Panel\Link();
        $link->getAndSave('Blog', 'Blog');
        $link->save();
        
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}

}
