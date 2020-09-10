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
// свойства элементов
$dbProperty = \CIBlockElement::getProperty(
$arItem['IBLOCK_ID'],
$arItem['ID']
);
while($arProperty = $dbProperty->Fetch()){
$arItem['PROPERTIES'][] = $arProperty;
}
}



$dbItems = Iblock\ElementTable::add($data); // добавление элемента в инфоблок
$dbItems = Iblock\ElementTable::addMulti($rows, $ignoreEvents = false); // для множественного добавления записей
$dbItems = Iblock\ElementTable::checkFields($result, $primary, $data); //проверяет поля данных перед записью в БД.
$dbItems = Iblock\ElementTable::delete($id); // удаление элемента по ID.ЗАБЛОКИРОВАН!
$dbItems = Iblock\ElementTable::getById($id); // получение элемента по ID
$dbItems = Iblock\ElementTable::getByPrimary($primary, $parameters = array()); //возвращает выборку по первичному ключу сущности и по опциональным параметрам
$dbItems = Iblock\ElementTable::getConnectionName(); //возвращает имя соединения для сущности
$dbItems = Iblock\ElementTable::getCount($filter = array(), $cache = array()); //выполняет COUNT запрос к сущности и возвращает результат
$dbItems = Iblock\ElementTable::getEntity(); //возвращает объект сущности.
$dbItems = Iblock\ElementTable::getList($parameters = array()); // получение элементов
$dbItems = Iblock\ElementTable::getMap(); //возвращает описание карты сущностей
$dbItems = Iblock\ElementTable::getRow($parameters); //возвращает один столбец (или null) по параметрам
$dbItems = Iblock\ElementTable::getRowById($id); //возвращает один столбец (или null) по первичному ключу сущности
$dbItems = Iblock\ElementTable::getTableName(); //возвращает имя таблицы БД для сущности
$dbItems = Iblock\ElementTable::query(); //создаёт и возвращает объект запроса для сущности
$dbItems = Iblock\ElementTable::update($primary, $data); // обновление элемента по ID
$dbItems = Iblock\ElementTable::updateMulti($ids, $data, $ignoreEvents = false);
$dbItems = Iblock\ElementTable::enableCrypto($field, $table = null, $mode = true); //устанавливает флаг поддержки шифрования для поля
$dbItems = Iblock\ElementTable::cryptoEnabled($field, $table = null); //возвращает true если шифрование разрешено для поля