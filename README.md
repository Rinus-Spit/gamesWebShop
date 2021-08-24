<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Games web shop

Deze webshop is gebouwd met Laravel en is gedeployed op Heroku op:

- https://nameless-headland-83079.herokuapp.com/

De webshop is ook te zien op 

- https://rinusportfolio.nl/

Je moet je eerst registreren. Als je daarna wilt bestellen kun je rechtsboven je profiel aanpassen. Kies dan voor customer. Wil je meer kies dan hier voor admin.

Om dit lokaal te installeren maak met git een clone met de groene button "code".
Maak een database aan en doe nu lokaal:
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed

