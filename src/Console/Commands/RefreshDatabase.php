<?php
namespace Abhijitghogre\LaravelDbClearCommand\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Input\InputOption;

class RefreshDatabase extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'db:clear 
                        {--m|migrate : Migrate the database after clearing}
                        {--s|seed : Seed the database after clearing}
                        ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all database tables and rerun the migrations.';

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
        $tables = [];

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach (DB::select('SHOW TABLES') as $k => $v) {
            $tables[] = array_values((array)$v)[0];
        }

        foreach ($tables as $table) {
            Schema::drop($table);
            echo "Table " . $table . " has been dropped." . PHP_EOL;
        }

        if ($this->option('migrate')) {
            $this->call('migrate');
        } elseif ($this->option('seed')) {
            $this->call('migrate');
            $this->call('db:seed');
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [

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
            ['migrate', null, InputOption::VALUE_NONE, 'Indicates if the migrate task should be run.'],
            ['seed', null, InputOption::VALUE_NONE, 'Indicates if the seed task should be run.'],
        ];
    }

}
