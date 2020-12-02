<h1>[s4s] Tribune</h1>

<p>This is a website that uses /s4s/ to generate news content. This uses CodeIgniter 3 as a framework and the official 4chan API for content.</p>

<p>Set Up:</p>

<ul>
    <li>Place files in webroot with proper permissions</li>
    <li>Run database.sql commands in database</li>
    <li>Configure database connection in auth.php</li>
    <li>You may need to add your domain under base_url in config/config.php</li>
    <li>You may need to disable HTTPS redirect in config/autoload.php</li>
    <li>Set a cron for application/cron.php or alternatively, hit up localhost/landgrab/cron/1234?cron=name_of_method to trigger a cron (Change the token under config/constants.php and cron.php for production)</li>
</ul>