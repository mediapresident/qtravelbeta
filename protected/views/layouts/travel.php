<!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($this->meta['title']) ? $this->meta['title'] : "Quintessentially Travel"; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
        <meta name="description" content="<?php echo $this->meta['description']; ?>" />
        <meta name="keywords" content="<?php echo $this->meta['keywords']; ?>" />
        <?php
        if (isset($this->meta['canonical']) && $this->meta['canonical']):
            ?>
            <link rel="canonical" href="<?php echo $this->meta['canonical']; ?>" />
            <?php
        endif;
        ?>
        <link href="/css/fonts/style.css" type="text/css" rel="stylesheet">
        <link href="/css/common.css" type="text/css" rel="stylesheet">
        <link href="/css/jquery-ui-1.8.18.custom.css" type="text/css" rel="stylesheet">
        <link href="/css/slimbox2.css" type="text/css" rel="stylesheet">
        <?php
        $cs = Yii::app()->clientScript;
        $cs->registerPackage('jquery', CClientScript::POS_HEAD);
        $cs->registerScriptFile('/js/jquery.nivo.slider.pack.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile('/js/swfobject.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile('/js/slimbox2.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile('/js/jquery.placeholder.min.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile('/js/script.js', CClientScript::POS_HEAD);
        ?>
        <script type="text/javascript">var switchTo5x=true;</script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "ur-db23f289-c16a-8058-425c-4546c993ae8c"}); </script>

        <script type='text/javascript'>
            var googletag = googletag || {};
            googletag.cmd = googletag.cmd || [];
            (function() {
                var gads = document.createElement('script');
                gads.async = true;
                gads.type = 'text/javascript';
                var useSSL = 'https:' == document.location.protocol;
                gads.src = (useSSL ? 'https:' : 'http:') + 
                    '//www.googletagservices.com/tag/js/gpt.js';
                var node = document.getElementsByTagName('script')[0];
                node.parentNode.insertBefore(gads, node);
            })();
        </script>

        <script type='text/javascript'>
            googletag.cmd.push(function() {
                googletag.defineSlot('/1100179/QTravel', [728, 90], 'div-gpt-ad-1332946269942-0').addService(googletag.pubads());
                googletag.pubads().enableSingleRequest();
                googletag.enableServices();
            });
        </script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-5364989-12']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    <body>
        <div class="wrap">
            <div class="header">
                <a href="/" class="logo"><?php echo "Quintessentially Travel"; ?></a>
                <div class="contact-info">

                    <a href="/contact"><span class="contact-btn">
                            <span class="mail-icon"></span>Contact
                        </span></a>
                    <span class="phone"><?php echo Q::getPhone($this->region); ?></span>
                </div>
                <div class="clear"></div>
                <ul id="nav">
                    <li class="first"><a href="/">home</a></li>
                    <li class="destination"><a href="/destinations">destinations</a>
                        <div class="destination-dropdown">
                            <?php $this->renderPartial('application.views.main._destinations'); ?>
                        </div>
                    </li>
                    <li><a href="/holiday">holiday types</a></li>
                    <li><a href="/<?php echo Q::getOfferSlug(); ?>">offers</a></li>
                    <!-- <li><a href="/press">word of mouth</a></li>-->
                    <li class="last"><a href="/team">meet the team</a></li>
                </ul>
            </div>

            <div class="slideshow">
                <div class="slideImages" id="slideImages">
                    <?php
                    if ($this->slideImages):

                        if ($im = array_pop($this->slideImages)) {
                            echo CHtml::image($im);
                        }
                        ?>
                        <script>
                            var lazyImages = ["<?php echo implode('","', $this->slideImages); ?>"];
                        </script>
                        <?php
                    endif;
                    ?>
                </div>
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
                <?php else: ?>

                    <script>                    
                        var flashvars = {},
                        params = {wmode:"transparent"};
                        attributes = {};
                        swfobject.embedSWF("/images/banner.swf", "slideImages", "960", "458", "9.0.0", null, flashvars, params, attributes);
                    </script>
                <?php endif; ?>
            </div>
            <div class="content">
                <?php
                if ($this->breadCrumb):
                    echo "<div class='row'><div class='col triple'>";
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadCrumb
                    ));
                    echo "</div></div>";
                endif;
                ?>
<?php echo $content; ?>
                <div class="clear"></div>
            </div>
            <div class="footer">
                <div class="ad">
                    <!-- QTravel -->
                    <div id='div-gpt-ad-1332946269942-0' style='width:728px; height:90px; margin: 0 auto;'>
                        <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1332946269942-0'); });
                        </script>
                    </div>
                </div>
                <div class="links">
                    <a class="fl icon ba">British Airways</a>
                    <a class="fl icon emirates">Emirates</a>
                    <div class="mid">
                        <ul>
                            <li><a href="/booking-conditions">Booking conditions</a></li>
                            <li><a href="/copyright">Copyright</a></li>
                            <li><a href="/disclaimer">Disclaimer</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>

                        <div class="ftext">Part of the <?php echo CHtml::link('Quintessentially Group', 'http://www.quintessentiallygroup.com', array('target' => '_blank')); ?> &nbsp;|&nbsp; Copyright &COPY; 2012 Quintessentially Travel All rights reserved &nbsp;|&nbsp; Web Design by <?php echo CHtml::link('Quintessentially Design', 'http://www.quintessentiallydesign.com', array('target' => '_blank')); ?></div>

                    </div>
                    <a class="fr icon atil" href="http://www.caa.co.uk/application.aspx?catid=490&pagetype=65&appid=2&mode=detailnosummary&atolNbr=9951"  target="_blank">ATOL</a>
                    <div class="clear"></div>
                    <div class="footer-links"> <a class="nav" href="/holiday/13-safari">Luxury Safari Holidays</a> | 
                        <a class="nav" href="/341-australasia-pacific">Luxury Australia Holidays</a> |  
                        <a class="nav" href="/145-indian-ocean">Luxury Indian Ocean Holidays</a>  | 
                        <a class="nav" href="/144-europe">Luxury European Holidays</a>  | 
                        <a class="nav" href="/371-caribbean-mexico">Luxury Caribbean Holidays</a> <br/>
                        <a class="nav" href="/311-india">Luxury India Tours</a>  | 
                        <a class="nav" href="/141-the-americas">Luxury South America Holidays</a> | 
                        <a class="nav" href="/141-north-america-bermuda">Luxury North America Holidays</a>  | 
                        <a class="nav" href="/holiday/12-mind-body-soul">Luxury Spa Holidays</a>  | 
                        <a class="nav" href="/holiday">Luxury Adventure Holidays</a></div>
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
                'modal' => true
            ),
        ));

        $this->endWidget('zii.widgets.jui.CJuiDialog');
        ?>
    </body>
</html>