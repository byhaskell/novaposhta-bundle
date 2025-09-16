# Symfony NovaPoshta Bundle

[![License](https://img.shields.io/packagist/l/byhaskell/novaposhta-bundle.svg?style=flat-square)](https://packagist.org/packages/byhaskell/novaposhta-bundle)
[![Latest Stable Version](https://img.shields.io/packagist/v/byhaskell/novaposhta-bundle.svg?style=flat-square)](https://packagist.org/packages/byhaskell/novaposhta-bundle)
[![Total Downloads](https://img.shields.io/packagist/dt/byhaskell/novaposhta-bundle.svg?style=flat-square)](https://packagist.org/packages/byhaskell/novaposhta-bundle)

About
-----
Nova Poshta integration bundle for Symfony (6, 7)

Created by [@byhaskell](https://github.com/byhaskell)

#StandWithUkraine 🇺🇦

What's this?
------------

This library can be used for easy interaction with Nova Poshta.

Installation Symfony Flex
-------------------------
```bash
composer require byhaskell/novaposhta-bundle
```
Installation without Symfony Flex
---------------------------------
```php
$bundles = array(
	// ... other bundles
    new byhaskell\NovaPoshtaBundle\ByhaskellNovaPoshtaBundle(),
);
```

Configuration
-------------

Create new file: config/packages/byhaskell_nova_poshta.yaml
```yaml
byhaskell_nova_poshta:
    # You can create one on the Nova Poshta website at:
    # https://new.novaposhta.ua/dashboard/settings/developers
    api_key: '%env(NP_API_KEY)%'
    base_url: 'https://api.novaposhta.ua/v2.0/json/'
```
Add NP_API_KEY in .env

Usage
-----

```php
public function index(\byhaskell\NovaPoshtaBundle\NovaPoshta $novaPoshta): JsonResponse
{
    $response = $novaPoshta->address()->searchSettlements('Київ');
    if ($response->isSuccess()) {
        /** @var AddressResponse $result */
        $result = $response->getResult();

        // Errors 
        // $response->getInfo();
        // $response->getErrors();
        // $response->getWarnings();
    }
}
```

Copyright / License
-------------------

See [LICENSE](https://github.com/byhaskell/novaposhta-bundle/blob/main/LICENSE)