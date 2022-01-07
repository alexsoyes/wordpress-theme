https://alexsoyes.com


## Useful commands

### Translations

```shell
php wp-cli.phar i18n make-pot wp-content/themes/soyes/ wp-content/themes/soyes/languages/soyes.pot --allow-root
```

### Install WP-Cli

```shell
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
```

### Database

```mysql
UPDATE wor9318_posts SET post_content = replace(post_content,'https://alexsoyes.com','http://localhost:8080');
```