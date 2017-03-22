# My starter kit for WordPress
**A simple organization for a simple use**  
*Tools : Gulp, Sass & simplicity*

## Table of contents
  - [Structure Theme folders](#structure-theme-folders)
  - [Structure Theme folders & files](#structure-theme-folders--folder)
  - [Installation](#installation)


### Structure Theme folders
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

### Structure Assets folders & files
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

> Thank you [Arnaud Pinot](https://github.com/arnvvd) for your organization of SASS files ❤ 

## Installation 
Some commands...

### Install the configuration
`$ npm install`

### Launch Gulp & enjoy
`$ gulp server`

## Note  
> Remove Gulp for Webpack 2


