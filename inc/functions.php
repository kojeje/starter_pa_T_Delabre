<?php
function user_verified() {
	return isset($_SESSION['activity']['username']);
}
function urllink($content='') {
	$content = preg_replace('#(((https?://)|(w{3}\.))+[a-zA-Z0-9&;\#\.\?=_/-]+\.([a-z]{2,4})([a-zA-Z0-9&;\#\.\?=_/-]+))#i', '<a href="$0" target="_blank">$0</a>', $content);
	// Si on capte un lien tel que www.test.com, il faut rajouter le http://
	if(preg_match('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', $content)) {
		$content = preg_replace('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', '<a href="http://www.$1" target="_blank">www.$1</a>', $content);
		//preg_replace('#<a href="www\.(.+)">#i', '<a href="http://$0">$0</a>', $content);
	}
	$content = stripslashes($content);
	return $content;
}


function listUsers($percentage){ // en nombre entier 0-100
    global $mysqli;
    // Récupérer un pourcentage des résultats
        $student_list_request = "SELECT * FROM users";
        if( $resultat = $mysqli->query($student_list_request) ){
        $row_cnt = $resultat->num_rows;
        }
        $number = ($row_cnt * $percentage) / 100;
        $number = intval($number);
    $student_list_request = "SELECT * FROM users LIMIT ".$number;
    if( $resultat2 = $mysqli->query($student_list_request) ){
        while($res = $resultat2->fetch_object()){
            ?>
            <div class="m-widget4__item">
                <div class="m-widget4__img m-widget4__img--logo">							 
                    <img src="<?php echo $res->users_avatar; ?>" alt="">   
                </div>
                <div class="m-widget4__info">
                    <span class="m-widget4__title">
                    <?php echo $res->users_name." ".$res->users_surname; ?> 
                    </span><br> 
                    <span class="m-widget4__sub">
                    <?php echo $res->users_username; ?> | <?php echo $res->users_email; ?>
                    </span>		 
                </div>
                <span class="m-widget4__ext">
                    <span class="m-widget4__number m--font-brand"><?php echo $res->id; ?></span>
                </span>	
            </div>
        <?php
        }        
    }
}
// Affichage des news
function studentDisplayNews(){
    global $mysqli;
    $news_request = "SELECT * FROM news_feed LEFT JOIN users ON news_feed.news_author = users.id ORDER BY news_feed.id ASC LIMIT 8";
    if($resultat_news = $mysqli->query($news_request) ){
        while( $res = $resultat_news->fetch_object()){
            $news_title = $res->news_title;
            $news_url = $res->news_link_external;
            $news_author = $res->users_username;
            $datesql = new DateTime($res->news_date_publish);
            $date = $datesql->format('dM');
?>
            <div class="m-timeline-3__item m-timeline-3__item--info">
                <span class="m-timeline-3__item-time"><?php echo $date; ?></span> 
                <div class="m-timeline-3__item-desc">							 
                    <span class="m-timeline-3__item-text">
                    <?php 
                        if($news_url !== ''){ echo '<a href="'.$news_url.'"target="_blank">'; }
                        echo $news_title;
                        if($news_url !== ''){ echo '</a>'; }
                    ?>
                    </span><br>
                    <span class="m-timeline-3__item-user-name">
                    <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                    Author: <?php 
                        echo $news_author;
                    ?>
                    </a>
                    </span>		 
                </div>
            </div>
        <?php
        }
    }
}
function studentDisplayNotes($id){
    global $mysqli;
    $student_notes_request = "SELECT * FROM notes WHERE note_user_id = '".$id."' LIMIT 7";
    if($resultat_notes = $mysqli->query($student_notes_request) ){
        while( $res = $resultat_notes->fetch_object()){
            $matiere = $res->note_matiere_id;
            $matiere_request = "SELECT * FROM matieres WHERE id = '".$matiere."'";
            if($mat_notes = $mysqli->query($matiere_request) ){
                while( $res2 = $mat_notes->fetch_object()){
                    $matiere_name = $res2->matieres_name;
                }
            }
            $prof = $res->note_prof_id;
            $prof_request = "SELECT * FROM users WHERE id = '".$prof."'";
            if($prof_notes = $mysqli->query($prof_request) ){
                while( $res3 = $prof_notes->fetch_object()){
                    $prof_name = $res3->users_surname.' '.$res3->users_name;
                    $prof_email = $res3->users_email;
                }
            }
        ?>
            <tr>
                <td> <?php echo $matiere_name; ?></td>
                <td><?php echo $res->note_note; ?> / 5</td>
                <td><a href="profile.php?id=<?php echo $prof; ?>"><?php echo $prof_name; ?></a></td>
                <td><?php echo $res->note_commentaire; ?></td>
            </tr>
        <?php
        }
    }
}


function studentMoyenne($id){
    global $mysqli;
    $student_notes_request = "SELECT * FROM notes WHERE note_user_id = '".$id."'";
    if($resultat_notes = $mysqli->query($student_notes_request) ){
        $moyenne = 0;
        $nbr_notes = $resultat_notes->num_rows;
        while( $res = $resultat_notes->fetch_object()){
            $moyenne += $res->note_note;
        }
        if($nbr_notes >= 1){
            $moyenne = $moyenne / $nbr_notes;
            $moyenne_arrondie = round($moyenne);
            $moyenne = "Votre moyenne: <strong>".$moyenne."/5</strong>.";
            switch ($moyenne_arrondie):
                case 0:
                    $moyenne .= '<span class="small">Vraiment merdique...</span>';
                    break;
                case 1:
                    $moyenne .= '<span class="small">Vraiment pas terrible...</span>';
                    break;
                case 2:
                    $moyenne .= '<span class="small">Presque sauvé...</span>';
                    break;
                case 3:
                    $moyenne .= '<span class="small">De justesse...</span>';
                    break;
                case 4:
                    $moyenne .= '<span class="small">Bravo petit champion...</span>';
                    break;
                case 5:
                    $moyenne .= '<span class="small">Welcome Einstein...</span>';
                    break;
                default:
                    $moyenne .= '';
            endswitch;
        }else{
            $moyenne = "Vous n'avez pas encore de notes.";
        }
        return $moyenne;
    }
}


?>