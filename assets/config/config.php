<?php
    $ASSETS = array (
        'DIR_VENDOR' => DIR_ASSETS . DS . 'vendor' . DS,
        'DIR_SHARED' => DIR_ASSETS . DS . 'shared' . DS,
        'DIR_FRONTEND' => DIR_ASSETS . DS . 'frontend' . DS,
        'DIR_BACKEND' => DIR_ASSETS . DS . 'backend' . DS,
        'DIR_UPLOAD' => DIR_ASSETS . DS . 'upload' . DS,
        'DIR_DATABASE' => DIR_ASSETS . DS . 'database' . DS
    );

    $FRONTEND = array (
        'DIR_VIEWS' => DIR_FRONTEND . DS . 'views'. DS
    );

    $BACKEND = array (
        'DIR_VIEWS' => DIR_BACKEND . DS . 'views'. DS
    );


    $DATABASE = array (
        'dbname' => 'ban_hang_ca_phe_nhom_4_k16',
        'username' => 'root',
        'password' => '',
        'host' => 'localhost'
    );

    $TABLE = array (
        'cthd' => 'chitiet_hoadon',
        'cv' => 'chucvu',
        'hsp' =>'danhsach_hinhsp',
        'hd' => 'danhsach_hoadon',
        'lsp' =>'danhsach_loaisp',
        'nsp' => 'danhsach_nhomsp',
        'ph' => 'danhsach_phanhoi',
        'sp' => 'danhsach_sanpham',
        'tk' => 'danhsach_tonkho',
        'nd' => 'nguoidung'  
    );

    $config = array(
        // 'urls' => array(
        //     'baseUrl' => 'http://localhost'
        // ),

        // 'paths' => array(
        //     'resources' => 'path/to/resources',
        //     'imgages' => array(
        //         'content' => $_SERVER['DOCUMENT_ROOT'] . '/img/content',
        //         'layout' => $_SERVER['DOCUMENT_ROOT'] . 'img/layout'
        //     )
        // ),
    )
?>