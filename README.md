# TagihanPLN Api
[![Build Status](http://img.shields.io/packagist/v/showcheap/tagihan-pln.svg)](https://packagist.org/packages/showcheap/tagihan-pln)
Tagihan PLN API Library

Original Source Scraper [bachors/TagihanPLN.php](https://github.com/bachors/TagihanPLN.php)


# Install 
`composer require showcheap/tagihan-pln`

# Usage
Example using composer autoload

```php
<?php

require "vendor/autoload.php";


$pln = new PLN\TagihanPLN("132000166606");

print_r($pln->getResult());
```

Or you can specify month and year by

```php
$pln->setBulan('06');
$php->setTahun('2016');
```



# License
Read [MIT License](LICENSE)
