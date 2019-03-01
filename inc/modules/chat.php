<div class="col-md-12">
    
<h1>Chat</h1>
        <p>Ici vient le chat</p>
</div>
<div class="col-md-8">    
    <table class="chat"><tr>		
	<!-- zone des messages -->
	<td valign="top" id="text-td">
            	<div id="annonce"></div>
		<div id="text">
			<div id="loading">
				<span class="info" id="info">Chargement du chat en cours...</span><br />
				<img src="assets/loader.gif" alt="patientez..." width="32">
			</div>
		</div>
	</td>
	<!-- colonne avec les membres connectés au chat -->
	<td valign="top" id="users-td"><div id="users">Chargement</div></td>
</tr></table>
<a name="post"></a>
	<table class="post_message"><tr>
		<td>
		<form action="" method="" onsubmit="postMessage(); return false;">
			<input type="text" id="message" maxlength="255" />
			<input type="button" onclick="postMessage()" value="Envoyer" id="post" />
		</form>
        <div id="responsePost" style="display:none"></div>
		</td>
    </tr></table>
    



<style>
body {
	background: #d2d2d2;
}
/* Pour que les liens ne soient pas soulignés */
a {
	text-decoration: none;
}
img {
	vertical-align: middle;
}
/* Conteneur principal des blocs de la page */
#container {
	width: 80%;
	margin: 50px auto;
	padding: 2px 20px 20px 20px;
	background: #fff;
}

/* Bloc contenant la zone de texte et bouton */
.post_message  {
	width: 95%;
	margin: auto;
	border: 1px solid #d2d2d2;
	background: #f8fafd;
	padding: 3px;
}
/* Zone de texte */
.post_message #message {
	width: 80%;
}
/* Bouton d'envoi */
.post_message #post {
	width: 18%;
}

/* La zone où sont affichés les messages
et utilisateurs connectés */
.chat {
	width: 95%;
	margin: 10px auto;
	border: 1px solid #d2d2d2;
	padding: 0px;
}
/* Bloc de chargement */
.chat #loading {
	margin-top: 50px;
}
/* Annonce */
.chat #annonce {
	background: #f8fafd;
	margin: -6px -7px 5px -7px;
	padding: 5px;
	height:20px;
	box-shadow: 8px 8px 12px #aaa;
	-webkit-box-shadow: 0px 8px 15px #aaa;
}
/* Zone des messages */
.chat #text-td {
	margin: 0px; 
	padding: 5px; 
	width: 80%; 
	background: #fff; 
}
/* Zone des utilisateurs connectés */
.chat #users-td, .chat #users-chat-td {
	margin: 0px; 
	padding: 5px; 
	width: 20%; 
	background: #ddd;
}
.chat #text, .chat #users, .chat #users-chat {
	height:500px; 
	overflow-y: auto;
}

/* Modification du statut */
.status {
	width: 95%;
	border: none;
	background: #fff;
	margin: auto;
	text-align: right;
}

.info {
	color: green;
}
</style>






    </div>
    <div class="col-xl-4">
    <table class="status"><tr>
		<td>
			<span id="statusResponse"></span>
			<select name="status" id="status" style="width:200px;" onchange="setStatus(this)">
				<option value="0">Absent</option>
				<option value="1">Occup&eacute;</option>
				<option value="2" selected>En ligne</option>
			</select>
		</td>
    </tr></table>
    </div>
