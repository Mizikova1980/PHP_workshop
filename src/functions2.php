<?php


/*Задание #3.1**

1. Программно создайте **массив** из **50** пользователей, у каждого пользователя есть поля `id`, `name` и `age`:
- `id` - уникальный идентификатор, равен номеру эл-та в массиве
- `name` - случайное имя из **5-ти** возможных (сами придумайте каких)
- `age` - случайное число от **18 до 45**
1. Преобразуйте массив в **json** и сохраните в файл `users.json`
2. Откройте файл `users.json` и преобразуйте данные из него обратно **ассоциативный** массив РНР.
3. Посчитайте **количество** пользователей с **каждым** именем в массиве
4. Посчитайте **средний** возраст пользователей*/

function task1()
{

    $names = ['Юля', 'Петя', 'Вася', 'Маша', 'Саша'];
    $randomNames = function($names) 
    {
        return $names[array_rand($names)];
    };

    $users = [];
    for($i=0; $i < 50; $i++) {
        $users[] = [
            'id' => $i,
            'name' => $randomNames($names),
            'age' => random_int(18, 45)
        ];
        
    }

    $json = json_encode($users);
    file_put_contents('users.json', $json);
}


function task2() 
{
    $users = json_decode(file_get_contents('users.json'), true);

    $names = [];
    $sumAges = 0;
    foreach($users as $user) {
        if(isset($names[$user['name']])) {
            $names[$user['name']]++;
        } else {
            $names[$user['name']] = 1;
        }
        $sumAges += $user['age'];
        $arrLength = count($users);
        $usersAverage = $sumAges / $arrLength;
        
    }
    echo '<pre>';
    var_dump($names);
    echo "Средний возраст: $usersAverage лет";
}

?>
