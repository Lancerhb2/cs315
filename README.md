# CS315 Final Project

## Running MAMP

1. Install MAMP
2. Navigate to the `/htdocs/` folder in MAMP, this will be where you put your website files.
    1. The MAMP is at `C:\\` root folder for Windows.
    2. For me full path is: `C:\\MAMP\\htdocs`
    3. I keep my git configuration here for easy deployment, probably a security vulnerability though.
3. Start MAMP, ensure the servers are running
    1. Ignore the Dropbox API page, it is not needed.
    2. The other page gives some useful information if you can understand it.
4. When MAMP is running go to "[localhost/index.php](localhost/index.php)". This is the home page.
    1. For me it is "[localhost/cs315/index.php](localhost/cs315/index.php)" since my website code is in a folder named "cs315"
5. Why is the website broken? 
    1. The database isn't setup. See next section.

## Getting Database Setup:

1. Open up MAMP with default settings
2. Navigate to phpmyAdmin [http://localhost/phpMyAdmin/?lang=en](http://localhost/phpMyAdmin/?lang=en)
3. Under Databases tab at the top, create a database named "pokemon"
4. Run the sql command in `pokemon.sql` in the SQL query tab
    1. This creates a table called `pokemon`
    2. If you ever need to make changes, run the SQL query `DROP TABLE pokemon` to delete the table completely. Then rerun command in`pokemon.sql`.
5. Considering default settings are used, the website should work

## Useful Tips for Programming
1. The first 20 lines or so in "functions.php" allows php to output errors onto your html page. Very helpful for debugging.
2. For VSCode put `"php.validate.executablePath": "C:\\MAMP\\bin\\php\\php8.0.1\\php.exe"` in your `settings.json` file for some (un)helpful error messages.
    1. The filepath may change on your system. This is whereever the php executable is located.
    2. VSCode gave me a notification that brought me to the `settings.json` file. This allows VSCode to lint and check for errors.
    3. Not the best error messages, but knowing an error exists is better than nothing.
