// s'assure que le contenu du DOM a bien été chargé avant de procéder à l'exécution de Javascript
document.addEventListener("DOMContentLoaded", function(event) { 
  
  var username ; 
    var contenu_filtre ;
    var filtreAnnonces = document.getElementById('filtre_annonces') ;


});





function afficherAnnonces(btn)
{
  btn.disabled = true ; 
  btn.firstChild.data = "Chargement..." ;
  contenu_filtre = filtre_annonces.value ; 
  recupAnnonces(contenu_filtre,btn) ;   
}


function recupAnnonces(filtre, btn)
{
	var remoteUrl ;
	var wsUrl = 'getAnnonces_WS.php' ;

	if ( filtre == null || filtre == '')
	{
		remoteUrl = wsUrl ; 
	} 
	else 
  {
    remoteUrl = wsUrl+'?filtre='+filtre ;
  }
  	
  var request = new XMLHttpRequest();
  request.open('GET', remoteUrl , true);
  request.setRequestHeader('Content-type', 'application/json');
  request.onload = function() 
  { 
      if (request.status === 200 ) 
      {                  
          var responseObj = JSON.parse(request.responseText) ;           
          injecterAnnonces('contenu-de-page',responseObj);                      
      } else 
      {
        alert("Une erreur est survenue lors de la requete AJAX");    
      }
      btn.disabled = false ;
      btn.firstChild.data = "Afficher les données" ;
  };
  request.onerror = function() 
  {  
    console.log("Probleme de requete AJAX") ;
  };
  request.send();

}







function injecterAnnonces(conteneur,data) 
{	
  var conteneur = document.getElementById(conteneur) ;
  var session_username = document.getElementById('session_username') ;
  var recap ;
if ( data.length == 0 )
{
  recap = "<h5>Nous n'avons trouvé <span style='font-weight : bold'>aucun résultat </span> pour votre recherche.</h5><br/>";
}else if ( data.length == 1)
{
  recap = "<h5>Nous avons trouvé <span style='font-weight : bold'>"+data.length+" résultat </span> pour votre recherche.</h5><br/>";
}else 
{
  recap = "<h5>Nous avons trouvé <span style='font-weight : bold'>"+data.length+" résultats </span> pour votre recherche.</h5><br/>";
}
  
  conteneur.innerHTML = recap;
  

  
  console.log("Nous avons trouvé "+data.length+" résultat(s) pour votre recherche.");
  
  Array.prototype.forEach.call(data, function(item) {                          
      var annonce = '<li data="'+item['id']+'">'
            +'<a href="#" class="product-photo">'
                +'<img src="'+item['photo']+'" height="160" alt="product" />'
            +'</a>'
            +'<div class="product-details">'                            
                +'<h2>'+item['titre']+'</h2>'                               
                +'<div class="product-rating">'
                    +'<br>'
                    +'<span  style="color:#868e96;font: normal 12px sans-serif;">'+item['categorie']+'</span>' 
          +'<br>'
          +'<br>'
          +'<span style="color:#5d5d5d;font: normal 12px sans-serif;">Ajouté par: '+item['nom_vendeur']+' <span style="float: right;">Le '+item['date_ajout']+'</span></span>'
                +'</div>'
                +'<p class="product-description">'+item['description']+'</p>' ;                
               
               if (session_username != null )
               {
                    if ( item['nom_vendeur'].toUpperCase() != session_username.innerHTML.toUpperCase() )
                     {
                        annonce += '<button style="width:150px;">Acheter maintenant</button>' ;
                     }else 
                        annonce += '<button style="width:150px;" class="bouton-supprimer btn-danger" onclick="demanderSuppression(this,'+item['id']+')">Supprimer</button>' ;
               }else
               {
                    annonce += '<button style="width:150px;">Acheter maintenant</button>' ;
               }
                              
                annonce += '<p class="product-price">'+item['prix']+' €</p>'
            +'</div>' 
        +'</li>' 
        ;

      conteneur.innerHTML += annonce ; 
    });


}







function submitFormAjout(e)
{
    e.preventDefault(); // pour empecher le formulaire de s'envoyer classiquement via le mécanisme de formulaires / permettre l'envoi via AJAX à sa place          
    var btn_ajout = document.getElementById('btn_ajouter') ;
    btn_ajout.disabled = true ; 
    btn_ajout.value = "Veuillez patienter.." ;
    ajouterAnnonce(btn_ajout) ;
    return false ; // pour empecher le formulaire de s'envoyer classiquement via le mécanisme de formulaires / permettre l'envoi via AJAX à sa place
}



function ajouterAnnonce(btn_ajout)
{	
	var remoteUrl = 'addDeleteAnnonces_WS.php' ;

  var request = new XMLHttpRequest();
  request.open('POST', remoteUrl , true);

  formulaire = document.getElementById("form_ajout") ;

  request.onload = function() 
  {
    btn_ajout.value = "Ajouter" ; 
    btn_ajout.disabled = false ;

    if (request.status === 200 ) 
    { 
      alert("Votre annonce a été ajoutée avec succés !") ;
      formulaire.reset() ;
      recupAnnonces('') ; // récupère la liste (après ajout) des annonces ; contient la nouvelle annonce ajoutée
    } else 
    {    
      console.log("Reponse serveur inattendue") ;
      alert("Reponse serveur inattendue");
    }
  };

  request.onerror = function() 
  {    
    console.log("Probleme de requete AJAX") ;
    alert("Une erreur est survenue lors de la requete AJAX");  
  };  
  
  var formData = new FormData( formulaire );
  request.send(formData);

}




function demanderSuppression(btn,id)
{          
    btn.disabled = true ; 

    var r = confirm("Voulez-vous vraiment supprimer cette annonce ? ");
    if (r == true) 
    {        
        btn.firstChild.data = "Suppression en cours..." ;
        btn.classList.add('btn-disabled');
        btn.classList.remove('btn-danger');
        supprimerAnnonce(btn,id) ; 
    } else 
    {      
      btn.disabled = false ; 
    }
  
}


function supprimerAnnonce(btn,id)
{	
	var remoteUrl = 'addDeleteAnnonces_WS.php?id='+id ;

var request = new XMLHttpRequest();
request.open('GET', remoteUrl , true);
request.setRequestHeader('Content-type', 'application/json');

request.onload = function() {
  
  if (request.status === 200 ) 
  {        
      recupAnnonces('') ;                        
  } else 
  {
    alert("Une erreur est survenue lors de la requete AJAX");
    btn.classList.remove('btn-disabled');
    btn.classList.add('btn-danger');
    btn.disabled = false ; 
    btn.firstChild.data = "Supprimer" ;
  }
};

request.onerror = function() 
{  
  console.log("Probleme de requete AJAX") ;
};

request.send();

}






function connexion()
{	
	var remoteUrl = 'auth_WS.php' ;

  var loginField = document.getElementById('auth_login') ;
  var mdpField = document.getElementById('auth_mdp') ;

  var request = new XMLHttpRequest();
  request.open('POST', remoteUrl , true);
  request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

  var params = 'login='+loginField.value+'&password='+mdpField.value;

  request.onload = function() {
    
    if (request.status === 200 ) 
    {        
        var responseObj = JSON.parse(request.responseText) ;              
        
        if (responseObj.resultat == 0)
        {
          alert("Nom d'utilisateur et/ou mot de passe incorrect(s)");
        }else if (responseObj.resultat == 1 ) 
        {
              var sessInfo = document.getElementsByClassName('session-info');
              Array.prototype.forEach.call(sessInfo, function(el) {              
                  el.innerHTML = '<span class="login_element" >Bonjour, <span id="session_username">' + responseObj['username'] + '</span>&nbsp</span>' 
              +'&nbsp&nbsp<span id="deco_btn" class="login_element" ><a class="btn-deco btn btn-outline-danger" href="auth_WS.php">&nbspSe déconnecter</a></span>' ; 
              });    
        }
    } else 
    {    
      console.log("Reponse serveur inattendue") ;
    }
  };

  request.onerror = function() 
  {
    console.log("Probleme de requete AJAX") ;
  };

  request.send(params);

}