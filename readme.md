# WordPress - Boilerplate

**A simple organization for a simple usage**  
_Tools : Webpack, TypeScript, React, Less & simplicity_

## Table of contents

-   [Structure Theme folders](#structure-theme-folders)
-   [Structure Theme folders & files](#structure-assets-folders--folder)
-   [Installation](#installation)

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

## Structure Assets folders & files

```
├── ...
├── assets
│   ├── sass
│        ├── _config
│             ├── sass-mq
│             ├── _config.scss
│             ├── _fonctions.scss
│             ├── _mixins.scss
│        ├── _project
│             ├── base
│             ├── components
│             ├── fonts
│             ├── grid
│             ├── layout
│             ├── pages
│        ├── main.scss
│   ├── js
│   └── img
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

---
