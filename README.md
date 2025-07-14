<p>
git clone https://github.com/devilica/articles.git
cd articles
cp .env.example .env
docker-compose up -d
php artisan key:generate
---------------------------
IN root project execute: docker exec -it test_articles-laravel.test-1 /bin/bash
composer install
php artisan migrate
php artisan db:seed
---------------------------
npm install
npm run dev

</p>

<p>
PROJECT PREVIEW
In this section, you’ll find screenshots showcasing the application interface and the email notification.
</p>