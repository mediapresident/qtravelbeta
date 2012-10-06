<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class SearchForm extends CFormModel {

    public $q;
    public $region;
    public $country;
    public $city;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('q,region,country,city', 'safe')
        );
    }

    public function getC() {
        $c = new CDbCriteria();
        if ($this->q) {
            $c->compare('LOWER(t.name)', strtolower($this->q), true, 'OR');
            $c->compare('LOWER(t.description)', strtolower($this->q), true, 'OR');
            $c->compare('LOWER(t.key_points)', strtolower($this->q), true, 'OR');
        }
        $c->addCondition('status = :status');
        $c->params[':status'] = 'active';

            $type = '';
        if ($this->city) {
            $model = City::model()->findByPk($this->city);
            $c->addCondition('city.id = :cityid');
            $c->params[':cityid'] = $this->city;
            $c->with[] = 'city';
            $type = 'city/';
        } else if ($this->country) {
            $model = Country::model()->findByPk($this->country);
            $c->addCondition('country.id = :countryid');
            $c->params[':countryid'] = $this->country;
            $c->with[] = 'city.country';
            $type = 'country/';
        } else if ($this->region) {
            $model = Region::model()->findByPk($this->region);
            $c->addCondition('region.id = :regionid');
            $c->params[':regionid'] = $this->region;
            $c->with[] = 'city.country.region';
        } else {
            $model = false;
        }
        return array('c' => $c, 'model' => $model, 'type' => $type);
    }

}