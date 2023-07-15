<?php

    $sql = "SELECT * FROM roles";
    $query_roles = $connect->prepare($sql);
    $query_roles->execute();

    $datos_roles = $query_roles->fetchAll( PDO::FETCH_ASSOC);