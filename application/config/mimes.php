<?php defined('BASEPATH') OR exit('No direct script access allowed');

return array(
    // 📷 Imágenes
    'jpg'   => array('image/jpeg', 'image/pjpeg', 'image/jpg'),
    'jpeg'  => array('image/jpeg', 'image/pjpeg', 'image/jpg'),
    'jpe'   => array('image/jpeg', 'image/pjpeg', 'image/jpg'),
    'png'   => array('image/png', 'image/x-png'),
    'gif'   => 'image/gif',
    'bmp'   => array('image/bmp', 'image/x-bmp', 'image/x-bitmap', 'image/x-xbitmap', 'image/x-win-bitmap', 'image/x-windows-bmp', 'image/ms-bmp', 'image/x-ms-bmp', 'application/bmp', 'application/x-bmp', 'application/x-win-bitmap'),
    'tif'   => 'image/tiff',
    'tiff'  => 'image/tiff',
    'webp'  => array('image/webp'),
    'ico'   => array('image/x-icon', 'image/x-ico', 'image/vnd.microsoft.icon'),
    'svg'   => array('image/svg+xml', 'image/svg', 'application/xml', 'text/xml'),
    'heic'  => 'image/heic',
    'heif'  => 'image/heif',
    'avif' => array('image/avif'),

    // 📄 Documentos
    'pdf'   => array('application/pdf', 'application/force-download', 'application/x-download', 'binary/octet-stream'),
    'doc'   => array('application/msword', 'application/vnd.ms-office'),
    'docx'  => array('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip', 'application/msword', 'application/x-zip'),
    'xls'   => array('application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.ms-office', 'application/msword'),
    'xlsx'  => array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip'),
    'ppt'   => array('application/powerpoint', 'application/vnd.ms-powerpoint', 'application/vnd.ms-office', 'application/msword'),
    'pptx'  => array('application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/x-zip', 'application/zip'),
    'txt'   => 'text/plain',
    'csv'   => array('text/csv', 'application/csv', 'application/vnd.ms-excel'),

    // 🎵 Audio
    'mp3'   => array('audio/mpeg', 'audio/mpg', 'audio/mpeg3', 'audio/mp3'),
    'wav'   => array('audio/x-wav', 'audio/wave', 'audio/wav'),
    'ogg'   => array('audio/ogg', 'video/ogg', 'application/ogg'),
    'flac'  => 'audio/x-flac',
    'aac'   => array('audio/x-aac', 'audio/aac'),
    'm4a'   => 'audio/x-m4a',

    // 🎬 Video
    'mp4'   => 'video/mp4',
    'm4v'   => 'video/x-m4v',
    'mov'   => 'video/quicktime',
    'avi'   => array('video/x-msvideo', 'video/msvideo', 'video/avi', 'application/x-troff-msvideo'),
    'wmv'   => array('video/x-ms-wmv', 'video/x-ms-asf'),
    'flv'   => 'video/x-flv',
    'webm'  => 'video/webm',
    'mkv'   => 'video/x-matroska',

    // 📦 Comprimidos
    'zip'   => array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip'),
    'rar'   => array('application/x-rar', 'application/rar', 'application/x-rar-compressed'),
    '7z'    => array('application/x-7z-compressed', 'application/zip'),
);
