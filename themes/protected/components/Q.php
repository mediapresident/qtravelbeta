<?php

class Q extends CComponent {

    public static function getTopOffers() {
        $c = new CDbCriteria();
        $c->limit = 5;
        $c->with = array('hotel', 'hotel.featuredImage', 'hotel.city.country');
        $c->addCondition('live = 1');
        $o = Offer::model()->findAll($c);
        if (count($o))
            return $o;
        else
            return false;
    }

    public static function getRegions() {
        $c = new CDbCriteria();
        $c->with = array('countries');
        $r = Region::model()->findAll($c);
        return $r;
    }

    public static function slug($str, $replace = array(), $delimiter = '-') {
        if (!empty($replace)) {
            $str = str_replace((array) $replace, ' ', $str);
        }
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        return $clean;
    }
    
    public static function trunc($text, $link, $length = '100'){
        $text = strip_tags($text);
        return substr($text,0,$length).CHtml::link('...Read More', $link);
    }
    
    public static function getRelated($city, $country, $region){
        if($city->hotels && count($city->hotels) > 5){
            return array_slice($city->hotels, 0, 5);
        }else if(($h = $country->hotels) && count($h) > 5){
            return array_slice($h, 0, 5);
        }else if(($h = $region->hotels) && count($h) > 5){
            return array_slice($h, 0, 5);
        }
    }

}

?>
