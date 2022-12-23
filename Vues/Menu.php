<div class="container";>
      <nav >
        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" style="color: #000000" href="?action=">ListePublic</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #000000" href="?action=pageListePrivee">ListePrivée</a>
            </li>
            <li class="nav-item">
            <?php if(isset($_SESSION['role']) && $_SESSION['role']== 'user') {
                    echo '<a class="nav-link" style="color: #000000" href="?action=logOut">Se deconnecter</a> ';
                }else{
                  echo '<a class="nav-link" style="color: #000000" href="?action=connexion">Se connecter</a>';
                }
            ?>           
            </li>
        </ul>
    </nav>
</div>