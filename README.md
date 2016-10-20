# TagihanPLN Api
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
```
                           The MIT License (MIT)

Copyright (c) 2016 Sucipto

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```
