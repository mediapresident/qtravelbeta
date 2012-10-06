<?php

class HotelController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl',
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array(
                'allow',
                'actions' => array('index', 'view', 'create', 'update', 'delete'),
                'users' => array('admin'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model = new Hotel('search');
        $model->unsetAttributes();
        if (isset($_GET['Hotel'])) {
            $model->attributes = $_GET['Hotel'];
        }
        if (isset($_GET['ajax'])) {
            $this->renderPartial('_grid', array(
                'model' => $model,
            ));
        } else {
            $this->render('index', array(
                'model' => $model,
            ));
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     */
    public function actionCreate() {
        $model = new Hotel;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Hotel'])) {
            $model->attributes = $_POST['Hotel'];
            if ($model->save()) {
                if (isset($_POST['Hotel']['images'])) {
                    $data = array();
                    $base = '/media/hotel/';
                    $featured = basename($_POST['featured']);
                    foreach ($_POST['Hotel']['images'] as $image) {
                        if($image){
                            $image = basename($image);
                            if($featured == $image)$default = 'y';
                            else $default = 'n';
                            $data[] = array('hotel_id' => $model->id, 'thumbnail_url' => $base . 'thumb/' . $image, 'main_url' => $base . $image, 'original_url' => $base . 'orig/' . $image, 'default_image' => $default);
                        }
                    }
                    $model->setRelationRecords('images', $data);
                    $model->save();
                }
                $this->redirect(array('update', 'id' => $model->id));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Hotel'])) {
            $model->attributes = $_POST['Hotel'];
            if ($model->save()) {

                if (isset($_POST['Hotel']['images'])) {
                    $data = array();
                    $base = '/media/hotel/';
                    $featured = basename($_POST['featured']);
                    foreach ($_POST['Hotel']['images'] as $image) {
                        if($image){
                            $image = basename($image);
                            if($featured == $image)$default = 'y';
                            else $default = 'n';
                            $data[] = array('hotel_id' => $model->id, 'thumbnail_url' => $base . 'thumb/' . $image, 'main_url' => $base . $image, 'original_url' => $base . 'orig/' . $image, 'default_image' => $default);
                        }
                    }
                    $model->setRelationRecords('images', $data);
                    $model->save();
                }

                $this->redirect(array('update', 'id' => $id));
            }
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Hotel::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'hotel-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
