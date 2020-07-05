<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Routing\UrlGenerator;

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
    public function boot(UrlGenerator $url)
    {
        if(env('ENFORCE_SSL', true)) {
            $url->forceScheme('https');
        }
            
        Blade::directive('money', function ($amount) {
            return "<?php echo '&euro;' . number_format($amount, 2); ?>";
        });

        Blade::directive('stars', function ($stars) {
            $showstars = '';
            $tel = intval($stars);
            $showstars .= $stars;
            $showstars .= $tel;
            for ($i=0;$i<$tel;$i++) {
                $showstars .=  '<i class="fa fa-star text-warning" aria-hidden="true"></i>';
            }
            return "<?php echo '$showstars'; ?>";
        });

        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
