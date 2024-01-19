<p align="center">
<h3 align="center"><img src="https://avatars0.githubusercontent.com/u/993323" height="30px">Yii 2 framework aplication </h3>
</p>
<h1 align="center"> User's Statistics Board</h1>

### ABOUT 
The application displays users and counts completed tasks by categories for a specific period.
<br>

### RUN APPLICATION 
To test the application, you need create a database named yii-test-project, then:
-  Import the dump from yii-test-project-dump.sql located in the project's root  directory.<br>
	 or
-  Apply the migrations and manually populate the tables with test data (you can also import the dump onto the created tables).


APPLICATION PREVIEW
------------

![Image alt](https://raw.githubusercontent.com/Evgenij-pb/Yii-user_statistics_board/master/screenshot.png)
-------------------
![Image alt](https://raw.githubusercontent.com/Evgenij-pb/Yii-user_statistics_board/master/screenshot1.png)
-------------------
![Image alt](https://raw.githubusercontent.com/Evgenij-pb/Yii-user_statistics_board/master/screenshot2.png)

<br>

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii-test-project',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      services/           contains service classes
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [github.com/Evgenij-pb](https://codeload.github.com/Evgenij-pb/Yii-user_statistics_board/zip/refs/heads/master) to
a directory.<br> 
Then navigate to the project_directory:
~~~
cd project_directory
composer update
composer install
~~~

You can then access the application through the following URL:

~~~
http://localhost/project_directory/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii-test-project',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
