<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Hotels
    |--------------------------------------------------------------------------
    |
    | Routes to public folders
    |
    */

    //
    'libraryFolder'         => '/packages/syscover/hotels/storage/library',
    'tmpFolder'             => '/packages/syscover/hotels/storage/tmp',
    'attachmentFolder'      => '/packages/syscover/hotels/storage/attachment',
    'iconsFolder'           => '/packages/syscover/pulsar/images/icons',


    /*
    |--------------------------------------------------------------------------
    | Booking
    |--------------------------------------------------------------------------
    |
    | Booking partner ID
    |
    */

    'bookingPartnerId'      => env('BOOKING_PARTNER_ID', 0),
];