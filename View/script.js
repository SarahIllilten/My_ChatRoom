$('#send').click(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire

var username = encodeURIComponent( $('#username').val() ); // on sécurise les données
var content = encodeURIComponent( $('#content').val() );

if(username != "" && content != ""){ // on vérifie que les variables ne sont pas vides
    $.ajax({
        url : "chat.php", // on donne l'URL du fichier de traitement
        type : "POST", // la requête est de type POST
        data : "username=" + username + "&content=" + content // et on envoie nos données
    });
} $('#posts').append("<p>" + username + " : " + content + "</p>"); // on ajoute le message dans la zone prévue
    }
});
