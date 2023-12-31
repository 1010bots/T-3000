/*!
 * Kakao SDK for JavaScript - v2.3.0
 *
 * Copyright 2017 Kakao Corp.
 *
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 *
 * OSS Notice | KakaoSDK-JavaScript
 *
 * This application is Copyright © Kakao Corp. All rights reserved.
 * The following sets forth attribution notices for third party software that may be contained in this application.
 * If you have any questions about these notices, please email us at opensource@kakaocorp.com
 *
 *
 * crypto-js
 *
 * https://github.com/brix/crypto-js
 *
 * Copyright 2009-2013 Jeff Mott
 * Copyright 2013-2016 Evan Vosberg
 *
 * MIT License
 *
 *
 * ES6-Promise
 *
 * https://github.com/stefanpenner/es6-promise
 *
 * Copyright 2014 Yehuda Katz, Tom Dale, Stefan Penner and contributors
 *
 * MIT License
 *
 *
 * Kakao Web2App Library
 *
 * https://github.com/kakao/web2app
 *
 * Copyright 2015 Kakao Corp. http://www.kakaocorp.com
 *
 * MIT License
 *
 *
 * lodash
 *
 * https://github.com/lodash/lodash
 *
 * Copyright JS Foundation and other contributors
 *
 * MIT License
 *
 *
 * ua_parser
 *
 * https://github.com/html5crew/ua_parser
 *
 * Copyright HTML5 Tech. Team in Daum Communications Corp.
 *
 * MIT License
 *
 *
 * ``````````
 * MIT License
 *
 * Copyright (c)
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * 'Software'), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
 * CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * ``````````
 */
! function(e, t) {
    "object" == typeof exports && "undefined" != typeof module ? t(exports) : "function" == typeof define && define.amd ? define(["exports"], t) : t((e = "undefined" != typeof globalThis ? globalThis : e || self).Kakao = e.Kakao || {})
}(this, (function(e) {
    "use strict";
    var t = "object" == typeof global && global && global.Object === Object && global,
        n = "object" == typeof self && self && self.Object === Object && self,
        r = t || n || Function("return this")(),
        o = r.Symbol,
        i = Object.prototype,
        a = i.hasOwnProperty,
        c = i.toString,
        u = o ? o.toStringTag : void 0;
    var s = Object.prototype.toString;
    var l = "[object Null]",
        p = "[object Undefined]",
        f = o ? o.toStringTag : void 0;

    function d(e) {
        return null == e ? void 0 === e ? p : l : f && f in Object(e) ? function(e) {
            var t = a.call(e, u),
                n = e[u];
            try {
                e[u] = void 0;
                var r = !0
            } catch (e) {}
            var o = c.call(e);
            return r && (t ? e[u] = n : delete e[u]), o
        }(e) : function(e) {
            return s.call(e)
        }(e)
    }

    function h(e) {
        return null != e && "object" == typeof e
    }
    var v = "[object Symbol]";
    var m = Array.isArray,
        y = /\s/;
    var g = /^\s+/;

    function b(e) {
        return e ? e.slice(0, function(e) {
            for (var t = e.length; t-- && y.test(e.charAt(t)););
            return t
        }(e) + 1).replace(g, "") : e
    }

    function _(e) {
        var t = typeof e;
        return null != e && ("object" == t || "function" == t)
    }
    var w = NaN,
        k = /^[-+]0x[0-9a-f]+$/i,
        S = /^0b[01]+$/i,
        j = /^0o[0-7]+$/i,
        O = parseInt;

    function x(e) {
        if ("number" == typeof e) return e;
        if (function(e) {
                return "symbol" == typeof e || h(e) && d(e) == v
            }(e)) return w;
        if (_(e)) {
            var t = "function" == typeof e.valueOf ? e.valueOf() : e;
            e = _(t) ? t + "" : t
        }
        if ("string" != typeof e) return 0 === e ? e : +e;
        e = b(e);
        var n = S.test(e);
        return n || j.test(e) ? O(e.slice(2), n ? 2 : 8) : k.test(e) ? w : +e
    }
    var T = 1 / 0,
        A = 17976931348623157e292;

    function C(e) {
        var t = function(e) {
                return e ? (e = x(e)) === T || e === -T ? (e < 0 ? -1 : 1) * A : e == e ? e : 0 : 0 === e ? e : 0
            }(e),
            n = t % 1;
        return t == t ? n ? t - n : t : 0
    }

    function P(e) {
        return e
    }
    var I = "[object AsyncFunction]",
        B = "[object Function]",
        E = "[object GeneratorFunction]",
        z = "[object Proxy]";

    function F(e) {
        if (!_(e)) return !1;
        var t = d(e);
        return t == B || t == E || t == I || t == z
    }
    var q, U = r["__core-js_shared__"],
        D = (q = /[^.]+$/.exec(U && U.keys && U.keys.IE_PROTO || "")) ? "Symbol(src)_1." + q : "";
    var R = Function.prototype.toString;
    var L = /^\[object .+?Constructor\]$/,
        M = Function.prototype,
        K = Object.prototype,
        N = M.toString,
        H = K.hasOwnProperty,
        G = RegExp("^" + N.call(H).replace(/[\\^$.*+?()[\]{}|]/g, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$");

    function $(e) {
        return !(!_(e) || (t = e, D && D in t)) && (F(e) ? G : L).test(function(e) {
            if (null != e) {
                try {
                    return R.call(e)
                } catch (e) {}
                try {
                    return e + ""
                } catch (e) {}
            }
            return ""
        }(e));
        var t
    }
    var J = Date.now;
    var X, W, V, Y = function() {
            try {
                var e = $(t = function(e, t) {
                    return null == e ? void 0 : e[t]
                }(Object, "defineProperty")) ? t : void 0;
                return e({}, "", {}), e
            } catch (e) {}
            var t
        }(),
        Z = Y,
        Q = Z ? function(e, t) {
            return Z(e, "toString", {
                configurable: !0,
                enumerable: !1,
                value: (n = t, function() {
                    return n
                }),
                writable: !0
            });
            var n
        } : P,
        ee = (X = Q, W = 0, V = 0, function() {
            var e = J(),
                t = 16 - (e - V);
            if (V = e, t > 0) {
                if (++W >= 800) return arguments[0]
            } else W = 0;
            return X.apply(void 0, arguments)
        }),
        te = ee;

    function ne(e, t) {
        for (var n = -1, r = null == e ? 0 : e.length; ++n < r && !1 !== t(e[n], n, e););
        return e
    }
    var re = 9007199254740991,
        oe = /^(?:0|[1-9]\d*)$/;

    function ie(e, t) {
        var n = typeof e;
        return !!(t = null == t ? re : t) && ("number" == n || "symbol" != n && oe.test(e)) && e > -1 && e % 1 == 0 && e < t
    }

    function ae(e, t) {
        return e === t || e != e && t != t
    }
    var ce = Math.max;
    var ue = 9007199254740991;

    function se(e) {
        return "number" == typeof e && e > -1 && e % 1 == 0 && e <= ue
    }

    function le(e) {
        return null != e && se(e.length) && !F(e)
    }
    var pe = Object.prototype;

    function fe(e) {
        var t = e && e.constructor;
        return e === ("function" == typeof t && t.prototype || pe)
    }

    function de(e) {
        return h(e) && "[object Arguments]" == d(e)
    }
    var he = Object.prototype,
        ve = he.hasOwnProperty,
        me = he.propertyIsEnumerable,
        ye = de(function() {
            return arguments
        }()) ? de : function(e) {
            return h(e) && ve.call(e, "callee") && !me.call(e, "callee")
        },
        ge = ye;
    var be = "object" == typeof e && e && !e.nodeType && e,
        _e = be && "object" == typeof module && module && !module.nodeType && module,
        we = _e && _e.exports === be ? r.Buffer : void 0,
        ke = (we ? we.isBuffer : void 0) || function() {
            return !1
        },
        Se = {};
    Se["[object Float32Array]"] = Se["[object Float64Array]"] = Se["[object Int8Array]"] = Se["[object Int16Array]"] = Se["[object Int32Array]"] = Se["[object Uint8Array]"] = Se["[object Uint8ClampedArray]"] = Se["[object Uint16Array]"] = Se["[object Uint32Array]"] = !0, Se["[object Arguments]"] = Se["[object Array]"] = Se["[object ArrayBuffer]"] = Se["[object Boolean]"] = Se["[object DataView]"] = Se["[object Date]"] = Se["[object Error]"] = Se["[object Function]"] = Se["[object Map]"] = Se["[object Number]"] = Se["[object Object]"] = Se["[object RegExp]"] = Se["[object Set]"] = Se["[object String]"] = Se["[object WeakMap]"] = !1;
    var je = "object" == typeof e && e && !e.nodeType && e,
        Oe = je && "object" == typeof module && module && !module.nodeType && module,
        xe = Oe && Oe.exports === je && t.process,
        Te = function() {
            try {
                var e = Oe && Oe.require && Oe.require("util").types;
                return e || xe && xe.binding && xe.binding("util")
            } catch (e) {}
        }(),
        Ae = Te && Te.isTypedArray,
        Ce = Ae ? function(e) {
            return function(t) {
                return e(t)
            }
        }(Ae) : function(e) {
            return h(e) && se(e.length) && !!Se[d(e)]
        },
        Pe = Ce,
        Ie = Object.prototype.hasOwnProperty;

    function Be(e, t) {
        var n = m(e),
            r = !n && ge(e),
            o = !n && !r && ke(e),
            i = !n && !r && !o && Pe(e),
            a = n || r || o || i,
            c = a ? function(e, t) {
                for (var n = -1, r = Array(e); ++n < e;) r[n] = t(n);
                return r
            }(e.length, String) : [],
            u = c.length;
        for (var s in e) !t && !Ie.call(e, s) || a && ("length" == s || o && ("offset" == s || "parent" == s) || i && ("buffer" == s || "byteLength" == s || "byteOffset" == s) || ie(s, u)) || c.push(s);
        return c
    }

    function Ee(e, t) {
        return function(n) {
            return e(t(n))
        }
    }
    var ze = Ee(Object.keys, Object),
        Fe = Object.prototype.hasOwnProperty;

    function qe(e) {
        return le(e) ? Be(e) : function(e) {
            if (!fe(e)) return ze(e);
            var t = [];
            for (var n in Object(e)) Fe.call(e, n) && "constructor" != n && t.push(n);
            return t
        }(e)
    }
    var Ue = Object.prototype.hasOwnProperty;

    function De(e) {
        if (!_(e)) return function(e) {
            var t = [];
            if (null != e)
                for (var n in Object(e)) t.push(n);
            return t
        }(e);
        var t = fe(e),
            n = [];
        for (var r in e)("constructor" != r || !t && Ue.call(e, r)) && n.push(r);
        return n
    }

    function Re(e) {
        return le(e) ? Be(e, !0) : De(e)
    }
    var Le = Ee(Object.getPrototypeOf, Object),
        Me = "[object Object]",
        Ke = Function.prototype,
        Ne = Object.prototype,
        He = Ke.toString,
        Ge = Ne.hasOwnProperty,
        $e = He.call(Object);
    var Je, Xe = function(e, t, n) {
        for (var r = -1, o = Object(e), i = n(e), a = i.length; a--;) {
            var c = i[Je ? a : ++r];
            if (!1 === t(o[c], c, o)) break
        }
        return e
    };
    var We = function(e, t) {
            return function(n, r) {
                if (null == n) return n;
                if (!le(n)) return e(n, r);
                for (var o = n.length, i = t ? o : -1, a = Object(n);
                    (t ? i-- : ++i < o) && !1 !== r(a[i], i, a););
                return n
            }
        }((function(e, t) {
            return e && Xe(e, t, qe)
        })),
        Ve = We,
        Ye = Object.prototype,
        Ze = Ye.hasOwnProperty,
        Qe = function(e, t) {
            return te(function(e, t, n) {
                return t = ce(void 0 === t ? e.length - 1 : t, 0),
                    function() {
                        for (var r = arguments, o = -1, i = ce(r.length - t, 0), a = Array(i); ++o < i;) a[o] = r[t + o];
                        o = -1;
                        for (var c = Array(t + 1); ++o < t;) c[o] = r[o];
                        return c[t] = n(a),
                            function(e, t, n) {
                                switch (n.length) {
                                    case 0:
                                        return e.call(t);
                                    case 1:
                                        return e.call(t, n[0]);
                                    case 2:
                                        return e.call(t, n[0], n[1]);
                                    case 3:
                                        return e.call(t, n[0], n[1], n[2])
                                }
                                return e.apply(t, n)
                            }(e, this, c)
                    }
            }(e, t, P), e + "")
        }((function(e, t) {
            e = Object(e);
            var n = -1,
                r = t.length,
                o = r > 2 ? t[2] : void 0;
            for (o && function(e, t, n) {
                    if (!_(n)) return !1;
                    var r = typeof t;
                    return !!("number" == r ? le(n) && ie(t, n.length) : "string" == r && t in n) && ae(n[t], e)
                }(t[0], t[1], o) && (r = 1); ++n < r;)
                for (var i = t[n], a = Re(i), c = -1, u = a.length; ++c < u;) {
                    var s = a[c],
                        l = e[s];
                    (void 0 === l || ae(l, Ye[s]) && !Ze.call(e, s)) && (e[s] = i[s])
                }
            return e
        })),
        et = Qe;

    function tt(e, t) {
        var n;
        return (m(e) ? ne : Ve)(e, "function" == typeof(n = t) ? n : P)
    }
    var nt = "[object String]";

    function rt(e) {
        return "string" == typeof e || !m(e) && h(e) && d(e) == nt
    }

    function ot(e) {
        return !0 === e || !1 === e || h(e) && "[object Boolean]" == d(e)
    }

    function it(e) {
        return h(e) && 1 === e.nodeType && ! function(e) {
            if (!h(e) || d(e) != Me) return !1;
            var t = Le(e);
            if (null === t) return !0;
            var n = Ge.call(t, "constructor") && t.constructor;
            return "function" == typeof n && n instanceof n && He.call(n) == $e
        }(e)
    }

    function at(e) {
        return "number" == typeof e && e == C(e)
    }

    function ct(e) {
        return "number" == typeof e || h(e) && "[object Number]" == d(e)
    }

    function ut(e) {
        return function(t) {
            return Object.prototype.toString.call(t) === "[object ".concat(e, "]")
        }
    }

    function st(e) {
        return ut("Blob")(e)
    }

    function lt(e) {
        return ut("File")(e)
    }

    function pt(e) {
        return ut("FileList")(e)
    }

    function ft(e, t) {
        return Array.prototype.slice.call(e).map(t)
    }

    function dt(e, t) {
        return Array.prototype.slice.call(e).every(t)
    }

    function ht(e, t) {
        return [e, t].reduce((function(e, t) {
            return e.filter((function(e) {
                return -1 === t.indexOf(e)
            }))
        }))
    }

    function vt(e) {
        return Object.keys(e || {})
    }

    function mt() {}

    function yt(e) {
        return it(e) ? e : rt(e) ? document.querySelector(e) : null
    }

    function gt(e, t, n) {
        e.addEventListener && e.addEventListener(t, n, !1)
    }

    function bt(e, t, n) {
        e.removeEventListener && e.removeEventListener(t, n, !1)
    }

    function _t(e) {
        var t = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1] ? encodeURIComponent : function(e) {
            return e
        };
        return ft(vt(e), (function(n) {
            var r = e[n];
            return t(n) + "=" + t(h(r) ? JSON.stringify(r) : r)
        })).join("&")
    }

    function wt(e) {
        if (!m(e)) throw new Error("elements should be an Array");
        return function(t) {
            return e.indexOf(t) > -1
        }
    }

    function kt(e) {
        if (!m(e)) throw new Error("validators should be an Array");
        return function(t) {
            return e.some((function(e) {
                return e(t)
            }))
        }
    }

    function St(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter((function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            }))), n.push.apply(n, r)
        }
        return n
    }

    function jt(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? St(Object(n), !0).forEach((function(t) {
                At(e, t, n[t])
            })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : St(Object(n)).forEach((function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            }))
        }
        return e
    }

    function Ot(e, t) {
        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
    }

    function xt(e, t) {
        for (var n = 0; n < t.length; n++) {
            var r = t[n];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, Rt(r.key), r)
        }
    }

    function Tt(e, t, n) {
        return t && xt(e.prototype, t), n && xt(e, n), Object.defineProperty(e, "prototype", {
            writable: !1
        }), e
    }

    function At(e, t, n) {
        return (t = Rt(t)) in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Ct(e, t) {
        if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function");
        e.prototype = Object.create(t && t.prototype, {
            constructor: {
                value: e,
                writable: !0,
                configurable: !0
            }
        }), Object.defineProperty(e, "prototype", {
            writable: !1
        }), t && It(e, t)
    }

    function Pt(e) {
        return Pt = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function(e) {
            return e.__proto__ || Object.getPrototypeOf(e)
        }, Pt(e)
    }

    function It(e, t) {
        return It = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(e, t) {
            return e.__proto__ = t, e
        }, It(e, t)
    }

    function Bt(e, t) {
        if (null == e) return {};
        var n, r, o = function(e, t) {
            if (null == e) return {};
            var n, r, o = {},
                i = Object.keys(e);
            for (r = 0; r < i.length; r++) n = i[r], t.indexOf(n) >= 0 || (o[n] = e[n]);
            return o
        }(e, t);
        if (Object.getOwnPropertySymbols) {
            var i = Object.getOwnPropertySymbols(e);
            for (r = 0; r < i.length; r++) n = i[r], t.indexOf(n) >= 0 || Object.prototype.propertyIsEnumerable.call(e, n) && (o[n] = e[n])
        }
        return o
    }

    function Et(e, t) {
        if (t && ("object" == typeof t || "function" == typeof t)) return t;
        if (void 0 !== t) throw new TypeError("Derived constructors may only return object or undefined");
        return function(e) {
            if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return e
        }(e)
    }

    function zt(e) {
        var t = function() {
            if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
            if (Reflect.construct.sham) return !1;
            if ("function" == typeof Proxy) return !0;
            try {
                return Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], (function() {}))), !0
            } catch (e) {
                return !1
            }
        }();
        return function() {
            var n, r = Pt(e);
            if (t) {
                var o = Pt(this).constructor;
                n = Reflect.construct(r, arguments, o)
            } else n = r.apply(this, arguments);
            return Et(this, n)
        }
    }

    function Ft(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = null == e ? null : "undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"];
            if (null != n) {
                var r, o, i, a, c = [],
                    u = !0,
                    s = !1;
                try {
                    if (i = (n = n.call(e)).next, 0 === t) {
                        if (Object(n) !== n) return;
                        u = !1
                    } else
                        for (; !(u = (r = i.call(n)).done) && (c.push(r.value), c.length !== t); u = !0);
                } catch (e) {
                    s = !0, o = e
                } finally {
                    try {
                        if (!u && null != n.return && (a = n.return(), Object(a) !== a)) return
                    } finally {
                        if (s) throw o
                    }
                }
                return c
            }
        }(e, t) || Ut(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function qt(e) {
        return function(e) {
            if (Array.isArray(e)) return Dt(e)
        }(e) || function(e) {
            if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"]) return Array.from(e)
        }(e) || Ut(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function Ut(e, t) {
        if (e) {
            if ("string" == typeof e) return Dt(e, t);
            var n = Object.prototype.toString.call(e).slice(8, -1);
            return "Object" === n && e.constructor && (n = e.constructor.name), "Map" === n || "Set" === n ? Array.from(e) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? Dt(e, t) : void 0
        }
    }

    function Dt(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, r = new Array(t); n < t; n++) r[n] = e[n];
        return r
    }

    function Rt(e) {
        var t = function(e, t) {
            if ("object" != typeof e || null === e) return e;
            var n = e[Symbol.toPrimitive];
            if (void 0 !== n) {
                var r = n.call(e, t || "default");
                if ("object" != typeof r) return r;
                throw new TypeError("@@toPrimitive must return a primitive value.")
            }
            return ("string" === t ? String : Number)(e)
        }(e, "string");
        return "symbol" == typeof t ? t : String(t)
    }
    var Lt = "undefined" != typeof globalThis ? globalThis : "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : {};

    function Mt(e) {
        return e && e.__esModule && Object.prototype.hasOwnProperty.call(e, "default") ? e.default : e
    }
    var Kt = function() {
            function e(e) {
                var n = {},
                    r = /(dolfin)[ \/]([\w.]+)/.exec(e) || /(edge)[ \/]([\w.]+)/.exec(e) || /(chrome)[ \/]([\w.]+)/.exec(e) || /(tizen)[ \/]([\w.]+)/.exec(e) || /(opera)(?:.*version)?[ \/]([\w.]+)/.exec(e) || /(webkit)(?:.*version)?[ \/]([\w.]+)/.exec(e) || /(msie) ([\w.]+)/.exec(e) || e.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+))?/.exec(e) || ["", "unknown"];
                return "webkit" === r[1] ? r = /(iphone|ipad|ipod)[\S\s]*os ([\w._\-]+) like/.exec(e) || /(android)[ \/]([\w._\-]+);/.exec(e) || [r[0], "safari", r[2]] : "mozilla" === r[1] ? /trident/.test(e) ? r[1] = "msie" : r[1] = "firefox" : /polaris|natebrowser|([010|011|016|017|018|019]{3}\d{3,4}\d{4}$)/.test(e) && (r[1] = "polaris"), n[r[1]] = !0, n.name = r[1], n.version = t(r[2]), n
            }

            function t(e) {
                var t = {},
                    n = e ? e.split(/\.|-|_/) : ["0", "0", "0"];
                return t.info = n.join("."), t.major = n[0] || "0", t.minor = n[1] || "0", t.patch = n[2] || "0", t
            }

            function n(e) {
                return function(e) {
                    if (e.match(/ipad/) || e.match(/android/) && !e.match(/mobi|mini|fennec/) || e.match(/macintosh/) && window.navigator.maxTouchPoints > 1) return !0;
                    return !1
                }(e) ? "tablet" : function(e) {
                    if (e.match(/linux|windows (nt|98)|macintosh|cros/) && !e.match(/android|mobile|polaris|lgtelecom|uzard|natebrowser|ktf;|skt;/)) return !0;
                    return !1
                }(e) ? "pc" : function(e) {
                    return !!e.match(/ip(hone|od)|android.+mobile|windows (ce|phone)|blackberry|bb10|symbian|webos|firefox.+fennec|opera m(ob|in)i|tizen.+mobile|polaris|iemobile|lgtelecom|nokia|sonyericsson|dolfin|uzard|natebrowser|ktf;|skt;/)
                }(e) ? "mobile" : ""
            }

            function r(e) {
                var n = {},
                    r = /(iphone|ipad|ipod)[\S\s]*os ([\w._\-]+) like/.exec(e) || !!/polaris|natebrowser|([010|011|016|017|018|019]{3}\d{3,4}\d{4}$)/.test(e) && ["", "polaris", "0.0.0"] || /(windows)(?: nt | phone(?: os){0,1} | )([\w._\-]+)/.exec(e) || /(android)[ \/]([\w._\-]+);/.exec(e) || !!/android/.test(e) && ["", "android", "0.0.0"] || !!/(windows)/.test(e) && ["", "windows", "0.0.0"] || /(mac) os x ([\w._\-]+)/.exec(e) || /(tizen)[ \/]([\w._\-]+);/.exec(e) || !!/(linux)/.test(e) && ["", "linux", "0.0.0"] || !!/webos/.test(e) && ["", "webos", "0.0.0"] || /(cros)(?:\s[\w]+\s)([\d._\-]+)/.exec(e) || /(bada)[ \/]([\w._\-]+)/.exec(e) || !!/bada/.test(e) && ["", "bada", "0.0.0"] || !!/(rim|blackberry|bb10)/.test(e) && ["", "blackberry", "0.0.0"] || ["", "unknown", "0.0.0"];
                return "iphone" === r[1] || "ipad" === r[1] || "ipod" === r[1] ? r[1] = "ios" : "windows" === r[1] && "98" === r[2] && (r[2] = "0.98.0"), "mac" === r[1] && "undefined" != typeof window && window.navigator.maxTouchPoints > 1 && (r[1] = "ios"), "cros" === r[1] && (r[1] = "chrome"), n[r[1]] = !0, n.name = r[1], n.version = t(r[2]), n
            }
            Array.isArray || (Array.isArray = function(e) {
                return "[object Array]" === Object.prototype.toString.call(e)
            });
            var o = ["crios", "fxios", "daumapps"];

            function i(e, n) {
                var r = {},
                    i = null,
                    a = o;
                Array.isArray(n) ? a = o.concat(n) : "string" == typeof n && (a = o.concat([n]));
                for (var c = 0, u = a.length; c < u; c += 1) {
                    var s = a[c];
                    if (i = new RegExp("(" + s + ")[ \\/]([\\w._\\-]+)").exec(e)) break
                }
                return i || (i = ["", ""]), i[1] ? (r.isApp = !0, r.name = i[1], r.version = t(i[2])) : r.isApp = !1, r
            }
            return function(t, o) {
                var a = function(e) {
                    return e ? e.toLowerCase() : "undefined" != typeof window && window.navigator && "string" == typeof window.navigator.userAgent ? window.navigator.userAgent.toLowerCase() : ""
                }(t);
                return {
                    ua: a,
                    browser: e(a),
                    platform: n(a),
                    os: r(a),
                    app: i(a, o)
                }
            }
        }(),
        Nt = Mt(Kt)();
    var Ht, Gt, $t, Jt, Xt = "https://kauth.kakao.com",
        Wt = "https://story.kakao.com",
        Vt = "https://developers.kakao.com",
        Yt = (Ht = location, Gt = Ht.protocol, $t = Ht.hostname, Jt = Ht.port, "".concat(Gt, "//").concat($t).concat(Jt ? ":" + Jt : "")),
        Zt = Nt,
        Qt = /KAKAOTALK/i.test(Zt.ua),
        en = "2.3.0".concat(""),
        tn = navigator,
        nn = ["sdk/".concat(en), "os/javascript", "sdk_type/javascript", "lang/".concat(tn.userLanguage || tn.language), "device/".concat(tn.platform.replace(/ /g, "_")), "origin/".concat(encodeURIComponent(Yt))].join(" "),
        rn = {
            apiDomain: "https://kapi.kakao.com",
            accountDomain: "https://accounts.kakao.com",
            authDomain: Xt,
            authorize: "".concat(Xt, "/oauth/authorize"),
            redirectUri: "JS-SDK",
            universalKakaoLink: "".concat("https://talk-apps.kakao.com", "/scheme/"),
            talkInappScheme: "kakaotalk://inappbrowser",
            talkSyncpluginScheme: "kakaotalk://bizplugin?plugin_id=6011263b74fc2b49c73a7298",
            sharerDomain: "https://sharer.kakao.com",
            pickerDomain: "https://friend-picker.kakao.com",
            appsDomain: "https://apps.kakao.com",
            talkLinkScheme: "kakaolink://send",
            talkAndroidPackage: "com.kakao.talk",
            channel: "https://pf.kakao.com",
            channelIcon: "".concat(Vt, "/assets/img/about/logos"),
            storyShare: "".concat(Wt, "/s/share"),
            storyChannelFollow: "".concat(Wt, "/s/follow"),
            storyIcon: "".concat(Vt, "/sdk/js/resources/story/icon_small.png"),
            storyPostScheme: "storylink://posting",
            naviScheme: "kakaonavi-sdk://navigate",
            naviFallback: "https://kakaonavi.kakao.com/launch/index.do"
        },
        on = null;

    function an() {
        return on
    }

    function cn(e) {
        on = e
    }

    function un(e) {
        Error.prototype.constructor.apply(this, arguments), this.name = "KakaoError", this.message = e
    }

    function sn(e) {
        var t = e.reduce((function(e, t) {
            return jt(jt({}, e), t)
        }), {});
        return jt(jt({}, t), {}, {
            cleanup: function() {
                tt(e, (function(e) {
                    return e.cleanup && e.cleanup()
                }))
            }
        })
    }

    function ln(e) {
        tt(e, (function(e) {
            e()
        })), e.length = 0
    }

    function pn() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
            t = arguments.length > 1 ? arguments[1] : void 0,
            n = arguments.length > 2 ? arguments[2] : void 0;
        if (!h(e)) throw new Error("params should be an Object");
        F(t.before) && t.before(e), F(t.defaults) ? et(e, t.defaults(e)) : et(e, t.defaults);
        var r = t.required,
            o = void 0 === r ? {} : r,
            i = t.optional,
            a = void 0 === i ? {} : i,
            c = ht(vt(o), vt(e));
        if (c.length > 0) throw new un("Missing required keys: ".concat(c.join(","), " at ").concat(n));
        var u = jt(jt({}, o), a),
            s = ht(vt(e), vt(u));
        if (s.length > 0) throw new un("Invalid parameter keys: ".concat(s.join(","), " at ").concat(n));
        return tt(e, (function(e, t) {
            ! function(e, t, n) {
                if (!1 === t(e)) throw new un("Illegal argument for ".concat(n))
            }(e, u[t], '"'.concat(t, '" in ').concat(n))
        })), F(t.after) && t.after(e), e
    }

    function fn(e) {
        var t = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-._~";
        return ft((window.crypto || window.msCrypto).getRandomValues(new Uint8Array(e)), (function(e) {
            return t[e % 66]
        })).join("")
    }

    function dn(e, t) {
        if (Zt.os.android) {
            var n = JSON.stringify({
                appKey: on,
                KA: nn
            });
            return "market://details?id=".concat(e, "&referrer=").concat(n)
        }
        return Zt.os.ios ? "https://itunes.apple.com/app/id".concat(t) : location.href
    }
    un.prototype = new Error;
    var hn = {};

    function vn(e, t, n) {
        var r = hn[t];
        return r && r.close && !r.closed && r.close(), hn[t] = window.open(e, t, n), hn[t]
    }

    function mn() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 480,
            t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 700,
            n = window.screenLeft ? window.screenLeft : window.screenX ? window.screenX : 0,
            r = window.screenTop ? window.screenTop : window.screenY ? window.screenY : 0;
        return ["width=".concat(e), "height=".concat(t), "left=".concat(screen.width / 2 - e / 2 + n), "top=".concat(screen.height / 2 - t / 2 + r), "scrollbars=yes", "resizable=1"].join(",")
    }

    function yn(e, t, n) {
        tt(n, (function(n, r) {
            var o = t.getAttribute(n);
            null !== o && (e[r] = "true" === o || "false" === o ? "true" === o : o)
        }))
    }

    function gn(e, t, n, r) {
        var o = Zt.browser.msie ? {} : vn(e, n, r || mn());
        return o.focus && o.focus(), bn(e, t, n), o
    }

    function bn(e, t) {
        var n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : "_self",
            r = document.createElement("form");
        r.setAttribute("accept-charset", "utf-8"), r.setAttribute("method", "post"), r.setAttribute("action", e), r.setAttribute("target", n), r.setAttribute("style", "display:none"), tt(t, (function(e, t) {
            var n = document.createElement("input");
            n.type = "hidden", n.name = t, n.value = rt(e) ? e : JSON.stringify(e), r.appendChild(n)
        })), document.body.appendChild(r), r.submit(), document.body.removeChild(r)
    }
    var _n = {
        exports: {}
    };
    ! function(e, t) {
        e.exports = function() {
            function e(e) {
                var t = typeof e;
                return null !== e && ("object" === t || "function" === t)
            }

            function t(e) {
                return "function" == typeof e
            }
            var n = Array.isArray ? Array.isArray : function(e) {
                    return "[object Array]" === Object.prototype.toString.call(e)
                },
                r = 0,
                o = void 0,
                i = void 0,
                a = function(e, t) {
                    b[r] = e, b[r + 1] = t, 2 === (r += 2) && (i ? i(_) : k())
                };

            function c(e) {
                i = e
            }

            function u(e) {
                a = e
            }
            var s = "undefined" != typeof window ? window : void 0,
                l = s || {},
                p = l.MutationObserver || l.WebKitMutationObserver,
                f = "undefined" == typeof self && "undefined" != typeof process && "[object process]" === {}.toString.call(process),
                d = "undefined" != typeof Uint8ClampedArray && "undefined" != typeof importScripts && "undefined" != typeof MessageChannel;

            function h() {
                return function() {
                    return process.nextTick(_)
                }
            }

            function v() {
                return void 0 !== o ? function() {
                    o(_)
                } : g()
            }

            function m() {
                var e = 0,
                    t = new p(_),
                    n = document.createTextNode("");
                return t.observe(n, {
                        characterData: !0
                    }),
                    function() {
                        n.data = e = ++e % 2
                    }
            }

            function y() {
                var e = new MessageChannel;
                return e.port1.onmessage = _,
                    function() {
                        return e.port2.postMessage(0)
                    }
            }

            function g() {
                var e = setTimeout;
                return function() {
                    return e(_, 1)
                }
            }
            var b = new Array(1e3);

            function _() {
                for (var e = 0; e < r; e += 2)(0, b[e])(b[e + 1]), b[e] = void 0, b[e + 1] = void 0;
                r = 0
            }

            function w() {
                try {
                    var e = Function("return this")().require("vertx");
                    return o = e.runOnLoop || e.runOnContext, v()
                } catch (e) {
                    return g()
                }
            }
            var k = void 0;

            function S(e, t) {
                var n = this,
                    r = new this.constructor(x);
                void 0 === r[O] && $(r);
                var o = n._state;
                if (o) {
                    var i = arguments[o - 1];
                    a((function() {
                        return K(o, r, i, n._result)
                    }))
                } else L(n, r, e, t);
                return r
            }

            function j(e) {
                var t = this;
                if (e && "object" == typeof e && e.constructor === t) return e;
                var n = new t(x);
                return q(n, e), n
            }
            k = f ? h() : p ? m() : d ? y() : void 0 === s ? w() : g();
            var O = Math.random().toString(36).substring(2);

            function x() {}
            var T = void 0,
                A = 1,
                C = 2;

            function P() {
                return new TypeError("You cannot resolve a promise with itself")
            }

            function I() {
                return new TypeError("A promises callback cannot return that same promise.")
            }

            function B(e, t, n, r) {
                try {
                    e.call(t, n, r)
                } catch (e) {
                    return e
                }
            }

            function E(e, t, n) {
                a((function(e) {
                    var r = !1,
                        o = B(n, t, (function(n) {
                            r || (r = !0, t !== n ? q(e, n) : D(e, n))
                        }), (function(t) {
                            r || (r = !0, R(e, t))
                        }), "Settle: " + (e._label || " unknown promise"));
                    !r && o && (r = !0, R(e, o))
                }), e)
            }

            function z(e, t) {
                t._state === A ? D(e, t._result) : t._state === C ? R(e, t._result) : L(t, void 0, (function(t) {
                    return q(e, t)
                }), (function(t) {
                    return R(e, t)
                }))
            }

            function F(e, n, r) {
                n.constructor === e.constructor && r === S && n.constructor.resolve === j ? z(e, n) : void 0 === r ? D(e, n) : t(r) ? E(e, n, r) : D(e, n)
            }

            function q(t, n) {
                if (t === n) R(t, P());
                else if (e(n)) {
                    var r = void 0;
                    try {
                        r = n.then
                    } catch (e) {
                        return void R(t, e)
                    }
                    F(t, n, r)
                } else D(t, n)
            }

            function U(e) {
                e._onerror && e._onerror(e._result), M(e)
            }

            function D(e, t) {
                e._state === T && (e._result = t, e._state = A, 0 !== e._subscribers.length && a(M, e))
            }

            function R(e, t) {
                e._state === T && (e._state = C, e._result = t, a(U, e))
            }

            function L(e, t, n, r) {
                var o = e._subscribers,
                    i = o.length;
                e._onerror = null, o[i] = t, o[i + A] = n, o[i + C] = r, 0 === i && e._state && a(M, e)
            }

            function M(e) {
                var t = e._subscribers,
                    n = e._state;
                if (0 !== t.length) {
                    for (var r = void 0, o = void 0, i = e._result, a = 0; a < t.length; a += 3) r = t[a], o = t[a + n], r ? K(n, r, o, i) : o(i);
                    e._subscribers.length = 0
                }
            }

            function K(e, n, r, o) {
                var i = t(r),
                    a = void 0,
                    c = void 0,
                    u = !0;
                if (i) {
                    try {
                        a = r(o)
                    } catch (e) {
                        u = !1, c = e
                    }
                    if (n === a) return void R(n, I())
                } else a = o;
                n._state !== T || (i && u ? q(n, a) : !1 === u ? R(n, c) : e === A ? D(n, a) : e === C && R(n, a))
            }

            function N(e, t) {
                try {
                    t((function(t) {
                        q(e, t)
                    }), (function(t) {
                        R(e, t)
                    }))
                } catch (t) {
                    R(e, t)
                }
            }
            var H = 0;

            function G() {
                return H++
            }

            function $(e) {
                e[O] = H++, e._state = void 0, e._result = void 0, e._subscribers = []
            }

            function J() {
                return new Error("Array Methods must be provided an Array")
            }
            var X = function() {
                function e(e, t) {
                    this._instanceConstructor = e, this.promise = new e(x), this.promise[O] || $(this.promise), n(t) ? (this.length = t.length, this._remaining = t.length, this._result = new Array(this.length), 0 === this.length ? D(this.promise, this._result) : (this.length = this.length || 0, this._enumerate(t), 0 === this._remaining && D(this.promise, this._result))) : R(this.promise, J())
                }
                return e.prototype._enumerate = function(e) {
                    for (var t = 0; this._state === T && t < e.length; t++) this._eachEntry(e[t], t)
                }, e.prototype._eachEntry = function(e, t) {
                    var n = this._instanceConstructor,
                        r = n.resolve;
                    if (r === j) {
                        var o = void 0,
                            i = void 0,
                            a = !1;
                        try {
                            o = e.then
                        } catch (e) {
                            a = !0, i = e
                        }
                        if (o === S && e._state !== T) this._settledAt(e._state, t, e._result);
                        else if ("function" != typeof o) this._remaining--, this._result[t] = e;
                        else if (n === ee) {
                            var c = new n(x);
                            a ? R(c, i) : F(c, e, o), this._willSettleAt(c, t)
                        } else this._willSettleAt(new n((function(t) {
                            return t(e)
                        })), t)
                    } else this._willSettleAt(r(e), t)
                }, e.prototype._settledAt = function(e, t, n) {
                    var r = this.promise;
                    r._state === T && (this._remaining--, e === C ? R(r, n) : this._result[t] = n), 0 === this._remaining && D(r, this._result)
                }, e.prototype._willSettleAt = function(e, t) {
                    var n = this;
                    L(e, void 0, (function(e) {
                        return n._settledAt(A, t, e)
                    }), (function(e) {
                        return n._settledAt(C, t, e)
                    }))
                }, e
            }();

            function W(e) {
                return new X(this, e).promise
            }

            function V(e) {
                var t = this;
                return n(e) ? new t((function(n, r) {
                    for (var o = e.length, i = 0; i < o; i++) t.resolve(e[i]).then(n, r)
                })) : new t((function(e, t) {
                    return t(new TypeError("You must pass an array to race."))
                }))
            }

            function Y(e) {
                var t = new this(x);
                return R(t, e), t
            }

            function Z() {
                throw new TypeError("You must pass a resolver function as the first argument to the promise constructor")
            }

            function Q() {
                throw new TypeError("Failed to construct 'Promise': Please use the 'new' operator, this object constructor cannot be called as a function.")
            }
            var ee = function() {
                function e(t) {
                    this[O] = G(), this._result = this._state = void 0, this._subscribers = [], x !== t && ("function" != typeof t && Z(), this instanceof e ? N(this, t) : Q())
                }
                return e.prototype.catch = function(e) {
                    return this.then(null, e)
                }, e.prototype.finally = function(e) {
                    var n = this,
                        r = n.constructor;
                    return t(e) ? n.then((function(t) {
                        return r.resolve(e()).then((function() {
                            return t
                        }))
                    }), (function(t) {
                        return r.resolve(e()).then((function() {
                            throw t
                        }))
                    })) : n.then(e, e)
                }, e
            }();

            function te() {
                var e = void 0;
                if (void 0 !== Lt) e = Lt;
                else if ("undefined" != typeof self) e = self;
                else try {
                    e = Function("return this")()
                } catch (e) {
                    throw new Error("polyfill failed because global object is unavailable in this environment")
                }
                var t = e.Promise;
                if (t) {
                    var n = null;
                    try {
                        n = Object.prototype.toString.call(t.resolve())
                    } catch (e) {}
                    if ("[object Promise]" === n && !t.cast) return
                }
                e.Promise = ee
            }
            return ee.prototype.then = S, ee.all = W, ee.race = V, ee.resolve = j, ee.reject = Y, ee._setScheduler = c, ee._setAsap = u, ee._asap = a, ee.polyfill = te, ee.Promise = ee, ee
        }()
    }(_n);
    var wn = _n.exports;

    function kn(e) {
        return new wn.Promise((function(t, n) {
            ! function(e, t) {
                var n = e.url,
                    r = e.method,
                    o = e.headers,
                    i = e.data,
                    a = new XMLHttpRequest;
                a.open(r, n),
                    function(e) {
                        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                        Object.keys(t).forEach((function(n) {
                            e.setRequestHeader(n, t[n])
                        }))
                    }(a, o), a.onreadystatechange = function() {
                        a.readyState === XMLHttpRequest.DONE && t(a)
                    }, a.send(i)
            }(e, (function(e) {
                var r = e.status,
                    o = function(e) {
                        try {
                            return JSON.parse(e)
                        } catch (t) {
                            return e
                        }
                    }(e.response);
                200 === r ? t(o) : n(o)
            }))
        }))
    }
    Mt(wn);
    var Sn = {};
    var jn = {
            subscribe: function(e, t) {
                Sn[e] = Sn[e] || [], Sn[e].push(t)
            },
            unsubscribe: function(e, t) {
                for (var n = Sn[e], r = 0; r < n.length; r++)
                    if (n[r] === t) return void n.splice(r, 1)
            },
            dispatch: function(e) {
                tt(Sn[e], (function(e) {
                    e()
                }))
            }
        },
        On = function() {
            function e(t, n) {
                Ot(this, e), this._interval = t, this._maxCount = n, this._count = 0, this._stopped = !1, this._timeout = null
            }
            return Tt(e, [{
                key: "start",
                value: function(e, t) {
                    null !== this._timeout && this.stop(), this._count = 0, this._stopped = !1, this._doPolling(e, t)
                }
            }, {
                key: "_doPolling",
                value: function(e, t) {
                    var n = this;
                    this._stopped || (this._timeout = setTimeout((function() {
                        ++n._count > n._maxCount ? t() : (e(), n._doPolling(e, t))
                    }), this._interval))
                }
            }, {
                key: "stop",
                value: function() {
                    this._stopped = !0, clearTimeout(this._timeout), this._timeout = null
                }
            }]), e
        }(),
        xn = {
            optional: {
                close: F,
                returnUrl: rt,
                forceMobileLayout: ot,
                enableBackButton: ot
            },
            defaults: {
                close: mt,
                forceMobileLayout: !1,
                enableBackButton: !0
            }
        },
        Tn = {
            authorize: {
                optional: {
                    redirectUri: rt,
                    approvalType: wt(["project"]),
                    scope: rt,
                    throughTalk: ot,
                    channelPublicId: rt,
                    serviceTerms: rt,
                    isPopup: ot,
                    state: rt,
                    deviceType: wt(["watch", "tv"]),
                    prompt: rt,
                    throughSyncplugin: ot,
                    loginHint: rt,
                    nonce: rt,
                    settleId: rt
                },
                defaults: {
                    throughTalk: !0,
                    isPopup: !1,
                    throughSyncplugin: !0
                }
            },
            selectShippingAddress: xn,
            createShippingAddress: xn,
            updateShippingAddress: jt({
                required: {
                    addressId: at
                }
            }, xn)
        };

    function An(e) {
        return e.throughSyncplugin && Qt && /ch-home/i.test(Zt.ua)
    }

    function Cn(e, t) {
        return !!(e && e.indexOf(t) > -1)
    }

    function Pn(e) {
        return "".concat(rn.authorize, "?").concat(_t(e))
    }

    function In(e) {
        return jt(jt({}, function(e) {
            var t = {
                client_id: an()
            };
            return e.approvalType && (t.approval_type = e.approvalType), e.scope && (t.scope = e.scope), e.prompt && (t.prompt = e.prompt), e.state && (t.state = e.state), e.nonce && (t.nonce = e.nonce), e.loginHint && (t.login_hint = e.loginHint), e.settleId && (t.settle_id = e.settleId), e.deviceType && (t.device_type = e.deviceType), e.channelPublicId && (t.channel_public_id = e.channelPublicId), (e.serviceTerms || "" === e.serviceTerms) && (t["extra.service_terms"] = e.serviceTerms), t
        }(e)), {}, {
            redirect_uri: e.redirectUri || rn.redirectUri,
            response_type: "code",
            auth_tran_id: fn(60)
        })
    }

    function Bn(e, t) {
        return jt(jt({}, t), {}, {
            ka: nn,
            is_popup: e.isPopup
        })
    }
    var En = ["status", "error_code"],
        zn = new On(1e3, 600);

    function Fn(e) {
        var t, n, r, o, i, a, c = In(e),
            u = Bn(e, c),
            s = (n = (t = e).prompt, r = t.throughTalk, o = !(!Zt.os.ios && !Zt.os.android || Qt), i = Cn(n, "login"), a = Cn(n, "none"), r && o && !(Zt.os.android && /instagram|fb_iab/g.test(Zt.ua)) && !i && !a),
            l = An(e),
            p = Pn(u),
            f = s ? function(e, t, n) {
                var r = jt(jt({}, t), {}, {
                        is_popup: !0
                    }),
                    o = function() {
                        return ["intent:#Intent", "action=com.kakao.talk.intent.action.CAPRI_LOGGED_IN_ACTIVITY", "launchFlags=0x08880000", "S.com.kakao.sdk.talk.appKey=".concat(an()), "S.com.kakao.sdk.talk.redirectUri=".concat(r.redirect_uri), "S.com.kakao.sdk.talk.kaHeader=".concat(nn), "S.com.kakao.sdk.talk.extraparams=".concat(encodeURIComponent(JSON.stringify(r)))].concat(qt(e.state ? ["S.com.kakao.sdk.talk.state=".concat(e.state)] : []), ["S.browser_fallback_url=".concat(encodeURIComponent(n)), "end;"]).join(";")
                    },
                    i = function() {
                        var t = Pn(r),
                            o = e.isPopup ? t : n,
                            i = "".concat(t, "&ka=").concat(encodeURIComponent(nn)),
                            a = "".concat(rn.talkInappScheme, "?url=").concat(encodeURIComponent(i));
                        return "".concat(rn.universalKakaoLink).concat(encodeURIComponent(a), "&web=").concat(encodeURIComponent(o))
                    };
                return Zt.os.android ? o() : i()
            }(e, c, p) : p,
            d = null;
        return l ? function(e) {
            var t = jt(jt({}, e), {}, {
                    is_popup: !0,
                    approval_window_type: "v4_bizplugin"
                }),
                n = encodeURIComponent(_t(t));
            location.href = "".concat(rn.talkSyncpluginScheme, "&query=").concat(n)
        }(u) : e.isPopup ? d = vn(f, "_blank", mn()) : location.href = f, new wn.Promise((function(t, n) {
            if (s || l || e.isPopup) {
                var r = (o = c.auth_tran_id, {
                    client_id: an(),
                    auth_tran_id: o,
                    ka: nn
                });
                zn.start((function() {
                    var o;
                    (o = r, kn({
                        method: "GET",
                        url: "".concat(rn.authDomain, "/apiweb/code.json?").concat(_t(o))
                    })).then((function(r) {
                        var o = function(e) {
                            var t = e.status,
                                n = e.error_code,
                                r = Bt(e, En);
                            if ("300" === n) return null;
                            "error" === t && "700" === n && (location.href = "".concat(rn.authDomain, "/error/network"));
                            return r
                        }(r);
                        null !== o && (zn.stop(), d && d.close && d.close(), o.error ? n(o) : t(o), qn(e, o)), !s && d && d.closed && zn.stop()
                    }))
                }), (function() {
                    var t = jt({
                        error: "timeout",
                        error_description: "LOGIN_TIMEOUT"
                    }, e.state && {
                        state: e.state
                    });
                    n(t), qn(e, t)
                }))
            }
            var o
        }))
    }

    function qn(e, t) {
        var n = e.redirectUri;
        if (n) {
            var r = n.indexOf("?") > -1 ? "&" : "?";
            location.href = n + r + _t(t)
        }
    }
    var Un, Dn = Object.freeze({
            __proto__: null,
            authorize: function(e) {
                if (Cn((e = pn(e, Tn.authorize, "Auth.authorize")).prompt, "none") && !Qt) {
                    var t = jt({
                        error: "auto_login",
                        error_description: "NOT_SUPPORTED_BROWSER"
                    }, e.state && {
                        state: e.state
                    });
                    return qn(e, t), wn.Promise.reject(t)
                }
                var n, r, o, i;
                if (jn.dispatch("LOGIN_START"), r = (n = e).throughSyncplugin, o = n.isPopup, i = n.prompt, !An({
                        throughSyncplugin: r
                    }) || !1 !== o || Cn(i, "cert") || !window.kakaoweb || "function" != typeof window.kakaoweb.reqSignInLocation) return Fn(e);
                (function(e) {
                    var t = In(e),
                        n = Bn(e, t),
                        r = _t(jt(jt({}, n), {}, {
                            is_popup: !1,
                            prompt: "none"
                        }));
                    return kakaoweb.reqSignInLocation(r).then((function(t) {
                        var n = Object.fromEntries(new window.URL(t).searchParams);
                        return "consent_required" === n.error && !Cn(e.prompt, "none") || "interaction_required" === n.error || (qn(e, n), !1)
                    })).catch((function(e) {
                        return !1
                    }))
                })(e).then((function(t) {
                    t && Fn(e)
                }))
            }
        }),
        Rn = {
            exports: {}
        },
        Ln = {
            exports: {}
        };

    function Mn() {
        return Un || (Un = 1, function(e, t) {
            var n;
            e.exports = (n = n || function(e, t) {
                var n;
                if ("undefined" != typeof window && window.crypto && (n = window.crypto), "undefined" != typeof self && self.crypto && (n = self.crypto), "undefined" != typeof globalThis && globalThis.crypto && (n = globalThis.crypto), !n && "undefined" != typeof window && window.msCrypto && (n = window.msCrypto), !n && void 0 !== Lt && Lt.crypto && (n = Lt.crypto), !n) try {
                    n = require("crypto")
                } catch (e) {}
                var r = function() {
                        if (n) {
                            if ("function" == typeof n.getRandomValues) try {
                                return n.getRandomValues(new Uint32Array(1))[0]
                            } catch (e) {}
                            if ("function" == typeof n.randomBytes) try {
                                return n.randomBytes(4).readInt32LE()
                            } catch (e) {}
                        }
                        throw new Error("Native crypto module could not be used to get secure random number.")
                    },
                    o = Object.create || function() {
                        function e() {}
                        return function(t) {
                            var n;
                            return e.prototype = t, n = new e, e.prototype = null, n
                        }
                    }(),
                    i = {},
                    a = i.lib = {},
                    c = a.Base = {
                        extend: function(e) {
                            var t = o(this);
                            return e && t.mixIn(e), t.hasOwnProperty("init") && this.init !== t.init || (t.init = function() {
                                t.$super.init.apply(this, arguments)
                            }), t.init.prototype = t, t.$super = this, t
                        },
                        create: function() {
                            var e = this.extend();
                            return e.init.apply(e, arguments), e
                        },
                        init: function() {},
                        mixIn: function(e) {
                            for (var t in e) e.hasOwnProperty(t) && (this[t] = e[t]);
                            e.hasOwnProperty("toString") && (this.toString = e.toString)
                        },
                        clone: function() {
                            return this.init.prototype.extend(this)
                        }
                    },
                    u = a.WordArray = c.extend({
                        init: function(e, n) {
                            e = this.words = e || [], this.sigBytes = n != t ? n : 4 * e.length
                        },
                        toString: function(e) {
                            return (e || l).stringify(this)
                        },
                        concat: function(e) {
                            var t = this.words,
                                n = e.words,
                                r = this.sigBytes,
                                o = e.sigBytes;
                            if (this.clamp(), r % 4)
                                for (var i = 0; i < o; i++) {
                                    var a = n[i >>> 2] >>> 24 - i % 4 * 8 & 255;
                                    t[r + i >>> 2] |= a << 24 - (r + i) % 4 * 8
                                } else
                                    for (var c = 0; c < o; c += 4) t[r + c >>> 2] = n[c >>> 2];
                            return this.sigBytes += o, this
                        },
                        clamp: function() {
                            var t = this.words,
                                n = this.sigBytes;
                            t[n >>> 2] &= 4294967295 << 32 - n % 4 * 8, t.length = e.ceil(n / 4)
                        },
                        clone: function() {
                            var e = c.clone.call(this);
                            return e.words = this.words.slice(0), e
                        },
                        random: function(e) {
                            for (var t = [], n = 0; n < e; n += 4) t.push(r());
                            return new u.init(t, e)
                        }
                    }),
                    s = i.enc = {},
                    l = s.Hex = {
                        stringify: function(e) {
                            for (var t = e.words, n = e.sigBytes, r = [], o = 0; o < n; o++) {
                                var i = t[o >>> 2] >>> 24 - o % 4 * 8 & 255;
                                r.push((i >>> 4).toString(16)), r.push((15 & i).toString(16))
                            }
                            return r.join("")
                        },
                        parse: function(e) {
                            for (var t = e.length, n = [], r = 0; r < t; r += 2) n[r >>> 3] |= parseInt(e.substr(r, 2), 16) << 24 - r % 8 * 4;
                            return new u.init(n, t / 2)
                        }
                    },
                    p = s.Latin1 = {
                        stringify: function(e) {
                            for (var t = e.words, n = e.sigBytes, r = [], o = 0; o < n; o++) {
                                var i = t[o >>> 2] >>> 24 - o % 4 * 8 & 255;
                                r.push(String.fromCharCode(i))
                            }
                            return r.join("")
                        },
                        parse: function(e) {
                            for (var t = e.length, n = [], r = 0; r < t; r++) n[r >>> 2] |= (255 & e.charCodeAt(r)) << 24 - r % 4 * 8;
                            return new u.init(n, t)
                        }
                    },
                    f = s.Utf8 = {
                        stringify: function(e) {
                            try {
                                return decodeURIComponent(escape(p.stringify(e)))
                            } catch (e) {
                                throw new Error("Malformed UTF-8 data")
                            }
                        },
                        parse: function(e) {
                            return p.parse(unescape(encodeURIComponent(e)))
                        }
                    },
                    d = a.BufferedBlockAlgorithm = c.extend({
                        reset: function() {
                            this._data = new u.init, this._nDataBytes = 0
                        },
                        _append: function(e) {
                            "string" == typeof e && (e = f.parse(e)), this._data.concat(e), this._nDataBytes += e.sigBytes
                        },
                        _process: function(t) {
                            var n, r = this._data,
                                o = r.words,
                                i = r.sigBytes,
                                a = this.blockSize,
                                c = i / (4 * a),
                                s = (c = t ? e.ceil(c) : e.max((0 | c) - this._minBufferSize, 0)) * a,
                                l = e.min(4 * s, i);
                            if (s) {
                                for (var p = 0; p < s; p += a) this._doProcessBlock(o, p);
                                n = o.splice(0, s), r.sigBytes -= l
                            }
                            return new u.init(n, l)
                        },
                        clone: function() {
                            var e = c.clone.call(this);
                            return e._data = this._data.clone(), e
                        },
                        _minBufferSize: 0
                    });
                a.Hasher = d.extend({
                    cfg: c.extend(),
                    init: function(e) {
                        this.cfg = this.cfg.extend(e), this.reset()
                    },
                    reset: function() {
                        d.reset.call(this), this._doReset()
                    },
                    update: function(e) {
                        return this._append(e), this._process(), this
                    },
                    finalize: function(e) {
                        return e && this._append(e), this._doFinalize()
                    },
                    blockSize: 16,
                    _createHelper: function(e) {
                        return function(t, n) {
                            return new e.init(n).finalize(t)
                        }
                    },
                    _createHmacHelper: function(e) {
                        return function(t, n) {
                            return new h.HMAC.init(e, n).finalize(t)
                        }
                    }
                });
                var h = i.algo = {};
                return i
            }(Math), n)
        }(Ln)), Ln.exports
    }! function(e, t) {
        var n;
        e.exports = (n = Mn(), function(e) {
            var t = n,
                r = t.lib,
                o = r.WordArray,
                i = r.Hasher,
                a = t.algo,
                c = [];
            ! function() {
                for (var t = 0; t < 64; t++) c[t] = 4294967296 * e.abs(e.sin(t + 1)) | 0
            }();
            var u = a.MD5 = i.extend({
                _doReset: function() {
                    this._hash = new o.init([1732584193, 4023233417, 2562383102, 271733878])
                },
                _doProcessBlock: function(e, t) {
                    for (var n = 0; n < 16; n++) {
                        var r = t + n,
                            o = e[r];
                        e[r] = 16711935 & (o << 8 | o >>> 24) | 4278255360 & (o << 24 | o >>> 8)
                    }
                    var i = this._hash.words,
                        a = e[t + 0],
                        u = e[t + 1],
                        d = e[t + 2],
                        h = e[t + 3],
                        v = e[t + 4],
                        m = e[t + 5],
                        y = e[t + 6],
                        g = e[t + 7],
                        b = e[t + 8],
                        _ = e[t + 9],
                        w = e[t + 10],
                        k = e[t + 11],
                        S = e[t + 12],
                        j = e[t + 13],
                        O = e[t + 14],
                        x = e[t + 15],
                        T = i[0],
                        A = i[1],
                        C = i[2],
                        P = i[3];
                    T = s(T, A, C, P, a, 7, c[0]), P = s(P, T, A, C, u, 12, c[1]), C = s(C, P, T, A, d, 17, c[2]), A = s(A, C, P, T, h, 22, c[3]), T = s(T, A, C, P, v, 7, c[4]), P = s(P, T, A, C, m, 12, c[5]), C = s(C, P, T, A, y, 17, c[6]), A = s(A, C, P, T, g, 22, c[7]), T = s(T, A, C, P, b, 7, c[8]), P = s(P, T, A, C, _, 12, c[9]), C = s(C, P, T, A, w, 17, c[10]), A = s(A, C, P, T, k, 22, c[11]), T = s(T, A, C, P, S, 7, c[12]), P = s(P, T, A, C, j, 12, c[13]), C = s(C, P, T, A, O, 17, c[14]), T = l(T, A = s(A, C, P, T, x, 22, c[15]), C, P, u, 5, c[16]), P = l(P, T, A, C, y, 9, c[17]), C = l(C, P, T, A, k, 14, c[18]), A = l(A, C, P, T, a, 20, c[19]), T = l(T, A, C, P, m, 5, c[20]), P = l(P, T, A, C, w, 9, c[21]), C = l(C, P, T, A, x, 14, c[22]), A = l(A, C, P, T, v, 20, c[23]), T = l(T, A, C, P, _, 5, c[24]), P = l(P, T, A, C, O, 9, c[25]), C = l(C, P, T, A, h, 14, c[26]), A = l(A, C, P, T, b, 20, c[27]), T = l(T, A, C, P, j, 5, c[28]), P = l(P, T, A, C, d, 9, c[29]), C = l(C, P, T, A, g, 14, c[30]), T = p(T, A = l(A, C, P, T, S, 20, c[31]), C, P, m, 4, c[32]), P = p(P, T, A, C, b, 11, c[33]), C = p(C, P, T, A, k, 16, c[34]), A = p(A, C, P, T, O, 23, c[35]), T = p(T, A, C, P, u, 4, c[36]), P = p(P, T, A, C, v, 11, c[37]), C = p(C, P, T, A, g, 16, c[38]), A = p(A, C, P, T, w, 23, c[39]), T = p(T, A, C, P, j, 4, c[40]), P = p(P, T, A, C, a, 11, c[41]), C = p(C, P, T, A, h, 16, c[42]), A = p(A, C, P, T, y, 23, c[43]), T = p(T, A, C, P, _, 4, c[44]), P = p(P, T, A, C, S, 11, c[45]), C = p(C, P, T, A, x, 16, c[46]), T = f(T, A = p(A, C, P, T, d, 23, c[47]), C, P, a, 6, c[48]), P = f(P, T, A, C, g, 10, c[49]), C = f(C, P, T, A, O, 15, c[50]), A = f(A, C, P, T, m, 21, c[51]), T = f(T, A, C, P, S, 6, c[52]), P = f(P, T, A, C, h, 10, c[53]), C = f(C, P, T, A, w, 15, c[54]), A = f(A, C, P, T, u, 21, c[55]), T = f(T, A, C, P, b, 6, c[56]), P = f(P, T, A, C, x, 10, c[57]), C = f(C, P, T, A, y, 15, c[58]), A = f(A, C, P, T, j, 21, c[59]), T = f(T, A, C, P, v, 6, c[60]), P = f(P, T, A, C, k, 10, c[61]), C = f(C, P, T, A, d, 15, c[62]), A = f(A, C, P, T, _, 21, c[63]), i[0] = i[0] + T | 0, i[1] = i[1] + A | 0, i[2] = i[2] + C | 0, i[3] = i[3] + P | 0
                },
                _doFinalize: function() {
                    var t = this._data,
                        n = t.words,
                        r = 8 * this._nDataBytes,
                        o = 8 * t.sigBytes;
                    n[o >>> 5] |= 128 << 24 - o % 32;
                    var i = e.floor(r / 4294967296),
                        a = r;
                    n[15 + (o + 64 >>> 9 << 4)] = 16711935 & (i << 8 | i >>> 24) | 4278255360 & (i << 24 | i >>> 8), n[14 + (o + 64 >>> 9 << 4)] = 16711935 & (a << 8 | a >>> 24) | 4278255360 & (a << 24 | a >>> 8), t.sigBytes = 4 * (n.length + 1), this._process();
                    for (var c = this._hash, u = c.words, s = 0; s < 4; s++) {
                        var l = u[s];
                        u[s] = 16711935 & (l << 8 | l >>> 24) | 4278255360 & (l << 24 | l >>> 8)
                    }
                    return c
                },
                clone: function() {
                    var e = i.clone.call(this);
                    return e._hash = this._hash.clone(), e
                }
            });

            function s(e, t, n, r, o, i, a) {
                var c = e + (t & n | ~t & r) + o + a;
                return (c << i | c >>> 32 - i) + t
            }

            function l(e, t, n, r, o, i, a) {
                var c = e + (t & r | n & ~r) + o + a;
                return (c << i | c >>> 32 - i) + t
            }

            function p(e, t, n, r, o, i, a) {
                var c = e + (t ^ n ^ r) + o + a;
                return (c << i | c >>> 32 - i) + t
            }

            function f(e, t, n, r, o, i, a) {
                var c = e + (n ^ (t | ~r)) + o + a;
                return (c << i | c >>> 32 - i) + t
            }
            t.MD5 = i._createHelper(u), t.HmacMD5 = i._createHmacHelper(u)
        }(Math), n.MD5)
    }(Rn);
    var Kn, Nn = Rn.exports,
        Hn = Mt(Nn),
        Gn = {
            exports: {}
        },
        $n = {
            exports: {}
        };

    function Jn() {
        return Kn || (Kn = 1, function(e, t) {
            var n;
            e.exports = (n = Mn(), function() {
                var e = n,
                    t = e.lib.WordArray;

                function r(e, n, r) {
                    for (var o = [], i = 0, a = 0; a < n; a++)
                        if (a % 4) {
                            var c = r[e.charCodeAt(a - 1)] << a % 4 * 2 | r[e.charCodeAt(a)] >>> 6 - a % 4 * 2;
                            o[i >>> 2] |= c << 24 - i % 4 * 8, i++
                        }
                    return t.create(o, i)
                }
                e.enc.Base64 = {
                    stringify: function(e) {
                        var t = e.words,
                            n = e.sigBytes,
                            r = this._map;
                        e.clamp();
                        for (var o = [], i = 0; i < n; i += 3)
                            for (var a = (t[i >>> 2] >>> 24 - i % 4 * 8 & 255) << 16 | (t[i + 1 >>> 2] >>> 24 - (i + 1) % 4 * 8 & 255) << 8 | t[i + 2 >>> 2] >>> 24 - (i + 2) % 4 * 8 & 255, c = 0; c < 4 && i + .75 * c < n; c++) o.push(r.charAt(a >>> 6 * (3 - c) & 63));
                        var u = r.charAt(64);
                        if (u)
                            for (; o.length % 4;) o.push(u);
                        return o.join("")
                    },
                    parse: function(e) {
                        var t = e.length,
                            n = this._map,
                            o = this._reverseMap;
                        if (!o) {
                            o = this._reverseMap = [];
                            for (var i = 0; i < n.length; i++) o[n.charCodeAt(i)] = i
                        }
                        var a = n.charAt(64);
                        if (a) {
                            var c = e.indexOf(a); - 1 !== c && (t = c)
                        }
                        return r(e, t, o)
                    },
                    _map: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/="
                }
            }(), n.enc.Base64)
        }($n)), $n.exports
    }
    var Xn, Wn = {
            exports: {}
        },
        Vn = {
            exports: {}
        };

    function Yn() {
        return Xn || (Xn = 1, function(e, t) {
            var n, r, o, i, a, c, u, s;
            e.exports = (s = Mn(), r = (n = s).lib, o = r.WordArray, i = r.Hasher, a = n.algo, c = [], u = a.SHA1 = i.extend({
                _doReset: function() {
                    this._hash = new o.init([1732584193, 4023233417, 2562383102, 271733878, 3285377520])
                },
                _doProcessBlock: function(e, t) {
                    for (var n = this._hash.words, r = n[0], o = n[1], i = n[2], a = n[3], u = n[4], s = 0; s < 80; s++) {
                        if (s < 16) c[s] = 0 | e[t + s];
                        else {
                            var l = c[s - 3] ^ c[s - 8] ^ c[s - 14] ^ c[s - 16];
                            c[s] = l << 1 | l >>> 31
                        }
                        var p = (r << 5 | r >>> 27) + u + c[s];
                        p += s < 20 ? 1518500249 + (o & i | ~o & a) : s < 40 ? 1859775393 + (o ^ i ^ a) : s < 60 ? (o & i | o & a | i & a) - 1894007588 : (o ^ i ^ a) - 899497514, u = a, a = i, i = o << 30 | o >>> 2, o = r, r = p
                    }
                    n[0] = n[0] + r | 0, n[1] = n[1] + o | 0, n[2] = n[2] + i | 0, n[3] = n[3] + a | 0, n[4] = n[4] + u | 0
                },
                _doFinalize: function() {
                    var e = this._data,
                        t = e.words,
                        n = 8 * this._nDataBytes,
                        r = 8 * e.sigBytes;
                    return t[r >>> 5] |= 128 << 24 - r % 32, t[14 + (r + 64 >>> 9 << 4)] = Math.floor(n / 4294967296), t[15 + (r + 64 >>> 9 << 4)] = n, e.sigBytes = 4 * t.length, this._process(), this._hash
                },
                clone: function() {
                    var e = i.clone.call(this);
                    return e._hash = this._hash.clone(), e
                }
            }), n.SHA1 = i._createHelper(u), n.HmacSHA1 = i._createHmacHelper(u), s.SHA1)
        }(Vn)), Vn.exports
    }
    var Zn, Qn, er = {
        exports: {}
    };

    function tr() {
        return Qn || (Qn = 1, function(e, t) {
            var n;
            e.exports = (n = Mn(), Yn(), Zn || (Zn = 1, function(e, t) {
                var n;
                e.exports = (n = Mn(), void
                    function() {
                        var e = n,
                            t = e.lib.Base,
                            r = e.enc.Utf8;
                        e.algo.HMAC = t.extend({
                            init: function(e, t) {
                                e = this._hasher = new e.init, "string" == typeof t && (t = r.parse(t));
                                var n = e.blockSize,
                                    o = 4 * n;
                                t.sigBytes > o && (t = e.finalize(t)), t.clamp();
                                for (var i = this._oKey = t.clone(), a = this._iKey = t.clone(), c = i.words, u = a.words, s = 0; s < n; s++) c[s] ^= 1549556828, u[s] ^= 909522486;
                                i.sigBytes = a.sigBytes = o, this.reset()
                            },
                            reset: function() {
                                var e = this._hasher;
                                e.reset(), e.update(this._iKey)
                            },
                            update: function(e) {
                                return this._hasher.update(e), this
                            },
                            finalize: function(e) {
                                var t = this._hasher,
                                    n = t.finalize(e);
                                return t.reset(), t.finalize(this._oKey.clone().concat(n))
                            }
                        })
                    }())
            }(er)), er.exports, function() {
                var e = n,
                    t = e.lib,
                    r = t.Base,
                    o = t.WordArray,
                    i = e.algo,
                    a = i.MD5,
                    c = i.EvpKDF = r.extend({
                        cfg: r.extend({
                            keySize: 4,
                            hasher: a,
                            iterations: 1
                        }),
                        init: function(e) {
                            this.cfg = this.cfg.extend(e)
                        },
                        compute: function(e, t) {
                            for (var n, r = this.cfg, i = r.hasher.create(), a = o.create(), c = a.words, u = r.keySize, s = r.iterations; c.length < u;) {
                                n && i.update(n), n = i.update(e).finalize(t), i.reset();
                                for (var l = 1; l < s; l++) n = i.finalize(n), i.reset();
                                a.concat(n)
                            }
                            return a.sigBytes = 4 * u, a
                        }
                    });
                e.EvpKDF = function(e, t, n) {
                    return c.create(n).compute(e, t)
                }
            }(), n.EvpKDF)
        }(Wn)), Wn.exports
    }
    var nr, rr = {
        exports: {}
    };
    ! function(e, t) {
        var n;
        e.exports = (n = Mn(), Jn(), tr(), nr || (nr = 1, function(e, t) {
            var n;
            e.exports = (n = Mn(), tr(), void(n.lib.Cipher || function(e) {
                var t = n,
                    r = t.lib,
                    o = r.Base,
                    i = r.WordArray,
                    a = r.BufferedBlockAlgorithm,
                    c = t.enc;
                c.Utf8;
                var u = c.Base64,
                    s = t.algo.EvpKDF,
                    l = r.Cipher = a.extend({
                        cfg: o.extend(),
                        createEncryptor: function(e, t) {
                            return this.create(this._ENC_XFORM_MODE, e, t)
                        },
                        createDecryptor: function(e, t) {
                            return this.create(this._DEC_XFORM_MODE, e, t)
                        },
                        init: function(e, t, n) {
                            this.cfg = this.cfg.extend(n), this._xformMode = e, this._key = t, this.reset()
                        },
                        reset: function() {
                            a.reset.call(this), this._doReset()
                        },
                        process: function(e) {
                            return this._append(e), this._process()
                        },
                        finalize: function(e) {
                            return e && this._append(e), this._doFinalize()
                        },
                        keySize: 4,
                        ivSize: 4,
                        _ENC_XFORM_MODE: 1,
                        _DEC_XFORM_MODE: 2,
                        _createHelper: function() {
                            function e(e) {
                                return "string" == typeof e ? b : y
                            }
                            return function(t) {
                                return {
                                    encrypt: function(n, r, o) {
                                        return e(r).encrypt(t, n, r, o)
                                    },
                                    decrypt: function(n, r, o) {
                                        return e(r).decrypt(t, n, r, o)
                                    }
                                }
                            }
                        }()
                    });
                r.StreamCipher = l.extend({
                    _doFinalize: function() {
                        return this._process(!0)
                    },
                    blockSize: 1
                });
                var p = t.mode = {},
                    f = r.BlockCipherMode = o.extend({
                        createEncryptor: function(e, t) {
                            return this.Encryptor.create(e, t)
                        },
                        createDecryptor: function(e, t) {
                            return this.Decryptor.create(e, t)
                        },
                        init: function(e, t) {
                            this._cipher = e, this._iv = t
                        }
                    }),
                    d = p.CBC = function() {
                        var t = f.extend();

                        function n(t, n, r) {
                            var o, i = this._iv;
                            i ? (o = i, this._iv = e) : o = this._prevBlock;
                            for (var a = 0; a < r; a++) t[n + a] ^= o[a]
                        }
                        return t.Encryptor = t.extend({
                            processBlock: function(e, t) {
                                var r = this._cipher,
                                    o = r.blockSize;
                                n.call(this, e, t, o), r.encryptBlock(e, t), this._prevBlock = e.slice(t, t + o)
                            }
                        }), t.Decryptor = t.extend({
                            processBlock: function(e, t) {
                                var r = this._cipher,
                                    o = r.blockSize,
                                    i = e.slice(t, t + o);
                                r.decryptBlock(e, t), n.call(this, e, t, o), this._prevBlock = i
                            }
                        }), t
                    }(),
                    h = (t.pad = {}).Pkcs7 = {
                        pad: function(e, t) {
                            for (var n = 4 * t, r = n - e.sigBytes % n, o = r << 24 | r << 16 | r << 8 | r, a = [], c = 0; c < r; c += 4) a.push(o);
                            var u = i.create(a, r);
                            e.concat(u)
                        },
                        unpad: function(e) {
                            var t = 255 & e.words[e.sigBytes - 1 >>> 2];
                            e.sigBytes -= t
                        }
                    };
                r.BlockCipher = l.extend({
                    cfg: l.cfg.extend({
                        mode: d,
                        padding: h
                    }),
                    reset: function() {
                        var e;
                        l.reset.call(this);
                        var t = this.cfg,
                            n = t.iv,
                            r = t.mode;
                        this._xformMode == this._ENC_XFORM_MODE ? e = r.createEncryptor : (e = r.createDecryptor, this._minBufferSize = 1), this._mode && this._mode.__creator == e ? this._mode.init(this, n && n.words) : (this._mode = e.call(r, this, n && n.words), this._mode.__creator = e)
                    },
                    _doProcessBlock: function(e, t) {
                        this._mode.processBlock(e, t)
                    },
                    _doFinalize: function() {
                        var e, t = this.cfg.padding;
                        return this._xformMode == this._ENC_XFORM_MODE ? (t.pad(this._data, this.blockSize), e = this._process(!0)) : (e = this._process(!0), t.unpad(e)), e
                    },
                    blockSize: 4
                });
                var v = r.CipherParams = o.extend({
                        init: function(e) {
                            this.mixIn(e)
                        },
                        toString: function(e) {
                            return (e || this.formatter).stringify(this)
                        }
                    }),
                    m = (t.format = {}).OpenSSL = {
                        stringify: function(e) {
                            var t = e.ciphertext,
                                n = e.salt;
                            return (n ? i.create([1398893684, 1701076831]).concat(n).concat(t) : t).toString(u)
                        },
                        parse: function(e) {
                            var t, n = u.parse(e),
                                r = n.words;
                            return 1398893684 == r[0] && 1701076831 == r[1] && (t = i.create(r.slice(2, 4)), r.splice(0, 4), n.sigBytes -= 16), v.create({
                                ciphertext: n,
                                salt: t
                            })
                        }
                    },
                    y = r.SerializableCipher = o.extend({
                        cfg: o.extend({
                            format: m
                        }),
                        encrypt: function(e, t, n, r) {
                            r = this.cfg.extend(r);
                            var o = e.createEncryptor(n, r),
                                i = o.finalize(t),
                                a = o.cfg;
                            return v.create({
                                ciphertext: i,
                                key: n,
                                iv: a.iv,
                                algorithm: e,
                                mode: a.mode,
                                padding: a.padding,
                                blockSize: e.blockSize,
                                formatter: r.format
                            })
                        },
                        decrypt: function(e, t, n, r) {
                            return r = this.cfg.extend(r), t = this._parse(t, r.format), e.createDecryptor(n, r).finalize(t.ciphertext)
                        },
                        _parse: function(e, t) {
                            return "string" == typeof e ? t.parse(e, this) : e
                        }
                    }),
                    g = (t.kdf = {}).OpenSSL = {
                        execute: function(e, t, n, r) {
                            r || (r = i.random(8));
                            var o = s.create({
                                    keySize: t + n
                                }).compute(e, r),
                                a = i.create(o.words.slice(t), 4 * n);
                            return o.sigBytes = 4 * t, v.create({
                                key: o,
                                iv: a,
                                salt: r
                            })
                        }
                    },
                    b = r.PasswordBasedCipher = y.extend({
                        cfg: y.cfg.extend({
                            kdf: g
                        }),
                        encrypt: function(e, t, n, r) {
                            var o = (r = this.cfg.extend(r)).kdf.execute(n, e.keySize, e.ivSize);
                            r.iv = o.iv;
                            var i = y.encrypt.call(this, e, t, o.key, r);
                            return i.mixIn(o), i
                        },
                        decrypt: function(e, t, n, r) {
                            r = this.cfg.extend(r), t = this._parse(t, r.format);
                            var o = r.kdf.execute(n, e.keySize, e.ivSize, t.salt);
                            return r.iv = o.iv, y.decrypt.call(this, e, t, o.key, r)
                        }
                    })
            }()))
        }(rr)), function() {
            var e = n,
                t = e.lib.BlockCipher,
                r = e.algo,
                o = [],
                i = [],
                a = [],
                c = [],
                u = [],
                s = [],
                l = [],
                p = [],
                f = [],
                d = [];
            ! function() {
                for (var e = [], t = 0; t < 256; t++) e[t] = t < 128 ? t << 1 : t << 1 ^ 283;
                var n = 0,
                    r = 0;
                for (t = 0; t < 256; t++) {
                    var h = r ^ r << 1 ^ r << 2 ^ r << 3 ^ r << 4;
                    h = h >>> 8 ^ 255 & h ^ 99, o[n] = h, i[h] = n;
                    var v = e[n],
                        m = e[v],
                        y = e[m],
                        g = 257 * e[h] ^ 16843008 * h;
                    a[n] = g << 24 | g >>> 8, c[n] = g << 16 | g >>> 16, u[n] = g << 8 | g >>> 24, s[n] = g, g = 16843009 * y ^ 65537 * m ^ 257 * v ^ 16843008 * n, l[h] = g << 24 | g >>> 8, p[h] = g << 16 | g >>> 16, f[h] = g << 8 | g >>> 24, d[h] = g, n ? (n = v ^ e[e[e[y ^ v]]], r ^= e[e[r]]) : n = r = 1
                }
            }();
            var h = [0, 1, 2, 4, 8, 16, 32, 64, 128, 27, 54],
                v = r.AES = t.extend({
                    _doReset: function() {
                        if (!this._nRounds || this._keyPriorReset !== this._key) {
                            for (var e = this._keyPriorReset = this._key, t = e.words, n = e.sigBytes / 4, r = 4 * ((this._nRounds = n + 6) + 1), i = this._keySchedule = [], a = 0; a < r; a++) a < n ? i[a] = t[a] : (s = i[a - 1], a % n ? n > 6 && a % n == 4 && (s = o[s >>> 24] << 24 | o[s >>> 16 & 255] << 16 | o[s >>> 8 & 255] << 8 | o[255 & s]) : (s = o[(s = s << 8 | s >>> 24) >>> 24] << 24 | o[s >>> 16 & 255] << 16 | o[s >>> 8 & 255] << 8 | o[255 & s], s ^= h[a / n | 0] << 24), i[a] = i[a - n] ^ s);
                            for (var c = this._invKeySchedule = [], u = 0; u < r; u++) {
                                if (a = r - u, u % 4) var s = i[a];
                                else s = i[a - 4];
                                c[u] = u < 4 || a <= 4 ? s : l[o[s >>> 24]] ^ p[o[s >>> 16 & 255]] ^ f[o[s >>> 8 & 255]] ^ d[o[255 & s]]
                            }
                        }
                    },
                    encryptBlock: function(e, t) {
                        this._doCryptBlock(e, t, this._keySchedule, a, c, u, s, o)
                    },
                    decryptBlock: function(e, t) {
                        var n = e[t + 1];
                        e[t + 1] = e[t + 3], e[t + 3] = n, this._doCryptBlock(e, t, this._invKeySchedule, l, p, f, d, i), n = e[t + 1], e[t + 1] = e[t + 3], e[t + 3] = n
                    },
                    _doCryptBlock: function(e, t, n, r, o, i, a, c) {
                        for (var u = this._nRounds, s = e[t] ^ n[0], l = e[t + 1] ^ n[1], p = e[t + 2] ^ n[2], f = e[t + 3] ^ n[3], d = 4, h = 1; h < u; h++) {
                            var v = r[s >>> 24] ^ o[l >>> 16 & 255] ^ i[p >>> 8 & 255] ^ a[255 & f] ^ n[d++],
                                m = r[l >>> 24] ^ o[p >>> 16 & 255] ^ i[f >>> 8 & 255] ^ a[255 & s] ^ n[d++],
                                y = r[p >>> 24] ^ o[f >>> 16 & 255] ^ i[s >>> 8 & 255] ^ a[255 & l] ^ n[d++],
                                g = r[f >>> 24] ^ o[s >>> 16 & 255] ^ i[l >>> 8 & 255] ^ a[255 & p] ^ n[d++];
                            s = v, l = m, p = y, f = g
                        }
                        v = (c[s >>> 24] << 24 | c[l >>> 16 & 255] << 16 | c[p >>> 8 & 255] << 8 | c[255 & f]) ^ n[d++], m = (c[l >>> 24] << 24 | c[p >>> 16 & 255] << 16 | c[f >>> 8 & 255] << 8 | c[255 & s]) ^ n[d++], y = (c[p >>> 24] << 24 | c[f >>> 16 & 255] << 16 | c[s >>> 8 & 255] << 8 | c[255 & l]) ^ n[d++], g = (c[f >>> 24] << 24 | c[s >>> 16 & 255] << 16 | c[l >>> 8 & 255] << 8 | c[255 & p]) ^ n[d++], e[t] = v, e[t + 1] = m, e[t + 2] = y, e[t + 3] = g
                    },
                    keySize: 8
                });
            e.AES = t._createHelper(v)
        }(), n.AES)
    }(Gn);
    var or = Mt(Gn.exports),
        ir = {
            exports: {}
        };
    ! function(e, t) {
        e.exports = Mn().enc.Utf8
    }(ir);
    var ar = Mt(ir.exports);

    function cr() {
        return an()
    }
    var ur = null;

    function sr() {
        var e, t, n, r;
        return null === ur && (e = fr(), t = window.sessionStorage.getItem(e), ur = t ? (n = t, r = cr(), or.decrypt(n, r).toString(ar)) : null), ur
    }

    function lr(e) {
        var t;
        ur = e, null === e || !1 === (!(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1]) ? (t = fr(), window.sessionStorage.removeItem(t)) : function(e, t) {
            var n = (r = t, o = cr(), or.encrypt(r, o).toString());
            var r, o;
            window.sessionStorage.setItem(e, n)
        }(fr(), e)
    }
    var pr = {};

    function fr() {
        var e;
        return pr.accessTokenKey || (pr.accessTokenKey = "kakao_" + (e = "kat" + cr(), Hn(e).toString())), pr.accessTokenKey
    }
    var dr = Object.freeze({
        __proto__: null,
        getAccessToken: sr,
        getAppKey: cr,
        setAccessToken: lr
    });

    function hr() {
        return "Bearer ".concat(sr())
    }

    function vr() {
        return "KakaoAK ".concat(cr())
    }
    var mr = {
            permission: wt(["A", "F", "M"]),
            enable_share: ot,
            android_exec_param: rt,
            ios_exec_param: rt,
            android_market_param: rt,
            ios_market_param: rt
        },
        yr = {
            secure_resource: ot
        };

    function gr(e) {
        if (!rt(e)) return !1;
        if (0 === e.length || e.length > 2048) throw new un("content length should be between 0 and 2048");
        return !0
    }
    var br = {
            "/v1/user/signup": {
                method: "POST",
                data: {
                    optional: {
                        properties: h
                    }
                }
            },
            "/v1/user/unlink": {
                method: "POST",
                data: {}
            },
            "/v2/user/me": {
                method: "GET",
                data: {
                    optional: jt({
                        property_keys: m
                    }, yr)
                }
            },
            "/v1/user/logout": {
                method: "POST",
                data: {}
            },
            "/v1/user/update_profile": {
                method: "POST",
                data: {
                    required: {
                        properties: h
                    }
                }
            },
            "/v1/user/access_token_info": {
                method: "GET",
                data: {}
            },
            "/v2/user/scopes": {
                method: "GET",
                data: {
                    optional: {
                        scopes: m
                    }
                }
            },
            "/v2/user/revoke/scopes": {
                method: "POST",
                data: {
                    required: {
                        scopes: m
                    }
                }
            },
            "/v2/user/service_terms": {
                method: "GET",
                data: {
                    optional: {
                        result: rt,
                        tags: rt
                    }
                }
            },
            "/v2/user/revoke/service_terms": {
                method: "POST",
                data: {
                    required: {
                        tags: rt
                    }
                }
            },
            "/v1/user/service/terms": {
                method: "GET",
                data: {
                    optional: {
                        extra: rt
                    }
                }
            },
            "/v1/user/shipping_address": {
                method: "GET",
                data: {
                    optional: {
                        address_id: at,
                        from_updated_at: at,
                        page_size: at
                    }
                }
            },
            "/v1/api/talk/profile": {
                method: "GET",
                data: {}
            },
            "/v1/api/talk/friends": {
                method: "GET",
                data: {
                    optional: {
                        offset: at,
                        limit: at,
                        order: rt,
                        friend_order: rt
                    }
                }
            },
            "/v1/friends": {
                method: "GET",
                data: {
                    optional: {
                        offset: at,
                        limit: at,
                        order: rt,
                        friend_order: rt
                    }
                }
            },
            "/v2/api/talk/memo/send": {
                method: "POST",
                data: {
                    required: {
                        template_id: at
                    },
                    optional: {
                        template_args: h
                    }
                }
            },
            "/v2/api/talk/memo/scrap/send": {
                method: "POST",
                data: {
                    required: {
                        request_url: rt
                    },
                    optional: {
                        template_id: at,
                        template_args: h
                    }
                }
            },
            "/v2/api/talk/memo/default/send": {
                method: "POST",
                data: {
                    required: {
                        template_object: h
                    }
                }
            },
            "/v1/api/talk/friends/message/send": {
                method: "POST",
                data: {
                    required: {
                        template_id: at,
                        receiver_uuids: m,
                        receiver_id_type: rt
                    },
                    optional: {
                        template_args: h
                    },
                    defaults: {
                        receiver_id_type: "uuid"
                    }
                }
            },
            "/v1/api/talk/friends/message/scrap/send": {
                method: "POST",
                data: {
                    required: {
                        request_url: rt,
                        receiver_uuids: m,
                        receiver_id_type: rt
                    },
                    optional: {
                        template_id: at,
                        template_args: h
                    },
                    defaults: {
                        receiver_id_type: "uuid"
                    }
                }
            },
            "/v1/api/talk/friends/message/default/send": {
                method: "POST",
                data: {
                    required: {
                        template_object: h,
                        receiver_uuids: m,
                        receiver_id_type: rt
                    },
                    defaults: {
                        receiver_id_type: "uuid"
                    }
                }
            },
            "/v2/api/kakaolink/talk/template/validate": {
                method: "GET",
                data: {
                    required: {
                        link_ver: rt,
                        template_id: at
                    },
                    optional: {
                        template_args: h
                    }
                },
                authType: vr
            },
            "/v2/api/kakaolink/talk/template/scrap": {
                method: "GET",
                data: {
                    required: {
                        link_ver: rt,
                        request_url: rt
                    },
                    optional: {
                        template_id: at,
                        template_args: h
                    }
                },
                authType: vr
            },
            "/v2/api/kakaolink/talk/template/default": {
                method: "GET",
                data: {
                    required: {
                        link_ver: rt,
                        template_object: h
                    }
                },
                authType: vr
            },
            "/v2/api/talk/message/image/upload": {
                method: "POST",
                data: {
                    required: {
                        file: h
                    }
                },
                authType: vr
            },
            "/v2/api/talk/message/image/delete": {
                method: "DELETE",
                data: {
                    required: {
                        image_url: rt
                    }
                },
                authType: vr
            },
            "/v2/api/talk/message/image/scrap": {
                method: "POST",
                data: {
                    required: {
                        image_url: rt
                    }
                },
                authType: vr
            },
            "/v1/api/story/profile": {
                method: "GET",
                data: {
                    optional: yr
                }
            },
            "/v1/api/story/isstoryuser": {
                method: "GET",
                data: {}
            },
            "/v1/api/story/mystory": {
                method: "GET",
                data: {
                    required: {
                        id: rt
                    }
                }
            },
            "/v1/api/story/mystories": {
                method: "GET",
                data: {
                    optional: {
                        last_id: rt
                    }
                }
            },
            "/v1/api/story/linkinfo": {
                method: "GET",
                data: {
                    required: {
                        url: rt
                    }
                }
            },
            "/v1/api/story/post/note": {
                method: "POST",
                data: {
                    required: {
                        content: gr
                    },
                    optional: mr
                }
            },
            "/v1/api/story/post/photo": {
                method: "POST",
                data: {
                    required: {
                        image_url_list: function(e) {
                            return !!m(e) && dt(e, (function(e) {
                                if (!rt(e)) return !1;
                                if (/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/.test(e)) throw new un("url in image_url_list should be a kage url that received from '/v1/api/story/upload/multi'.");
                                return !0
                            }))
                        }
                    },
                    optional: jt({
                        content: gr
                    }, mr)
                }
            },
            "/v1/api/story/post/link": {
                method: "POST",
                data: {
                    required: {
                        link_info: h
                    },
                    optional: jt({
                        content: gr
                    }, mr)
                }
            },
            "/v1/api/story/upload/multi": {
                method: "POST",
                data: {}
            },
            "/v1/api/story/delete/mystory": {
                method: "DELETE",
                data: {
                    required: {
                        id: rt
                    }
                }
            },
            "/v1/api/talk/channels": {
                method: "GET",
                data: {
                    optional: {
                        channel_public_ids: m
                    }
                }
            }
        },
        _r = {
            apiRules: br,
            request: {
                required: {
                    url: wt(vt(br))
                },
                optional: {
                    data: h,
                    files: function(e) {
                        return kt([m, pt])(e) && dt(e, kt([lt, st]))
                    },
                    file: lt
                },
                defaults: {
                    data: {}
                }
            }
        };

    function wr(e) {
        var t = e = pn(e, _r.request, "API.request"),
            n = t.url,
            r = t.data,
            o = _r.apiRules[n].data;
        e.data = pn(r, o, "API.request - ".concat(n));
        var i = function(e) {
            var t = _r.apiRules[e.url],
                n = t.method,
                r = t.authType,
                o = function(e) {
                    var t = e.url,
                        n = e.data,
                        r = e.files;
                    if (function(e) {
                            return "/v1/api/story/upload/multi" === e || "/v2/api/talk/message/image/upload" === e
                        }(t) || n.file) {
                        var o = r || n.file;
                        if (!o) throw new un("'files' parameter should be set for ".concat(t));
                        var i = new FormData;
                        return tt(o, (function(e) {
                            return i.append("file", e)
                        })), [null, i]
                    }
                    return ["application/x-www-form-urlencoded", _t(n)]
                }(e),
                i = Ft(o, 2),
                a = i[0],
                c = i[1],
                u = (f = rn.apiDomain + e.url, "POST" === n ? [f, c] : [c && c.length > 0 ? "".concat(f, "?").concat(c) : f, null]),
                s = Ft(u, 2),
                l = s[0],
                p = s[1];
            var f;
            return {
                url: l,
                method: n,
                headers: jt(jt({}, a && {
                    "Content-Type": a
                }), {}, {
                    KA: nn,
                    Authorization: (r || hr)(),
                    "Cache-Control": "no-cache, no-store, max-age=0, must-revalidate",
                    Pragma: "no-cache"
                }),
                data: p
            }
        }(e);
        return kn(i)
    }
    var kr = Object.freeze({
        __proto__: null,
        request: wr
    });
    var Sr = Object.freeze({
            __proto__: null,
            getStatusInfo: function() {
                return sr() ? wr({
                    url: "/v2/user/me"
                }).then((function(e) {
                    return {
                        status: "connected",
                        user: e
                    }
                })).catch((function() {
                    return {
                        status: "not_connected"
                    }
                })) : wn.Promise.reject({
                    status: "not_connected"
                })
            },
            logout: function() {
                return wr({
                    url: "/v1/user/logout"
                }).finally((function() {
                    lr(null), jn.dispatch("LOGOUT")
                }))
            }
        }),
        jr = function() {
            function e(t) {
                Ot(this, e), this.domain = t
            }
            return Tt(e, [{
                key: "createHiddenIframe",
                value: function(e, t) {
                    this.iframe && this.destroy(!0);
                    var n = document.createElement("iframe");
                    n.id = n.name = e, n.src = this.domain + t, n.setAttribute("style", "border:none; width:0; height:0; display:none; overflow:hidden;"), document.body.appendChild(n), this.iframe = n
                }
            }, {
                key: "retrieveMessage",
                value: function(e, t, n) {
                    var r = this;
                    return this.popup = gn(this.domain + e, t, n), new wn.Promise((function(e, t) {
                        r.callback = function(n) {
                            var o = n.data,
                                i = n.origin;
                            if (o && i === r.domain) try {
                                var a = JSON.parse(o);
                                a.code ? t(a) : e(a)
                            } catch (e) {
                                bt(window, "message", r.callback)
                            }
                        }, gt(window, "message", r.callback), r.interval = setInterval((function() {
                            return r.destroy()
                        }), 1e3)
                    }))
                }
            }, {
                key: "destroy",
                value: function() {
                    (arguments.length > 0 && void 0 !== arguments[0] && arguments[0] || this.popup && this.popup.closed) && (clearInterval(this.interval), bt(window, "message", this.callback), document.body.removeChild(this.iframe), this.iframe = null)
                }
            }]), e
        }();
    var Or = new jr(rn.appsDomain);

    function xr(e, t) {
        var n, r, o = fn(60),
            i = jt({
                app_key: an(),
                access_token: sr(),
                ka: nn,
                trans_id: o,
                mobile_view: e.forceMobileLayout,
                enable_back_button: e.enableBackButton
            }, e.addressId && {
                address_id: e.addressId
            });
        if (!e.returnUrl) return n = e.close, r = function e(t) {
            var r = t.data,
                o = t.origin;
            o !== rn.appsDomain && o !== rn.accountDomain || "closed" !== r || (n(), bt(window, "message", e))
        }, gt(window, "message", r), Or.createHiddenIframe(o, "/proxy?trans_id=".concat(o)), Or.retrieveMessage(t, i, "shipping_address");
        i.return_url = e.returnUrl, bn(rn.appsDomain + t, i)
    }
    var Tr = sn([Dn, dr, Sr, Object.freeze({
            __proto__: null,
            createShippingAddress: function(e) {
                return xr(e = pn(e, Tn.createShippingAddress, "Auth.createShippingAddress"), "/user/create/address")
            },
            selectShippingAddress: function(e) {
                return xr(e = pn(e, Tn.selectShippingAddress, "Auth.selectShippingAddress"), "/user/address")
            },
            updateShippingAddress: function(e) {
                return xr(e = pn(e, Tn.updateShippingAddress, "Auth.updateShippingAddress"), "/user/edit/address")
            }
        })]),
        Ar = sn([kr]);

    function Cr(e) {
        return e.charAt(0).toUpperCase() + e.slice(1)
    }

    function Pr(e) {
        return e.replace(/[A-Z]/g, (function(e) {
            return "_".concat(e.toLowerCase())
        }))
    }

    function Ir(e) {
        return h(e) ? JSON.stringify(e) : e
    }

    function Br(e, t) {
        return wr({
            url: e,
            data: t
        })
    }

    function Er(e, t, n) {
        return pn(e, t, 'parameter "'.concat(n, '" in Share')), !0
    }

    function zr(e) {
        return vt(e).reduce((function(t, n) {
            return t[Pr(n)] = e[n], t
        }), {})
    }
    var Fr = {
            optional: {
                webUrl: rt,
                mobileWebUrl: rt,
                androidExecutionParams: rt,
                iosExecutionParams: rt
            },
            builder: zr
        },
        qr = {
            required: {
                item: rt,
                itemOp: rt
            }
        };

    function Ur(e) {
        return {
            title: e.title,
            link: zr(e.link)
        }
    }

    function Dr(e) {
        var t = zr(e);
        return t.link = zr(t.link), t
    }
    var Rr = {
        headerLink: Fr,
        link: Fr,
        button: {
            required: {
                title: rt,
                link: function(e) {
                    Er(e, Fr, "link")
                }
            },
            builder: Ur
        },
        buttons: {
            optional: {
                0: function(e) {
                    Er(e, Rr.button, "button")
                },
                1: function(e) {
                    Er(e, Rr.button, "button")
                }
            },
            builder: function(e) {
                return ft(e, Ur)
            }
        },
        content: {
            required: {
                title: rt,
                imageUrl: rt,
                link: function(e) {
                    Er(e, Fr, "link")
                }
            },
            optional: {
                imageWidth: at,
                imageHeight: at,
                description: rt
            },
            builder: Dr
        },
        contents: {
            optional: {
                0: function(e) {
                    Er(e, Rr.content, "content")
                },
                1: function(e) {
                    Er(e, Rr.content, "content")
                },
                2: function(e) {
                    Er(e, Rr.content, "content")
                }
            },
            builder: function(e) {
                return ft(e, Dr)
            }
        },
        commerce: {
            required: {
                regularPrice: at
            },
            optional: {
                discountPrice: at,
                discountRate: at,
                fixedDiscountPrice: at,
                currencyUnit: rt,
                currencyUnitPosition: wt([0, 1]),
                productName: rt
            },
            builder: zr
        },
        social: {
            optional: {
                likeCount: at,
                commentCount: at,
                sharedCount: at,
                viewCount: at,
                subscriberCount: at
            },
            builder: zr
        },
        itemContent: {
            optional: {
                profileText: rt,
                profileImageUrl: rt,
                titleImageUrl: rt,
                titleImageText: rt,
                titleImageCategory: rt,
                items: function(e) {
                    return m(e) && e.length < 6 && dt(e, (function(e) {
                        return Er(e, qr, "items.item")
                    }))
                },
                sum: rt,
                sumOp: rt
            },
            builder: function(e) {
                var t = zr(e);
                return t.items && (t.items = ft(t.items, (function(e) {
                    return zr(e)
                }))), t
            }
        }
    };
    var Lr = {
            create: function(e, t, n) {
                var r = Rr[t];
                if (r) return e = pn(e, r, 'parameter "'.concat(t, '" in ').concat(n || "Share")), r.builder(e)
            }
        },
        Mr = "4.0",
        Kr = Tt((function e(t, n) {
            Ot(this, e), this.appkey = an(), this.appver = "1.0", this.linkver = Mr, this.extras = jt(jt({
                KA: nn
            }, t.extras), t.serverCallbackArgs && {
                lcba: Ir(t.serverCallbackArgs)
            }), this.template_json = n.template_msg, this.template_args = n.template_args, this.template_id = n.template_id
        }));
    var Nr = Tt((function e(t) {
            var n = this;
            Ot(this, e), this.link_ver = Mr, this.template_object = jt({
                object_type: t.objectType
            }, t.buttonTitle && {
                button_title: t.buttonTitle
            }), tt(t, (function(e, t) {
                var r = Lr.create(e, t, "defaultObject");
                r && (n.template_object[Pr(t)] = r)
            }))
        })),
        Hr = {
            FeedLink: Nr,
            CommerceLink: Nr,
            ListLink: function(e) {
                Ct(n, e);
                var t = zt(n);

                function n(e) {
                    var r;
                    return Ot(this, n), (r = t.call(this, e)).template_object.header_title = e.headerTitle, r
                }
                return Tt(n)
            }(Nr),
            LocationLink: function(e) {
                Ct(n, e);
                var t = zt(n);

                function n(e) {
                    var r;
                    return Ot(this, n), (r = t.call(this, e)).template_object.address = e.address || "", r.template_object.address_title = e.addressTitle || "", r
                }
                return Tt(n)
            }(Nr),
            CalendarLink: function(e) {
                Ct(n, e);
                var t = zt(n);

                function n(e) {
                    var r;
                    return Ot(this, n), (r = t.call(this, e)).template_object.id_type = e.idType || "", r.template_object.id = e.id || "", r
                }
                return Tt(n)
            }(Nr),
            TextLink: function(e) {
                Ct(n, e);
                var t = zt(n);

                function n(e) {
                    var r;
                    return Ot(this, n), (r = t.call(this, e)).template_object.text = e.text || "", r
                }
                return Tt(n)
            }(Nr)
        },
        Gr = Tt((function e(t) {
            Ot(this, e), this.link_ver = Mr, this.request_url = t.requestUrl, t.templateId && (this.template_id = t.templateId), t.templateArgs && (this.template_args = t.templateArgs)
        })),
        $r = Tt((function e(t) {
            Ot(this, e), this.link_ver = Mr, this.template_id = t.templateId, this.template_args = t.templateArgs
        }));
    var Jr = {
            send: function(e, t, n) {
                var r = jt({
                        app_key: an(),
                        ka: nn,
                        validation_action: t,
                        validation_params: JSON.stringify(n)
                    }, e.serverCallbackArgs && {
                        lcba: Ir(e.serverCallbackArgs)
                    }),
                    o = gn("".concat(rn.sharerDomain, "/picker/link"), r, "sharer");
                e.callback && (console && console.warn('KakaoWarning: The "callback" parameter is deprecated.'), function(e, t) {
                    if (Zt.browser.msie) return void(console && console.warn('KakaoWarning: The "callback" parameter does not support the IE browser.'));
                    var n = function(e) {
                        "sent" === e.data && e.origin === rn.sharerDomain && t()
                    };
                    gt(window, "message", n);
                    var r = setInterval((function() {
                        e.closed && (clearInterval(r), bt(window, "message", n))
                    }), 1e3)
                }(o, e.callback))
            }
        },
        Xr = Mt(function() {
            var e = 5e3,
                t = 300,
                n = 100,
                r = Kt(),
                o = r.os,
                i = ["opr/"],
                a = ["firefox", "KAKAOTALK"];

            function c(e) {
                window.top.location.href = e
            }

            function u(e, t, r) {
                var o = (new Date).getTime();
                return setTimeout((function() {
                    var i = (new Date).getTime();
                    s() && i - o < e + n && r(t)
                }), e)
            }

            function s() {
                for (var e = ["hidden", "webkitHidden"], t = 0, n = e.length; t < n; t++)
                    if (void 0 !== document[e[t]]) return !document[e[t]];
                return !0
            }

            function l(e) {
                setTimeout((function() {
                    (function(e) {
                        var t = document.createElement("iframe");
                        return t.id = e, t.style.border = "none", t.style.width = "0", t.style.height = "0", t.style.display = "none", t.style.overflow = "hidden", document.body.appendChild(t), t
                    }("appLauncher")).src = e
                }), 100)
            }
            return function(n) {
                var p, f, d, h, v, m = "function" == typeof n.willInvokeApp ? n.willInvokeApp : function() {},
                    y = "function" == typeof n.onAppMissing ? n.onAppMissing : c,
                    g = "function" == typeof n.onUnsupportedEnvironment ? n.onUnsupportedEnvironment : function() {};
                m(), o.android ? (d = r.browser.chrome && +r.browser.version.major >= 25, h = new RegExp(i.join("|"), "i"), v = new RegExp(a.join("|"), "i"), (d && !h.test(r.ua) || v.test(r.ua)) && n.intentURI && !n.useUrlScheme ? function(e) {
                    r.browser.chrome ? t() : setTimeout(t, 100);

                    function t() {
                        top.location.href = e
                    }
                }(n.intentURI) : n.storeURL && (p = n.urlScheme, f = n.storeURL, u(t, f, y), l(p))) : o.ios && n.storeURL ? function(t, n, o, i) {
                    var a = u(e, n, o);
                    parseInt(r.os.version.major, 10) < 8 ? function(e) {
                        window.addEventListener("pagehide", (function t() {
                            s() && (clearTimeout(e), window.removeEventListener("pagehide", t))
                        }))
                    }(a) : function(e) {
                        document.addEventListener("visibilitychange", (function t() {
                            s() && (clearTimeout(e), document.removeEventListener("visibilitychange", t))
                        }))
                    }(a);
                    parseInt(r.os.version.major, 10) > 8 && r.os.ios ? (void 0 === i ? i = t : clearTimeout(a), function(e) {
                        window.top.location.href = e
                    }(i)) : l(t)
                }(n.urlScheme, n.storeURL, y, n.universalLink) : setTimeout((function() {
                    g()
                }), 100)
            }
        }());

    function Wr() {
        return Zt.os.android && (2 == Zt.os.version.major && /Version\/\d+.\d+|/i.test(Zt.ua) || 4 == Zt.os.version.major && Zt.os.version.minor < 4 && /Version\/\d+.\d+|/i.test(Zt.ua) || /Version\/\d+\.\d+/i.test(Zt.ua) && (/Chrome\/\d+\.\d+\.\d+\.\d+ Mobile/i.test(Zt.ua) || /; wv\)/i.test(Zt.ua)))
    }

    function Vr() {
        return Zt.os.ios && Qt
    }
    var Yr = "362057947";
    var Zr = {
            send: function(e, t, n) {
                return Br(t, n).then((function(t) {
                    var n = function(e, t) {
                        var n = new Kr(e, t);
                        if (JSON.stringify(n).length > 1e4) throw new un("Failed to send message because it exceeds the message size limit. Please contact the app administrator.");
                        return _t(n)
                    }(e, t);
                    ! function(e, t) {
                        console.log(e);
                        console.log(t);
                        var n = "".concat(Zt.os.ios ? rn.talkLinkScheme : "kakaolink://send", "?").concat(e),
                            r = ["intent://send?".concat(e, "#Intent"), "scheme=kakaolink", "launchFlags=0x14008000"].concat(qt(t ? ["package=".concat(rn.talkAndroidPackage)] : []), ["end;"]).join(";"),
                            o = jt(jt({}, !Vr() && {
                                universalLink: rn.universalKakaoLink + encodeURIComponent(n)
                            }), {}, {
                                urlScheme: n,
                                intentURI: r,
                                appName: "KakaoTalk",
                                storeURL: dn(rn.talkAndroidPackage, Yr),
                                onUnsupportedEnvironment: function() {
                                    throw new un("unsupported environment")
                                }
                            });
                        (!t || Vr() || Wr()) && (o.onAppMissing = mt);
                        window.alert(n);
                        window.alert(r);
                        try {
                            Xr(o)
                        } catch (e) {}
                    }(n, e.installTalk)
                })).catch((function(e) {
                    var t, n = JSON.stringify(jt({
                        name: "KAPIError"
                    }, e));
                    console.log(e)
                    // location.href = "".concat(rn.sharerDomain, "/picker/failed?app_key=").concat(an(), "&error=").concat((t = n, window.btoa(t).replace(/\+/g, "-").replace(/\//g, "_").replace(/=/g, "")))
                }))
            }
        },
        Qr = {
            callback: F,
            installTalk: ot,
            throughTalk: ot,
            extras: h,
            serverCallbackArgs: kt([function(e) {
                try {
                    JSON.parse(e)
                } catch (e) {
                    return !1
                }
                return !0
            }, h])
        },
        eo = {
            installTalk: !1,
            throughTalk: !0
        };

    function to(e) {
        if (!m(e)) return !1;
        if (e.length > 2) throw new un('Illegal argument for "buttons" in Share: size of buttons should be up to 2');
        return !0
    }
    var no = {
            required: {
                objectType: function(e) {
                    return "feed" === e
                },
                content: h
            },
            optional: jt(jt({}, Qr), {}, {
                itemContent: h,
                social: h,
                buttonTitle: rt,
                buttons: to
            }),
            defaults: eo
        },
        ro = {
            required: {
                objectType: function(e) {
                    return "list" === e
                },
                headerTitle: rt,
                headerLink: h,
                contents: function(e) {
                    if (!m(e)) return !1;
                    if (e.length < 2 || e.length > 3) throw new un('Illegal argument for "contents" in Share: size of contents should be more than 1 and up to 3');
                    return !0
                }
            },
            optional: jt(jt({}, Qr), {}, {
                buttonTitle: rt,
                buttons: to
            }),
            defaults: eo
        },
        oo = {
            required: {
                objectType: function(e) {
                    return "commerce" === e
                },
                content: h,
                commerce: h
            },
            optional: jt(jt({}, Qr), {}, {
                buttonTitle: rt,
                buttons: to
            }),
            defaults: eo
        },
        io = {
            required: {
                objectType: function(e) {
                    return "location" === e
                },
                content: h,
                address: rt
            },
            optional: jt(jt({}, Qr), {}, {
                addressTitle: rt,
                social: h,
                buttonTitle: rt,
                buttons: to
            }),
            defaults: eo
        },
        ao = {
            required: {
                objectType: function(e) {
                    return "calendar" === e
                },
                idType: wt(["event", "calendar"]),
                id: rt,
                content: h
            },
            optional: jt(jt({}, Qr), {}, {
                buttons: to
            }),
            defaults: eo
        },
        co = {
            required: {
                objectType: function(e) {
                    return "text" === e
                },
                text: rt,
                link: h
            },
            optional: jt(jt({}, Qr), {}, {
                buttonTitle: rt,
                buttons: to
            }),
            defaults: eo
        },
        uo = {
            required: {
                requestUrl: rt
            },
            optional: jt(jt({}, Qr), {}, {
                templateId: at,
                templateArgs: h
            }),
            defaults: jt(jt({}, eo), {}, {
                templateArgs: {}
            })
        },
        so = {
            required: {
                templateId: at
            },
            optional: jt(jt({}, Qr), {}, {
                templateArgs: h
            }),
            defaults: jt(jt({}, eo), {}, {
                templateArgs: {}
            })
        };

    function lo(e) {
        return et({
            required: jt(jt({}, e.required), {}, {
                container: kt([it, rt])
            })
        }, e)
    }
    var po = {
        objectTypes: ["feed", "list", "commerce", "location", "calendar", "text"],
        sendFeed: no,
        createFeedButton: lo(no),
        sendList: ro,
        createListButton: lo(ro),
        sendCommerce: oo,
        createCommerceButton: lo(oo),
        sendLocation: io,
        createLocationButton: lo(io),
        sendCalendar: ao,
        createCalendarButton: lo(ao),
        sendText: co,
        createTextButton: lo(co),
        sendScrap: uo,
        createScrapButton: lo(uo),
        sendCustom: so,
        createCustomButton: lo(so),
        uploadImage: {
            required: {
                file: h
            }
        },
        deleteImage: {
            required: {
                imageUrl: rt
            }
        },
        scrapImage: {
            required: {
                imageUrl: rt
            }
        }
    };

    function fo(e, t) {
        var n = yt(e.container);
        if (!n) throw new un("container is required for KakaoTalk sharing: pass in element or id");
        var r = function(n) {
            n.preventDefault(), n.stopPropagation(), vo(e, t)
        };
        gt(n, "click", r), mo.push((function() {
            bt(n, "click", r)
        }))
    }
    var ho = {
        default: [function(e) {
            return new(0, Hr["".concat(Cr(e.objectType), "Link")])(e)
        }, "/v2/api/kakaolink/talk/template/default"],
        scrap: [function(e) {
            return new Gr(e)
        }, "/v2/api/kakaolink/talk/template/scrap"],
        custom: [function(e) {
            return new $r(e)
        }, "/v2/api/kakaolink/talk/template/validate"]
    };

    function vo(e, t) {
        var n, r, o, i, a = Ft(ho[t], 2),
            c = a[0],
            u = a[1],
            s = c(e);
        n = e.throughTalk, r = /opr\/|opt\/|huawei/g.test(Zt.ua), o = Zt.os.ios && "tablet" === Zt.platform, i = !r && ("mobile" === Zt.platform || o), Qt || n && i ? Zr.send(e, u, s) : Jr.send(e, t, s)
    }
    var mo = [];
    var yo = sn([Object.freeze({
            __proto__: null,
            cleanup: function() {
                ln(mo)
            },
            createCustomButton: function(e) {
                fo(e = pn(e, po.createCustomButton, "Share.createCustomButton"), "custom")
            },
            createDefaultButton: function(e) {
                if (!e.objectType || !wt(po.objectTypes)(e.objectType)) throw new un("objectType should be one of (".concat(po.objectTypes.join(", "), ")"));
                fo(e = pn(e, po["create".concat(Cr(e.objectType), "Button")], "Share.createDefaultButton"), "default")
            },
            createScrapButton: function(e) {
                fo(e = pn(e, po.createScrapButton, "Share.createScrapButton"), "scrap")
            },
            sendCustom: function(e) {
                vo(e = pn(e, po.sendCustom, "Share.sendCustom"), "custom")
            },
            sendDefault: function(e) {
                if (!e.objectType || !wt(po.objectTypes)(e.objectType)) throw new un("objectType should be one of (".concat(po.objectTypes.join(", "), ")"));
                vo(e = pn(e, po["send".concat(Cr(e.objectType))], "Share.sendDefault"), "default")
            },
            sendScrap: function(e) {
                vo(e = pn(e, po.sendScrap, "Share.sendScrap"), "scrap")
            }
        }), Object.freeze({
            __proto__: null,
            deleteImage: function(e) {
                return Br("/v2/api/talk/message/image/delete", {
                    image_url: (e = pn(e, po.deleteImage, "Share.deleteImage")).imageUrl
                })
            },
            scrapImage: function(e) {
                return Br("/v2/api/talk/message/image/scrap", {
                    image_url: (e = pn(e, po.scrapImage, "Share.scrapImage")).imageUrl
                })
            },
            uploadImage: function(e) {
                return Br("/v2/api/talk/message/image/upload", {
                    file: (e = pn(e, po.uploadImage, "Share.uploadImage")).file
                })
            }
        })]),
        go = ["small", "large"],
        bo = ["yellow", "mono"],
        _o = ["pc", "mobile"],
        wo = ["consult", "question"],
        ko = ["ko", "en", "ja"];

    function So(e) {
        return rt(e) && !/(.{1,2}\/)/g.test(e)
    }
    var jo = {
            createAddChannelButton: {
                required: {
                    container: kt([it, rt]),
                    channelPublicId: So
                },
                optional: {
                    size: wt(go),
                    lang: wt(ko),
                    supportMultipleDensities: ot
                },
                defaults: {
                    size: go[0],
                    supportMultipleDensities: !1
                }
            },
            addChannel: {
                required: {
                    channelPublicId: So
                },
                optional: {
                    lang: wt(ko)
                }
            },
            createChatButton: {
                required: {
                    container: kt([it, rt]),
                    channelPublicId: So
                },
                optional: {
                    size: wt(go),
                    color: wt(bo),
                    shape: wt(_o),
                    title: wt(wo),
                    lang: wt(ko),
                    supportMultipleDensities: ot
                },
                defaults: {
                    size: go[0],
                    color: bo[0],
                    shape: _o[0],
                    title: wo[0],
                    supportMultipleDensities: !1
                }
            },
            chat: {
                required: {
                    channelPublicId: So
                },
                optional: {
                    lang: wt(ko)
                }
            }
        },
        Oo = "1.1",
        xo = "channel_add_social_plugin",
        To = "channel_chat_social_plugin";

    function Ao(e) {
        var t = "".concat(rn.channel, "/").concat(e.channelPublicId, "/friend");
        null !== an() && (t += "?".concat(Po(Oo, e.lang))), vn(t, xo, mn(350, 510))
    }

    function Co(e) {
        var t = "".concat(rn.channel, "/").concat(e.channelPublicId, "/chat");
        null !== an() && (t += "?".concat(Po(Oo, e.lang))), vn(t, To, mn(350, 510))
    }

    function Po(e, t) {
        return _t(jt({
            api_ver: e,
            kakao_agent: nn,
            app_key: an(),
            referer: Yt + location.pathname + location.search
        }, t && {
            lang: t
        }))
    }

    function Io(e, t, n) {
        var r = document.createElement("a");
        r.setAttribute("href", "#");
        var o = document.createElement("img");
        return o.setAttribute("src", t), o.setAttribute("title", n), o.setAttribute("alt", n), e.supportMultipleDensities && o.setAttribute("srcset", [t.replace(".png", "_2X.png 2x"), t.replace(".png", "_3X.png 3x")].join(", ")), r.appendChild(o), r
    }
    var Bo = [];
    var Eo = sn([Object.freeze({
            __proto__: null,
            addChannel: function(e) {
                Ao(e = pn(e, jo.addChannel, "Channel.addChannel"))
            },
            chat: function(e) {
                Co(e = pn(e, jo.chat, "Channel.chat"))
            },
            cleanup: function() {
                ln(Bo)
            },
            createAddChannelButton: function(e) {
                var t = yt(e.container);
                if (!t) throw new un("container is required for Channel.createAddChannelButton: pass in element or id");
                yn(e, t, {
                    channelPublicId: "data-channel-public-id",
                    size: "data-size",
                    supportMultipleDensities: "data-support-multiple-densities"
                });
                var n = function(e) {
                        var t = "friendadd_".concat(e.size, "_yellow_rect.png");
                        return "".concat(rn.channelIcon, "/channel/").concat(t)
                    }(e = pn(e, jo.createAddChannelButton, "Channel.createAddChannelButton")),
                    r = Io(e, n, "카카오톡 채널 추가 버튼");
                t.appendChild(r);
                var o = function(t) {
                    t.preventDefault(), Ao(e)
                };
                gt(r, "click", o), Bo.push((function() {
                    bt(r, "click", o), t.removeChild(r)
                }))
            },
            createChatButton: function(e) {
                var t = yt(e.container);
                if (!t) throw new un("container is required for Channel.createChatButton: pass in element or id");
                yn(e, t, {
                    channelPublicId: "data-channel-public-id",
                    size: "data-size",
                    color: "data-color",
                    shape: "data-shape",
                    title: "data-title",
                    supportMultipleDensities: "data-support-multiple-densities"
                });
                var n = function(e) {
                        var t = "".concat(e.title, "_").concat(e.size, "_").concat(e.color, "_").concat(e.shape, ".png");
                        return "".concat(rn.channelIcon, "/channel/").concat(t)
                    }(e = pn(e, jo.createChatButton, "Channel.createChatButton")),
                    r = Io(e, n, "카카오톡 채널 1:1 채팅 버튼");
                t.appendChild(r);
                var o = function(t) {
                    t.preventDefault(), Co(e)
                };
                gt(r, "click", o), Bo.push((function() {
                    bt(r, "click", o), t.removeChild(r)
                }))
            }
        })]),
        zo = {
            required: {
                title: rt
            },
            optional: {
                desc: rt,
                name: rt,
                images: m,
                type: rt
            },
            defaults: {
                type: "website"
            },
            after: function(e) {
                e.images && (e.imageurl = e.images, delete e.images)
            }
        },
        Fo = {
            createShareButton: {
                required: {
                    container: kt([it, rt])
                },
                optional: {
                    url: rt,
                    text: rt
                },
                defaults: {
                    url: location.href
                }
            },
            share: {
                optional: {
                    url: rt,
                    text: rt
                },
                defaults: {
                    url: location.href
                }
            },
            open: {
                optional: {
                    url: rt,
                    text: rt,
                    urlInfo: function(e) {
                        return h(e) && !!pn(e, zo, "Story.open")
                    },
                    install: ot
                },
                defaults: {
                    url: location.href,
                    install: !1
                }
            },
            createFollowButton: {
                required: {
                    container: kt([it, rt]),
                    id: rt
                },
                optional: {
                    showFollowerCount: ot,
                    type: wt(["horizontal", "vertical"])
                },
                defaults: {
                    showFollowerCount: !0,
                    type: "horizontal"
                },
                after: function(e) {
                    "@" !== e.id[0] && (e.id = "@".concat(e.id))
                }
            }
        };

    function qo(e) {
        var t = jt(jt({}, Do()), {}, {
            url: e.url
        });
        e.text && (t.text = e.text), vn("".concat(rn.storyShare, "?").concat(_t(t)), "kakaostory_social_plugin", mn())
    }
    var Uo = 0;

    function Do() {
        var e = {
            kakao_agent: nn
        };
        return null !== an() && (e.app_key = an()), e
    }
    var Ro = [];
    var Lo = sn([Object.freeze({
            __proto__: null,
            cleanup: function() {
                ln(Ro)
            },
            createFollowButton: function(e) {
                var t = yt(e.container);
                if (!t) throw new un("container is required for Story.createFollowButton: pass in element or id");
                yn(e, t, {
                    id: "data-id",
                    showFollowerCount: "data-show-follower-count",
                    type: "data-type"
                });
                var n = function(e) {
                        var t = Uo++,
                            n = e.showFollowerCount && "horizontal" === e.type ? 85 : 59,
                            r = e.showFollowerCount && "vertical" === e.type ? 46 : 20,
                            o = document.createElement("iframe");
                        o.src = function(e, t) {
                            var n = jt(jt({}, Do()), {}, {
                                id: e.id,
                                type: e.type,
                                hideFollower: !e.showFollowerCount,
                                frameId: t
                            });
                            return "".concat(rn.storyChannelFollow, "?").concat(_t(n))
                        }(e, t), o.setAttribute("frameborder", "0"), o.setAttribute("marginwidth", "0"), o.setAttribute("marginheight", "0"), o.setAttribute("scrolling", "no"), o.setAttribute("style", "width:".concat(n, "px; height:").concat(r, "px;"));
                        var i = function(e) {
                            if (e.data && /\.kakao\.com$/.test(e.origin) && "string" == typeof e.data) {
                                var i = Ft(ft(e.data.split(","), (function(e) {
                                        return parseInt(e, 10)
                                    })), 3),
                                    a = i[0],
                                    c = i[1],
                                    u = i[2];
                                a === t && (n !== c && (o.style.width = "".concat(c, "px")), r !== u && (o.style.height = "".concat(u, "px")))
                            }
                        };
                        return {
                            iframe$: o,
                            messageHandler: i
                        }
                    }(e = pn(e, Fo.createFollowButton, "Story.createFollowButton")),
                    r = n.iframe$,
                    o = n.messageHandler;
                t.appendChild(r), gt(window, "message", o), Ro.push((function() {
                    bt(window, "message", o), t.removeChild(r)
                }))
            },
            createShareButton: function(e) {
                var t = yt(e.container);
                if (!t) throw new un("container is required for Story.createShareButton: pass in element or id");
                yn(e, t, {
                    url: "data-url"
                }), e = pn(e, Fo.createShareButton, "Story.createShareButton");
                var n = function(e, t) {
                    var n = document.createElement("a");
                    n.setAttribute("href", "#");
                    var r = document.createElement("img");
                    return r.setAttribute("src", e), r.setAttribute("title", t), r.setAttribute("alt", t), n.appendChild(r), n
                }(rn.storyIcon, "카카오스토리 웹 공유 버튼");
                t.appendChild(n);
                var r = function(t) {
                    t.preventDefault(), qo(e)
                };
                gt(n, "click", r), Ro.push((function() {
                    bt(n, "click", r), t.removeChild(n)
                }))
            },
            open: function(e) {
                var t = function(e) {
                        var t = location.hostname || "",
                            n = jt(jt({}, Do()), {}, {
                                apiver: "1.0",
                                appver: en,
                                appid: t,
                                appname: t,
                                post: e.text ? "".concat(e.text, "\n").concat(e.url) : e.url
                            });
                        e.urlInfo && (n.urlinfo = JSON.stringify(e.urlInfo), n.appname = e.urlInfo.name || n.appname);
                        return "".concat(rn.storyPostScheme, "?").concat(_t(n))
                    }(e = pn(e, Fo.open, "Story.open")),
                    n = {
                        urlScheme: t,
                        intentURI: ["intent:".concat(t, "#Intent"), "".concat(e.install ? "package=com.kakao.story;" : "", "end;")].join(";"),
                        appName: "KakaoStory",
                        storeURL: dn("com.kakao.story", "486244601"),
                        onUnsupportedEnvironment: function() {
                            e.fail && e.fail()
                        }
                    };
                try {
                    Xr(n)
                } catch (e) {}
            },
            share: function(e) {
                qo(e = pn(e, Fo.share, "Story.share"))
            }
        })]),
        Mo = ["wgs84", "katec"],
        Ko = {
            required: {
                name: rt,
                x: ct,
                y: ct
            },
            optional: {
                rpflag: rt,
                cid: rt
            }
        },
        No = {
            start: {
                required: {
                    name: rt,
                    x: ct,
                    y: ct
                },
                optional: {
                    coordType: wt(Mo),
                    vehicleType: wt([1, 2, 3, 4, 5, 6, 7]),
                    rpOption: wt([1, 2, 3, 4, 5, 6, 8, 100]),
                    routeInfo: ot,
                    sX: ct,
                    sY: ct,
                    sAngle: ct,
                    returnUri: rt,
                    rpflag: rt,
                    cid: rt,
                    guideId: ct,
                    viaPoints: function(e) {
                        if (m(e)) {
                            if (e.length > 3) throw new un("Invalid parameter keys: via points should not be exceed 3. at Navi.start");
                            return tt(e, (function(e) {
                                return pn(e, Ko, "Navi.start")
                            })), !0
                        }
                        return !1
                    }
                },
                defaults: {
                    coordType: "katec",
                    vehicleType: 1,
                    rpOption: 100,
                    routeInfo: !1
                }
            },
            share: {
                required: {
                    name: rt,
                    x: ct,
                    y: ct
                },
                optional: {
                    coordType: wt(Mo),
                    rpflag: rt,
                    cid: rt,
                    guideId: ct
                },
                defaults: {
                    coordType: "katec"
                }
            }
        };

    function Ho() {
        return {
            appkey: an(),
            apiver: "1.0",
            extras: {
                KA: nn
            }
        }
    }

    function Go(e, t) {
        var n = {
            urlScheme: e,
            intentURI: ["intent:".concat(e, "#Intent"), "S.browser_fallback_url=".concat(encodeURIComponent(t)), "end;"].join(";"),
            storeURL: t,
            universalLink: t
        };
        try {
            Xr(n)
        } catch (e) {}
    }
    var $o = sn([Object.freeze({
        __proto__: null,
        share: function(e) {
            var t = _t(function(e) {
                var t = {
                        name: e.name,
                        x: e.x,
                        y: e.y,
                        rpflag: e.rpflag,
                        cid: e.cid,
                        guide_id: e.guideId
                    },
                    n = {
                        route_info: !0,
                        coord_type: e.coordType
                    };
                return jt(jt({}, Ho()), {}, {
                    param: {
                        destination: t,
                        option: n
                    }
                })
            }(e = pn(e, No.share, "Navi.share")));
            Go("".concat(rn.naviScheme, "?").concat(t), "".concat(rn.naviFallback, "?").concat(t))
        },
        start: function(e) {
            var t = _t(function(e) {
                var t = {
                        name: e.name,
                        x: e.x,
                        y: e.y,
                        rpflag: e.rpflag,
                        cid: e.cid,
                        guide_id: e.guideId
                    },
                    n = {
                        coord_type: e.coordType,
                        vehicle_type: e.vehicleType,
                        rpoption: e.rpOption,
                        route_info: e.routeInfo,
                        s_x: e.sX,
                        s_y: e.sY,
                        s_angle: e.sAngle,
                        return_uri: e.returnUri
                    };
                return jt(jt({}, Ho()), {}, {
                    param: {
                        destination: t,
                        option: n,
                        via_list: e.viaPoints
                    }
                })
            }(e = pn(e, No.start, "Navi.start")));
            Go("".concat(rn.naviScheme, "?").concat(t), "".concat(rn.naviFallback, "?").concat(t))
        }
    })]);

    function Jo(e) {
        return at(e) && e > 0 && e < 101
    }

    function Xo(e) {
        if (e.maxPickableCount < e.minPickableCount) throw new un('"minPickableCount" should not larger than "maxPickableCount"')
    }

    function Wo(e) {
        var t = {
            required: {
                reason: wt(["msgBlocked", "registered", "unregistered", "notFriend", "custom"])
            },
            optional: {
                message: rt,
                uuids: m
            },
            after: function(e) {
                if (!("custom" !== e.reason || e.message && e.uuids)) throw new un('"message" and "uuids" must be set for "custom" option in disableSelectOption')
            }
        };
        return m(e) && dt(e, (function(e) {
            return h(e) && !!pn(e, t, "disableSelectOption")
        }))
    }

    function Vo(e) {
        if ("chatMember" === e.selectionType) {
            var t = e.chatFilters;
            if (t.indexOf("open") > -1) throw new un('"open" is not allowed in "chatFilters"');
            if ((t.indexOf("direct") > -1 || t.indexOf("multi") > -1) && -1 === t.indexOf("regular")) throw new un('"regular" should be included in "chatFilters"')
        }
    }
    var Yo = ["none", "invitable", "registered"],
        Zo = ["talk", "story", "talkstory"],
        Qo = ["chat", "chatMember"],
        ei = ["regular", "direct", "multi", "open"],
        ti = ["all", "ios", "android"],
        ni = {
            returnUrl: rt,
            friendFilter: wt(Yo),
            serviceTypeFilter: wt(Zo),
            title: rt,
            enableSearch: ot,
            countryCodeFilters: m,
            usingOsFilter: wt(ti),
            showMyProfile: ot,
            showFavorite: ot,
            disableSelectOptions: Wo,
            displayAllProfile: ot,
            enableBackButton: ot
        },
        ri = {
            optional: {
                friendFilter: wt(Yo),
                serviceTypeFilter: wt(Zo),
                countryCodeFilters: m,
                usingOsFilter: wt(ti),
                showMyProfile: ot,
                showFavorite: ot,
                showPickedFriend: ot
            }
        },
        oi = {
            optional: {
                selectionType: wt(Qo),
                chatFilters: function(e) {
                    return m(e) && dt(e, (function(e) {
                        return wt(ei)(e)
                    }))
                }
            },
            defaults: {
                selectionType: Qo[0],
                chatFilters: [ei[0]]
            },
            after: Vo
        },
        ii = {
            selectFriend: {
                optional: ni
            },
            selectFriends: {
                optional: jt(jt({}, ni), {}, {
                    showPickedFriend: ot,
                    maxPickableCount: Jo,
                    minPickableCount: Jo
                }),
                after: Xo
            },
            selectChat: {
                optional: {
                    returnUrl: rt,
                    selectionType: wt(Qo),
                    chatFilters: function(e) {
                        return m(e) && dt(e, (function(e) {
                            return wt(ei)(e)
                        }))
                    },
                    title: rt,
                    enableSearch: ot,
                    disableSelectOptions: Wo,
                    displayAllProfile: ot,
                    maxPickableCount: Jo,
                    minPickableCount: Jo,
                    enableBackButton: ot
                },
                defaults: {
                    selectionType: Qo[0],
                    chatFilters: [ei[0]]
                },
                after: function(e) {
                    Xo(e), Vo(e)
                }
            },
            select: {
                optional: {
                    returnUrl: rt,
                    title: rt,
                    enableSearch: ot,
                    disableSelectOptions: Wo,
                    displayAllProfile: ot,
                    maxPickableCount: Jo,
                    minPickableCount: Jo,
                    enableBackButton: ot,
                    friendsParams: function(e) {
                        return h(e) && !!pn(e, ri, "Picker.select")
                    },
                    chatParams: function(e) {
                        return h(e) && !!pn(e, oi, "Picker.select")
                    }
                },
                after: Xo
            }
        },
        ai = ["returnUrl", "friendsParams", "chatParams"];
    var ci = new jr(rn.pickerDomain);

    function ui(e, t) {
        var n = fn(60),
            r = jt(jt({
                transId: n,
                appKey: an(),
                ka: nn
            }, sr() && {
                token: sr()
            }), function(e) {
                e.returnUrl;
                var t = e.friendsParams,
                    n = e.chatParams,
                    r = Bt(e, ai);
                return function(e) {
                    ["countryCodeFilters", "chatFilters"].forEach((function(t) {
                        void 0 !== e[t] && (e[t] = e[t].join(","))
                    })), e.disableSelectOptions && (e.disableSelectOptions = JSON.stringify(e.disableSelectOptions));
                    return e
                }(jt(jt(jt({}, r), t), n))
            }(e));
        if (!e.returnUrl) return ci.createHiddenIframe(n, "/proxy?transId=".concat(n)), ci.retrieveMessage(t, r, "picker");
        r.returnUrl = e.returnUrl, bn(rn.pickerDomain + t, r)
    }
    var si = sn([Object.freeze({
        __proto__: null,
        select: function(e) {
            return ui(e = pn(e, ii.select, "Picker.select"), "/tab/select")
        },
        selectChat: function(e) {
            return ui(e = pn(e, ii.selectChat, "Picker.selectChat"), "/chat/select")
        },
        selectFriend: function(e) {
            return ui(e = pn(e, ii.selectFriend, "Picker.selectFriend"), "/select/single")
        },
        selectFriends: function(e) {
            return ui(e = pn(e, ii.selectFriends, "Picker.selectFriends"), "/select/multiple")
        }
    })]);

    function li() {
        return null !== an()
    }
    "function" == typeof define && define.amd && (window.Kakao = e), "function" == typeof window.kakaoAsyncInit && setTimeout((function() {
        window.kakaoAsyncInit()
    }), 0), e.VERSION = en, e.cleanup = function() {
        var e = this;
        Object.keys(this).filter((function(t) {
            return h(e[t])
        })).forEach((function(t) {
            return e[t].cleanup && e[t].cleanup()
        })), cn(null)
    }, e.init = function(e) {
        if (Zt.browser.msie && Zt.browser.version.major < 11) throw new un("Kakao.init: Unsupported browser");
        if (li()) throw new un("Kakao.init: Already initialized");
        if (!rt(e)) throw new un("Kakao.init: App key must be provided");
        cn(e), this.Auth = Tr, this.API = Ar, this.Share = yo, this.Channel = Eo, this.Story = Lo, this.Navi = $o, this.Picker = si
    }, e.isInitialized = li
}));
