<?php

class MainController extends Controller {

    public $meta = array('keywords' => '', 'description' => '', 'title' => '');
    public $isHome = 0;

    public function actionCities() {
        $this->render('cities');
    }

    public function actionContact() {
        $c = new CDbCriteria;
        $c->order = 'position ASC';
        $model = Office::model()->findAll($c);
        $this->render('contact', array('model' => $model));
    }

    public function actionCountries() {
        if (isset($_GET['region']) && $region = Region::model()->findByPk($_GET['region'])) {
            $c = new CDbCriteria;
            $c->addCondition('region_id = :region');
            $c->params[':region'] = $_GET['region'];
            $c->order = 'name ASC';
            $model = Country::model()->findAll($c);

            $itineraries = $region->itineraries;

            $this->meta['keywords'] = $region->meta_keywords;
            $this->meta['description'] = $region->meta_description;
            $this->meta['title'] = $region->title;
            $this->meta['canonical'] = $this->createAbsoluteUrl('/' . $region->id . '-' . Q::slug($region->name));
            $this->render('countries', array('model' => $model, 'region' => $region, 'itineraries' => $itineraries));
        }
    }

    public function actionDestinations() {
        $model = Region::model()->findAll();
        $this->meta['canonical'] = $this->createAbsoluteUrl('/destinations');
        $this->render('destinations', array('model' => $model));
    }

    public function actionItinerary() {
        if (isset($_GET['id']) && ($model = Itinerary::model()->findByPk($_GET['id']))) {

            $this->render('itinerary', array('model' => $model));
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
            if ($model) {
                $this->meta['keywords'] = $model->meta_keywords;
                $this->meta['description'] = $model->meta_description;
                $this->meta['title'] = $model->name;

                $this->meta['canonical'] = $this->createAbsoluteUrl('/hotel/' . $model->id . '-' . Q::slug($model->name));
                if ($model && $model->images) {
                    $this->slideImages = array();
                    foreach ($model->images as $im) {
                        $this->slideImages[] = $im->main_url;
                    }
                }
                $this->render('hotel', array('model' => $model));
            } else {
                throw new CHttpException(404, 'The specified Hotel cannot be found.');
            }
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
            $this->meta['canonical'] = $this->createAbsoluteUrl('/' . $d['type'] . $model->id . '-' . Q::slug($model->name));
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
            $this->meta['description'] = $model->description;
            $this->meta['title'] = $model->title;

            $this->meta['canonical'] = $this->createAbsoluteUrl('/' . (isset($_GET['page']) ? $_GET['page'] : ''));

            $this->render($model->template, array('model' => $model));
        } else {
            if ($red = Q::redirect($_GET['page']))
                $this->redirect($red);
            else
                throw new CHttpException(404, 'The specified page cannot be found.');
        }
    }

    public function actionOffers($code) {
        if ($data['model'] = Continent::model()->findByAttributes(array('slug' => $code, 'state' => Continent::ACTIVE))) {
            $c = new CDbCriteria();
            $c->addCondition('`continent_code` = :code AND `live` = 1');
            $c->params[':code'] = $data['model']->code;
            $c->order = 'position ASC';
            $data['offers'] = Offer::model()->findAll($c);
            $this->render('offers', $data);
        } else {
            throw new CHttpException(404, 'The specified Page cannot be found.');
        }
    }

    public function actionHoliday() {

        $model = Holiday::model()->with('map')->findByPk($_GET['id']);
        if ($model) {
            $this->meta['keywords'] = isset($model->meta_keywords) ? $model->meta_keywords : "";
            $this->meta['description'] = isset($model->meta_description) ? $model->meta_description : "";
            $this->meta['title'] = isset($model->title) ? $model->title : "";
            $this->meta['canonical'] = $this->createAbsoluteUrl('/holiday/' . $model->id . '-' . Q::slug($model->name));
        }

        $this->render('hols', array('model' => $model));
    }

    public function actionTestimonials() {
        $this->render('testimonials');
    }

    public function actionRegion() {
        //print_r($_SERVER);
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
             $this->render('error', $error);
        }
    }

    public function actionAd() {
        echo $this->renderPartial('ad');
    }

    public function actionRedirect() {
        $redirects = array(
            'about-us' => '/team',
            '301-latin-america' => '/141-the-americas',
        );

        if (isset($_GET['page'])) {
            if (isset($redirects[$_GET['page']])) {
                header('location:' . $redirects[$_GET['page']]);
            }
        } else {
            echo $_GET['page'];
        }
    }

    public function actionSitemap() {
        
    }

}