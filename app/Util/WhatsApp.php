<?php


namespace App\Util;


class WhatsApp
{
    const CLICK_AND_CHAT_URL = 'https://wa.me';

    public static function getClickAndChatUrl($telephone, $text = '')
    {
        $result = self::CLICK_AND_CHAT_URL;
        $result .= '/'.self::formatPhoneNumber($telephone);

        $args = [];
        if($text) {
            $args['text'] = utf8_encode($text);
        }

        if($args) {
            $result .= '?'.http_build_query($args);
        }

        return $result;
    }

    private static function formatPhoneNumber($telephone)
    {
        return preg_replace("/[^0-9\.]/", '', $telephone);;
    }

}
