<?php

/**
 * Класс для фомирования таблицы в консоли
 * @author: Дамир Фаттахов
 */
class TableFormatter {

	private $data = [];

	/**
	 * @param $data
	 * @throws Exception
	 */
	public function __construct($data) {
		if (isset($data)) {
			$this->data = $data;
		} else {
			throw new Exception('Необходимо передать заполненный массив');
		}
	}

	/**
	 * Получение форматированной строки
	 * @param $row
	 * @return string
	 */
	public function getRow($row) {
		$formatted_row = '';
		foreach ($row as $key => $val) {
			$formatted_row .= "|$val" . str_repeat(' ', $this->getColumnLength($key) - strlen($val));
		}

		return $formatted_row . "|\n";
	}

	/**
	 * Получение линий для таблицы
	 * Длинна линни зависит от кол-ва символов в элементе массива
	 * @return string
	 */
	public function getTableLine() {
		$line = '';
		foreach ($this->data[0] as $key => $val) {
			$line .= '+' . str_repeat("-", $this->getColumnLength($key));
		}
		$line .= "+\n";

		return $line;
	}

	/**
	 * Обход всего массива, поиск самого большого элемента, получение длинны колонки
	 * @param $element
	 * @return int
	 */
	public function getColumnLength($element) {
		$max = 0;
		foreach ($this->data as $item) {
			$len = strlen($item[$element]);

			if ($len > $max) {
				$max = $len;
			}
		}

		return $max;
	}
}