# TagihanPLN Api
Simple PHP function/helper to create API tagihan PLN via cURL and return JSON.

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
