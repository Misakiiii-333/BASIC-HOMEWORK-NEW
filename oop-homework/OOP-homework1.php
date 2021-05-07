<?php
abstract class Shape {
    protected $width;
    protected $height;

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
}
class Rectangle extends Shape {
    public function area() {
        return ($this->width * $this->height);
    }
}

class Triangle extends Shape {
    public function area() {
        return ($this->width * ($this->height / 2));
    }
}

$rectangle = new Rectangle(10,6);
echo $rectangle->area();

$triangle = new Triangle(10,6);
echo $triangle->area();

?>

