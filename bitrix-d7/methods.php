<?php

use Bitrix\Iblock;

// получение инфоблока с кодом goods
$arIblock = Iblock\IblockTable::getList(array(
'filter' => array('CODE' => 'goods')
))->fetch();


// получение списка свойств информационного блока
$arProps = Iblock\PropertyTable::getList(array(
'select' => array('*'),
'filter' => array('IBLOCK_ID' => $arIblock['ID'])
))->fetchAll();


// получение списка элементов с полями ID, NAME, IBLOCK_ID
$dbItems = Iblock\ElementTable::getList(array(
'select' => array('ID', 'NAME', 'IBLOCK_ID'),
'filter' => array('IBLOCK_ID' => $arIblock['ID'])
));

while ($arItem = $dbItems->fetch()){

    //не нашёл метода в d7 для выборки свойст элемента
    // собирает массив свойств
    $dbProperty = \CIBlockElement::getProperty(
        $arItem['IBLOCK_ID'],
        $arItem['ID']
    );

    // записывает в массив элемента массив свойств
    while($arProperty = $dbProperty->Fetch()){
        $arItem['PROPERTIES'][] = $arProperty;
    }
}



Iblock\ElementTable::add($data); // добавление элемента в инфоблок
Iblock\ElementTable::addMulti($rows, $ignoreEvents = false); // для множественного добавления записей
Iblock\ElementTable::checkFields($result, $primary, $data); //проверяет поля данных перед записью в БД.
Iblock\ElementTable::delete($primary); // удаление элемента по ID.ЗАБЛОКИРОВАН!
Iblock\ElementTable::getById($id); // получение элемента по ID
Iblock\ElementTable::getByPrimary($primary, $parameters = array()); //возвращает выборку по первичному ключу сущности и по опциональным параметрам
Iblock\ElementTable::getConnectionName(); //возвращает имя соединения для сущности
Iblock\ElementTable::getCount($filter = array(), $cache = array()); //выполняет COUNT запрос к сущности и возвращает результат
Iblock\ElementTable::getEntity(); //возвращает объект сущности.
Iblock\ElementTable::getList($parameters = array()); // получение элементов
Iblock\ElementTable::getMap(); //возвращает описание карты сущностей
Iblock\ElementTable::getRow($parameters); //возвращает один столбец (или null) по параметрам
Iblock\ElementTable::getRowById($id); //возвращает один столбец (или null) по первичному ключу сущности
Iblock\ElementTable::getTableName(); //возвращает имя таблицы БД для сущности
Iblock\ElementTable::query(); //создаёт и возвращает объект запроса для сущности
Iblock\ElementTable::update($primary, $data); // обновление элемента по ID
Iblock\ElementTable::updateMulti($primaries, $data, $ignoreEvents = false);
Iblock\ElementTable::enableCrypto($field, $table = null, $mode = true); //устанавливает флаг поддержки шифрования для поля
Iblock\ElementTable::cryptoEnabled($field, $table = null); //возвращает true если шифрование разрешено для поля