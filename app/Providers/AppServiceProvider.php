<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Modules\Cms\Entities\CmsSetting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;
use Modules\Setting\Entities\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->loadHelpers();
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    
        Blueprint::macro('updateCreatedBy', function () {
            $this->foreignId('created_by')->nullable();
            $this->foreignId('updated_by')->nullable();
        });


        Paginator::useBootstrapFive();
        Schema::defaultStringLength(191);

        Blade::include('backend.layouts.forms.form-control-input', 'input');
        Blade::include('backend.layouts.forms.form-control-radio', 'radio');
        Blade::include('backend.layouts.forms.form-control-select', 'select');
        Blade::include('backend.layouts.forms.form-control-textarea', 'textarea');
        Blade::include('backend.layouts.forms.image-with-preview', 'imageWithPreview');

        $views = [
            'settings'=>  Application::findOrfail(1),
            'websetup' => json_decode(CmsSetting::findOrfail(1)->details),
            'social_link' => json_decode(CmsSetting::findOrfail(2)->details),
            'notifications' => Notification::whereNull('read')->latest()->get()
       
        ];
        View::share( $views );


        // =========================Mail Setting=========================
        if(Schema::hasTable('email_configs')){
            $mailSettings = DB::table('email_configs')->where('id',1)->first();
            Config::set('mail.driver', $mailSettings->protocol);
            Config::set('mail.host', $mailSettings->smtp_host);
            Config::set('mail.port', $mailSettings->smtp_port);
            Config::set('mail.username', $mailSettings->smtp_user);
            Config::set('mail.password', $mailSettings->smtp_pass);
        }
        //end


    }



    protected function loadHelpers(){
        foreach (glob(__DIR__.'/../Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
