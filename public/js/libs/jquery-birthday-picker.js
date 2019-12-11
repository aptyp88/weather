/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/libs/jquery-birthday-picker.js":
/*!*****************************************************!*\
  !*** ./resources/js/libs/jquery-birthday-picker.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function ($) {
  var month = {
    "number": ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
    "short": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    "long": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
  },
      today = new Date(),
      todayYear = today.getFullYear(),
      todayMonth = today.getMonth() + 1,
      todayDay = today.getDate();

  updateTheBirthDayValue = function updateTheBirthDayValue(options, $selector, selectedYear, selectedMonth, selectedDay) {
    if (selectedYear * selectedMonth * selectedDay != 0) {
      if (selectedMonth < 10) selectedMonth = "0" + selectedMonth;
      if (selectedDay < 10) selectedDay = "0" + selectedDay;
      hiddenDate = selectedYear + "-" + selectedMonth + "-" + selectedDay;
      $selector.val(hiddenDate);
    } else {
      hiddenDate = "";
      $selector.val(hiddenDate);
    }

    if (options.callback) {
      options.callback(hiddenDate);
    }
  };

  generateBirthdayPicker = function generateBirthdayPicker($parent, options) {
    var parentId = $parent.attr('id').replace(/-/g, ''); // Create the html picker skeleton

    var $fieldset = $("<div class='birthdayPicker " + options.fieldSetClass + "'></div>"),
        $yearWrapper = $("<div class='" + options.selectWrapperClass + "'></div>"),
        $monthWrapper = $("<div class='" + options.selectWrapperClass + "'></div>"),
        $dayWrapper = $("<div class='" + options.selectWrapperClass + "'></div>"),
        $year = $("<select class='birthYear " + options.sizeClass + "' name='" + parentId + "_birth[year]'></select>"),
        $month = $("<select class='birthMonth " + options.sizeClass + "' name='" + parentId + "_birth[month]'></select>"),
        $day = $("<select class='birthDate " + options.sizeClass + "' name='" + parentId + "_birth[day]'></select>");
    $birthday = $("<input class='birthDay' name='" + parentId + "_birthDay' type='hidden'/>"); // Add the option placeholders if specified

    if (options.placeholder) {
      $("<option value='0'>Year</option>").appendTo($year);
      $("<option value='0'>Month</option>").appendTo($month);
      $("<option value='0'>Day</option>").appendTo($day);
    }

    $yearWrapper.append($year);
    $monthWrapper.append($month);
    $dayWrapper.append($day); // Deal with the various Date Formats

    if (options.dateFormat == "bigEndian") {
      $fieldset.append($yearWrapper).append($monthWrapper).append($dayWrapper);
    } else if (options.dateFormat == "littleEndian") {
      $fieldset.append($dayWrapper).append($monthWrapper).append($yearWrapper);
    } else {
      $fieldset.append($monthWrapper).append($dayWrapper).append($yearWrapper);
    } //calculate the year to add to the select options.


    var yearBegin = todayYear - options.minAge;
    var yearEnd = todayYear - options.maxAge;

    if (options.maxYear != todayYear && options.maxYear > todayYear) {
      yearBegin = options.maxYear;
      yearEnd = yearEnd + (options.maxYear - todayYear);
    }

    for (var i = yearBegin; i >= yearEnd; i--) {
      $("<option></option>").attr("value", i).text(i).appendTo($year);
    }

    for (var i = 0; i <= 11; i++) {
      $("<option></option>").attr('value', i + 1).text(month[options.monthFormat][i]).appendTo($month);
    }

    for (var i = 1; i <= 31; i++) {
      var number = i < 10 ? "0" + i : i;
      $("<option></option>").attr('value', i).text(number).appendTo($day);
    }

    $fieldset.append($birthday);
    $parent.append($fieldset); // Set the default date if given

    if (options.defaultDate) {
      if ($.type(options.defaultDate) !== "date") {
        /*
         * There is no concept of a pure date in js, only absolute timestamps.
         * A call to `new Date(value)` with a `value` of a string will attempt
         * to parse a datetime from that string into an absolute and localised
         * timestamp. Depending on the client locale this can result in the
         * defaultDate being misrepresented. To counter for this we add the
         * locale timezone offset.
         */
        var date = new Date(options.defaultDate);
        date.setSeconds(date.getSeconds() + date.getTimezoneOffset() * 60);
      } else {
        var date = options.defaultDate;
      }

      $year.val(date.getFullYear());
      $month.val(date.getMonth() + 1);
      $day.val(date.getDate());
      updateTheBirthDayValue(options, $birthday, date.getFullYear(), date.getMonth() + 1, date.getDate());
    }

    $fieldset.on('change', function () {
      $birthday = $(this).find('.birthDay'); // currently selected values

      selectedYear = parseInt($year.val(), 10), selectedMonth = parseInt($month.val(), 10), selectedDay = parseInt($day.val(), 10); //rebuild the index for the month.

      var currentMaxMonth = $month.children(":last").val();

      if (selectedYear > todayYear) {
        if (currentMaxMonth > todayMonth) {
          while (currentMaxMonth > todayMonth) {
            $month.children(":last").remove();
            currentMaxMonth--;
          }
        }
      } else {
        while (currentMaxMonth < 12) {
          $("<option></option>").attr('value', parseInt(currentMaxMonth) + 1).text(month[options.monthFormat][currentMaxMonth]).appendTo($month);
          currentMaxMonth++;
        }
      }

      var currentMaxDate = $day.children(":last").val(); // number of days in currently selected year/month

      var actMaxDay = new Date(selectedYear, selectedMonth, 0).getDate();

      if (currentMaxDate > actMaxDay) {
        while (currentMaxDate > actMaxDay) {
          $day.children(":last").remove();
          currentMaxDate--;
        }
      } else if (currentMaxDate < actMaxDay) {
        while (currentMaxDate < actMaxDay) {
          var dateIndex = parseInt(currentMaxDate) + 1;
          var number = dateIndex < 10 ? "0" + dateIndex : dateIndex;
          $("<option></option>").attr('value', dateIndex).text(number).appendTo($day);
          currentMaxDate++;
        }
      } // update the hidden date


      updateTheBirthDayValue(options, $birthday, selectedYear, selectedMonth, selectedDay);
    });
  };

  $.fn.birthdayPicker = function (options) {
    return this.each(function () {
      var settings = $.extend($.fn.birthdayPicker.defaults, options);
      generateBirthdayPicker($(this), settings);
    });
  };

  $.fn.birthdayPicker.defaults = {
    "maxAge": 100,
    "minAge": 0,
    "maxYear": todayYear,
    "dateFormat": "middleEndian",
    "monthFormat": "number",
    "placeholder": true,
    "defaultDate": false,
    "sizeClass": "span2",
    "fieldSetClass": '',
    'callback': false,
    'selectWrapperClass': 'col'
  };
}(jQuery));

/***/ }),

/***/ 1:
/*!***********************************************************!*\
  !*** multi ./resources/js/libs/jquery-birthday-picker.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\web\www\weather.loc\resources\js\libs\jquery-birthday-picker.js */"./resources/js/libs/jquery-birthday-picker.js");


/***/ })

/******/ });