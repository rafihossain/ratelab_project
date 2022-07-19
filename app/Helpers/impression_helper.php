<?php

if (!function_exists("impression")) {
    function impression($id)
    {
        $advertise = new App\Models\AdvertisementModel();

        $getImpression = $advertise->where('id', $id)->first();

        $impression = $getImpression->impression;

        $impressionupdate['impression'] = ($impression + 1);
        $advertise->update($id, $impressionupdate);
    }
}
