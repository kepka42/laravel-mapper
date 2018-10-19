# Laravel-mapper
## About
The `laravel-mapper` package allows you to map objects is very simply

## Installation
Require the `kepka42/laravel-mapper` package in your composer.json and update your dependencies:
```sh
composer require kepka42/laravel-mapper
```
Also you need publish the config using command:
```sh
php artisan vendor:publish --provider="kepka42\LaravelMapper\MapperServiceProvider"
```

## Usage
For create mapper you can you command:
```sh
php artisan make:mapper NameOfMapper
```
This command will create class of mapper in `Mapper` folder which is located in `app` directory of your application:

```php
<?php 

class NameOfMapper extends AbstractMapper
{
    protected $sourceType = "";

    protected $hintType = ""

    /**
     * @param $object
     * @param array $params
     * @return mixed
     */
    public function map($object, $params = [])
    {
        // TODO: Map here
    }
}
```

`$sourceType` is type which you want to map.

`$hintType` is type in which you want to map.

Function `map` is your realisation of functional to map object with type`$sourceType` to object with type `$hintType`

Also you need add you mapper in `config/mapper.php`:
```php
<?php

return [
    'mappers' => [
        NameOfMapper::class
    ]
];
```

That's all. You can map objects using Facade:

```php
<?php 

$result = Mapper::map($object, HintType::class);
```

or contract:
```php
<?php

$result = $mapperContract->map($object, HintType::class);
```

# Example
I have DTO class:

```php
<?php

namespace App\Domain;

/**
 * Class SearchInfo
 * @package App\Domain
 */
class SearchInfo
{
    /** @var string */
    private $name;

    /** @var string */
    private $address;

    /**
     * SearchInfo constructor.
     * @param string $name
     * @param string $address
     */
    public function __construct(
        string $name,
        string $address
    )
    {
        $this->name = $name;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
}

```

and i want map `Request` to `SearchInfo`.

I need to create mapper:
```sh
php artisan make:mapper RequestToSearchInfoMapper
```

and write map function:
```php
<?php

namespace App\Mappers;

use App\Domain\SearchInfo;
use Illuminate\Http\Request;
use kepka42\LaravelMapper\Mapper\AbstractMapper;

/**
 * Class RequestToSearchInfoMapper
 * @package App\Mappers
 */
class RequestToSearchInfoMapper extends AbstractMapper
{
    protected $sourceType = Request::class;

    protected $hintType = SearchInfo::class;

    /**
     * @param Request $object
     * @param array $params
     * @return SearchInfo
     */
    public function map($object, $params = [])
    {
        return new SearchInfo(
            $object->get('name'),
            $object->get('address')
        );
    }
}
```

Now i need add my mapper to config file:
```php
<?php

return [
    'mappers' => [
        \App\Mappers\RequestToSearchInfoMapper::class,
    ]
];
```

And now i can use this mapper. We'll do it in controller:
```php
<?php
// ...
use kepka42\LaravelMapper\Facades\Mapper;
// ...
public function index(Request $request): Response
{
    $requestInfo = Mapper::map($request, SearchInfo::class);
    //...
    return new Response('{}');
}
```

or:

```php
<?php
// ...
use kepka42\LaravelMapper\Contracts\MapperContract;
// ...
public function index(Request $request, MapperContract $mapperContract): Response
{
    $requestInfo = $mapperContract->map($request, SearchInfo::class);
    //...
    return new Response('{}');
}
```

## License

Released under the MIT License, see [LICENSE](LICENSE).