<!DOCTYPE html>

<html>

  <head>

    <title>PHP CHAPTER 9</title>
    <link rel="stylesheet" type="text/css" href="chapters_style.css" />

  </head>

  <body>

    <?php require_once("header.php") ?>

    <div id = "main_content">

      <div id="main">

          <h2>CHAPTER 9: HANDLING HTML FORMS WITH PHP</h2>
          <h3>Create an HTML Form</h3>

          <form action="" method="get">
            <div style="width:25em;" >
              <label for = "name">Name</label>
              <input type="text" name="name" id="name" /><br />
              <label for="password">Password</label>
              <input type="password" name="pass" id="pass" /><br />
              <label for="graduation">Are you graduated?</label>
              <input type="checkbox" name="graduation" id="graduation" value="Yes" /><br />
              <label for="gender">Gender</label>
              <input type="radio" name="gender"  id="gender" value="Female" />
              <label for="female">Female</label>
              <input type="radio" name="gender" id="gender" value="Male" />
              <label for="male">Male</label><br />
              <label for="certificate">Upload Certificate</label>
              <input type="file" name="certificate" id="certificate" value="" /><br />
              <label for="hiddenField">Hidden Field</label>
              <input type="hidden" name="hiddenField" id="hiddenField" value="" /><br />
              <label for="logo">Logo</label>
              <input type="image" name="logo" id="logo" value="" src="images/two_tea.jpg" height="20%" width="20%"/>
              <br />
              <label for="quote">Request a Quote</label>
              <input type="button" name="quote" id="quote" value="Get Quote" onclick="getQuote()" /><br />
              <label for="qualification">Qualification</label>
              <select name="qualification" id="qualification" size="1">
                <option value="BTech">BTech</option>
                <option value="MTech">MTech</option>
              </select><br />
              <label for="city">Select your City</label><br />
              <select name="city" id="city" size="3">
                <option value="Kozhikode">Kozhikode</option>
                <option value="Kochi">Kochi</option>
                <option value="Kottayam">Kottayam</option>
              </select><br />
              <label for="skills">Select Your Skills.<br />( Press Ctrl key to select multiple options. )</label><br />
              <select name="skills" id="skills" size="3" multiple="multiple">
                <option value="CSS">CSS</option>
                <option value="HTML">HTML</option>
                <option value="JavaScript">JavaScript</option>
                <option value="Laravel" selected="selected">Laravel</option>
                <option value="PHP">PHP</option>
                <option value="SQL">SQL</option>
              </select><br />
              <label for="yourself">Introduce Yourself</label>
              <textarea name="yourself" id="yourself" rows="4" cols = "50">My Name is ... </textarea><br />
              <label for="edit">Reset the Entries </label>
              <input type="reset" name="edit" id="edit" value="Reset"/><br />
              <input type="submit" name="save" id="save" value="Submit Application" />
            </div>

          </form>

          <?php?>
      </div>
    </div>

     <?php require_once( "footer.php" ) ?>

    <script>

      function getQuote() {
        alert( "Happy are those who dare courageously to defend what they love." );
      }

    </script>

  </body>

</html>
