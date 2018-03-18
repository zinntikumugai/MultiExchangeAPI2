<?php

namespace MEAPI2\Model;
class ccex extends \MEAPI2\Module\BaseModel {
    const NAME = "C-CEX";
    const APIVER = "1.0.0";
    const LIBRARYVER = "1.0.0";
    const BASEURL = 'https://c-cex.com/t/';
    const SYMBOL = '-';

    const DEFMARKET = 'dash-btc';

    public function __construct() {
        
    }

    public static function ticker($action = 'pairs', $parm = []) {
        $url = self::BASEURL;
        switch($action) {
            case 'ticker':
                if(is_string($parm)) {
                    $url .= $parm;
                }else if($parm === [])
                    $url .= self::DEFMARKET;
                else if(count($parm) <2)
                    throw new Expation("opps parm");
                else
                    $url .= self::makeMarket($parm[0], $parm[1]);
                break;

            case 'volume':
                $url .= 'volume_';
                if($parm === [])
                    $url .= 'btc';
                else
                    $url .= $parm[0];
                break;
            case 'pairs':
            case 'prices':
            case 'coinnames':
                $url .= $action;
                break;
            default:
               throw new Expation("not found action");
        }
        $data = yield self::get($url .'.json');
        return $data;
    }

    public static function pub($action = 'getmarkets') {
        switch($action) {
            case 'getmarkets':
            case 'getorderbook':
            case 'getfullorderbook':
            case 'getmarketsummaries':
            case 'getmarkethistory':
            case 'getfullmarkethistory':
            case 'getbalancedistribution':
                break;
            default:
               throw new Expation("not found action");
        }
        $url = self::BASEURL .'api_pub.html?a=' .$action;
        $data = yield self::get($url);
        return $data;
    }
}