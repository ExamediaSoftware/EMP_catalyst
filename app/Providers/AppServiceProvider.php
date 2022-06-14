<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Parameter;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        // dd($global_company_type);

        // $global_states = Parameter::where('parameter_name', 'state')
        //     ->orderBy('type_id')
        //     ->get();

        // view()->composer('partials.language_switcher', function ($view) {
        //     $view->with('current_locale', app()->getLocale());
        //     $view->with('available_locales', config('app.available_locales'));
        // });

        view()->composer(
            '*',
            function ($view) {
                $global_company_type = Parameter::where('parameter_name', 'company_type')
                    ->orderBy('type_id')
                    ->get();

                    $global_race = Parameter::where('parameter_name', 'race')
                    ->orderBy('type_id')
                    ->get();

                    $global_sector_type = Parameter::where('parameter_name', 'sector_type')
                    ->orderBy('type_id')
                    ->get();

                    $global_religion_type = Parameter::where('parameter_name', 'religion')
                    ->orderBy('type_id')
                    ->get();

                    $global_gender_type = Parameter::where('parameter_name', 'gender_type')
                    ->orderBy('type_id')
                    ->get();
                    
                    $global_age_type = Parameter::where('parameter_name', 'age')
                    ->orderBy('type_id')
                    ->get();

                    $global_states = Parameter::where('parameter_name', 'state')
                    ->orderBy('type_id')
                    ->get();

                    $global_bussiness_issue = Parameter::where('parameter_name', 'assistance_business_issues')
                    ->orderBy('type_id')
                    ->get();

                    $global_leadership_issue = Parameter::where('parameter_name', 'assistance_leadership_issues')
                    ->orderBy('type_id')
                    ->get();

                    $global_role = Role::all();
                    // dd($global_bussiness_issue);

                    $view->with(
                        compact(
                            'global_company_type',
                            'global_race',
                            'global_sector_type',
                            'global_religion_type',
                            'global_gender_type',
                            'global_age_type',
                            'global_states',
                            'global_bussiness_issue',
                            'global_leadership_issue',
                            'global_role',
                           
                        )
                    );
                    $view->with('current_locale', app()->getLocale());
                    $view->with('available_locales', config('app.available_locales'));
            }
        );
    }
}
