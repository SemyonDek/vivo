<?php

    if (isset($_GET['search']) && $_GET['search'] !== '') {
        $search = '%'.$_GET['search'].'%';
        $searchStr = "AND (
        `NAME` LIKE '$search' or 
        `CODE` LIKE '$search')";
    } else $searchStr = '';

    if(isset($_GET['idCat']) && $_GET['idCat'] !== '' && !preg_match('/\s/', $_GET['idCat'])) {
        $idCatProd = "AND `IDCAT` = '". $_GET['idCat'] ."'";
    } else $idCatProd = '';
    if(isset($_GET['brandnameid']) && $_GET['brandnameid'] !== '' && !preg_match('/\s/', $_GET['brandnameid'])) {
        $idBrand = "AND `IDBRAND` = '". $_GET['brandnameid'] ."'";
    } else $idBrand = '';
    
    if(isset($_GET['countrynameid']) && $_GET['countrynameid'] !== '' && !preg_match('/\s/', $_GET['countrynameid'])) {
        $nameCountry = "AND `COUNTRY` = '". $_GET['countrynameid'] ."'";
    } else $nameCountry = '';

    if(isset($_GET['min_price']) && ($_GET['min_price'] !== '' && !preg_match('/\s/', $_GET['min_price'])) )
    {
        $min_prod_mass = $_GET['min_price'];;
    } else {
        $min_prod_mass = 0;
    }

    if(isset($_GET['max_price']) && ($_GET['max_price'] !== '') && !preg_match('/\s/', $_GET['max_price']))
    {
        $max_prod_mass = $_GET['max_price'];
    } else {
        $max_prod_mass = 3000000000;
    }

    if (isset($_GET['sort']) && $_GET['sort'] !== '') {
        if ($_GET['sort'] == 0) {
            $sort = 'ORDER BY `PRICE` ASC';
        } else {
            $sort = 'ORDER BY `PRICE` DESC';
        }
    } else $sort = '';
    
    
?>