<?php

// Файлы phpmailer
require __DIR__ . '/php/PHPMailer.php';
require __DIR__ . '/php/SMTP.php';
require __DIR__ . '/php/Exception.php';

// Определяем путь и имя файла для логов
$logFile = __DIR__ . '/logs/log.txt';

// Функция для записи логов
function writeLog($message)
{
    global $logFile;
    $logMessage = "[" . date("Y-m-d H:i:s") . "] " . $message . PHP_EOL;
    file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
}

function writeResponseLog($response)
{
    global $logFile;
    $logMessage =  "[" . date("Y-m-d H:i:s") . " form_by_cost] Response: " . $response . PHP_EOL  ;
    file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получение данных из формы
    $fio = $_POST['fio'];
    $visit = $_POST['visit'];
    $drinking = $_POST['drink'];
    $eating = $_POST['dish'];

    // Проверка наличия всех обязательных полей
    if (empty($fio) || empty($visit) || empty($drinking) || empty($eating)) {
        $data['result'] = "error";
        $data['info'] = "Заполните все обязательные поля";
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    // Формирование тела письма
    $body = "
        <h2>Форма опроса</h2>
        <b>Имя и фамилия:</b> $fio<br>
        <b>Присутствие:</b> $visit<br>
        <b>Предпочитаемый напиток:</b> $drinking<br>
        <b>Предпочитаемое блюдо:</b> $eating<br>
    ";

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
    $mail->Subject = "Результаты опроса";
    $mail->Body = $body;

    // Проверяем отправленность сообщения
    if ($mail->send()) {
        $data['result'] = "success";
        $data['info'] = "Сообщение успешно отправлено!";
        writeLog("Сообщение успешно отправлено!");
        writeResponseLog(json_encode($data));
    } else {
        $data['result'] = "error";
        $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
        $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
        writeLog("Ошибка отправки письма: {$mail->ErrorInfo}");
        writeResponseLog(json_encode($data));
    }

    // Отправка результата
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    header('Location: /'); // Перенаправление на главную страницу, если обращение к обработчику произошло не через POST запрос
    exit();
}
?>