<p>
<h2>Local development (Laravel Sail)</h2>
git clone https://github.com/devilica/articles.git<br>
cd articles<br>
composer install<br>
cp .env.example .env<br>
Adjust .env for Sail (DB_HOST=mysql, DB_USERNAME=sail, DB_PASSWORD=password, APP_PORT=8080, FORWARD_DB_PORT=3307 if 3306 is in use)<br>
./vendor/bin/sail up -d<br>
./vendor/bin/sail artisan key:generate<br>
./vendor/bin/sail artisan migrate<br>
./vendor/bin/sail artisan db:seed<br>
./vendor/bin/sail artisan storage:link<br>
<br>
App URL: http://localhost:8080<br>
<br>
Optional (only when changing Vue/Sass sources):<br>
npm install<br>
npm run dev<br>
</p>

<p>
<h2>Deploy to Render</h2>
This project includes a <code>render.yaml</code> Blueprint with a Docker web service, PostgreSQL database, and scheduler cron job.<br>
<br>
1. Push this repo to GitHub.<br>
2. In Render: New → Blueprint → connect the repo.<br>
3. Set required secrets when prompted:<br>
&nbsp;&nbsp;- <code>APP_KEY</code>: run <code>php artisan key:generate --show</code> locally and paste the value<br>
&nbsp;&nbsp;- <code>APP_URL</code>: your Render service URL, e.g. <code>https://articles-web.onrender.com</code><br>
4. After deploy, open <code>/articles</code> to verify the app and database.<br>
<br>
Production defaults (from render.yaml):<br>
- <code>DB_CONNECTION=pgsql</code> with <code>DATABASE_URL</code> from Render Postgres<br>
- <code>SESSION_DRIVER=database</code> (requires sessions migration)<br>
- <code>MAIL_MAILER=log</code> unless you configure SMTP env vars<br>
- Cron runs <code>php artisan schedule:run</code> every minute for hourly article creation<br>
</p>

<p>
PROJECT PREVIEW<br>
In this section, you’ll find screenshots showcasing the application interface and the email notification.
</p>
