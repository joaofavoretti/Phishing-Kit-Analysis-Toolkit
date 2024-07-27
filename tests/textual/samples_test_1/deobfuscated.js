(function (a, k, g, h) {
    var c = {}, b, n = k.plugins, e = k.mimeTypes, m = k.userAgent, f = Function.prototype, d = function () {
      var o = "Error", p = Error.toString();
      return !!(f.bind && f.bind.toString().replace(/bind/g, o) === p && f.toString.toString().replace(/toString/g, o) === p);
    }, l = function () {
      try {
        if (new ActiveXObject("ShockwaveFlash.ShockwaveFlash")) {
          return true;
        }
      } catch (p) {}
      var o = "application/x-shockwave-flash";
      return !!(e && e[o] && e[o].enabledPlugin);
    }, i = function (r, q) {
      var o;
      try {
        o = q.apply(this, arguments) | 0;
      } catch (p) {
        o = -1;
      }
      if (!c.hasOwnProperty(r)) {
        c[r] = o;
      }
    };
    i("ael", function () {
      return typeof h.addEventListener !== "undefined";
    });
    i("atob", function () {
      return typeof g.atob !== "undefined";
    });
    i("cjs", function () {
      return typeof g.emit !== "undefined";
    });
    i("crm", function () {
      return typeof g.domAutomation !== "undefined" || typeof g.domAutomationController !== "undefined";
    });
    i("dcm", function () {
      return typeof h.compatMode !== "undefined";
    });
    i("fls", function () {
      return l();
    });
    i("fpr", function () {
      return d();
    });
    i("h5", function () {
      return typeof h.createElement("canvas").getContext !== "undefined";
    });
    i("jv", function () {
      return typeof k.javaEnabled !== "undefined" && k.javaEnabled();
    });
    i("mlg", function () {
      return e.length;
    });
    i("mua", function () {
      return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(m);
    });
    i("njs", function () {
      return typeof g.Buffer !== "undefined";
    });
    i("njs2", function () {
      return typeof b !== "undefined" && typeof b.versions !== "undefined" && typeof b.versions.node !== "undefined";
    });
    i("no", function () {
      return k.onLine;
    });
    i("pjs", function () {
      return typeof g.callPhantom !== "undefined" || typeof g._phantom !== "undefined" || typeof g.PhantomEmitter !== "undefined" || typeof g.__phantomas !== "undefined";
    });
    i("plg", function () {
      return n.length;
    });
    i("plgs", function () {
      return n instanceof PluginArray;
    });
    i("qs", function () {
      return typeof h.querySelector !== "undefined";
    });
    i("rhn", function () {
      return typeof g.spawn !== "undefined";
    });
    i("rua", function () {
      return /PhantomJS|CasperJS/.test(m);
    });
    i("sel", function () {
      return typeof k.webdriver !== "undefined" && k.webdriver || typeof g.webdriver !== "undefined" && g.webdriver;
    });
    i("xhr", function () {
      return typeof g.XMLHttpRequest !== "undefined";
    });
    a.ue.log({k: "rdf", v: c}, a.ue_cel_ns);
  }(ue_csm, navigator, window, document));
  