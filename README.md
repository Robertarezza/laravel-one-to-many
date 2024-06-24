Ciao ragazzi,
creiamo con Laravel il nostro sistema di gestione del nostro Portfolio di progetti.

    Oggi iniziamo un nuovo progetto che si arricchirà nel corso delle prossime lezioni: man mano aggiungeremo funzionalità e vedremo la nostra applicazione crescere ed evolvere.

    Nel pomeriggio, rifate ciò che abbiamo visto insieme stamattina stilando tutto a vostro piacere utilizzando SASS.

    Ripercorriamo gli steps fatti a lezione ed iniziamo un nuovo progetto usando laravel breeze.
Iniziamo con il definire il layout, modello, migrazione, controller e rotte necessarie per il sistema portfolio:

1. Autenticazione: si parte con l'autenticazione e la creazione di un layout per back-office, quindi create il vostro progetto partendo dal template che abbiamo fatto durante la lezione https://github.com/olgas-class/laravel-auth-template. Controllate che tutto funzioni e studiate la struttura del progetto per orientarvi al meglio.

2. Creazione del modello `Project` con relativa migrazione e seeder. Aggiungete il campo slug alla vostra tabella.

3. Per la parte di back-office creiamo un resource controller `Admin\ProjectController` per gestire tutte le operazioni CRUD dei progetti.
:avviso:  Oggi dovete implementare migration, seeder e la pagina index. Se avrete tempo, fate anche create e store con le validazioni.

