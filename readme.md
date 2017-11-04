# AffiliCon API Client for PHP

### Install

```
# git clone https://hoevelmanns@bitbucket.org/hoevelmanns/affilicon-php-api-client.git
# composer install
```


### ApiGen
##### source: https://github.com/ApiGen/ApiGen
#### Update Docs
```
# vendor/bin/apigen generate src --destination docs
```

### PHPMD
```
# vendor/phpmd/phpmd/src/bin/phpmd src text codesize,unusedcode,naming    
```


### Codesniffer
```
# vendor/bin/phpcs src
```

###### Automatically fixing
```
# vendor/bin/phpcbf src
```



### Copy/Paste detector
```
# vendor/bin/phpcpd src
```

