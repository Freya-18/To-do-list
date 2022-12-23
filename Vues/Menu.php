<div class="container">
      <nav>
        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="?action=">ListePublic</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"href="?action=pageListePrivee">ListePrivée</a>
            </li>
            <li class="nav-item">
            <?php if(isset($_SESSION['role']) && $_SESSION['role']== 'user') {
                    echo '<a class="nav-link" href="?action=pageConnexion">Se deconnecter</a> ';
                }else{
                  echo '<a class="nav-link" href="?action=connexion">Se connecter</a>';
                }
            ?>           
            </li>
        </ul>
    </nav>
</div>