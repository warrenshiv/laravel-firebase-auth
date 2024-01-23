<?php

// app/Providers/FirebaseServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('firebase', function () {
            $serviceAccount = ServiceAccount::fromJsonFile(config('firebase.service_account_json'));

            return (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri(config('firebase.projects.app.database.url'))
                ->create();
        });
    }
}

