## Init
The application loads from `publis/index.php`. This file loads the `Core` functions.php and router.php files. We also have an autoloader for `Core` classes within `index.php`.

### Auto / Lazy loading classes
In our root `index.php` file we are using the PHP `spl_autoload_register()` function which allows us to set up and use the available classes in the root directory like: Database, Response and Validator. This prevents us from having to arbitrarily load classes in the root like this: `// require basePath('Database.php');`.

We have also added these infrastructure classes into the `Core` directory.

### Loading data to view
With our `view($attr)` function, we can pass an associative array which exposes the values to the view by using the PHP `extract()` function.