<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(

	/* ==============================
	   IMÁGENES
	============================== */

	'gif'   => 'image/gif',

	'jpeg'  => array(
		'image/jpeg',
		'image/pjpeg',
		'image/jfif'
	),

	'jpg'   => array(
		'image/jpeg',
		'image/pjpeg',
		'image/jfif'
	),

	'jpe'   => array(
		'image/jpeg',
		'image/pjpeg',
		'image/jfif'
	),

	/*  SOLUCIÓN AL ERROR */
	'jfif'  => array(
		'image/jpeg',
		'image/pjpeg',
		'image/jfif'
	),

	'png'   => array('image/png', 'image/x-png'),

	'bmp'   => array(
		'image/bmp',
		'image/x-bmp',
		'image/x-bitmap',
		'image/x-xbitmap',
		'image/x-win-bitmap',
		'image/x-windows-bmp',
		'image/ms-bmp',
		'image/x-ms-bmp',
		'application/bmp',
		'application/x-bmp',
		'application/x-win-bitmap'
	),

	'tiff'  => 'image/tiff',
	'tif'   => 'image/tiff',

	'webp'  => 'image/webp',
	'svg'   => array('image/svg+xml', 'application/xml', 'text/xml'),

	'ico'   => array(
		'image/x-icon',
		'image/x-ico',
		'image/vnd.microsoft.icon'
	),

	/* ==============================
	   ARCHIVOS COMUNES
	============================== */

	'pdf' => array(
		'application/pdf',
		'application/force-download',
		'application/x-download',
		'binary/octet-stream'
	),

	'zip' => array(
		'application/zip',
		'application/x-zip',
		'application/x-zip-compressed',
		'multipart/x-zip'
	),

	'rar' => array(
		'application/x-rar',
		'application/rar',
		'application/x-rar-compressed'
	),

	'doc' => array(
		'application/msword',
		'application/vnd.ms-office'
	),

	'docx' => array(
		'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'application/zip',
		'application/msword'
	),

	'xls' => array(
		'application/vnd.ms-excel',
		'application/msexcel',
		'application/x-msexcel'
	),

	'xlsx' => array(
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'application/zip',
		'application/vnd.ms-excel'
	),

	'txt' => 'text/plain',
	'csv' => array(
		'text/csv',
		'text/plain',
		'application/vnd.ms-excel'
	),

	'json' => array(
		'application/json',
		'text/json'
	)
);
