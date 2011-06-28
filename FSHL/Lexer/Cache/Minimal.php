<?php

/**
 * FSHL 2.0 RC                            | Universal Syntax HighLighter |
 * -----------------------------------------------------------------------
 *
 * LICENSE
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */

namespace FSHL\Lexer\Cache;

/**
 * Optimized and cached Minimal lexer.
 *
 * This file is generated. All changes made in this file will be lost.
 *
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/LICENSE
 * @see \FSHL\Generator
 * @see \FSHL\Lexer\Minimal
 */
class Minimal
{
	/**
	 * Generator version/lexer version.
	 *
	 * @var string
	 */
	public $version;

	/**
	 * Transitions table.
	 *
	 * @var array
	 */
	public $trans;

	/**
	 * Id of the initial state.
	 *
	 * @var integer
	 */
	public $initialState;

	/**
	 * Id of the return state.
	 *
	 * @var integer
	 */
	public $returnState;

	/**
	 * Id of the quit state.
	 *
	 * @var integer
	 */
	public $quitState;

	/**
	 * List of flags for all states.
	 *
	 * @var array
	 */
	public $flags;

	/**
	 * Data for all states.
	 *
	 * @var array
	 */
	public $data;

	/**
	 * List of CSS classes.
	 *
	 * @var array
	 */
	public $classes;

	/**
	 * List of keywords.
	 *
	 * @var array
	 */
	public $keywords;

	/**
	 * Initializes the lexer.
	 */
	public function __construct()
	{
		$this->version = '2.0/2.0';
		$this->trans = array(
			0 => array(
				0 => array(
					0 => 0, 1 => 0
				)
			)
		);
		$this->initialState = 0;
		$this->returnState = 1;
		$this->quitState = 2;
		$this->flags = array(
			0 => 0
		);
		$this->data = array(
			0 => NULL
		);
		$this->classes = array(
			0 => NULL
		);
		$this->keywords = array(
			
		);

	}

	/**
	 * Finds a delimiter for state OUT.
	 *
	 * @param string $text
	 * @param string $textLength
	 * @param string $textPos
	 * @return array
	 */
	public function findDelimiter0(&$text, $textLength, $textPos)
	{
		$buffer = false;
		while ($textPos < $textLength) {
			$part = substr($text, $textPos, 10);
			$letter = $part[0];
			if ("\t" === $letter || "\n" === $letter) {
				return array(0, $letter, $buffer);
			}

			$buffer .= $letter;
			$textPos++;
		}
		return array(-1, -1, $buffer);
	}

}