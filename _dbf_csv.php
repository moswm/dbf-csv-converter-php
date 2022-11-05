<?php
/*
 * dbf-csv-converter-php / Converter DBF files in CSV (PHP)
 * Copyright (C) 2022 Baev
 *
 * MIT License
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT ]WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * 
 * GNU General Public License, version 2
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
*/

function dbf_csv($fl,$ps) {
global $bsdir;
	$flcsv="";
	foreach(glob($bsdir."*.dbf") as $fldbf) {
		$flnm=pathinfo($fldbf,PATHINFO_FILENAME);
		if ($flcsv!="") return $flnm;
		if (($fl=="")||($fl==$flnm)) {
			$flcsv=str_ireplace('.dbf','.csv',$fldbf);
			dbf_csv__($fldbf,$flcsv);
		}
	}
	return "*";
}

function dbf_csv__($fldbf,$flcsv) {
	if (!$h=dbase_open($fldbf,0)) return false;
	$nr=dbase_numrecords($h);
	$h2=fopen($flcsv,'w');
	for($i=1;$i<=$nr;$i++) {
		$r=dbase_get_record_with_names($h,$i);
		if ($i==1) fputcsv($h2,array_keys($r));
		fputcsv($h2,$r);
	}
	fclose($h2);
}

?>
