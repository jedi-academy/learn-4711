# Seminar #8 - Documents
COMP4711 - BCIT - Winter 2019

## Databases

<img src="/pix/lessons/x/slide_23.jpg"/>

## Relational vs Document

Relational: database < table < rows (records) < columns

Document: database < collection < document < properties

RDB has schema & DDL to define structure

DDB can have schema to constrain structure

## Contrast

<img src="/pix/lessons/x/i5.png"/>

<img src="/pix/lessons/x/i6.png"/>


## MongoDB as an example

<img src="/pix/lessons/x/mongodb-model.png"/>

MongoDB uses BSON ... JSON + binary data + object identity

CRUD is the same in both worlds

MongoDB has "Connector for BUsiness Intelligence",
but it is only one way

## CodeIgniter & MongoDB

- not a first class citizen
- the plan: DocumentModel mirroring Model --> v4.1
- interim approach: ResourceController using [mongodb PHP library](https://docs.mongodb.com/php-library/current/)
