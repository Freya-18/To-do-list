<!doctype html>
<html lang="fr">
<head>
      <title>To do list</title>
      <meta charset="utf-8" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
      <link href="view/custom.css" rel="stylesheet">
</head>

<body>
  <div class="container">
      <nav>
        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="Accueil.php">ListePublic</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">ListePrivée</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./Vues/Connexion.php">Se connecter</a>
            </li>
        </ul>
    </nav>
  </div>

<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center my-3 pb-3">Application de To Do Liste</h4>

            <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
              <div class="col-12">
                <div class="form-outline">
                  <input type="text" id="form1" class="form-control" />
                  <label class="form-label" for="form1">Entrez une tâche ici</label>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Ajouter</button>
              </div>

            </form>

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Todo item</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>In progress</td>
                  <td>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>In progress</td>
                  <td>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>In progress</td>
                  <td>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</body>
</html>