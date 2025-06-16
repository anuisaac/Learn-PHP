<html>

  <head>

    <title>PHP CHAPTER 8</title>
    <link rel="stylesheet" type="text/css" href="chapters_style.css">

  </head>


  <body>
    <?php require_once( "header.php" ) ?>
    <div id = "main_content">

      <div id="main">

          <h2>CHAPTER 8: OBJECTS</h2>
          <h3>Creating Classes and Objects in PHP</h3>
          <?php
            class Cars {

            }
            $kwid = new Cars();
            $bmw = new Cars();
            print_r( $kwid );
            print_r( $bmw );
           ?>

           <h3>Accessing Properties</h3>
           <?php
            class Instrument {
              public $color;
              public $type;
            }

            $violin = new Instrument();
            $violin->color = "brown";
            $violin->type = "string";

            $flute = new Instrument();
            $flute->color = "yellow";
            $flute->type = "wind";

            echo "My Violin's color is ".$violin->color.".<br />";
            echo "Your Flute's color is ".$flute->color.".<br />";
            echo "Violin is of ".$violin->type." type.<br />";
            echo "Flute is of ".$flute->type." type.<br />";
            print "<pre>";
            echo "<h3>The \$violin object</h3>";
            print_r( $violin );
            echo "<h3>The \$flute Object</h3>";
            print_r( $flute );
            print "</pre>";
            class Pen {
              public $color;
              public $type;
              public static $numberSold = 10;
            }
            Pen::$numberSold++;
            echo Pen::$numberSold."<br />";
           ?>

          <h3>Class Constants</h3>
          <?php
            class Car {
              const HATCHBACK = 1;
              const STATION_WAGON = 2;
              const SUV = 3;

              public $model;
              public $color;
              public $manufacturer;
              public $type;
            }
            $myCar = new Car();
            $myCar->model = "climber";
            $myCar->color = "red";
            $myCar->manufacturer = "renault";
            $myCar->type = Car::SUV;
            echo "This $myCar->model is ";
            switch( $myCar->type ) {
              case Car::HATCHBACK:
              echo "hatchback";
              break;
              case Car::STATION_WAGON:
              echo "station wagon";
              break;
              case Car::SUV:
              echo "SUV";
              break;
            }
          ?>

          <h3>Calling methods</h3>
          <?php
            class MyClass {
              public function myFunction() {
                echo "Hello World!!!<br />";
              }
            }
            $obj = new MyClass();
            $obj->myFunction();
          ?>

          <h3>Accessing Object Properties from Methods</h3>
          <?php
            class Greetings {

              public $greeting = "Have a good day.<br />";
              public $quote = "Trust yourself, You know more than you think you do.";

              public function greet() {
                echo $this->greeting;
              }

              public function quoteOfTheDay() {
                echo $this->quote;
              }

            }
            $day = new Greetings();
            $day->greet();
            $quotes = new Greetings();
            $quotes->quoteOfTheDay();
            echo "<br />";
            class Caring {

              public function fine() {
                return "I'm Fine.Thank you.<br />";
              }

              public function howRU() {
                echo $this->fine();
              }

            }
            $care = new Caring();
            $care->howRU();

            class MyCar {

              public $color;
              public $manufacturer;
              public $model;
              private $_speed = 0;

              public function accelerate() {

                if( $this->_speed>=100 ) return false;
                $this->_speed += 10;
                return true;

              }

              public function brake() {

                if( $this->_speed<=0 ) return false;
                $this->_speed -= 10;
                return true;

              }

              public function getSpeed() {

                return $this->_speed;

              }

            }
            $herCar = new MyCar();
            $herCar->color = "red";
            $herCar->manufacturer = "renault";
            $herCar->model = "kwid";

            echo "<h4>A Simple Car Simulator</h4>";
            echo "I'm driving a $herCar->color $herCar->manufacturer $herCar->model. <br />";
            echo "<h4>Stepping on the Gas...</h4>";
            while( $herCar->accelerate() ) {
              echo "Current Speed: ".$herCar->getSpeed()." mph <br />";
            }
            echo "<h4>Top Speed!!! Slowing Down...</h4>";
            while( $herCar->brake() ) {
              echo "Current Speed: ".$herCar->getSpeed()." mph <br />";
            }
            echo "<h4>Stopped!</h4>";
          ?>

          <h3>Static Methods</h3>
          <?php
            class Car1 {

              public static function calcMpg( $miles, $gallons ) {
                return ( $miles/$gallons );
              }

            }
            echo Car1::calcMpg( 168, 6 )."<br />";

            class MyClass1 {

              const MYCONST = 123;
              public static $staticVar = 456;

              public function myMethod() {
                echo "MYCONST = ".MyClass1::MYCONST.".<br />";
                echo "\$staticVar = ".MyClass1::$staticVar."<br />";
              }

            }
            $obj = new MyClass1;
            $obj->myMethod();
          ?>

          <h3>Using Hints to Check Method Argument</h3>
          <?php
            class Car2 {
              public $color;
            }
            class Garage {
              public function paint( Car2 $car, $color ) {
                $car->color = $color;
              }
            }
            $car = new Car2();
            $garage = new Garage();
            $car->color = "blue";
            $garage->paint( $car, "green" );
            echo $car->color.".<br />";
            $cat = "Lucky";
            $garage = new Garage();
            //$garage->paint( $cat, "orange" );
            class Rectangle {
              public $length;
              public $breadth;
              public $area;
            }
            class Calculator {
              public function areaRectangle( $rectangle, $length, $breadth ) {
                $rectangle->area =  $length * $breadth;
              }
            }
            $rectangle = new Rectangle();
            $calc = new Calculator();
            $rectangle->length = 5;
            $rectangle-> breadth = 3;
             $calc->areaRectangle( $rectangle, 7, 4);
             echo $rectangle->area;
          ?>

          <h3>Making Your Class Self Contained with Encapsulation</h3>
          <?php
            Class Account{

              private $_totalBalance;

              public function makeDeposit( $amount ) {
                $this->_totalBalance += $amount;
              }

              public function makeWithdrawal( $amount ) {
                if( $amount < $this->_totalBalance ) {
                  $this->_totalBalance -= $amount;
                }
                else {
                  die( "Insufficient Balance!!!<br />" );
                }
              }

              public function getTotalBalance() {
                return $this->_totalBalance;
              }

            }
            $a = new Account;
            $a->makeDeposit( 25000 );
            echo "Total Balance is ". $a->getTotalBalance().".<br />";
            $a->makeWithdrawal( 1500 );
            echo "Total Balance is ".$a->getTotalBalance().".<br />";
          ?>

          <h3>Overloading Property Accesses with __get() and __set()</h3>
         <?php
           class Car3 {
              public function __get( $propertyName ) {
                echo "The value of '$propertyName' was requested.<br />";
                return "blue";
              }
            }
            $car3 = new Car3;
            $x = $car3->color;
            echo "The car's color is $x.<br />";
            echo "<h4>Using __get() and __set()</h4>";
            class Car4 {

              public $manufacturer;
              public $model;
              public $color;
              private $_extraData = array();

              public function __get( $propertyName ) {
                if( array_key_exists( $propertyName, $this->_extraData ) ) {
                  return $this->_extraData[$propertyName];
                }
                else {
                  return null;
                }
              }

              public function __set( $propertyName, $propertyValue ) {
                $this->_extraData[$propertyName] = $propertyValue;
              }

            }
            $car4 = new Car4;
            $car4->manufacturer = "Renault";
            $car4->model = "Kwid";
            $car4->color = "Red";
            $car4->engineSize = 1;
            $car4->otherColors = array( "blue", "white", "yellow" );
            echo "<h4>Some Properties:</h4>";
            echo "<p>My Car's Manufacturer is ".$car4->manufacturer.".</p>";
            echo "<p>My Car's Engine Size is ".$car4->engineSize.".</p>";
            echo "<p>My Car's Fuel Type is ".$car4->fuelType.".</p>";
            echo "<h4>The \$car Object:</h4>";
            echo "<pre>";
            print_r( $car4 );
            echo "</pre>";
          ?>

          <h3>Overloading Methos Calls with __call()</h3>
          <?php

            class CleverString {

              private $_theString = "";
              private static $_allowedFunctions = array( "strlen", "strtoupper", "strpos" );

              public function setString( $strVal ) {
                $this->_theString = $strVal;
              }

              public function getString() {
                return $this->_theString;
              }

              public function __call( $methodName, $arguments ) {
                if( in_array( $methodName, CleverString::$_allowedFunctions ) ){
                  array_unshift( $arguments, $this->_theString );
                  return call_user_func_array( $methodName, $arguments );
                }
                else {
                  echo "<p>Method 'CleverString::$methodName' does not exist!!!</p>";
                }
              }

            }
            $myString = new CleverString;
            $myString->setString( "Hello!" );
            echo "<p>The String is ".$myString->getString()."</p>";
            echo "<p>The Length of the string is ".$myString->strlen()."</p>";
            echo "<p>The String in Uppercase letters is ".$myString->strtoupper()." </p>";
            echo "<p>The letter 'l' occurs at position ".$myString->strpos( "l" )."</p>";
            $myString->madeUpMethod();
            echo $myString->strlolower( "ABCD" );
          ?>

          <h3>Other Overloading Methods</h3>
          <?php
            class MyClass2 {

              public function __isset( $propertyName ) {
                //All properties beginning with "test" are "set"
                return ( substr( $propertyName, 0, 4 ) == "test" ) ? true : false;
              }

              public function __unset( $propertyName ) {
                echo "Unsetting property '$propertyName'.<br />";
              }

              public static function __callStatic( $methodName, $arguments ) {
                echo "The Static method '$methodName' has been called with arguments: <br />";
                foreach( $arguments as $arg ) {
                  echo "-->$arg<br />";
                }
              }

            }
            $testObject = new MyClass2;
            echo isset( $testObject->banana )."<br />";
            echo isset( $testObject->testbanana )."<br />";
            unset( $testObject->banana );
            MyClass2::randomMethod( "strawberry", "vanilla", "chocolate" );
          ?>

          <h3>Using Inheritance to Extent the Power of Objects</h3>
          <?php
            echo "<h4>Creating Shape Classes using Inheritance</h4>";
            abstract class Shape{

              private $_color = "black";
              private $_filled = false;

              public function getColor() {
                return $this->_color;
              }

              public function setColor( $color ) {
                $this->_color = $color;
              }

              public function isFilled() {
                return $this->_filled;
              }

              public function fill() {
                $this->_filled = true;
              }

              public function makeHollow() {
                $this->_filled = false;
              }

              abstract public function getArea();

            }
            class Circle extends Shape {

              private $_radius  =0;

              public function getRadius() {
                return $this->_radius;
              }

              public function setRadius( $radius ) {
                $this->_radius = $radius;
              }

              public function getArea() {
                return M_PI * pow( $this->_radius, 2 );
              }
            }
            class Square extends Shape{

              private $_sideLength = 0;

              public function getSideLength() {
                return $this->_sideLength;
              }
              public function setSideLength( $sideLength ) {
                $this->_sideLength = $sideLength;
              }
              public function getArea() {
                return pow( $this->_sideLength, 2 );
              }
            }
            $myCircle = new Circle;
            $myCircle->_color = "violet";
            $myCircle->fill();
            $myCircle->setRadius( 6 );
            echo "<h4>My Circle:</h4>";
            echo "<div class='circle'></div>";
            echo "<p>Radius of the Circle is ".$myCircle->getRadius().".</p>";
            echo "<p>Color of the Circle is ".$myCircle->_color." and it is "
                  .( $myCircle->isFilled() ? "filled" : "hollow" ).".</p>";
            echo "<p>The Area of the Circle is ".$myCircle->getArea().".</p>";
            $mySquare = new Square;
            $mySquare->_color = "green";
            $mySquare->makeHollow();
            $mySquare->setSideLength( 4 );
            echo "<h4>My Square</h4>";
            echo "<div class='square'></div>";
            echo "<p>Side length of the Square is ".$mySquare->getSideLength().".</p>";
            echo "<p>Color of the Square is ".$mySquare->_color." and it is "
                  .( $mySquare->isFilled() ? "filled" : "hollow" ).".</p>";
            echo "<p>Area of the Square is ".$mySquare->getArea().".</p>";

          ?>
          <h3>Overriding Methods in the Parent Class</h3>
          <?php
            class Fruit{

              public function peel() {
                echo "<p>I'm peeling the fruit...</p>";
              }

              public function slice() {
                echo "<p>I'm slicing the fruit...<p>";
              }

              public function eat() {
                echo "<p>I'm eating the fruit...</p>";
              }

              public function consume() {
                $this->peel();
                $this->slice();
                $this->eat();
              }
            }
            class Grape extends Fruit {

              public function peel() {
                echo "<p>No need to peel a grape!</p>";
              }

              public function slice() {
                echo "<p>No need to slice a grape!</p>";
              }

            }
            echo "<h4>Eating an Apple</h4>";
            $apple = new Fruit();
            $apple->consume();
            echo "<h4>Eating Grapes</h4>";
            $grape = new  Grape;
            $grape->consume();
            class Banana extends Fruit {
              public function consume() {
                echo "<p>I'm breaking off a banana...</p>";
                parent::consume();
              }
            }
            echo "<h4>Eating a Banana</h4>";
            $banana = new Banana;
            $banana->consume();
          ?>

          <h3>Blocking Inheritance and Overrides with Final Classes and Methods</h3>
          <?php
            final class HandsOfThisclass {

              public $someProperty = 123;

              public function someMethos() {
                echo "A method.<br />";
              }

            }
            //class ChildClass extends HandsOfThisclass {}
            class ParentClass {

              public $someProerty = 123;

              public final function HandsOfThisclass() {
                echo "A method.<br />";
              }

            }
            class ChildClass extends ParentClass {

              /* public function HandsOfThisclass() {
                echo "Trying to override this method.<br />"; */
              }

            echo "Oops!!!";
          ?>

          <h3>Using Abstract Classes and Methods</h3>
          <?php
            class ShapeInfo{

              private $_shape;

              public function setShape( $shape ) {
                $this->_shape = $shape;
              }

              public function showInfo() {
                  echo "<p>The shape's color is ".$this->_shape->getColor();
                  echo " and its area is ".$this->_shape->getArea().".</p>";
              }

            }
            $mySquare = new Square;
            $mySquare->setColor( "pink" );
            $mySquare->makeHollow();
            $mySquare->setSideLength( 5 );
            echo "<div id='pink_square'></div>";
            $info = new ShapeInfo;
            $info->setShape( $mySquare );
            $info->showInfo();
            class Rect extends Shape {

              private $_height;
              private $_width;

              public function getHeight() {
                return $this->_height;
              }

              public function getWidth() {
                return $this->_width;
              }

              public function setHeight( $height ) {
                $this->_height = $height;
              }

              public function setWidth( $width ) {
                $this->_width = $width;
              }

              public function getArea() {
                return $this->_width * $this->_height;
              }

            }
            $rect = new Rect;
            $rect->setColor( "yellow" );
            $rect->fill();
            $rect->setHeight( 4 );
            $rect->setWidth( 7 );
            echo "<div id='yellow_rect'></div>";
            $info = new ShapeInfo;
            $info->setShape( $rect );
            $info->showInfo();
          ?>

          <h3>Working with Interfaces</h3>
          <?php
            interface Sellable {

              public function addStock( $numItems );
              public function sellItem();
              public function getStockLevel();

            }
            class Television implements Sellable {

              private $_screenSize;
              private $_stockLevel;

              public function getScreenSize() {
                return $this->_screenSize;
              }

              public function setScreenSize( $screenSize ) {
                $this->_screenSize = $screenSize;
              }

              public function addStock( $numItems ) {
                $this->_stockLevel += $numItems;
              }

              public function sellItem() {
                if( $this->_stockLevel > 0 ) {
                  $this->_stockLevel--;
                  return true;
                }
                else {
                  return false;
                }
              }

              public function getStockLevel() {
                return $this->_stockLevel;
              }

            }
            class TennisBall implements Sellable {

              private $_color;
              private $_ballsLeft;

              public function getColor() {
                return $this->_color;
              }

              public function setColor( $color ) {
                $this->_color = $color;
              }

              public function addStock( $numItems ) {
                $this->_ballsLeft += $numItems;
              }

              public function sellItem() {
                if( $this->_ballsLeft > 0 ) {
                  $this->_ballsLeft--;
                  return true;
                }
                else {
                   return false;
                }
              }

              public function getStockLevel() {
                return $this->_ballsLeft;
              }
            }
            class StoreManager {

              private $_productList = array();

              public function addProduct( Sellable $product ) {
                $this->_productList[] = $product;
              }

              public function stockUp() {
                foreach( $this->_productList as $product ) {
                  $product->addStock( 100 );
                }
              }

            }
            $tv = new Television;
            $tv->setScreenSize( 45 );
            $ball = new TennisBall;
            $ball->setColor( "yellow" );
            $manager = new StoreManager;
            $manager->addProduct( $tv );
            $manager->addProduct( $ball );
            $manager->stockUp();
            echo "<h4>Online Store</h4>";
            echo "<p>There are ".$tv->getStockLevel()." ".$tv->getScreenSize()." inches televisions
                  in stock.</p>";
            echo "<p>There are ".$ball->getStockLevel()." ".$ball->getColor()." tennnis balls
                  in stock.</p>";
            echo "<p>Selling a televisions...</p>";
            $tv->sellItem();
            echo "<p>Selling two tennis balls...</p>";
            $ball->sellItem();
            $ball->sellItem();
            echo "<p>There are ".$tv->getStockLevel()." ".$tv->getScreenSize()." inches televisions
                  in stock.</p>";
            echo "<p>There are ".$ball->getStockLevel()." ".$ball->getColor()." tennis balls
                  in stock.</p>"

          ?>

          <h3>Setting Up New Objects with Constructors </h3>
          <?php
            class MyClass3 {
              function __construct() {
                echo "Whoa I've  being created!!!<br />";
              }
            }
            $class3 = new MyClass3;
            class Persons {

              private $_firstName;
              private $_lastName;
              private $_age;

              public function __construct( $firstName, $lastName, $age ) {
                $this->_firstName = $firstName;
                $this->_lastName = $lastName;
                $this->_age = $age;
              }

              public function showDetails() {
                echo "$this->_firstName $this->_lastName, $this->_age yrs old.<br />";
              }

            }
            $person = new Persons( "Bol", "T", 29 );
            $person->showDetails();
            class Person1{

              public function save() {
                //echo "Saving this Object to database...<br />";
              }

              public function __destruct() {
                $this->save();
              }

            }
            $p = new Person1;
            unset( $p );
            $p2 = new Person1;
            //die( "Something has gone wrong !!!<br />" );
          ?>

          <h3>Automatically Loading Class Files</h3>
          <?php
            require_once( "classes/Person.php" );
            $p = new Person;
            $p->save( "Anu", "Isaac" );
            $p->view();
            function __autoload( $className ) {
              $className = str_replace( "..", "", $className );
              require_once( "classes/$className.php" );
            }
            $c= new Cat;
          ?>

          <h3>Storing Objects as Strings</h3>
          <?php
            $harry = new People;
            $harry->age = 28;
            $harryString = serialize( $harry );
            echo "Harry is now serialized in the following String: <br />'$harryString'<br />";
            echo "Converting '$harryString' back to an object...<br />";
            $obj = unserialize( $harryString );
            echo "Harry's age is ".$obj->age.".<br />";
            $user = new User;
            $user->username = "harry";
            $user->password = "styles";
            $user->loginsToday = 4;
            print "<pre>";
            echo "The original user Oject:<br />";
            print_r( $user );
            echo "<br /><br />";
            echo "Serializing the Object...<br /><br />";
            $userString = serialize( $user );
            echo "The user is now serialized in the following String:<br />";
            echo "$userString<br /><br />";
            echo "Convertng the String back to an Object ...<br /><br />";
            $obj = unserialize( $userString );
            echo "The unserialized object :<br />";
            print_r( $obj );
            $user = new User;
            $userString = serialize( $user );
            $obj = unserialize( $userString );
            print  "</pre>";
          ?>

          <h3>Determining an Object's Class</h3>
          <?php
            $obj = new MyClass;
            echo get_class( $obj );
            echo "<br />";
            class SoftFruit extends Fruit{

            }
            class HardFruit extends Fruit {

            }
            function eatSomeFruit( array $fruitToEat ) {
              foreach( $fruitToEat as $itemOfFruit ) {
                if( $itemOfFruit instanceof Fruit ) {
                      echo "Eating the Fruit...So yum!<br />";
                }

              }
            }
            $banana  = new SoftFruit;
            $apple = new HardFruit;
            eatSomeFruit( array( $banana, $apple ) );
          ?>

          <h3>Excercises</h3>
          <?php

            echo "<h4>Excercise1</h4>";
            echo "<h4>Calculator</h4>";
            class Calculator1 {

              protected $_value1;
              protected $_value2;

              public function __construct( $value1, $value2 ) {
                $this->_value1 = $value1;
                $this->_value2 = $value2;
              }

              public function add() {
                return $this->_value1 + $this->_value2;
              }

              public function subtract() {
                return  $this->_value1 > $this->_value2;
              }

              public function multiply() {
                return $this->_value1 * $this->_value2;
              }

              public function divide() {
                return $this->_value1 / $this->_value2;
              }

            }
            class CalcAdvanced extends Calculator1 {

                private static $_allowedFunctions = array( "pow" =>2, "sqrt" => 1, "exp" => 1);

                public function __construct(  $value1, $value2=null ) {
                  parent::__construct( $value1, $value2 );
                }

                public function __call( $methodName, $arguments ) {
                  if( in_array( $methodName, array_keys( CalcAdvanced::$_allowedFunctions ) ) ) {
                    $functionArguments = array( $this->_value1 );
                    if( CalcAdvanced::$_allowedFunctions[$methodName] == 2 ) {
                      array_push( $functionArguments, $this->_value2 );
                    }
                    return call_user_func_array( $methodName, $functionArguments ) ;

                  }
                }

            /*  public function pow() {
                return pow( $this->_value1, $this->_value2 );
              }

              public function sqrt() {
                return sqrt( $this->_value1 );
              }

              public function exp() {
                return exp( $this->_value1 );
              } */

            }

            $calc = new Calculator1( 9, 3 );
            echo "Sum: ( 9 + 3 ) = ".$calc->add().".<br />";
            echo "Difference: ( 9 - 3 ) = ".$calc->subtract().".<br />";
            echo "Product: ( 9 * 3 ) = ".$calc->multiply().".<br />";
            echo "Quotient: ( 9 / 3 ) = ".$calc->divide().".<br />";

            $ca = new CalcAdvanced( 2, 4 );
            echo "2 to the power of 4 is ".$ca->pow().".<br />";
            $ca = new CalcAdvanced( 4 );
            echo "Square root of 4 is ".$ca->sqrt().".<br />";
            echo "Exponent of 4 is ".$ca->exp().".<br />";

          ?>


          </div>

        </div>

        <?php require_once( "footer.php" ) ?>

      </body>

    </html>
