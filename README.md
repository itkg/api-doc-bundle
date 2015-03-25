# api-doc-bundle

Provide additional features on top of NelmioApiDocBundle

[![Build Status](https://travis-ci.org/itkg/api-doc-bundle.svg?branch=master)](https://travis-ci.org/itkg/api-doc-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/itkg/api-doc-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/itkg/api-doc-bundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/itkg/api-doc-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/itkg/api-doc-bundle/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/39842407-6656-4e0b-86c5-66e86b73e38d/small.png)](https://insight.sensiolabs.com/projects/39842407-6656-4e0b-86c5-66e86b73e38d)

Features
* Resources annotation to provide list of markdown files
* New method pane (resources pane) to display markdown resources as HTML (using Parsedown library)  
 
## Installation

### Installation by Composer

If you use composer, add ItkgApiDocBundle bundle as a dependency to the composer.json of your application

```json

     "require": {
         "itkg/api-doc-bundle": "dev-master"
     }

```

* Add Itkgapi-docBundle to your application kernel.

```php

// app/AppKernel.php
<?php
     // ...
     public function registerBundles()
     {
         $bundles = array(
             // ...
             new Itkg\ApiDocBundle\ItkgApiDocBundle(),
         );
     }

```

* Activate bundle config in application's config.yml file by addng :


```yaml

itkg_api_doc: ~

```

## Todo

* Export Documentation API with resources as PDF
