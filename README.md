<!-- Pour faire fonctionner l'applicatif
1.Créer le fichier config/dev.php pour l'accès à la DB.

Son contenu :

<?php
const HOST = '<server IP>';
const DB_NAME = '<DB name>';
const CHARSET = 'utf8';
const DB_HOST = 'mysql:host='.HOST.';dbname='.DB_NAME.';charset='.CHARSET;
const DB_USER = '<DB user name>';
const DB_PASS = '<DB password>';
2.Le fichier sql/all.sql permet de créer une base de données préremplie. -->