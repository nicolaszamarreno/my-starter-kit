# WordPress - Boilerplate

**A simple organization for a simple usage**  
_Tools : Webpack, TypeScript, React, Less & simplicity_

## Table of contents

-   [Structure Theme folders](#structure-theme-folders)
-   [Installation](#installation)
-   [Database Maniplations](#database-maniplations)
-   [Use WP-CLI](#use-wp-cli)
-   [React App](#react-app)
-   [Others](#others)

## Structure Theme folders

```
├── ...
├── helloyou
│   ├── css                # Optional css
│   ├── fonts              # Optional fonts
│   ├── img                # Pictures fixed (logo, picto...)
│   ├── inc                # Configuration Theme
│        ├── functions     # Adding supports & configs
│        ├── acf           # Adding options page
│        ├── post          # Adding Custum Post Type
│        ├── ajax          # Config call AJAX
│   ├── templates-parts    # Import Templates
│   └── ...                # etc.
└── ...
```

## Installation

Step by step, the stages for install your Wordpress:

-   You should install download [WordPress](https://wordpress.org/)
-   Create at the root the `wordpress` folder
-   Copy Paste the WordPress Files

### Configuration of your database

In the `docker-compose.yml` change your MySql configuration:

```yml
# docker-compose.yml
- "MYSQL_ROOT_PASSWORD=root"
- "MYSQL_USER={NAME}"
- "MYSQL_PASSWORD={PASSWORD}"
- "MYSQL_DATABASE={DATABASE}"
```

### Launch the build of your images

```bash
$ docker-compose up -d
```

After that, launch your browser on https://localhost

#### TIPS: If you are on Windows Docker CE, you can retrieve your IP with this command

```bash
$ docker-machine ip
192.168.99.100
# Insert this address in your browser http://192.168.99.100
```

### Installation of HelloYou Theme

Copy paste the `helloyour` folder in `wordpress/wp-content/themes`.  
After that, you can select it in your administration WordPress.

## Database Maniplations

#### Export/BackUp databases

```bash
$ docker-compose exec mysql bash
$ mysqldump --all-databases -uroot -proot > /backup/all-databases.sql
```

#### Import databases

Copy your backup in `backup` folder and enter these commands

```bash
$ docker-compose exec mysql bash
$ mysqldump --all-databases -uroot -proot {NAMEOFYOURDATBASE} < /backup/{NAMEOFYOURFILE}.sql
```

_Name of your database is in your `docker-compose.yml`_

## React App

#### Compile your theme TypeScript

How do inject your TypeScript ? You should go in the `helloyou` folder and you will execute these commands:

```bash
# wp-content/themes/helloyou
$ yarn install
$ yarn run prod
```

## Use WP-CLI

You could use `wp-cli` for create your block for **Gutenberg**

```bash
$ docker-compose exec php bash
$ cd /home/docker/wp-content/themes/helloyou
$ php wp-cli.phar wp scaffold block hero --theme=helloyou --allow-root
```

## Others

Fix problems when you change your CSS, the modifications don't affect your front, so, you should put the `sendfile off;` in your container nginx `/etc/nginx/nginx.conf`.  
**Don't worries, the file is automatically, replace when your container is mounted by `docker-compose` command.**

---

**Let's go work...**
