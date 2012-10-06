<?php

class Q extends CComponent {

    public static function getTopOffers() {
        $c = new CDbCriteria();
        $c->limit = 5;
        $c->with = array('hotel', 'hotel.featuredImage', 'hotel.city.country');
        $c->addCondition('live = 1 AND showonhp = 1 AND continent_code = :region');
        $c->params[':region'] = Q::getRegion();
        $o = Offer::model()->findAll($c);
        if (count($o))
            return $o;
        else
            $c->params[':region'] = 'EU';
        return Offer::model()->findAll($c);
    }

    public static function getPhone($region = NULL) {
        $region = Continent::model()->findByAttributes(array('code' => $region));
        $office = $region->office;
        if ($office)
            return $office->phone;
        else
            return false;
    }

    public static function getRegions() {
        $c = new CDbCriteria();
        $c->with = array('countries');
        $c->order = 't.name ASC';
        $r = Region::model()->findAll($c);
        return $r;
    }

    public static function getRegion() {
        $c = Yii::app()->controller;
        return $c->region;
    }

    public static function getOfferSlug() {
        $m = Continent::model()->findByAttributes(array('code' => Q::getRegion(), 'state' => Continent::ACTIVE));
        if ($m)
            return 'offers-' . $m->slug;
        else
            return 'offers-europe';
    }

    public static function slug($str, $replace = array(), $delimiter = '-') {
        $str = Q::alt($str);
        if (!empty($replace)) {
            $str = str_replace((array) $replace, ' ', trim($str));
        }
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        return $clean;
    }

    public static function trunc($text, $link, $length = '100', $params = array()) {
        $text = strip_tags($text);
        return substr($text, 0, $length) . CHtml::link('...Read More', $link, $params);
    }

    public static function getRelated($city, $country, $region, $ignore = 0) {
        if ($city->hotels && count($city->hotels) > 6) {
            $output = array_slice($city->hotels, 0, 6);
        } else if (($h = $country->hotels) && count($h) > 6) {
            $output = array_slice($h, 0, 6);
        } else if (($h = $region->hotels) && count($h) > 6) {
            $output = array_slice($h, 0, 6);
        }
        foreach ($output as $k => &$o) {
            if ($o->id == $ignore)
                unset($output[$k]);
        }
        return array_slice($output, 0, 5);
    }

    public static function getImagePlaceHolder($image, $element, $type, $thumbnail = 0) {
        if ($thumbnail) {
            $image = dirname($image) . '/thumb/' . basename($image);
        }
        return '<div class="imgwrap"><div class="image_uploader" thumbnail="' . $thumbnail . '" type="' . $type . '"></div>' . $element . CHtml::image($image, 'no-image', array('class' => 'imgholder')) . "</div>";
    }

    public static function getMultiImagePlaceHolders($images, $elementName, $type, $thumbnail = 0) {

        $holders = array();
        $deleteBtn = CHtml::link('Delete', '#', array('class' => 'delete-btn', 'onclick' => 'deleteImage(this);return false;'));
        $cropBtn = CHtml::link('Crop', '#', array('class' => 'crop-btn', 'onclick' => 'cropImage(this);return false;'));
        $featBtn = "<div class='feat-btn'>Featured Image</div>";
        $holders[] = '<div class="holder template">' . $deleteBtn . $cropBtn . $featBtn . CHtml::hiddenField($elementName . '[]', '') . CHtml::image('', '', array('onclick' => 'setFeatured(this); return false;')) . '</div>';

        foreach ($images as $k => $image) {
            if ($thumbnail) {
                $thumb = dirname($image) . '/thumb/' . basename($image);
            } else {
                $thumb = dirname($image) . basename($image);
            }
            $holders[] = '<div class="holder" rel="' . basename($image) . '" >' . $deleteBtn . $cropBtn . $featBtn . CHtml::hiddenField($elementName . '[' . $k . ']', basename($image)) . CHtml::image($thumb, '', array('onclick' => 'setFeatured(this); return false;')) . '</div>';
        }

        return '<div class="imgwrap"><div class="multi_uploader" thumbnail="' . $thumbnail . '" type="' . $type . '"></div><div class="holders" thumbnail="' . $thumbnail . '" type="' . $type . '">' . implode('', $holders) . "</div></div>";
    }

    public static function resizeImage($file, $folder, $thumbnail, $saveOrig) {
        Yii::import('application.vendors.WideImage.WideImage');

        //$w = WideImage::load($folder . $file);

        if ($saveOrig) {
            WideImage::load($folder . $file)->resize(1600, 1600, 'outside', 'down')->saveToFile($folder . 'orig/' . $file);
        }

        if ($thumbnail) {
            WideImage::load($folder . $file)->resize(312, 152, 'outside', 'any')->crop('center', 'center', 312, 152)->saveToFile($folder . 'thumb/' . $file);
            WideImage::load($folder . $file)->resize(960, 460, 'outside', 'any')->crop('center', 'center', 960, 460)->saveToFile($folder . $file);
        } else {
            WideImage::load($folder . $file)->resize(312, 152, 'outside', 'any')->crop('center', 'center', 312, 152)->saveToFile($folder . $file);
        }
    }

    public static function minSizeCheck($file, $size) {
        $i = getimagesize($file);
        if ($i[0] >= $size[0] && $i[1] >= $size[1]) {
            return true;
        } else {
            return false;
        }
    }

    public static function formatMail($attr) {
        $output = "Hi,\n";

        $output .= "A new enquiry from " . $attr['name'] . "\n";
        $output .= isset($attr['url']) ? "You can view the page in question by going to - " . $attr['url'] . " \n" : "";

        $output .= "\n\nDetails of potential customer: \n";
        $output .= isset($attr['name']) ? "Name: " . $attr['name'] . "\n" : "";
        $output .= isset($attr['email']) ? "Email: " . $attr['email'] . "\n" : "";
        $output .= isset($attr['phone']) ? "Phone: " . $attr['phone'] . "\n" : "";
        $output .= isset($attr['date']) ? "Dates: " . $attr['dates'] . "\n" : "";
        $output .= isset($attr['size']) ? "Party Size: " . $attr['size'] . "\n" : "";
        $output .= isset($attr['country']) ? "From Country: " . $attr['country'] . "\n" : "";
        $output .= isset($attr['comment']) ? "\n
Additional Comments:\n
-----------------------------------\n
" . $attr['comment'] . "\n
-----------------------------------\n" : "";

        $output .="Kind Regards, \n
Quintessentially Travel Website";
        return $output;
    }

    public static function formatSubject($attr) {
        $output = $attr['name'] . ' has enquired ';
        if (isset($attr['url'])) {
            try {
                $name = array_pop(explode('/', $attr['url']));
                $output .= "about " . $name;
            } catch (Exception $e) {
                
            }
        }
        return $output;
    }

    public static function subscribe($form, $region) {
        $params = array(
            'first_name' => $form->name,
            'last_name' => '',
            'email' => $form->email,
            'country' => isset($_SERVER['GEOIP_COUNTRY_CODE_ISO']) ? $_SERVER['GEOIP_COUNTRY_CODE_ISO'] : 'GBR',
            'language' => 'en',
            'list_id' => 36
        );

        $data = array(
            'params' => $params,
            'action' => 'add_subscription',
            'username' => 'qtravel',
            'password' => 'tre3le'
        );
        $url = "https://api.quintessentially.com";
        Yii::app()->CURL->run($url, FALSE, $data);
        if ($list = Yii::app()->params['list'][$region]) {
            $params['list_id'] = $list['id'];
            $data['params'] = $params;
            Q::mailSubscription($form, $list['name']);
            return Yii::app()->CURL->run($url, FALSE, $data);
        }
    }

    public static function mailSubscription($form, $name) {
        $subject = $form->name . " - new newsletter subscription";
        $message = $form->name . " (" . $form->email . ") has subscribed to 'Quintessentially Travel Newsletter' and '" . $name . " newsletter'";
        mail(Yii::app()->params['adminEmail'], $subject, $message, "From: Web Enquiry <web@quintessentiallytravel.com>");
    }

    public static function flatten_GP_array(array $var, $prefix = false) {
        $return = array();
        foreach ($var as $idx => $value) {
            if (is_scalar($value)) {
                if ($prefix) {
                    $return[$prefix . '[' . $idx . ']'] = $value;
                } else {
                    $return[$idx] = $value;
                }
            } else {
                $return = array_merge($return, flatten_GP_array($value, $prefix ? $prefix . '[' . $idx . ']' : $idx));
            }
        }
        return $return;
    }

    public static function alt($url) {
        $url = strtolower($url);
        $replace = array(
            'caribbean' => 'caribbean-mexico'
        );
        return isset($replace[$url]) ? $replace[$url] : $url;
    }

    public static function redirect($page) {
        $redirect = array(
        'spa-holidays' => 'holiday/12-mind-body-soul',
        );
        return isset($redirect[$page])?$redirect[$page]:false;
    }

}

?>
