# Luhn

Validates and generates cards numbers against Luhn's algorithm.

## Installation

Require the package in `composer.json`

```json
"require": {
    "kryshtalovich/luhn": "0.*"
  }
```

## Usage

### Validate a card number 

```php
use Kryshtalovich\Luhn\Validate;

// create validator 
$validator = new Validate();

// validate against given values
$valid = $validator->isValid('2775732608516644'); //true
$noValid = $validator->isValid('2775732608516640'); //false

var_dump($valid);
var_dump($noValid);
```

Output:
```
bool(true)
bool(false)
```

### Generate a card number 

```php
use Kryshtalovich\Luhn\Generate;

// create generator 
$generator = new Generate();

// generate value

//defined length = 16
$randomCardNumber = $generator->generateCardNumber(); 

//for example American Express card with length = 15 and prefix = '3'
$amexCardNumber = $generator->generateCardNumber(15, '3'); 

var_dump($randomCardNumber);
var_dump($amexCardNumber);
```

Output:

```
string(16) "9241976360198403" 
string(15) "336782025194042"
```