<?php

namespace App\Console\Commands\Data;

//Internal Library
use Illuminate\Console\Command;
use Log;

//Libraries
use Seat\Eseye\Exceptions\RequestFailedException;
use App\Library\Esi\Esi;

//Models
use App\Models\User\User;
use App\Models\User\UserAlt;
use App\Models\Esi\EsiScope;
use App\Models\Esi\EsiToken;
use App\Models\User\UserPermission;
use App\Models\User\UserRole;
use App\Models\Admin\AllowedLogin;

/**
 * The PurgeUsers command takes care of updating any user changes in terms of login role, as well as purging any users without at least
 * the 'User' role.  This command heavily relies on ESI being available.  If no ESI is available, then the function does nothing, in order to prevent
 * unwanted changes.
 */
class PurgeAllUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:PurgeAllUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purge all users from the database.';

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
    public function handle()
    {
        //Get all of the users from the database
        $users = User::all();

        foreach($users as $user) {
            //Delete the user from the user table
            User::where([
                'character_id' => $user->character_id,
            ])->delete();

            EsiScope::where([
                'character_id' => $user->character_id,
            ])->delete();

            EsiToken::where([
                'character_id' => $user->character_id,
            ])->delete();
        }

        

                                                    
    }
}
