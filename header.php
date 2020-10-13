<?php


echo '

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">																					
							
			<div class="session-info">
			';
			if (!isset($_SESSION['username']))
			{
				echo '
					<input class="login_element" style="font-family: sans-serif;" type="text" placeholder="Nom d\'utilisateur" required="required" data-error="Un nom d\'utilisateur valide est requis." name="login" id="auth_login">
					<input class="login_element" style="font-family: sans-serif;" type="password" placeholder="Mot de passe" required="required" name="password" id="auth_mdp">
					<button  class="btn login_element" style="padding-top:1px;padding-bottom:1px;font-family: sans-serif;"  value="Connexion" id="auth_btn" onclick="connexion()">Se connecter</button>
				' ;
			}else 
			{
				echo '<span class="login_element">Bonjour, <span id="session_username">'.$_SESSION['username'].'</span></span>';
				echo '&nbsp&nbsp<span id="deco_btn" class="login_element"><a class="btn btn-deco btn-outline-danger" href="auth_WS.php">Se déconnecter</a></span>' ;
			}		
				
			echo '</div>
															
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">													
			<div class="logo_container">
				<img src="images/logo.png" alt="Petites Annonces">
			</div>
			
			<div class="title_container" >
				<a href="index.php">Petites<span>Annonces</span></a>
			</div>
			
			<nav class="navbar">
				<ul class="navbar_menu">
					<li><a href="index.php">Accueil</a></li>
					<li><a href="listeAnnonces.php">Liste des annonces</a></li>
					<li><a href="listeAnnonces_d.php">Gestion annonces</a></li>
				</ul>
				
				<div class="hamburger_container">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
			</nav>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
<!--
				<li style="margin-top:10px;width:600px; color : white ;" class="session-info">
				';
				if (!isset($_SESSION['username']))
				{
					echo '<form class="form_login">
						<input style="font-family: sans-serif;width:120px;" type="text" placeholder="Nom d\'utilisateur" required="required" data-error="Un nom d\'utilisateur valide est requis." name="login">
						<input style="font-family: sans-serif;width:120px;" type="password" placeholder="Mot de passe" required="required" name="password">
						<button type="submit" class="btn" style="padding-top:1px;padding-bottom:1px;font-family: sans-serif;" value="Connexion">Se connecter</button>
					</form>' ;
				}else 
				{
					echo '<span>Bonjour, '.$_SESSION['username'].'</span>';
					echo '&nbsp&nbsp<span id="deco_btn"><a class="btn" href="auth_WS.php">Se déconnecter</a></span>' ;
				}		
					
				echo '</li>
-->

				
				
				<li class="menu_item"><a href="index.php">Accueil</a></li>
				<li class="menu_item"><a href="listeAnnonces.php">Liste des annonces</a></li>
				<li class="menu_item"><a href="listeAnnonces_d.php">Gestion annonces</a></li>

			</ul>
		</div>
	</div>
	
</div>'; 

