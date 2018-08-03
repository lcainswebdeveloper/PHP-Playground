<?php
require __DIR__.'/../../autoload.php';

/*Derived classes must be changeable for their base classes
WE MUST RETURN THE SAME TYPE OF DATA ie an array/string/object
*/

class VideoPlayer{
    public function play($file){
        echo "play the video";
    }
}

class AviVideoPlayer extends VideoPlayer{
    public function play($file){
        if(pathinfo($file,PATHINFO_EXTENSION) != 'avi'):
            throw new \Exception; //this violates as it behaves differently to parent
        endif;
        echo "check extension and do other stuff...";
    }
}

class MP4VideoPlayer extends VideoPlayer{
    public function play($file){
        echo "check extension and do other MP4 stuff...";
    }
}