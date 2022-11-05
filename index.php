<?php
/*
 * dbf-csv-converter-php / Converter DBF files in CSV (PHP)
 * Copyright (C) 2022 Baev
 *
 * MIT License
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * 
 * GNU General Public License, version 2
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
*/

ini_set('display_errors',1);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	date_default_timezone_set('Europe/Amsterdam');

	settype($_GET['cmd'],"string");

	include('_config.php');
	include('_html.php');

	echo $html_head;
	if ($_GET['cmd']) {
		echo '
			<p><a href="?cmd=">Converter DBF files</a>: <b>Your cmd='.$_GET['cmd'].',</b></p>
			<div id="startbtn"><a href="javascript:begin(\''.$_GET['cmd'].'\');">start &raquo;</a></div>
			<div id="bodyinf" style="margin-top:15px;"></div>
			<div id="procinf"></div>';
	} else {
		echo '
			<p><b>Welcome to Converter DBF files!</b></p>
			<p>Select cmd:</p>
			<p><a href="?cmd=dbf_csv">Convert .dbf to .csv</a></p>';
	}
	echo '<script type="text/javascript">var apiurl="'.$apiurl.'";</script>';
	echo $html_foot;

?>