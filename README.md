# Backbone Challenge </em>

## Tabla de contenido
1. [Información General](#general-info)
2. [Estructura del proyecto](#structure)
3. [Instalación](#installation)
4. [Referencias](#references)



<a name="general-info"></a>
### Información General

El challenge fue desarrollado con **Laravel Sail (v8)** para contar con un entorno
de desarrollo Docker predeterminado de Laravel. Además Laravel Sail es compatible con macOS, Linux y Windows.

Las librerias que se usaron en este proyecto son:

* **Laravel Excel** para procesar el archivo excel proporcionado [aquí](https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx)

* **Laravel Data (v1)** es un paquete que permite la creacion de objetos de datos enriquecidos.

Para el desarrollo tome como referencia el libro de Martin Joo sobre DDD en laravel.

<a name="structure"></a>
### Estructura del proyecto

Las archivos importantes a tener en cuenta son:

```
app
├── Console
│   ├── Commands
│   │   └── ImportExcelCommand.php
│   └── Kernel.php
├── Http
│   ├── Controllers
│   │   ├── Controller.php
│   │   └── ZipCodeController.php
├── Imports
│   ├── MainImport.php
│   └── ZipcodesImport.php
├── Models
│   ├── FederalEntity.php
│   ├── Municipality.php
│   ├── Settlement.php
│   ├── SettlementType.php
│   └── ZipCode.php
```
```
database
├── factories
│   ├── FederalEntityFactory.php
│   ├── MunicipalityFactory.php
│   ├── SettlementFactory.php
│   ├── SettlementTypeFactory.php
│   └── ZipCodeFactory.php
├── migrations
│   ├── 2019_08_19_000000_create_failed_jobs_table.php
│   ├── 2022_08_26_150716_create_jobs_table.php
│   ├── 2022_08_27_225623_create_federal_entities_table.php
│   ├── 2022_08_27_225657_create_zip_codes_table.php
│   ├── 2022_08_27_225847_create_municipalities_table.php
│   ├── 2022_08_27_225859_create_settlements_table.php
│   └── 2022_08_27_230307_create_settlement_types_table.php
└── seeders
    ├── DatabaseSeeder.php
    ├── FederalEntitySeeder.php
    ├── MunicipalitySeeder.php
    ├── SettlementSeeder.php
    ├── SettlementTypeSeeder.php
    └── ZipCodeSeeder.php
```

```
src
└── Domain
    └── ZipCode
        └── DataTransferObjects
            ├── FederalEntityDto.php
            ├── MunicipalityDto.php
            ├── SettlementDto.php
            ├── SettlementTypeDto.php
            └── ZipCodeDto.php

```

```
tests
├── CreatesApplication.php
├── Feature
│   └── ZipCodeTest.php
├── TestCase.php
└── Unit
```

<a name="installation"></a>
### Instalación

Clonar el repositorio

`git clone git@github.com:sabrinamcuevas/backbone_challenge.git`

Instalar las dependencias:

`composer install`

Levantar el proyecto con Laravel Sail:

`sail up -d`

> **Importante: Para levantar el proyecto debe tener instalado previamente docker en su entorno local.**


Correr las migraciones

`sail artisan migrate`

Importar los datos del excel "Ciudad de México.xls" guardo en: "storage/app/public" con el comando:

`sail artisan import:excel`

Y finalmente consultar un código postal:

`http://0.0.0.0/api/zip-codes/01110`

Para probar los tests

`sail artisan migrate --env=testing`

`sail artisan db:seed --env=testing`

`sail artisan test`

<a name="references"></a>
### Referencias
https://domain-driven-design-laravel.com/

https://laravel.com/docs/8.x/sail

https://spatie.be/docs/laravel-data/v1/introduction

https://docs.laravel-excel.com/3.1/getting-started/





