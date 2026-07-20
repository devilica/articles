<p>
<h2>Local development (Laravel Sail)</h2>
Articles are loaded from <code>resources/data/articles.json</code> — no database required.<br>
<br>
git clone https://github.com/devilica/articles.git<br>
cd articles<br>
composer install<br>
cp .env.example .env<br>
./vendor/bin/sail up -d<br>
./vendor/bin/sail artisan key:generate<br>
<br>
App URL: http://localhost:8080<br>
Articles: http://localhost:8080/articles<br>
<br>
Optional (only when changing Vue/Sass sources):<br>
npm install<br>
npm run dev<br>
</p>

<p>
<h2>Deploy to Render</h2>
This project includes a <code>render.yaml</code> Blueprint with a Docker web service only (no database).<br>
<br>
1. Push this repo to GitHub.<br>
2. In Render: New → Blueprint → connect the repo.<br>
3. Set required secrets when prompted:<br>
&nbsp;&nbsp;- <code>APP_KEY</code>: run <code>php artisan key:generate --show</code> locally and paste the value<br>
&nbsp;&nbsp;- <code>APP_URL</code>: your Render service URL, e.g. <code>https://articles-web.onrender.com</code><br>
4. Leave Docker Command and Pre-Deploy Command empty.<br>
5. After deploy, open <code>/articles</code> to verify the app.<br>
<br>
Production defaults (from render.yaml):<br>
- Articles served from committed JSON data<br>
- <code>SESSION_DRIVER=cookie</code> for locale switching<br>
- <code>LOG_CHANNEL=stderr</code><br>
</p>

<p>
<h2>Deploy to Vercel</h2>
This project includes a <code>vercel.json</code> config using the community <code>vercel-php</code> runtime (no database required).<br>
<br>
1. Push this repo to GitHub.<br>
2. Import the project at <a href="https://vercel.com">vercel.com</a> and connect the repo.<br>
3. Framework Preset: <strong>Other</strong>. Leave Build/Install/Output commands empty.<br>
4. In Settings → Environment Variables, set:<br>
&nbsp;&nbsp;- <code>APP_KEY</code>: run <code>php artisan key:generate --show</code> locally and paste the value<br>
&nbsp;&nbsp;- <code>APP_URL</code>: your Vercel URL, e.g. <code>https://your-project.vercel.app</code><br>
5. Deploy and open <code>/articles</code> to verify.<br>
<br>
Optional CLI deploy: <code>npm i -g vercel</code> then <code>vercel</code> from the project root.<br>
<br>
Production defaults (from vercel.json):<br>
- Articles served from committed JSON data in <code>resources/data/articles.json</code><br>
- <code>CACHE_DRIVER=array</code> and <code>SESSION_DRIVER=cookie</code> for serverless<br>
- Static assets served from <code>public/css</code>, <code>public/js</code>, and <code>public/vendor/livewire</code><br>
</p>

<p>
PROJECT PREVIEW<br>
In this section, you’ll find screenshots showcasing the application interface.
</p>
