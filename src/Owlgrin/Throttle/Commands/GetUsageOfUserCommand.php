<?php namespace Owlgrin\Throttle\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Owlgrin\Throttle\Period\ActiveSubscriptionPeriod;
use Throttle;

/**
 * Command to generate the required migration
 */
class GetUsageOfUserCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'throttle:usage';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Find\'s usage of the user';

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */

	public function __construct()
	{
 		parent::__construct();
	}

	public function fire()
	{
		$userId = $this->option('user');

		$period = new ActiveSubscriptionPeriod($userId);

		$usages = Throttle::getUsage($userId, $period);

		$this->info('User With id '.$userId.' has a usages of');
		print_r($usages);
	}

	protected function getOptions()
	{
		return array(
			array('user', null, InputOption::VALUE_OPTIONAL, 'The id of the user whose usage to show', null)
		);
	}
}