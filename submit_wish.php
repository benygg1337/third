<?php
// Файлы phpmailer
require __DIR__ . '/php/PHPMailer.php';
require __DIR__ . '/php/SMTP.php';
require __DIR__ . '/php/Exception.php';

// Подключаем файл wp-load.php для работы с WordPress функциями
require_once('../../../wp-load.php');

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, есть ли данные в форме
    if (isset($_POST['form-name_book']) && isset($_POST['form-message'])) {
        // Получаем данные из формы
        $name = sanitize_text_field($_POST['form-name_book']);
        $message = sanitize_text_field($_POST['form-message']);

        // Создаем новый черновик пожелания
        $post_data = array(
            'post_title' => $name,
            'post_content' => $message,
            'post_status' => 'draft',
            // Статус черновика
            'post_type' => 'wish', // Название созданного типа записи 
        );

        // Вставляем пожелание как черновик
        $post_id = wp_insert_post($post_data);

        // Проверяем, было ли успешно создано пожелание
        if ($post_id !== 0) {
            // Настройки PHPMailer
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            $mail->isSMTP();
            $mail->CharSet = "UTF-8";
            $mail->SMTPAuth = true;
            $mail->Debugoutput = function ($str, $level) {
                $GLOBALS['data']['debug'][] = $str;
            };

            // Настройки вашей почты
            $mail->Host = 'mail.tdkartontara.ru'; // SMTP сервер вашей почты
            $mail->Username = 'no-reply@tdkartontara.ru'; // Логин на почте
            $mail->Password = '4638743aA'; // Пароль на почте
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('no-reply@tdkartontara.ru', 'Свадебные сайты'); // Адрес вашей почты и имя отправителя

            // Получатель письма
            $mail->addAddress('loko419@yandex.ru');
            $mail->addAddress('dimon-951@mail.ru');
            $mail->addAddress('1337beny@gmail.com');

            // Отправка сообщения
            $mail->isHTML(true);
            $mail->Subject = 'Пришло новое пожелание';
            $mail->Body = 'К вам на сайт пришло новое пожелание:' . '<br>';
            $mail->Body .= 'Имя отправителя: ' . $name . '<br>';
            $mail->Body .= 'Текст пожелания: ' . $message . '<br> <br> Необходимо опубликовать пожелание!';

            // Формируем ссылки на подтверждение и удаление
            $theme_url = get_stylesheet_directory_uri();
            $confirmUrl = $theme_url . '/confirm-wish.php?wish_id=' . $post_id;
            $deleteUrl = $theme_url . '/delete-wish.php?wish_id=' . $post_id;

            $mail->Body .= '<br><br>';
            $mail->Body .= '<a href="' . $confirmUrl . '" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; display: inline-block; margin-right: 10px;">Подтвердить пожелание</a>';
            $mail->Body .= '<a href="' . $deleteUrl . '" style="background-color: #f44336; color: white; padding: 10px 20px; text-decoration: none; display: inline-block;">Удалить пожелание</a>';

            try {
                $mail->send();
                // Письмо успешно отправлено
            } catch (Exception $e) {
                // Ошибка отправки письма
            }

            // Возвращаем ответ в формате JSON
            echo json_encode(array('success' => true, 'message' => 'Пожелание успешно создано и будет опубликовано в ближайшее время!'));
        } else {
            // Возвращаем ответ в формате JSON в случае ошибки
            echo json_encode(array('success' => false, 'message' => 'Ошибка при создании пожелания.'));
        }
        exit; // Обязательно завершите выполнение скрипта после вывода JSON
    }
}
?>