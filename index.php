<?php


class Color{
    private $red;
    private $green;
    private $blue;

    public function __construct($r, $g, $b){
        $this->setRed($r);
        $this->setGreen($g);
        $this->setBlue($b);
    }
    private function setRed($red){
        if($this->colorValidate($red))
            $this->red = $red;
        else throw new InvalidArgumentException('Invalid RED number');
    }
    private function setGreen($green){
        if($this->colorValidate($green))
            $this->green = $green;
        else throw new InvalidArgumentException('Invalid GREEN number');
    }
    private function setBlue($blue){
        if($this->colorValidate($blue))
            $this->blue = $blue;
        else throw new InvalidArgumentException('Invalid BLUE number');
    }
    private function colorValidate($colorNum){
        if(is_int($colorNum) && ($colorNum >= 0 && $colorNum <= 255))
            return true;
        return false;
    }
    public function getRed(){
        return $this->red;
    }
    public function getGreen(){
        return $this->green;
    }
    public function getBlue(){
        return $this->blue;
    }

    public function equals(Color $someColor){
        if ($this->red == $someColor->getRed() && $this->green == $someColor->getGreen() && $this->blue == $someColor->getBlue())
            return true;
        return false;
    }
    public static function random(){
        return new Color(rand(0, 255), rand(0, 255), rand(0,255));
    }
    public function mix(Color $someColor){
        $r = (integer)(($this->red + $someColor->getRed())/2); // floor or ceil doesn't work with $color1 and $color2
        $g = (integer)(($this->green + $someColor->getGreen())/2);
        $b = (integer)(($this->blue + $someColor->getBlue())/2);
        return new Color($r, $g, $b);
    }
}

$color1 = new Color(10, 234, 0);
$color2 = new Color(10, 3, 100);
//var_dump(Color::random());

//var_dump($color1->mix($color2));
var_dump(Color::random()->mix(Color::random()));