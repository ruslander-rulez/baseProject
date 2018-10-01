<?php
namespace App\Providers;

use App\Domain\Advice\AdviceRepository;
use App\Domain\Attachment\AttachmentRepository;
use App\Domain\BackendUser\BackendUserRepository;
use App\Infrastructure\Eloquent\AdviceRepositoryEloquent;
use App\Infrastructure\Eloquent\AttachmentRepositoryEloquent;
use App\Infrastructure\Eloquent\BackendUserRepositoryEloquent;
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
    }
}

