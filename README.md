# TAOTI Drupal Install Profile

Provides default functionality across Taoti sites as well as managed/simplified
updating of some of Taoti's Drupal standard ops aspects for sites as well as
taking care of some dependencies.

Depending on your hosting provider, you will likely want to also require:

- Pantheon: [taoti/drupal-pantheon](https://github.com/taoti/drupal-pantheon)
- Amazee: [taoti/drupal-amazee](https://github.com/taoti/drupal-amazee)

## Enabling this project

This project must be enabled in the top-level composer.json file, or it will be
ignored and will not perform any of its functions. `.lando.base.yml` should be
committed to the project to ensure those using lando don't have to run an
initial `composer install` outside of lando.

All files in `.github` should be committed to ensure availability on Github,
this also applies to `phpcs.xml` and `phpcs.xml.dist`.

Important! Make sure to include taoti/drupal-profile as an allowed package in
`drupal-scaffold` settings in composer.json. ex:
```
{
...
    "extra": {
        "drupal-scaffold": {
            "allowed-packages": [
                "taoti/drupal-profile"
            ]
        }
    }
}
```

Additionally, the provided `settings.taoti.php` file that will be placed in
`[web-root]/sites/default/` should be included in settings.php after any host
specific includes but before local/site specific actions.

## Features



### Bad request blocking.

With most hosts that Taoti uses, we do not have direct access to server configuration.
There are at the same time, many paths that Drupal sites will *NEVER* have and waste
time with bot loads. `settings.taoti.php` attempts to provide a list of common paths
that should be blocked without causing issues.

