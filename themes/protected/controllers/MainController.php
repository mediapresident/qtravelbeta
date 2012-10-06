<?php

class MainController extends Controller {

    public $meta = array('keywords' => '', 'description' => '', 'title' => '');
    public $isHome = 0;

    public function actionCities() {
        $this->render('cities');
    }

    public function actionContact() {
        $model = Office::model()->findAll();
        $this->render('contact', array('model' => $model));
    }

    public function actionCountries() {
        if (isset($_GET['region']) && $region = Region::model()->findByPk($_GET['region'])) {
            $c = new CDbCriteria;
            $c->addCondition('region_id = :region');
            $c->params[':region'] = $_GET['region'];
            $model = Country::model()->findAll($c);

            $this->meta['keywords'] = $region->meta_keywords;
            $this->meta['description'] = $region->meta_description;
            $this->meta['title'] = $region->title;
            $this->render('countries', array('model' => $model, 'region' => $region));
        }
    }

    public function actionDestinations() {
        $model = Region::model()->findAll();
        $this->render('destinations', array('model' => $model));
    }

    public function actionHoliday() {
        if(isset($_GET['id']) && ($model = Holiday::model()->findByPk($_GET['id']))){
            $this->render('holiday', array('model' => $model));
        }
    }

    public function actionHotel() {
        if (isset($_GET['id'])) {
            $c = new CDbCriteria;
            $c->addCondition('status = :status');
            $c->addCondition('t.id = :id');
            $c->with = array('images', 'city', 'city.country', 'city.country.region');
            $c->params = array('id' => $_GET['id'], ':status' => 'active');
            $model = Hotel::model()->find($c);
            $this->render('hotel', array('model' => $model));
        }
    }

    public function actionHotels() {
        //$c->with = array('featuredImage', 'image');
        $this->searchForm->attributes = $_GET;
        $d = $this->searchForm->getC();
        $c = $d['c'];
        $model = $d['model'];
        if ($model) {
            $this->meta['keywords'] = isset($model->meta_keywords) ? $model->meta_keywords : "";
            $this->meta['description'] = isset($model->meta_description) ? $model->meta_description : "";
            $this->meta['title'] = isset($model->title) ? $model->title : "";
        }
        $dataProvider = new CActiveDataProvider('Hotel', array(
                    'criteria' => $c,
                    'pagination' => array(
                        'pageSize' => 15,
                    ),
                ));

        $this->render('hotels', array('data' => $dataProvider, 'model' => $model));
    }

    public function actionIndex() {
        $c = new CDbCriteria;
        $c->addCondition('url = :url');
        $c->params[':url'] = isset($_GET['page']) ? $_GET['page'] : 'home';
        $model = Page::model()->find($c);
        if ($model) {
            $this->meta['keywords'] = $model->keywords;
            $this->render($model->template, array('model' => $model));
        } else {
            throw new CHttpException(404, 'The specified page cannot be found.');
        }
    }

    public function actionOffers() {
        $this->render('offers');
    }

    public function actionTestimonials() {
        $this->render('testimonials');
    }

    public function actionRegion() {
        
    }

    public function actionError() {
        echo "Page not found";
    }

}