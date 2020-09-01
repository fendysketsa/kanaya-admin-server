<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
$route['default_controller'] = 'dashboard';

$route['admin/dashboard'] = 'dashboard/pages';

$route['admin/kategori'] = 'kategori/index';
$route['admin/kategori/form'] = 'kategori/form';
$route['admin/kategori/data'] = 'kategori/data';

$route['admin/produk'] = 'produk/index';
$route['admin/produk/form'] = 'produk/form';
$route['admin/produk/detail'] = 'produk/detail';
$route['admin/produk/data'] = 'produk/data';

// $route['admin/role'] = 'role/index';
// $route['admin/role/form'] = 'role/form';
// $route['admin/role/data'] = 'role/data';

$route['admin/limit-kredit'] = 'limKredit/index';
$route['admin/limit-kredit/form'] = 'limKredit/form';
$route['admin/limit-kredit/data'] = 'limKredit/data';

$route['admin/wilayah'] = 'wilayah/index';
$route['admin/wilayah/form'] = 'wilayah/form';
$route['admin/wilayah/data'] = 'wilayah/data';

$route['admin/banner'] = 'banner/index';
$route['admin/banner/form'] = 'banner/form';
$route['admin/banner/data'] = 'banner/data';

$route['admin/misi'] = 'misi/index';
$route['admin/misi/form'] = 'misi/form';
$route['admin/misi/data'] = 'misi/data';

$route['admin/member'] = 'member/index';
$route['admin/member/form'] = 'member/form';
$route['admin/member/data'] = 'member/data';

$route['admin/marketing'] = 'marketing/index';
$route['admin/marketing/form'] = 'marketing/form';
$route['admin/marketing/data'] = 'marketing/data';

$route['admin/produk_diskon'] = 'ProdukDiskon/index';
$route['admin/produk_diskon/form'] = 'ProdukDiskon/form';
$route['admin/produk_diskon/form2'] = 'ProdukDiskon/form2';
$route['admin/produk_diskon/data'] = 'ProdukDiskon/data';
$route['admin/produk_diskon/produk'] = 'ProdukDiskon/get_produk';

$route['admin/order'] = 'order/index';
$route['admin/order/form'] = 'order/form';
$route['admin/order/data'] = 'order/data';
$route['admin/order/print/(:num)'] = 'order/print/$1';

$route['admin/sales'] = 'penjualan/index'; 
$route['admin/sales/data'] = 'penjualan/data';

$route['admin/acc-receivable'] = 'piutang/index';
$route['admin/acc-receivable/data'] = 'piutang/data';

$route['admin/salesman/report'] = 'report_marketing/index';
$route['admin/salesman/report/data'] = 'report_marketing/data';

$route['admin/member/report'] = 'report_member/index';
$route['admin/member/report/data'] = 'report_member/data';

$route['admin/produk/report'] = 'report_produk/index';
$route['admin/produk/report/data'] = 'report_produk/data';

$route['admin/produk/stock'] = 'produk_stock/index';
$route['admin/produk/stock/log'] = 'produk_stock/log';
$route['admin/produk/stock/opname'] = 'produk_stock/opname';

$route['admin/produk/stock/data'] = 'produk_stock/data';

$route['admin/setoran'] = 'setoran/index';
$route['admin/setoran/form'] = 'setoran/form';
$route['admin/setoran/data'] = 'setoran/data';

$route['admin/admins-fee'] = 'biaya_admin/index';
$route['admin/admins-fee/data'] = 'biaya_admin/data';

$route['admin/notif'] = 'notif/index';
$route['admin/notif/form'] = 'notif/form';
$route['admin/notif/data'] = 'notif/data';

$route['admin/diskon'] = 'diskon/index';
$route['admin/diskon/form'] = 'diskon/form';
$route['admin/diskon/data'] = 'diskon/data';

$route['admin/promo'] = 'promo/index';
$route['admin/promo/form'] = 'promo/form';
$route['admin/promo/data'] = 'promo/data';

$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
