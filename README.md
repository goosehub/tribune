<h1>[s4s] Tribune</h1>

<p>This is a website that uses /s4s/ to generate news content. This uses CodeIgniter 3 as a framework and the official 4chan API for content.</p>

<h2>Set Up:</h2>

<ul>
    <li>Place files in webroot with proper permissions</li>
    <li>Run database.sql commands in database</li>
    <li>Configure database connection in auth.php</li>
    <li>You may need to add your domain under base_url in config/config.php</li>
    <li>You may need to disable HTTPS redirect in config/autoload.php</li>
    <li>Set a cron for application/cron.php or alternatively, hit up localhost/landgrab/cron/1234?cron=name_of_method to trigger a cron (Change the token under config/constants.php and cron.php for production)</li>
</ul>

<h2>Board specific set up</h2>

<p>In theory you can set this up to any specific board by simply changing config/constats board to the desired board. This isn't tested, and weather uses the /s4s/ exclusive fortune feature, so you'd need to create a new weather system. You'll also have to customize Cron@increment_gets() to handle the digits of the desired board, or properly abstract it to not be board specific.</p>