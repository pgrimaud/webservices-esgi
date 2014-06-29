# Webservices ESGI

## REST

    API server : http://sharetheworld.rest

L'API est principalement RESTful. Les donn�es sont expos�es sous la forme d'URI qui repr�sentent des ressources et peuvent �tre r�cup�r�s via des clients HTTP (comme les navigateurs web).

## Requ�tes countries

Ces requ�tes permettent de r�cup�rer des pays en fonction des param�tres.

*Construction d'une requ�te standard*

    GET Host+ /countries
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourn�*

    <countries>
      <country>
        <id>1</id>
        <name>country_name</name>
        <code>code</code>
        <continent>continent</continent>
      </country>
      (...)
    </countries>

Il est possible d'affiner les recherches en pla�ant les param�tres suivants:


    GET Host+ /countries?continent=Europe
    
    Host: sharetheworld.rest
    Method: GET
    Parameter : name | code | continent

*Fichier retourn�*

    <countries>
      <country>
        <id>1</id>
        <name>country_name</name>
        <code>code</code>
        <continent>Europe</continent>
      </country>
      (...)
    </countries>


## Requ�tes country

Ces requ�tes permettent de r�cup�rer un pays gr�ce � son id.

*Construction d'une requ�te standard*

    GET Host+ /country/:id
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourn�*

    <countries>
      <country>
        <id>:id</id>
        <name>country_name</name>
        <code>code</code>
        <continent>continent</continent>
      </country>
    </countries>

## Requ�tes towns

Ces requ�tes permettent de r�cup�rer des villes en fonction des param�tres.

*Construction d'une requ�te standard*

    GET Host+ /towns
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourn�*

    <towns>
      <town>
        <id>id</id>
        <name>town_name</name>
        <population>population</population>
        <country_id>country_id</country_id>
      </town>
      (...)
    </towns>

Il est possible d'affiner les recherches en pla�ant les param�tres suivants:


    GET Host+ /towns?country_id=1
    
    Host: sharetheworld.rest
    Method: GET
    Parameter : name | population| country_id

*Fichier retourn�*

    <towns>
      <town>
        <id>id</id>
        <name>town_name</name>
        <population>population</population>
        <country_id>1</country_id>
      </town>
      (...)
    </towns>


## Requ�tes town

Ces requ�tes permettent de r�cup�rer une ville gr�ce � son id.

*Construction d'une requ�te standard*

    GET Host+ /town/:id
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourn�*

    <towns>
      <town>
        <id>:id</id>
        <name>town_name</name>
        <population>population</population>
        <country_id>country_id</country_id>
      </town>
    </towns>

## Requ�tes places

Ces requ�tes permettent de r�cup�rer des lieux en fonction des param�tres.

*Construction d'une requ�te standard*

    GET Host+ /places
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourn�*

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

Il est possible d'affiner les recherches en pla�ant les param�tres suivants:


    GET Host+ /places?town_id=1
    
    Host: sharetheworld.rest
    Method: GET
    Parameter : name | address| continent | country_id | town_id

*Fichier retourn�*

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


## Requ�tes place

Ces requ�tes permettent de r�cup�rer un lieu gr�ce � son id.

*Construction d'une requ�te standard*

    GET Host+ /place/:id
    
    Host: sharetheworld.rest
    Method: GET

*Fichier retourn�*

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

Ces requ�tes permettent l'ajout d'un lieu. Tous les param�tres sont requis.

*Construction d'une requ�te standard*

    GET Host+ /place
    
    Host: sharetheworld.rest
    Method: POST
    Parameters : name, address, town_id, description, latitude, longitude


## Erreurs

Les erreurs sont retourn�es sous le format suivant

    <error>
       <message>Error Message</message>
    </error>