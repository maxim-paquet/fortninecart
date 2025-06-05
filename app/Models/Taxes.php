<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'rate',
        'country_code',
        'region_code',
    ];

    /**
     * @param string $countryCode
     * @param string $regionCode
     * @return array
     */
    public static function getTaxRatesForCountryAndRegion(string $countryCode, string $regionCode): array
    {
        $taxRates = [];
        if ($countryRate = self::where('country_code', $countryCode)->whereNull('region_code')->first()) {
            $taxRates[] = $countryRate;
        }
        if ($regionRate = self::where('country_code', $countryCode)->where('region_code', $regionCode)->first())
        {
            $taxRates[] = $regionRate;
        }
        return $taxRates;
    }
}
