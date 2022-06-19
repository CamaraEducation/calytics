<?php
/*****************************************************
 *     ERROR HANDLER, HANDLES ALL SCRIPT ERRORS      *
 *             EXCEPT SYNTAX ERRORS                  *
 *****************************************************/
session_start();
include 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

$whoops = new Whoops\Run();
$errorPage = new Whoops\Handler\PrettyPageHandler();

$errorPage->setPageTitle("500");
$errorPage->setEditor("vscode");
 
$whoops->pushHandler($errorPage);
$whoops->register();


/*****************************************************
 *               ALL ROUTES INITIATOR                *
 *       APPLICATION ENVIRONMENTS AND CONSTANTS      *
 *****************************************************/

use control\Authorize;
use core\Route;
use duncan3dc\Laravel\Blade;
//use Snipworks\Smtp\Email;

include 'core/Route.php';
include 'core/Loader.php';


/*****************************************************
 *     IF YOU NEED TO ADD ANYTHING IT SHOULD BE      *
 *                  FROM DOWN HERE                   *
 *****************************************************/

define('BASEPATH', '/');
define('app',	    'core');
define('views',		'views');
define('cache', 	'cache');
define('upload', 	'upload');
define('controls',	'controls');
define('locale', 	'localization');

// Define views global paths
Blade::addPath(views.'/auth');
Blade::addPath(views.'/errors');
Blade::addPath(views.'/public');

/****************************************************
 *              YOU CAN DEFINE YOUR ROUTES          *
 *                  STARTING FROM HERE              *
 ****************************************************/

Route::add('/', function() {
    return Blade::render("landing");
});

Route::add('/dashboard', function() {
    return Blade::render('home');
});

/****************************************************
 *                   USER MNGT ROUTES               *
 *                  STARTING FROM HERE              *
 ****************************************************/
Route::add('/user/add', function() {
    return Blade::render("user.add", ['role'=>['admin']]);
});

Route::add('/user/create', function() {
    UserController::create();
}, ['get', 'post']);

Route::add('/users/view', function() {
    return Blade::render("user.list", ['role'=>['admin']]);
}, ['get', 'post']);
 /****************************************************
 *                   MANICTIME ROUTES               *
 *                  STARTING FROM HERE              *
 ****************************************************/

Route::add('/manic', function() {
    return Blade::render('manic.main');
});

Route::add('/manic/data/add', function() {
    return Blade::render('manic.upload', ['role'=>['admin']]);
});

Route::add('/manic/data/add/([0-9]*)', function($id) {
    return Blade::render('manic.create', [
        'id'=>$id, 
        'role'=>['admin', 'school']
    ]);
});

Route::add('/manic/upload/([a-z]*)/([0-9]*)', function($task, $id) {
    ManicController::import($id);
}, ['get','post']);

// route manic/data/schools
Route::add('/manic/data/schools', function() {
    return Blade::render('manic.schools');
});

Route::add('/manic/data/brief/([0-9]*)', function($id) {
    return Blade::render('manic.brief', [
        'id'=>$id
    ]);
});

Route::add('/manic/school/([0-9]*)', function($id) {
    return Blade::render('manic.school', [
        'id'=>$id
    ]);
});

/****************************************************
 *                    APP STAT ROUTES               *
 *                  STARTING FROM HERE              *
 ****************************************************/
Route::add('/manic/app/([0-9a-z -]*)/([0-9]*)', function($app, $id) {
    return Blade::render('modals.manic.app_overview', [
        'app'=>$app, 'id'=>$id
    ]);
});

Route::add('/manic/file/([0-9a-z .-]*)/([0-9]*)', function($file, $id) {
    return Blade::render('modals.manic.file_overview', [
        'file'=>$file, 'id'=>$id
    ]);
});

Route::add('/manic/app/([0-9a-z -]*)', function($app) {
    return Blade::render('manic.app_stat', [
        'app'=>$app
    ]);
});

// route manic/data/apps
Route::add('/manic/data/apps', function() {
    return Blade::render('manic.apps');
});

 /****************************************************
 *                   MANICTIME ROUTES               *
 *                  STARTING FROM HERE              *
 ****************************************************/
Route::add('/schools/view', function() {
    return Blade::render(
        'school.list', 
        ['viewer'=>['admin']]
    );
});

Route::add('/school/add', function() {
    return Blade::render(
        'school.add', 
        ['viewer'=>['admin']]
    );
});

Route::add('/school/add/new', function() {
    SchoolController::create();
}, ['get', 'post']);

Route::add('/school/search/([0-9]*)', function($search) {
    switch($search) {
        case '1': SchoolController::search_field(); break;
        case '2': SchoolController::search_id(); break;
        default: header('HTTP/1.0 405 Method Not Allowed'); break;
    }
}, ['get', 'post']);

/****************************************************
 *                      API ROUTES                  *
 *                  STARTING FROM HERE              *
 ****************************************************/

 # /api/portal/sync
Route::add('/api/portal/sync', function() {
    $data = file_get_contents('php://input');
    return PortalApi::init($data);
    /*$data = file_get_contents('php://input');
    $file = upload.'/portal/'.$_SERVER['REQUEST_TIME'].rand(11111,999999).'.json';
    file_put_contents($file, $data);
    
    if(PortalAPI::add_job('', $file)) {
        $res = '{"status":"success"}';
    } else {
        $res = '{"status":"error"}';
    }

    return $res;*/

}, ['post']);

/****************************************************
 *                 AUTHENTICATICATION               *
 *             DO NOT CHANGE THIS SECTION           *
 ****************************************************/
Route::add('/authorize/([a-z]*)', function($page) {
    switch ($page){
        case 'register' : Authorize::register(); break;
        case 'login'    : Authorize::login(); break;
        case 'reset'    : break;
        case 'verify'   : break;
        default:
            header('Location: /404');
    }
}, 'post');

Route::add('/login', function() {
    return Blade::render("login");
});

Route::add('/reset', function() {
    return Blade::render("reset");
});

Route::add('/test/upload', function() {
    FileUploader::upload('file', 'test');
}, ['get','post']);

Route::add('/test', function() {   
    # return unauthorised access header
    echo '<pre>';
    print_r(ManicStatsController::manic_app_stat('Google Chrome'));
});

/****************************************************
 *                ERROR PAGES 404, 405              *
 *             DO NOT CHANGE THIS SECTION           *
 ****************************************************/

Route::pathNotFound(function($path) {
	header('HTTP/1.0 404 Not Found');
	echo Blade::render("404", ['path' => $path]);
});

Route::methodNotAllowed(function($path, $method) {
	header('HTTP/1.0 405 Method Not Allowed');
	echo Blade::render("405", ['method' => $method]);
});


/****************************************************
 *      VIEW REGISTERED ROUTES AND THEIR METHODS    *
 *                  USE THIS SECTION                *
 ****************************************************/ 
Route::add('/routes', function() {
    $routes = Route::getAll();
    echo '<ul>';
    foreach ($routes as $route) {
        echo '<li>'.$route['expression'].' ('.$route['method'].')</li>';
    }
    echo '</ul>';
});

// Run the Router with the given Basepath
Route::run(BASEPATH);

// Enable case sensitive mode, trailing slashes and multi match mode by setting the params to true
// Route::run(BASEPATH, true, true, true);
