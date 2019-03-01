<div class="card">
    <div class="header">
        <h4 class="title">Vos dernières notes</h4>
    </div>
    <div class="content">
        <p>Choose your matière: </p>
        <?php
        $matiere_req = "SELECT * FROM matieres";
        if($resultat = $mysqli->query($matiere_req)){
            echo '<select id="matieres-select" onchange="displayNotes(this.value, false)">';
            echo '<option selected value="">Choisissez votre matière</option>';
            while( $res = $resultat->fetch_object()){
                echo '<option value="'.$res->id.'">'.$res->matieres_name.'</option>';
            }
            echo '</select>';
        }
        ?>
    </div>
    <div  id="notes-display" class="content table-responsive table-full-width"></div>

        <div id="maposition"></div>
</div>
