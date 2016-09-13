'use strict';

// Load Gulp for execution
var gulp = require('gulp');

// Compile SASS
var sass = require('gulp-sass');
var sassGlob = require('gulp-sass-glob');
var postcss = require('gulp-postcss');
var csswring = require('csswring');
var mqpacker = require('css-mqpacker');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer');

// Compile JS
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');


// Others
var rename = require('gulp-rename');

// Servers
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

// Inject CSS & JS
var inject = require('gulp-inject');

// Compress images
var imagemin = require('gulp-imagemin');


/********************************************/
//VARIABLES
/********************************************/
//---------------
// Define the folder with all ressources
var assetsFolder = 'assets';


// Variable Environment
// Choose between production & development
var environment = 'development';


//---------------
// Variable type project
// ****
// Parameter typeProject | Choose your environment : Choice between [wordpress, angular, normal]
// ****
var typeProject = 'wordpress';

// IF YOU CHOOSE WORDPRESS, YOU NEED INFORM THIS VARIABLE
// ****
// Parameter nameTheme          | Inform the theme's name
// Parameter nameFolderPicture  | Inform folder's name pictures into your theme
// Parameter nameFolderJS       | Inform the folder's name JavaScript into your theme
// ****
var nameTheme = 'ndanz';
var nameFolderPicture = '/img';
var nameFolderJS = '/js';



/********************************************/
//ACTIONS AFTER DEFINE VARIABLES
/********************************************/

if(environment == 'production'){
    // Tab Processors
    var processors = [
        autoprefixer({browsers: ['last 2 versions','> 2%','ie >= 9']}),
        mqpacker,
        csswring
    ];
}
else if(environment == 'development'){
    // Tab Processors
    var processors = [
        autoprefixer({browsers: ['last 2 versions','> 2%','ie >= 9']}),
        mqpacker
    ];
}

if(typeProject = 'wordpress'){
    var pathTheme = 'app/wp-content/themes/' + nameTheme;

    //parameters to inject JavaScript files
    var natifJs = [assetsFolder + '/js/**/*.js'];
    var destinationJs = pathTheme + '/footer.php';
    var distJs = pathTheme + nameFolderJS;

    //parameters to inject minify pictures
    var natifPictures = assetsFolder + nameFolderPicture;
    var distPictures = pathTheme + nameFolderPicture;


    //if you need inject CSS
    var injectCSS = 'pathTheme' + 'header.php';

}
else if(typeProject == 'angular'){
    var distFolder = 'dist/';
}





/*****************
All Tasks Functions
 *****************/

// Compile du SASS
gulp.task('sass', function(){
    if(environment == 'development'){
        return gulp.src(assetsFolder + '/sass/main.scss')
            .pipe(sourcemaps.init())
            .pipe(sassGlob())
            .pipe(sass({ outputStyle: 'expanded' })
                .on('error', sass.logError)
            )
            .pipe(postcss(processors))
            .pipe(sourcemaps.write())
            .pipe(rename('style.css'))
            .pipe(gulp.dest(pathTheme))
            .pipe(browserSync.stream())
    }
    else if(environment == 'production'){
        return gulp.src(assetsFolder + '/sass/main.scss')
            .pipe(sassGlob())
            .pipe(sass({ outputStyle: 'compressed' })
                .on('error', sass.logError)
            )
            .pipe(postcss(processors))
            .pipe(rename('style.css'))
            .pipe(gulp.dest(pathTheme))
            .pipe(browserSync.stream())
    }
});

// Inject stylesheets and javascript scripts concat
gulp.task('inject', function () {
    if(environment == 'production'){
        gulp.src(natifJs)
            .pipe(sourcemaps.init())
            .pipe(concat('script.min.js'))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(distJs));

        // inject js
        var target = gulp.src(destinationJs);
        return target.pipe(inject(gulp.src(distJs + '/**/*.js', {read: false}), { ignorePath: 'app', addRootSlash: true}))
            .pipe(gulp.dest(pathTheme));
    }
    else if(environment == 'development'){
        gulp.src(natifJs)
            .pipe(concat('script.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest(distJs));

        // inject js
        var target = gulp.src(destinationJs);
        return target.pipe(inject(gulp.src(distJs + '/**/*.js', {read: false}), { ignorePath: 'app', addRootSlash: true}))
            .pipe(gulp.dest(pathTheme));
    }
});

// Compress Pictures
gulp.task('minify-pictures', function(){
    return gulp.src(natifPictures + '/*')
        .pipe(imagemin())
        .pipe(gulp.dest(distPictures))
});

/*****************
 Launch tasks
 *****************/

// Action pour Production
gulp.task('server', ['sass', 'inject', 'minify-pictures'], function() {
    if(typeProject == 'wordpress'){
        browserSync.init({
            proxy:'http://localhost',
            //startPath: index.php,
            ghostMode: {
                scroll: true,
                links: true,
                forms: true
            },
            watchTask:true
        });

        gulp.watch(assetsFolder + 'sass/**/*.scss', ['sass']);
        gulp.watch(assetsFolder + nameFolderPicture, ['minify-pictures']);
        gulp.watch(assetsFolder + nameFolderJS, ['inject']);
        gulp.watch(pathTheme + '**/*.php', ['minify-pictures']);
        gulp.watch(pathTheme + '**/*.php').on('change', browserSync.reload);
        gulp.watch(assetsFolder + nameFolderJS).on('change', browserSync.reload);
    }
    else if(typeProject == 'angular'){
        browserSync.init({
            server: assetsFolder,
            ghostMode: {
                scroll: true,
                links: true,
                forms: true
            }
        });

        // See tasks watch necessary and inject files
        // To think gulp-injet 2 sources
    }
});
