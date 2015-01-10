<?php

namespace FormPhp\Validator;

/**
 * Абстрактный класс валидатора для элемента формы
 *
 */
abstract class AbstractValidator
{
    /**
     * Проверка введённого пользователем значения
     *
     * @param string $value Введённое пользователем значение
     * @return bool
     */
    abstract public function checkValue($value);
}
