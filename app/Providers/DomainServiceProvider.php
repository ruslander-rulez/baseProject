<?php
namespace App\Providers;

use App\Domain\BackendUser\BackendUserRepository;
use App\Domain\Currency\CurrencyRepository;
use App\Domain\Price\PriceRepository;
use App\Domain\Product\ProductRepository;
use App\Domain\Product\StockOperationRepository;
use App\Domain\TelBan\IpBanRepository;
use App\Domain\TelBan\TelBanRepository;
use App\Infrastructure\Eloquent\BackendUserRepositoryEloquent;
use App\Infrastructure\Eloquent\CurrencyRepositoryEloquent;
use App\Infrastructure\Eloquent\IpBanRepositoryEloquent;
use App\Infrastructure\Eloquent\PriceRepositoryEloquent;
use App\Infrastructure\Eloquent\ProductRepositoryEloquent;
use App\Infrastructure\Eloquent\StockOperationRepositoryEloquent;
use App\Infrastructure\Eloquent\TelBanRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BackendUserRepository::class, BackendUserRepositoryEloquent::class);
        $this->app->singleton(TelBanRepository::class, TelBanRepositoryEloquent::class);
        $this->app->singleton(IpBanRepository::class, IpBanRepositoryEloquent::class);
        $this->app->singleton(CurrencyRepository::class, CurrencyRepositoryEloquent::class);
        $this->app->singleton(ProductRepository::class, ProductRepositoryEloquent::class);
        $this->app->singleton(PriceRepository::class, PriceRepositoryEloquent::class);
        $this->app->singleton(StockOperationRepository::class, StockOperationRepositoryEloquent::class);
    }
}
