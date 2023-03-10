<?php


/*Задание #1

//Создайте переменную $name и присвойте ей строковое значение содержащее Ваше имя.
//Создайте переменную $age и присвойте ей строковое значение содержащее Ваш возраст.
Выведите с помощью echo (или print) фразу “Меня зовут: ​ваше_имя​”. 
Выведите фразу “Мне ​ваш_возраст​ лет”, 
Выведите следующий набор символов, включая кавычки - “!|/’”\ (двойная кавычка, воскл. знак, вертикальная черта, слэш, кавычка, двойная кавычка, обратный слэш). Все символы необходимо набрать с клавиатуры и применить экранирование перед обратным слешем () и двойными кавычками (не копировать из задания!).
Каждая фраза должна начинаться с новой строки.*/

$name = 'Юлия';
$age = 42;
echo "Меня зовут $name <br>";
echo "Мне $age года <br>";
echo '"!|/\'"\\ <br>';
echo '<br>';

/*Задание #2
Дана задача:
На школьной выставке 80 рисунков. 23 из них выполнены фломастерами, 40 карандашами, а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке?
Описать и вывести условия, решение этой задачи на PHP. Все предоставленные числа из пункта 1 должны быть указаны в константах.*/

const PICTURES = 80;
const PIC_CRAYON = 23;
const PIC_PENCIL = 40;
const PIC_PAINTS = PICTURES - PIC_CRAYON - PIC_PENCIL;

echo "Задача: <br> 
На школьной выставке " . PICTURES ." рисунков. " . PIC_CRAYON . " из них выполнены фломастерами, " . PIC_PENCIL . " карандашами, а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке? <br> 
Ответ: Красками выполнено " . PIC_PAINTS . " рисунков. <br>" ;
echo '<br>';


/*Задание #3
Создайте переменную $age.
Присвойте переменной $age произвольное числовое значение.
Напишите конструкцию if, которая выводит фразу: “Вам еще работать и работать” при условии, что значение переменной $age попадает в диапазон чисел от 18 до 65 (включительно).
Расширьте конструкцию if, выводя фразу: “Вам пора на пенсию” при условии, что значение переменной $age больше 65.
Расширьте конструкцию elseif, выводя фразу: “Вам ещё рано работать” при условии, что значение переменной $age попадает в диапазон чисел от 1 до 17 (включительно).
Дополните конструкцию ifelseif, выводя фразу: “Неизвестный возраст” при условии, что значение переменной $age не попадет в вышеописанные диапазоны чисел.*/

$age = mt_rand(-2, 70);

if ($age >= 18 && $age <= 65) {
    echo "Вам еще работать и работать <br>";
} elseif ($age >= 65) {
 echo "Вам пора на пенсию <br>";
} elseif ($age < 18 && $age >= 1) {
    echo "Вам ещё рано работать <br>";
} else {
    echo "Неизвестный возраст <br>";
}
echo '<br>';


/*Задание #4
Создайте переменную '$day' и присвойте ей произвольное числовое значение.
С помощью конструкции switch выведите фразу “Это рабочий день”, если значение переменной $day попадает в диапазон чисел от 1 до 5 (включительно).
Выведите фразу “Это выходной день”, если значение переменной $day равно числам 6 или 7.
Выведите фразу “Неизвестный день”, если значение переменной '$day' не попадает в диапазон чисел от 1 до 7 (включительно)*/


$day = mt_rand(-2, 10); 
switch($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "Это рабочий день <br>";
        break;
    case 6:
    case 7:
        echo "Это выходной день <br>";
        break;
    default:
       echo "Неизвестный день <br>";
}
echo '<br>';

/*Задание #5

Создайте массив $bmw с ячейками:
model
speed
doors
year
Заполните ячейки значениями соответсвенно: “X5”, 120, 5, “2015”.
Создайте массивы $toyota' и '$opel аналогичные массиву $bmw (заполните данными).
Объедините три массива в один многомерный массив.
Выведите значения всех трех массивов:*/

$bmw = [
    'model' => '',
    'speed' => '',
    'doors' => '',
    'year' => '',
];
$toyota = $bmw;
$opel = $bmw;

$bmw['model'] = 'X5';
$bmw['speed'] = 120;
$bmw['doors'] = 5;
$bmw['year'] = 2015;

$toyota['model'] = 'Camry';
$toyota['speed'] = 150;
$toyota['doors'] = 4;
$toyota['year'] = 2013;

$opel['model'] = 'Antara';
$opel['speed'] = 140;
$opel['doors'] = 5;
$opel['year'] = 2017;

/*echo '<pre>';
var_dump($bmw);
var_dump($toyota);
var_dump($opel);*/

$cars = [
    'bmw' => $bmw, 
    'toyota' => $toyota, 
    'opel' => $opel
];

foreach ($cars as $key => $car) {
    echo 'CAR ' . $key . '<br>';
    foreach ($car as $elem) {
        echo "$elem\n";
    }
    echo '<br>';
}
echo '<br>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<!--Задание #6

Используя цикл for, выведите таблицу умножения размером 10x10. Таблица должна быть выведена с помощью HTML тега <table>.
Если значение индекса строки и столбца чётный, то результат вывести в круглых скобках.
Если значение индекса строки и столбца Нечётный, то результат вывести в квадратных скобках.
Во всех остальных случаях результат выводить просто числом.
-->

<table border="1">
<?php
for($i = 1; $i < 11; $i++) {
    echo'<tr>';
    for($j = 1; $j < 11; $j++) { 
        $s = $j * $i;
        echo '<td>';
        if (($s) % 2 == 0) {
            echo "($s)";
        } else if(!($s) % 2 == 0) {
            echo "[$s]";
        } else {
            echo $s;
        }
    }
}
?>
</table>
</body>
</html>
