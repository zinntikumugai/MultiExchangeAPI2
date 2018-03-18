<?php

namespace MEAPI2\Model;
class zaif extends \MEAPI2\Module\BaseModel {
    const NAME = "Zaif";
    const APIVER = "1.1.1";
    const LIBRARYVER = "1.0.0";
    const BASEURL = 'https://api.zaif.jp/api/1/';
    const SYMBOL = '_';

    const DEFMARKET = 'btc_jpy';
    
    public function __construct() {
        
    }

    private static function pub($end, $prm) {
        $url = self::BASEURL .$end .'/' .$prm;
        return yield self::get($url);
    }

    public static function pair($marketname = 'all') {
        $data = yield self::pub('currency_pairs', $marketname);
        return $data;
    }

    public static function curr($currency = 'all') {
        $data = yield self::pub('currencies', 'all');
        return $data;
    }

    public static function sw($action = 'last_price', $market = self::DEFMARKET) {
        switch($action) {
            case 'last_price':
            case 'ticker':
            case 'trades':
            case 'depth':
                break;
            default:
               throw new Expation("not found action");
        }
        $data = yield self::pub($action, $market);
        return $data;
    }

}