<html>

<head>
  <title>PHP CHAPTER 4</title>
  <link rel="stylesheet" type="text/css" href="chapters_style.css" />

</head>

<body >

  <?php require_once("header.php") ?>

  <div id="main">

    <h2>Chapter 4</h2>

    <?php

    echo "<h3>Decisions and Loops </h3>";
    $marks = 12;
    if($marks >= 40)
    { $grade = "A"; }
    elseif($marks >= 30 && $marks <40)
    { $grade = "B"; }
    elseif($marks >= 20 && $marks < 30)
    { $grade = "C"; }
    else $grade = "D";

    switch($grade)
    {
      case "A":
        echo "A Grade <br />";
        break;
      case "B":
        echo "B Grade <br />";
        break;
      case "C":
        echo "C Grade <br />";
        break;
      case "D":
        echo "D grade <br />";
        break;
      default:
        print "Please select an option";
    }

    $color = "red";
    switch($color)
    {
      case "red":
        echo "red is your color <br />";
        break;
      case "green":
        echo "green is your color <br />";
        break;
      case "blue":
        echo "blue is your color <br />";
        break;
      case "yellow":
        echo "yellow is your color <br />";
        break;
      default:
          print "Please select an option";
    }
   ?>

   <h3 class="styling">Ternary Operator</h3>
   <?php

    $ann = "sad";
    $away="B is away :(<br />";
    $near = "B is near :)<br />";
    echo ($ann == "sad") ? $away : $near;

  ?>

  <h3 class="styling">Use Decisions to display a Greeting </h3>
  <?php
    $time = date("G");
    $year = date("Y");
  //  echo $year;
    if($time >=5 && $time <12)
      echo "Good morning Anu <br />";
    elseif ($time >= 12 && $time < 17)
      echo "Good afternoon Anu <br />";
    else if($time >=17 && $time < 20)
      echo "Good evening Anu <br />";
    else echo "Good night Anu <br />";
    $leapYear = false;
    if((($year%4 == 0) && ($year%100 != 0)) || $year%400 == 0 )
      $leapYear = true; //echo $leapYear;
      echo "<p>Did you know that $year is ".($leapYear ? "" :" not ")."leap year.</p><br />";
    $age = 30;
    $child = "You are a child <br />";
    $adult = "You are an adult <br />";
    echo ($age <= 1 && $age < 18) ? $child :$adult;
  ?>
  <h3 class="styling">While Loop</h3>
  <?php
    $date = 1;
    while($date <= 5)
    {
      echo "$date <br />";
      $date++;
    }
    echo "Congrats you have come out of the loop !!!";
  ?>

  <h3 class="styling">Do ..... While Loop</h3>
  <?php
    $mark1 = 0;
    $mark2 = 1;
    $mark3 = 2;
    do
    {
      $total = $mark1 + $mark2 + $mark3;
      echo "$mark1 $mark2 $mark3 $total <br />" ;
      $mark1++;
      $mark2++;
      $mark3++;
    } while($total <= 30);
  ?>

  <h3 class="styling">For Loop</h3>
  <?php
  for($love=10;$love>0;$love--)
  {
    echo "Love at $love<br/>";
  }
  echo "<h3>While loop with break</h3>";
  $child1 = 1;
  $child2 = 3;
  $child3 = 2;
  $chocolates = 100;
  while($chocolates>0)
  {
    $child1++;
    $chocolates--;
    if($chocolates<=0)
    break;
    $child2++;
    $chocolates--;
    if($chocolates<=0)
    break;
    $child3++;
    $chocolates--;
    if($chocolates<=0)
    break;
  }
  echo "First child has $child1 chocolates<br />";
  echo "Second child has $child2 chocolates<br />";
  echo "third child has $child3 chocolates <br />";

  $sweets = 100;
  while(true)
  {
    echo "There are $sweets sweets <br/>";
    $sweets -= 10;
    if($sweets==0)
    break;
  }

  $randomNum = rand(1,20);
  echo "$randomNum <br />";
  for($i=1;$i<=20;$i++)
  {
    echo "$i<br />";
    if($i==$randomNum){
      echo "Right guess <br />";
      break;
    }
  }

  echo "<h3>Continue Statement</h3>";
  for($i=1;$i<31;$i++)
  {
    if($i == 9) continue;
    echo "Today is June $i. <br />";
  }

  //Code for Nested Loops
  echo "<h3>Nested Loops</h3>";
  for($j=0;$j<2;$j++)
  {
    for($i=0;$i<10;$i++)
    {
      echo $j .$i." <br>";
    }
  }

  //Pattern printing
  for($i=0;$i<3;$i++)
  {
    echo "* * * <br />";
  }

  //Break in Nested Loops
  for($tens = 0;$tens < 10;$tens++)
  {
    for($units = 0;$units < 10;$units++)
    {
      if($units == 5) break 1;
      echo $tens.$units."<br />";
    }
  }
  for($tens = 0; $tens < 10; $tens++ )
  {
    for( $units = 0; $units < 10 ; $units++ )
    {
      if( $units == 5 ) break 2;
      echo $tens.$units."<br >";
    }
  }
$f0 = 0;
$f1 = 1;
echo '<h2>Fibonacci Sequence</h2>';
echo '<table>
        <tr style="color:red;"><td>Sequence</td><td>Value</td></tr>
        <tr><td>F<sub>0</sub></td><td>0</td></tr>
        <tr><td>F<sub>1</sub></td><td>1</td></tr>';

for($n = 2;$n <= 10;$n++)
{
  $f2= $f0+$f1;
  $f0 = $f1;
  $f1 = $f2;
  echo '<tr><td>F<sub>'.$n.'</sub></td><td>'.$f2.'</td></tr>';

}


  ?>
  <h2>Excercices</h2>
  <table>
    <tr><th>Number</th><th>Odd or Even?</th><th>Prime or Composite?</th></tr>
    <?php
      for($i = 1; $i <= 10; $i++)
      {
        //Odd or Even
        if( $i % 2 == 0){
         $message1 = "Even";}
        else  { $message1 = "Odd"; }

        //Prime or Not
        if( $i == 1) {
          $message2 = "Neither"; }
        elseif($i == 2) {
          $message2 = "Prime"; }
        else {
        for($j=2; $j <= $i/2; $j++)
        {

          if( $i % $j == 0 )
          { $message2 = "Composite";
            break;
          }
          else { $message2 = "Prime"; }
        }
          }
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $message1; ?></td>
      <td><?php echo $message2; ?></td>
    </tr>
    <?php

      }
    ?>
  </table>
</div>
</body>

</html>
