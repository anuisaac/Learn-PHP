<html>

  <head>

    <title>PHP CHAPTER 6</title>
    <link rel="stylesheet" type="text/css" href="chapters_style.css" />

  </head>

  <body>

    <?php require_once("header.php") ?>

    <div id = "main_content">

      <div id="main">

      <h2>Chapter 6: ARRAYS</h2>

      <h3>Creating and Accessing Arrays</h3>
      <?php
        $likes = array("music","yoga","books","chocolate","nature");
        $phone = array("company" => "oppo",
                       "color" => "blue",
                       "year" => 2020);
        $mylike = $likes[0];
        echo $mylike."<br />";
        $myCompany = $phone["company"];
        echo $myCompany."<br />";
        $pos = 2;
        echo $likes[$pos+1]."<br />";
      ?>

      <h3>Changing Elements</h3>
      <?php
        $likes[5] = "writing";
        $likes[] = "reading";
        echo $likes[5] = "writing<br />";
        echo $likes[6] = "reading<br />";

        $color[0] = "red";
        $color[1] = "green";
        $color[2] = "white";
        $color[3] = "blue";

        $fruit[] = "apple";
        $fruit[] = "banana";
        $fruit[] = "orange";
        $fruit[] = "guava";

        $instument = array();
        $instument["name"] = "violin";
        $instument["type"] = "stringed";
        $instrument["color"] = "brown";

        $instrument = array();
        $instrument["name"] = "flute";
        $instrument["type"] = "wind";
        $instrument["color"] = "yellow";

        ?>

        <h3>Outputting an Entire Array with print_r()</h3>
        <?php
          echo '<h5>$likes</h5><pre>';
          print_r($likes);
          echo '</pre><h5>$phone</h5><pre>';
          print_r($phone);
          echo "</pre>";
        ?>

        <h3>Extracting a Range of Elements with array_slice()</h3>
        <?php
          $words = array("rain","pain","train","spain","gain","drain");
          $wordsSlice = array_slice($words,2,4);
          echo "<pre>";
          print_r($wordsSlice);
          $instrumentSlice = array_slice($instrument,1,2);
          print_r($instrumentSlice);
          print_r(array_slice($words,2));
          print_r(array_slice($words,2,2));
          print_r(array_slice($words,2,2,true));
          echo "</pre>";
        ?>

        <h3>Counting elements in an array</h3>
        <?php
          $flowers = array("jasmine","rose","daisy");
          echo count($flowers)."<br />";
          $car = array("name" => "kwid",
                       "company" => "renault",
                       "color" => "red");
          echo count($car)."<br />";
          $food = array("appam","biriyani","chappati","dosa");
          $lastIndex = count($food) - 1;
          echo $food[$lastIndex];
          $plant = array(0 => "root", 1 => "stem",
                         1 => "leaf", 6 => "friut");
          $lastIndex = count($plant) - 1;
          echo $plant[$lastIndex]."<br />";
          ?>

          <h3>Stepping through an Array</h3>
          <?php
            $bird = array("sparrow","eagle","peacock","crow","pigeon","flamingo","duck");
            echo "<p>The Array: ".print_r($bird,true)."</p>";
            echo "<p>The current element is: ".current($bird).".</p>";
            echo "<p>..... and its index is : ".key($bird).".</p>";
            echo "<p>The next element is: ".next($bird).".</p>";
            echo "<p>The previous element is: ".prev($bird).".</p>";
            echo "<p>The first element is: ".reset($bird).".</p>";
            echo "<p>The last element is ".end($bird).".</p>";
            echo "<p>The previous element is: ".prev($bird).".</p>";
            $plant = array(4 => "root", 2 => "stem", 5 => "branches" , 1=> "flower", 3 => "leaf");
            echo end($plant)."<br />";
            $element = each($bird);
            print_r($element);
            echo "<br />";
            $animal = array("name" => "elephant", "type" => "herbivore", "kingdom" => "animalia");
            $element = each($animal);
            print_r($animal);
            echo "<br />";
            echo "Key: ".$element[0]."<br />";
            echo "Value: ".$element[1]."<br />";
            echo "Key: ".$element["key"]."<br />";
            echo "Value: ".$element["value"]."<br />";
            $myArray = array("false");
            $element = each($myArray);
            echo "Key: ".$element["key"]."<br />";
            echo "Value: ".$element["value"]."<br />";
            echo "<h5>Using each() with while loop</h5><dl>";
            $flower = array( "name" => "hibiscus", "color" => "red", "family" => "malvaceae");
            while( $element = each($flower))
            {
              echo "<dt>$element[0]</dt>";
              echo "<dd>$element[1]</dd>";
            }
            echo "</dl>";
          ?>

          <h3>Looping through Arrays with foreach</h3>
          <?php
            $flower = array("hibiscus","tulip","dahlia","rose","orchid");
            foreach( $flower as $val)
            {
              echo "$val<br />";
            }
          ?>

          <h3>Using foreach to loop through Keys and Values</h3>
          <?php
            echo "<h5>Using foreach()</h5>";
            $car = array("name" => "kwid", "company" => "renault", "color" => "red");
            echo "<dl>";
            foreach( $car as $key => $val)
            {
              echo "<dt>$key</dt>";
              echo "<dd>$val</dd>";
            }
            echo "</dl>";
          ?>

          <h3>Altering Arrays Values with foreach</h3>
          <?php
            echo "<pre>";
            $icecream = array("vanilla","mango","chocolate","strawberry","butterscotch");
            foreach( $icecream as $val)
            {
              if( $val == "mango")
                $val = "mint";
              echo $val." ";
            }
            echo "<br />";
            print_r($icecream);
            echo "<br />";
            foreach ( $icecream as &$val)
            {
              if( $val == "mango" )
                $val = "mint";
              echo $val." ";
            }
            unset($val);
            echo "<br />";
            print_r($icecream);
            echo "</pre>";
          ?>

          <h3>Creating a Multidimensional Array</h3>
          <?php
            $students = array(
              array(
                "name" => "Anu",
                "mark" => 47,
                "grade" => "A"
              ),
              array(
                "name" => "Mikku",
                "mark" => 42,
                "grade" => "A"
              ),
              array(
                "name" => "Chakki",
                "mark" => 23,
                "grade" => "C"
              ),
              array(
                "name" => "Emi",
                "mark" => 38,
                "grade" => "B"
              ),
              array(
                "name" => "Shami",
                "mark" => 34,
                "grade" => "B"
              )
             );
            echo "<pre>";
            print_r($students);
            echo "</pre>";
          ?>

          <h3>Accessing Elements of Multidimensional Arrays</h3>
          <?php
            print_r($students[1]);
            echo "<br />".$students[1]["name"]."<br />";
            echo $students[3]["grade"]."<br />";
          ?>

          <h3>Looping Through Multidimensional Arrays</h3>
          <?php
            echo "<h4>Looping Through a Two Dimensional Array</h4>";
            $studentNum = 0;
            foreach( $students as $student) {
              $studentNum++;
              echo "<h5>Student #$studentNum:</h5>";
              echo "<dl>";
              foreach( $student as $key => $value) {
                echo "<dt>$key</dt><dd>$value</dd>";
              }
              echo "</dl>";
            }
          ?>

          <h3>MANIPULATING ARRAYS</h3>
          <h3>Sorting Arrays</h3>
          <h4>Sorting Indexed Arrays with sort() and rsort()</h4>
          <?php
            $flower = array( "daisy", "dahlia", "sunflower", "jasmine", "lilly", "tulip", "lotus" );
            echo "<pre>";
            sort($flower);
            print_r($flower);
            rsort($flower);
            print_r($flower);
            echo "</pre>";
          ?>

          <h4>Sorting Associative Arrays with asort() and arsort()</h4>
          <?php
            $flower = array( "name" => "sunflower", "color" => "yellow", "family" => "asteraceae" );
            sort($flower);
            print "<pre>";
            print_r($flower);
            $flower = array( "name" => "sunflower", "color" => "yellow", "family" => "asteraceae" );
            asort($flower);
            print_r($flower);
            arsort($flower);
            print_r($flower);
            print "</pre>";
          ?>

          <h4>Sorting Associative Array Keys with ksort() and krsort()</h4>
          <?php
            $subject = array( "name" => "maths", "marks" => 50, "grade" => "A");
            print "<pre>";
            ksort($subject);
            print_r($subject);
            krsort($subject);
            print_r($subject);
            print "</pre>";
          ?>

          <h4>Multi-Sorting with array_multisort()</h4>
          <?php
            $flowerName = array( "hibiscus", "sunflower", "jasmine", "lotus", "tulip" );
            $color = array( "red", "yellow", "white", "pink", "purple" );
            $family = array( "malvaceae", "asteraceae", "oleaceae", "nelumbonaceae", "lilliaceae");
            array_multisort($flowerName,$color,$family);
            print "<pre>";
            print_r($flowerName);
            print_r($color);
            print_r($family);
            print "</pre>";
            $pupil = array( "achu", "mikku", "bblu", "anu", "bblu");
            $instruments = array( "guitar", "tabla", "organ", "violin", "flute");
            $prize = array( 1, 2, 2, 3, 1);
            array_multisort( $pupil, $instruments, $prize);
            print "<pre>";
            print_r($pupil);
            print_r($instruments);
            print_r($prize);
            print "</pre>";
            $students = array(
              array(
                "physics" => 50,
                "chemistry" => 48,
                "biology" => 49
              ),
              array(
                "physics" => 39,
                "chemistry" => 45,
                "biology" => 47
              ),
              array(
                "physics" => 41,
                "chemistry" => 37,
                "biology" => 40
              )
            );
            array_multisort( $students );
            echo "<pre>";
            echo "<h4>Using array_multisort() on a two-dmensional array</h4>";
            print_r( $students );
            echo "</pre>";
            $marks = array(
              array(
                "biology" => 35,
                "physics" => 34,
                "chemistry" =>39
              ),
              array(
                 "biology" => 50,
                 "physics" => 49,
                 "chemistry" => 50
            ),
              array(
                "biology" => 29,
                "physics"=> 22,
                "chemistry" => 26
              )
            );
            array_multisort( $marks );
            echo "<pre>";
            print_r( $marks );
            echo "</pre>";
            $test = array(
              array( "anu", "binu", "chinnu" ),
              array( "anu", "banu", "chippy" ),
              array( "anu", "banu", "diya" )
            );
            array_multisort( $test );
            print "<pre>";
            print_r( $test );
            print "</pre>";
          ?>

          <h3>Adding and Removing Array Elements</h3>
          <?php
            $food = array("apple","banana","egg","fish");
            $food_add = array("chai","dosa");
            print "<pre>";
            print "Add two elements to the middle.\n";
            print_r($food);
            array_splice($food,2,0,$food_add);
            print_r($food);
            print "Remove two elements from start and add two elements instead.\n";
            $food = array("apple","banana","egg","fish");
            $food_add = array("achaar","appam");
            print_r($food);
            array_splice( $food,0,2,$food_add);
            print_r($food);
            print "Remove last two elements.\n";
            $food = array("appam","banana","chai","dosa");
            print_r($food);
            array_splice($food,2);
            print_r($food);
            print "Inserting a string instead of an array.\n";
            $food = array("appam","banana","chai","dosa");
            print_r($food);
            array_splice($food,1,0,"apple");
            print_r($food);
            $food = array("apple","banana","cucumber","dragon fruit");
            print_r($food);
            array_splice($food,4,0,array("foodItem" => "mango"));
            print_r($food);
            print "</pre>";
          ?>

          <h3>Merging Arrays Together</h3>
          <?php
            $food = array("appam","beans");
            $Morefood = array("cabbage","duck");
            print "<pre>";
            print_r(array_merge($food,$Morefood));
            $food = array("achaar","biriyani");
            $moreFood = array("chicken","donut");
            array_push($food,$moreFood);
            print_r($food);
            array_push($food,"egg","fish");
            print_r($food);
            $food = array("appam","badam");
            $moreFood = array("chappathi","donut");
            array_unshift($food,$moreFood);
            print_r($food);
            array_unshift($food, "ghee", "ham" );
            print_r($food);
            $instrument = array( "name" => "violin",
                                  "type" => "string",
                                  "color" => "brown" );
            print_r(array_merge($instrument,array("numStrings" => 4)));
            $instrument = array("name" => "violin",
                                "type" => "string",
                                "color" => "brown");
            $instrument = array_merge($instrument,array("name" => "guitar","color" => "yellow"));
            print_r($instrument);
            $colors = array("blue","green","indigo");
            $colors = array_merge( $colors, array( 0 => "magenta" ) );
            print_r($colors);
            $pushpam = array("mulla","ilanji");
            $morepushpam = array("chembakam","thumba");
            $pushpam = array_replace($pushpam,$morepushpam);
            print_r($pushpam);
            $flower = array("jamine","daisy");
            $oneflower = array( 2 => "gulmohar");
            print_r(array_replace( $flower, $oneflower));
            $array1 = array( "a" => "apple", "c" => "car" );
            $array2 = array( "a" => "art", "b" => "ball" );
            print_r( array_replace( $array1, $array2 ) );
            $food1 = array( "appam", "badam" );
            $food2 = array( "chicken", "donut" );
            $food3 = array( "egg", "fish" );
            print_r( array_replace( $food1, $food2, $food3 ) );
            $niram = array(1 => "pacha", 8 => "chuvappu", 4 => "neela");
            print_r(array_merge($niram));
            print "</pre>";
          ?>

          <h3>Converting Between Arrays and Strings</h3>
          <?php
            $foodString = "appam, banana, chicken";
            $foodArray = explode( ",", $foodString );
            print "<pre>";
            print_r($foodArray);
            $fruitString = "apple,orange, grapes, guava, mango";
            $fruitArray = explode( ",", $fruitString, 3 );
            print_r( $fruitArray );
            $colorString = "red, green, blue, violet";
            $colorArray = explode( ",", $colorString, -2 );
            print_r( $colorArray );
            $colorArray = array("red", "green", "blue", "violet");
            $colorString = implode(",", $colorArray);
            echo "$colorString<br />";
            print "</pre>";
          ?>

          <h3>Converting an Array to a List of Variables</h3>
          <?php
            $car = array( "kwid", "renault", "red" );
            list( $name, $company, $color ) = $car;
            echo "$name<br />";
            echo "$company<br />";
            echo "$color<br />";
            $car = array( "name" => "kwid",
                          "company" => "renault",
                          "color" => "red");
            while( list( $key, $value ) = each( $car ) )
            {
              echo "<pre>";
              echo "<dt>$key</dt>";
              echo "<dd>$value</dd>";
              echo "</pre>";
            }
          ?>

          <h3>Excercises</h3>
          <?php
            echo "<h4>Excercise 1</h4>";
            $authors = array( "Steinbeck", "Kafk", "Tolkien", "Dickens", "Milton", "Orwell" );
            $books = array(
              array(
                "title" => "The Hobbit",
                "authorId" => 2,
                "pubYear" =>  1937
              ),
              array(
                "title" => "The Grapes of Wrath",
                "authorId" => 0,
                "pubYear" =>  1939
              ),
              array(
                "title" => "A Tale of Two Cities",
                "authorId" => 3,
                "pubYear" =>  1859
              ),
              array(
                "title" => "Paradise Lost",
                "authorId" => 4,
                "pubYear" =>  1667
              ),
              array(
                "title" => "Animal Farm",
                "authorId" => 5,
                "pubYear" =>  1945
              ),
              array(
                "title" => "The Trial",
                "authorId" => 1,
                "pubYear" =>  1925
              )
            );
            foreach( $books as &$book ) {
              $book["authorName"] = $authors[$book["authorId"]];
            }
            print "<pre>";
            echo "<h4>Books Club</h4>";
            print_r($books);
            print "</pre>";
          ?>

          <?php
            echo "<h4>Excercise2</h4>";
            $fieldSize = 20;
            $numLines = 10;
            $minesField =array();
            //Initialize the minefield
            for($i = 0;$i<$fieldSize;$i++) {
              $minesField[$i] = array();
              for( $j=0; $j<$fieldSize; $j++ ) {
                $minesField[$i][$j] = false;
              }
            }
            //Add Mines
            for($i=0;$i<$numLines;$i++) {
              do {
                  $mineX = rand(0,19);
                  $mineY = rand(0,19);
              } while ( $minesField[$mineX][$mineY] ) ;
              $minesField[$mineX][$mineY] = true;
            }
            //Display minefield
            print "<pre>";
            echo "<h4>MinesSweeper</h4>";
            for($i=0;$i<$fieldSize;$i++) {
              for($j=0;$j<$fieldSize;$j++) {
                echo ($minesField[$i][$j]) ? "*  " : ".  ";
              }
              echo "<br />";
            }
            print "</pre>";
          ?>

    </div>

    </div>

    <div id="footer">
        <p>Powered By @ AnnCreates</p>
    </div>

  </body>

</html>
