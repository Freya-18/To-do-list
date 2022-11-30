<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>To Do List/title>
    <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<?php
  foreach($news as $row) {
			echo "
        <section class=\"vh-100\" style=\"background-color: #eee;\">       
         <div class=\"container py-5 h-100\">
            <div class=\"row d-flex justify-content-center align-items-center h-100\">
            <div class=\"col col-lg-9 col-xl-7\">
                <div class=\"card rounded-3\">
                <div class=\"card-body p-4\">

                    <h4 class=\"text-center my-3 pb-3\"> Ma list</h4>

                    <form class=\"row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2\">
                    <div class=\"col-12\">
                        <div class=\"form-outline\">
                        <input type=\"text\" id=\"form1\" class=\"form-control\" />
                        <label class=\"form-label\" for=\"form1\">Entrer une tache ici</label>
                        </div>
                    </div>

                    <div class=\"col-12\">
                        <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
                    </div>
                    </form>

                    <table class=\"table mb-4\">
                    <thead>
                        <tr>
                            <th scope=\"col\">Numero </th>
                            <th scope=\"col\">Nom</th>
                        </tr>
                    </thead>
                    ";
                    for($i = 1; $i <= $nbNewsEnBase; $i++) {
                        echo"
                            <tbody>
                            <tr>
                            <td>$i->id</td>
                            <td>$i->nom</td>
                            <td>
                                <button type=\"submit\" class=\"btn btn-danger\">Supprimer</button>
                                <button type=\"submit\" class=\"btn btn-success ms-1\">Terminer</button>
                            </td>
                            </tr>          

                        </tbody>
                        </table>

                        ";
                    }
            echo"
                </div>
                </div>
            </div>
            </div>
        </div>
        </section
        </body>
    </html>
    ";}
?>


</html>