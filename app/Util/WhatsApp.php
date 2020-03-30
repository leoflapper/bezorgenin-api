<?php


namespace App\Util;


use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class WhatsApp
{
    const CLICK_AND_CHAT_URL = 'https://wa.me';

    /**
     * @param $telephone
     * @param string $text
     * @return string
     */
    public static function getClickAndChatUrl($telephone, string $countryId = '', $text = ''): string
    {
        $result = self::CLICK_AND_CHAT_URL;
        $result .= '/'.self::formatPhoneNumber($telephone, $countryId);

        $args = [];
        if($text) {
            $args['text'] = utf8_encode($text);
        }

        if($args) {
            $result .= '?'.http_build_query($args);
        }

        return $result;
    }

    /**
     * @param $telephone
     * @param string $countryId
     * @return string
     */
    private static function formatPhoneNumber($telephone, string $countryId = ''): string
    {
        $result = $telephone;
        $phoneUtil = PhoneNumberUtil::getInstance();

        if(!$countryId) {
            $countryId = config('app.locale');
        }

        try {
            $phoneNumber = $phoneUtil->parse($telephone, strtoupper($countryId));
            $result = $phoneUtil->format($phoneNumber, PhoneNumberFormat::E164);
        } catch (\Exception $e) {}

        return preg_replace("/[^0-9\.]/", '', $result);
    }

}
