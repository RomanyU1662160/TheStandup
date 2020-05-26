(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./resources/js/helpers/autoSearch.js":
/*!********************************************!*\
  !*** ./resources/js/helpers/autoSearch.js ***!
  \********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var autocomplete_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! autocomplete.js */ "./node_modules/autocomplete.js/index.js");
/* harmony import */ var autocomplete_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(autocomplete_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var algoliasearch__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! algoliasearch */ "./node_modules/algoliasearch/src/browser/builds/algoliasearch.js");
/* harmony import */ var algoliasearch__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(algoliasearch__WEBPACK_IMPORTED_MODULE_1__);


var algoliaClient = algoliasearch__WEBPACK_IMPORTED_MODULE_1___default()("GX2EF3TZ0L", "e0e17a27cc93013d253d9537ba437361");

var autoSearch = function autoSearch(tableName) {
  var inputName = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "#search";
  var index = algoliaClient.initIndex(tableName);
  autocomplete_js__WEBPACK_IMPORTED_MODULE_0___default()(inputName, {
    hint: true
  }, [{
    source: autocomplete_js__WEBPACK_IMPORTED_MODULE_0___default.a.sources.hits(index, {
      hitsPerPage: 5
    }),
    displayKey: 'search'
  }]);
};

/***/ })

}]);