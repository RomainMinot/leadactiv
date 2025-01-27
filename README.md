WordPress LeadActiv
Un thème WordPress moderne et personnalisé construit avec Webpack.
🚀 Installation

Clonez ce repository dans le dossier wp-content/themes/ de votre installation WordPress :

bashCopygit clone [URL_DU_REPO] [NOM_DU_THEME]

Installez les dépendances :

bashCopynpm install

Activez le thème dans l'administration WordPress.

📦 Structure du Projet
Copytheme/
├── assets/               # Sources des assets
│   ├── js/              # Fichiers JavaScript
│   ├── scss/            # Fichiers SASS/SCSS
│   ├── img/             # Images sources
│   └── fonts/           # Polices
├── build/               # Fichiers compilés (ne pas modifier directement)
├── template-parts/      # Parties réutilisables des templates
├── functions.php        # Fonctions du thème
├── index.php           
├── header.php
├── footer.php
└── style.css           # Fiche de style principale
🛠 Développement
Commandes disponibles
bashCopy# Lancer le mode développement
npm run dev

# Compiler pour la production
npm run build

# Surveiller les modifications
npm run watch
Configuration Webpack
Le thème utilise Webpack pour :

Compiler les fichiers SASS/SCSS
Transpiler JavaScript moderne
Optimiser les images
Gérer les polices
Générer les sourcemaps

🔌 Plugins Requis

Advanced Custom Fields PRO
[Autres plugins essentiels...]

⚙️ Configuration Requise

WordPress 6.0+
PHP 7.4+
Node.js 14+
npm 6+

🎨 Personnalisation
Styles
Les styles sources sont dans assets/scss/. Le fichier principal est app.scss.
JavaScript
Les scripts sources sont dans assets/js/. Le point d'entrée est app.js.
📝 Notes de Développement

Les modifications doivent être faites dans le dossier assets/
Ne pas modifier directement les fichiers dans build/
Utilisez npm run build avant de déployer

🔐 Sécurité

Les fichiers sensibles sont exclus via .gitignore
Les dépendances sont régulièrement mises à jour
Les bonnes pratiques WordPress sont suivies

📃 License
[Votre licence ici] - voir le fichier LICENSE.md pour plus de détails
👥 Contribution

Forkez le projet
Créez votre branche (git checkout -b feature/AmazingFeature)
Committez vos changements (git commit -m 'Add some AmazingFeature')
Pushez vers la branche (git push origin feature/AmazingFeature)
Ouvrez une Pull Request

📞 Support
Pour toute question ou problème :

Ouvrez une issue
[Vos coordonnées de contact]
