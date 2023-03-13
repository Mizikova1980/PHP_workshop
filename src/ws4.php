<?php

/*Представьте, что вы создаете сайт для компании сдающих автомобили поминутно (каршеринг). У компании есть ряд тарифов. Вам необходимо реализовать каждый тариф в своем классе. У каждого тарифа **две** основные характеристики - **цена за 1 км, цена за 1 минуту**. Каждый тариф обязан иметь метод для подсчета цены поездки. В некоторых тарифах возможно использование **дополнительных** услуг. **Ваша задача** - посчитать цену, которую получит пользователь, если проедет **Х** км и **Y** минут по тарифу **Z**.

**Тариф базовый**
- Цена за 1 км = 10 рублей
- Цена за 1 минуту = 3 рубля
**Тариф почасовой**
- Цена за 1 км = 0
- Цена за 60 минут = 200 рублей
- Округление до 60 минут в большую сторону
**Тариф студенческий**
- Цена за 1 км = 4 рубля
- Цена за 1 минуту = 1 рубль
**Дополнительные услуги (трейты):**
- `Gps` в салон - 15 рублей в час, минимум 1 час. Округление в большую сторону
- Дополнительный водитель - 100 рублей единоразово
**Ожидаемая реализация:**
1. Создать интерфейс, который будет содержать описание метода подсчета цены, метода добавления услуги (принимает на вход интерфейс услуги)
2. Описать интерфейс доп. услуги, который содержит метод применения услуги к тарифу, который пересчитывает цену в зависимости от особенностей услуги
3. Реализовать абстрактный класс тарифа, который будет описывать основные методы и имплементировать описанный в п.1 интерфейс
4. Все тарифы должны наследоваться от абстрактного тарифа из п.2
5. Описать **2 услуги** реализовав интерфейс услуг*/


interface iService
{
    public function apply(iTariff $tariff, &$price);
}

class ServiceGPS implements iService
{
    private $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function apply(iTariff $tariff, &$price)
    {
        $minutes = $tariff->getMinutes();
        $hours= ceil($minutes / 60);
        $price += $this->price * $hours;
    }
}

class ServiceDriver implements iService
{
    private $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function apply(iTariff $tariff, &$price)
    {
        $price += $this->price;
    }
}

interface iTariff
{
    public function countPrice();
    public function addService(iService $service): self;
    public function getMinutes();
    public function getDistance();
}


abstract class TariffAbstract implements iTariff
{
    protected $priceRerKilometr;
    protected $pricePerMinute;
    protected $distance;
    protected $minutes;
    protected $services = [];

    public function __construct(int $distance, int $minutes)
    {
        $this->distance = $distance;
        $this->minutes = $minutes;
    }
        
    public function countPrice()
    {
        $price = $this->distance * $this->priceRerKilometr + $this->minutes * $this->pricePerMinute;

        if($this->services) {
            foreach($this->services as $service) {
                $service->apply($this, $price);
            }
        }
        return $price;
    }

    public function addService(iService $service): iTariff
    {
        array_push($this->services, $service);
        return $this;
    }

    public function getMinutes()
    {
        return $this->minutes;
    }

    public function getDistance()
    {
        return $this->distance;
    }
}

class Basic extends TariffAbstract
{
    protected $priceRerKilometr = 10;
    protected $pricePerMinute = 3; 
}

class Student extends TariffAbstract
{
    protected $priceRerKilometr = 4;
    protected $pricePerMinute = 1; 
}

class Hourly extends TariffAbstract
{
    protected $priceRerKilometr = 0;
    protected $pricePerMinute = 200 / 60;

    public function __construct(int $distance, int $minutes)
    {
        parent::__construct($distance, $minutes);
        $this->minutes = $this->minutes - $this->minutes % 60 + 60;
    }
}

$tariff = new Basic(5, 60);
$tariff->addService(new ServiceGPS(15));
$tariff->addService(new ServiceDriver(100));
echo $tariff->countPrice();



?>