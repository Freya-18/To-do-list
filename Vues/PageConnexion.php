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
    <!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Se connecter</h2>

          <form  methode="POST">

            <div class="form-outline mb-4">
              <input type="text" id="form3Example3" class="form-control" name="login" placeholder="Entrer le login" required>
              <label class="form-label" for="form3Example3">login </label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" name="password" placeholder="Entrer le mot de passe" required>
              <label class="form-label" for="form3Example4">Password</label>
            </div>

            <input type="hidden" class="btn btn-primary" name="action" value="logIn"> 
            <button type="submit" class="btn btn-primary btn-block mb-4">
              Sign up
            </button>
                
          </form>
          <div>
            <a href=?action=retourAccueil> Retour accueil </a>
          </div> 
        </div>
      </div>
    </div>
  </div>
</section>
         
</body>