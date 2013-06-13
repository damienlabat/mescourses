#!/bin/sh

echo ' ---> combine css'
cat ./web/toggle-switch.css ./web/style.css ./web/print.css > ./web/style.combined.css
#lessc ./web/style.combined.css > ./web/style.min.css --yui-compress
yui-compressor -o ./web/style.min.css ./web/style.combined.css


echo ' ---> combine js'
cat ./web/js/app.js ./web/js/controllers.js ./web/js/vendor/ui-bootstrap-0.3.0.js > ./web/script.combined.js
yui-compressor -o  ./web/script.min.js ./web/script.combined.js --nomunge