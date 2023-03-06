<?php

/*Задание #1
Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>)
Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.*/

function task1(array $array, $arg2 = false) 
{
    if($arg2) {
        $str = implode(" ", $array);
        return $str;
    } else {
        foreach($array as $value) {
            print "<p>$value</p>";
        }
    }
}

/*Задание #2
Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.
Пример вызова: calcEverything(‘+’, 1, 2, 3, 5.2);
Результат: 1 + 2 + 3 + 5.2 = 11.2 */

function task2(string $action, ...$args) 
{
    foreach($args as $n => $arg) {
        if(!is_int($arg) && !is_float($arg)) {
            trigger_error('argument # ' . $n . 'is not integer or float.');
            return 'ERROR: wrong argument.';
        }
    }
    
    switch ($action) {
        case '+':
            return array_sum($args);
        case '-':
            return array_shift($args) - array_sum($args);
        case '*':
            $result = 1;
            foreach($args as $arg) {
                $result *= $arg;
            }
            return $result;
        case '/':
            $result = array_shift($args);
            foreach($args as $n => $arg) {
                if($arg == 0) {
                    trigger_error('Деление на ноль - аргумент # ' . ($n + 1));
                    return 'ERROR: Деление на ноль';
                }
                $result = $result / $arg;
            }
            return $result;
        default:
            return 'ERROR: Неизвестное действие';
    }
}

/*Задание #3 (Использование рекурсии не обязательно)
Функция должна принимать два параметра – целые числа.
Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров, переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с использованием тега <table>
В остальных случаях выдавать корректную ошибку.*/

function task3($a, $b) 
{
    if(!is_int($a)) {
        trigger_error('Первый аргумент не целое число');
        return false;
    }
    if(!is_int($b)) {
        trigger_error('Второй аргумент не целое число');
        return false;
    }
    if($a < 0 || $b < 0) {
        trigger_error('Аргументы должны быть положительными числами');
        return false;
    }
    
    $result = '<table>';
    for($i = 1; $i <= $a; $i++) {
        $result .= '<tr>';
        for($j = 1; $j <= $b; $j++) { 
            $result .= '<td>';
            $result .= $j * $i;
            $result .= '</td>';
        }
        $result .= '</tr>';
    }
    $result .= '</table>';
    return $result;
}


/*Задание #4 (выполняется после просмотра модуля “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
Выведите информацию о текущей дате в формате 31.12.2016 23:59
Выведите unixtime время соответствующее 24.02.2016 00:00:00.*/

function task4()
{
  date_default_timezone_set('Europe/Moscow');
  return date('d.m.Y H:i');

}
function task5($date)
{
  return strtotime($date);

}

/*Задание #5 (выполняется после просмотра модуля “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
Дана строка: “Карл у Клары украл Кораллы”. Удалить из этой строки все заглавные буквы “К”.
Дана строка: “Две бутылки лимонада”. Заменить “Две”, на “Три”.*/
function task6($arg1, $arg2, $str)
{
    $newStr = str_replace($arg1, $arg2, $str);
    return $newStr;
}

/*Задание #6 (выполняется после просмотра модуля “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)
Создайте файл test.txt средствами PHP. Поместите в него текст - “Hello again!”
Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.*/

function task7($file, $text)
{
    file_put_contents($file, $text);
    $data = file_get_contents($file);
    return $data;
}

function task8($file)
{
    $data = file_get_contents($file);
    return $data;
}

?>