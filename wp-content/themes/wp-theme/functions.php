<?php
/*
* Add Feature Imagee
**/
add_theme_support('post-thumbnails');

/*
* Require Image resize
*/

include_once('inc/aq_resizer.php');
/*
* Register nav menu
*/
if (function_exists('register_nav_menus')) {

    $menu_arr = array(
        'main_menu' => 'Меню'
    );


    register_nav_menus($menu_arr);
}


/*
*  Rgister Post Type Slider
*/

add_action('init', 'post_type_slider');

function post_type_slider()
{
    $labels = array(
        'name' => 'Слайдер',
        'singular_name' => 'Слайдер',
        'all_items' => 'Слайдер',
        'menu_name' => 'Слайдер' // ссылка в меню в админке
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "slider",
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        ),
        'taxonomies' => array('category')
    );
    register_post_type('slider', $args);
}


/*
*  Rgister Post Type Product
*/

add_action('init', 'post_type_product');

function post_type_product()
{
    $labels = array(
        'name' => 'Продукция',
        'singular_name' => 'Продукция'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "products",
        'taxonomies' => array('category'),
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('products', $args);
}


/*
*  Register Post Type Review
*/

add_action('init', 'post_type_review');

function post_type_review()
{
    $labels = array(
        'name' => 'Отзывы',
        'singular_name' => 'Отзывы'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "review",
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    register_post_type('review', $args);
}

/*
*  Register Post Type Ser
*/

add_action('init', 'post_type_sert');

function post_type_sert()
{
    $labels = array(
        'name' => 'Сертификаты',
        'singular_name' => 'Сертификаты'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'query_var' => "sert",
        'supports' => array(
            'title',
            'thumbnail'
        )
    );
    register_post_type('sert', $args);
}


function th_scripts()
{
    // Theme stylesheet.
    wp_enqueue_style('th-style', get_stylesheet_uri());
    wp_enqueue_script('googleapis', '//maps.googleapis.com/maps/api/js?key=AIzaSyDkewQZi7iY6eOtlXajXXHFWHECGYWqfMs', array(), '1');
    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.0.7/css/all.css', array(), '1');
    // wp_enqueue_style( 'lightbox', get_theme_file_uri(  '/assets/css/lightbox.css'),array(), '1' );

    wp_enqueue_style('bootstrapcdn', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', array(), '1');
    wp_enqueue_script('jquery', get_theme_file_uri('/assets/js/jquery-3.2.1.min.js'), array(), '1');
    wp_enqueue_script('slick.min', get_theme_file_uri('/assets/js/slick.min.js'), array(), '1');
    wp_enqueue_script('jquery.inputmask', get_theme_file_uri('/assets/js/jquery.inputmask.js'), array(), '1');
    wp_enqueue_script('html5lightbox', get_theme_file_uri('/assets/js/html5lightbox.js'), array(), '1');
    wp_enqueue_script('default', get_theme_file_uri('/assets/js/default_js.js'), array(), '1');

//
//
//  ///	wp_enqueue_style( 'style', get_theme_file_uri(  '/assets/css/style.css'),array(), '' );
//
////	wp_enqueue_style( 'owl.theme.default.min', get_theme_file_uri(  '/assets/css/owl.theme.default.min.css'),array(), '2' );
//
// //	wp_enqueue_script( 'owl', get_theme_file_uri(  '/assets/js/owl.carousel.js'),array(), '2' );
//
// 	wp_enqueue_script( 'jquery.matchHeight', get_theme_file_uri(  '/assets/js/jquery.matchHeight.js'),array(), '2' );
//
// 	wp_enqueue_script( 'appear', get_theme_file_uri(  '/assets/js/appear.js'),array(), '2' );
// 	wp_enqueue_script( 'onenav', get_theme_file_uri(  '/assets/js/onenav1.js'),array(), '2' );


}

add_action('wp_enqueue_scripts', 'th_scripts');


function CheckCurlResponse($code)
{
    $code = (int)$code;
    $errors = array(
        301 => 'Moved permanently',
        400 => 'Bad request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not found',
        500 => 'Internal server error',
        502 => 'Bad gateway',
        503 => 'Service unavailable'
    );
    try {
        //Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
        if ($code != 200 && $code != 204)
            throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error', $code);
    } catch (Exception $E) {
        die('Ошибка: ' . $E->getMessage() . PHP_EOL . 'Код ошибки: ' . $E->getCode());
    }
}


function AmoSend($data = array())
{

//amo

//ПРЕДОПРЕДЕЛЯЕМЫЕ ПЕРЕМЕННЫЕ

    $responsible_user_id = 2103217; //id ответственного по сделке, контакту, компании

//АВТОРИЗАЦИЯ
    $user = array(
        'USER_LOGIN' => 'omsk@pkk-rf.ru', #Ваш логин (электронная почта)
        'USER_HASH' => '7d85fea2e3aa26929c0601dd112b8a54' #Хэш для доступа к API (смотрите в профиле пользователя)
    );
    $subdomain = 'new5a55befa0639d';

#Формируем ссылку для запроса
    $link = 'https://' . $subdomain . '.amocrm.ru/private/api/auth.php?type=json';
    $curl = curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, $link);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($user));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
    curl_close($curl);  #Завершаем сеанс cURL
    $Response = json_decode($out, true);
//echo '<b>Авторизация:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';


//ПОЛУЧАЕМ ДАННЫЕ АККАУНТА
    $link = 'https://' . $subdomain . '.amocrm.ru/private/api/v2/json/accounts/current'; #$subdomain уже объявляли выше
    $curl = curl_init(); #Сохраняем дескриптор сеанса cURL
#Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, $link);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    $Response = json_decode($out, true);
    $account = $Response['response']['account'];
//echo '<b>Данные аккаунта:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';


//ПОЛУЧАЕМ СУЩЕСТВУЮЩИЕ ПОЛЯ
    $amoAllFields = $account['custom_fields']; //Все поля
    $amoConactsFields = $account['custom_fields']['contacts']; //Поля контактов
//echo '<b>Поля из амо:</b>'; echo '<pre>'; print_r($amoConactsFields); echo '</pre>';


//ФОРМИРУЕМ МАССИВ С ЗАПОЛНЕННЫМИ ПОЛЯМИ КОНТАКТА
//Стандартные поля амо:
    $sFields = array_flip(array(
            'PHONE', //Телефон. Варианты: WORK, WORKDD, MOB, FAX, HOME, OTHER
            'EMAIL' //Email. Варианты: WORK, PRIV, OTHER
        )
    );

//Проставляем id этих полей из базы амо
    foreach ($amoConactsFields as $afield) {
        if (isset($sFields[$afield['code']])) {
            $sFields[$afield['code']] = $afield['id'];
        }
    }


//ДОБАВЛЯЕМ СДЕЛКУ
    $leads['request']['leads']['add'] = array(
        array(
            'name' => $data['name'],
            'status_id' => $data['status_id'], //id статуса
            'responsible_user_id' => $responsible_user_id, //id ответственного по сделке
            //'date_create'=>1298904164, //optional
            //'price'=>300000,
            //'pipeline_id' => $data['pipeline_id'],
            'tags' => ' ', #Теги
            'custom_fields' => array(
                array(
                    'id' => 573441, #Уникальный индентификатор заполняемого дополнительного поля
                    'values' => array(
                        array(
                            'value' => $data['description'],
                        )
                    )
                ),
                array(
                    'id' => 573443, #Уникальный индентификатор заполняемого дополнительного поля
                    'values' => array(
                        array(
                            'value' => $data['product'],
                        )
                    )
                ),
                array(
                    'id' => 573445, #Уникальный индентификатор заполняемого дополнительного поля
                    'values' => array(
                        array(
                            'value' => $data['your-phone'],
                        )
                    )
                ),
                array(
                    'id' => 573447, #Уникальный индентификатор заполняемого дополнительного поля
                    'values' => array(
                        array(
                            'value' => $data['mail'],
                        )
                    )
                )


            )
        )
    );

    $link = 'https://' . $subdomain . '.amocrm.ru/private/api/v2/json/leads/set';

    $curl = curl_init(); #Сохраняем дескриптор сеанса cURL
// #Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, $link);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($leads));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

    $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $Response = json_decode($out, true);
//echo '<b>Новая сделка:</b>'; echo '<pre>'; print_r($Response); echo '</pre>';
    if (is_array($Response['response']['leads']['add']))
        foreach ($Response['response']['leads']['add'] as $lead) {
            $lead_id = $lead["id"]; //id новой сделки
        };
//ДОБАВЛЯЕМ СДЕЛКУ - КОНЕЦ


//ДОБАВЛЕНИЕ КОНТАКТА
    $contact = array(
        'name' => $data['your-name'],
        'linked_leads_id' => array($lead_id), //id сделки
        'responsible_user_id' => $responsible_user_id, //id ответственного
        'tags' => ' ', #Теги
        'custom_fields' => array(
            array(
                'id' => $sFields['PHONE'],
                'values' => array(
                    array(
                        'value' => $data['your-phone'],
                        'enum' => 'MOB'
                    )
                )
            ),
            array(
                'id' => $sFields['EMAIL'],
                'values' => array(
                    array(
                        'value' => $data['mail'],
                        'enum' => 'MOB'
                    )
                )
            )


        )
    );

    $set['request']['contacts']['add'][] = $contact;

//Формируем ссылку для запроса
    $link = 'https://' . $subdomain . '.amocrm.ru/private/api/v2/json/contacts/set';
    $curl = curl_init(); #Сохраняем дескриптор сеанса cURL
//Устанавливаем необходимые опции для сеанса cURL
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, $link);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($set));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

    $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    CheckCurlResponse($code);

    $Response = json_decode($out, true);

    return $Response;
// ДОБАВЛЕНИЕ КОНТАКТА - КОНЕЦ

// amo
}

/*
 * Send data in Amo CRM
 */

function wpcf7_cstm_function($contact_form)
{
    $title = $contact_form->title;
    $submission = WPCF7_Submission::get_instance();


    $posted_data = $submission->get_posted_data();
//    if ($submission && $posted_data['_wpcf7'] == '135') {


        $name = isset($posted_data['your-name']) ? $posted_data['your-name'] : '';
        $phone = isset($posted_data['your-phone']) ? $posted_data['your-phone'] : '';
        $description = isset($posted_data['your-message']) ? $posted_data['your-message'] : '';
        $mail = isset($posted_data['your-email']) ? $posted_data['your-email'] : '';
        $product = isset($posted_data['your-product']) ? $posted_data['your-product'] : '';

        AmoSend(array( 'product' => $product, 'mail' => $mail, 'description' => $description, 'status_id' => '21389830', 'name' => $title, 'your-name' => $name, 'your-phone' => $phone));

//    } else {
//        echo "false";
//    }

}

add_action("wpcf7_before_send_mail", "wpcf7_cstm_function");
