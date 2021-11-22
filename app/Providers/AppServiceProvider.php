<?php

namespace App\Providers;

use App\Room;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use App\Http\Views\Composer\RoomComposer;
use App\Http\Views\Composer\RoomsComposer;
use App\Http\Views\Composer\AboutComposer;
use App\Http\Views\Composer\SliderComposer;
use App\Http\Views\Composer\GalleryComposer;
use App\Http\Views\Composer\CheckoutComposer;
use App\Http\Views\Composer\AttractionComposer;
use App\Http\Views\Composer\BookedComposer;
use App\Http\Views\Composer\ContactInfoComposer;
use App\Http\Views\Composer\ReservationComposer;
use App\Http\Views\Composer\CalendarComposer;
use App\Http\Views\Composer\UserComposer;
use App\Http\Views\Composer\BookingComposer;
use App\Http\Views\Composer\ContactQueryComposer;
use App\Http\Views\Composer\SocialComposer;
use App\Http\Views\Composer\LogoComposer;

//vendor
use App\Http\Views\Composer\Vendor\LocationComposer;
use App\Http\Views\Composer\Vendor\CityComposer;
use App\Http\Views\Composer\Vendor\TypeComposer;
use App\Http\Views\Composer\Vendor\LakeComposer;
use App\Http\Views\Composer\Vendor\RiverComposer;
use App\Http\Views\Composer\Vendor\SeaComposer;
use App\Http\Views\Composer\Vendor\SeasonComposer;
use App\Http\Views\Composer\Vendor\PaymentTypeComposer;
use App\Http\Views\Composer\Vendor\MenuComposer;
use App\Http\Views\Composer\Vendor\PriceTypeComposer;
use App\Http\Views\Composer\Vendor\FacilityComposer;




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
        View::composer(['includes.*'], LogoComposer::class);
        View::composer(['includes.home.*'], SocialComposer::class);
        View::composer(['includes.calendar.*', 'home'], RoomComposer::class);
        View::composer(['includes.calendar.*', 'home'], BookedComposer::class);
        View::composer('includes.booking.*', BookingComposer::class);
        View::composer('includes.user.*', UserComposer::class);
        View::composer(['includes.*'], ContactInfoComposer::class);
        View::composer('includes.contact.*', ContactQueryComposer::class);
        View::composer('includes.attractions.*', AttractionComposer::class);
        View::composer(['includes.room.*', 'room-details.blade.php'], RoomsComposer::class);
        View::composer('includes.about.*', AboutComposer::class);
        View::composer('includes.slider.*', SliderComposer::class);
        View::composer('includes.gallery.*', GalleryComposer::class);
        View::composer('checkout', CheckoutComposer::class);
        View::composer('includes.reservation.*', ReservationComposer::class);
        View::composer('includes.calendar.*', CalendarComposer::class);


        //vendor
        View::composer(['vendor.inc.form.apartment-form.type','vendor.inc.header'], TypeComposer::class);
        View::composer('vendor.inc.form.apartment-form.city', CityComposer::class);
        View::composer('vendor.inc.form.apartment-form.location', LocationComposer::class);
        View::composer('vendor.inc.form.apartment-form.lakes', LakeComposer::class);
        View::composer('vendor.inc.form.apartment-form.rivers', RiverComposer::class);
        View::composer(['vendor.inc.form.apartment-form.sea','vendor.inc.header'], SeaComposer::class);
        View::composer('vendor.inc.form.apartment-form.season', SeasonComposer::class);

        View::composer('vendor.inc.form.apartment-form.price-per-day', PriceTypeComposer::class);

        View::composer('vendor.inc.form.apartment-form.payment', PaymentTypeComposer::class);
        View::composer('vendor.inc.menu.*', MenuComposer::class);
        View::composer('vendor.inc.form.apartment-form.facilities', FacilityComposer::class);
       



        Schema::defaultStringLength(191);
    }
}
