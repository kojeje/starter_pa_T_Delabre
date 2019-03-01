<?php
require('../config.php');
global $mysqli;
$matiere_id = intval($_GET['idmatiere']);
if(isset($_GET['asc'])){
    $matiere_req = "SELECT * FROM notes WHERE note_matiere_id = '".$matiere_id."' ORDER BY note_note ASC";
}elseif(isset($_GET['desc'])){
    $matiere_req = "SELECT * FROM notes WHERE note_matiere_id = '".$matiere_id."' ORDER BY note_note DESC";
}else{
    $matiere_req = "SELECT * FROM notes WHERE note_matiere_id = '".$matiere_id."' ";
}
if($resultat = $mysqli->query($matiere_req) ){
    ?>
    <table class="table table-hover table-striped">
        <thead>
            <th>Prénom</th>
            <th>Nom</th>
            <th id="note-order">Note</th>
        </thead>
        <tbody>
            <?php
            while( $res = $resultat->fetch_object()){
                $note = $res->note_note;
                $user_req = "SELECT users_name, users_surname FROM users WHERE id = '".$res->note_user_id."' LIMIT 1";
                if($resultat2 = $mysqli->query($user_req)){
                    while( $res2 = $resultat2->fetch_object()){
                        $nom = $res2->users_name;
                        $prenom = $res2->users_surname;
                    }
                }
                ?>
            <tr>
                <td><?php echo $nom ?></td>
                <td><?php echo $prenom ?></td>
                <td><?php echo $note ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
<?php
}
?>