# Get Request

Per iniziare con questo esercizio, segui i passaggi seguenti:

1. Clonare il repository

2. Creare il file .env
Crea il file .env nella radice del tuo progetto.

3. Eseguire le migrazioni del database
Dopo aver configurato correttamente il file .env, esegui le migrazioni del database per creare le tabelle necessarie nel database:

php artisan migrate

4. Popolare il database con i seeder
Una volta completate le migrazioni, puoi popolare il database con dati di esempio utilizzando i seeder. Esegui il seguente comando:

php artisan db:seed

Questo eseguirà il seeder principale (DatabaseSeeder), che a sua volta può chiamare altri seeder secondo la logica definita all'interno del metodo run() di DatabaseSeeder.

5. Una volta che hai eseguito i passaggi di setup, puoi avviare il sito. All'apertura del sito, troverai un form per le richieste. Tuttavia, per visualizzare le richieste, è necessario effettuare la registrazione e il login. Segui i passaggi di registrazione e accedi con le tue credenziali per accedere alle richieste.