/*
    =====================================================================
    Author: Valdigleis (Dk4LL)
    E-mail: dk4ll@proton.me
    Version: 1.5
    Update date: 28/07/2023
    =====================================================================

    MIT License

    Copyright (c) 2021 Valdigleis (Dk4LL)

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
 */

/**
 *
 * Format the date in brazilian style
 *
 * @returns the date formatted
 */
function dateBrazilianStyle(date) {
    var d = date.getDate();
    var m = date.getMonth() + 1;
    var y = date.getYear();
    return (d<10?"0"+d:d) + "/" + (m<10?"0"+m:m)  + "/" +  (2000+y-100);
}


/**
 * 
 * Print the current date.
 * 
 * @returns the date in brazilian style.
 */
function printCurrentDate() {
    var d = new Date();
    return dateBrazilianStyle(d);
}

/**
 * 
 * Print the current time.
 * 
 * @returns the time in format HH:MM:SS.
 */
function getCurrentTimeFormatted() {
    var d = new Date();
    return (d.getHours() < 10?"0"+d.getHours():d.getHours()) + ":" + (d.getMinutes() < 10?"0"+d.getMinutes():d.getMinutes()) + ":" + (d.getSeconds() < 10?"0"+d.getSeconds():d.getSeconds());
}

/**
 * 
 * @returns the day in Portuguese
 */
function getDay(code) {
  switch (code) {
    case 0:
      return "Dom.";
    case 1:
      return "Seg.";
    case 2:
      return "Ter.";
    case 3:
      return "Qua.";
    case 4:
      return "Qui.";
    case 5:
      return "Sex.";
    default:
      return "Sab.";
  }
}

/**
 * 
 * Get the date of last modification formatted in brazilian style.
 * 
 * @returns the last modification in brazilian style.
 */
function getLastModificationDate() {
    var lmd = document.lastModified;
    var s = "The answer is 42!";
    var d1;
    if(0 != (d1=Date.parse(lmd))){
        s = dateBrazilianStyle(new Date(d1)) + " (" + getDay(new Date(d1).getDay()) + ") " + getCurrentTimeFormatted();
    }
    return s;
}

/**
 *
 * Build the copyright text.
 *
 * @returns copyright text
 */
function getCopyrightText(){
    return "Copyright &copy; " + new Date().getFullYear()  + " - Valdigleis (Dk4LL)";
}
