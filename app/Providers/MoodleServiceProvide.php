<?php

namespace App\Providers;

use App\Services\Moodle\CategoryService;
use Illuminate\Support\ServiceProvider;
use App\Services\Moodle\CourseService;
use App\Services\Moodle\UserService;


class MoodleServiceProvide extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->singleton('CourseService', function () {
            return new CourseService();
        });

        app()->singleton('UserService', function() {
            return new UserService();
        });

        app()->singleton('CategoryService', function() {
            return new CategoryService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
