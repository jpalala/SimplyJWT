# SimplyJWT

a wrapper around ReallySimpleJWT for use in Laravel apps

NOTE: This is not yet a packagist thing but I'll set it up later on

## Setup 

1. Ensure to set the .env for the issuer URL in the class

2. Set up your project's composer.json to load this class if not yet on packagist

\```
"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Jpalala\\SimplyJWT\\": "<packages_dir>/SimplyJWT/src/"
    }
}
```

3. Register it in `config/app.php`

```
'providers' => [
    // Other Service Providers...
    Jpalala\SimplyJWT\SimplyJWTServiceProvider::class,
],
```
# TODO

- Look into laravel packager conventions
- Create helpers/configs for easy installation and setup

