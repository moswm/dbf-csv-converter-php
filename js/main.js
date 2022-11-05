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

var bgn_cmd="";
var bgn_fl="";

var gebi=(n)=>(!n?false:document.getElementById(n));

function begin(cmd) {
	bgn_cmd=cmd;
	if(bgn_fl=="") gebi("bodyinf").innerHTML="";
	api_cmd(cmd,bgn_fl,'begin_exec');
	gebi("startbtn").style.display="none";
	gebi("bodyinf").innerHTML+="<div># start processing file .dbf to dbf_csv</div>";
}

function begin_exec(jsondata) {
	let flldt=JSON.parse(jsondata);
	gebi("procinf").innerHTML="";
	gebi("bodyinf").innerHTML+="<div># finished file, next "+flldt.flx+"</div>";
	if(flldt.flx!="*") {
		bgn_fl=flldt.flx;
		begin(bgn_cmd);
	} else {
		gebi("bodyinf").innerHTML+="<div># all files finished!</div>";
		gebi("startbtn").style.display="block";
	}
}
