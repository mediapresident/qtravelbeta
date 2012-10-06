<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'travel';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    public $slideImages = array();
    public $continent = 'EU';
    public $session, $region;
    
    public $breadCrumb;
    
    public $indian = array('IN','SL','BD','BT','PK');
    public $middleEast = array('BH','IQ','IR','IL','JO','KW','LB','OM','PL','QA','SA','SY','AE','YE');
    public $map = array(
        'AS' => 'AS',
        'OC' => 'AS',
        'AF' => 'ME',
        'EU' => 'EU',
        'NA' => 'NA',
        'SA' => 'SA',
        'AN' => 'EU'
    );

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $searchForm, $callbackForm, $subscribeForm;

    public function init() {
        $this->_setRegion();
        $this->searchForm = new SearchForm();
        if (isset($_GET['SearchForm'])) {
            $this->searchForm->attributes = $_GET['SearchForm'];
        }
        $this->callbackForm = new EnquiryForm('callback');
        if (isset($_POST['EnquiryForm'])) {
            $this->callbackForm->attributes = $_POST['EnquiryForm'];
        }

        $this->slideImages = array(
            '/images/slider/2.jpg',
            '/images/slider/3.jpg',
            '/images/slider/4.jpg',
            '/images/slider/5.jpg',
            '/images/slider/6.jpg',
            '/images/slider/7.jpg',
            '/images/slider/1.jpg'
        );
    }

    private function _setRegion() {
        if (!$this->session) {
            $this->session = new CHttpSession;
            $this->session->open();
        }
        if(!isset($this->session['region'])){
            if(isset($_SERVER['GEOIP_COUNTRY_CODE'])&&in_array($_SERVER['GEOIP_COUNTRY_CODE'],$this->indian)){
                $this->session['region'] = 'IN';
            }else if(isset($_SERVER['GEOIP_COUNTRY_CODE'])&&in_array($_SERVER['GEOIP_COUNTRY_CODE'], $this->middleEast)){
                $this->session['region'] = 'ME';
            }else{
                $this->session['region'] = isset($_SERVER['GEOIP_CONTINENT_CODE'])?$_SERVER['GEOIP_CONTINENT_CODE']:$this->continent;
            }
        }
        $this->region = $this->session['region'];
    }

}