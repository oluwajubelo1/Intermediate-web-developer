(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/CustomerPage/index.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Pages/CustomerPage/index.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Shared_header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/Shared/header */ "./resources/js/Shared/header.vue");

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["customers"],
  data: function data() {
    return {
      sending: false
    };
  },
  components: {
    generalnav: _Shared_header__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  methods: {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/CustomerPage/index.vue?vue&type=template&id=4d1ec539&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Pages/CustomerPage/index.vue?vue&type=template&id=4d1ec539& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("generalnav"),
      _vm._v(" "),
      _c("div", [
        _c("table", [
          _vm._m(0),
          _vm._v(" "),
          _c(
            "tbody",
            { staticClass: "text-gray-700" },
            _vm._l(_vm.customers, function(customer) {
              return _c(
                "tr",
                { key: customer.id, staticClass: "odd:bg-gray-100" },
                [
                  _c("td", { staticClass: "p-3" }, [
                    _vm._v(_vm._s(customer.id))
                  ]),
                  _vm._v(" "),
                  _c("td", { staticClass: "p-3" }, [
                    _vm._v(_vm._s(customer.firstname))
                  ]),
                  _vm._v(" "),
                  _c("td", { staticClass: "p-3" }, [
                    _vm._v(_vm._s(customer.lastname))
                  ]),
                  _vm._v(" "),
                  _c("td", { staticClass: "p-3" }, [
                    _vm._v(_vm._s(customer.email))
                  ]),
                  _vm._v(" "),
                  _c("td", { staticClass: "p-3" }, [
                    _vm._v(
                      _vm._s(customer.isBlocked == 0 ? "Active" : "Blocked")
                    )
                  ]),
                  _vm._v(" "),
                  customer.isBlocked == 0
                    ? _c(
                        "td",
                        { staticClass: "p-3" },
                        [
                          _c(
                            "inertia-link",
                            {
                              staticClass:
                                "block px-6 py-2 hover:bg-indigo hover:text-white",
                              attrs: {
                                href: _vm.route("customer.action", {
                                  id: customer.id,
                                  isBlocked: customer.isBlocked
                                }),
                                method: "put"
                              }
                            },
                            [_vm._v("Block")]
                          )
                        ],
                        1
                      )
                    : _c(
                        "td",
                        { staticClass: "p-3" },
                        [
                          _c(
                            "inertia-link",
                            {
                              staticClass:
                                "block px-6 py-2 hover:bg-indigo hover:text-white",
                              attrs: {
                                href: _vm.route("customer.action", {
                                  id: customer.id,
                                  isBlocked: customer.isBlocked
                                }),
                                method: "put"
                              }
                            },
                            [_vm._v("UnBlock")]
                          )
                        ],
                        1
                      ),
                  _vm._v(" "),
                  _c(
                    "td",
                    { staticClass: "p-3" },
                    [
                      _c(
                        "inertia-link",
                        {
                          staticClass:
                            "block px-6 py-2 hover:bg-indigo hover:text-white",
                          attrs: {
                            href: _vm.route("customer.destroy", customer.id),
                            method: "delete",
                            onclick:
                              "return confirm('Are you sure you want to delete this customer?')"
                          }
                        },
                        [_vm._v("Delete")]
                      )
                    ],
                    1
                  )
                ]
              )
            }),
            0
          )
        ])
      ])
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", { staticClass: "border-b" }, [
        _c("th", { staticClass: "px-3 py-2" }, [_vm._v("Customer Id")]),
        _vm._v(" "),
        _c("th", { staticClass: "px-3 py-2" }, [_vm._v("First Name")]),
        _vm._v(" "),
        _c("th", { staticClass: "px-3 py-2" }, [_vm._v("Last Name")]),
        _vm._v(" "),
        _c("th", { staticClass: "px-3 py-2" }, [_vm._v("Email")]),
        _vm._v(" "),
        _c("th", { staticClass: "px-3 py-2" }, [_vm._v("Status")]),
        _vm._v(" "),
        _c("th", { staticClass: "px-3 py-2" }),
        _vm._v(" "),
        _c("th", { staticClass: "px-3 py-2" })
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Pages/CustomerPage/index.vue":
/*!***************************************************!*\
  !*** ./resources/js/Pages/CustomerPage/index.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_4d1ec539___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=4d1ec539& */ "./resources/js/Pages/CustomerPage/index.vue?vue&type=template&id=4d1ec539&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/Pages/CustomerPage/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_4d1ec539___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_4d1ec539___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/CustomerPage/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/CustomerPage/index.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/Pages/CustomerPage/index.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/CustomerPage/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/CustomerPage/index.vue?vue&type=template&id=4d1ec539&":
/*!**********************************************************************************!*\
  !*** ./resources/js/Pages/CustomerPage/index.vue?vue&type=template&id=4d1ec539& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_4d1ec539___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=4d1ec539& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/CustomerPage/index.vue?vue&type=template&id=4d1ec539&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_4d1ec539___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_4d1ec539___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);