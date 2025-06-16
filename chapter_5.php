<html>

  <head>

    <title>PHP CHAPTER 5</title>
    <link rel="stylesheet" type="text/css" href="chapters_style.css" />

  </head>

  <body>

    <?php require_once("header.php") ?>

    <div id="main">

      <h2>Chapter 5: STRINGS</h2>

      <h3>Creating and accessing Strings</h3>
      <?php

        $myString = "World";
        echo $myString."<br />";
        echo "Hello, $myString !!!<br />";
        echo 'Hello, $myString !!!<br />';
        echo "<pre>Hi\tthere</pre>";
        echo '<pre>Hi\tthere</pre>';
        echo "1\t2";
        echo "<pre>1\t2</pre><br />";
        echo 'It was indeed a \'good\' film.<br />';
        echo '\\\'Daily Journal.\'<br />';
        $day = "
          Woke up late:
          Was a sunny day;
          Was unproductive;
          Watched a show;
          Learned something new
        ";
        echo $day."<br/>";

      ?>

      <h3>Complex Expressions within Strings</h3>
      <?php

        $favouriteAnimal = "Cat";
        echo "My favourite animals are {$favouriteAnimal}s.<br />";
        $myArray["age"] = 31;
        echo "My age is {$myArray["age"]}.<br />";
       ?>

       <h3>Using your own Delimiters </h3>
       <?php

        $myString = <<<EVENING

        "Its indeed a beautiful evening" - said the little girl. She then jumped with happiness!
        EVENING;
        echo "<pre>$myString</pre><br />";
        $message = "Good Day";
        $myString = <<<'MORNING'
        " Mornings are always beautiful. Each day starts with a new hope and positivity. $message."
        MORNING;
        echo "<pre>$myString<br /></pre>";

       ?>

       <h3>Other ways to Create Strings</h3>
       <?php
        $thisString = "Hey there!";
        $myString = $thisString;
        echo $myString."<br />";
      ?>

      <h3>Finding the Length of a String</h3>
      <?php
        echo strlen($myString)."<br />";
        $password = "jkfsd";
        if(strlen($password) < 8)
        {
          echo "Too short password.<br />";
        }
        echo "Word count  is ".str_word_count($myString).".<br />";

      ?>

      <h3>Accessing characters within a String</h3>
      <?php
        echo  $myString[4]."<br />";
        $myString[9] = '?';
        echo $myString."<br />";
        echo substr($myString,-5,-1)."<br />";
      ?>

      <h3>Searching Strings with strstr()</h3>
      <?php
        $testString = "aaababaaaabaaabaaab";
        echo strstr($testString,"abab")."<br />";
        echo (strstr($testString,"bbb")) ? "Yes" : "No";
        echo "<br />".strstr($testString,"baba",true)."<br /> " ;
      ?>

      <h3>Locating String with strpos() and strrpos()</h3>
      <?php
        echo "Test string is ".$testString."<br />";
        echo "Length of the string is ".strlen($testString).".<br />";
        echo strpos($testString,"abab")."<br />";
        echo strpos($testString,"bb")."<br />";
        if(!strpos($testString,"aaa"))
          echo "Not Found.<br />";
        if(strpos($testString,"aaa") === false)
          echo "Not Found <br />";
        echo strpos($testString,"ab")."<br />";
        echo strpos($testString,"ab",7)."<br />";
        $pos = 0;
        while(($pos = strpos($testString,"ab",$pos)) !==false)
        {
          echo "Text \"ab\" found at position: $pos <br />";
          $pos++;
        }
        echo strrpos($testString,"ba")."<br />";
        echo strpos($testString,"ba")."<br />";
        echo strrpos($testString,"ba",9)."<br />";
        echo strrpos($testString,"ba",-7);
      ?>

      <h3>Finding the Number of Occurrences with substr_count()</h3>
      <?php
        $myString = "I say, nay, nay, and thrice nay!";
        echo substr_count($myString,"nay")."<br />";
        echo substr_count($myString,"nay",9)."<br />";
        echo substr_count($myString,"nay",9,6)."<br />";
        $passage = "<h4>Love</h4>
        Pray together and you will stay together. Scientific prayer solves all problems. Mentally
        picture your wife as she ought to be strong, joyous,happy, healthy, and beautiful. See your
        husband as he ought to be strong, powerful, loving, harmonious, and kind. Maintain this
        mental picture, and you will experience the marriage made in heaven which is harmony and peace.";
        echo $passage."<br />";
        echo "The word \"and\" occurs ".substr_count($passage,"and")." times in the passage.";
        ?>

        <h3>Searchig for a set of Characters with strpbrk()</h3>
        <?php
        $myString = "abaabaabbabb";
        echo strpbrk($myString,"abcd")."<br />";
        echo strpbrk($myString,"xyz")."<br />";
        $username = "anu@home";
        if(strpbrk($username,"!@#"))
          echo "!@# not allowed.<br />";
        ?>

        <h3>Replacing All Occurrences using str_replace()</h3>
        <?php
          $myString = "It was a good movie;also it was an entertaining movie.";
          echo str_replace("movie","song",$myString,$num)."<br />";
          echo "The string was replaced $num times.<br />";
        ?>

        <h3>Replacing a portion of a String with substr_replace()</h3>
        <?php
          $string1 = "I like apple.He like apple.";
          echo substr_replace($string1,"orange",7)."<br />";
          echo substr_replace($string1,"orange",7,5)."<br />";
          echo substr_replace($string1,"orange",7,-14)."<br />";
          echo substr_replace($string1," really",1,0)."<br />";
        ?>
        <form method="post">
          Find and Replace<br />
          Enter your text string here:<br />
          <textarea name="test" rows="10" cols="90"></textarea><br />
          <label for="find">Find</label>
          <input type="text" name="find" />
          <label for="replace">Replace</label>
          <input type="text" name="replace" />
          <input type="submit" name="rplace" value="Replace All">
        </form>
        <?php
          if(isset($_POST['replace']))
          {
            $find = $_POST['find'];
            $rplace =$_POST['replace'];
            $test= $_POST['test'];
            echo str_replace($find,$rplace,$test,$num)."<br />";
            echo "$num matches found <br />";

          }
        ?>

        <h3>Justifying Text</h3>
        <?php
          $harmony = <<<HARMONY
          Sigmond Freud, the Austrian founder of psychoanalysis,
          said that unless the personality has love, it sickens
          and dies.Love includes understanding,good will, and
          respect for the divinity in the other person. The more
          Love and good will you emanate and exude, the more comes
          back to you.

          HARMONY;

          $harmony = str_replace("\r\n","\n",$harmony);
          $lineLength = 60;
          $harmonyJustified = "";
          $numLines = substr_count($harmony,"\n");
          $startOfLine = 0;

          for( $i=0; $i<$numLines; $i++) {

            $originalLineLength = strpos($harmony,"\n",$startOfLine) - $startOfLine;
            $justifiedLine = substr($harmony,$startOfLine,$originalLineLength);
            $justifiedLineLength = $originalLineLength;

            while ( $i<$numLines-1 && $justifiedLineLength<$lineLength) {
              for ($j=0; $j <$justifiedLineLength ; $j++) {
                if( $justifiedLineLength<$lineLength && $justifiedLine[$j] == " ") {
                  $justifiedLine = substr_replace($justifiedLine," ",$j,0);
                  $justifiedLineLength++;
                  $j++;
                }
              }
            }
            $harmonyJustified .= "$justifiedLine\n";
            $startOfLine += $originalLineLength + 1;
          }
        ?>
        <h4>Original Text</h4>
          <pre><?php echo $harmony; ?></pre>
        <h4>Justified Text</h4>
          <pre><?php echo $harmonyJustified; ?></pre>

        <h3>Translating Strings with strtr()</h3>
        <?php
          $myString = "Here's a little string";
          echo strtr($myString," '","+-")."<br />";
        ?>

        <h3>Dealing with upper and lowercase</h3>
        <?php
          $myString = "Hey There";
          echo strtolower($myString)."<br />";
          echo strtoupper($myString)."<br />";
          $night = "what a beautiful night";
          echo ucfirst($night)."<br />";
          $happy = "IAM HAPPY";
          echo lcfirst($happy)."<br />";
          echo ucwords($happy)."<br />";
        ?>

        <h3>Formatting Strings</h3>
        <?php
        $nums = 2;
        printf("She has %d pens.",$num);
        ?>

        <h3>Using Type Specifiers</h3>
        <?php
          $myNumber = 123.45;
          printf("Binary: %b<br />",$myNumber);
          printf("Character: %c<br />",$myNumber);
          printf("Decimal: %d<br />",$myNumber);
          printf("Scientific: %e<br />",$myNumber);
          printf("Float: %f<br />",$myNumber);
          printf("Octal: %o<br />",$myNumber);
          printf("String: %s<br />",$myNumber);
          printf("Hex (lower case): %x<br />",$myNumber);
          printf("Hex (upper case): %X<br />",$myNumber);
        ?>

        <h3>Specifying Signs</h3>
        <?php
          printf("%d<br />",123);
          printf("%d<br />",-123);
          printf("%+d<br />",123);
          printf("%+d<br />",-123);
        ?>

        <h3>Padding the Output</h3>
        <?php
          printf("%05d<br />",123);
          printf("%05d<br />",4567);
          printf("%06d<br />",12345678);
          print "<pre>";
          printf("% 20s\n","Hi");
          printf("% 20s\n","Hello");
          printf("% 20s\n","Hey there");
          print "</pre>";
          printf("%5d<br />",123);
          printf("%'#5s<br />","love");
          printf("%'#-8s<br />","love");
        ?>

        <h3>Specifying Number Precision</h3>
        <?php
          printf("%f<br />",123.4567);
          printf("%.6f<br />",123.4567);
          printf("%.0f<br />",123.4567);
          printf("%.10f<br />",123.4567);
          echo "<pre>";
          printf("%.2f\n",123.4567);
          printf("%012.2f\n",123.4567);
          printf("%12.4f\n",123.4567);
          echo "</pre>";
          printf("%.8s\n","Hello, world!");
        ?>

        <h3>Swapping Arguments</h3>
        <?php
          $mailbox = "Inbox";
          $totalMessages = 36;
          $unreadMessages = 4;
          printf(file_get_contents("template.txt"),$totalMessages,$mailbox,$unreadMessages);
        ?>

        <h3>Trimming Strings with trim(), ltrim(), rtrim()</h3>
        <?php
          $myString = "   There is too many space!   ";
          echo "<pre>";
          echo "|".trim($myString)."|\n";
          echo "|".ltrim($myString)."|\n";
          echo "|".rtrim($myString)."|\n";
          echo "</pre>";
          $blbl1 = "1:  There were bad days for a while\n";
          $blbl2 = "2:  Then there were some ok days\n";
          $blbl3 = "3:  Then good days arrived and left\n";
          echo "<pre>";
          echo ltrim($blbl1,"0..9:  ");
          echo ltrim($blbl2,"0..9:  ");
          echo ltrim($blbl3,"0..9:  ");
          echo "</pre>";
        ?>

        <h3>Padding Strings with str_pad()</h3>
        <?php
          echo "<pre>";
          echo str_pad("Hello, world!",20);
          echo "</pre>";
          echo str_pad("Hello, world!",20,"*")."<br />";
          echo str_pad("Hello, world!",20,"123")."<br />";
          echo str_pad("Hello, world!",20,"*",STR_PAD_LEFT)."<br />";
          echo str_pad("Hello, world!",20,"*",STR_PAD_BOTH)."<br />";
        ?>

        <h3>Wrapping lines of Text with wordwrap()</h3>
        <?php
          $freedom = "You can build the idea of freedom and peace of mind into your mentality so that it reaches your subconscious depths. The latter, being all-powerful, will free you from all desire for junk food.Then you will have the new understanding of how your mind works, and you can truly back up your statement and prove the truth to yourself.";
          echo "<pre>";
          echo wordwrap($freedom);
          echo "</pre>";
          echo "<pre>";
          echo wordwrap($freedom,40);
          echo "</pre>";
          echo wordwrap($freedom,40,"<br />")."<br />";
          $myString = "It is definitely a good day with a comparitively early start";
          echo wordwrap($myString,10,"<br />");
          echo "<br /><br />";
          echo wordwrap($myString,10,"<br />",true);
        ?>

        <h3>Excercises</h3>
        <?php
        printf("Excercise 1<br />");
        printf("%02d/%02d/%d<br />",1,31,1999);
        printf("Excercise 2<br />");
        $myString = "Its good to have a healthy breakfast.";
        $desiredLength = 50;
        echo "<pre>Original String:  '$myString'</pre>";
        while( strlen($myString) < $desiredLength )
        {
          $myString .=" ";
        }
        echo "<pre>Padded String:  '$myString'</pre>";

        ?>


      </div>

    <?php require_once( "footer.php" ) ?>

  </body>

</html>
