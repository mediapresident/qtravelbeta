<?php

class ImageController extends Controller {

    public function actionIndex() {
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder = Yii::app()->basePath . '/../media/' . $_GET['type'] . '/'; // folder for uploaded files
        $allowedExtensions = array("jpg", "png"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 10 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);

        if ($result && isset($result['success']) && $result['success'] == true) {
            if ($_GET['type'] == 'hotel') {
                $minSize = array(960, 460);
            } else {
                $minSize = array(312, 152);
            }
            if (Q::minSizeCheck($folder . $result['filename'], $minSize)) {
                Q::resizeImage($result['filename'], $folder, $_GET['thumbnail'], ($_GET['type'] == 'hotel'));
                if ($_GET['thumbnail'])
                    $result['thumbpath'] = '/media/' . $_GET['type'] . '/thumb/' . $result['filename'];
                $result['filepath'] = '/media/' . $_GET['type'] . '/' . $result['filename'];
            }else {
                try {
                    unlink($folder . $result['filename']);
                } catch (Exception $e) {
                    
                }
                $result['success'] = false;
                $result['error'] = "Sorry, file too small. Minimum Dimension (width x height) in pixels is (" . implode('x', $minSize) . ")";
            }
        }
        echo json_encode($result);
    }

    public function actionCrop() {
        if (isset($_GET['image']) && $_GET['type']) {
            $image = '/media/' . $_GET['type'] . '/orig/' . basename($_GET['image']);
            $type = $_GET['type'];
            if ($_GET['type'] == 'hotel') {
                $minSize = array(960, 460);
            } else {
                $minSize = array(312, 152);
            }
            
            $size = getimagesize(Yii::app()->basePath . '/..'.$image);
            $trueSize = array_slice($size, 0, 2);
            $this->layout = 'blank';
            $this->render('crop', array('image' => $image, 'type' => $type, 'minSize' => $minSize, 'trueSize' => $trueSize));
        }
    }

    public function actionSaveCrop() {
        if (isset($_POST['image']) && $_POST['type']) {
            Yii::import('ext.jcrop.EJCropper');
            $base = Yii::app()->basePath . '/../media/';
            $type = $_POST['type'];
            $jcropper = new EJCropper();
            $jcropper->thumbPath = $base . $_POST['type'];

            $jcropper->jpeg_quality = 95;
            if ($type == 'hotel') {
                $jcropper->targ_w = 960;
                $jcropper->targ_h = 460;
            } else {
                $jcropper->targ_w = 312;
                $jcropper->targ_h = 152;
            }

            $coords = $jcropper->getCoordsFromPost('imageId');

            $main = $jcropper->crop($base . $_POST['type'] . '/orig/' . $_POST['image'], $coords);


            if ($type == 'hotel') {
                $jcropper->targ_w = 312;
                $jcropper->targ_h = 152;
                $jcropper->thumbPath = $base . $_POST['type'] . '/thumb';

                $thumb = $jcropper->crop($base . $_POST['type'] . '/orig/' . $_POST['image'], $coords);
            }
            echo "Image Successfully Cropped. Please close this dialog to continue editing the Hotel";
        }
    }

}