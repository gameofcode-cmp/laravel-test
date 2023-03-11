<?php
class view {
    public function render(string $data = '') {
        echo '<!DOCTYPE html>
            <html xmlns="">
            <head>
              <title>Search User</title>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            </head>
            <body>
              <h1>Search User</h1>
              <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
                <input type="hidden" id="csrf" name="csrf_token" value="<?php echo $_SESSION[\'csrf_token\']; ?>">
                <button onclick="search()" type="button" id="search-btn">Search</button>
              </form>
              <div id="results"></div>
            </body>

            <script>
            function search() {
              var name = document.getElementById("name").value;
              var csrf = document.getElementById("csrf").value;
              if (name != "") {
                $.ajax({
                  url: "task3.php",
                  type: "POST",
                  data: { name: name, csrf: csrf },
                  success: function(result) {
                    $("#results").html(result);
                  }
                });
              }
            }
            </script>

            </html>';

    }

    public function renderTable($data) {
        //todo make to generic table renderer
        $view = '';
        if ($data) {
            $view .= "<table>";
            $view .=  "<thead><tr><th>First Name</th><th>Last Name</th><th>Email</th></tr></thead>";
            $view .=  "<tbody>";
            foreach ($data as $row) {
                $view .=  "<tr><td>" . $row['FirstName'] . "</td><td>" . $row['LastName'] . "</td><td>" . $row['Email'] . "</td></tr>";
            }
            $view .=  "</tbody>";
            $view .=  "</table>";
        }

        return $view;
    }
}
