# Credit_Risk
Įsikelti API į savo serverį;

Sukurti nauja duomenų bazę "credit_risk";

Paleisti credit_risk.sql;

Susikonfigūruoti duomenų bazę faile /config/Database.php

Norint naudoti API, eiti į nuorodą http://ikelto_api_alanko_vieta/credit_risk/api/v1/create.php (naudoti postman, curl...) norint patikrinti veikimą.
Arba paleisti testą, prieš tai pakeitus į tinkamą nuorodą.

Json body pavizdys:

{
"SessionID": "2001t2r123z",
"ID": "10",
"Field1": "1",
"Field2": "1",
"Field3": "25",
"Field4": "5",
"Field5": "2",
"Field6": "0.5",
"Field7": "1",
"Field8": "16",
"Field9": "27",
"Field10": "18",
"Date": "2020-12-29 16:16"
}

Nenaudojau framework, kad būtu galima įdiegti bet kur.

Prisijungimui prie duomenų bazės naudojau PDO kadangi jis eina kartu su php ir nereikia papildomų bibliotekų.

Versija php 7.3, testavimui naudojau 10.4.17-MariaDB;
