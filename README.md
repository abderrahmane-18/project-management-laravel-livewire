<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

</head>
<body>
    <h1>Develop a small web application using Laravel 10 with a dashboard powered by FilamentPHP</h1>
<h2>Table of Contents</h2>
    <ul>
  
   <li><a href="#technologies">Technologies</a></li>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#usage">Usage</a></li>
    </ul>
    <h2 id="technologies">Technologies</h2>
    <ul>
        <li><strong>:</strong> Laravel 10 ,FilamentPhp</li>
        <li><strong>Database:</strong> PostgreSQL</li>
        <li><strong>Other:</strong> Vite</li>
    </ul>
    <h2 id="installation">Installation</h2>
    <h3>Prerequisites</h3>
    <ul>
        <li>Node.js and npm</li>
        <li>PHP (>= 8.2)</li>
        <li>Composer</li>
        <li>PostgreSQL</li>
    </ul>
 <h3>Clone Repository</h3>
    <ol>
        <li>Clone the repository to your local machine from the <code>main</code> branch: <br>
            <pre><code>git clone https://github.com/abderrahmane-18/project-management-laravel-livewire.git</code></pre>
        </li>
    </ol>
        <li>Install dependencies:
            <pre><code>npm install</code></pre>
        </li>
        <li>Start the development server:
            <pre><code>npm run dev</code></pre>
        </li>
    </ol>
    <ol>
        <li>Navigate to the <code>back-end-spe</code> directory:
            <pre><code>cd back-end-spe</code></pre>
        </li>
        <li>Install dependencies:
            <pre><code>composer install</code></pre>
        </li>
        <li>Set up the environment file:
            <pre><code>cp .env.example .env</code></pre>
        </li>
        <li>Generate the application key:
            <pre><code>php artisan key:generate</code></pre>
        </li>
        <li>Set up the database:
            <pre><code>php artisan migrate </code></pre>
        </li>
        <li>Start the development server:
            <pre><code>php artisan serve</code></pre>
        </li>
    </ol>
    <h2 id="usage">Usage</h2>
    <ol>
        <li>Start the frontend and backend servers as described in the <a href="#installation">Installation</a> section.</li>
        <li>Access the application in your browser at <code>http://localhost:8000</code> (default).</li>
    </ol>

</body>
</html>
   
</body>
</html>
