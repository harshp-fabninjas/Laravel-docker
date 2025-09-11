<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Docker Demo - Hot Reloading</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .content {
            padding: 40px;
        }
        .demo-section {
            margin-bottom: 30px;
            padding: 20px;
            border: 2px dashed #e0e0e0;
            border-radius: 10px;
            background: #f9f9f9;
        }
        .demo-section h3 {
            color: #333;
            margin-top: 0;
        }
        .live-time {
            font-size: 24px;
            font-weight: bold;
            color: #ff6b6b;
            text-align: center;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            margin: 20px 0;
        }
        .feature-list {
            list-style: none;
            padding: 0;
        }
        .feature-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 30px;
        }
        .feature-list li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #4ecdc4;
            font-weight: bold;
            font-size: 18px;
        }
        .docker-info {
            background: #2c3e50;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
        .docker-info h4 {
            margin-top: 0;
            color: #4ecdc4;
        }
        .status-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #4ecdc4;
            margin-right: 10px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
        .hot-reload-demo {
            background: #e8f5e8;
            border: 2px solid #4caf50;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .hot-reload-demo h4 {
            color: #2e7d32;
            margin-top: 0;
        }
        .instructions {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🐳 Laravel Docker Setup</h1>
            <p>🔥 Hot Reloading Demo - Changes reflect instantly! ✅ WORKING!</p>
        </div>

        <div class="content">
            <div class="live-time">
                <span class="status-indicator"></span>
                Current Time: {{ now()->format('Y-m-d H:i:s') }}
            </div>

            <div class="hot-reload-demo">
                <h4>🔥 Hot Reloading Active</h4>
                <p>This page demonstrates that Blade template changes are reflected instantly without rebuilding the Docker container!</p>
                <p><strong>Try editing this file and watch the changes appear immediately!</strong></p>
            </div>

            <div class="demo-section">
                <h3>🚀 Laravel 12 Features</h3>
                <ul class="feature-list">
                    <li>Latest Laravel Framework (v12.28.1)</li>
                    <li>PHP 8.2 with all necessary extensions</li>
                    <li>MySQL 8.0 database</li>
                    <li>Redis for caching and sessions</li>
                    <li>Nginx web server</li>
                    <li>phpMyAdmin for database management</li>
                </ul>
            </div>

            <div class="demo-section">
                <h3>🐳 Docker Services</h3>
                <div class="docker-info">
                    <h4>Running Services:</h4>
                    <ul>
                        <li><strong>Laravel App:</strong> PHP-FPM container</li>
                        <li><strong>Web Server:</strong> Nginx (Port 8080)</li>
                        <li><strong>Database:</strong> MySQL 8.0 (Port 3306)</li>
                        <li><strong>Cache:</strong> Redis (Port 6379)</li>
                        <li><strong>Admin:</strong> phpMyAdmin (Port 8081)</li>
                    </ul>
                </div>
            </div>

            <div class="instructions">
                <h4>📝 How to Test Hot Reloading:</h4>
                <ol>
                    <li>Edit this Blade template file: <code>resources/views/demo.blade.php</code></li>
                    <li>Save the file</li>
                    <li>Refresh this page - changes should appear instantly!</li>
                    <li>No need to rebuild Docker containers or restart services</li>
                </ol>
            </div>

            <div class="demo-section">
                <h3>🔧 Development Commands</h3>
                <p>Use these commands to manage your Laravel Docker setup:</p>
                <ul>
                    <li><code>docker-compose up -d</code> - Start all services</li>
                    <li><code>docker-compose down</code> - Stop all services</li>
                    <li><code>docker-compose exec app php artisan migrate</code> - Run migrations</li>
                    <li><code>docker-compose exec app composer install</code> - Install dependencies</li>
                </ul>
            </div>

            <div style="text-align: center; margin-top: 30px;">
                <a href="/" style="background: #4ecdc4; color: white; padding: 12px 24px; text-decoration: none; border-radius: 6px; display: inline-block;">
                    ← Back to Welcome Page
                </a>
            </div>
        </div>
    </div>

    <script>
        // Update time every second to show live updates
        function updateTime() {
            const timeElement = document.querySelector('.live-time');
            if (timeElement) {
                const now = new Date();
                const timeString = now.toLocaleString();
                timeElement.innerHTML = '<span class="status-indicator"></span>Current Time: ' + timeString;
            }
        }

        // Update time every second
        setInterval(updateTime, 1000);

        // Show a message when the page loads
        console.log('🔥 Laravel Docker Demo loaded! Hot reloading is active.');
        console.log('Edit this Blade template and watch changes appear instantly!');
    </script>
</body>
</html>
