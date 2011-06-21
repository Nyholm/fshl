<?php

/**
 * FastSHL                              | Universal Syntax HighLighter |
 * ---------------------------------------------------------------------
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

/**
 * HTML output with links to manual.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Output
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 */
class Fshl_Output_HtmlManual
{
	/**
	 * Last used class.
	 *
	 * @var string
	 */
	private $lastClass = null;

	/**
	 * Closing tag for link.
	 *
	 * @var string
	 */
	private $closeTag = null;

	/**
	 * Urls list to manual.
	 *
	 * @var array
	 */
	private $manualUrl = array(
		'php-keyword1' => 'http://php.net/manual/en/langref.php',
		'php-keyword2' => 'http://php.net/%s',

		'sql-keyword1' => 'http://search.oracle.com/search/search?group=Documentation&q=%s',
		'sql-keyword2' => 'http://search.oracle.com/search/search?group=Documentation&q=%s',
		'sql-keyword3' => 'http://search.oracle.com/search/search?group=Documentation&q=%s',
	);

	/**
	 * Writes template.
	 *
	 * @param string $word
	 * @param string $class
	 * @return string
	 */
	public function template($word, $class)
	{
		$output = '';

		if ($this->lastClass !== $class) {
			if (null !== $this->lastClass) {
				$output .= '</span>';
			}

			$output .= $this->closeTag;
			$this->closeTag = '';

			if (null !== $class) {
				$output .= sprintf('<span class="%s">', $class);
			}

			$this->lastClass = $class;
		}

		return $output . htmlspecialchars($word, ENT_COMPAT, 'UTF-8');
	}

	/**
	 * Writes keyword.
	 *
	 * @param string $word
	 * @param string $class
	 * @return string
	 */
	public function keyword($word, $class)
	{
		$output = '';

		if ($this->lastClass !== $class) {
			if (null !== $this->lastClass) {
				$output .= '</span>';
			}

			$output .= $this->closeTag;
			$this->closeTag = '';

			if (null !== $class) {
				if (isset($this->manualUrl[$class])) {
					$output .= sprintf('<a href="%s">', sprintf($this->manualUrl[$class], $word));
					$this->closeTag = '</a>';
				}

				$output .= sprintf('<span class="%s">', $class);
			}

			$this->lastClass = $class;
		}

		return $output . htmlspecialchars($word, ENT_COMPAT, 'UTF-8');
	}
}