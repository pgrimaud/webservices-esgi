# Webservices ESGI

## REST

    API server : http://sharetheworld.rest

L'API est principalement RESTful. Les données sont exposées sous la forme d'URI qui représentent des ressources et peuvent être récupérés via des clients HTTP (comme les navigateurs web).

## Requêtes countries

Ces requêtes permettent de récupérer des pays en fonction des paramètres.

*Construction d'une requête standard*

    GET Host+ /countries
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourné*

    <countries>
      <country>
        <id>1</id>
        <name>country_name</name>
        <code>code</code>
        <continent>continent</continent>
      </country>
      (...)
    </countries>

Il est possible d'affiner les recherches en plaçant les paramètres suivants:


    GET Host+ /countries?continent=Europe
    
    Host: sharetheworld.rest
    Method: GET
    Parameter : name | code | continent

*Fichier retourné*

    <countries>
      <country>
        <id>1</id>
        <name>country_name</name>
        <code>code</code>
        <continent>Europe</continent>
      </country>
      (...)
    </countries>


## Requêtes country

Ces requêtes permettent de récupérer un pays grâce à son id.

*Construction d'une requête standard*

    GET Host+ /country/:id
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourné*

    <countries>
      <country>
        <id>:id</id>
        <name>country_name</name>
        <code>code</code>
        <continent>continent</continent>
      </country>
    </countries>

## Requêtes towns

Ces requêtes permettent de récupérer des villes en fonction des paramètres.

*Construction d'une requête standard*

    GET Host+ /towns
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourné*

    <towns>
      <town>
        <id>id</id>
        <name>town_name</name>
        <population>population</population>
        <country_id>country_id</country_id>
      </town>
      (...)
    </towns>

Il est possible d'affiner les recherches en plaçant les paramètres suivants:


    GET Host+ /towns?country_id=1
    
    Host: sharetheworld.rest
    Method: GET
    Parameter : name | population| country_id

*Fichier retourné*

    <towns>
      <town>
        <id>id</id>
        <name>town_name</name>
        <population>population</population>
        <country_id>1</country_id>
      </town>
      (...)
    </towns>


## Requêtes town

Ces requêtes permettent de récupérer une ville grâce à son id.

*Construction d'une requête standard*

    GET Host+ /town/:id
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourné*

    <towns>
      <town>
        <id>:id</id>
        <name>town_name</name>
        <population>population</population>
        <country_id>country_id</country_id>
      </town>
    </towns>

## Requêtes places

Ces requêtes permettent de récupérer des lieux en fonction des paramètres.

*Construction d'une requête standard*

    GET Host+ /places
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourné*

    <places>
      <place>
        <id>id</id>
        <name>place_name</name>
        <address>address</address>
        <description>description</description>
        <latitude>latitude</latitude>
        <longitude>longitude</longitude>
        <town_id>town_id</town_id>
      </place>
      (...)
    </places>

Il est possible d'affiner les recherches en plaçant les paramètres suivants:


    GET Host+ /places?town_id=1
    
    Host: sharetheworld.rest
    Method: GET
    Parameter : name | address| continent | country_id | town_id

*Fichier retourné*

    <places>
      <place>
        <id>id</id>
        <name>place_name</name>
        <address>address</address>
        <description>description</description>
        <latitude>latitude</latitude>
        <longitude>longitude</longitude>
        <town_id>1</town_id>
      </place>
      (...)
    </places>


## Requêtes place

Ces requêtes permettent de récupérer un lieu grâce à son id.

*Construction d'une requête standard*

    GET Host+ /place/:id
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourné*

    <places>
      <place>
        <id>:id</id>
        <name>place_name</name>
        <address>address</address>
        <description>description</description>
        <latitude>latitude</latitude>
        <longitude>longitude</longitude>
        <town_id>town_id</town_id>
      </place>
    </places>

Ces requêtes permettent l'ajout d'un lieu. Tous les paramètres sont requis.

*Construction d'une requête standard*

    GET Host+ /place
    
    Host: sharetheworld.rest
    Method: POST
    Parameters : name, address, town_id, description, latitude, longitude


## Erreurs

Les erreurs sont retournées sous le format suivant

    <error>
       <message>Error Message</message>
    </error>