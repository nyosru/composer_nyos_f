<?php

namespace f;

if (!defined('IN_NYOS_PROJECT'))
    die('<h1>Сработала защита функций v1</h1><p>от злостных розовых хакеров.<br>Приготовтесь к DOS атаке (6 поколения на ip-' . $_SERVER["REMOTE_ADDR"] . ') в течении 30 минут.</p>');

class timer {

    public static $start = false;
    public static $start_ar = [];
    public static $last_res = null;
    public static $last_res_ar = [];

    /**
     * начинаем отсчёт
     * @param type $timer_id
     * @return type
     */
    public static function start($timer_id = '') {
        if (!empty($timer_id)) {
            self::$start_ar[$timer_id] = microtime(true);
            return self::$start_ar[$timer_id];
        } else {
            self::$start = microtime(true);
            return self::$start;
        }
    }

    /**
     * завершаем отсчёт
     * @param type $timer_id
     */
    public static function stop($timer_id = null, $return = 'str') {
        if (!empty($timer_id)) {

            self::$last_res_ar[$timer_id] = microtime(true) - self::$start_ar[$timer_id];

            if ($return == 'str') {
                // return self::$last_res;
                // return self::$start .' - '. microtime(true) .' - '. self::$last_res;
                return number_format(self::$last_res_ar[$timer_id], 5, '.', '`');
            } else {
                return self::$last_res_ar[$timer_id];
            }
        } else {

            self::$last_res = microtime(true) - self::$start;

            if ($return == 'str') {
                // return self::$last_res;
                // return self::$start .' - '. microtime(true) .' - '. self::$last_res;
                return number_format(self::$last_res, 5, '.', '`');
            } else {
                return self::$last_res;
            }
        }
    }

}
