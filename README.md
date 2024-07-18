<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

</head>
<body>
    <h1>Developed a web application for Real-time Monitoring and Control System for Jijel Thermal Power Station</h1>
    <h2>Overview</h2>
    <p>This project is a web application developed to automate and centralize the monitoring and control of production equipment at the Jijel Thermal Power Station. The system features dynamic dashboards and role-based access control to ensure secure, user-specific data interaction. Additionally, it enhances decision-making and resource allocation through comprehensive and interactive data visualization tools.</p>
<h3>Class Diagram </h3>

![class_diagram1](https://github.com/user-attachments/assets/b8bad687-fa7b-422c-9934-38ecbf76938b)
<h3>Sceenshoot </h3>

![dashboard](https://github.com/user-attachments/assets/b6485916-dc29-4047-9bc5-34f4eb9d92ac)
![planification4](https://github.com/user-attachments/assets/fb225a62-8176-4775-a9d7-f2124a0dce32)
![add-edit-role-permission_staff](https://github.com/user-attachments/assets/97e59a29-7487-4a94-81b3-8e58fb3146bb)
      <h2>Table of Contents</h2>
    <ul>
        <li><a href="#features">Features</a></li>
        <li><a href="#technologies">Technologies</a></li>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#usage">Usage</a></li>
    </ul>
    <h2 id="features">Features</h2>
    <ul>
        <li> monitoring of production equipment (planification and realizationg o equipments)</li>
        <li> Role-based access control</li>
        <li>Enhanced productivity and quality control</li>
        <li><strong>Dynamic dashboards:</strong> Created dynamic dashboards and improved decision-making and resource allocation through comprehensive and interactive data visualization tools </li>
    </ul>
    <h2 id="technologies">Technologies</h2>
    <ul>
        <li><strong>Frontend:</strong> Vue.js 3 (Composition API), Tailwind CSS, Vuex 4, ApexCharts.js</li>
        <li><strong>Backend:</strong> Laravel 11</li>
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
            <pre><code>git clone https://github.com/abderrahmane-18/spe-intenship-siad-master.git</code></pre>
        </li>
    </ol>
    <h3>Frontend</h3>
    <ol>
        <li>Navigate to the <code>front-end-spe</code> directory:
            <pre><code>cd front-end-spe</code></pre>
        </li>
        <li>Install dependencies:
            <pre><code>npm install</code></pre>
        </li>
        <li>Start the development server:
            <pre><code>npm run dev</code></pre>
        </li>
    </ol>
    <h3>Backend</h3>
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
            <pre><code>php artisan migrate --seed</code></pre>
        </li>
        <li>Start the development server:
            <pre><code>php artisan serve</code></pre>
        </li>
    </ol>
    <h2 id="usage">Usage</h2>
    <ol>
        <li>Start the frontend and backend servers as described in the <a href="#installation">Installation</a> section.</li>
        <li>Access the application in your browser at <code>http://localhost:5173</code> (default) for the frontend and <code>http://localhost:8000</code> (default) for the backend.</li>
    </ol>

</body>
</html>
   
</body>
</html>
