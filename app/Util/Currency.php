<?php
/**
 * Created by PhpStorm.
 * User: leoflapper
 * Date: 2019-11-27
 * Time: 16:24
 */

namespace App\Util;


class Currency
{

    /**
     * @param $value
     * @return string
     */
    public static function format($value): string
    {
        $value = (float)str_replace(',', '.', $value);

        if(!is_numeric($value) || !is_float($value)) {
            throw new \InvalidArgumentException('Value must be numeric or float');
        }
        return (new \NumberFormatter(\App::getLocale(),  \NumberFormatter::CURRENCY))->formatCurrency($value, 'EUR');
    }

}
