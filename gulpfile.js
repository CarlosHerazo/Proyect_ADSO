
const {src, dest, watch} = require('gulp');

// dependencias de imagenes
const webp = require('gulp-webp');

function versionWebp (done){
   
   const opciones = {
    quality: 50
   };
   
    src('img/**/*.{png,jpg,jfif,avif,jpeg}')
    .pipe(webp(opciones))
    .pipe(dest('build/img'))

    done();
}

exports.versionWebp = versionWebp;