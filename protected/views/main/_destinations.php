<div class="col"><?php
$regions = Q::getRegions();
$sum = 0;
foreach($regions as $region){
        $countries = $region->countries;
        if(count($countries)+$sum < 17)$sum+= count($countries)+1;
        else{
            echo "</div><div class='col'>";
            $sum = count($countries);
        }
        echo CHtml::link($region->name, '/'.$region->id.'-'.Q::slug($region->name), array('class' => 'region'));
        foreach($countries as $country){
            echo CHtml::link($country->name, '/country/'.$country->id.'-'.Q::slug($country->name));
        }
}
?>
</div>