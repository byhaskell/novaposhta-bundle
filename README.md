**Nova Poshta integration bundle for Symfony (6, 7)**

Created by https://github.com/byhaskell

#StandWithUkraine 🇺🇦


**What's this?**

This library can be used for easy interaction with Nova Poshta.


**Getting started**

1. Create API key

https://new.novaposhta.ua/dashboard/settings/developers

2. Add config file
 
config/packages/byhaskell_novaposhta.yaml:

```
novaposhta:
    api_key: 'ВАШ_API_KEY'
```

3. Test in Controller:
```
<?php

public function index(\byhaskell\NovaPoshtaBundle\NovaPoshta $np): JsonResponse
{
    $streets = $np->address()->searchSettlementStreets('ref', 'Шевченка');
    return $this->json($streets);
}
```