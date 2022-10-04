
# KUDA Open API Laravel Package

Implement KUDA bank Open API in Laravel


## Badges
[![GitHub issues](https://img.shields.io/github/issues/e-Miracle/kudaping)](https://github.com/e-Miracle/kudaping/issues)
[![GitHub forks](https://img.shields.io/github/forks/e-Miracle/kudaping)](https://github.com/e-Miracle/kudaping/network)
[![GitHub stars](https://img.shields.io/github/stars/e-Miracle/kudaping)](https://github.com/e-Miracle/kudaping/stargazers)
[![GitHub license](https://img.shields.io/github/license/e-Miracle/kudaping)](https://github.com/e-Miracle/kudaping/blob/main/LICENSE)
[![Twitter](https://img.shields.io/twitter/url?style=social&url=https%3A%2F%2Fgithub.com%2Fe-Miracle%2Fkudaping)](https://twitter.com/intent/tweet?text=Wow:&url=https%3A%2F%2Fgithub.com%2Fe-Miracle%2Fkudaping)
[![Latest Stable Version](http://poser.pugx.org/emiracle/kudaping/v)](https://packagist.org/packages/emiracle/kudaping) 
[![Total Downloads](http://poser.pugx.org/emiracle/kudaping/downloads)](https://packagist.org/packages/emiracle/kudaping) 
[![Latest Unstable Version](http://poser.pugx.org/emiracle/kudaping/v/unstable)](https://packagist.org/packages/emiracle/kudaping) 
[![License](http://poser.pugx.org/emiracle/kudaping/license)](https://packagist.org/packages/emiracle/kudaping) 
[![PHP Version Require](http://poser.pugx.org/emiracle/kudaping/require/php)](https://packagist.org/packages/emiracle/kudaping)




## License

[MIT](https://choosealicense.com/licenses/mit/)


## Installation

Install kudaping with composer

```bash
  composer require emiracle/kudaping
```
    
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`KUDA_API_KEY`
`KUDA_EMAIL_ADDRESS`
`KUDA_ENVIRONMENT`


## Documentation

[Documentation](https://medium.com/@miraclechibuzo/kudaping-a-laravel-package-for-kuda-bank-open-api-84e747c049f)


## Contributing

Contributions are always welcome!

See `contributing.md` for ways to get started.

Please adhere to this project's `code of conduct`.


## Usage/Examples

```php
<?php


namespace App\Http\Controllers;


use eMiracle\Kudaping\Kudaping;

class KudaController extends Controller
{
    private Kudaping $kuda;
    public function __construct()
    {
        $this->kuda = new Kudaping();
    }

    public function getBankList(): array
    {
        return $this->kuda->getBankList();
    }
}

```

