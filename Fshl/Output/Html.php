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
 * HTML output.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Output
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 */
class Fshl_Output_Html implements Fshl_Output
{
	/**
	 * Last used class.
	 *
	 * @var string
	 */
	private $lastClass = null;

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
			if (null !== $class) {
				$output .= sprintf('<span class="%s">', $class);
			}

			$this->lastClass = $class;
		}

		return $output . htmlspecialchars($word, ENT_COMPAT, 'UTF-8');
	}
}