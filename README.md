# ibaga.ml


## Install 
```bash
# php deps
composer install --no-dev #--ignore-platform-reqs

# deploy composer
composer install --no-ansi --no-dev --no-interaction --no-progress --optimize-autoloader --ignore-platform-reqs
# clean up vendor and zip
gulp vendorAll
# js deps
npm install
npm run prod
```
