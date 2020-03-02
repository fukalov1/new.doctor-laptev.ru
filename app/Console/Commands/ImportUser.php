<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class ImportUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $user;
    protected $description = 'Импорт клиентов';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(user $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->user->importUser();
    }
}
