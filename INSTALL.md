# Installing PEAR and associated packages

```bash
$ yay -S aur/php-pear
```
Then we configure and make sure PEAR is indeed in use:
```bash
$ pear config-get php_dir  
/usr/share/pear
$ php --ini
Configuration File (php.ini) Path: /etc/php
Loaded Configuration File:         /etc/php/php.ini
Scan for additional .ini files in: /etc/php/conf.d
```

Then we add PEAR to `include_path`, which we can check using `php -c /path/to/php.ini -r 'echo get_include_path()."\n";'`
```
/etc/php/conf.d/pear.ini
-----------------
include_path = ".:/usr/share/pear"
```
Then we install `HTTP2`:
```bash
$ sudo pear install HTTP2
```

