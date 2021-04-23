<?php

namespace App\Console\Commands;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Console\Command;

class UserCommentStoreCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:comments {USER_ID} {COMMENT}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To store user comment';

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
     * @return int
     */
    public function handle()
    {
        $user = User::findOrFail($this->argument('USER_ID'));

        $isCommentStored = resolve(UserController::class)
            ->storeCommentBy($user, $this->argument('COMMENT'));

        if ($isCommentStored) {
            $this->info('Success');
            return true;
        }

        $this->error('failed');
        return 0;
    }
}
