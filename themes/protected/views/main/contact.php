<div class="row">
    <div class="col triple z">
        <h2>Our Offices</h2>
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
        <img src="http://media.quintessentially.com/site/social_new.png" width="196" height="42" border="0" usemap="#Map33" /> 

        <map name="Map33" id="Map33"> 

            <area shape="rect" coords="4,1,34,31" href="http://twitter.com/#!/QuintTravel" target="_blank" alt="Twitter" title="Twitter" /> 

            <area shape="rect" coords="33,2,63,31" href="http://www.facebook.com/QuintTravel" target="_blank" alt="Facebook" title="Facebook" /> 

            <area shape="rect" coords="66,3,96,32" href="http://www.youtube.com/user/quintessentiallytv" target="_blank" alt="You Tube" title="You Tube" /> 

            <area shape="rect" coords="99,3,129,31" href="http://www.qubers.com" target="_blank" alt="Qube" title="Qube" /> 

            <area shape="rect" coords="128,3,158,31" href="http://qluxurytravel.blogspot.com/" target="_blank" alt="Blog" title="Blog" /> 

            <area shape="rect" coords="159,3,196,31" href="http://www.linkedin.com/company/quintessentially-travel
                  " target="_blank" alt="LinkedIn" title="LinkedIn" /> 

        </map>
    </div>

    <div class="clear"></div>
    <div class="col triple z">
        <h2>Meet the rest of our family</h2>
    </div>
    <div class="col">
        <h3>Quintessentially Aviation</h3>
        <img src="/images/qav.jpg">
    </div>
    <div class="col">
        <h3>Quintessentially Escape</h3>
        <img src="/images/qes.jpg">
    </div>
    <div class="col">
        <h3>Quintessentially Villas</h3>
        <img src="/images/qvi.jpg">
    </div>
</div>