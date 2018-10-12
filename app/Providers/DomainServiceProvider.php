<?php
namespace App\Providers;

use App\Domain\Advice\AdviceRepository;
use App\Domain\Attachment\AttachmentRepository;
use App\Domain\BackendUser\BackendUserRepository;
use App\Domain\Category\CategoryRepository;
use App\Domain\Product\ProductRepository;
use App\Infrastructure\Eloquent\AdviceRepositoryEloquent;
use App\Infrastructure\Eloquent\AttachmentRepositoryEloquent;
use App\Infrastructure\Eloquent\BackendUserRepositoryEloquent;
use App\Infrastructure\Eloquent\CategoryRepositoryEloquent;
use App\Infrastructure\Eloquent\ProductRepositoryEloquent;
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
        $this->app->singleton(AdviceRepository::class, AdviceRepositoryEloquent::class);
        $this->app->singleton(AttachmentRepository::class, AttachmentRepositoryEloquent::class);
        $this->app->singleton(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->singleton(ProductRepository::class, ProductRepositoryEloquent::class);
    }
}

