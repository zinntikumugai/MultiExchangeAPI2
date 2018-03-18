<?php
namespace MEAPI2\Module;

class BaseModel {
    const NAME = null;
    const APIVER = null;
    const LIBRARYVER = null;
    const BASEURL = null;
    const SYMBOL = null;

    const DEFMARKET = null;

    protected function getAccessEcho($marketName) {
        return self::Name .' <- ' .$marketName;
    }

    protected static function makeMarket($fast, $second) {
        return $fast .self::SYMBOL .$second;
    }

    protected function shapingAmount($amount = 0.0, $shaping = 3) {
        $amount = number_format($amount, $shaping);
        return preg_replace("/\.?0+$/",'',$amount);
    }

    protected static function curlInitWith($url, $options = []) {
        $ch = curl_init();
        $options = array_replace([
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
		], $options);
		curl_setopt_array($ch, $options);
		return $ch;
    }

    protected function nowtime($format = 'Y-m-d H:i:s', $timezone = 'Asia/Tokyo') {
        $date = new DateTime('', new DateTimeZone($timezone));
        return $date->format($format);
    }

    protected static function get($url) {
        /* */echo $url .PHP_EOL;
        $json = yield self::curlInitWith($url);
        return json_decode($json);
    }

    protected function check($patan = '', $data = '') {
        return (stripos($data, $patan) !== false) ? true:false;
    }

}

