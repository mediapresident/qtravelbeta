<?php
class ImageCommand extends CConsoleCommand{
        public function run($args){
            $from = Yii::app()->basePath."/../../web/";
            $to = Yii::app()->basePath.'/../media/hotel/';
            $images = HotelImage::model()->with('hotel')->findAll(array('condition' => '`thumbnail_url` NOT LIKE "/media%"'));
            foreach($images as $im){
                if(!$im->hotel){
                    $im->delete();
                }else{
                    $imgName = basename($im->main_url);
                    echo "Copying ". $from.$im->main_url."\n";
                    echo "To ". $to. "\n";
                    try{
                        if(substr($im->main_url,0,2) !='/m' && @copy($from.$im->main_url, $to.$imgName)){
                            echo "Copy successful.";
                            Q::resizeImage($imgName, $to, true, true);
                            $im->thumbnail_url = '/media/hotel/thumb/'.$imgName;
                            $im->main_url = '/media/hotel/'.$imgName;
                            $im->original_url = '/media/hotel/orig/'.$imgName;
                            $im->save();
                        }
                        
                    }  catch (Exception $e){
                        echo $e;
                    }
                }
            }
        }
}
?>