
    users =
                'name' => Stefan Stanescu,
                'email' => stefan@example.com,
                'password' => password123
                
                'name' => Eand Avdiu,
                'email' => eand@example.com,
                'password' => password123
            
                'name' => Maria Doro,
                'email' => maria@example.com,
                'password' => password123
                
Ogni user sopracitato ha un prodotto in vendita per test. <br>

```Funzionalità dell'applicativo:```
- Registazione Utente
- Login Utente
- Nuova Inserzione
- Modifica Inserzione
- Elimina Inserzione
- Visualizza Inserzioni di altri utenti
- 'Area Personale' per visualizzare i propri annunci
- Ricerca per nome (cerca solo nel titolo)
- Ricerca per categoria

Si possono modificare solo i propri annunci. Ovviamente non posso eliminare l'inserzione di Eand se io sono loggato come Stefan.
<br>

Proprietà di accesso al db nel file ```.env```. Riportate di seguito quelle utilizzate in sviluppo:

    DB_CONNECTION=mariadb
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mercatino
    DB_USERNAME=root
    DB_PASSWORD=

Andare sulla root del progetto con powershell e eseguire i seguenti comandi:
<br>
Per creare il db: ```php artisan migrate```
<br>
Per popolre il db: ```php artisan db:seed```
<br>
Per runnare il sito : ```php artisan serve```
<br>
Per runnare il servizio di autenticazione: ```npm run dev```
<br>
Per vedere le path API: ```php artisan route:list --path=api```

```API routes:```

    GET|HEAD  api/products ............................................................................................................................. Api\ProductControllerApi@index
    POST      api/products ............................................................................................................................. Api\ProductControllerApi@store  
    GET|HEAD  api/products/{id} ......................................................................................................................... Api\ProductControllerApi@show  
    PUT       api/products/{id} ....................................................................................................................... Api\ProductControllerApi@update  
    DELETE    api/products/{id}