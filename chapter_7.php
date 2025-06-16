<html>

  <head>
    <title>PHP CHAPTER 7</title>
    <link rel="stylesheet" type="text/css" href="chapters_style.css">
  </head>

  <body>

    <?php require_once( "header.php" ) ?>
    
    <div id = "main_content">

      <div id="main">

        <h2>CHAPTER 7: FUNCTIONS</h2>

        <h3>Calling Functions</h3>
        <?php
          echo "Square root of 16 is ".sqrt( 16 ).".<br />";
          echo "Process Completed.";
        ?>

        <h3>Working with Variable Functions</h3>
        <?php
          $squareRoot = "sqrt";
          echo "Square root of 36 is: ".$squareRoot( 36 ).".<br />";
          echo "Finished.<br />";
          $trigFunctions = array( "sin", "cos", "tan" );
          $degrees = 30;
          foreach( $trigFunctions as $trigfunction ) {
            echo "$trigfunction( $degrees ) = ".$trigfunction( deg2rad( $degrees ) ).".<br />";
          }
        ?>

        <h3>Writing Your Own Function</h3>
        <?php
          function hello() {
            echo "Hello World!<br />";
          }
          hello();
        ?>

        <h3>Defining Parameter</h3>
        <?php
          function welcomeWithStyle( $font, $size = 1.5 ) {
            echo "<p style = \" font-family: $font; font-size: {$size}em; \" >
                  Welcome to the New Chapter!</p>";
          }
          welcomeWithStyle( "Helvetica", 1 );
          welcomeWithStyle ( "Times" );
          welcomeWithStyle ( "Courier", 2 );
        ?>

        <h3>Returning Values From Your Functions</h3>
        <?php
          function makeBold( $text ) {
            return "<b>$text</b>";
          }
          $normalText = "This is a normal text.";
          $boldText = makeBold( "This is bold text." );
          echo "$normalText<br />";
          echo "$boldText<br />";
        ?>

        <h3>Understanding Variable Scope</h3>
        <?php
          function rectangleArea() {
            $length = 6;
            $breadth = 4;
            return $length * $breadth;
          }
          echo "Area of a Rectangle with length 6 and breadth 4 is ".rectangleArea().".<br />";
          echo "The value of \$length is: '$length'.<br />";
          echo "The value of \$breadth is: '$breadth'.<br />";
          $color = "orange";
          function describeMyDog() {
            $color = "white";
            echo "My dog is $color.<br />";
          }
          $color = "orange";
          describeMyDog();
          echo "My cat is $color.<br />";
        ?>

        <h3>Working with Global Variables</h3>
        <?php
          function setup() {
            global $myGlobal;
            $myGlobal = "Drink Water.";
          }
          function water() {
            global $myGlobal;
            echo "$myGlobal<br />";
          }
          setup();
          water();
          $kind;
          $kind = "Be Kind.";
          function kindness() {
            echo $GLOBALS["kind"]."<br />";
          }
          kindness();
        ?>

        <h3>Using Static Variables to Preserve Values </h3>
        <?php
          function nextNumber() {
            static $count = 0;
            return ++$count;
          }
          echo "I've counted to ".nextNumber().".<br />";
          echo "I've counted to ".nextNumber().".<br />";
          echo "I've counted to ".nextNumber().".<br />";
        ?>

        <h3>Creating Anonymous Functions</h3>
        <?php
          $mode = "+";
          $processNumbers = create_function( '$a, $b', "return \$a $mode \$b;" );
          echo $processNumbers( 3, 4 )."<br />";
          $happiness = <<< HAPPINESS
          The truth is that happiness is a mental and spiritual state . None
          of these positions mentioned will necessarily bequeath happiness.
          Your strength, joy, and happiness consist in finding out the law of
          divine order and right action lodged in your subconcious mind
          and applying these principles in all phases of your life.
          HAPPINESS;
          echo "<h4>The Original Text</h4>";
          echo "$happiness<br />";
          $happiness = preg_replace( "/[\,\.]/","",$happiness );
          $words = array_unique( preg_split( "/[ \n\r\t]+/", $happiness ) );
          usort( $words, create_function( '$a, $b', 'return strlen($a)-strlen($b);' ) );
          echo "<h4>The Sorted Text</h4>";
          foreach( $words as $word  ) {
            echo "$word ";
          }
        ?>

        <h3>Working with References</h3>
        <?php
          function resetCounter( &$c ) {
            $c = 0;
          }
          $counter = 0;
          $counter++;
          $counter++;
          $counter++;
          echo "$counter<br />";
          resetCounter( $counter );
          echo "$counter<br />";
          $mark = 41;
          $markRef =& $mark;
          $markRef = 49;
          echo "$markRef<br />";
          echo "$mark<br />";
        ?>
        <h3>Returning References from Your Own Functions</h3>
        <?php
          $age = 30;
          function &ageIncrement() {
            global $age;
            return $age;
          }
          $ageRef =& ageIncrement();
          $ageRef++;
          echo "$age<br />";
          echo "$ageRef<br />";
        ?>
        <h3>Writing Recursive Functions</h3>
          <h4>Fibonacci Series</h4>
          <?php

            function fibonacci( $n ) {
              if( $n == 0 || $n ==1 ) {
                return $n;
              }
              return fibonacci( $n-2 )+fibonacci( $n-1 );
            }
            $iterations = 10;
            echo "<table><tr><th>Sequence</th><th>Value</th></tr>";
            for( $i=0; $i<=$iterations; $i++ ) {
              if( $i % 2 == 0 ) {
                echo "<tr class = 'violet'>";
              }
              else echo "<tr class = 'lightV'>";
              echo "<td>F<sub>$i</sub></td><td>";
              echo fibonacci( $i )." ";
              echo "</td></tr>";
            }
            echo "</table>";
        ?>

        <h3>Excercises</h3>
        <h4>Excercise 1</h4>
        <?php
          function Markup ( $myArray ) {
            $markup = "<dl>\n";
            foreach( $myArray as $key => $val ) {
              $markup .= "<dt>$key</dt><dd>$val</dd>";
            }
            $markup .= "</dl>";
            return $markup;
          }
          $skills = array( "technical" => "php",
                            "health" => "yoga",
                            "creative" => "violin",
                            "power" => "workout");
          print "<pre>";
          echo Markup( $skills );
          print "</pre>";
          //echo "$skillString<br />";
        ?>
        <h4>Excercise 2</h4>
        <?php
          $iterations = 10;
          function factorial( $n ) {
            if( $n == 0 ) return 1;
            else if( $n > 0 ) {
              return factorial( $n-1 ) * $n;
            }
          }
          echo "<table><th>N</th><th>Factorial</th>";
          for( $i=0; $i<=10; $i++ ) {
            if ( $i%2 == 0 )
              echo "<tr class='violet'>";
            else echo "<tr class='lightV'>";
            echo "<td>$i</td><td>";
            echo factorial( $i );
            echo "</td></tr>";
          }
          echo "</table>";
        ?>

      </div>

    </div>

    <div id= "footer" >
      <p>Powered By @ AnnCreates</p>
    </div>

  </body>

</html>
