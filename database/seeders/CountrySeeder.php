<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Io238\ISOCountries\Models\Country as ISOCountry;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach (ISOCountry::all()->toArray() as $country) {
            Country::create([
                'name' => $country['name']['en'],
                'code' => $country['id'],
                'calling_code' => '+'.$country['calling_code'],
                'region' => $country['region'],
                'subregion' => $country['subregion'],
                'alpha3' => $country['alpha3'],
            ]);
        }
    }
}
