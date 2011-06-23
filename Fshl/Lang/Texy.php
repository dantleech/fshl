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
 * Texy language file.
 *
 * @category Fshl
 * @package Fshl
 * @subpackage Lang
 * @copyright Copyright (c) 2002-2005 Juraj 'hvge' Durech
 * @copyright Copyright (c) 2011 Jaroslav Hanslík
 * @license https://github.com/kukulich/fshl/blob/master/!LICENSE.txt
 */
class Fshl_Lang_Texy implements Fshl_Lang
{
	/**
	 * Returns version.
	 *
	 * @return string
	 */
	public function getVersion()
	{
		return '0.1';
	}

	/**
	 * Returns initial state.
	 *
	 * @return string
	 */
	public function getInitialState()
	{
		return 'SingleNewLine';
	}

	/**
	 * Returns states.
	 *
	 * @return array
	 */
	public function getStates()
	{
		return array(
			'LineBODY' => array(
				array(
					'/---' => array('BlockIN', 0),
					'\---' => array('BlockOUT', 0),
					"\n" => array('NewLineTypeSelector', 0)
				),
				0,
				null,
				null
			),
			'NewLineTypeSelector' => array(
				array(
					"\n" => array('DoubleNewLine', 0),
					'!SPACE' => array('SingleNewLine', -1)
				),
				0,
				null,
				null
			),
			'SingleNewLine' => array(
				array(
					'##' => array('HeaderIN', 0),
					'**' => array('HeaderIN', 0),
					'==' => array('HeaderIN', 0),
					'--' => array('HeaderIN', 0),
					'_ALL' => array('LineBODY', -1)
				),
				0,
				null,
				null
			),
			'DoubleNewLine' => array(
				array(
					"\n" => array('DoubleNewLine', 0),
					'##' => array('HeaderIN', 0),
					'==' => array('HeaderIN', 0),
					'--' => array('HorizontalLine', 0),
					'- -' => array('HorizontalLine', 0),
					'**' => array('HorizontalLine', 0),
					'* *' => array('HorizontalLine', 0),
					'_ALL' => array('LineBODY', -1)
				),
				'texy-err',
				null,
				null
			),
			'HeaderIN' => array(
				array(
					'=' => array('HeaderIN', 0),
					'#' => array('HeaderIN', 0),
					'-' => array('HeaderIN', 0),
					'*' => array('HeaderIN', 0),
					"\r" => array('HeaderIN', 0),
					"\n" => array('DoubleNewLine', 0),
					'_ALL' => array('HeaderBody', -1)
				),
				0,
				'texy-hlead',
				null
			),
			'HeaderBody' => array(
				array(
					'=' => array('HeaderOUT', 0),
					'#' => array('HeaderOUT', 0),
					'-' => array('HeaderOUT', 0),
					'*' => array('HeaderOUT', 0),
					"\n" => array('DoubleNewLine', 0)
				),
				0,
				'texy-hbody',
				null
			),
			'HeaderOUT' => array(
				array(
					"\n" => array('DoubleNewLine', 0)
				),
				0,
				'texy-hlead',
				null
			),
			'HorizontalLine' => array(
				array(
					"\n" => array('LineBODY', -1)
				),
				0,
				'texy-hr',
				null
			),
			'BlockIN' => array(
				array(
					'html' => array('BlockHTML', 0),
					'code' => array('BlockCODE', 0),
					'div' => array('BlockDUMMY', 0),
					'text' => array('BlockTEXT', 0),
					'_ALL' => array('LineBODY', -1)
				),
				0,
				'texy-hr',
				null
			),
			'BlockOUT' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				0,
				'texy-hr',
				null
			),
			'BlockDUMMY' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				0,
				'texy-hr',
				null
			),
			// Text blocks
			'BlockTEXT' => array(
				array(
					"\n" => array('BlockTEXTBody', -1)
				),
				0,
				'texy-hr',
				null
			),
			'BlockTEXTBody' => array(
				array(
					"\n" => array('BlockTEXTBodyNL', 0)
				),
				0,
				'texy-text',
				null
			),
			'BlockTEXTBodyNL' => array(
				array(
					'\---' => array('BlockTEXTBodyOUT', 0),
					'_ALL' => array('BlockTEXTBody', -1)
				),
				0,
				'texy-text',
				null
			),
			'BlockTEXTBodyOUT' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				0,
				'texy-hr',
				null
			),
			// HTML blocks
			'BlockHTML' => array(
				array(
					"\n" => array('BlockHTMLBody', -1)
				),
				0,
				'texy-hr',
				null
			),
			'BlockHTMLBody' => array(
				array(
					"\n" => array('BlockHTMLBodyNL', 0)
				),
				0,
				'texy-html',
				null
			),
			'BlockHTMLBodyNL' => array(
				array(
					'\---' => array('BlockHTMLBodyOUT', 0),
					'_ALL' => array('BlockHTMLBody', -1)
				),
				0,
				'texy-html',
				null
			),
			'BlockHTMLBodyOUT' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				0,
				'texy-hr',
				null
			),
			// Code blocks
			'BlockCODE' => array(
				array(
					"\n" => array('BlockCODEBody', -1)
				),
				0,
				'texy-hr',
				null
			),
			'BlockCODEBody' => array(
				array(
					"\n" => array('BlockCODEBodyNL', 0)
				),
				0,
				'texy-code',
				null
			),
			'BlockCODEBodyNL' => array(
				array(
					'\---' => array('BlockCODEBodyOUT', 0),
					'_ALL' => array('BlockCODEBody', -1)
				),
				0,
				'texy-code',
				null
			),
			'BlockCODEBodyOUT' => array(
				array(
					'_ALL' => array('LineBODY', -1)
				),
				0,
				'texy-hr',
				null
			)
		);
	}

	/**
	 * Returns keywords.
	 *
	 * @return array
	 */
	public function getKeywords()
	{
		return array();
	}
}
