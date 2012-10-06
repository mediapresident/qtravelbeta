<!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($this->meta['title']) ? $this->meta['title'] : "Quintessentially Travel"; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="description" content="<?php echo $this->meta['description']; ?>" />
        <meta name="keywords" content="<?php echo $this->meta['keywords']; ?>" />
        <link href="/css/fonts/style.css" type="text/css" rel="stylesheet">
        <link href="/css/common.css" type="text/css" rel="stylesheet">

        <?php
        $cs = Yii::app()->clientScript;
        $cs->registerPackage('jquery', CClientScript::POS_HEAD);
        $cs->registerScriptFile('/js/script.js', CClientScript::POS_HEAD);
        ?>
        <script type="text/javascript">var switchTo5x=true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "ur-db23f289-c16a-8058-425c-4546c993ae8c"}); </script>
    <body>
        <div class="wrap">
            <div class="header">
                <a href="/" class="logo"><h1>Quintessentialy Travel</h1></a>
                <div class="contact-info">

                    <a href="/contact"><span class="contact-btn">
                            <span class="mail-icon"></span>Contact
                        </span></a>

                    <span class="phone">+1 212 206 6633</span>
                </div>
                <div class="clear"></div>
                <ul id="nav">
                    <li class="first"><a href="/">home</a></li>
                    <li class="destination"><a href="/destinations">destinations</a>
                        <div class="destination-dropdown">
                            <?php $this->renderPartial('application.views.main._destinations'); ?>
                        </div>
                    </li>
                    <li><a href="/holiday">holiday type</a></li>
                    <li><a href="/offers">offers</a></li>
                    <li><a href="/press">word of mouth</a></li>
                    <li class="last"><a href="/team">meet the team</a></li>
                </ul>
            </div>
            <div class="slideshow">
                <?php if (!$this->isHome): ?>
                    <div class="search-slider">
                        <div class="row heading" onclick="$(this).siblings('.row.tools').slideToggle();">
                            <div class="col">Quick Search</div>
                            <div class="col">Request CallBack</div>
                            <div class="col">Sign up to newsletter</div>
                            <div class="clear"></div>
                        </div>
                        <div class="row tools">
                            <div class="col">
                                <?php $this->renderPartial('application.views.main._search'); ?>
                            </div>
                            <div class="col">
                                <?php $this->renderPartial('application.views.main._callback'); ?>
                            </div>
                            <div class="col">
                                <?php $this->renderPartial('application.views.main._subscribe'); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="content">
                <?php echo $content; ?>
                <div class="clear"></div>
            </div>
            <div class="footer">
                <div class="ad"></div>
                <div class="links">
                    <a class="fl icon ba" href="#">British Airways</a>
                    <a class="fl icon emirates" href="#">Emirates</a>
                    <div class="mid">
                        <ul>
                            <li><a href="/booking-conditions">Booking conditions</a></li>
                            <li><a href="/copyright">Copyright</a></li>
                            <li><a href="/disclaimer">Disclaimer</a></li>
                            <li><a href="/sitemap">Sitemap</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>

                        <div class="ftext">Part of the Quintessentially Group &nbsp;|&nbsp; Copyright &COPY; 2012 Quintessentially Travel All rights reserved &nbsp;|&nbsp; Web Design by Quintessentially Design</div>

                    </div>
                    <a class="fr icon atil" href="#">ATIL</a>
                    <div class="clear"></div>
                    <div class="footer-links"> <a class="nav" href="/142-africa">Luxury Safari Holidays</a> | 
                        <a class="nav" href="/341-australasia-pacific">Luxury Australia Holidays</a> |  
                        <a class="nav" href="/145-indian-ocean">Luxury Indian Ocean holidays</a>  | 
                        <a class="nav" href="/144-europe">Luxury Europe Tours</a>  | 
                        <a class="nav" href="/371-caribbean-mexico">Luxury Caribbean &amp; Mexico Tours</a> <br/>
                        <a class="nav" href="/311-india">Luxury India Tours</a>  | 
                        <a class="nav" href="/301-latin-america">Luxury Latin America Tours</a> | 
                        <a class="nav" href="/141-north-america-bermuda">Luxury North America Holidays</a>  | 
                        <a class="nav" href="/spa-holidays">Luxury spa holidays</a>  | 
                        <a class="nav" href="/adventure-holidays">Luxury adventure holidays</a></div>
                </div>
            </div>
        </div>
        <?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'qtdialog',
            // additional javascript options for the dialog plugin
            'options' => array(
                'title' => 'Thank You',
                'autoOpen' => false,
            ),
        ));

        $this->endWidget('zii.widgets.jui.CJuiDialog');
        ?>
    </body>
</html>