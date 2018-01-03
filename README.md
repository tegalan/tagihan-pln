# DEPRECATED WARNING
Fitur chek tagihan dari website resmi PLN sudah ditutup, jadi library ini sudah tidak bisa digunakan lagi. 

# TagihanPLN Api
[![Build Status](http://img.shields.io/packagist/v/showcheap/tagihan-pln.svg)](https://packagist.org/packages/showcheap/tagihan-pln)
Tagihan PLN API Library



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
