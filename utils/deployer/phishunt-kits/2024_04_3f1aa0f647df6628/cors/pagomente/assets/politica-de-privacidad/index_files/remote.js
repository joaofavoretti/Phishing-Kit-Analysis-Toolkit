(function(g) {
    var window = this;
    var uqa = function(a, b) { return g.Wb(a, b) },
        N5 = function(a, b, c) { a.l.set(b, c) },
        O5 = function(a) {
            N5(a, "zx", Math.floor(2147483648 * Math.random()).toString(36) + Math.abs(Math.floor(2147483648 * Math.random()) ^ (0, g.B)()).toString(36));
            return a
        },
        P5 = function(a, b, c) {
            g.La(c) || (c = [String(c)]);
            g.Xm(a.l, b, c)
        },
        vqa = function(a, b) {
            var c = [];
            g.Zi(b, function(d) {
                try { var e = g.ao.prototype.i.call(this, d, !0) } catch (f) { if ("Storage: Invalid value was encountered" == f) return; throw f; }
                g.Da(e) ? g.$n(e) && c.push(d) : c.push(d)
            }, a);
            return c
        },
        wqa = function(a, b) {
            var c = vqa(a, b);
            (0, g.y)(c, function(d) { g.ao.prototype.remove.call(this, d) }, a)
        },
        Q5 = function(a) {
            if (a.fd) {
                if (a.fd.locationOverrideToken) return { locationOverrideToken: a.fd.locationOverrideToken };
                if (null != a.fd.latitudeE7 && null != a.fd.longitudeE7) return { latitudeE7: a.fd.latitudeE7, longitudeE7: a.fd.longitudeE7 }
            }
            return null
        },
        xqa = function(a, b) { g.bb(a, b) || a.push(b) },
        R5 = function(a) {
            var b = 0,
                c;
            for (c in a) b++;
            return b
        },
        S5 = function(a, b) {
            var c = b instanceof g.yc ? b : g.Ec(b, /^data:image\//i.test(b));
            a.src = g.zc(c)
        },
        T5 = function() {},
        yqa = function(a) {
            try { return g.u.JSON.parse(a) } catch (b) {}
            a = String(a);
            if (/^\s*$/.test(a) ? 0 : /^[\],:{}\s\u2028\u2029]*$/.test(a.replace(/\\["\\\/bfnrtu]/g, "@").replace(/(?:"[^"\\\n\r\u2028\u2029\x00-\x08\x0a-\x1f]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)[\s\u2028\u2029]*(?=:|,|]|}|$)/g, "]").replace(/(?:^|:|,)(?:[\s\u2028\u2029]*\[)+/g, ""))) try { return eval("(" + a + ")") } catch (b) {}
            throw Error("Invalid JSON string: " + a);
        },
        zqa = function(a) {
            if (a.Fc && "function" == typeof a.Fc) return a.Fc();
            if (g.Ea(a)) return a.split("");
            if (g.Ma(a)) { for (var b = [], c = a.length, d = 0; d < c; d++) b.push(a[d]); return b }
            return g.Sb(a)
        },
        Aqa = function(a, b) {
            if (a.forEach && "function" == typeof a.forEach) a.forEach(b, void 0);
            else if (g.Ma(a) || g.Ea(a))(0, g.y)(a, b, void 0);
            else {
                if (a.Od && "function" == typeof a.Od) var c = a.Od();
                else if (a.Fc && "function" == typeof a.Fc) c = void 0;
                else if (g.Ma(a) || g.Ea(a)) { c = []; for (var d = a.length, e = 0; e < d; e++) c.push(e) } else c = g.Tb(a);
                d = zqa(a);
                e = d.length;
                for (var f = 0; f < e; f++) b.call(void 0, d[f], c && c[f], a)
            }
        },
        Bqa = function(a, b, c, d) {
            var e = new g.Lm(null, void 0);
            a && g.Mm(e, a);
            b && g.Nm(e, b);
            c && g.Om(e, c);
            d && (e.i = d);
            return e
        },
        U5 = function(a, b) {
            g.dp[a] = !0;
            var c = g.bp();
            c && c.publish.apply(c, arguments);
            g.dp[a] = !1
        },
        V5 = function(a) {
            this.app = this.name = this.id = "";
            this.type = "REMOTE_CONTROL";
            this.obfuscatedGaiaId = this.avatar = this.username = "";
            this.l = !1;
            this.capabilities = new Set;
            this.experiments = new Set;
            this.theme = "u";
            new g.Im;
            this.g = this.i = "";
            a && (this.id = a.id || a.name, this.name = a.name, this.app = a.app, this.type = a.type || "REMOTE_CONTROL", this.username = a.user || "", this.avatar = a.userAvatarUri || "", this.obfuscatedGaiaId = a.obfuscatedGaiaId || "", this.theme = a.theme || "u", Cqa(this, a.capabilities || ""), Dqa(this, a.experiments || ""), this.i = a.remoteControllerUrl || "", this.g = a.localChannelEncryptionKey ||
                "")
        },
        Cqa = function(a, b) {
            a.capabilities.clear();
            (0, g.Xd)(b.split(","), g.Ra(uqa, Eqa)).forEach(function(c) { a.capabilities.add(c) })
        },
        Dqa = function(a, b) {
            a.experiments.clear();
            b.split(",").forEach(function(c) { a.experiments.add(c) })
        },
        W5 = function(a) {
            a = a || {};
            this.name = a.name || "";
            this.id = a.id || a.screenId || "";
            this.token = a.token || a.loungeToken || "";
            this.uuid = a.uuid || a.dialId || ""
        },
        X5 = function(a, b) { return !!b && (a.id == b || a.uuid == b) },
        Y5 = function(a) {
            return {
                name: a.name,
                screenId: a.id,
                loungeToken: a.token,
                dialId: a.uuid
            }
        },
        Fqa = function(a) { return new W5(a) },
        Z5 = function(a) { return g.La(a) ? (0, g.A)(a, Fqa) : [] },
        $5 = function(a) { return a ? '{name:"' + a.name + '",id:' + a.id.substr(0, 6) + "..,token:" + (a.token ? ".." + a.token.slice(-6) : "-") + ",uuid:" + (a.uuid ? ".." + a.uuid.slice(-6) : "-") + "}" : "null" },
        a6 = function(a) { return g.La(a) ? "[" + (0, g.A)(a, $5).join(",") + "]" : "null" },
        b6 = function() {
            return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(a) {
                var b = 16 * Math.random() | 0;
                return ("x" == a ? b : b & 3 | 8).toString(16)
            })
        },
        Gqa = function(a) {
            return (0, g.A)(a, function(b) {
                return {
                    key: b.id,
                    name: b.name
                }
            })
        },
        c6 = function(a, b) { return g.Za(a, function(c) { return c || b ? !c != !b ? !1 : c.id == b.id : !0 }) },
        d6 = function(a, b) { return g.Za(a, function(c) { return X5(c, b) }) },
        e6 = function(a) {
            try {
                var b = (0, g.Us)(),
                    c = (0, g.Ts)();
                b && b.remove(a);
                c && c.remove(a)
            } catch (d) {}
        },
        Hqa = function() {
            var a = (0, g.Ts)();
            a && wqa(a, a.g.lf(!0))
        },
        f6 = function() {
            var a = g.Ws("yt-remote-connected-devices") || [];
            g.sb(a);
            return a
        },
        Iqa = function(a) {
            if (g.cb(a)) return [];
            var b = a[0].indexOf("#"),
                c = -1 == b ? a[0] : a[0].substring(0, b);
            return (0, g.A)(a, function(d, e) { return 0 == e ? d : d.substring(c.length) })
        },
        g6 = function(a) { g.Vs("yt-remote-connected-devices", a, 86400) },
        i6 = function() {
            if (h6) return h6;
            var a = g.Ws("yt-remote-device-id");
            a || (a = b6(), g.Vs("yt-remote-device-id", a, 31536E3));
            for (var b = f6(), c = 1, d = a; g.bb(b, d);) c++, d = a + "#" + c;
            return h6 = d
        },
        j6 = function() {
            var a = f6(),
                b = i6();
            g.bb(a, b);
            g.Xs() && g.ub(a, b);
            a = Iqa(a);
            if (g.cb(a)) try { g.Nr("remote_sid") } catch (c) {} else try { g.Mr("remote_sid", a.join(","), -1) } catch (c) {}
        },
        k6 = function() { return g.Ws("yt-remote-session-browser-channel") },
        l6 = function() { return g.Ws("yt-remote-local-screens") || [] },
        m6 = function() { g.Vs("yt-remote-lounge-token-expiration", !0, 86400) },
        Jqa = function(a) {
            5 < a.length && (a = a.slice(a.length - 5));
            var b = (0, g.A)(l6(), function(d) { return d.loungeToken }),
                c = (0, g.A)(a, function(d) { return d.loungeToken });
            (0, g.ah)(c, function(d) { return !g.bb(b, d) }) && m6();
            g.Vs("yt-remote-local-screens", a, 31536E3)
        },
        Kqa = function(a, b) {
            g.Vs("yt-remote-session-browser-channel", a);
            g.Vs("yt-remote-session-screen-id", b);
            var c = f6(),
                d = i6();
            g.bb(c, d) || c.push(d);
            g6(c);
            j6()
        },
        n6 = function(a) {
            a || (e6("yt-remote-session-screen-id"), e6("yt-remote-session-video-id"));
            j6();
            a = f6();
            g.fb(a, i6());
            g6(a)
        },
        p6 = function() {
            if (!o6) {
                var a = g.lo();
                a && (o6 = new g.Vn(a))
            }
            return o6 ? !!o6.get("yt-remote-use-staging-server") : !1
        },
        q6 = function(a) { return !!document.currentScript && (-1 != document.currentScript.src.indexOf("?" + a) || -1 != document.currentScript.src.indexOf("&" + a)) },
        r6 = function() { return "function" == typeof window.__onGCastApiAvailable ? window.__onGCastApiAvailable : null },
        t6 = function(a) { a.length ? s6(a.shift(), function() { t6(a) }) : u6() },
        Lqa = function(a) { return "chrome-extension://" + a + "/cast_sender.js" },
        s6 = function(a, b, c) {
            var d = document.createElement("script");
            d.onerror = b;
            c && (d.onload = c);
            d.src = a;
            (document.head || document.documentElement).appendChild(d)
        },
        u6 = function() {
            var a = r6();
            a && a(!1, "No cast extension found")
        },
        v6 = function() {
            if (Mqa) {
                var a = 2,
                    b = r6(),
                    c = function() {
                        a--;
                        0 == a && b && b(!0)
                    };
                window.__onGCastApiAvailable = c;
                s6("//www.gstatic.com/cast/sdk/libs/sender/1.0/cast_framework.js", u6, c)
            }
        },
        Nqa = function() {
            v6();
            var a = window.navigator.userAgent.match(/Chrome\/([0-9]+)/);
            t6(["//www.gstatic.com/eureka/clank/" + (a ? parseInt(a[1], 10) : 0) + "/cast_sender.js", "//www.gstatic.com/eureka/clank/cast_sender.js"])
        },
        w6 = function(a, b, c) {
            g.F.call(this);
            this.A = null != c ? (0, g.x)(a, c) : a;
            this.Wc = b;
            this.u = (0, g.x)(this.oD, this);
            this.g = !1;
            this.i = 0;
            this.l = this.Ba = null;
            this.o = []
        },
        x6 = function(a) {
            if (g.u.JSON) try { return g.u.JSON.parse(a) } catch (b) {}
            return yqa(a)
        },
        y6 = function() {},
        z6 = function() {},
        A6 = function() {},
        C6 = function(a) { return (a = B6(a)) ? new ActiveXObject(a) : new XMLHttpRequest },
        B6 = function(a) {
            if (!a.i && "undefined" == typeof XMLHttpRequest && "undefined" != typeof ActiveXObject) {
                for (var b = ["MSXML2.XMLHTTP.6.0",
                        "MSXML2.XMLHTTP.3.0", "MSXML2.XMLHTTP", "Microsoft.XMLHTTP"
                    ], c = 0; c < b.length; c++) { var d = b[c]; try { return new ActiveXObject(d), a.i = d } catch (e) {} }
                throw Error("Could not create ActiveXObject. ActiveX might be disabled, or MSXML might not be installed");
            }
            return a.i
        },
        D6 = function(a, b, c, d) {
            this.g = a;
            this.l = b;
            this.C = c;
            this.A = d || 1;
            this.o = 45E3;
            this.ba = new g.DY(this);
            this.i = new g.bl;
            this.i.setInterval(250)
        },
        F6 = function(a, b, c) {
            a.Yh = 1;
            a.Wf = O5(b.clone());
            a.qh = c;
            a.u = !0;
            E6(a, null)
        },
        G6 = function(a, b, c, d, e) {
            a.Yh = 1;
            a.Wf = O5(b.clone());
            a.qh = null;
            a.u = c;
            e && (a.pA = !1);
            E6(a, d)
        },
        E6 = function(a, b) {
            a.Ci = (0, g.B)();
            H6(a);
            a.Bg = a.Wf.clone();
            P5(a.Bg, "t", a.A);
            a.Zk = 0;
            a.sc = a.g.Np(a.g.Lk() ? b : null);
            0 < a.wq && (a.Sn = new g.el((0, g.x)(a.oB, a, a.sc), a.wq));
            a.ba.ca(a.sc, "readystatechange", a.iM);
            var c = a.Xg ? g.dc(a.Xg) : {};
            a.qh ? (a.Co = "POST", c["Content-Type"] = "application/x-www-form-urlencoded", a.sc.send(a.Bg, a.Co, a.qh, c)) : (a.Co = "GET", a.pA && !g.Nd && (c.Connection = "close"), a.sc.send(a.Bg, a.Co, null, c));
            a.g.ye(1)
        },
        O6 = function(a, b, c) {
            for (var d = !0; !a.Mg && a.Zk < c.length;) {
                var e = Oqa(a, c);
                if (e == I6) { 4 == b && (a.ng = 4, J6(15), d = !1); break } else if (e == K6) {
                    a.ng = 4;
                    J6(16);
                    d = !1;
                    break
                } else L6(a, e)
            }
            4 == b && 0 == c.length && (a.ng = 1, J6(17), d = !1);
            a.ze = a.ze && d;
            d || (M6(a), N6(a))
        },
        Oqa = function(a, b) {
            var c = a.Zk,
                d = b.indexOf("\n", c);
            if (-1 == d) return I6;
            c = Number(b.substring(c, d));
            if (isNaN(c)) return K6;
            d += 1;
            if (d + c > b.length) return I6;
            var e = b.substr(d, c);
            a.Zk = d + c;
            return e
        },
        R6 = function(a, b) {
            a.Ci = (0, g.B)();
            H6(a);
            var c = b ? window.location.hostname : "";
            a.Bg = a.Wf.clone();
            N5(a.Bg, "DOMAIN", c);
            N5(a.Bg, "t", a.A);
            try { a.De = new ActiveXObject("htmlfile") } catch (n) {
                M6(a);
                a.ng = 7;
                J6(22);
                N6(a);
                return
            }
            var d = "<html><body>";
            if (b) {
                for (var e = "", f = 0; f < c.length; f++) {
                    var k = c.charAt(f);
                    if ("<" == k) e += "\\x3c";
                    else if (">" == k) e += "\\x3e";
                    else {
                        var l = k;
                        if (l in P6) k = P6[l];
                        else if (l in Q6) k = P6[l] = Q6[l];
                        else {
                            var m = l.charCodeAt(0);
                            if (31 < m && 127 > m) k = l;
                            else {
                                if (256 > m) { if (k = "\\x", 16 > m || 256 < m) k += "0" } else k = "\\u", 4096 > m && (k += "0");
                                k += m.toString(16).toUpperCase()
                            }
                            k =
                                P6[l] = k
                        }
                        e += k
                    }
                }
                d += '<script>document.domain="' + e + '"\x3c/script>'
            }
            c = g.Sc(g.sc("b/12014412"), d + "</body></html>");
            a.De.open();
            a.De.write(g.Nc(c));
            a.De.close();
            a.De.parentWindow.m = (0, g.x)(a.yL, a);
            a.De.parentWindow.d = (0, g.x)(a.yz, a, !0);
            a.De.parentWindow.rpcClose = (0, g.x)(a.yz, a, !1);
            c = a.De.createElement("DIV");
            a.De.parentWindow.document.body.appendChild(c);
            d = g.Dc(a.Bg.toString());
            d = g.Zc(g.Ac(d));
            d = g.Sc(g.sc("b/12014412"), '<iframe src="' + d + '"></iframe>');
            g.Tc(c, d);
            a.g.ye(1)
        },
        H6 = function(a) {
            a.wt = (0, g.B)() + a.o;
            S6(a, a.o)
        },
        S6 = function(a, b) {
            if (null != a.Si) throw Error("WatchDog timer not null");
            a.Si = T6((0, g.x)(a.IL, a), b)
        },
        U6 = function(a) { a.Si && (g.u.clearTimeout(a.Si), a.Si = null) },
        N6 = function(a) { a.g.tw() || a.Mg || a.g.Hn(a) },
        M6 = function(a) {
            U6(a);
            g.Ci(a.Sn);
            a.Sn = null;
            a.i.stop();
            g.FY(a.ba);
            if (a.sc) {
                var b = a.sc;
                a.sc = null;
                b.abort();
                b.dispose()
            }
            a.De && (a.De = null)
        },
        L6 = function(a, b) { try { a.g.rz(a, b), a.g.ye(4) } catch (c) {} },
        W6 = function(a, b, c, d, e) {
            if (0 == d) c(!1);
            else {
                var f = e || 0;
                d--;
                V6(a, b, function(k) { k ? c(!0) : g.u.setTimeout(function() { W6(a, b, c, d, f) }, f) })
            }
        },
        V6 = function(a, b, c) {
            var d = new Image;
            d.onload = function() { try { X6(d), c(!0) } catch (e) {} };
            d.onerror = function() { try { X6(d), c(!1) } catch (e) {} };
            d.onabort = function() { try { X6(d), c(!1) } catch (e) {} };
            d.ontimeout = function() { try { X6(d), c(!1) } catch (e) {} };
            g.u.setTimeout(function() { if (d.ontimeout) d.ontimeout() }, b);
            S5(d, a)
        },
        X6 = function(a) {
            a.onload = null;
            a.onerror = null;
            a.onabort = null;
            a.ontimeout = null
        },
        Y6 = function(a) {
            this.g = a;
            this.i = new y6
        },
        $6 = function(a) {
            var b = Z6(a.g, a.dj, "/mail/images/cleardot.gif");
            O5(b);
            W6(b.toString(), 5E3, (0, g.x)(a.tC, a), 3, 2E3);
            a.ye(1)
        },
        b7 = function(a) {
            var b = a.g.F;
            if (null != b) J6(5), b ? (J6(11), a7(a.g, a, !1)) : (J6(12), a7(a.g, a, !0));
            else if (a.Fd = new D6(a, void 0, void 0, void 0), a.Fd.Xg = a.tq, b = a.g, b = Z6(b, b.Lk() ? a.Gj : null, a.uq), J6(5), !g.Ld || g.md(10)) P5(b, "TYPE", "xmlhttp"), G6(a.Fd, b, !1, a.Gj, !1);
            else {
                P5(b, "TYPE", "html");
                var c = a.Fd;
                a = !!a.Gj;
                c.Yh = 3;
                c.Wf = O5(b.clone());
                R6(c, a)
            }
        },
        c7 = function(a) {
            g.rk.call(this);
            this.headers = new g.Im;
            this.M = a || null;
            this.i = !1;
            this.R = this.g = null;
            this.Y = this.D = "";
            this.u = 0;
            this.l = "";
            this.o = this.Z = this.C = this.P = !1;
            this.A = 0;
            this.F = null;
            this.W = "";
            this.I = this.S = !1
        },
        Pqa = function(a) { return g.Ld && g.ld(9) && g.Ga(a.timeout) && g.Da(a.ontimeout) },
        Qqa = function(a) { return "content-type" == a.toLowerCase() },
        f7 = function(a, b) {
            a.i = !1;
            a.g && (a.o = !0, a.g.abort(), a.o = !1);
            a.l = b;
            a.u = 5;
            d7(a);
            e7(a)
        },
        d7 = function(a) { a.P || (a.P = !0, a.dispatchEvent("complete"), a.dispatchEvent("error")) },
        i7 = function(a) {
            if (a.i && "undefined" != typeof g.JY)
                if (a.R[1] && 4 == g7(a) && 2 == a.getStatus()) h7(a, "Local request error detected and ignored");
                else if (a.C && 4 == g7(a)) g.cl(a.ww, 0, a);
            else if (a.dispatchEvent("readystatechange"), 4 == g7(a)) {
                h7(a, "Request complete");
                a.i = !1;
                try {
                    var b = a.getStatus();
                    a: switch (b) {
                        case 200:
                        case 201:
                        case 202:
                        case 204:
                        case 206:
                        case 304:
                        case 1223:
                            var c = !0;
                            break a;
                        default:
                            c = !1
                    }
                    var d;
                    if (!(d = c)) {
                        var e;
                        if (e = 0 === b) {
                            var f = g.wf(1, String(a.D));
                            if (!f && g.u.self && g.u.self.location) {
                                var k = g.u.self.location.protocol;
                                f = k.substr(0, k.length - 1)
                            }
                            e = !Rqa.test(f ? f.toLowerCase() : "")
                        }
                        d = e
                    }
                    if (d) a.dispatchEvent("complete"), a.dispatchEvent("success");
                    else {
                        a.u = 6;
                        try { var l = 2 < g7(a) ? a.g.statusText : "" } catch (m) { l = "" }
                        a.l = l + " [" + a.getStatus() + "]";
                        d7(a)
                    }
                } finally { e7(a) }
            }
        },
        e7 = function(a, b) {
            if (a.g) {
                j7(a);
                var c = a.g,
                    d = a.R[0] ? g.Ia : null;
                a.g = null;
                a.R = null;
                b || a.dispatchEvent("ready");
                try { c.onreadystatechange = d } catch (e) {}
            }
        },
        j7 = function(a) {
            a.g && a.I && (a.g.ontimeout = null);
            a.F && (g.u.clearTimeout(a.F), a.F = null)
        },
        g7 = function(a) { return a.g ? a.g.readyState : 0 },
        k7 = function(a) { try { return a.g ? a.g.responseText : "" } catch (b) { return "" } },
        h7 = function(a, b) { return b + " [" + a.Y + " " + a.D + " " + a.getStatus() + "]" },
        l7 = function(a, b, c) {
            this.g = 1;
            this.i = [];
            this.o = [];
            this.u = new y6;
            this.D = a || null;
            this.F = null != b ? b : null;
            this.A = c || !1
        },
        Sqa = function(a, b) {
            this.g = a;
            this.map = b;
            this.context = null
        },
        m7 = function(a) { g.Tj.call(this, "statevent", a) },
        n7 = function(a, b) {
            g.Tj.call(this, "timingevent", a);
            this.size = b
        },
        o7 = function(a) { g.Tj.call(this, "serverreachability", a) },
        s7 = function(a) {
            p7(a);
            if (3 == a.g) {
                var b = a.nk++,
                    c = a.fm.clone();
                N5(c, "SID", a.l);
                N5(c, "RID", b);
                N5(c, "TYPE", "terminate");
                q7(a, c);
                b = new D6(a, a.l, b, void 0);
                b.Yh = 2;
                b.Wf = O5(c.clone());
                S5(new Image, b.Wf.toString());
                b.Ci = (0, g.B)();
                H6(b)
            }
            r7(a)
        },
        u7 = function(a) {
            a.OC(1, 0);
            a.fm = Z6(a, null, a.rq);
            t7(a)
        },
        p7 = function(a) {
            a.dg && (a.dg.abort(), a.dg = null);
            a.Rb && (a.Rb.cancel(), a.Rb = null);
            a.mf && (g.u.clearTimeout(a.mf), a.mf = null);
            v7(a);
            a.Bd && (a.Bd.cancel(), a.Bd = null);
            a.lg && (g.u.clearTimeout(a.lg), a.lg = null)
        },
        w7 = function(a, b) {
            if (0 == a.g) throw Error("Invalid operation: sending map when state is closed");
            a.i.push(new Sqa(a.NH++, b));
            2 != a.g && 3 != a.g || t7(a)
        },
        t7 = function(a) { a.Bd || a.lg || (a.lg = T6((0, g.x)(a.xz, a), 0), a.Rh = 0) },
        z7 = function(a, b) {
            if (1 == a.g) {
                if (!b) {
                    a.nk = Math.floor(1E5 * Math.random());
                    var c = a.nk++,
                        d = new D6(a, "", c, void 0);
                    d.Xg = null;
                    var e = x7(a),
                        f = a.fm.clone();
                    N5(f, "RID", c);
                    N5(f, "CVER", "1");
                    q7(a, f);
                    F6(d, f, e);
                    a.Bd = d;
                    a.g = 2
                }
            } else 3 == a.g && (b ? y7(a, b) : 0 == a.i.length || a.Bd || y7(a))
        },
        y7 = function(a, b) {
            if (b)
                if (6 < a.Ng) {
                    a.i = a.o.concat(a.i);
                    a.o.length = 0;
                    var c = a.nk - 1;
                    var d = x7(a)
                } else c = b.C, d = b.qh;
            else c = a.nk++, d = x7(a);
            var e = a.fm.clone();
            N5(e, "SID", a.l);
            N5(e, "RID", c);
            N5(e, "AID", a.ki);
            q7(a, e);
            c = new D6(a, a.l, c, a.Rh + 1);
            c.Xg = null;
            c.setTimeout(1E4 + Math.round(1E4 * Math.random()));
            a.Bd = c;
            F6(c, e, d)
        },
        q7 = function(a, b) {
            if (a.Tc) {
                var c = a.Tc.Sv();
                c && g.Mb(c, function(d, e) { N5(b, e, d) })
            }
        },
        x7 = function(a) {
            var b = Math.min(a.i.length, 1E3),
                c = ["count=" + b];
            if (6 < a.Ng && 0 < b) {
                var d = a.i[0].g;
                c.push("ofs=" + d)
            } else d = 0;
            for (var e = 0; e < b; e++) {
                var f = a.i[e].g,
                    k = a.i[e].map;
                f = 6 >= a.Ng ? e : f - d;
                try { g.Mb(k, function(l, m) { c.push("req" + f + "_" + m + "=" + encodeURIComponent(l)) }) } catch (l) { c.push("req" + f + "_type=" + encodeURIComponent("_badmap")) }
            }
            a.o = a.o.concat(a.i.splice(0, b));
            return c.join("&")
        },
        A7 = function(a) { a.Rb || a.mf || (a.C = 1, a.mf = T6((0, g.x)(a.wz, a), 0), a.Kh = 0) },
        B7 = function(a) {
            if (a.Rb || a.mf || 3 <= a.Kh) return !1;
            a.C++;
            a.mf = T6((0, g.x)(a.wz, a), Tqa(a, a.Kh));
            a.Kh++;
            return !0
        },
        a7 = function(a, b, c) {
            a.Ao = c;
            a.Ie = b.Af;
            a.A || u7(a)
        },
        v7 = function(a) { null != a.Rg && (g.u.clearTimeout(a.Rg), a.Rg = null) },
        Tqa = function(a, b) {
            var c = 5E3 + Math.floor(1E4 * Math.random());
            a.isActive() || (c *= 2);
            return c * b
        },
        C7 = function(a, b) {
            if (2 == b || 9 == b) {
                var c = null;
                a.Tc && (c = null);
                var d = (0, g.x)(a.OM, a);
                c || (c = new g.Lm("//www.google.com/images/cleardot.gif"), O5(c));
                V6(c.toString(), 1E4, d)
            } else J6(2);
            Uqa(a, b)
        },
        Uqa = function(a, b) {
            a.g = 0;
            a.Tc && a.Tc.Pu(b);
            r7(a);
            p7(a)
        },
        r7 = function(a) {
            a.g = 0;
            a.Ie = -1;
            if (a.Tc)
                if (0 == a.o.length && 0 == a.i.length) a.Tc.Ap();
                else {
                    g.jb(a.o);
                    var b = g.jb(a.i);
                    a.o.length = 0;
                    a.i.length = 0;
                    a.Tc.Ap(b)
                }
        },
        Z6 = function(a, b, c) {
            var d = g.Tm(c);
            if ("" != d.g) b && g.Nm(d, b + "." + d.g), g.Om(d, d.u);
            else {
                var e = window.location;
                d = Bqa(e.protocol, b ? b + "." + e.hostname : e.hostname, +e.port, c)
            }
            a.qj && g.Mb(a.qj, function(f, k) { N5(d, k, f) });
            N5(d, "VER", a.Ng);
            q7(a, d);
            return d
        },
        T6 = function(a, b) {
            if (!g.Na(a)) throw Error("Fn must not be null and must be a function");
            return g.u.setTimeout(function() { a() }, b)
        },
        J6 = function(a) { D7.dispatchEvent(new m7(D7, a)) },
        Vqa = function() {},
        Wqa = function() {
            this.g = [];
            this.i = []
        },
        Xqa = function(a, b) {
            this.action = a;
            this.params = b || {}
        },
        E7 = function(a, b) {
            g.F.call(this);
            this.g = new g.J(this.qL, 0, this);
            g.I(this, this.g);
            this.Wc = 5E3;
            this.i = 0;
            if (g.Na(a)) b && (a = (0, g.x)(a, b));
            else if (a && g.Na(a.handleEvent)) a = (0, g.x)(a.handleEvent, a);
            else throw Error("Invalid listener argument");
            this.l = a
        },
        F7 = function(a, b, c) {
            this.H = a;
            this.A = b;
            this.l = new g.Un;
            this.i = new E7(this.sM, this);
            this.g = null;
            this.gb = !1;
            this.u = null;
            this.F = "";
            this.D = this.o = 0;
            this.C = [];
            this.I = c || !1
        },
        Yqa = function(a) {
            return {
                firstTestResults: [""],
                secondTestResults: !a.g.Ao,
                sessionId: a.g.l,
                arrayId: a.g.ki
            }
        },
        Zqa = function(a, b) {
            a.D = b || 0;
            a.i.stop();
            a.g && (3 == a.g.g && z7(a.g), s7(a.g));
            a.D = 0
        },
        G7 = function(a) { return !!a.g && 3 == a.g.g },
        $qa = function(a, b) {
            (a.A.loungeIdToken = b) || a.i.stop()
        },
        H7 = function(a) {
            this.port = this.domain = "";
            this.g = "/api/lounge";
            this.i = !0;
            a = a || document.location.href;
            var b = Number(g.wf(4, a)) || "";
            b && (this.port = ":" + b);
            this.domain = g.xf(a) || "";
            a = g.Kb;
            0 <= a.search("MSIE") && (a = a.match(/MSIE ([\d.]+)/)[1], 0 > g.Jb(a, "10.0") && (this.i = !1))
        },
        I7 = function(a, b) {
            var c = a.g;
            if (g.Da(void 0) ? 0 : a.i) c = "https://" + a.domain + a.port + a.g;
            return g.Gf(c + b, {})
        },
        J7 = function(a, b, c, d, e) {
            a = {
                format: "JSON",
                method: "POST",
                context: a,
                timeout: 5E3,
                withCredentials: !1,
                onSuccess: g.Ra(a.o, d, !0),
                onError: g.Ra(a.l, e),
                Td: g.Ra(a.u, e)
            };
            c && (a.ub = c, a.headers = { "Content-Type": "application/x-www-form-urlencoded" });
            return g.Wp(b, a)
        },
        dra = function() {
            var a = ara;
            bra();
            K7.push(a);
            cra(K7)
        },
        L7 = function(a, b) {
            bra();
            var c = K7,
                d = era(a, String(b));
            g.cb(c) ? fra(d) : (cra(c), (0, g.y)(c, function(e) { e(d) }))
        },
        bra = function() { K7 || (K7 = g.v("yt.mdx.remote.debug.handlers_") || [], g.Ha("yt.mdx.remote.debug.handlers_", K7, void 0)) },
        fra = function(a) {
            var b = (M7 + 1) % 50;
            M7 = b;
            N7[b] = a;
            O7 || (O7 = 49 == b)
        },
        cra = function(a) {
            var b = N7;
            if (b[0]) {
                var c = M7,
                    d = O7 ? c : -1;
                do {
                    d = (d + 1) % 50;
                    var e = b[d];
                    (0, g.y)(a, function(f) { f(e) })
                } while (d != c);
                N7 = Array(50);
                M7 = -1;
                O7 = !1
            }
        },
        era = function(a, b) {
            var c = ((0, g.B)() - gra) / 1E3;
            c.toFixed && (c = c.toFixed(3));
            var d = [];
            d.push("[", c + "s", "] ");
            d.push("[", "yt.mdx.remote", "] ");
            d.push(a + ": " + b, "\n");
            return d.join("")
        },
        P7 = function(a) {
            g.N.call(this);
            this.C = a;
            this.g = []
        },
        hra = function(a, b) {
            var c = a.get(b.uuid) || a.get(b.id);
            if (c) {
                var d = c.name;
                c.id = b.id || c.id;
                c.name = b.name;
                c.token = b.token;
                c.uuid = b.uuid || c.uuid;
                return c.name != d
            }
            a.g.push(b);
            return !0
        },
        ira = function(a, b) {
            var c = a.g.length != b.length;
            a.g = (0, g.Xd)(a.g, function(f) { return !!c6(b, f) });
            for (var d = 0, e = b.length; d < e; d++) c = hra(a, b[d]) || c;
            return c
        },
        jra = function(a, b) {
            var c = a.g.length;
            a.g = (0, g.Xd)(a.g, function(d) { return !(d || b ? !d != !b ? 0 : d.id == b.id : 1) });
            return a.g.length < c
        },
        Q7 = function(a, b, c, d) {
            g.N.call(this);
            this.A = a;
            this.u = b;
            this.l = c;
            this.o = d;
            this.i = 0;
            this.g = null;
            this.Ba = NaN
        },
        S7 = function(a) {
            P7.call(this, "LocalScreenService");
            this.l = a;
            this.i = NaN;
            R7(this);
            this.info("Initializing with " + a6(this.g))
        },
        kra = function(a) {
            if (a.g.length) {
                var b = (0, g.A)(a.g, function(d) { return d.id }),
                    c = I7(a.l, "/pairing/get_lounge_token_batch");
                J7(a.l, c, { screen_ids: b.join(",") }, (0, g.x)(a.yD, a), (0, g.x)(a.xD, a))
            }
        },
        R7 = function(a) {
            var b = Z5(l6());
            b = (0, g.Xd)(b, function(c) { return !c.uuid });
            return ira(a, b)
        },
        T7 = function(a, b) {
            Jqa((0, g.A)(a.g, Y5));
            b && m6()
        },
        V7 = function(a, b) {
            g.N.call(this);
            this.A = b;
            var c = g.Ws("yt-remote-online-screen-ids") || "";
            c = c ? c.split(",") : [];
            for (var d = {}, e = this.A(), f = 0, k = e.length; f < k; ++f) {
                var l = e[f].id;
                d[l] = g.bb(c, l)
            }
            this.g = d;
            this.u = a;
            this.l = this.o = NaN;
            this.i = null;
            U7("Initialized with " + g.um(this.g))
        },
        lra = function(a, b, c) {
            var d = I7(a.u, "/pairing/get_screen_availability");
            J7(a.u, d, { lounge_token: b.token }, (0, g.x)(function(e) {
                e = e.screens || [];
                for (var f = 0, k = e.length; f < k; ++f)
                    if (e[f].loungeToken == b.token) { c("online" == e[f].status); return }
                c(!1)
            }, a), (0, g.x)(function() { c(!1) }, a))
        },
        W7 = function(a, b) {
            a: if (R5(b) != R5(a.g)) var c = !1;
                else {
                    c = g.Tb(b);
                    for (var d = 0, e = c.length; d < e; ++d)
                        if (!a.g[c[d]]) { c = !1; break a }
                    c = !0
                }c || (U7("Updated online screens: " + g.um(a.g)), a.g = b, a.N("screenChange"));mra(a)
        },
        X7 = function(a) {
            isNaN(a.l) || g.ap(a.l);
            a.l = g.Zo((0, g.x)(a.Cs, a), 0 < a.o && a.o < (0, g.B)() ? 2E4 : 1E4)
        },
        U7 = function(a) { L7("OnlineScreenService", a) },
        nra = function(a) {
            var b = {};
            (0, g.y)(a.A(), function(c) { c.token ? b[c.token] = c.id : this.Ib("Requesting availability of screen w/o lounge token.") });
            return b
        },
        mra = function(a) {
            a = g.Tb(g.Nb(a.g, function(b) { return b }));
            g.sb(a);
            a.length ? g.Vs("yt-remote-online-screen-ids", a.join(","), 60) : e6("yt-remote-online-screen-ids")
        },
        Y7 = function(a) {
            P7.call(this, "ScreenService");
            this.A = a;
            this.i = this.l = null;
            this.o = [];
            this.u = {};
            ora(this)
        },
        qra = function(a, b, c, d, e, f) {
            a.info("getAutomaticScreenByIds " + c + " / " + b);
            c || (c = a.u[b]);
            var k = a.Pd();
            if (k = (c ? d6(k, c) : null) || d6(k, b)) {
                k.uuid = b;
                var l = Z7(a, k);
                lra(a.i, l, function(m) { e(m ? l : null) })
            } else c ? pra(a, c, (0, g.x)(function(m) {
                var n = Z7(this, new W5({
                    name: d,
                    screenId: c,
                    loungeToken: m,
                    dialId: b || ""
                }));
                lra(this.i, n, function(q) { e(q ? n : null) })
            }, a), f) : e(null)
        },
        rra = function(a, b) {
            for (var c = 0, d = a.g.length; c < d; ++c)
                if (a.g[c].name == b) return a.g[c];
            return null
        },
        pra = function(a, b, c, d) {
            a.info("requestLoungeToken_ for " + b);
            var e = {
                ub: { screen_ids: b },
                method: "POST",
                context: a,
                onSuccess: function(f, k) {
                    var l = k && k.screens || [];
                    l[0] && l[0].screenId == b ? c(l[0].loungeToken) : d(Error("Missing lounge token in token response"))
                },
                onError: function() { d(Error("Request screen lounge token failed")) }
            };
            g.Wp(I7(a.A, "/pairing/get_lounge_token_batch"), e)
        },
        sra = function(a) {
            a.g = a.l.Pd();
            var b = a.u,
                c = {},
                d;
            for (d in b) c[b[d]] = d;
            b = 0;
            for (d = a.g.length; b < d; ++b) {
                var e = a.g[b];
                e.uuid = c[e.id] || ""
            }
            a.info("Updated manual screens: " + a6(a.g))
        },
        ora = function(a) {
            $7(a);
            a.l = new S7(a.A);
            a.l.subscribe("screenChange", (0, g.x)(a.GD, a));
            sra(a);
            a.o = Z5(g.Ws("yt-remote-automatic-screen-cache") || []);
            $7(a);
            a.info("Initializing automatic screens: " + a6(a.o));
            a.i = new V7(a.A, (0, g.x)(a.Pd, a, !0));
            a.i.subscribe("screenChange", (0, g.x)(function() { this.N("onlineScreenChange") }, a))
        },
        Z7 = function(a, b) {
            var c = a.get(b.id);
            c ? (c.uuid = b.uuid, b = c) : ((c = d6(a.o, b.uuid)) ? (c.id = b.id, c.token = b.token, b = c) : a.o.push(b), g.Vs("yt-remote-automatic-screen-cache", (0, g.A)(a.o, Y5)));
            $7(a);
            a.u[b.uuid] = b.id;
            g.Vs("yt-remote-device-id-map", a.u, 31536E3);
            return b
        },
        $7 = function(a) { a.u = g.Ws("yt-remote-device-id-map") || {} },
        a8 = function(a, b, c) {
            g.N.call(this);
            this.R = c;
            this.F = a;
            this.i = b;
            this.l = null
        },
        b8 = function(a, b) { L7(a.R, b) },
        c8 = function(a, b) {
            a8.call(this, a, b, "CastSession");
            this.g = null;
            this.o = 0;
            this.A = (0, g.x)(this.uN, this);
            this.u = (0, g.x)(this.TL, this);
            this.o = g.Zo((0, g.x)(function() { tra(this, null) }, this), 12E4)
        },
        ura = function(a) {
            a.info("sendYoutubeMessage_: getMdxSessionStatus " + g.um(void 0));
            var b = { type: "getMdxSessionStatus" };
            a.g ? a.g.sendMessage("urn:x-cast:com.google.youtube.mdx", b, g.Ia, (0, g.x)(function() { b8(this, "Failed to send message: getMdxSessionStatus.") }, a)) : b8(a, "Sending yt message without session: " + g.um(b))
        },
        tra = function(a, b) {
            g.ap(a.o);
            if (b) {
                if (a.info("onConnectedScreenId_: Received screenId: " + b), !a.l || a.l.id != b) {
                    var c = (0, g.x)(a.Jn, a),
                        d = (0, g.x)(a.Sd, a);
                    a.kw(b, c, d, 5)
                }
            } else a.Sd(Error("Waiting for session status timed out."))
        },
        d8 = function(a, b, c) {
            a8.call(this, a, b, "DialSession");
            this.o = this.D = null;
            this.H = "";
            this.M = c;
            this.u = null;
            this.C = g.Ia;
            this.A = NaN;
            this.I = (0, g.x)(this.xN, this);
            this.g = g.Ia
        },
        vra = function(a) {
            a.g = a.F.tB(a.H, a.i.label, a.i.friendlyName, (0, g.x)(function(b) {
                this.g = g.Ia;
                this.Jn(b)
            }, a), (0, g.x)(function(b) {
                this.g = g.Ia;
                this.Sd(b)
            }, a))
        },
        wra = function(a) {
            var b = {};
            b.pairingCode = a.H;
            b.theme = a.M;
            if (a.u) {
                var c = a.u.currentTime || 0;
                b.v = a.u.videoId;
                b.t = c
            }
            p6() && (b.env_useStageMdx = 1);
            return g.Ef(b)
        },
        e8 = function(a, b) {
            a8.call(this, a, b, "ManualSession");
            this.g = g.Zo((0, g.x)(this.li, this, null), 150)
        },
        f8 = function(a, b, c, d) {
            g.N.call(this);
            this.i = a;
            this.C = b || "233637DE";
            this.A = c || "cl";
            this.D = d || !1;
            this.g = null;
            this.u = !1;
            this.l = [];
            this.o = (0, g.x)(this.yK, this)
        },
        xra = function(a, b) { return b ? g.Za(a.l, function(c) { return X5(b, c.label) }, a) : null },
        g8 = function(a) { L7("Controller", a) },
        ara = function(a) { window.chrome && chrome.cast && chrome.cast.logMessage && chrome.cast.logMessage(a) },
        h8 = function(a) { return a.u || !!a.l.length || !!a.g },
        i8 = function(a, b, c) {
            b != a.g && (g.Ci(a.g), (a.g = b) ? (c ? a.N("yt-remote-cast2-receiver-resumed", b.i) : a.N("yt-remote-cast2-receiver-selected",
                b.i), b.subscribe("sessionScreen", (0, g.x)(a.vz, a, b)), b.l ? a.N("yt-remote-cast2-session-change", b.l) : c && a.g.li(null)) : a.N("yt-remote-cast2-session-change", null))
        },
        yra = function(a) {
            var b = a.i.sB(),
                c = a.g && a.g.i;
            a = (0, g.A)(b, function(d) {
                c && X5(d, c.label) && (c = null);
                var e = d.uuid ? d.uuid : d.id,
                    f = xra(this, d);
                f ? (f.label = e, f.friendlyName = d.name) : (f = new chrome.cast.Receiver(e, d.name), f.receiverType = chrome.cast.ReceiverType.CUSTOM);
                return f
            }, a);
            c && (c.receiverType != chrome.cast.ReceiverType.CUSTOM && (c = new chrome.cast.Receiver(c.label, c.friendlyName), c.receiverType = chrome.cast.ReceiverType.CUSTOM), a.push(c));
            return a
        },
        Era = function(a, b, c, d, e, f, k) {
            zra() ? Ara(b, e, f, k) && (k8(!0), window.chrome && chrome.cast && chrome.cast.isAvailable ? Bra(a, c) : (window.__onGCastApiAvailable = function(l, m) { l ? Bra(a, c) : (l8("Failed to load cast API: " + m), m8(!1), k8(!1), e6("yt-remote-cast-available"), e6("yt-remote-cast-receiver"), Cra(), c(!1)) }, d ? g.lp("https://www.gstatic.com/cv/js/sender/v1/cast_sender.js") :
                0 <= window.navigator.userAgent.indexOf("Android") && 0 <= window.navigator.userAgent.indexOf("Chrome/") && window.navigator.presentation ? Nqa() : !window.chrome || !window.navigator.presentation || 0 <= window.navigator.userAgent.indexOf("Edge") ? u6() : (v6(), t6(Dra.map(Lqa))))) : j8("Cannot initialize because not running Chrome")
        },
        Cra = function() {
            j8("dispose");
            var a = n8();
            a && a.dispose();
            g.Ha("yt.mdx.remote.cloudview.instance_", null, void 0);
            Fra(!1);
            g.gp(o8);
            o8.length = 0
        },
        p8 = function() { return !!g.Ws("yt-remote-cast-installed") },
        Gra = function() {
            var a = g.Ws("yt-remote-cast-receiver");
            return a ? a.friendlyName : null
        },
        Hra = function() {
            j8("clearCurrentReceiver");
            e6("yt-remote-cast-receiver")
        },
        Ira = function() { return p8() ? n8() ? n8().getCastSession() : (l8("getCastSelector: Cast is not initialized."), null) : (l8("getCastSelector: Cast API is not installed!"), null) },
        r8 = function() { p8() ? n8() ? q8() ? (j8("Requesting cast selector."), n8().requestSession()) : (j8("Wait for cast API to be ready to request the session."), o8.push(g.fp("yt-remote-cast2-api-ready", r8))) : l8("requestCastSelector: Cast is not initialized.") : l8("requestCastSelector: Cast API is not installed!") },
        s8 =
        function(a, b) { q8() ? n8().setConnectedScreenStatus(a, b) : l8("setConnectedScreenStatus called before ready.") },
        zra = function() {
            var a = 0 <= g.Kb.search(/ (CrMo|Chrome|CriOS)\//);
            return g.Lw || a
        },
        Jra = function(a, b) { n8().init(a, b) },
        Ara = function(a, b, c, d) {
            var e = !1;
            n8() || (a = new f8(a, b, c, d), a.subscribe("yt-remote-cast2-availability-change", function(f) {
                g.Vs("yt-remote-cast-available", f);
                U5("yt-remote-cast2-availability-change", f)
            }), a.subscribe("yt-remote-cast2-receiver-selected", function(f) {
                j8("onReceiverSelected: " + f.friendlyName);
                g.Vs("yt-remote-cast-receiver", f);
                U5("yt-remote-cast2-receiver-selected", f)
            }), a.subscribe("yt-remote-cast2-receiver-resumed", function(f) {
                j8("onReceiverResumed: " + f.friendlyName);
                g.Vs("yt-remote-cast-receiver", f)
            }), a.subscribe("yt-remote-cast2-session-change", function(f) {
                j8("onSessionChange: " + $5(f));
                f || e6("yt-remote-cast-receiver");
                U5("yt-remote-cast2-session-change", f)
            }), g.Ha("yt.mdx.remote.cloudview.instance_", a, void 0), e = !0);
            j8("cloudview.createSingleton_: " + e);
            return e
        },
        n8 = function() { return g.v("yt.mdx.remote.cloudview.instance_") },
        Bra = function(a, b) {
            m8(!0);
            k8(!1);
            Jra(a, function(c) {
                c ? (Fra(!0), g.ip("yt-remote-cast2-api-ready")) : (l8("Failed to initialize cast API."), m8(!1), e6("yt-remote-cast-available"), e6("yt-remote-cast-receiver"), Cra());
                b(c)
            })
        },
        j8 = function(a) { L7("cloudview", a) },
        l8 = function(a) { L7("cloudview", a) },
        m8 = function(a) {
            j8("setCastInstalled_ " + a);
            g.Vs("yt-remote-cast-installed", a)
        },
        q8 = function() { return !!g.v("yt.mdx.remote.cloudview.apiReady_") },
        Fra = function(a) {
            j8("setApiReady_ " + a);
            g.Ha("yt.mdx.remote.cloudview.apiReady_", a, void 0)
        },
        k8 = function(a) { g.Ha("yt.mdx.remote.cloudview.initializing_", a, void 0) },
        t8 = function(a) {
            this.index = -1;
            this.videoId = this.listId = "";
            this.volume = this.playerState = -1;
            this.muted = !1;
            this.audioTrackId = null;
            this.A = this.C = 0;
            this.g = null;
            this.hasNext = this.Je = !1;
            this.F = this.D = this.i = this.o = 0;
            this.l = NaN;
            this.u = !1;
            this.reset(a)
        },
        u8 = function(a) {
            a.audioTrackId = null;
            a.g = null;
            a.playerState = -1;
            a.Je = !1;
            a.hasNext = !1;
            a.C = 0;
            a.A = (0, g.B)();
            a.o = 0;
            a.i = 0;
            a.D = 0;
            a.F = 0;
            a.l = NaN;
            a.u = !1
        },
        v8 = function(a) { return 1 == a.playerState ? ((0, g.B)() - a.A) / 1E3 : 0 },
        w8 = function(a, b) {
            a.C = b;
            a.A = (0, g.B)()
        },
        x8 = function(a) {
            switch (a.playerState) {
                case 1:
                case 1081:
                    return ((0, g.B)() - a.A) / 1E3 + a.C;
                case -1E3:
                    return 0
            }
            return a.C
        },
        y8 = function(a, b, c) {
            var d = a.videoId;
            a.videoId = b;
            a.index = c;
            b != d && u8(a)
        },
        z8 = function(a) {
            var b = {};
            b.index = a.index;
            b.listId = a.listId;
            b.videoId = a.videoId;
            b.playerState = a.playerState;
            b.volume = a.volume;
            b.muted = a.muted;
            b.audioTrackId = a.audioTrackId;
            b.trackData = g.ec(a.g);
            b.hasPrevious = a.Je;
            b.hasNext = a.hasNext;
            b.playerTime = a.C;
            b.playerTimeAt = a.A;
            b.seekableStart = a.o;
            b.seekableEnd = a.i;
            b.duration = a.D;
            b.loadedTime = a.F;
            b.liveIngestionTime = a.l;
            return b
        },
        B8 = function(a, b) {
            g.N.call(this);
            this.g = 0;
            this.o = a;
            this.A = [];
            this.u = new Wqa;
            this.l = this.i = null;
            this.F = (0, g.x)(this.wI, this);
            this.C = (0, g.x)(this.rk, this);
            this.D = (0, g.x)(this.uI, this);
            this.H = (0, g.x)(this.KI, this);
            var c = 0;
            a ? (c = a.getProxyState(), 3 != c && (a.subscribe("proxyStateChange", this.At, this), Kra(this))) : c = 3;
            0 != c && (b ? this.At(c) : g.Zo((0, g.x)(function() { this.At(c) }, this), 0));
            var d = Ira();
            d && A8(this, d);
            this.subscribe("yt-remote-cast2-session-change", this.H)
        },
        C8 = function(a) { return new t8(a.o.getPlayerContextData()) },
        Kra = function(a) {
            (0, g.y)("nowAutoplaying autoplayDismissed remotePlayerChange remoteQueueChange autoplayModeChange autoplayUpNext previousNextChange".split(" "), function(b) { this.A.push(this.o.subscribe(b, g.Ra(this.vK, b), this)) }, a)
        },
        Lra = function(a) {
            (0, g.y)(a.A, function(b) { this.o.unsubscribeByKey(b) }, a);
            a.A.length = 0
        },
        D8 = function(a, b) {
            var c = a.u;
            50 > c.g.length + c.i.length && a.u.i.push(b)
        },
        F8 = function(a, b, c) {
            var d = C8(a);
            w8(d, c); - 1E3 != d.playerState && (d.playerState = b);
            E8(a, d)
        },
        G8 = function(a, b, c) { a.o.sendMessage(b, c) },
        E8 = function(a, b) {
            Lra(a);
            a.o.setPlayerContextData(z8(b));
            Kra(a)
        },
        A8 = function(a, b) {
            a.l && (a.l.removeUpdateListener(a.F), a.l.removeMediaListener(a.C), a.rk(null));
            a.l = b;
            a.l && (L7("CP", "Setting cast session: " + a.l.sessionId), a.l.addUpdateListener(a.F), a.l.addMediaListener(a.C), a.l.media.length && a.rk(a.l.media[0]))
        },
        Mra = function(a) {
            var b = a.i.media,
                c = a.i.customData;
            if (b && c) {
                var d = C8(a);
                b.contentId != d.videoId && L7("CP", "Cast changing video to: " + b.contentId);
                d.videoId = b.contentId;
                d.playerState = c.playerState;
                w8(d, a.i.getEstimatedTime());
                E8(a, d)
            } else L7("CP", "No cast media video. Ignoring state update.")
        },
        H8 = function(a, b, c) {
            return (0, g.x)(function(d) {
                this.Ib("Failed to " + b + " with cast v2 channel. Error code: " + d.code);
                d.code != chrome.cast.ErrorCode.TIMEOUT && (this.Ib("Retrying " + b + " using MDx browser channel."), G8(this, b, c))
            }, a)
        },
        I8 = function(a, b, c) {
            g.N.call(this);
            this.u = NaN;
            this.I = !1;
            this.D = this.C = this.F = this.H = NaN;
            this.R = [];
            this.o = this.A = this.l = this.Oa = this.g = null;
            this.P = a;
            this.R.push(g.rr(window, "beforeunload", (0, g.x)(this.rD, this)));
            this.i = [];
            this.Oa = new t8;
            this.M = b.id;
            this.g = Nra(this, c);
            this.g.subscribe("handlerOpened", this.AI, this);
            this.g.subscribe("handlerClosed", this.xI, this);
            this.g.subscribe("handlerError", this.yI, this);
            this.g.subscribe("handlerMessage", this.zI, this);
            $qa(this.g, b.token);
            this.subscribe("remoteQueueChange", function() {
                var d = this.Oa.videoId;
                g.Xs() && g.Vs("yt-remote-session-video-id", d)
            }, this)
        },
        J8 = function(a) { L7("conn", a) },
        Nra = function(a, b) { return new F7(I7(a.P, "/bc"), b) },
        K8 = function(a, b) { a.N("proxyStateChange", b) },
        Ora = function(a) {
            a.u = g.Zo((0, g.x)(function() {
                J8("Connecting timeout");
                this.Oh(1)
            }, a), 2E4)
        },
        L8 = function(a) {
            g.ap(a.u);
            a.u = NaN
        },
        M8 = function(a) {
            g.ap(a.H);
            a.H = NaN
        },
        Pra = function(a) {
            N8(a);
            a.F = g.Zo((0, g.x)(function() { O8(this, "getNowPlaying") }, a), 2E4)
        },
        N8 = function(a) {
            g.ap(a.F);
            a.F = NaN
        },
        Rra = function(a, b) {
            b && (L8(a), M8(a));
            b == (G7(a.g) && isNaN(a.u)) ? b && (K8(a, 1), O8(a, "getSubtitlesTrack")) : b ? (a.iw() && a.Oa.reset(), K8(a, 1), O8(a, "getNowPlaying"), Qra(a)) : a.Oh(1)
        },
        Sra = function(a, b) {
            var c = b.params.videoId;
            delete b.params.videoId;
            c == a.Oa.videoId && (g.Zb(b.params) ? a.Oa.g = null : a.Oa.g = b.params, a.N("remotePlayerChange"))
        },
        Tra = function(a, b) {
            var c = b.params.videoId || b.params.video_id,
                d = parseInt(b.params.currentIndex, 10);
            a.Oa.listId = b.params.listId || a.Oa.listId;
            y8(a.Oa, c, d);
            a.N("remoteQueueChange")
        },
        Vra = function(a, b) {
            b.params = b.params || {};
            Tra(a, b);
            Ura(a, b);
            a.N("autoplayDismissed")
        },
        Ura = function(a, b) {
            var c = parseInt(b.params.currentTime || b.params.current_time, 10);
            w8(a.Oa, isNaN(c) ? 0 : c);
            c = parseInt(b.params.state, 10);
            c = isNaN(c) ? -1 : c; - 1 == c && -1E3 == a.Oa.playerState && (c = -1E3);
            a.Oa.playerState = c;
            c = Number(b.params.loadedTime);
            a.Oa.F = isNaN(c) ? 0 : c;
            c = Number(b.params.duration);
            a.Oa.D = isNaN(c) ? 0 : c;
            c = a.Oa;
            var d = Number(b.params.liveIngestionTime);
            c.l = d;
            c.u = isNaN(d) ? !1 : !0;
            c = a.Oa;
            d = Number(b.params.seekableStartTime);
            var e = Number(b.params.seekableEndTime);
            c.o = isNaN(d) ? 0 : d;
            c.i = isNaN(e) ? 0 : e;
            1 == a.Oa.playerState ? Pra(a) : N8(a);
            a.N("remotePlayerChange")
        },
        Wra = function(a, b) {
            if (-1E3 !=
                a.Oa.playerState) {
                var c = 1085;
                switch (parseInt(b.params.adState, 10)) {
                    case 1:
                        c = 1081;
                        break;
                    case 2:
                        c = 1084;
                        break;
                    case 0:
                        c = 1083
                }
                a.Oa.playerState = c;
                c = parseInt(b.params.currentTime, 10);
                w8(a.Oa, isNaN(c) ? 0 : c);
                a.N("remotePlayerChange")
            }
        },
        Xra = function(a, b) {
            var c = "true" == b.params.muted;
            a.Oa.volume = parseInt(b.params.volume, 10);
            a.Oa.muted = c;
            a.N("remotePlayerChange")
        },
        Yra = function(a, b) {
            a.A = b.params.videoId;
            a.N("nowAutoplaying", parseInt(b.params.timeout, 10))
        },
        Zra = function(a, b) {
            var c = "true" == b.params.hasNext;
            a.Oa.Je = "true" == b.params.hasPrevious;
            a.Oa.hasNext = c;
            a.N("previousNextChange")
        },
        Qra = function(a) {
            g.ap(a.D);
            a.D = g.Zo((0, g.x)(a.Oh, a, 1), 864E5)
        },
        O8 = function(a, b, c) {
            c ? J8("Sending: action=" + b + ", params=" + g.um(c)) : J8("Sending: action=" + b);
            a.g.sendMessage(b, c)
        },
        P8 = function(a) {
            P7.call(this, "ScreenServiceProxy");
            this.Vc = a;
            this.i = [];
            this.i.push(this.Vc.$_s("screenChange", (0, g.x)(this.sN, this)));
            this.i.push(this.Vc.$_s("onlineScreenChange", (0, g.x)(this.aK, this)))
        },
        dsa = function(a) {
            var b = {
                device: "Desktop",
                app: "youtube-desktop"
            };
            b = g.Ro("MDX_CONFIG") || b;
            Hqa();
            j6();
            Q8 || (Q8 = new H7(b ? b.loungeApiHost : void 0), p6() && (Q8.g = "/api/loungedev"));
            R8 || (R8 = g.v("yt.mdx.remote.deferredProxies_") || [], g.Ha("yt.mdx.remote.deferredProxies_", R8, void 0));
            $ra();
            var c = S8();
            if (!c) {
                var d = new Y7(Q8);
                g.Ha("yt.mdx.remote.screenService_", d, void 0);
                c = S8();
                var e = !1,
                    f = void 0,
                    k = void 0,
                    l = !1;
                b && (e = !!b.loadCastApiSetupScript, f = b.appId, k = b.theme, l = !!b.disableDial);
                Era(a, d, function(m) {
                    m ? T8() && s8(T8(), "YouTube TV") : d.subscribe("onlineScreenChange",
                        function() { U5("yt-remote-receiver-availability-change") })
                }, e, f, k, l)
            }
            b && !g.v("yt.mdx.remote.initialized_") && (g.Ha("yt.mdx.remote.initialized_", !0, void 0), U8("Initializing: " + g.um(b)), V8.push(g.fp("yt-remote-cast2-availability-change", function() { U5("yt-remote-receiver-availability-change") })), V8.push(g.fp("yt-remote-cast2-receiver-selected", function() {
                W8(null);
                U5("yt-remote-auto-connect", "cast-selector-receiver")
            })), V8.push(g.fp("yt-remote-cast2-receiver-resumed", function() { U5("yt-remote-receiver-resumed", "cast-selector-receiver") })), V8.push(g.fp("yt-remote-cast2-session-change", asa)), V8.push(g.fp("yt-remote-connection-change", function(m) { m ? s8(T8(), "YouTube TV") : X8() || (s8(null, null), Hra()) })), a = Y8(), b.isAuto && (a.id += "#dial"), g.Np("desktop_enable_autoplay") && (a.capabilities = ["atp"]), a.name = b.device, a.app = b.app, (k = b.theme) && (a.theme = k), U8(" -- with channel params: " +
                g.um(a)), bsa(a), c.start(), T8() || csa())
        },
        fsa = function() {
            var a = esa();
            p8() && g.Ws("yt-remote-cast-available") && a.push({ key: "cast-selector-receiver", name: "Cast..." });
            return a
        },
        esa = function() {
            var a = S8().Vc.$_gos();
            var b = Z8();
            b && $8() && (c6(a, b) || a.push(b));
            return Gqa(a)
        },
        a9 = function() {
            var a = gsa();
            !a && p8() && Gra() && (a = { key: "cast-selector-receiver", name: Gra() });
            return a
        },
        gsa = function() {
            var a = esa(),
                b = Z8();
            b || (b = X8());
            return g.Za(a, function(c) { return b && X5(b, c.key) ? !0 : !1 })
        },
        Z8 = function() {
            var a = T8();
            if (!a) return null;
            var b = S8().Pd();
            return d6(b, a)
        },
        asa = function(a) {
            U8("remote.onCastSessionChange_: " + $5(a));
            if (a) {
                var b = Z8();
                b && b.id == a.id ? s8(b.id, "YouTube TV") : (b && b9(), c9(a, 1))
            } else $8() && b9()
        },
        b9 = function() {
            q8() ? n8().stopSession() : l8("stopSession called before API ready.");
            var a = $8();
            a && (a.disconnect(1), d9(null))
        },
        e9 = function() {
            var a = $8();
            return !!a && 3 != a.getProxyState()
        },
        U8 = function(a) { L7("remote", a) },
        S8 = function() {
            if (!f9) {
                var a = g.v("yt.mdx.remote.screenService_");
                f9 = a ? new P8(a) : null
            }
            return f9
        },
        T8 = function() { return g.v("yt.mdx.remote.currentScreenId_") },
        hsa = function(a) { g.Ha("yt.mdx.remote.currentScreenId_", a, void 0) },
        isa = function() { return g.v("yt.mdx.remote.connectData_") },
        W8 = function(a) { g.Ha("yt.mdx.remote.connectData_", a, void 0) },
        $8 = function() { return g.v("yt.mdx.remote.connection_") },
        d9 = function(a) {
            var b = $8();
            W8(null);
            a || hsa("");
            g.Ha("yt.mdx.remote.connection_", a, void 0);
            R8 && ((0, g.y)(R8, function(c) { c(a) }), R8.length = 0);
            b && !a ? U5("yt-remote-connection-change", !1) : !b && a && U5("yt-remote-connection-change", !0)
        },
        X8 = function() {
            var a = g.Xs();
            if (!a) return null;
            var b = S8().Pd();
            return d6(b, a)
        },
        c9 = function(a, b) {
            Z8() && Z8();
            if (g9) h9 = a;
            else {
                hsa(a.id);
                var c = new I8(Q8, a, Y8());
                c.connect(b, isa());
                c.subscribe("beforeDisconnect", function(d) { U5("yt-remote-before-disconnect", d) });
                c.subscribe("beforeDispose", function() { $8() && d9(null) });
                d9(c)
            }
        },
        csa = function() {
            var a = X8();
            a ? (U8("Resume connection to: " + $5(a)), c9(a, 0)) : (n6(), Hra(), U8("Skipping connecting because no session screen found."))
        },
        $ra = function() {
            var a = Y8();
            if (g.Zb(a)) {
                a = i6();
                var b = g.Ws("yt-remote-session-name") || "",
                    c = g.Ws("yt-remote-session-app") || "";
                a = { device: "REMOTE_CONTROL", id: a, name: b, app: c, mdxVersion: 3 };
                g.Ha("yt.mdx.remote.channelParams_", a, void 0)
            }
        },
        Y8 = function() { return g.v("yt.mdx.remote.channelParams_") || {} },
        bsa = function(a) {
            a ? (g.Vs("yt-remote-session-app", a.app), g.Vs("yt-remote-session-name", a.name)) : (e6("yt-remote-session-app"), e6("yt-remote-session-name"));
            g.Ha("yt.mdx.remote.channelParams_", a, void 0)
        },
        i9 = function(a, b, c) {
            g.F.call(this);
            this.u = a;
            this.i = b;
            this.l = new g.hs(this);
            g.I(this, this.l);
            this.l.K(b, "onCaptionsTrackListChanged", this.wJ);
            this.l.K(b, "captionschanged", this.tI);
            this.l.K(b, "captionssettingschanged", this.HA);
            this.l.K(b, "videoplayerreset", this.Kn);
            this.l.K(b, "mdxautoplaycancel", this.sC);
            this.P = this.l.K(b, "onVolumeChange", this.ez);
            this.D = !1;
            this.g = c;
            c.subscribe("proxyStateChange", this.qz, this);
            c.subscribe("remotePlayerChange", this.uk, this);
            c.subscribe("remoteQueueChange", this.Kn, this);
            c.subscribe("autoplayUpNext", this.Ty,
                this);
            c.subscribe("previousNextChange", this.nz, this);
            c.subscribe("nowAutoplaying", this.jz, this);
            c.subscribe("autoplayDismissed", this.Sy, this);
            this.suggestion = null;
            this.F = new g.iC(64);
            this.o = new g.J(this.FA, 500, this);
            g.I(this, this.o);
            this.A = new g.J(this.GA, 1E3, this);
            g.I(this, this.A);
            this.I = new w6(this.XM, 0, this);
            g.I(this, this.I);
            this.C = {};
            this.R = new g.J(this.gB, 1E3, this);
            g.I(this, this.R);
            this.H = new g.el(this.PF, 1E3, this);
            g.I(this, this.H);
            this.M = g.Ia;
            this.HA();
            this.Kn();
            this.uk()
        },
        j9 = function(a, b) {
            a.u.Nc(b,
                a.i.getVideoData().lengthSeconds)
        },
        jsa = function(a) {
            j9(a, 0);
            a.o.stop();
            k9(a, new g.iC(64))
        },
        m9 = function(a, b) {
            if (l9(a) && !a.D) {
                var c = null;
                b && (c = { style: a.i.getSubtitlesUserSettings() }, g.gc(c, b));
                a.g.wA(a.i.getVideoData(1).videoId, c);
                a.C = C8(a.g).g
            }
        },
        n9 = function(a, b) {
            var c = a.i.getPlaylist();
            if (c) { var d = c.Sa; var e = c.listId.toString() }
            c = a.i.getVideoData(1);
            a.g.playVideo(c.videoId, b, d, e, c.playerParams, c.Le, Q5(c));
            k9(a, new g.iC(1))
        },
        ksa = function(a, b) {
            if (b) {
                var c = a.i.getOption("captions", "tracklist", { TQ: 1 });
                c && c.length ? (a.i.setOption("captions", "track", b), a.D = !1) : (a.i.loadModule("captions"), a.D = !0)
            } else a.i.setOption("captions", "track", {})
        },
        l9 = function(a) { return C8(a.g).videoId == a.i.getVideoData(1).videoId },
        k9 = function(a, b) {
            a.A.stop();
            var c = a.F;
            if (!g.oC(c, b)) {
                var d = g.T(b, 2);
                d != g.T(a.F, 2) && g.oK(a.i, d);
                a.F = b;
                lsa(a.u, c, b)
            }
        },
        o9 = function() {
            g.V.call(this, {
                B: "div",
                G: "ytp-mdx-popup-dialog",
                L: { role: "dialog" },
                J: [{
                    B: "div",
                    G: "ytp-mdx-popup-dialog-inner-content",
                    J: [{ B: "div", G: "ytp-mdx-popup-title", T: "No has iniciado sesi\u00f3n" }, { B: "div", G: "ytp-mdx-popup-description", T: "Los v\u00eddeos que veas podr\u00edan aparecer en el historial de reproducciones de la TV e influir en las recomendaciones. Puedes evitarlo si cancelas e inicias sesi\u00f3n en YouTube desde tu ordenador." }, {
                        B: "div",
                        G: "ytp-mdx-privacy-popup-buttons",
                        J: [{
                            B: "button",
                            U: ["ytp-button", "ytp-mdx-privacy-popup-cancel"],
                            T: "Cancelar"
                        }, { B: "button", U: ["ytp-button", "ytp-mdx-privacy-popup-confirm"], T: "Confirmar" }]
                    }]
                }]
            });
            this.l = new g.lQ(this, 250);
            g.I(this, this.l);
            this.C = this.i["ytp-mdx-privacy-popup-cancel"];
            this.K(this.C, "click", this.o);
            this.u = this.i["ytp-mdx-privacy-popup-confirm"];
            this.K(this.u, "click", this.A)
        },
        p9 = function(a) {
            g.V.call(this, {
                B: "div",
                G: "ytp-remote",
                J: [{ B: "div", G: "ytp-remote-display-status", J: [{ B: "div", G: "ytp-remote-display-status-icon", J: [g.AP()] }, { B: "div", G: "ytp-remote-display-status-text", T: "{{statustext}}" }] }]
            });
            this.l = new g.lQ(this, 250);
            g.I(this, this.l);
            this.o = a;
            this.K(a, "presentingplayerstatechange", this.u);
            msa(this, g.kK(a))
        },
        msa = function(a, b) {
            if (3 == a.o.getPresentingPlayerType()) {
                var c = { RECEIVER_NAME: a.o.getOption("remote", "currentReceiver").name };
                c = g.T(b, 128) ? g.AN("No se ha podido reproducir el v\u00eddeo en $RECEIVER_NAME", c) : g.pC(b) || g.T(b, 4) ? g.AN("El v\u00eddeo se est\u00e1 reproduciendo en $RECEIVER_NAME", c) : g.AN("Conectado a $RECEIVER_NAME", c);
                a.updateValue("statustext", c);
                a.l.show()
            } else a.l.hide()
        },
        q9 = function(a, b) {
            g.VT.call(this, "Reproducir en", 0, a, b);
            this.l = a;
            this.C = {};
            this.K(a, "onMdxReceiversChange", this.I);
            this.K(a, "presentingplayerstatechange", this.I);
            this.I()
        },
        r9 = function(a) {
            g.PK.call(this, a);
            this.i = { key: b6(), name: "Este ordenador" };
            this.u = null;
            this.o = [];
            this.H = this.g = null;
            this.D = [this.i];
            this.l = this.i;
            this.ck = new g.iC(64);
            this.I = 0;
            this.Mm = -1;
            this.A = null;
            if (!g.Iy(g.W(this.player))) {
                a = this.player;
                var b = g.bD(a);
                b && (b = b.qn()) && (b = new q9(a, b), g.I(this, b));
                b = new p9(a);
                g.I(this, b);
                g.zK(a, b.element, 4);
                this.A = new o9;
                g.I(this, this.A);
                g.zK(a, this.A.element, 4);
                this.F = !!X8()
            }
            this.C = null
        },
        s9 = function(a) { a.C && (a.player.removeEventListener("presentingplayerstatechange", a.C), a.C = null) },
        lsa = function(a,
            b, c) {
            a.ck = c;
            a.player.N("presentingplayerstatechange", new g.sD(c, b))
        },
        t9 = function(a, b) {
            if (b.key != a.l.key)
                if (b.key == a.i.key) b9();
                else {
                    var c;
                    (c = !g.O(g.W(a.player).experiments, "mdx_enable_privacy_disclosure_ui")) || (c = ((c = g.Ro("PLAYER_CONFIG")) && c.args && void 0 !== c.args.authuser ? !0 : !(!g.Ro("SESSION_INDEX") && !g.Ro("LOGGED_IN"))) || a.F || !a.A);
                    c || g.Iy(g.W(a.player)) || (g.pC(g.kK(a.player)) ? a.player.pauseVideo() : (a.C = (0, g.x)(a.ZL, a), a.player.addEventListener("presentingplayerstatechange", a.C)), a.A && a.A.l.show(), $8() || (g9 = !0));
                    a.l = b;
                    var d = a.player.getPlaylistId();
                    c = a.player.getVideoData(1);
                    var e = c.videoId;
                    if (d || e) {
                        var f = a.player.getPlaylist();
                        if (f) { var k = []; for (var l = 0; l < f.getLength(); l++) k[l] = f.ua(l).videoId } else k = [e];
                        f = a.player.getCurrentTime(1);
                        d = { videoIds: k, listId: d, videoId: e, playerParams: c.playerParams, clickTrackingParams: c.Le, index: Math.max(a.player.getPlaylistIndex(), 0), currentTime: 0 == f ? void 0 : f };
                        (c = Q5(c)) && (d.locationInfo = c);
                        c = d
                    } else c = null;
                    U8("Connecting to: " + g.um(b));
                    "cast-selector-receiver" == b.key ? (W8(c || null), q8() ? n8().setLaunchParams(c || null) : l8("setLaunchParams called before ready.")) : !c && e9() && T8() == b.key ? U5("yt-remote-connection-change", !0) : (b9(), W8(c || null), c = S8().Pd(), (c = d6(c, b.key)) && c9(c, 1))
                }
        },
        Q6 = {
            "\x00": "\\0",
            "\b": "\\b",
            "\f": "\\f",
            "\n": "\\n",
            "\r": "\\r",
            "\t": "\\t",
            "\x0B": "\\x0B",
            '"': '\\"',
            "\\": "\\\\",
            "<": "\\u003C"
        },
        P6 = { "'": "\\'" },
        nsa = {},
        Eqa = { RN: "atp", fQ: "ska", UP: "que", vP: "mus", eQ: "sus", NO: "dsp", bQ: "seq" };
    V5.prototype.eg = function() {
        var a = new V5({ id: this.id, name: this.name, app: this.app, type: this.type, user: this.username, userAvatarUri: this.avatar, obfuscatedGaiaId: this.obfuscatedGaiaId, theme: this.theme, capabilities: Array.from(this.capabilities.values()).join(","), experiments: Array.from(this.experiments.values()).join(",") });
        a.l = this.l;
        a.i = this.i;
        a.g = this.g
    };
    var o6, h6 = "",
        Mqa = q6("loadCastFramework") || q6("loadCastApplicationFramework"),
        Dra = ["pkedcjkdefgpdelpbcmbmeomcjbeemfm", "enhhojjnijigcajfphajepfemndkmdlo"];
    g.Ta(w6, g.F);
    g.h = w6.prototype;
    g.h.nD = function(a) {
        this.o = arguments;
        this.g = !1;
        this.Ba ? this.l = (0, g.B)() + this.Wc : this.Ba = g.cl(this.u, this.Wc)
    };
    g.h.stop = function() {
        this.Ba && (g.u.clearTimeout(this.Ba), this.Ba = null);
        this.l = null;
        this.g = !1;
        this.o = []
    };
    g.h.pause = function() {++this.i };
    g.h.resume = function() { this.i && (--this.i, !this.i && this.g && (this.g = !1, this.A.apply(null, this.o))) };
    g.h.V = function() {
        this.stop();
        w6.fb.V.call(this)
    };
    g.h.oD = function() { this.l ? (this.Ba = g.cl(this.u, this.l - (0, g.B)()), this.l = null) : (this.Ba = null, this.i ? this.g = !0 : (this.g = !1, this.A.apply(null, this.o))) };
    y6.prototype.stringify = function(a) { return g.u.JSON.stringify(a, void 0) };
    y6.prototype.parse = function(a) { return g.u.JSON.parse(a, void 0) };
    z6.prototype.g = null;
    z6.prototype.getOptions = function() {
        var a;
        (a = this.g) || (a = {}, B6(this) && (a[0] = !0, a[1] = !0), a = this.g = a);
        return a
    };
    var u9;
    g.Ta(A6, z6);
    u9 = new A6;
    g.h = D6.prototype;
    g.h.Xg = null;
    g.h.ze = !1;
    g.h.Si = null;
    g.h.wt = null;
    g.h.Ci = null;
    g.h.Yh = null;
    g.h.Wf = null;
    g.h.Bg = null;
    g.h.qh = null;
    g.h.sc = null;
    g.h.Zk = 0;
    g.h.De = null;
    g.h.Co = null;
    g.h.ng = null;
    g.h.Hj = -1;
    g.h.pA = !0;
    g.h.Mg = !1;
    g.h.wq = 0;
    g.h.Sn = null;
    var K6 = {},
        I6 = {};
    g.h = D6.prototype;
    g.h.setTimeout = function(a) { this.o = a };
    g.h.iM = function(a) {
        a = a.target;
        var b = this.Sn;
        b && 3 == g7(a) ? b.Dj() : this.oB(a)
    };
    g.h.oB = function(a) {
        try {
            if (a == this.sc) a: {
                var b = g7(this.sc),
                    c = this.sc.u,
                    d = this.sc.getStatus();
                if (g.Ld && !g.md(10) || g.Nd && !g.ld("420+")) { if (4 > b) break a } else if (3 > b || 3 == b && !g.dg && !k7(this.sc)) break a;this.Mg || 4 != b || 7 == c || (8 == c || 0 >= d ? this.g.ye(3) : this.g.ye(2));U6(this);
                var e = this.sc.getStatus();this.Hj = e;
                var f = k7(this.sc);
                (this.ze = 200 == e) ? (4 == b && M6(this), this.u ? (O6(this, b, f), g.dg && this.ze && 3 == b && (this.ba.ca(this.i, "tick", this.cM), this.i.start())) : L6(this, f), this.ze && !this.Mg && (4 == b ? this.g.Hn(this) : (this.ze = !1, H6(this)))) : (400 == e && 0 < f.indexOf("Unknown SID") ? (this.ng = 3, J6(13)) : (this.ng = 0, J6(14)), M6(this), N6(this))
            }
        } catch (k) { this.sc && k7(this.sc) } finally {}
    };
    g.h.cM = function() {
        var a = g7(this.sc),
            b = k7(this.sc);
        this.Zk < b.length && (U6(this), O6(this, a, b), this.ze && 4 != a && H6(this))
    };
    g.h.yL = function(a) { T6((0, g.x)(this.xL, this, a), 0) };
    g.h.xL = function(a) { this.Mg || (U6(this), L6(this, a), H6(this)) };
    g.h.yz = function(a) { T6((0, g.x)(this.wL, this, a), 0) };
    g.h.wL = function(a) { this.Mg || (M6(this), this.ze = a, this.g.Hn(this), this.g.ye(4)) };
    g.h.cancel = function() {
        this.Mg = !0;
        M6(this)
    };
    g.h.IL = function() {
        this.Si = null;
        var a = (0, g.B)();
        0 <= a - this.wt ? (2 != this.Yh && this.g.ye(3), M6(this), this.ng = 2, J6(18), N6(this)) : S6(this, this.wt - a)
    };
    g.h.getLastError = function() { return this.ng };
    g.h = Y6.prototype;
    g.h.tq = null;
    g.h.Fd = null;
    g.h.Tn = !1;
    g.h.uw = null;
    g.h.Zl = null;
    g.h.Zq = null;
    g.h.uq = null;
    g.h.he = null;
    g.h.Af = -1;
    g.h.Gj = null;
    g.h.dj = null;
    g.h.connect = function(a) {
        this.uq = a;
        a = Z6(this.g, null, this.uq);
        J6(3);
        this.uw = (0, g.B)();
        var b = this.g.D;
        null != b ? (this.Gj = b[0], (this.dj = b[1]) ? (this.he = 1, $6(this)) : (this.he = 2, b7(this))) : (P5(a, "MODE", "init"), this.Fd = new D6(this, void 0, void 0, void 0), this.Fd.Xg = this.tq, G6(this.Fd, a, !1, null, !0), this.he = 0)
    };
    g.h.tC = function(a) {
        if (a) this.he = 2, b7(this);
        else {
            J6(4);
            var b = this.g;
            b.Ie = b.dg.Af;
            C7(b, 9)
        }
        a && this.ye(2)
    };
    g.h.Np = function(a) { return this.g.Np(a) };
    g.h.abort = function() {
        this.Fd && (this.Fd.cancel(), this.Fd = null);
        this.Af = -1
    };
    g.h.tw = function() { return !1 };
    g.h.rz = function(a, b) {
        this.Af = a.Hj;
        if (0 == this.he)
            if (b) {
                try { var c = this.i.parse(b) } catch (d) {
                    c = this.g;
                    c.Ie = this.Af;
                    C7(c, 2);
                    return
                }
                this.Gj = c[0];
                this.dj = c[1]
            } else c = this.g, c.Ie = this.Af, C7(c, 2);
        else if (2 == this.he)
            if (this.Tn) J6(7), this.Zq = (0, g.B)();
            else if ("11111" == b) { if (J6(6), this.Tn = !0, this.Zl = (0, g.B)(), c = this.Zl - this.uw, !g.Ld || g.md(10) || 500 > c) this.Af = 200, this.Fd.cancel(), J6(12), a7(this.g, this, !0) } else J6(8), this.Zl = this.Zq = (0, g.B)(), this.Tn = !1
    };
    g.h.Hn = function() {
        this.Af = this.Fd.Hj;
        if (this.Fd.ze) 0 == this.he ? this.dj ? (this.he = 1, $6(this)) : (this.he = 2, b7(this)) : 2 == this.he && ((!g.Ld || g.md(10) ? !this.Tn : 200 > this.Zq - this.Zl) ? (J6(11), a7(this.g, this, !1)) : (J6(12), a7(this.g, this, !0)));
        else {
            0 == this.he ? J6(9) : 2 == this.he && J6(10);
            var a = this.g;
            this.Fd.getLastError();
            a.Ie = this.Af;
            C7(a, 2)
        }
    };
    g.h.Lk = function() { return this.g.Lk() };
    g.h.isActive = function() { return this.g.isActive() };
    g.h.ye = function(a) { this.g.ye(a) };
    g.Ta(c7, g.rk);
    var Rqa = /^https?$/i,
        osa = ["POST", "PUT"];
    g.h = c7.prototype;
    g.h.send = function(a, b, c, d) {
        if (this.g) throw Error("[goog.net.XhrIo] Object is active with another request=" + this.D + "; newUri=" + a);
        b = b ? b.toUpperCase() : "GET";
        this.D = a;
        this.l = "";
        this.u = 0;
        this.Y = b;
        this.P = !1;
        this.i = !0;
        this.g = this.M ? C6(this.M) : C6(u9);
        this.R = this.M ? this.M.getOptions() : u9.getOptions();
        this.g.onreadystatechange = (0, g.x)(this.ww, this);
        try { T5(h7(this, "Opening Xhr")), this.Z = !0, this.g.open(b, String(a), !0), this.Z = !1 } catch (f) {
            T5(h7(this, "Error opening Xhr: " + f.message));
            f7(this, f);
            return
        }
        a = c || "";
        var e = this.headers.clone();
        d && Aqa(d, function(f, k) { e.set(k, f) });
        d = g.Za(e.Od(), Qqa);
        c = g.u.FormData && a instanceof g.u.FormData;
        !g.bb(osa, b) || d || c || e.set("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
        e.forEach(function(f, k) { this.g.setRequestHeader(k, f) }, this);
        this.W && (this.g.responseType = this.W);
        "withCredentials" in this.g && this.g.withCredentials !== this.S && (this.g.withCredentials = this.S);
        try { j7(this), 0 < this.A && (this.I = Pqa(this.g), T5(h7(this, "Will abort after " + this.A + "ms if incomplete, xhr2 " + this.I)), this.I ? (this.g.timeout = this.A, this.g.ontimeout = (0, g.x)(this.xw, this)) : this.F = g.cl(this.xw, this.A, this)), T5(h7(this, "Sending request")), this.C = !0, this.g.send(a), this.C = !1 } catch (f) { T5(h7(this, "Send error: " + f.message)), f7(this, f) }
    };
    g.h.xw = function() { "undefined" != typeof g.JY && this.g && (this.l = "Timed out after " + this.A + "ms, aborting", this.u = 8, h7(this, this.l), this.dispatchEvent("timeout"), this.abort(8)) };
    g.h.abort = function(a) { this.g && this.i && (h7(this, "Aborting"), this.i = !1, this.o = !0, this.g.abort(), this.o = !1, this.u = a || 7, this.dispatchEvent("complete"), this.dispatchEvent("abort"), e7(this)) };
    g.h.V = function() {
        this.g && (this.i && (this.i = !1, this.o = !0, this.g.abort(), this.o = !1), e7(this, !0));
        c7.fb.V.call(this)
    };
    g.h.ww = function() { this.fa() || (this.Z || this.C || this.o ? i7(this) : this.xK()) };
    g.h.xK = function() { i7(this) };
    g.h.isActive = function() { return !!this.g };
    g.h.getStatus = function() { try { return 2 < g7(this) ? this.g.status : -1 } catch (a) { return -1 } };
    g.h.getLastError = function() { return g.Ea(this.l) ? this.l : String(this.l) };
    g.h = l7.prototype;
    g.h.qj = null;
    g.h.Bd = null;
    g.h.Rb = null;
    g.h.rq = null;
    g.h.fm = null;
    g.h.Du = null;
    g.h.xm = null;
    g.h.nk = 0;
    g.h.NH = 0;
    g.h.Tc = null;
    g.h.lg = null;
    g.h.mf = null;
    g.h.Rg = null;
    g.h.dg = null;
    g.h.Ao = null;
    g.h.ki = -1;
    g.h.hx = -1;
    g.h.Ie = -1;
    g.h.Rh = 0;
    g.h.Kh = 0;
    g.h.Ng = 8;
    var D7 = new g.rk;
    g.Ta(m7, g.Tj);
    g.Ta(n7, g.Tj);
    g.Ta(o7, g.Tj);
    g.h = l7.prototype;
    g.h.connect = function(a, b, c, d, e) {
        J6(0);
        this.rq = b;
        this.qj = c || {};
        d && g.Da(e) && (this.qj.OSID = d, this.qj.OAID = e);
        this.A ? (T6((0, g.x)(this.Xu, this, a), 100), u7(this)) : this.Xu(a)
    };
    g.h.Xu = function(a) {
        this.dg = new Y6(this);
        this.dg.tq = null;
        this.dg.i = this.u;
        this.dg.connect(a)
    };
    g.h.tw = function() { return 0 == this.g };
    g.h.xz = function(a) {
        this.lg = null;
        z7(this, a)
    };
    g.h.wz = function() {
        this.mf = null;
        this.Rb = new D6(this, this.l, "rpc", this.C);
        this.Rb.Xg = null;
        this.Rb.wq = 0;
        var a = this.Du.clone();
        N5(a, "RID", "rpc");
        N5(a, "SID", this.l);
        N5(a, "CI", this.Ao ? "0" : "1");
        N5(a, "AID", this.ki);
        q7(this, a);
        if (!g.Ld || g.md(10)) N5(a, "TYPE", "xmlhttp"), G6(this.Rb, a, !0, this.xm, !1);
        else {
            N5(a, "TYPE", "html");
            var b = this.Rb,
                c = !!this.xm;
            b.Yh = 3;
            b.Wf = O5(a.clone());
            R6(b, c)
        }
    };
    g.h.rz = function(a, b) {
        if (0 != this.g && (this.Rb == a || this.Bd == a))
            if (this.Ie = a.Hj, this.Bd == a && 3 == this.g)
                if (7 < this.Ng) {
                    try { var c = this.u.parse(b) } catch (f) { c = null }
                    if (g.La(c) && 3 == c.length)
                        if (0 == c[0]) a: {
                            if (!this.mf) {
                                if (this.Rb)
                                    if (this.Rb.Ci + 3E3 < this.Bd.Ci) v7(this), this.Rb.cancel(), this.Rb = null;
                                    else break a;
                                B7(this);
                                J6(19)
                            }
                        }
                        else this.hx = c[1], 0 < this.hx - this.ki && 37500 > c[2] && this.Ao && 0 == this.Kh && !this.Rg && (this.Rg = T6((0, g.x)(this.pI, this), 6E3));
                    else C7(this, 11)
                } else b != nsa.oO.g && C7(this, 11);
        else if (this.Rb == a &&
            v7(this), !g.yb(b)) {
            c = this.u.parse(b);
            g.La(c);
            for (var d = 0; d < c.length; d++) {
                var e = c[d];
                this.ki = e[0];
                e = e[1];
                2 == this.g ? "c" == e[0] ? (this.l = e[1], this.xm = e[2], e = e[3], null != e ? this.Ng = e : this.Ng = 6, this.g = 3, this.Tc && this.Tc.Ru(), this.Du = Z6(this, this.Lk() ? this.xm : null, this.rq), A7(this)) : "stop" == e[0] && C7(this, 7) : 3 == this.g && ("stop" == e[0] ? C7(this, 7) : "noop" != e[0] && this.Tc && this.Tc.Qu(e), this.Kh = 0)
            }
        }
    };
    g.h.pI = function() { null != this.Rg && (this.Rg = null, this.Rb.cancel(), this.Rb = null, B7(this), J6(20)) };
    g.h.Hn = function(a) {
        if (this.Rb == a) {
            v7(this);
            this.Rb = null;
            var b = 2
        } else if (this.Bd == a) this.Bd = null, b = 1;
        else return;
        this.Ie = a.Hj;
        if (0 != this.g)
            if (a.ze) 1 == b ? (b = (0, g.B)() - a.Ci, D7.dispatchEvent(new n7(D7, a.qh ? a.qh.length : 0, b, this.Rh)), t7(this), this.o.length = 0) : A7(this);
            else {
                var c = a.getLastError(),
                    d;
                if (!(d = 3 == c || 7 == c || 0 == c && 0 < this.Ie)) {
                    if (d = 1 == b) this.Bd || this.lg || 1 == this.g || 2 <= this.Rh ? d = !1 : (this.lg = T6((0, g.x)(this.xz, this, a), Tqa(this, this.Rh)), this.Rh++, d = !0);
                    d = !(d || 2 == b && B7(this))
                }
                if (d) switch (c) {
                    case 1:
                        C7(this,
                            5);
                        break;
                    case 4:
                        C7(this, 10);
                        break;
                    case 3:
                        C7(this, 6);
                        break;
                    case 7:
                        C7(this, 12);
                        break;
                    default:
                        C7(this, 2)
                }
            }
    };
    g.h.OC = function(a) { if (!g.bb(arguments, this.g)) throw Error("Unexpected channel state: " + this.g); };
    g.h.OM = function(a) { a ? J6(2) : (J6(1), Uqa(this, 8)) };
    g.h.Np = function(a) {
        if (a) throw Error("Can't create secondary domain capable XhrIo object.");
        a = new c7;
        a.S = !1;
        return a
    };
    g.h.isActive = function() { return !!this.Tc && this.Tc.isActive(this) };
    g.h.ye = function(a) { D7.dispatchEvent(new o7(D7, a)) };
    g.h.Lk = function() { return !(!g.Ld || g.md(10)) };
    g.h = Vqa.prototype;
    g.h.Ru = function() {};
    g.h.Qu = function() {};
    g.h.Pu = function() {};
    g.h.Ap = function() {};
    g.h.Sv = function() { return {} };
    g.h.isActive = function() { return !0 };
    g.h = Wqa.prototype;
    g.h.isEmpty = function() { return g.cb(this.g) && g.cb(this.i) };
    g.h.clear = function() {
        this.g = [];
        this.i = []
    };
    g.h.contains = function(a) { return g.bb(this.g, a) || g.bb(this.i, a) };
    g.h.remove = function(a) {
        var b = this.g;
        var c = (0, g.lna)(b, a);
        0 <= c ? (g.eb(b, c), b = !0) : b = !1;
        return b || g.fb(this.i, a)
    };
    g.h.Fc = function() { for (var a = [], b = this.g.length - 1; 0 <= b; --b) a.push(this.g[b]); var c = this.i.length; for (b = 0; b < c; ++b) a.push(this.i[b]); return a };
    g.Ta(E7, g.F);
    g.h = E7.prototype;
    g.h.qL = function() {
        this.Wc = Math.min(3E5, 2 * this.Wc);
        this.l();
        this.i && this.start()
    };
    g.h.start = function() {
        var a = this.Wc + 15E3 * Math.random();
        g.wn(this.g, a);
        this.i = (0, g.B)() + a
    };
    g.h.stop = function() {
        this.g.stop();
        this.i = 0
    };
    g.h.isActive = function() { return this.g.isActive() };
    g.h.reset = function() {
        this.g.stop();
        this.Wc = 5E3
    };
    g.Ta(F7, Vqa);
    g.h = F7.prototype;
    g.h.subscribe = function(a, b, c) { return this.l.subscribe(a, b, c) };
    g.h.unsubscribe = function(a, b, c) { return this.l.unsubscribe(a, b, c) };
    g.h.If = function(a) { return this.l.Yg(a) };
    g.h.N = function(a, b) { return this.l.N.apply(this.l, arguments) };
    g.h.dispose = function() { this.gb || (this.gb = !0, g.Ci(this.l), Zqa(this), g.Ci(this.i), this.i = null) };
    g.h.fa = function() { return this.gb };
    g.h.connect = function(a, b, c) {
        if (!this.g || 2 != this.g.g) {
            this.F = "";
            this.i.stop();
            this.u = a || null;
            this.o = b || 0;
            a = this.H + "/test";
            b = this.H + "/bind";
            var d = new l7(c ? c.firstTestResults : null, c ? c.secondTestResults : null, this.I),
                e = this.g;
            e && (e.Tc = null);
            d.Tc = this;
            this.g = d;
            e ? this.g.connect(a, b, this.A, e.l, e.ki) : c ? this.g.connect(a, b, this.A, c.sessionId, c.arrayId) : this.g.connect(a, b, this.A)
        }
    };
    g.h.sendMessage = function(a, b) {
        var c = { _sc: a };
        b && g.gc(c, b);
        this.i.isActive() || 2 == (this.g ? this.g.g : 0) ? this.C.push(c) : G7(this) && w7(this.g, c)
    };
    g.h.Ru = function() {
        this.i.reset();
        this.u = null;
        this.o = 0;
        if (this.C.length) {
            var a = this.C;
            this.C = [];
            for (var b = 0, c = a.length; b < c; ++b) w7(this.g, a[b])
        }
        this.N("handlerOpened")
    };
    g.h.Pu = function(a) {
        var b = 2 == a && 401 == this.g.Ie;
        4 == a || b || this.i.start();
        this.N("handlerError", a)
    };
    g.h.Ap = function(a) {
        if (!this.i.isActive()) this.N("handlerClosed");
        else if (a)
            for (var b = 0, c = a.length; b < c; ++b) {
                var d = a[b].map;
                d && this.C.push(d)
            }
    };
    g.h.Sv = function() {
        var a = { v: 2 };
        this.F && (a.gsessionid = this.F);
        0 != this.o && (a.ui = "" + this.o);
        0 != this.D && (a.ui = "" + this.D);
        this.u && g.gc(a, this.u);
        return a
    };
    g.h.Qu = function(a) { "S" == a[0] ? this.F = a[1] : "gracefulReconnect" == a[0] ? (this.i.start(), s7(this.g)) : this.N("handlerMessage", new Xqa(a[0], a[1])) };
    g.h.sM = function() {
        this.i.isActive();
        var a = this.g,
            b = 0;
        a.Rb && b++;
        a.Bd && b++;
        0 == b && this.connect(this.u, this.o)
    };
    H7.prototype.o = function(a, b, c, d) { b ? a(d) : a({ text: c.responseText }) };
    H7.prototype.l = function(a, b) { a(Error("Request error: " + b.status)) };
    H7.prototype.u = function(a) { a(Error("request timed out")) };
    var gra = (0, g.B)(),
        K7 = null,
        N7 = Array(50),
        M7 = -1,
        O7 = !1;
    g.Ta(P7, g.N);
    P7.prototype.Pd = function() { return this.g };
    P7.prototype.contains = function(a) { return !!c6(this.g, a) };
    P7.prototype.get = function(a) { return a ? d6(this.g, a) : null };
    P7.prototype.info = function(a) { L7(this.C, a) };
    g.r(Q7, g.N);
    g.h = Q7.prototype;
    g.h.start = function() {!this.g && isNaN(this.Ba) && this.rB() };
    g.h.stop = function() {
        this.g && (this.g.abort(), this.g = null);
        isNaN(this.Ba) || (g.ap(this.Ba), this.Ba = NaN)
    };
    g.h.V = function() {
        this.stop();
        g.N.prototype.V.call(this)
    };
    g.h.rB = function() {
        this.Ba = NaN;
        this.g = g.Wp(I7(this.A, "/pairing/get_screen"), { method: "POST", ub: { pairing_code: this.u }, timeout: 5E3, onSuccess: (0, g.x)(this.qN, this), onError: (0, g.x)(this.pN, this), Td: (0, g.x)(this.rN, this) })
    };
    g.h.qN = function(a, b) {
        this.g = null;
        var c = b.screen || {};
        c.dialId = this.l;
        c.name = this.o;
        this.N("pairingComplete", new W5(c))
    };
    g.h.pN = function(a) {
        this.g = null;
        a.status && 404 == a.status ? this.i >= psa.length ? this.N("pairingFailed", Error("DIAL polling timed out")) : (a = psa[this.i], this.Ba = g.Zo((0, g.x)(this.rB, this), a), this.i++) : this.N("pairingFailed", Error("Server error " + a.status))
    };
    g.h.rN = function() {
        this.g = null;
        this.N("pairingFailed", Error("Server not responding"))
    };
    var psa = [2E3, 2E3, 1E3, 1E3, 1E3, 2E3, 2E3, 5E3, 5E3, 1E4];
    g.Ta(S7, P7);
    g.h = S7.prototype;
    g.h.start = function() {
        R7(this) && this.N("screenChange");
        !g.Ws("yt-remote-lounge-token-expiration") && kra(this);
        g.ap(this.i);
        this.i = g.Zo((0, g.x)(this.start, this), 1E4)
    };
    g.h.add = function(a, b) {
        R7(this);
        hra(this, a);
        T7(this, !1);
        this.N("screenChange");
        b(a);
        a.token || kra(this)
    };
    g.h.remove = function(a, b) {
        var c = R7(this);
        jra(this, a) && (T7(this, !1), c = !0);
        b(a);
        c && this.N("screenChange")
    };
    g.h.wo = function(a, b, c, d) {
        var e = R7(this),
            f = this.get(a.id);
        f ? (f.name != b && (f.name = b, T7(this, !1), e = !0), c(a)) : d(Error("no such local screen."));
        e && this.N("screenChange")
    };
    g.h.V = function() {
        g.ap(this.i);
        S7.fb.V.call(this)
    };
    g.h.yD = function(a) {
        R7(this);
        var b = this.g.length;
        a = a && a.screens || [];
        for (var c = 0, d = a.length; c < d; ++c) {
            var e = a[c],
                f = this.get(e.screenId);
            f && (f.token = e.loungeToken, --b)
        }
        T7(this, !b);
        b && L7(this.C, "Missed " + b + " lounge tokens.")
    };
    g.h.xD = function(a) { L7(this.C, "Requesting lounge tokens failed: " + a) };
    g.r(V7, g.N);
    g.h = V7.prototype;
    g.h.start = function() {
        var a = parseInt(g.Ws("yt-remote-fast-check-period") || "0", 10);
        (this.o = (0, g.B)() - 144E5 < a ? 0 : a) ? X7(this): (this.o = (0, g.B)() + 3E5, g.Vs("yt-remote-fast-check-period", this.o), this.Cs())
    };
    g.h.isEmpty = function() { return g.Zb(this.g) };
    g.h.update = function() {
        U7("Updating availability on schedule.");
        var a = this.A(),
            b = g.Nb(this.g, function(c, d) { return c && !!d6(a, d) }, this);
        W7(this, b)
    };
    g.h.V = function() {
        g.ap(this.l);
        this.l = NaN;
        this.i && (this.i.abort(), this.i = null);
        g.N.prototype.V.call(this)
    };
    g.h.Cs = function() {
        g.ap(this.l);
        this.l = NaN;
        this.i && this.i.abort();
        var a = nra(this);
        if (R5(a)) {
            var b = I7(this.u, "/pairing/get_screen_availability");
            this.i = J7(this.u, b, { lounge_token: g.Tb(a).join(",") }, (0, g.x)(this.TK, this, a), (0, g.x)(this.SK, this))
        } else W7(this, {}), X7(this)
    };
    g.h.TK = function(a, b) {
        this.i = null;
        var c = g.Tb(nra(this));
        if (g.tb(c, g.Tb(a))) {
            c = b.screens || [];
            for (var d = {}, e = 0, f = c.length; e < f; ++e) d[a[c[e].loungeToken]] = "online" == c[e].status;
            W7(this, d);
            X7(this)
        } else this.Ib("Changing Screen set during request."), this.Cs()
    };
    g.h.SK = function(a) {
        this.Ib("Screen availability failed: " + a);
        this.i = null;
        X7(this)
    };
    g.h.Ib = function(a) { L7("OnlineScreenService", a) };
    g.Ta(Y7, P7);
    g.h = Y7.prototype;
    g.h.start = function() {
        this.l.start();
        this.i.start();
        this.g.length && (this.N("screenChange"), this.i.isEmpty() || this.N("onlineScreenChange"))
    };
    g.h.add = function(a, b, c) { this.l.add(a, b, c) };
    g.h.remove = function(a, b, c) {
        this.l.remove(a, b, c);
        this.i.update()
    };
    g.h.wo = function(a, b, c, d) { this.l.contains(a) ? this.l.wo(a, b, c, d) : (a = "Updating name of unknown screen: " + a.name, L7(this.C, a), d(Error(a))) };
    g.h.Pd = function(a) { return a ? this.g : g.ib(this.g, (0, g.Xd)(this.o, function(b) { return !this.contains(b) }, this)) };
    g.h.sB = function() { return (0, g.Xd)(this.Pd(!0), function(a) { return !!this.i.g[a.id] }, this) };
    g.h.tB = function(a, b, c, d, e) {
        this.info("getDialScreenByPairingCode " + a + " / " + b);
        var f = new Q7(this.A, a, b, c);
        f.subscribe("pairingComplete", (0, g.x)(function(k) {
            g.Ci(f);
            d(Z7(this, k))
        }, this));
        f.subscribe("pairingFailed", function(k) {
            g.Ci(f);
            e(k)
        });
        f.start();
        return (0, g.x)(f.stop, f)
    };
    g.h.tN = function(a, b, c, d) {
        g.Wp(I7(this.A, "/pairing/get_screen"), {
            method: "POST",
            ub: { pairing_code: a },
            timeout: 5E3,
            onSuccess: (0, g.x)(function(e, f) {
                var k = new W5(f.screen || {});
                if (!k.name || rra(this, k.name)) {
                    a: {
                        var l = k.name;
                        for (var m = 2, n = b(l, m); rra(this, n);) {
                            m++;
                            if (20 < m) break a;
                            n = b(l, m)
                        }
                        l = n
                    }
                    k.name = l
                }
                c(Z7(this, k))
            }, this),
            onError: (0, g.x)(function(e) { d(Error("pairing request failed: " + e.status)) }, this),
            Td: (0, g.x)(function() { d(Error("pairing request timed out.")) }, this)
        })
    };
    g.h.V = function() {
        g.Ci(this.l);
        g.Ci(this.i);
        Y7.fb.V.call(this)
    };
    g.h.GD = function() {
        sra(this);
        this.N("screenChange");
        this.i.update()
    };
    Y7.prototype.dispose = Y7.prototype.dispose;
    g.Ta(a8, g.N);
    g.h = a8.prototype;
    g.h.Jn = function(a) {
        this.l = a;
        this.N("sessionScreen", this.l)
    };
    g.h.Sd = function(a) { this.fa() || (a && b8(this, "" + a), this.l = null, this.N("sessionScreen", null)) };
    g.h.info = function(a) { L7(this.R, a) };
    g.h.vB = function() { return null };
    g.h.Ls = function(a) {
        var b = this.i;
        a ? (b.displayStatus = new chrome.cast.ReceiverDisplayStatus(a, []), b.displayStatus.showStop = !0) : b.displayStatus = null;
        chrome.cast.setReceiverDisplayStatus(b, (0, g.x)(function() { this.info("Updated receiver status for " + b.friendlyName + ": " + a) }, this), (0, g.x)(function() { b8(this, "Failed to update receiver status for: " + b.friendlyName) }, this))
    };
    g.h.V = function() {
        this.Ls("");
        a8.fb.V.call(this)
    };
    g.Ta(c8, a8);
    g.h = c8.prototype;
    g.h.Ks = function(a) {
        if (this.g) {
            if (this.g == a) return;
            b8(this, "Overriding cast sesison with new session object");
            this.g.removeUpdateListener(this.A);
            this.g.removeMessageListener("urn:x-cast:com.google.youtube.mdx", this.u)
        }
        this.g = a;
        this.g.addUpdateListener(this.A);
        this.g.addMessageListener("urn:x-cast:com.google.youtube.mdx", this.u);
        ura(this)
    };
    g.h.li = function(a) { this.info("launchWithParams no-op for Cast: " + g.um(a)) };
    g.h.stop = function() { this.g ? this.g.stop((0, g.x)(function() { this.Sd() }, this), (0, g.x)(function() { this.Sd(Error("Failed to stop receiver app.")) }, this)) : this.Sd(Error("Stopping cast device witout session.")) };
    g.h.Ls = g.Ia;
    g.h.V = function() {
        this.info("disposeInternal");
        g.ap(this.o);
        this.o = 0;
        this.g && (this.g.removeUpdateListener(this.A), this.g.removeMessageListener("urn:x-cast:com.google.youtube.mdx", this.u));
        this.g = null;
        c8.fb.V.call(this)
    };
    g.h.TL = function(a, b) {
        if (!this.fa())
            if (b) {
                var c = x6(b);
                if (g.Oa(c)) {
                    var d = "" + c.type;
                    c = c.data || {};
                    this.info("onYoutubeMessage_: " + d + " " + g.um(c));
                    switch (d) {
                        case "mdxSessionStatus":
                            tra(this, c.screenId);
                            break;
                        default:
                            b8(this, "Unknown youtube message: " + d)
                    }
                } else b8(this, "Unable to parse message.")
            } else b8(this, "No data in message.")
    };
    g.h.kw = function(a, b, c, d) { qra(this.F, this.i.label, a, this.i.friendlyName, (0, g.x)(function(e) { e ? b(e) : 0 <= d ? (b8(this, "Screen " + a + " appears to be offline. " + d + " retries left."), g.Zo((0, g.x)(this.kw, this, a, b, c, d - 1), 300)) : c(Error("Unable to fetch screen.")) }, this), c) };
    g.h.vB = function() { return this.g };
    g.h.uN = function(a) { this.fa() || a || (b8(this, "Cast session died."), this.Sd()) };
    g.Ta(d8, a8);
    g.h = d8.prototype;
    g.h.Ks = function(a) {
        this.o = a;
        this.o.addUpdateListener(this.I)
    };
    g.h.li = function(a) {
        this.u = a;
        this.C()
    };
    g.h.stop = function() {
        this.g();
        this.g = g.Ia;
        g.ap(this.A);
        this.o ? this.o.stop((0, g.x)(this.Sd, this, null), (0, g.x)(this.Sd, this, "Failed to stop DIAL device.")) : this.Sd()
    };
    g.h.V = function() {
        this.g();
        this.g = g.Ia;
        g.ap(this.A);
        this.o && this.o.removeUpdateListener(this.I);
        this.o = null;
        d8.fb.V.call(this)
    };
    g.h.xN = function(a) { this.fa() || a || (b8(this, "DIAL session died."), this.g(), this.g = g.Ia, this.Sd()) };
    g.h.Iq = function(a) {
        this.H = b6();
        if (this.u) {
            var b = new chrome.cast.DialLaunchResponse(!0, wra(this));
            a(b);
            vra(this)
        } else this.C = (0, g.x)(function() {
            g.ap(this.A);
            this.C = g.Ia;
            this.A = NaN;
            var c = new chrome.cast.DialLaunchResponse(!0, wra(this));
            a(c);
            vra(this)
        }, this), this.A = g.Zo((0, g.x)(function() { this.C() }, this), 100)
    };
    g.h.cE = function(a, b, c) {
        qra(this.F, this.D.receiver.label, a, this.i.friendlyName, (0, g.x)(function(d) { d && d.token ? (this.Jn(d), b(new chrome.cast.DialLaunchResponse(!1))) : this.Iq(b, c) }, this), (0, g.x)(function(d) {
            b8(this, "Failed to get DIAL screen: " + d);
            this.Iq(b, c)
        }, this))
    };
    g.Ta(e8, a8);
    e8.prototype.stop = function() { this.Sd() };
    e8.prototype.Ks = g.Ia;
    e8.prototype.li = function() {
        g.ap(this.g);
        this.g = NaN;
        var a = d6(this.F.Pd(), this.i.label);
        a ? this.Jn(a) : this.Sd(Error("No such screen"))
    };
    e8.prototype.V = function() {
        g.ap(this.g);
        this.g = NaN;
        e8.fb.V.call(this)
    };
    g.Ta(f8, g.N);
    g.h = f8.prototype;
    g.h.init = function(a, b) {
        chrome.cast.timeout.requestSession = 3E4;
        var c = new chrome.cast.SessionRequest(this.C);
        this.D || (c.dialRequest = new chrome.cast.DialRequest("YouTube"));
        var d = chrome.cast.AutoJoinPolicy.TAB_AND_ORIGIN_SCOPED,
            e = a ? chrome.cast.DefaultActionPolicy.CAST_THIS_TAB : chrome.cast.DefaultActionPolicy.CREATE_SESSION,
            f = (0, g.x)(this.CK, this);
        c = new chrome.cast.ApiConfig(c, (0, g.x)(this.uz, this), f, d, e);
        c.customDialLaunchCallback = (0, g.x)(this.SI, this);
        chrome.cast.initialize(c, (0, g.x)(function() {
            this.fa() ||
                (chrome.cast.addReceiverActionListener(this.o), dra(), this.i.subscribe("onlineScreenChange", (0, g.x)(this.uB, this)), this.l = yra(this), chrome.cast.setCustomReceivers(this.l, g.Ia, (0, g.x)(function(k) { this.Ib("Failed to set initial custom receivers: " + g.um(k)) }, this)), this.N("yt-remote-cast2-availability-change", h8(this)), b(!0))
        }, this), (0, g.x)(function(k) {
            this.Ib("Failed to initialize API: " + g.um(k));
            b(!1)
        }, this))
    };
    g.h.AM = function(a, b) {
        g8("Setting connected screen ID: " + a + " -> " + b);
        if (this.g) { var c = this.g.l; if (!a || c && c.id != a) g8("Unsetting old screen status: " + this.g.i.friendlyName), i8(this, null) }
        if (a && b) {
            if (!this.g) {
                c = d6(this.i.Pd(), a);
                if (!c) { g8("setConnectedScreenStatus: Unknown screen."); return }
                var d = xra(this, c);
                d || (g8("setConnectedScreenStatus: Connected receiver not custom..."), d = new chrome.cast.Receiver(c.uuid ? c.uuid : c.id, c.name), d.receiverType = chrome.cast.ReceiverType.CUSTOM, this.l.push(d), chrome.cast.setCustomReceivers(this.l,
                    g.Ia, (0, g.x)(function(e) { this.Ib("Failed to set initial custom receivers: " + g.um(e)) }, this)));
                g8("setConnectedScreenStatus: new active receiver: " + d.friendlyName);
                i8(this, new e8(this.i, d), !0)
            }
            this.g.Ls(b)
        } else g8("setConnectedScreenStatus: no screen.")
    };
    g.h.BM = function(a) { this.fa() ? this.Ib("Setting connection data on disposed cast v2") : this.g ? this.g.li(a) : this.Ib("Setting connection data without a session") };
    g.h.wN = function() { this.fa() ? this.Ib("Stopping session on disposed cast v2") : this.g ? (this.g.stop(), i8(this, null)) : g8("Stopping non-existing session") };
    g.h.requestSession = function() { chrome.cast.requestSession((0, g.x)(this.uz, this), (0, g.x)(this.ZK, this)) };
    g.h.V = function() {
        this.i.unsubscribe("onlineScreenChange", (0, g.x)(this.uB, this));
        window.chrome && chrome.cast && chrome.cast.removeReceiverActionListener(this.o);
        g.fb(g.v("yt.mdx.remote.debug.handlers_") || [], ara);
        g.Ci(this.g);
        f8.fb.V.call(this)
    };
    g.h.Ib = function(a) { L7("Controller", a) };
    g.h.vz = function(a, b) { this.g == a && (b || i8(this, null), this.N("yt-remote-cast2-session-change", b)) };
    g.h.yK = function(a, b) {
        if (!this.fa())
            if (a) switch (a.friendlyName = chrome.cast.unescape(a.friendlyName), g8("onReceiverAction_ " + a.label + " / " + a.friendlyName + "-- " + b), b) {
                case chrome.cast.ReceiverAction.CAST:
                    if (this.g)
                        if (this.g.i.label != a.label) g8("onReceiverAction_: Stopping active receiver: " + this.g.i.friendlyName), this.g.stop();
                        else {
                            g8("onReceiverAction_: Casting to active receiver.");
                            this.g.l && this.N("yt-remote-cast2-session-change", this.g.l);
                            break
                        }
                    switch (a.receiverType) {
                        case chrome.cast.ReceiverType.CUSTOM:
                            i8(this,
                                new e8(this.i, a));
                            break;
                        case chrome.cast.ReceiverType.DIAL:
                            i8(this, new d8(this.i, a, this.A));
                            break;
                        case chrome.cast.ReceiverType.CAST:
                            i8(this, new c8(this.i, a));
                            break;
                        default:
                            this.Ib("Unknown receiver type: " + a.receiverType)
                    }
                    break;
                case chrome.cast.ReceiverAction.STOP:
                    this.g && this.g.i.label == a.label ? this.g.stop() : this.Ib("Stopping receiver w/o session: " + a.friendlyName)
            } else this.Ib("onReceiverAction_ called without receiver.")
    };
    g.h.SI = function(a) {
        if (this.fa()) return Promise.reject(Error("disposed"));
        var b = a.receiver;
        b.receiverType != chrome.cast.ReceiverType.DIAL && (this.Ib("Not DIAL receiver: " + b.friendlyName), b.receiverType = chrome.cast.ReceiverType.DIAL);
        var c = this.g ? this.g.i : null;
        if (!c || c.label != b.label) return this.Ib("Receiving DIAL launch request for non-clicked DIAL receiver: " + b.friendlyName), Promise.reject(Error("illegal DIAL launch"));
        if (c && c.label == b.label && c.receiverType != chrome.cast.ReceiverType.DIAL) {
            if (this.g.l) return g8("Reselecting dial screen."),
                this.N("yt-remote-cast2-session-change", this.g.l), Promise.resolve(new chrome.cast.DialLaunchResponse(!1));
            this.Ib('Changing CAST intent from "' + c.receiverType + '" to "dial" for ' + b.friendlyName);
            i8(this, new d8(this.i, b, this.A))
        }
        b = this.g;
        b.D = a;
        return b.D.appState == chrome.cast.DialAppState.RUNNING ? new Promise((0, g.x)(b.cE, b, (b.D.extraData || {}).screenId || null)) : new Promise((0, g.x)(b.Iq, b))
    };
    g.h.uz = function(a) {
        if (!this.fa()) {
            g8("New cast session ID: " + a.sessionId);
            var b = a.receiver;
            if (b.receiverType != chrome.cast.ReceiverType.CUSTOM) {
                if (!this.g)
                    if (b.receiverType == chrome.cast.ReceiverType.CAST) g8("Got resumed cast session before resumed mdx connection."), b.friendlyName = chrome.cast.unescape(b.friendlyName), i8(this, new c8(this.i, b), !0);
                    else { this.Ib("Got non-cast session without previous mdx receiver event, or mdx resume."); return }
                var c = this.g.i,
                    d = d6(this.i.Pd(), c.label);
                d && X5(d, b.label) &&
                    c.receiverType != chrome.cast.ReceiverType.CAST && b.receiverType == chrome.cast.ReceiverType.CAST && (g8("onSessionEstablished_: manual to cast session change " + b.friendlyName), g.Ci(this.g), this.g = new c8(this.i, b), this.g.subscribe("sessionScreen", (0, g.x)(this.vz, this, this.g)), this.g.li(null));
                this.g.Ks(a)
            }
        }
    };
    g.h.vN = function() { return this.g ? this.g.vB() : null };
    g.h.ZK = function(a) { this.fa() || (this.Ib("Failed to estabilish a session: " + g.um(a)), a.code != chrome.cast.ErrorCode.CANCEL && i8(this, null)) };
    g.h.CK = function(a) {
        g8("Receiver availability updated: " + a);
        if (!this.fa()) {
            var b = h8(this);
            this.u = a == chrome.cast.ReceiverAvailability.AVAILABLE;
            h8(this) != b && this.N("yt-remote-cast2-availability-change", h8(this))
        }
    };
    g.h.uB = function() { this.fa() || (this.l = yra(this), g8("Updating custom receivers: " + g.um(this.l)), chrome.cast.setCustomReceivers(this.l, g.Ia, (0, g.x)(function() { this.Ib("Failed to set custom receivers.") }, this)), this.N("yt-remote-cast2-availability-change", h8(this))) };
    f8.prototype.setLaunchParams = f8.prototype.BM;
    f8.prototype.setConnectedScreenStatus = f8.prototype.AM;
    f8.prototype.stopSession = f8.prototype.wN;
    f8.prototype.getCastSession = f8.prototype.vN;
    f8.prototype.requestSession = f8.prototype.requestSession;
    f8.prototype.init = f8.prototype.init;
    f8.prototype.dispose = f8.prototype.dispose;
    var o8 = [];
    t8.prototype.reset = function(a) {
        this.listId = "";
        this.index = -1;
        this.videoId = "";
        u8(this);
        this.volume = -1;
        this.muted = !1;
        a && (this.index = a.index, this.listId = a.listId, this.videoId = a.videoId, this.playerState = a.playerState, this.volume = a.volume, this.muted = a.muted, this.audioTrackId = a.audioTrackId, this.g = a.trackData, this.Je = a.hasPrevious, this.hasNext = a.hasNext, this.C = a.playerTime, this.A = a.playerTimeAt, this.o = a.seekableStart, this.i = a.seekableEnd, this.D = a.duration, this.F = a.loadedTime, this.l = a.liveIngestionTime, this.u = !isNaN(this.l))
    };
    t8.prototype.isAdPlaying = function() { return 1081 == this.playerState };
    t8.prototype.getDuration = function() { return this.u ? this.D + v8(this) : this.D };
    t8.prototype.clone = function() { return new t8(z8(this)) };
    g.r(B8, g.N);
    g.h = B8.prototype;
    g.h.play = function() { 1 == this.g ? (this.i ? this.i.play(null, g.Ia, H8(this, "play")) : G8(this, "play"), F8(this, 1, x8(C8(this))), this.N("remotePlayerChange")) : D8(this, this.play) };
    g.h.pause = function() { 1 == this.g ? (this.i ? this.i.pause(null, g.Ia, H8(this, "pause")) : G8(this, "pause"), F8(this, 2, x8(C8(this))), this.N("remotePlayerChange")) : D8(this, this.pause) };
    g.h.seekTo = function(a) {
        if (1 == this.g) {
            if (this.i) {
                var b = C8(this),
                    c = new chrome.cast.media.SeekRequest;
                c.currentTime = a;
                c.resumeState = 1 == b.playerState || 3 == b.playerState ? chrome.cast.media.ResumeState.PLAYBACK_START : chrome.cast.media.ResumeState.PLAYBACK_PAUSE;
                this.i.seek(c, g.Ia, H8(this, "seekTo", { newTime: a }))
            } else G8(this, "seekTo", { newTime: a });
            F8(this, 3, a);
            this.N("remotePlayerChange")
        } else D8(this, g.Ra(this.seekTo, a))
    };
    g.h.stop = function() {
        if (1 == this.g) {
            this.i ? this.i.stop(null, g.Ia, H8(this, "stopVideo")) : G8(this, "stopVideo");
            var a = C8(this);
            a.index = -1;
            a.videoId = "";
            u8(a);
            E8(this, a);
            this.N("remotePlayerChange")
        } else D8(this, this.stop)
    };
    g.h.setVolume = function(a, b) {
        if (1 == this.g) {
            var c = C8(this);
            if (this.l) {
                if (c.volume != a) {
                    var d = Math.round(a) / 100;
                    this.l.setReceiverVolumeLevel(d, (0, g.x)(function() { L7("CP", "set receiver volume: " + d) }, this), (0, g.x)(function() { this.Ib("failed to set receiver volume.") }, this))
                }
                c.muted != b && this.l.setReceiverMuted(b, (0, g.x)(function() { L7("CP", "set receiver muted: " + b) }, this), (0, g.x)(function() { this.Ib("failed to set receiver muted.") }, this))
            } else {
                var e = {
                    volume: a,
                    muted: b
                }; - 1 != c.volume && (e.delta = a - c.volume);
                G8(this, "setVolume", e)
            }
            c.muted = b;
            c.volume = a;
            E8(this, c)
        } else D8(this, g.Ra(this.setVolume, a, b))
    };
    g.h.wA = function(a, b) {
        if (1 == this.g) {
            var c = C8(this),
                d = { videoId: a };
            b && (c.g = { trackName: b.name, languageCode: b.languageCode, sourceLanguageCode: b.translationLanguage ? b.translationLanguage.languageCode : "", languageName: b.languageName, kind: b.kind }, d.style = g.um(b.style), g.gc(d, c.g));
            G8(this, "setSubtitlesTrack", d);
            E8(this, c)
        } else D8(this, g.Ra(this.wA, a, b))
    };
    g.h.setAudioTrack = function(a, b) {
        if (1 == this.g) {
            var c = b.getLanguageInfo().getId();
            G8(this, "setAudioTrack", { videoId: a, audioTrackId: c });
            var d = C8(this);
            d.audioTrackId = c;
            E8(this, d)
        } else D8(this, g.Ra(this.setAudioTrack, a, b))
    };
    g.h.playVideo = function(a, b, c, d, e, f, k) {
        var l = C8(this);
        c = c || 0;
        var m = { videoId: a, currentIndex: c };
        y8(l, a, c);
        g.Da(b) && (w8(l, b), m.currentTime = b);
        g.Da(d) && (m.listId = d);
        null != e && (m.playerParams = e);
        null != f && (m.clickTrackingParams = f);
        null != k && (m.locationInfo = g.um(k));
        G8(this, "setPlaylist", m);
        d || E8(this, l)
    };
    g.h.On = function(a, b) {
        if (1 == this.g) {
            if (a && b) {
                var c = C8(this);
                y8(c, a, b);
                E8(this, c)
            }
            G8(this, "previous")
        } else D8(this, g.Ra(this.On, a, b))
    };
    g.h.nextVideo = function(a, b) {
        if (1 == this.g) {
            if (a && b) {
                var c = C8(this);
                y8(c, a, b);
                E8(this, c)
            }
            G8(this, "next")
        } else D8(this, g.Ra(this.nextVideo, a, b))
    };
    g.h.wv = function() { 1 == this.g ? G8(this, "dismissAutoplay") : D8(this, this.wv) };
    g.h.dispose = function() {
        if (3 != this.g) {
            var a = this.g;
            this.g = 3;
            this.N("proxyStateChange", a, this.g)
        }
        g.N.prototype.dispose.call(this)
    };
    g.h.V = function() {
        Lra(this);
        this.o = null;
        this.u.clear();
        A8(this, null);
        g.N.prototype.V.call(this)
    };
    g.h.At = function(a) {
        if ((a != this.g || 2 == a) && 3 != this.g && 0 != a) {
            var b = this.g;
            this.g = a;
            this.N("proxyStateChange", b, a);
            if (1 == a)
                for (; !this.u.isEmpty();) b = a = this.u, g.cb(b.g) && (b.g = b.i, b.g.reverse(), b.i = []), a.g.pop().apply(this);
            else 3 == a && this.dispose()
        }
    };
    g.h.vK = function(a, b) { this.N(a, b) };
    g.h.wI = function(a) {
        if (!a) this.rk(null), A8(this, null);
        else if (this.l.receiver.volume) {
            a = this.l.receiver.volume;
            var b = C8(this),
                c = Math.round(100 * a.level || 0);
            if (b.volume != c || b.muted != a.muted) L7("CP", "Cast volume update: " + a.level + (a.muted ? " muted" : "")), b.volume = c, b.muted = !!a.muted, E8(this, b)
        }
    };
    g.h.rk = function(a) {
        L7("CP", "Cast media: " + !!a);
        this.i && this.i.removeUpdateListener(this.D);
        if (this.i = a) this.i.addUpdateListener(this.D), Mra(this), this.N("remotePlayerChange")
    };
    g.h.uI = function(a) { a ? (Mra(this), this.N("remotePlayerChange")) : this.rk(null) };
    g.h.gt = function() { G8(this, "sendDebugCommand", { debugCommand: "stats4nerds " }) };
    g.h.KI = function() {
        var a = Ira();
        a && A8(this, a)
    };
    g.h.Ib = function(a) { L7("CP", a) };
    g.r(I8, g.N);
    g.h = I8.prototype;
    g.h.connect = function(a, b) {
        if (b) {
            var c = b.listId,
                d = b.videoId,
                e = b.playerParams,
                f = b.clickTrackingParams,
                k = b.index,
                l = { videoId: d },
                m = b.currentTime,
                n = b.locationInfo;
            g.Da(m) && (l.currentTime = 5 >= m ? 0 : m);
            e && (l.playerParams = e);
            n && (l.locationInfo = n);
            f && (l.clickTrackingParams = f);
            c && (l.listId = c);
            g.Da(k) && (l.currentIndex = k);
            c && (this.Oa.listId = c);
            this.Oa.videoId = d;
            this.Oa.index = k || 0;
            this.Oa.state = 3;
            w8(this.Oa, m);
            this.o = "UNSUPPORTED";
            J8("Connecting with setPlaylist and params: " + g.um(l));
            this.g.connect({
                method: "setPlaylist",
                params: g.um(l)
            }, a, k6())
        } else J8("Connecting without params"), this.g.connect({}, a, k6());
        Ora(this)
    };
    g.h.dispose = function() {
        this.fa() || (this.N("beforeDispose"), K8(this, 3));
        g.N.prototype.dispose.call(this)
    };
    g.h.V = function() {
        L8(this);
        N8(this);
        M8(this);
        g.ap(this.C);
        this.C = NaN;
        g.ap(this.D);
        this.D = NaN;
        this.l = null;
        g.sr(this.R);
        this.R.length = 0;
        this.g.dispose();
        g.N.prototype.V.call(this);
        this.o = this.A = this.i = this.Oa = this.g = null
    };
    g.h.rD = function() { this.Oh(2) };
    g.h.AI = function() {
        J8("Channel opened");
        this.I && (this.I = !1, M8(this), this.H = g.Zo((0, g.x)(function() {
            J8("Timing out waiting for a screen.");
            this.Oh(1)
        }, this), 15E3));
        Kqa(Yqa(this.g), this.M)
    };
    g.h.xI = function() {
        J8("Channel closed");
        isNaN(this.u) ? n6(!0) : n6();
        this.dispose()
    };
    g.h.yI = function(a) {
        n6();
        isNaN(this.yj()) ? (J8("Channel error: " + a + " without reconnection"), this.dispose()) : (this.I = !0, J8("Channel error: " + a + " with reconnection in " + this.yj() + " ms"), K8(this, 2))
    };
    g.h.zI = function(a) {
        a.params ? J8("Received: action=" + a.action + ", params=" + g.um(a.params)) : J8("Received: action=" + a.action + " {}");
        switch (a.action) {
            case "loungeStatus":
                a = x6(a.params.devices);
                this.i = (0, g.A)(a, function(c) { return new V5(c) });
                a = !!g.Za(this.i, function(c) { return "LOUNGE_SCREEN" == c.type });
                Rra(this, a);
                break;
            case "loungeScreenDisconnected":
                g.gb(this.i, function(c) { return "LOUNGE_SCREEN" == c.type });
                Rra(this, !1);
                break;
            case "remoteConnected":
                var b = new V5(x6(a.params.device));
                g.Za(this.i, function(c) { return b ? c.id == b.id : !1 }) || xqa(this.i, b);
                break;
            case "remoteDisconnected":
                b = new V5(x6(a.params.device));
                g.gb(this.i, function(c) { return b ? c.id == b.id : !1 });
                break;
            case "gracefulDisconnect":
                break;
            case "playlistModified":
                Tra(this, a);
                break;
            case "nowPlaying":
                Vra(this, a);
                break;
            case "onStateChange":
                Ura(this, a);
                break;
            case "onAdStateChange":
                Wra(this, a);
                break;
            case "onVolumeChanged":
                Xra(this, a);
                break;
            case "onSubtitlesTrackChanged":
                Sra(this, a);
                break;
            case "nowAutoplaying":
                Yra(this, a);
                break;
            case "autoplayDismissed":
                this.N("autoplayDismissed");
                break;
            case "autoplayUpNext":
                this.A = a.params.videoId || null;
                this.N("autoplayUpNext", this.A);
                break;
            case "onAutoplayModeChanged":
                this.o =
                    a.params.autoplayMode;
                this.N("autoplayModeChange", this.o);
                "DISABLED" == this.o && this.N("autoplayDismissed");
                break;
            case "onHasPreviousNextChanged":
                Zra(this, a);
                break;
            case "requestAssistedSignIn":
                this.N("assistedSignInRequested", a.params.authCode);
                break;
            default:
                J8("Unrecognized action: " + a.action)
        }
    };
    g.h.pM = function() {
        if (this.l) {
            var a = this.l;
            this.l = null;
            this.Oa.videoId != a && O8(this, "getNowPlaying")
        }
    };
    g.h.hD = function() {
        var a = 3;
        this.fa() || (a = 0, isNaN(this.yj()) ? G7(this.g) && isNaN(this.u) && (a = 1) : a = 2);
        return a
    };
    g.h.Oh = function(a) {
        J8("Disconnecting with " + a);
        L8(this);
        this.N("beforeDisconnect", a);
        1 == a && n6();
        Zqa(this.g, a);
        this.dispose()
    };
    g.h.gD = function() {
        var a = this.Oa;
        this.l && (a = this.Oa.clone(), y8(a, this.l, a.index));
        return z8(a)
    };
    g.h.CM = function(a) {
        var b = new t8(a);
        b.videoId && b.videoId != this.Oa.videoId && (this.l = b.videoId, g.ap(this.C), this.C = g.Zo((0, g.x)(this.pM, this), 5E3));
        var c = [];
        this.Oa.listId == b.listId && this.Oa.videoId == b.videoId && this.Oa.index == b.index || c.push("remoteQueueChange");
        this.Oa.playerState == b.playerState && this.Oa.volume == b.volume && this.Oa.muted == b.muted && x8(this.Oa) == x8(b) && g.um(this.Oa.g) == g.um(b.g) || c.push("remotePlayerChange");
        this.Oa.reset(a);
        (0, g.y)(c, function(d) { this.N(d) }, this)
    };
    g.h.iw = function() {
        var a = this.g.A.id,
            b = g.Za(this.i, function(c) { return "REMOTE_CONTROL" == c.type && c.id != a });
        return b ? b.id : ""
    };
    g.h.yj = function() { var a = this.g; return a.i.isActive() ? a.i.i - (0, g.B)() : NaN };
    g.h.aD = function() { return this.o || "UNSUPPORTED" };
    g.h.bD = function() { return this.A || "" };
    g.h.oN = function() {
        if (!isNaN(this.yj())) {
            var a = this.g.i;
            g.xn(a.g);
            a.start()
        }
    };
    g.h.xM = function(a, b) {
        O8(this, a, b);
        Qra(this)
    };
    I8.prototype.subscribe = I8.prototype.subscribe;
    I8.prototype.unsubscribeByKey = I8.prototype.If;
    I8.prototype.getProxyState = I8.prototype.hD;
    I8.prototype.disconnect = I8.prototype.Oh;
    I8.prototype.getPlayerContextData = I8.prototype.gD;
    I8.prototype.setPlayerContextData = I8.prototype.CM;
    I8.prototype.getOtherConnectedRemoteId = I8.prototype.iw;
    I8.prototype.getReconnectTimeout = I8.prototype.yj;
    I8.prototype.getAutoplayMode = I8.prototype.aD;
    I8.prototype.getAutoplayVideoId = I8.prototype.bD;
    I8.prototype.reconnect = I8.prototype.oN;
    I8.prototype.sendMessage = I8.prototype.xM;
    g.r(P8, P7);
    g.h = P8.prototype;
    g.h.Pd = function(a) { return this.Vc.$_gs(a) };
    g.h.contains = function(a) { return !!this.Vc.$_c(a) };
    g.h.get = function(a) { return this.Vc.$_g(a) };
    g.h.start = function() { this.Vc.$_st() };
    g.h.add = function(a, b, c) { this.Vc.$_a(a, b, c) };
    g.h.remove = function(a, b, c) { this.Vc.$_r(a, b, c) };
    g.h.wo = function(a, b, c, d) { this.Vc.$_un(a, b, c, d) };
    g.h.V = function() {
        for (var a = 0, b = this.i.length; a < b; ++a) this.Vc.$_ubk(this.i[a]);
        this.i.length = 0;
        this.Vc = null;
        P7.prototype.V.call(this)
    };
    g.h.sN = function() { this.N("screenChange") };
    g.h.aK = function() { this.N("onlineScreenChange") };
    Y7.prototype.$_st = Y7.prototype.start;
    Y7.prototype.$_gspc = Y7.prototype.tN;
    Y7.prototype.$_gsppc = Y7.prototype.tB;
    Y7.prototype.$_c = Y7.prototype.contains;
    Y7.prototype.$_g = Y7.prototype.get;
    Y7.prototype.$_a = Y7.prototype.add;
    Y7.prototype.$_un = Y7.prototype.wo;
    Y7.prototype.$_r = Y7.prototype.remove;
    Y7.prototype.$_gs = Y7.prototype.Pd;
    Y7.prototype.$_gos = Y7.prototype.sB;
    Y7.prototype.$_s = Y7.prototype.subscribe;
    Y7.prototype.$_ubk = Y7.prototype.If;
    var h9 = null,
        g9 = !1,
        Q8 = null,
        R8 = null,
        f9 = null,
        V8 = [];
    g.r(i9, g.F);
    g.h = i9.prototype;
    g.h.V = function() {
        g.F.prototype.V.call(this);
        this.o.stop();
        this.A.stop();
        this.I.stop();
        this.M();
        this.g.unsubscribe("proxyStateChange", this.qz, this);
        this.g.unsubscribe("remotePlayerChange", this.uk, this);
        this.g.unsubscribe("remoteQueueChange", this.Kn, this);
        this.g.unsubscribe("autoplayUpNext", this.Ty, this);
        this.g.unsubscribe("previousNextChange", this.nz, this);
        this.g.unsubscribe("nowAutoplaying", this.jz, this);
        this.g.unsubscribe("autoplayDismissed", this.Sy, this);
        this.g = this.u = null
    };
    g.h.Ox = function(a, b) {
        for (var c = [], d = 1; d < arguments.length; ++d) c[d - 1] = arguments[d];
        if (2 != this.g.g)
            if (l9(this)) {
                if (!C8(this.g).isAdPlaying() || "control_seek" != a) switch (a) {
                    case "control_toggle_play_pause":
                        1 == C8(this.g).playerState ? this.g.pause() : this.g.play();
                        break;
                    case "control_play":
                        this.g.play();
                        break;
                    case "control_pause":
                        this.g.pause();
                        break;
                    case "control_seek":
                        this.H.Dj(c[0], c[1]);
                        break;
                    case "control_subtitles_set_track":
                        m9(this, c[0]);
                        break;
                    case "control_set_audio_track":
                        c = c[0], l9(this) && this.g.setAudioTrack(this.i.getVideoData(1).videoId,
                            c)
                }
            } else switch (a) {
                case "control_toggle_play_pause":
                case "control_play":
                case "control_pause":
                    c = this.i.getCurrentTime();
                    n9(this, 0 == c ? void 0 : c);
                    break;
                case "control_seek":
                    n9(this, c[0]);
                    break;
                case "control_subtitles_set_track":
                    m9(this, c[0]);
                    break;
                case "control_set_audio_track":
                    c = c[0], l9(this) && this.g.setAudioTrack(this.i.getVideoData(1).videoId, c)
            }
    };
    g.h.tI = function(a) { this.I.nD(a) };
    g.h.XM = function(a) { this.Ox("control_subtitles_set_track", g.Zb(a) ? null : a) };
    g.h.HA = function() {
        var a = this.i.getOption("captions", "track");
        g.Zb(a) || m9(this, a)
    };
    g.h.ez = function(a) {
        if (l9(this)) {
            this.g.unsubscribe("remotePlayerChange", this.uk, this);
            var b = Math.round(a.volume);
            a = !!a.muted;
            var c = C8(this.g);
            if (b != c.volume || a != c.muted) this.g.setVolume(b, a), this.R.start();
            this.g.subscribe("remotePlayerChange", this.uk, this)
        }
    };
    g.h.wJ = function() {
        g.Zb(this.C) || ksa(this, this.C);
        this.D = !1
    };
    g.h.qz = function(a, b) {
        this.A.stop();
        2 == b && this.GA()
    };
    g.h.uk = function() {
        if (l9(this)) {
            this.o.stop();
            var a = C8(this.g);
            switch (a.playerState) {
                case 1080:
                case 1081:
                case 1084:
                case 1085:
                    this.u.Mm = 1;
                    break;
                case 1082:
                case 1083:
                    this.u.Mm = 0;
                    break;
                default:
                    this.u.Mm = -1
            }
            switch (a.playerState) {
                case 1081:
                case 1:
                    k9(this, new g.iC(8));
                    this.FA();
                    break;
                case 1085:
                case 3:
                    k9(this, new g.iC(9));
                    break;
                case 1083:
                case 0:
                    k9(this, new g.iC(2));
                    this.H.stop();
                    j9(this, this.i.getVideoData().lengthSeconds);
                    break;
                case 1084:
                    k9(this, new g.iC(4));
                    break;
                case 2:
                    k9(this, new g.iC(4));
                    j9(this, x8(a));
                    break;
                case -1:
                    k9(this, new g.iC(64));
                    break;
                case -1E3:
                    k9(this, new g.iC(128, { errorCode: "mdx.remoteerror", errorMessage: "Este v\u00eddeo no se puede reproducir de forma remota." }))
            }
            a = C8(this.g).g;
            var b = this.C;
            (a || b ? a && b && a.trackName == b.trackName && a.languageCode == b.languageCode && a.languageName == b.languageName && a.kind == b.kind : 1) || (this.C = a, ksa(this, a));
            a = C8(this.g); - 1 == a.volume || Math.round(this.i.getVolume()) == a.volume && this.i.isMuted() == a.muted || this.R.isActive() || this.gB()
        } else jsa(this)
    };
    g.h.nz = function() { this.i.N("mdxpreviousnextchange") };
    g.h.Kn = function() { l9(this) || jsa(this) };
    g.h.sC = function() { this.g.wv() };
    g.h.Ty = function(a) { a && !g.O(g.W(this.i).experiments, "disable_legacy_desktop_remote_queue") && (a = g.Wp("/watch_queue_ajax", { method: "GET", td: { action_get_watch_queue_item: 1, video_id: a }, onSuccess: (0, g.x)(this.BL, this) })) && (this.M = (0, g.x)(a.abort, a)) };
    g.h.BL = function(a, b) {
        var c = new g.SA(g.W(this.i), { videoId: b.videoId, title: b.title, author: b.author, murlmq_webp: b.url });
        this.suggestion = c;
        this.i.N("mdxautoplayupnext", c)
    };
    g.h.jz = function(a) { isNaN(a) || this.i.N("mdxnowautoplaying", a) };
    g.h.Sy = function() { this.i.N("mdxautoplaycanceled") };
    g.h.PF = function(a, b) {-1 == C8(this.g).playerState ? n9(this, a) : b && this.g.seekTo(a) };
    g.h.gB = function() {
        if (l9(this)) {
            var a = C8(this.g);
            this.l.Qa(this.P);
            a.muted ? this.i.mute() : this.i.unMute();
            this.i.setVolume(a.volume);
            this.P = this.l.K(this.i, "onVolumeChange", this.ez)
        }
    };
    g.h.FA = function() {
        this.o.stop();
        if (!this.g.fa()) {
            var a = C8(this.g);
            1 == a.playerState && k9(this, new g.iC(8));
            j9(this, x8(a));
            this.o.start()
        }
    };
    g.h.GA = function() {
        this.A.stop();
        this.o.stop();
        var a = this.g.o.getReconnectTimeout();
        2 == this.g.g && !isNaN(a) && this.A.start()
    };
    g.r(o9, g.V);
    o9.prototype.o = function() {
        U5("mdx-privacy-popup-cancel");
        this.l.hide()
    };
    o9.prototype.A = function() {
        U5("mdx-privacy-popup-confirm");
        this.l.hide()
    };
    g.r(p9, g.V);
    p9.prototype.u = function(a) { msa(this, a.state) };
    g.r(q9, g.VT);
    q9.prototype.I = function() {
        var a = this.l.getOption("remote", "receivers");
        a && 1 < a.length && !this.l.getOption("remote", "quickCast") ? (this.C = g.vb(a, this.A, this), g.XT(this, (0, g.A)(a, this.A)), a = this.l.getOption("remote", "currentReceiver"), this.me(this.A(a)), this.enable(!0)) : this.enable(!1)
    };
    q9.prototype.A = function(a) { return a.key };
    q9.prototype.xe = function(a) { return "cast-selector-receiver" == a ? "Reparto..." : this.C[a].name };
    q9.prototype.Lc = function(a) {
        g.VT.prototype.Lc.call(this, a);
        this.l.setOption("remote", "currentReceiver", this.C[a]);
        this.o.kb()
    };
    g.r(r9, g.PK);
    g.h = r9.prototype;
    g.h.create = function() {
        dsa(g.zy(g.W(this.player)));
        this.o.push(g.fp("yt-remote-before-disconnect", this.qI, this));
        this.o.push(g.fp("yt-remote-connection-change", this.DK, this));
        this.o.push(g.fp("yt-remote-receiver-availability-change", this.oz, this));
        this.o.push(g.fp("yt-remote-auto-connect", this.BK, this));
        this.o.push(g.fp("yt-remote-receiver-resumed", this.AK, this));
        this.o.push(g.fp("mdx-privacy-popup-confirm", this.fM, this));
        this.o.push(g.fp("mdx-privacy-popup-cancel", this.eM, this));
        this.oz()
    };
    g.h.load = function() {
        this.player.cancelPlayback();
        g.PK.prototype.load.call(this);
        this.u = new i9(this, this.player, this.g);
        var a = (a = isa()) ? a.currentTime : 0;
        var b = e9() ? new B8($8(), void 0) : null;
        0 == a && b && (a = x8(C8(b)));
        0 != a && this.Nc(a);
        lsa(this, this.ck, this.ck);
        g.aY(this.player.app, 6)
    };
    g.h.unload = function() {
        this.player.N("mdxautoplaycanceled");
        this.l = this.i;
        g.Di(this.u, this.g);
        this.g = this.u = null;
        g.PK.prototype.unload.call(this);
        g.aY(this.player.app, 5);
        s9(this)
    };
    g.h.V = function() {
        g.gp(this.o);
        g.PK.prototype.V.call(this)
    };
    g.h.We = function(a, b) {
        for (var c = [], d = 1; d < arguments.length; ++d) c[d - 1] = arguments[d];
        this.loaded && this.u.Ox.apply(this.u, [a].concat(g.ea(c)))
    };
    g.h.getAdState = function() { return this.Mm };
    g.h.jD = function() { return this.loaded ? this.u.suggestion : null };
    g.h.Je = function() { return this.g ? C8(this.g).Je : !1 };
    g.h.hasNext = function() { return this.g ? C8(this.g).hasNext : !1 };
    g.h.Nc = function(a, b) {
        this.I = a || 0;
        this.player.N("progresssync", a, b)
    };
    g.h.getCurrentTime = function() { return this.I };
    g.h.getProgressState = function() {
        var a = C8(this.g),
            b = this.player.getVideoData();
        return {
            allowSeeking: g.O(g.W(this.player).experiments, "web_player_mdx_allow_seeking_change_killswitch") ? this.player.ac() : !a.isAdPlaying() && this.player.ac(),
            clipEnd: b.clipEnd,
            clipStart: b.clipStart,
            current: this.getCurrentTime(),
            displayedStart: -1,
            duration: a.getDuration(),
            ingestionTime: a.u ? a.l + v8(a) : a.l,
            isAtLiveHead: 1 >= (a.u ? a.i + v8(a) : a.i) - this.getCurrentTime(),
            loaded: a.F,
            seekableEnd: a.u ? a.i + v8(a) : a.i,
            seekableStart: 0 < a.o ? a.o +
                v8(a) : a.o
        }
    };
    g.h.nextVideo = function() { this.g && this.g.nextVideo() };
    g.h.On = function() { this.g && this.g.On() };
    g.h.qI = function(a) { 1 == a && (this.H = this.g ? C8(this.g) : null) };
    g.h.DK = function() {
        var a = e9() ? new B8($8(), void 0) : null;
        if (a) {
            var b = this.l;
            this.loaded && this.unload();
            this.g = a;
            this.H = null;
            b.key != this.i.key && (this.l = b, this.load())
        } else g.Ci(this.g), this.g = null, this.loaded && (this.unload(), (a = this.H) && a.videoId == this.player.getVideoData().videoId && this.player.cueVideoById(a.videoId, x8(a)));
        this.player.N("videodatachange", "newdata", this.player.getVideoData(), 3)
    };
    g.h.oz = function() {
        this.D = [this.i].concat(fsa());
        var a = a9() || this.i;
        t9(this, a);
        this.player.ka("onMdxReceiversChange")
    };
    g.h.ZL = function(a) {!this.F && g.uD(a, 8) && (this.player.pauseVideo(), s9(this)) };
    g.h.BK = function() {
        var a = a9();
        t9(this, a)
    };
    g.h.AK = function() { this.l = a9() };
    g.h.fM = function() {
        this.F = !0;
        s9(this);
        g9 = !1;
        h9 && c9(h9, 1);
        h9 = null
    };
    g.h.eM = function() {
        this.F = !1;
        s9(this);
        t9(this, this.i);
        this.l = this.i;
        g9 = !1;
        h9 = null;
        this.player.playVideo()
    };
    g.h.wc = function(a, b) {
        switch (a) {
            case "casting":
                return this.loaded;
            case "receivers":
                return this.D;
            case "currentReceiver":
                return b && ("cast-selector-receiver" == b.key ? r8() : t9(this, b)), this.loaded ? this.l : this.i;
            case "quickCast":
                return 2 == this.D.length && "cast-selector-receiver" == this.D[1].key ? (b && r8(), !0) : !1
        }
    };
    g.h.gt = function() { this.g.gt() };
    g.h.Fb = function() { return !1 };
    g.h.getOptions = function() { return ["casting", "receivers", "currentReceiver", "quickCast"] };
    g.nV.remote = r9;
})(_yt_player);