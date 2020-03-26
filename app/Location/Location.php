<?php


namespace App\Location;


use App\Models\Address;
use maxh\Nominatim\Exceptions\NominatimException;
use maxh\Nominatim\Nominatim;

class Location
{

    /**
     * @param Address $address
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \maxh\Nominatim\Exceptions\NominatimException
     */
    public function getByAddress(Address $address): array
    {
        $result = [];
        if($url = config('location.nominatim.url')) {
            try {

            } catch (NominatimException $e) {

            }
            $nominatim = new Nominatim($url);
            if($address->country_id && $address->city && $address->postcode) {

                $search = $nominatim->newSearch()
                    ->street($address->street . ' ' . $address->housenumber . ' ' . $address->housenumber_addition)
                    ->countryCode($address->country_id)
                    ->city($address->city)
                    ->postalCode($address->postcode)
                    ->addressDetails();

                $result = $nominatim->find($search);
            }

        }
        return $result;
    }
}
