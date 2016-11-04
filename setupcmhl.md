This application aims to set up a simplistic website you can use with SimonT Hockey Sim v3 if
you're not interested in setting up a Windows server with sqlite3.

It utilizes a fairly basic installation of Laravel's light-weight framework Lumen.
Depending on your host and server architecture, there might be some slight variation in how
to set this site up.

The initial setup used for this application is:
Ubuntu 16.04 on Digital Ocean with
PostgreSQL 9.3.14
PHP 7.0.10
NGINX 1.4.6
Lumen 5.3.0

Make sure you have an empty database set up with a user you want the application to use

After you create your site with `lumen new <sitename>`,

In your /etc/nginx/sites-available/sitename (or default, if you prefer that) file
point nginx to your new lumen site, then find the block
`location / {`

and change the line
`try\_files $uri (and so on)`
to
`try\_files $uri $uri/ /index.php$is\_args$args;`
(remove backslashes if you're not looking at this in a markdown-enabled browser)


Then go to your application's home folder, e.g. `/var/www/cmhl` and edit
`bootstrap/app.php`
and uncomment the line with 
`$app->withEloquent();

then rename your `.env.example` file `.env` and edit it
enter a string for your `APP_KEY` (Laravel recommends it to be at least 32 characters long)
and remember to change `APP_DEBUG` to false before using for production

Enter the information for your database connection. In our case it would look something like
`DB\_CONNECTION=pgsql`
`DB\_HOST=localhost`
`DB\_PORT=5432`
and so on.

Create the globals that will point at the directories where you plan to place
your sim files. Here's how our simmers have it set up:

LEAGUE_NAME=CMHL
SIM_FILE_STORE=http://yourdreambuilders.ca/hockey/
SIM_SEASON=S13
OUTPUT_FILE_DIR=XML

Now you're ready to to see if the application can find the database. This step technically
isn't necessary as we're not using migrations in the base application, but it's a good way
to check for configuration issues and missing libraries (like php7.0-pgsql).

From your application root directory, run
`php artisan migrate:install`

Hopefully you'll see a message saying something like
> Migration table created successfully.


Now pull down the code from the repo into your app directory, you likely also need to change
the entire application's file ownership to www-data:www-data or whatever your web user is 
called.

At this point, running migrations and seeds is a good idea.

`php artisan migrate` should execute all migration scripts in database/migrations
It's possible you get an error message about insufficient privileges, in which case you can
just use sudo - or set up permissions for running php artisan similar to what www-date has.

Once the tables are all created, a few of the tables need seeding. To do this, run
`php artisan db:seed`
If for some reason you get an error saying Class not found, you can do a
`composer dump-autoload` and then run `php artisan db:seed` again. Why this happens, I do
not know, but the solution was found at
http://laravel.io/forum/05-19-2016-class-seeder-name-does-not-exist-problem-solved


