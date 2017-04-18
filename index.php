<?php
header( 'Content-Type: application/json;charset=UTF-8' );
header( 'Access-Control-Allow-Origin: *' );
header( 'Access-Control-Allow-Methods: GET, POST' );
header( 'Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description, X-Requested-With' );
header( 'Access-Control-Max-Age: 1728000' );

!defined('APP_PATH') && define('APP_PATH', __DIR__);
!defined('INC_PATH') && define('INC_PATH', APP_PATH . '/inc');
!defined('WIDGETS_PATH') && define('WIDGETS_PATH', APP_PATH . '/widgets');
!defined('TEMPLATES_PATH') && define('TEMPLATES_PATH', APP_PATH . '/templates');

spl_autoload_register(function ($class) {
    $file = INC_PATH . '/' . $class . '.php';

    if (is_file($file)) {
		include_once $file;
	}
});

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    try {
        $loader = new WidgetLoader($id);
        $body   = $loader->retrieveBody();

        die(json_encode([
            'success' => true,
            'content' => $body
        ]));

    } catch (Exception $e) {
        die(json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]));
    }
}
