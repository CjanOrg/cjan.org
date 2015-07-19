<?php namespace CJAN\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SchemaSpyCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'schemaspy';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info('Creating SchemaSpy');

		$jar = $this->argument("jar");
		$dbtype = $this->argument("dbtype");
		$output = $this->argument("output");

		$commandLine = sprintf("java -jar %s -u none -t %s -o %s", $jar, $dbtype, $output);

		$this->info(sprintf("Command line: [%s]", $commandLine));

		exec($commandLine);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['jar', InputArgument::REQUIRED, 'SchemaSpy JAR location'],
			['dbtype', InputArgument::REQUIRED, 'Database properties file'],
			['output', InputArgument::REQUIRED, 'Output directory']
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			#['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
