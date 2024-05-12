// app/Providers/AuthServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
/**
* Register any authentication / authorization services.
*
* @return void
*/
public function boot()
{
$this->registerPolicies();

// Đăng ký custom authentication provider
Auth::provider('customer', function ($app, array $config) {
return new CustomerAuthProvider($app['hash'], $config['model']);
});
}
}
