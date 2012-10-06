<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fileuploader.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web-app-theme/base.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web-app-theme/override.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/web-app-theme/themes/default/style.css" type="text/css" media="screen"/>
        <script src="/js/fileuploader.js"></script>
        <script src="/js/admin.js"></script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>
                    <a href="<?php echo Yii::app()->homeUrl; ?>"><?php echo Yii::app()->name; ?></a>
                </h1>
                <div id="user-navigation">
                    <?php
                    if (!Yii::app()->user->isGuest) {
                        $this->widget('zii.widgets.CMenu', array(
                            'items' => array(
                                array('label' => 'Logout', 'url' => array('/site/logout'), 'linkOptions' => array('class' => 'logout'), 'visible' => !Yii::app()->user->isGuest),
                            ),
                            'htmlOptions' => array(
                                'class' => 'wat-cf',
                            ),
                        ));
                    }
                    ?>
                </div>
                <div id="main-navigation">
                    <?php
                    if (!Yii::app()->user->isGuest) {
                        $this->widget('zii.widgets.CMenu', array(
                            'items' => array(
                                array('label' => 'Home', 'url' => Yii::app()->homeUrl),
                                array('label' => 'Page', 'url' => '/admin/page'),
                                array('label' => 'Region', 'url' => '/admin/region'),
                                array('label' => 'Country', 'url' => '/admin/country'),
                                array('label' => 'Location', 'url' => '/admin/city'),
                                array('label' => 'Hotel', 'url' => '/admin/hotel'),
                                array('label' => 'Press', 'url' => '/admin/press'),
                                array('label' => 'Testimonial', 'url' => '/admin/testimonial'),
                                array('label' => 'Itinerary', 'url' => '/admin/itinerary'),
                                array('label' => 'Staff', 'url' => '/admin/staff'),
                                array('label' => 'Offer', 'url' => '/admin/offer'),
                                array('label' => 'Holiday Types', 'url' => '/admin/holiday'),
                                array('label' => 'Offices', 'url' => '/admin/office'),
                                array('label' => 'Continents', 'url' => '/admin/continent'),
                            ),
                            'htmlOptions' => array(
                                'class' => 'wat-cf',
                            ),
                        ));
                    }
                    ?>
                </div>
            </div>
            <div id="wrapper" class="wat-cf">
                <?php echo $content; ?>
            </div>
        </div>
        <?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'imdialog',
            // additional javascript options for the dialog plugin
            'options' => array(
                'title' => 'Image Crop',
                'autoOpen' => false,
                'modal' => true,
                'width' => 1100,
                'close' => 'js:refreshImages'
            ),
        ));
        ?>
        <iframe src="" width="1000" height="600" frameborder="0" id="cropFrame"></iframe>
        <?php
        $this->endWidget('zii.widgets.jui.CJuiDialog');
        ?>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">

            bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
        </script>

    </body>
</html>