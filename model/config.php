<?php
    session_start();

    define("KEY", "proyecto-adso");
    define("COD", "AES-128-ECB");
    define("CURRENCY", "USD");
    define("MONEDA", "$");
    define("CLIENT_ID", "Ac8u12LEw7fPX4B2mBVc2YqsQr9AtTGWX6HLoD30Nf6wyKDjoA_PlBN7Pe5OO18-t46mvOMqBF2usgJa");

    /* 🔹 Datos de conexión a MySQL dentro de Docker */
    define("SERVIDOR", "db");         // ← el nombre del servicio en docker-compose.yml
    define("USER", "myuser");
    define("PASSWORD", "mypassword");
    define("DATABASE", "myapp");
?>
