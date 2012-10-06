<div class="row">
    <div class="col triple">
        <h1>Our Offices</h1>
        <?php $email = ($this->region == 'IN')?'India@QuintessentiallyTravel.com':'Info@QuintessentiallyTravel.com'; ?>
        General Email Enquiries:  <a href="<?php echo $email; ?>"><?php echo $email; ?></a>
        
    </div>
    <?php foreach ($model as $k => $m): ?>
        <div class="col">
            <h3><?php echo $m->name; ?></h3>
            <?php echo nl2br($m->address); ?>
            <?php if ($m->phone) echo "<br/>Telephone : " . $m->phone; ?>
        </div>
        <?php if (!(($k + 1) % 3)) echo "<div class='clear'></div>"; ?>
    <?php endforeach; ?>
    <div class="clear"></div>
    <div class="col">
        <h2>Follow us on these sites</h2>
        
        <div class="social-btns">
            <ul>
                <li><a href="http://twitter.com/#!/QuintTravel" class="twitter-btn" target="_blank">Follow us On Twitter</a></li>
                <li><a href="http://www.facebook.com/QuintTravel" class="facebook-btn" target="_blank">Facebook</a></li>
                <li><a href="http://www.youtube.com/user/quintessentiallytv" class="youtube-btn" target="_blank">Youtube</a></li>
                <li><a href="http://www.eleqt.com" class="eleqt-btn" target="_blank">EleQt</a></li>
                <li><a href="http://www.linkedin.com/company/quintessentially-travel" class="linkedin-btn" target="_blank">LinkedIn</a></li>
            </ul>
            <div class="clear"></div>
        </div>

    </div>

    <div class="clear"></div>
    <div class="col triple z">
        <h2>Meet the rest of our family</h2>
    </div>
    <div class="col">
        <a href="http://www.quintessentiallyaviation.com" target="_blank">
        <h3>Quintessentially Aviation</h3>
        <img src="/images/qav.jpg">
        </a>
    </div>
    <div class="col">
        <a href="http://www.quintessentiallyescape.com" target="_blank">
        <h3>Quintessentially Escape</h3>
        <img src="/images/qes.jpg">
        </a>
    </div>
    <div class="col">
        <a href="http://www.quintessentiallyvillas.com" target="_blank">
        <h3>Quintessentially Villas</h3>
        <img src="/images/qvi.jpg">
        </a>
    </div>
</div>