location / {
	index  index.php index.html index.htm;
}

# for people with app root as doc root, restrict access to a few things
location ~ ^/(composer\.(json|lock|phar)$|Procfile$|<?=getenv('COMPOSER_VENDOR_DIR')?>/|<?=getenv('COMPOSER_BIN_DIR')?>/) {
	deny all;
}

error_page 500 502 503 504 =500 /error_500.json;
location = /error_500.json {
	root "<?=getenv('DOCUMENT_ROOT')?:getenv('HEROKU_APP_DIR')?:getcwd()?>";
}

error_page 400 401 402 403 404 =400 /error_400.json;
location = /error_400.json {
	root "<?=getenv('DOCUMENT_ROOT')?:getenv('HEROKU_APP_DIR')?:getcwd()?>";
}
