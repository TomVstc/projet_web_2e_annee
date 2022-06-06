self.addEventListener("install", e => {
    e.waitUntil(
        caches.open("static").then(cache => {
            return cache.addAll
            
            // ([ "./" , "./montagne.png" , "./site.html","./manifest.json"
            // , "./sw.js", "./inscription/inscription.html" , "./inscription/inscription.css" , 
            // "./inscription/formulaire_tuteur/formulaire_tuteur.php", 
            // "./inscription/formulaire_tuteur/formulaire_tuteur.html", 
            // "./inscription/formulaire_tuteur/style_formulaire_tuteur.css" ,
            // "./inscription/formulaire_etudiant/style_formulaire_etudiant.css" ,
            // "./inscription/formulaire_etudiant/insertion.php", 
            // "./inscription/formulaire_etudiant/formulaire_etudiant.html" , 
            // "./inscription/formulaire_entreprise/insertion.php", 
            // "./inscription/formulaire_entreprise/style_formulaire_entreprise.css" ,
            // "./inscription/formulaire_entreprise/formulaire_entreprise.html", 
            // "./script/script.js", "./connection/connection.html", 
            // "./connection/style_connection.css", "./style/style.css"]);

            (["./", 
            "./montagne.png", 
            "./site.php" ,  
            "./manifest.json", 
            "./sw.js" , 
            "./index.js",
            "./style/style.css",
            

            "./connection/connection_page.php", 
            "./connection/connexion.php", 
            "./connection/deconnexion.php", 
            "./connection/style_connection.css" , 

            "./inscription/inscription.css",
            "./inscription/inscription.php",

            "./inscription/formulaire_entreprise/formulaire_entreprise.html" ,
            "./inscription/formulaire_entreprise/insertion.php" ,
            "./inscription/formulaire_entreprise/style_formulaire_entreprise.css",

            "./inscription/formulaire_etudiant/formulaire_etudiant.html", 
            "./inscription/formulaire_etudiant/insertion.php",
            "./inscription/formulaire_etudiant/style_formulaire_etudiant.css",
            
            "./inscription/formulaire_tuteur/formulaire_tuteur.html",
            "./inscription/formulaire_tuteur/formulaire_tuteur.php",
            "./inscription/formulaire_tuteur/style_formulaire_tuteur.css",

            "./mail/ajout.php",
            "./mail/envoyer_des_mails.php",
            "./mail/mail.css",

            "./offre/ajouter_offre/ajouter_offre.html",
            "./offre/ajouter_offre/ajouter_offre.php",
            "./offre/ajouter_offre/ajouter_page.php",
            "./offre/ajouter_offre/style_ajouter_offre.css",

            "./offre/ajouter_fav.php",
            "./offre/f_modifier.php",
            "./offre/liste_offre.php",
            "./offre/modifier.php",
            "./offre/search.php",
            "./offre/offre.php",
            "./offre/style_offre.css",
            "./offre/supprimer_fav.php",
            "./offre/supprimer.php",

            "./profil/liste_fav.php",
            "./profil/profil_db.php",
            "./profil/profil_page.php",
            "./profil/style_connection.css",
            "./profil/supprimer_favo.php",


        ]);
        })

    )
});

self.addEventListener("fetch", e => {
    if (true === navigator.onLine) {
        return;
    }
    
    e.respondWith(
        caches.match(e.request).then(response =>{
            return response || fetch(e.request);
        })

    );
});