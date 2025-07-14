<p>
git clone https://github.com/devilica/articles.git<br>
cd articles<br>
cp .env.example .env<br>
docker-compose up -d<br>
php artisan key:generate<br>
---------------------------
IN root project execute: docker exec -it test_articles-laravel.test-1 /bin/bash<br>
composer install<br>
php artisan migrate<br>
php artisan db:seed<br>
---------------------------
npm install<br>
npm run dev<br>

</p>

<p>
PROJECT PREVIEW<br>
In this section, you’ll find screenshots showcasing the application interface and the email notification.
</p>