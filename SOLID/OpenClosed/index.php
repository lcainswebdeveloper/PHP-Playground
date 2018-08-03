<?php
require __DIR__.'/../../autoload.php';
interface ShapeInterface{
    public function getArea();
}

/*change behavior of class without modifying source code*/
class AreaCalculator{
    /* wrong way
    public function calculate($shapes){
        $area = 0;
        foreach($shapes as $shape):
            if(is_a($shape, 'Square)):
                $area += $shape->width * $shape->height;
            endif;
            if(is_a($shape, 'Circle)):
                $area += $shape->radius * $shape->radius * pi();
            endif;
            etc ...
        endforeach;
        return $area;
    }
    */
    
    /*Right Way*/
    public function calculate(ShapeInterface $shape){
        return $shape->getArea();
    }
}



class Square implements ShapeInterface{
    public $width;
    public $height;

    public function __construct($width,$height){
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(){
        return $this->width * $this->height;
    }
}

class Circle implements ShapeInterface{
    public $radius;

    public function __construct($radius){
        $this->radius = $radius;
    }

    public function getArea(){
        return $this->radius * $this->radius * pi();
    }
}

class Triangle implements ShapeInterface{
    public $length;
    public $width;
    public $height;

    public function __construct($length,$width,$height){
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(){
        return $this->length * $this->width * $this->height;
    }
}

echo (new AreaCalculator)->calculate(new Square(30,30));
echo "<br />";
echo (new AreaCalculator)->calculate(new Circle(30));
echo "<br />";
echo (new AreaCalculator)->calculate(new Triangle(30,30,30));