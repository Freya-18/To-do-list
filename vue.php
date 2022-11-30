<?php

    echo "<!doctype html>";
        echo "<html lang=\"fr\">";
        echo "<head>
                <meta charset=\"utf-8\">
                <title>Titre de la page</title>
                <!-- CSS only -->
                <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65\" crossorigin=\"anonymous\">
            </head>";
        echo "<body>";

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
