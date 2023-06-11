 <?php
echo '
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" prefix="og: https://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US" prefix="og: https://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US" prefix="og: https://ogp.me/ns#" class="tcb">
<!--<![endif]-->

<head>
    <meta charset="UTF-8" />
    <script>
        if (navigator.userAgent.match(/MSIE|Internet Explorer/i) || navigator.userAgent.match(/Trident\/7\..*?rv:11/i)) {
            var href = document.location.href;
            if (!href.match(/[?&]nowprocket/)) {
                if (href.indexOf("?") == -1) {
                    if (href.indexOf("#") == -1) {
                        document.location.href = href + "?nowprocket=1"
                    } else {
                        document.location.href = href.replace("#", "?nowprocket=1#")
                    }
                } else {
                    if (href.indexOf("#") == -1) {
                        document.location.href = href + "&nowprocket=1"
                    } else {
                        document.location.href = href.replace("#", "&nowprocket=1#")
                    }
                }
            }
        }
    </script>
    <script>
        class RocketLazyLoadScripts {
            constructor() {
                this.triggerEvents = ["keydown", "mousedown", "mousemove", "touchmove", "touchstart", "touchend", "wheel"], this.userEventHandler = this._triggerListener.bind(this), this.touchStartHandler = this._onTouchStart.bind(this), this.touchMoveHandler = this._onTouchMove.bind(this), this.touchEndHandler = this._onTouchEnd.bind(this), this.clickHandler = this._onClick.bind(this), this.interceptedClicks = [], window.addEventListener("pageshow", (e => {
                    this.persisted = e.persisted
                })), window.addEventListener("DOMContentLoaded", (() => {
                    this._preconnect3rdParties()
                })), this.delayedScripts = {
                    normal: [],
                    async: [],
                    defer: []
                }, this.allJQueries = []
            }
            _addUserInteractionListener(e) {
                document.hidden ? e._triggerListener() : (this.triggerEvents.forEach((t => window.addEventListener(t, e.userEventHandler, {
                    passive: !0
                }))), window.addEventListener("touchstart", e.touchStartHandler, {
                    passive: !0
                }), window.addEventListener("mousedown", e.touchStartHandler), document.addEventListener("visibilitychange", e.userEventHandler))
            }
            _removeUserInteractionListener() {
                this.triggerEvents.forEach((e => window.removeEventListener(e, this.userEventHandler, {
                    passive: !0
                }))), document.removeEventListener("visibilitychange", this.userEventHandler)
            }
            _onTouchStart(e) {
                "HTML" !== e.target.tagName && (window.addEventListener("touchend", this.touchEndHandler), window.addEventListener("mouseup", this.touchEndHandler), window.addEventListener("touchmove", this.touchMoveHandler, {
                    passive: !0
                }), window.addEventListener("mousemove", this.touchMoveHandler), e.target.addEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "onclick", "rocket-onclick"))
            }
            _onTouchMove(e) {
                window.removeEventListener("touchend", this.touchEndHandler), window.removeEventListener("mouseup", this.touchEndHandler), window.removeEventListener("touchmove", this.touchMoveHandler, {
                    passive: !0
                }), window.removeEventListener("mousemove", this.touchMoveHandler), e.target.removeEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "rocket-onclick", "onclick")
            }
            _onTouchEnd(e) {
                window.removeEventListener("touchend", this.touchEndHandler), window.removeEventListener("mouseup", this.touchEndHandler), window.removeEventListener("touchmove", this.touchMoveHandler, {
                    passive: !0
                }), window.removeEventListener("mousemove", this.touchMoveHandler)
            }
            _onClick(e) {
                e.target.removeEventListener("click", this.clickHandler), this._renameDOMAttribute(e.target, "rocket-onclick", "onclick"), this.interceptedClicks.push(e), e.preventDefault(), e.stopPropagation(), e.stopImmediatePropagation()
            }
            _replayClicks() {
                window.removeEventListener("touchstart", this.touchStartHandler, {
                    passive: !0
                }), window.removeEventListener("mousedown", this.touchStartHandler), this.interceptedClicks.forEach((e => {
                    e.target.dispatchEvent(new MouseEvent("click", {
                        view: e.view,
                        bubbles: !0,
                        cancelable: !0
                    }))
                }))
            }
            _renameDOMAttribute(e, t, n) {
                e.hasAttribute && e.hasAttribute(t) && (event.target.setAttribute(n, event.target.getAttribute(t)), event.target.removeAttribute(t))
            }
            _triggerListener() {
                this._removeUserInteractionListener(this), "loading" === document.readyState ? document.addEventListener("DOMContentLoaded", this._loadEverythingNow.bind(this)) : this._loadEverythingNow()
            }
            _preconnect3rdParties() {
                let e = [];
                document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((t => {
                    if (t.hasAttribute("src")) {
                        const n = new URL(t.src).origin;
                        n !== location.origin && e.push({
                            src: n,
                            crossOrigin: t.crossOrigin || "module" === t.getAttribute("data-rocket-type")
                        })
                    }
                })), e = [...new Map(e.map((e => [JSON.stringify(e), e]))).values()], this._batchInjectResourceHints(e, "preconnect")
            }
            async _loadEverythingNow() {
                this.lastBreath = Date.now(), this._delayEventListeners(), this._delayJQueryReady(this), this._handleDocumentWrite(), this._registerAllDelayedScripts(), this._preloadAllScripts(), await this._loadScriptsFromList(this.delayedScripts.normal), await this._loadScriptsFromList(this.delayedScripts.defer), await this._loadScriptsFromList(this.delayedScripts.async);
                try {
                    await this._triggerDOMContentLoaded(), await this._triggerWindowLoad()
                } catch (e) {}
                window.dispatchEvent(new Event("rocket-allScriptsLoaded")), this._replayClicks()
            }
            _registerAllDelayedScripts() {
                document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((e => {
                    e.hasAttribute("src") ? e.hasAttribute("async") && !1 !== e.async ? this.delayedScripts.async.push(e) : e.hasAttribute("defer") && !1 !== e.defer || "module" === e.getAttribute("data-rocket-type") ? this.delayedScripts.defer.push(e) : this.delayedScripts.normal.push(e) : this.delayedScripts.normal.push(e)
                }))
            }
            async _transformScript(e) {
                return await this._littleBreath(), new Promise((t => {
                    const n = document.createElement("script");
                    [...e.attributes].forEach((e => {
                        let t = e.nodeName;
                        "type" !== t && ("data-rocket-type" === t && (t = "type"), n.setAttribute(t, e.nodeValue))
                    })), e.hasAttribute("src") ? (n.addEventListener("load", t), n.addEventListener("error", t)) : (n.text = e.text, t());
                    try {
                        e.parentNode.replaceChild(n, e)
                    } catch (e) {
                        t()
                    }
                }))
            }
            async _loadScriptsFromList(e) {
                const t = e.shift();
                return t ? (await this._transformScript(t), this._loadScriptsFromList(e)) : Promise.resolve()
            }
            _preloadAllScripts() {
                this._batchInjectResourceHints([...this.delayedScripts.normal, ...this.delayedScripts.defer, ...this.delayedScripts.async], "preload")
            }
            _batchInjectResourceHints(e, t) {
                var n = document.createDocumentFragment();
                e.forEach((e => {
                    if (e.src) {
                        const i = document.createElement("link");
                        i.href = e.src, i.rel = t, "preconnect" !== t && (i.as = "script"), e.getAttribute && "module" === e.getAttribute("data-rocket-type") && (i.crossOrigin = !0), e.crossOrigin && (i.crossOrigin = e.crossOrigin), n.appendChild(i)
                    }
                })), document.head.appendChild(n)
            }
            _delayEventListeners() {
                let e = {};

                function t(t, n) {
                    ! function(t) {
                        function n(n) {
                            return e[t].eventsToRewrite.indexOf(n) >= 0 ? "rocket-" + n : n
                        }
                        e[t] || (e[t] = {
                            originalFunctions: {
                                add: t.addEventListener,
                                remove: t.removeEventListener
                            },
                            eventsToRewrite: []
                        }, t.addEventListener = function() {
                            arguments[0] = n(arguments[0]), e[t].originalFunctions.add.apply(t, arguments)
                        }, t.removeEventListener = function() {
                            arguments[0] = n(arguments[0]), e[t].originalFunctions.remove.apply(t, arguments)
                        })
                    }(t), e[t].eventsToRewrite.push(n)
                }

                function n(e, t) {
                    let n = e[t];
                    Object.defineProperty(e, t, {
                        get: () => n || function() {},
                        set(i) {
                            e["rocket" + t] = n = i
                        }
                    })
                }
                t(document, "DOMContentLoaded"), t(window, "DOMContentLoaded"), t(window, "load"), t(window, "pageshow"), t(document, "readystatechange"), n(document, "onreadystatechange"), n(window, "onload"), n(window, "onpageshow")
            }
            _delayJQueryReady(e) {
                let t = window.jQuery;
                Object.defineProperty(window, "jQuery", {
                    get: () => t,
                    set(n) {
                        if (n && n.fn && !e.allJQueries.includes(n)) {
                            n.fn.ready = n.fn.init.prototype.ready = function(t) {
                                e.domReadyFired ? t.bind(document)(n) : document.addEventListener("rocket-DOMContentLoaded", (() => t.bind(document)(n)))
                            };
                            const t = n.fn.on;
                            n.fn.on = n.fn.init.prototype.on = function() {
                                if (this[0] === window) {
                                    function e(e) {
                                        return e.split(" ").map((e => "load" === e || 0 === e.indexOf("load.") ? "rocket-jquery-load" : e)).join(" ")
                                    }
                                    "string" == typeof arguments[0] || arguments[0] instanceof String ? arguments[0] = e(arguments[0]) : "object" == typeof arguments[0] && Object.keys(arguments[0]).forEach((t => {
                                        delete Object.assign(arguments[0], {
                                            [e(t)]: arguments[0][t]
                                        })[t]
                                    }))
                                }
                                return t.apply(this, arguments), this
                            }, e.allJQueries.push(n)
                        }
                        t = n
                    }
                })
            }
            async _triggerDOMContentLoaded() {
                this.domReadyFired = !0, await this._littleBreath(), document.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._littleBreath(), window.dispatchEvent(new Event("rocket-DOMContentLoaded")), await this._littleBreath(), document.dispatchEvent(new Event("rocket-readystatechange")), await this._littleBreath(), document.rocketonreadystatechange && document.rocketonreadystatechange()
            }
            async _triggerWindowLoad() {
                await this._littleBreath(), window.dispatchEvent(new Event("rocket-load")), await this._littleBreath(), window.rocketonload && window.rocketonload(), await this._littleBreath(), this.allJQueries.forEach((e => e(window).trigger("rocket-jquery-load"))), await this._littleBreath();
                const e = new Event("rocket-pageshow");
                e.persisted = this.persisted, window.dispatchEvent(e), await this._littleBreath(), window.rocketonpageshow && window.rocketonpageshow({
                    persisted: this.persisted
                })
            }
            _handleDocumentWrite() {
                const e = new Map;
                document.write = document.writeln = function(t) {
                    const n = document.currentScript,
                        i = document.createRange(),
                        r = n.parentElement;
                    let o = e.get(n);
                    void 0 === o && (o = n.nextSibling, e.set(n, o));
                    const s = document.createDocumentFragment();
                    i.setStart(s, 0), s.appendChild(i.createContextualFragment(t)), r.insertBefore(s, o)
                }
            }
            async _littleBreath() {
                Date.now() - this.lastBreath > 45 && (await this._requestAnimFrame(), this.lastBreath = Date.now())
            }
            async _requestAnimFrame() {
                return document.hidden ? new Promise((e => setTimeout(e))) : new Promise((e => requestAnimationFrame(e)))
            }
            static run() {
                const e = new RocketLazyLoadScripts;
                e._addUserInteractionListener(e)
            }
        }
        RocketLazyLoadScripts.run();
    </script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Search Engine Optimization by Rank Math - https://s.rankmath.com/home -->
    <title>ikaria - ikaria-juice</title>
    <meta name="description" content="Ikaria Juice&nbsp;is a Natural Weight Loss Supplement That Aims to Help Users Burn Fat Safely and Effectively." />
    <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="https://ikaria-juice.net/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="ikaria - ikaria-juice" />
    <meta property="og:description" content="Ikaria Juice&nbsp;is a Natural Weight Loss Supplement That Aims to Help Users Burn Fat Safely and Effectively." />
    <meta property="og:url" content="https://ikaria-juice.net/" />
    <meta property="og:site_name" content="ikaria-juice" />
    <meta property="og:updated_time" content="2023-04-20T13:36:13+00:00" />
    <meta property="article:published_time" content="2022-07-06T05:15:01+00:00" />
    <meta property="article:modified_time" content="2023-04-20T13:36:13+00:00" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="ikaria - ikaria-juice" />
    <meta name="twitter:description" content="Ikaria Juice&nbsp;is a Natural Weight Loss Supplement That Aims to Help Users Burn Fat Safely and Effectively." />
    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="Anil1996" />
    <meta name="twitter:label2" content="Time to read" />
    <meta name="twitter:data2" content="23 minutes" />
    <script type="application/ld+json" class="rank-math-schema">
        {
            "@context": "https://schema.org",
            "@graph": [{
                "@type": ["Person", "Organization"],
                "@id": "https://ikaria-juice.net/#person",
                "name": "Anil1996"
            }, {
                "@type": "WebSite",
                "@id": "https://ikaria-juice.net/#website",
                "url": "https://ikaria-juice.net",
                "name": "Anil1996",
                "publisher": {
                    "@id": "https://ikaria-juice.net/#person"
                },
                "inLanguage": "en-US",
                "potentialAction": {
                    "@type": "SearchAction",
                    "target": "https://ikaria-juice.net/?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                }
            }, {
                "@type": "ImageObject",
                "@id": "https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp",
                "url": "https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp",
                "width": "200",
                "height": "200",
                "inLanguage": "en-US"
            }, {
                "@type": "WebPage",
                "@id": "https://ikaria-juice.net/#webpage",
                "url": "https://ikaria-juice.net/",
                "name": "ikaria - ikaria-juice",
                "datePublished": "2022-07-06T05:15:01+00:00",
                "dateModified": "2023-04-20T13:36:13+00:00",
                "about": {
                    "@id": "https://ikaria-juice.net/#person"
                },
                "isPartOf": {
                    "@id": "https://ikaria-juice.net/#website"
                },
                "primaryImageOfPage": {
                    "@id": "https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp"
                },
                "inLanguage": "en-US"
            }, {
                "@type": "Person",
                "@id": "https://ikaria-juice.net/author/anil1996/",
                "name": "Anil1996",
                "url": "https://ikaria-juice.net/author/anil1996/",
                "image": {
                    "@type": "ImageObject",
                    "@id": "https://secure.gravatar.com/avatar/7a7097344dad22bb0855eefad2a291a5?s=96&amp;d=mm&amp;r=g",
                    "url": "https://secure.gravatar.com/avatar/7a7097344dad22bb0855eefad2a291a5?s=96&amp;d=mm&amp;r=g",
                    "caption": "Anil1996",
                    "inLanguage": "en-US"
                },
                "sameAs": ["https://ikaria-juice.net"]
            }, {
                "@type": "Article",
                "headline": "ikaria - ikaria-juice",
                "keywords": "ikaria",
                "datePublished": "2022-07-06T05:15:01+00:00",
                "dateModified": "2023-04-20T13:36:13+00:00",
                "author": {
                    "@id": "https://ikaria-juice.net/author/anil1996/",
                    "name": "Anil1996"
                },
                "publisher": {
                    "@id": "https://ikaria-juice.net/#person"
                },
                "description": "Ikaria Juice&nbsp;is a Natural Weight Loss Supplement That Aims to Help Users Burn Fat Safely and Effectively.",
                "name": "ikaria - ikaria-juice",
                "@id": "https://ikaria-juice.net/#richSnippet",
                "isPartOf": {
                    "@id": "https://ikaria-juice.net/#webpage"
                },
                "image": {
                    "@id": "https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp"
                },
                "inLanguage": "en-US",
                "mainEntityOfPage": {
                    "@id": "https://ikaria-juice.net/#webpage"
                }
            }]
        }
    </script>
    <!-- /Rank Math WordPress SEO plugin -->


    <link rel="alternate" type="application/rss+xml" title="ikaria-juice &raquo; Feed" href="https://ikaria-juice.net/feed/" />
    <link rel="alternate" type="application/rss+xml" title="ikaria-juice &raquo; Comments Feed" href="https://ikaria-juice.net/comments/feed/" />
    <style>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link data-minify="1" rel=\'stylesheet\' id=\'tve_landing_page_base_css-css\' href=\'https://ikaria-juice.net/wp-content/cache/min/1/wp-content/plugins/thrive-visual-editor/landing-page/templates/css/base.css?ver=1664515725\' media=\'all\' />
    <link rel=\'stylesheet\' id=\'wp-block-library-css\' href=\'https://ikaria-juice.net/wp-includes/css/dist/block-library/style.min.css?ver=6.1.3\' media=\'all\' />
    <link rel=\'stylesheet\' id=\'classic-theme-styles-css\' href=\'https://ikaria-juice.net/wp-includes/css/classic-themes.min.css?ver=1\' media=\'all\' />

    <link rel=\'stylesheet\' id=\'tve_style_family_tve_flt-css\' href=\'https://ikaria-juice.net/wp-content/plugins/thrive-visual-editor/editor/css/thrive_flat.css?ver=2.6.2.1\' media=\'all\' />
    <link rel=\'stylesheet\' id=\'the_editor_no_theme-css\' href=\'https://ikaria-juice.net/wp-content/plugins/thrive-visual-editor/editor/css/no-theme.css?ver=2.6.2.1\' media=\'all\' />

    <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-includes/js/jquery/jquery.min.js?ver=3.6.1\' id=\'jquery-core-js\' defer></script>
    <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.3.2\' id=\'jquery-migrate-js\' defer></script>
    <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-includes/js/plupload/moxie.min.js?ver=1.3.5\' id=\'moxiejs-js\' defer></script>
    <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-includes/js/plupload/plupload.min.js?ver=2.1.9\' id=\'plupload-js\' defer></script>
    <link rel="https://api.w.org/" href="https://ikaria-juice.net/wp-json/" />
    <link rel="alternate" type="application/json" href="https://ikaria-juice.net/wp-json/wp/v2/pages/11" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://ikaria-juice.net/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://ikaria-juice.net/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 6.1.3" />
    <link rel=\'shortlink\' href=\'https://ikaria-juice.net/\' />
    <link rel="alternate" type="application/json+oembed" href="https://ikaria-juice.net/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fikaria-juice.net%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://ikaria-juice.net/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fikaria-juice.net%2F&#038;format=xml" />
    <meta name="google-site-verification" content="8qsvhe3C-utI6F5xQJNH2K2oi-O2MdgFeF54RCbxjeU" />
    <style type="text/css" id="tve_global_variables">
        :root {
            --tcb-tpl-color-0: rgb(255, 51, 51);
            --tcb-tpl-color-9: rgb(237, 186, 186);
            --tcb-tpl-color-32: rgba(255, 51, 51, 0.7);
            --tcb-tpl-color-31: rgba(255, 51, 51, 0.5);
            --tcb-tpl-color-8: rgb(51, 51, 51);
            --tcb-tpl-color-5: rgb(245, 245, 245);
            --tcb-tpl-color-11: rgb(68, 68, 68);
            --tcb-tpl-color-6: rgb(255, 255, 255);
            --tcb-tpl-color-2: rgb(102, 102, 102);
            --tcb-tpl-color-28: rgb(235, 235, 235);
            --tcb-tpl-color-7: rgb(62, 62, 62);
            --tcb-tpl-color-30: rgb(62, 62, 62);
            --tcb-main-master-h: 0;
            --tcb-main-master-s: 100%;
            --tcb-main-master-l: 60%;
        }
    </style>
    <style type="text/css" class="tve_custom_style">
        @import url("//fonts.googleapis.com/css?family=Poppins:400,900,500,300,600,700,800,200,100&subset=latin");
        @media (min-width: 300px) {
            #tcb_landing_page h3 strong {
                font-weight: 600;
            }
            #tcb_landing_page h3 {
                font-family: Poppins;
                font-weight: var(--g-bold-weight, bold);
                color: rgb(62, 62, 62);
                font-size: 24px;
                line-height: 1.3em;
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page h2 strong {
                font-weight: 600;
            }
            #tcb_landing_page h2 {
                font-family: Poppins;
                font-weight: var(--g-bold-weight, bold);
                color: rgb(62, 62, 62);
                font-size: 44px;
                line-height: 1.3em;
                text-align: center;
                --g-bold-weight: 600;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page p strong,
            #tcb_landing_page li strong {
                font-weight: 600;
            }
            #tcb_landing_page h1 strong {
                font-weight: 600;
            }
            #tcb_landing_page h1 {
                font-family: Poppins;
                font-weight: 300;
                font-size: 65px;
                line-height: 1.3em;
                color: rgb(62, 62, 62);
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            [data-css="tve-u-15e09c94f7d"] {
                background-color: rgb(255, 255, 255);
            }
            #tcb_landing_page h4 {
                font-size: 22px;
                line-height: 1.3em;
                color: rgb(62, 62, 62);
                font-family: Poppins;
                font-weight: 300;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page h5 {
                font-size: 20px;
                line-height: 1.3em;
                color: rgb(62, 62, 62);
                font-family: Poppins;
                font-weight: 300;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page [data-tag="h2"] {
                padding: 0px !important;
            }
            #tcb_landing_page [data-tag="h1"] {
                padding: 0px !important;
            }
            #tcb_landing_page h6 {
                line-height: 1.3em;
                font-size: 19px;
                color: rgb(62, 62, 62);
                font-family: Poppins;
                font-weight: 300;
                --tcb-applied-color: var$(--tcb-tpl-color-7);
            }
            #tcb_landing_page h6 strong {
                font-weight: 600;
            }
            #tcb_landing_page h4 strong {
                font-weight: 600;
            }
            #tcb_landing_page h5 strong {
                font-weight: 600;
            }
            [data-css="tve-u-16c239dc0ca"] {
                padding: 0px !important;
            }
            [data-css="tve-u-16c239f72b3"] {
                padding-top: 0px !important;
                padding-bottom: 0px !important;
            }
            [data-css="tve-u-16c239fcb85"] {
                float: right;
                z-index: 3;
                position: relative;
                min-width: 175px;
                padding: 0px !important;
                margin: 0px !important;
            }
            [data-css="tve-u-16c23a0387d"]::after {
                clear: both;
            }
            .tve_post_lp>div> :not(#tve) {
                --page-section-max-width: 1080px;
            }
            #tcb_landing_page .thrv_text_element a,
            #tcb_landing_page .tcb-styled-list a,
            #tcb_landing_page .tcb-numbered-list a {
                --eff-color: rgb(255, 51, 51);
                --eff-faded: rgba(255, 51, 51, 0.6);
                --eff-ensure-contrast: rgba(255, 51, 51, 0.6);
                --eff-ensure-contrast-complement: rgba(255, 255, 51, 0.6);
                box-shadow: none;
                border-bottom: none;
                background: none;
                text-decoration: none;
                animation: 0s ease 0s 1 normal none running none;
                transition: none 0s ease 0s;
                padding-left: 0px;
                --eff: none;
                color: rgb(255, 51, 51);
                --tcb-applied-color: var$(--tcb-tpl-color-0);
                font-weight: var(--g-regular-weight, normal) !important;
            }
            #tcb_landing_page .thrv_text_element a:hover,
            #tcb_landing_page .tcb-styled-list a:hover,
            #tcb_landing_page .tcb-numbered-list a:hover {
                text-decoration-style: initial;
                text-decoration-color: var(--eff-color, currentColor);
                background: none;
                box-shadow: none;
                --eff: thin;
                text-decoration-line: underline !important;
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-price-button-group="tve-u-price-button-group-164cb5dfffe"] .thrv-button-group-item.tcb-active-state strong {
                font-weight: 500;
            }
            .tve_lp .tcb-plain-text {
                font-size: 16px;
                color: rgb(0, 0, 0);
                line-height: 1.7em;
                font-family: Poppins;
                font-weight: 500;
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page p {
                font-family: Poppins;
                font-weight: 300;
                font-size: 18px;
                line-height: 1.7em;
                color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page li:not([class*="menu"]) {
                font-family: Poppins;
                font-weight: 300;
                font-size: 18px;
                line-height: 1.7em;
                color: rgb(102, 102, 102);
                --tcb-applied-color: var$(--tcb-tpl-color-2);
            }
            #tcb_landing_page ul:not([class*="menu"]),
            #tcb_landing_page ol {
                padding-top: 16px;
                padding-bottom: 16px;
                margin-top: 0px;
                margin-bottom: 0px;
            }
            [data-css="tve-u-17df68678d3"] {
                min-height: 1px !important;
            }
            :not(#tve) [data-css="tve-u-17df6a98d95"] {
                --g-regular-weight: 400;
                --g-bold-weight: 700;
                font-family: Poppins !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 30px !important;
                color: rgb(102, 102, 102) !important;
                --tcb-applied-color: var$(--tcb-tpl-color-2) !important;
                --tve-applied-color: var$(--tcb-tpl-color-2) !important;
            }
            :not(#tve) [data-css="tve-u-17df6a98d95"] strong {
                font-weight: 700 !important;
            }
            [data-css="tve-u-17df6bc2456"] strong {
                font-weight: 700 !important;
            }
            [data-css="tve-u-17df6c322cc"] {
                width: 452px;
                --tve-alignment: center;
                float: none;
                z-index: 3;
                position: relative;
                margin: 0px auto !important;
                padding-top: 0px !important;
            }
            [data-css="tve-u-17df6c5c786"] {
                width: 1111px;
                --tve-alignment: center;
                float: none;
                margin-top: 2px !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df6c66a73"] {
                width: 280px;
                --tve-alignment: center;
                float: none;
                margin: 0px auto 7px !important;
            }
            [data-css="tve-u-17df6c75d44"] {
                margin-top: -1.8375px;
                width: 100% !important;
                max-width: none !important;
            }
            [data-css="tve-u-17df6c66a73"] .tve_image_frame {
                height: 71.4163px;
            }
            :not(#tve) [data-css="tve-u-17df6c96cd1"] {
                --g-regular-weight: 300;
                --g-bold-weight: 500;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-17df6c96cd1"] strong {
                font-weight: 500 !important;
            }
            [data-css="tve-u-17df6cb9b12"] {
                --tve-border-width: 1px;
                border-top: 1px dashed rgba(0, 0, 0, 0.67) !important;
                border-bottom: 1px dashed rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-17df6cdc103"] {
                --g-regular-weight: 300;
                --g-bold-weight: 700;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 37px !important;
                color: rgb(210, 15, 38) !important;
                --tcb-applied-color: var$(--tcb-color-0) !important;
                --tve-applied-color: var$(--tcb-color-0) !important;
            }
            :not(#tve) [data-css="tve-u-17df6cdc103"] strong {
                font-weight: 700 !important;
            }
            [data-css="tve-u-17df6ce4bc2"] {
                width: 374px;
                --tve-alignment: center;
                float: none;
                margin: 2px auto 0px !important;
            }
            [data-css="tve-u-17df6cef5e2"] {
                margin-top: -0.9687px;
                margin-left: 0px;
                width: 100% !important;
                max-width: none !important;
            }
            :not(#tve) [data-css="tve-u-17df6d03296"] {
                --g-regular-weight: 300;
                --g-bold-weight: 700;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-17df6d03296"] strong {
                font-weight: 700 !important;
            }
            [data-css="tve-u-17df6d106a6"] {
                margin-top: 11px !important;
                margin-bottom: 10px !important;
            }
            [data-css="tve-u-17df6d14b04"] {
                margin-top: 10px !important;
                margin-bottom: 11px !important;
            }
            [data-css="tve-u-17df6d1a678"] {
                margin-bottom: 31px !important;
                margin-top: -2px !important;
            }
            [data-css="tve-u-17df6d3228c"] {
                --tcb-applied-color: var$(--tcb-color-0);
                color: rgb(210, 15, 38) !important;
            }
            [data-css="tve-u-17df6d3a33d"] {
                --tcb-applied-color: var$(--tcb-color-0);
                color: rgb(210, 15, 38) !important;
            }
            [data-css="tve-u-17df6d3ecd6"] {
                --tcb-applied-color: var$(--tcb-color-0);
                color: rgb(210, 15, 38) !important;
            }
            [data-css="tve-u-17df6d4deec"] {
                color: rgb(0, 117, 178) !important;
            }
            :not(#tve) [data-css="tve-u-17df7541f3d"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 29px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-17df7541f3d"] strong {
                font-weight: 600 !important;
            }
            [data-css="tve-u-17df7550836"] {
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            [data-css="tve-u-17df757042e"] {
                width: 264px;
                --tve-alignment: center;
                float: none;
                margin: 10px auto 20px !important;
            }
            [data-css="tve-u-17df7583505"] {
                width: 199px;
                --tve-alignment: center;
                float: none;
                margin: 0px auto !important;
            }
            [data-css="tve-u-17df758e0eb"] {
                margin-top: -1px;
            }
            :not(#tve) [data-css="tve-u-17df75a96db"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 22px !important;
                color: rgb(0, 101, 104) !important;
                --tcb-applied-color: var$(--tcb-color-1) !important;
                --tve-applied-color: var$(--tcb-color-1) !important;
            }
            :not(#tve) [data-css="tve-u-17df75a96db"] strong {
                font-weight: 600 !important;
            }
            :not(#tve) [data-css="tve-u-17df75ae21a"] {
                --g-regular-weight: 300;
                --g-bold-weight: 500;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 21px !important;
                color: rgb(210, 15, 38) !important;
                --tcb-applied-color: var$(--tcb-color-0) !important;
                --tve-applied-color: var$(--tcb-color-0) !important;
            }
            :not(#tve) [data-css="tve-u-17df75ae21a"] strong {
                font-weight: 500 !important;
            }
            :not(#tve) [data-css="tve-u-17df75b2b14"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 21px !important;
                color: rgb(210, 15, 38) !important;
                --tcb-applied-color: var$(--tcb-color-0) !important;
                --tve-applied-color: var$(--tcb-color-0) !important;
            }
            [data-css="tve-u-17df75bd532"] {
                margin-bottom: 10px !important;
                margin-top: 10px !important;
            }
            [data-css="tve-u-17df75bfb28"] {
                margin-bottom: 10px !important;
            }
            [data-css="tve-u-17df75f5d6d"] {
                max-width: 33.3333%;
            }
            [data-css="tve-u-17df75f8362"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0);
                --tve-applied-border: 1px solid rgb(0, 0, 0);
                --tve-border-radius: 16px;
                border-radius: 16px;
                overflow: hidden;
                margin-bottom: 19px !important;
                margin-right: -29px !important;
                margin-left: -30px !important;
            }
            [data-css="tve-u-17df760986d"] {
                padding-right: 20px !important;
                padding-left: 20px !important;
            }
            [data-css="tve-u-17df7641da5"] {
                width: 144px;
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df764e53c"] {
                --tcb-applied-color: var$(--tcb-color-3);
                color: rgb(255, 255, 255) !important;
            }
            [data-css="tve-u-17df766ae75"] {
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
            }
            [data-css="tve-u-17df766da38"] {
                background-image: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255)), linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                background-size: auto, auto !important;
                background-position: 50% 50%, 50% 50% !important;
                background-attachment: scroll, scroll !important;
                background-repeat: no-repeat, no-repeat !important;
                --background-image: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255)), linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto, auto !important;
                --background-position: 50% 50%, 50% 50% !important;
                --background-attachment: scroll, scroll !important;
                --background-repeat: no-repeat, no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255)), linear-gradient(var$(--tcb-color-1), var$(--tcb-color-1)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df7672e13"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 29px !important;
                color: rgb(0, 101, 104) !important;
                --tcb-applied-color: var$(--tcb-color-1) !important;
                --tve-applied-color: var$(--tcb-color-1) !important;
            }
            :not(#tve) [data-css="tve-u-17df7672e13"] strong {
                font-weight: 600 !important;
            }
            [data-css="tve-u-17df767794b"] {
                --tcb-applied-color: var$(--tcb-color-2);
                color: rgb(255, 216, 0) !important;
            }
            [data-css="tve-u-17df767794e"] {
                --tcb-applied-color: var$(--tcb-color-3);
                color: rgb(255, 255, 255) !important;
            }
            [data-css="tve-u-17df767a779"] {
                --tcb-applied-color: var$(--tcb-color-2);
                color: rgb(255, 216, 0) !important;
            }
            [data-css="tve-u-17df767a77d"] {
                --tcb-applied-color: var$(--tcb-color-3);
                color: rgb(255, 255, 255) !important;
            }
            [data-css="tve-u-17df767cd49"] {
                --tcb-applied-color: var$(--tcb-color-2);
                color: rgb(255, 216, 0) !important;
            }
            [data-css="tve-u-17df7680f08"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(255, 255, 255);
                --tve-applied-border: 1px solid var$(--tcb-color-3);
                --tve-border-radius: 16px;
                border-radius: 16px;
                overflow: hidden;
                margin-right: -30px !important;
                margin-left: -30px !important;
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df768c421"] {
                padding-right: 20px !important;
                padding-left: 20px !important;
            }
            [data-css="tve-u-17df768fade"] {
                margin-bottom: 2px !important;
            }
            [data-css="tve-u-17df769e533"] {
                width: 395px;
            }
            :not(#tve) [data-css="tve-u-17df76aecab"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 37px !important;
                color: rgb(0, 101, 104) !important;
                --tcb-applied-color: var$(--tcb-color-1) !important;
                --tve-applied-color: var$(--tcb-color-1) !important;
            }
            :not(#tve) [data-css="tve-u-17df76b597d"] {
                font-size: 21px !important;
            }
            [data-css="tve-u-17df76b71ca"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0);
                --tve-applied-border: 1px solid rgb(0, 0, 0);
                --tve-border-radius: 16px;
                border-radius: 16px;
                overflow: hidden;
                margin-top: 20px !important;
                margin-bottom: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df76c8230"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 29px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            :not(#tve) [data-css="tve-u-17df76c8230"] strong {
                font-weight: 600 !important;
            }
            [data-css="tve-u-17df76ca56f"] {
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            [data-css="tve-u-17df76ddbf0"] {
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df76f957e"] {
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(235, 242, 255), rgb(235, 242, 255)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            [data-css="tve-u-17df76fbc57"] {
                --tcb-applied-color: var$(--tcb-color-1);
                color: rgb(0, 101, 104) !important;
            }
            [data-css="tve-u-17df76fe8c4"] {
                --tcb-applied-color: var$(--tcb-color-0);
                color: rgb(210, 15, 38) !important;
            }
            [data-css="tve-u-17df7702447"] {
                --tcb-applied-color: var$(--tcb-color-0);
                color: rgb(210, 15, 38) !important;
            }
            [data-css="tve-u-17df7707bb5"] {
                --tcb-applied-color: var$(--tcb-color-1);
                color: rgb(0, 101, 104) !important;
            }
            [data-css="tve-u-17df7707bb7"] {
                --tcb-applied-color: var$(--tcb-color-0);
                color: rgb(210, 15, 38) !important;
            }
            [data-css="tve-u-17df770c393"] {
                --tcb-applied-color: var$(--tcb-color-1);
                color: rgb(0, 101, 104) !important;
            }
            [data-css="tve-u-17df77233b2"] {
                width: 250px;
                float: none;
                z-index: 3;
                position: relative;
                --tve-alignment: center;
                margin-left: auto !important;
                margin-right: auto !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-17df774b7c1"] {
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df774d63d"] {
                margin-bottom: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df774f5b6"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
                color: rgb(0, 101, 104) !important;
                --tcb-applied-color: var$(--tcb-color-1) !important;
                --tve-applied-color: var$(--tcb-color-1) !important;
            }
            :not(#tve) [data-css="tve-u-17df7753ec4"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-17df7754b0d"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            [data-css="tve-u-17df775e4b3"] {
                --tcb-applied-color: var$(--tcb-color-0);
                color: rgb(210, 15, 38) !important;
            }
            [data-css="tve-u-17df775e4b6"] {
                text-decoration: line-through !important;
            }
            [data-css="tve-u-17df7760cb3"] {
                --tcb-applied-color: var$(--tcb-color-1);
                color: rgb(0, 101, 104) !important;
            }
            [data-css="tve-u-17df7764468"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0);
                --tve-applied-border: 1px solid rgb(0, 0, 0);
                --tve-border-radius: 12px;
                border-radius: 12px;
                overflow: hidden;
            }
            [data-css="tve-u-17df77a9ce8"] {
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df77c0518"] {
                background-image: linear-gradient(rgb(68, 182, 61), rgb(68, 182, 61)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(68, 182, 61), rgb(68, 182, 61)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(68, 182, 61), rgb(68, 182, 61)) !important;
            }
            :not(#tve) [data-css="tve-u-17df77ce45a"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 50px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            :not(#tve) [data-css="tve-u-17df77daf92"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 35px !important;
                color: rgb(255, 216, 0) !important;
                --tcb-applied-color: var$(--tcb-color-2) !important;
                --tve-applied-color: var$(--tcb-color-2) !important;
            }
            [data-css="tve-u-17df77e971a"] {
                margin-bottom: -21px !important;
                margin-top: 9px !important;
            }
            :not(#tve) [data-css="tve-u-17df77fa6fe"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 25px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            [data-css="tve-u-17df77ff17b"] {
                --tve-border-radius: 0px;
                --tve-border-top-left-radius: 12px;
                overflow: hidden;
                --tve-border-top-right-radius: 12px;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                border-radius: 12px 12px 0px 0px !important;
            }
            [data-css="tve-u-17df78017f9"] {
                max-width: 33.3333%;
            }
            :not(#tve) [data-css="tve-u-17df781b12a"] {
                --g-regular-weight: 400;
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 24px !important;
            }
            [data-css="tve-u-17df782bd4f"] {
                width: 534px;
                --tve-alignment: center;
                float: none;
                margin: 27px auto 10px !important;
            }
            [data-css="tve-u-17df783dc56"] {
                width: 220px;
                --tve-alignment: center;
                float: none;
                margin-top: 0px !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df7848cce"] {
                margin-top: -1.575px;
            }
            :not(#tve) [data-css="tve-u-17df78521ef"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 29px !important;
                color: rgb(68, 68, 68) !important;
                --tcb-applied-color: var$(--tcb-tpl-color-11) !important;
                --tve-applied-color: var$(--tcb-tpl-color-11) !important;
            }
            :not(#tve) [data-css="tve-u-17df785bae2"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 22px !important;
                color: rgb(210, 15, 38) !important;
                --tcb-applied-color: var$(--tcb-color-0) !important;
                --tve-applied-color: var$(--tcb-color-0) !important;
            }
            [data-css="tve-u-17df786674c"] {
                --tcb-applied-color: var$(--tcb-tpl-color-11) !important;
                text-decoration: line-through !important;
            }
            [data-css="tve-u-17df7870511"] {
                width: 540px;
            }
            [data-css="tve-u-17df789e173"] {
                width: 418px;
                --tve-alignment: center;
                float: none;
                margin: 10px auto !important;
            }
            [data-css="tve-u-17df78cf701"] {
                width: 297px;
                --tve-alignment: center;
                float: none;
                margin: 10px auto 25px !important;
            }
            [data-css="tve-u-17df78e92a8"] {
                --tve-border-radius: 12px;
                border-radius: 12px;
                overflow: hidden;
                background-image: linear-gradient(rgb(239, 247, 255), rgb(239, 247, 255)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(239, 247, 255), rgb(239, 247, 255)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(239, 247, 255), rgb(239, 247, 255)) !important;
                margin: 20px -30px !important;
            }
            [data-css="tve-u-17df78f8557"] {
                padding-right: 20px !important;
                padding-left: 20px !important;
            }
            [data-css="tve-u-17df7983fdd"] {
                --tcb-local-color-980bd: rgb(255, 51, 51);
                --tcb-local-related-980bd: --tcb-tpl-color-0;
                --tcb-local-default-980bd: rgb(255, 51, 51);
                padding: 0px !important;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7983fdd"] .tve-page-section-in {
                justify-content: center;
                display: flex;
                flex-direction: column;
            }
            [data-css="tve-u-17df7983fde"] {
                background-color: var(--tcb-local-color-980bd, rgb(255, 51, 51)) !important;
                background-image: none !important;
            }
            [data-css="tve-u-17df7983fdf"] {
                --tve-color: rgb(255, 255, 255);
                min-height: 124px !important;
            }
            :not(#tve) [data-css="tve-u-17df7983fdf"] p,
            :not(#tve) [data-css="tve-u-17df7983fdf"] li,
            :not(#tve) [data-css="tve-u-17df7983fdf"] blockquote,
            :not(#tve) [data-css="tve-u-17df7983fdf"] address,
            :not(#tve) [data-css="tve-u-17df7983fdf"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7983fdf"] label,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h1,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h2,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h3,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h4,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h5,
            :not(#tve) [data-css="tve-u-17df7983fdf"] h6 {
                color: var(--tve-color, rgb(255, 255, 255));
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
            }
            [data-css="tve-u-17df7983fe6"] {
                background-image: none !important;
                padding: 0px !important;
                background-color: transparent !important;
            }
            [data-css="tve-u-17df7983fe4"] {
                font-size: 30px;
                margin-left: auto;
                margin-right: auto;
                width: 30px;
                height: 30px;
                border: 1px solid rgba(255, 255, 255, 0.5);
                float: left;
                z-index: 3;
                position: relative;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                padding: 12px !important;
            }
            [data-css="tve-u-17df7983fe2"] {
                max-width: 9.2%;
            }
            [data-css="tve-u-17df7983fe5"] {
                max-width: 90.8%;
            }
            [data-css="tve-u-17df7983fe0"] {
                margin-bottom: 0px !important;
            }
            :not(#tve) [data-css="tve-u-17df7983fe4"]> :first-child {
                color: rgb(255, 255, 255);
            }
            [data-css="tve-u-17df7983fe3"]::after {
                clear: both;
            }
            [data-css="tve-u-17df7983fe1"] {
                padding: 0px !important;
            }
            [data-css="tve-u-17df79a49c7"] {
                padding-top: 25px !important;
            }
            :not(#tve) [data-css="tve-u-17df79bf25a"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-17df7a3eebe"] {
                margin-top: 20px !important;
                margin-bottom: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df7a5ac8e"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            [data-css="tve-u-17df7a61a94"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7a64a7c"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7a6df66"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-17df7ac70bf"] {
                margin-bottom: 30px !important;
            }
            [data-css="tve-u-17df7adf57e"] {
                width: 300px;
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
                margin-top: 21px !important;
            }
            [data-css="tve-u-17df7aeaf7a"] {
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7af8171"] {
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(62, 39, 39) !important;
                --tcb-applied-color: rgb(62, 39, 39) !important;
                --tve-applied-color: rgb(62, 39, 39) !important;
                font-size: 32px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b06854"] {
                font-weight: var(--g-regular-weight, normal) !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b0e8a1"] {
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(255, 216, 0) !important;
                --tcb-applied-color: var$(--tcb-color-2) !important;
                --tve-applied-color: var$(--tcb-color-2) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-17df7b15cce"] {
                margin-top: 20px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            [data-css="tve-u-17df7b17f20"] {
                margin-bottom: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b35fe8"] {
                font-size: 22px !important;
                color: rgb(8, 8, 8) !important;
                --tcb-applied-color: rgb(8, 8, 8) !important;
                --tve-applied-color: rgb(8, 8, 8) !important;
            }
            [data-css="tve-u-17df7b39655"] {
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df7b687b3"] {
                background-color: var(--tcb-local-color-980bd, rgb(255, 51, 51)) !important;
                background-image: none !important;
            }
            [data-css="tve-u-17df7b687b5"] {
                --tve-color: rgb(255, 255, 255);
                min-height: 124px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b687b5"] p,
            :not(#tve) [data-css="tve-u-17df7b687b5"] li,
            :not(#tve) [data-css="tve-u-17df7b687b5"] blockquote,
            :not(#tve) [data-css="tve-u-17df7b687b5"] address,
            :not(#tve) [data-css="tve-u-17df7b687b5"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7b687b5"] label,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h1,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h2,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h3,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h4,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h5,
            :not(#tve) [data-css="tve-u-17df7b687b5"] h6 {
                color: var(--tve-color, rgb(255, 255, 255));
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
            }
            [data-css="tve-u-17df7b687b7"] {
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7b687b9"] {
                padding: 0px !important;
            }
            [data-css="tve-u-17df7b687bb"] {
                max-width: 9.2%;
            }
            [data-css="tve-u-17df7b687bc"]::after {
                clear: both;
            }
            [data-css="tve-u-17df7b687be"] {
                font-size: 30px;
                margin-left: auto;
                margin-right: auto;
                width: 30px;
                height: 30px;
                border: 1px solid rgba(255, 255, 255, 0.5);
                float: left;
                z-index: 3;
                position: relative;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
                padding: 12px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b687be"]> :first-child {
                color: rgb(255, 255, 255);
            }
            [data-css="tve-u-17df7b687c0"] {
                max-width: 90.8%;
            }
            [data-css="tve-u-17df7b687c2"] {
                background-image: none !important;
                padding: 0px !important;
                background-color: transparent !important;
            }
            [data-css="tve-u-17df7b687ca"] {
                --tcb-local-color-980bd: rgb(255, 51, 51);
                --tcb-local-related-980bd: --tcb-tpl-color-0;
                --tcb-local-default-980bd: rgb(255, 51, 51);
                padding: 0px !important;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7b687ca"] .tve-page-section-in {
                justify-content: center;
                display: flex;
                flex-direction: column;
            }
            [data-css="tve-u-17df7b816f1"] {
                padding-top: 1px !important;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b8989b"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 44px !important;
                color: rgb(255, 252, 252) !important;
                --tcb-applied-color: rgb(255, 252, 252) !important;
                --tve-applied-color: rgb(255, 252, 252) !important;
            }
            [data-css="tve-u-17df7bd281d"] {
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7bd9c49"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 31px !important;
            }
            [data-css="tve-u-17df7bdf5d3"] {
                width: 432px;
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            :not(#tve) [data-css="tve-u-17df7c02dd3"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-17df7c0566a"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 50px !important;
            }
            [data-css="tve-u-17df7c1045d"] .tcb-button-link {
                letter-spacing: 2px;
                background-image: linear-gradient(var(--tcb-local-color-62516, rgb(19, 114, 211)), var(--tcb-local-color-62516, rgb(19, 114, 211)));
                --tve-applied-background-image: linear-gradient(var$(--tcb-local-color-62516, rgb(19, 114, 211)), var$(--tcb-local-color-62516, rgb(19, 114, 211)));
                background-size: auto;
                background-attachment: scroll;
                border-radius: 5px;
                padding: 18px;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                background-color: transparent !important;
            }
            [data-css="tve-u-17df7c1045d"] .tcb-button-link span {
                color: rgb(255, 255, 255);
                --tcb-applied-color: #fff;
            }
            [data-css="tve-u-17df7c1045d"] {
                --tcb-local-color-62516: rgb(255, 51, 51) !important;
            }
            [data-css="tve-u-17df7c16d75"] {
                font-weight: var(--g-bold-weight, bold) !important;
            }
            :not(#tve) [data-css="tve-u-17df7c16d75"] {
                font-size: 40px !important;
                text-transform: none !important;
                background-color: transparent !important;
                --tve-applied-background-color: transparent !important;
            }
            [data-css="tve-u-17df7c27651"] {
                margin-bottom: 0px !important;
                padding-bottom: 23px !important;
                padding-top: 23px !important;
            }
            [data-css="tve-u-17df7c6c972"] {
                background-image: linear-gradient(rgb(68, 68, 68), rgb(68, 68, 68)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(68, 68, 68), rgb(68, 68, 68)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(var$(--tcb-tpl-color-11), var$(--tcb-tpl-color-11)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7c6f6f1"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            :not(#tve) [data-css="tve-u-17df7c71050"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            :not(#tve) [data-css="tve-u-17df7c7a766"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 23px !important;
            }
            :not(#tve) [data-css="tve-u-17df7c85435"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 16px !important;
            }
            [data-css="tve-u-17df7c8d11a"] {
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-17df7c8fc30"] {
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-17df7cd1493"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0);
                --tve-applied-border: 1px solid rgb(0, 0, 0);
                --tve-border-radius: 16px;
                border-radius: 16px;
                overflow: hidden;
            }
            [data-css="tve-u-17df7d10838"] {
                margin-top: 10px !important;
            }
            [data-css="tve-u-17df7d10832"] {
                --tve-alignment: center;
                float: none;
                --tcb-local-default-master-h: var(--tcb-main-master-h, 220);
                --tcb-local-default-master-s: var(--tcb-main-master-s, 76%);
                --tcb-local-default-master-l: var(--tcb-main-master-l, 53%);
                --tcb-local-default-master-a: var(--tcb-main-master-a, 1);
                margin-left: auto !important;
                margin-right: auto !important;
                --tve-countdown-size: 58px !important;
                --tve-countdown-label-size: 0.21 !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] span,
            :not(#tve) [data-css="tve-u-17df7d10834"] span::before {
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
                background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                color: var(--tve-color, rgb(255, 255, 255)) !important;
                --tve-applied-color: var$(--tve-color, rgb(255, 255, 255)) !important;
            }
            [data-css="tve-u-17df7d10834"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-color: rgb(255, 255, 255);
                --tve-applied---tve-color: rgb(255, 255, 255);
                --flip-border-width: 1px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] .t-digit-part>span {
                padding: 20px !important;
            }
            [data-css="tve-u-17df7d10835"] {
                margin-top: 10px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10837"] p,
            :not(#tve) [data-css="tve-u-17df7d10837"] li,
            :not(#tve) [data-css="tve-u-17df7d10837"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10837"] address,
            :not(#tve) [data-css="tve-u-17df7d10837"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10837"] label,
            :not(#tve) [data-css="tve-u-17df7d10837"] h1,
            :not(#tve) [data-css="tve-u-17df7d10837"] h2,
            :not(#tve) [data-css="tve-u-17df7d10837"] h3,
            :not(#tve) [data-css="tve-u-17df7d10837"] h4,
            :not(#tve) [data-css="tve-u-17df7d10837"] h5,
            :not(#tve) [data-css="tve-u-17df7d10837"] h6 {
                color: var(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tve-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tcb-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
            }
            [data-css="tve-u-17df7d10837"] {
                --tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-applied---tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-font-weight: var(--g-bold-weight, bold);
                --tve-font-family: Arial, Helvetica, sans-serif;
                --tve-font-size: calc(var(--tve-countdown-size) * 0.3);
            }
            :not(#tve) [data-css="tve-u-17df7d10837"] p,
            :not(#tve) [data-css="tve-u-17df7d10837"] li,
            :not(#tve) [data-css="tve-u-17df7d10837"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10837"] address,
            :not(#tve) [data-css="tve-u-17df7d10837"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10837"] label {
                font-weight: var(--tve-font-weight, var(--g-bold-weight, bold));
                font-family: var(--tve-font-family, Arial, Helvetica, sans-serif);
            }
            :not(#tve) [data-css="tve-u-17df7d10837"] .tcb-plain-text {
                font-size: var(--tve-font-size, 30px);
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] span,
            :not(#tve) [data-css="tve-u-17df7d1083a"] span::before {
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
                background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                color: var(--tve-color, rgb(255, 255, 255)) !important;
                --tve-applied-color: var$(--tve-color, rgb(255, 255, 255)) !important;
            }
            [data-css="tve-u-17df7d1083a"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-color: rgb(255, 255, 255);
                --tve-applied---tve-color: rgb(255, 255, 255);
                --flip-border-width: 1px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] .t-digit-part>span {
                padding: 20px !important;
            }
            [data-css="tve-u-17df7d1083b"] {
                margin-top: 10px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083d"] p,
            :not(#tve) [data-css="tve-u-17df7d1083d"] li,
            :not(#tve) [data-css="tve-u-17df7d1083d"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d1083d"] address,
            :not(#tve) [data-css="tve-u-17df7d1083d"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d1083d"] label,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h1,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h2,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h3,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h4,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h5,
            :not(#tve) [data-css="tve-u-17df7d1083d"] h6 {
                color: var(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tve-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tcb-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
            }
            [data-css="tve-u-17df7d1083d"] {
                --tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-applied---tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-font-weight: var(--g-bold-weight, bold);
                --tve-font-family: Arial, Helvetica, sans-serif;
                --tve-font-size: calc(var(--tve-countdown-size) * 0.3);
            }
            :not(#tve) [data-css="tve-u-17df7d1083d"] p,
            :not(#tve) [data-css="tve-u-17df7d1083d"] li,
            :not(#tve) [data-css="tve-u-17df7d1083d"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d1083d"] address,
            :not(#tve) [data-css="tve-u-17df7d1083d"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d1083d"] label {
                font-weight: var(--tve-font-weight, var(--g-bold-weight, bold));
                font-family: var(--tve-font-family, Arial, Helvetica, sans-serif);
            }
            :not(#tve) [data-css="tve-u-17df7d1083d"] .tcb-plain-text {
                font-size: var(--tve-font-size, 30px);
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] span,
            :not(#tve) [data-css="tve-u-17df7d1083f"] span::before {
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
                background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                color: var(--tve-color, rgb(255, 255, 255)) !important;
                --tve-applied-color: var$(--tve-color, rgb(255, 255, 255)) !important;
            }
            [data-css="tve-u-17df7d1083f"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-color: rgb(255, 255, 255);
                --tve-applied---tve-color: rgb(255, 255, 255);
                --flip-border-width: 1px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] .t-digit-part>span {
                padding: 20px !important;
            }
            [data-css="tve-u-17df7d10840"] {
                margin-top: 10px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10842"] p,
            :not(#tve) [data-css="tve-u-17df7d10842"] li,
            :not(#tve) [data-css="tve-u-17df7d10842"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10842"] address,
            :not(#tve) [data-css="tve-u-17df7d10842"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10842"] label,
            :not(#tve) [data-css="tve-u-17df7d10842"] h1,
            :not(#tve) [data-css="tve-u-17df7d10842"] h2,
            :not(#tve) [data-css="tve-u-17df7d10842"] h3,
            :not(#tve) [data-css="tve-u-17df7d10842"] h4,
            :not(#tve) [data-css="tve-u-17df7d10842"] h5,
            :not(#tve) [data-css="tve-u-17df7d10842"] h6 {
                color: var(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tve-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
                --tcb-applied-color: var$(--tve-color, hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)));
            }
            [data-css="tve-u-17df7d10842"] {
                --tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-applied---tve-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1));
                --tve-font-weight: var(--g-bold-weight, bold);
                --tve-font-family: Arial, Helvetica, sans-serif;
                --tve-font-size: calc(var(--tve-countdown-size) * 0.3);
            }
            :not(#tve) [data-css="tve-u-17df7d10842"] p,
            :not(#tve) [data-css="tve-u-17df7d10842"] li,
            :not(#tve) [data-css="tve-u-17df7d10842"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10842"] address,
            :not(#tve) [data-css="tve-u-17df7d10842"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10842"] label {
                font-weight: var(--tve-font-weight, var(--g-bold-weight, bold));
                font-family: var(--tve-font-family, Arial, Helvetica, sans-serif);
            }
            :not(#tve) [data-css="tve-u-17df7d10842"] .tcb-plain-text {
                font-size: var(--tve-font-size, 30px);
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] span,
            :not(#tve) [data-css="tve-u-17df7d10844"] span::before {
                --tcb-applied-color: var$(--tve-color, rgb(255, 255, 255));
                background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)), hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1))) !important;
                color: var(--tve-color, rgb(255, 255, 255)) !important;
                --tve-applied-color: var$(--tve-color, rgb(255, 255, 255)) !important;
            }
            [data-css="tve-u-17df7d10844"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-color: rgb(255, 255, 255);
                --tve-applied---tve-color: rgb(255, 255, 255);
                --flip-border-width: 1px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] .t-digit-part>span {
                padding: 20px !important;
            }
            [data-css="tve-u-17df7d10845"] {
                margin-top: 10px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10848"] {
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                font-family: Poppins !important;
                font-weight: var(--g-regular-weight, normal) !important;
                color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)) !important;
                --tcb-applied-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)) !important;
                --tve-applied-color: hsla(var(--tcb-main-master-h, 220), var(--tcb-main-master-s, 76%), var(--tcb-main-master-l, 53%), var(--tcb-main-master-a, 1)) !important;
                font-size: 20px !important;
                padding-bottom: 0px !important;
                margin-bottom: 0px !important;
                padding-top: 0px !important;
                margin-top: 0px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10848"] strong {
                font-weight: 500 !important;
            }
            :not(#tve)[data-css="tve-u-17df7d10833"] span,
            :not(#tve)[data-css="tve-u-17df7d10833"] .tcb-editable-label,
            :not(#tve)[data-css="tve-u-17df7d10833"] .tcb-plain-text {
                font-weight: var(--tve-font-weight, var(--g-regular-weight, normal));
                font-family: var(--tve-font-family, Poppins);
            }
            [data-css="tve-u-17df7d10833"] {
                --tve-font-weight: var(--g-regular-weight, normal);
                --tve-font-family: Poppins;
                --g-regular-weight: 400;
                --g-bold-weight: 500;
                --tve-text-transform: uppercase;
            }
            :not(#tve) [data-css="tve-u-17df7d10833"] p,
            :not(#tve) [data-css="tve-u-17df7d10833"] li,
            :not(#tve) [data-css="tve-u-17df7d10833"] blockquote,
            :not(#tve) [data-css="tve-u-17df7d10833"] address,
            :not(#tve) [data-css="tve-u-17df7d10833"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-17df7d10833"] label,
            :not(#tve) [data-css="tve-u-17df7d10833"] h1,
            :not(#tve) [data-css="tve-u-17df7d10833"] h2,
            :not(#tve) [data-css="tve-u-17df7d10833"] h3,
            :not(#tve) [data-css="tve-u-17df7d10833"] h4,
            :not(#tve) [data-css="tve-u-17df7d10833"] h5,
            :not(#tve) [data-css="tve-u-17df7d10833"] h6 {
                text-transform: var(--tve-text-transform, uppercase);
            }
            :not(#tve) [data-css="tve-u-17df7d10836"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10839"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083c"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083e"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10841"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10843"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10846"] {
                letter-spacing: 1px;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: calc(var(--tve-countdown-size) * var(--tve-countdown-label-size)) !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] {
                margin-right: 2px !important;
                margin-left: 2px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] {
                margin-right: 2px !important;
                margin-left: 2px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] {
                margin-right: 2px !important;
                margin-left: 2px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] {
                margin-right: 2px !important;
                margin-left: 2px !important;
            }
            [data-css="tve-u-17df7d10847"] {
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-181ebb0cfdc"] {
                margin-left: -40.594px;
                width: 136% !important;
                max-width: none !important;
            }
            [data-css="tve-u-181ebb115ec"] {
                width: 445px;
                margin-left: -12px !important;
            }
            [data-css="tve-u-181ebb115ec"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-181ebb32613"] {
                width: 561px;
                --tve-alignment: center;
                float: none;
                margin: 10px auto !important;
            }
            [data-css="tve-u-181ebb32666"] {
                margin-top: 0px;
                margin-left: -6.906px;
                width: 112% !important;
                max-width: none !important;
            }
            [data-css="tve-u-181ebb32613"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-181ebb378bb"] {
                width: 520px;
                --tve-alignment: center;
                float: none;
                margin: 10px auto !important;
            }
            [data-css="tve-u-181ebb37911"] {
                margin-left: 0px;
                width: 100% !important;
                max-width: none !important;
            }
            [data-css="tve-u-181ebb378bb"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-181ebb4bdf9"] {
                margin-top: -1.575px;
            }
            [data-css="tve-u-181fb5729b9"] {
                max-width: 33.3333%;
            }
            [data-css="tve-u-1826d1ca79d"] {
                margin-top: -0.094px;
                margin-left: -13.813px;
                width: 104% !important;
                max-width: none !important;
            }
            [data-css="tve-u-1826d1d57dd"] {
                margin-left: -6.828px;
                width: 105% !important;
                max-width: none !important;
            }
            [data-css="tve-u-17df782bd4f"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-1826d1de54a"] {
                margin-top: 0px;
                margin-left: -9px;
                width: 104% !important;
                max-width: none !important;
            }
            [data-css="tve-u-17df78cf701"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-17df789e173"] .tve_image_frame {
                height: 100%;
            }
            :not(#tve) [data-css="tve-u-1826d40760c"] {
                color: rgb(246, 238, 238) !important;
                --tve-applied-color: rgb(246, 238, 238) !important;
            }
            [data-css="tve-u-182a21cfe9b"] {
                color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-182a21cfea9"] {
                color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-182a21ffe33"] {
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a221969a"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22196a0"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22196a4"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22196a9"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22196ab"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22196af"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22196b2"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22196b4"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a221c964"] {
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182a22627b3"] {
                font-size: 24px !important;
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182a22772ff"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 24px !important;
                font-weight: var(--g-bold-weight, bold) !important;
            }
            [data-css="tve-u-182a2280218"] {
                color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-182a22875f1"] {
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22a7daa"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22e1160"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22e1164"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a22e1166"] {
                color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182a22efa17"] {
                font-size: 24px !important;
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a2301052"] {
                --tcb-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a2301056"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a230573f"] {
                font-family: Poppins !important;
                font-weight: 400 !important;
                font-size: 24px !important;
            }
            [data-css="tve-u-182a2305741"] {
                font-family: Poppins !important;
                font-weight: 400 !important;
                font-size: 18px !important;
            }
            [data-css="tve-u-182a230573f"] strong {
                font-weight: 500 !important;
            }
            [data-css="tve-u-182a230c583"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a2319da8"] {
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a2323aac"] {
                font-family: Poppins !important;
                font-weight: 400 !important;
                font-size: 24px !important;
            }
            [data-css="tve-u-182a2323aac"] strong {
                font-weight: 500 !important;
            }
            :not(#tve) [data-css="tve-u-182a581a52f"] {
                font-size: 24px !important;
                font-weight: var(--g-bold-weight, bold) !important;
            }
            [data-css="tve-u-182a582fff5"] {
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a58342f8"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a58342fb"] {
                color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-182a58342fd"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a58342fe"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5834300"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5834301"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5834303"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5834305"] {
                color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-182a587f92b"] {
                font-size: 20px !important;
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a587f960"] {
                font-weight: normal !important;
            }
            :not(#tve) [data-css="tve-u-182a588f6f3"] {
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a58a55db"] {
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182a5c81d10"] {
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-182a5c886be"] {
                font-size: 20px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5c8fdf9"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5c8fdfb"] {
                --tcb-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5c914cb"] {
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182a5c97d7d"] {
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-182a5c9fd32"] {
                font-size: 20px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5ca44fe"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5ca4500"] {
                --tcb-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5ca68dc"] {
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182a5cf74d9"] {
                font-size: 24px !important;
                color: rgb(102, 102, 102) !important;
                --tcb-applied-color: var$(--tcb-tpl-color-2) !important;
                --tve-applied-color: var$(--tcb-tpl-color-2) !important;
            }
            :not(#tve) [data-css="tve-u-182a5cfcfc6"] {
                font-size: 20px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-182d8f44347"] {
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
                font-size: 45px !important;
                font-family: Poppins !important;
                --g-regular-weight: 400;
                --g-bold-weight: 900;
                font-weight: var(--g-regular-weight, normal) !important;
            }
            [data-css="tve-u-182e9a867fc"] {
                width: 520px;
                --tve-alignment: center;
                float: none;
                margin: 10px auto !important;
            }
            [data-css="tve-u-182e9a867fc"] .tve_image_frame {
                height: 100%;
            }
            [data-css="tve-u-182e9a8680d"] {
                margin-left: -1.75px;
                width: 101% !important;
                max-width: none !important;
            }
            [data-css="tve-u-182e9de2362"] {
                width: 540px;
                margin-top: 10px !important;
                margin-bottom: 11px !important;
            }
            [data-css="tve-u-182e9df3c2c"] {
                width: 220px;
                --tve-alignment: center;
                float: none;
                margin-top: -20px !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-182e9df6409"] {
                width: 220px;
                --tve-alignment: center;
                float: none;
                margin-top: 22px !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-182e9df8fd7"] {
                width: 220px;
                --tve-alignment: center;
                float: none;
                margin-top: -5px !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-183301ee90a"] {
                width: 234px;
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-183302120fb"] {
                border: 1px solid rgb(0, 0, 0) !important;
                --tve-applied-border: 1px solid rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-18330216701"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-183302181ff"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-183302191c4"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833021a599"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833021b306"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833021bef7"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833021ca14"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-1833021fc10"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-1833021fc12"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-1833021fc13"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-1833021fc15"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-1833021fc16"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-1833021fc1a"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-18330221a89"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-18330221a8b"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-18330221a8d"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-18330222dad"] {
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-18330222daf"] {
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-18330222db1"] {
                font-weight: var(--g-regular-weight, normal) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-18330224529"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-1833022452b"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-1833022452d"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-1833022452e"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            :not(#tve) [data-css="tve-u-18330224530"] {
                font-weight: var(--g-regular-weight, normal) !important;
            }
            [data-css="tve-u-18330282576"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-18330282d64"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-18330283658"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-1833028924e"] {
                color: rgb(181, 13, 13) !important;
            }
            :not(#tve) [data-css="tve-u-18330336c08"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 35px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            :not(#tve) [data-css="tve-u-18330336c08"] strong {
                font-weight: 600 !important;
            }
            [data-css="tve-u-18330369526"] {
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                margin-bottom: 20px !important;
                margin-top: 20px !important;
            }
            [data-css="tve-u-183303b4d9d"] {
                background-image: none !important;
                background-color: var(--tcb-local-color-2f3a9, rgb(245, 245, 245)) !important;
            }
            [data-css="tve-u-183303b4da1"] {
                background-color: rgb(6, 77, 74) !important;
                --tve-applied-background-color: rgb(6, 77, 74) !important;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
            }
            [data-css="tve-u-183303b4d9f"] {
                max-width: 900px;
            }
            [data-css="tve-u-183303b4d9f"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4d9f"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da3"] {
                margin-bottom: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            [data-css="tve-u-183303b4d9c"] {
                --tcb-local-color-b381d: rgb(51, 51, 51);
                --tcb-local-related-b381d: --tcb-tpl-color-8;
                --tcb-local-default-b381d: rgb(51, 51, 51);
                --tcb-local-color-92b4b: rgb(255, 255, 255);
                --tcb-local-related-92b4b: --tcb-tpl-color-6;
                --tcb-local-default-92b4b: rgb(255, 255, 255);
                --tcb-local-color-2f3a9: rgb(245, 245, 245);
                --tcb-local-related-2f3a9: --tcb-tpl-color-5;
                --tcb-local-default-2f3a9: rgb(245, 245, 245);
                --tcb-local-color-39508: rgb(235, 235, 235);
                --tcb-local-related-39508: --tcb-tpl-color-28;
                --tcb-local-default-39508: rgb(235, 235, 235);
                --tcb-local-color-f3af3: rgb(255, 51, 51);
                --tcb-local-related-f3af3: --tcb-tpl-color-0;
                --tcb-local-default-f3af3: rgb(255, 51, 51);
                padding: 70px 40px 50px !important;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-183303b4da6"] {
                box-shadow: none;
                padding: 0px !important;
                background-color: transparent !important;
                margin-bottom: 20px !important;
            }
            [data-css="tve-u-183303b4da0"] {
                padding-top: 15px !important;
                padding-bottom: 15px !important;
            }
            [data-css="tve-u-183303b4dab"] {
                border-right: none;
                border-bottom: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-b381d, rgb(51, 51, 51));
                border-top: 6px solid var(--tcb-local-color-2f3a9, rgb(245, 245, 245));
                border-left: 6px solid var(--tcb-local-color-2f3a9, rgb(245, 245, 245));
                padding: 0px 8px !important;
                background-color: var(--tcb-local-color-b381d, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
            }
            [data-css="tve-u-183303b4dab"] .tcb-numbered-list-index {
                font-weight: bold !important;
            }
            :not(#tve) [data-css="tve-u-183303b4dab"] .tcb-numbered-list-index {
                color: rgb(255, 255, 255);
                font-size: 18px;
            }
            [data-css="tve-u-183303b4da8"] {
                border: 1px solid var(--tcb-local-color-39508, rgb(235, 235, 235));
                padding: 15px 20px 20px !important;
                background-color: var(--tcb-local-color-92b4b, rgb(255, 255, 255)) !important;
            }
            :not(#tve) [data-css="tve-u-183303b4da8"] {
                line-height: 1.7em !important;
                font-size: 20px !important;
                color: rgb(255, 15, 15) !important;
                --tcb-applied-color: rgb(255, 15, 15) !important;
                --tve-applied-color: rgb(255, 15, 15) !important;
            }
            [data-css="tve-u-183303b4da9"] {
                --tcb-applied-color: rgb(255, 15, 15) !important;
            }
            :not(#tve) [data-css="tve-u-183303b4da4"] {
                --tcb-applied-color: var$(--tcb-local-color-92b4b, rgb(255, 255, 255));
                color: var(--tcb-local-color-92b4b, rgb(255, 255, 255)) !important;
                font-size: 30px !important;
            }
            [data-css="tve-u-183303b4daa"] {
                border-right: none;
                border-bottom: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-b381d, rgb(51, 51, 51));
                border-top: 6px solid var(--tcb-local-color-2f3a9, rgb(245, 245, 245));
                border-left: 6px solid var(--tcb-local-color-2f3a9, rgb(245, 245, 245));
                padding: 0px 8px !important;
                background-color: var(--tcb-local-color-b381d, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
            }
            [data-css="tve-u-183303b4daa"] .tcb-numbered-list-index {
                font-weight: bold !important;
            }
            :not(#tve) [data-css="tve-u-183303b4daa"] .tcb-numbered-list-index {
                color: rgb(255, 255, 255);
                font-size: 18px;
            }
            [data-css="tve-u-183303b4da7"] {
                border-right: none;
                border-bottom: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-b381d, rgb(51, 51, 51));
                border-top: 6px solid var(--tcb-local-color-2f3a9, rgb(245, 245, 245));
                border-left: 6px solid var(--tcb-local-color-2f3a9, rgb(245, 245, 245));
                padding: 0px 8px !important;
                background-color: var(--tcb-local-color-b381d, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
            }
            [data-css="tve-u-183303b4da7"] .tcb-numbered-list-index {
                font-weight: bold !important;
            }
            :not(#tve) [data-css="tve-u-183303b4da7"] .tcb-numbered-list-index {
                color: rgb(255, 255, 255);
                font-size: 18px;
            }
            [data-css="tve-u-183303b4d9f"] h2 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4d9f"] p {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da2"] h2 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da2"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da2"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da2"] p {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303f446c"] {
                --tcb-applied-color: rgb(255, 15, 15) !important;
                color: rgb(6, 5, 5) !important;
            }
            [data-css="tve-u-183303f7332"] {
                --tcb-applied-color: rgb(255, 15, 15) !important;
            }
            :not(#tve) [data-css="tve-u-183304022ef"] {
                color: rgb(245, 42, 42) !important;
                --tcb-applied-color: rgb(245, 42, 42) !important;
                --tve-applied-color: rgb(245, 42, 42) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-18330417921"] {
                --tcb-applied-color: rgb(255, 15, 15) !important;
                color: rgb(3, 3, 3) !important;
            }
            :not(#tve) [data-css="tve-u-18330428498"] {
                color: rgb(254, 36, 36) !important;
                --tcb-applied-color: rgb(254, 36, 36) !important;
                --tve-applied-color: rgb(254, 36, 36) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-1833043320f"] {
                --tcb-applied-color: rgb(255, 15, 15) !important;
                color: rgb(3, 0, 0) !important;
            }
            [data-css="tve-u-1833045e41a"] {
                --tcb-applied-color: rgb(255, 15, 15) !important;
            }
            [data-css="tve-u-1833045e41e"] {
                --tcb-applied-color: rgb(255, 15, 15) !important;
            }
            [data-css="tve-u-1833049821d"] {
                color: rgb(6, 4, 4) !important;
            }
            [data-css="tve-u-183304ab935"] {
                color: rgb(6, 5, 5) !important;
            }
            [data-css="tve-u-183304bc5e8"] {
                color: rgb(6, 5, 5) !important;
            }
            [data-css="tve-u-183304ecfc7"] {
                color: rgb(6, 5, 5) !important;
            }
            [data-css="tve-u-1833050b2a8"] {
                color: rgb(7, 7, 7) !important;
            }
            :not(#tve) [data-css="tve-u-18330519a6e"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833051acdc"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833051c4c5"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833051d95a"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833051e799"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1833051f9d2"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-18330520c74"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-183305232c0"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-18330535c6f"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1833053b042"] {
                --tcb-applied-color: rgb(255, 252, 252) !important;
            }
            [data-css="tve-u-183305454e3"] {
                font-weight: normal !important;
            }
            [data-css="tve-u-18330548630"] {
                --tcb-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1833054865d"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-18335722776"] {
                margin-left: -30px;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722775"] {
                margin: 0px !important;
            }
            [data-css="tve-u-1833572277e"] {
                background-color: rgb(255, 255, 255) !important;
            }
            [data-css="tve-u-1833572277d"] {
                float: none;
                padding: 60px 50px 30px !important;
                margin: -6px auto 0px !important;
            }
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] p,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] li,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] blockquote,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] address,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] .tcb-plain-text,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] label,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] h1,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] h2,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] h3,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] h4,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] h5,
            :not(#tve) .thrv-content-box [data-css="tve-u-1833572277f"] h6 {
                color: var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                --tcb-applied-color: var$(--tcb-local-color-9aa40, rgb(51, 51, 51));
            }
            [data-css="tve-u-18335722776"]>.tcb-flex-col {
                padding-left: 30px;
            }
            [data-css="tve-u-18335722772"] {
                max-width: 1080px;
                float: none;
                padding: 0px !important;
                margin: 0px auto !important;
            }
            [data-css="tve-u-18335722770"] {
                opacity: 1;
                filter: grayscale(0%) brightness(100%) contrast(100%) blur(0px) sepia(0%) invert(0%) saturate(100%) hue-rotate(0deg);
                background-image: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255)) !important;
                background-color: rgb(137, 121, 121) !important;
                --tve-applied-background-color: rgb(137, 121, 121) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(255, 255, 255), rgb(255, 255, 255)) !important;
            }
            [data-css="tve-u-1833572276f"] {
                --tcb-local-color-9aa40: rgb(51, 51, 51);
                --tcb-local-related-9aa40: --tcb-tpl-color-8;
                --tcb-local-default-9aa40: rgb(51, 51, 51);
                --tcb-local-color-6721c: rgb(62, 62, 62);
                --tcb-local-related-6721c: --tcb-tpl-color-7;
                --tcb-local-default-6721c: rgb(62, 62, 62);
                --tcb-local-color-09554: rgb(255, 255, 255);
                --tcb-local-related-09554: --tcb-tpl-color-6;
                --tcb-local-default-09554: rgb(255, 255, 255);
                --tcb-local-color-2d062: rgb(255, 51, 51);
                --tcb-local-related-2d062: --tcb-tpl-color-0;
                --tcb-local-default-2d062: rgb(255, 51, 51);
                padding: 100px 40px 0px !important;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            :not(#tve) [data-css="tve-u-18335722771"] p,
            :not(#tve) [data-css="tve-u-18335722771"] li,
            :not(#tve) [data-css="tve-u-18335722771"] blockquote,
            :not(#tve) [data-css="tve-u-18335722771"] address,
            :not(#tve) [data-css="tve-u-18335722771"] .tcb-plain-text,
            :not(#tve) [data-css="tve-u-18335722771"] label {
                color: var(--tcb-local-color-09554, rgb(255, 255, 255));
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
            }
            :not(#tve) .thrv-content-box [data-css="tve-u-18335722774"] p,
            :not(#tve) .thrv-content-box [data-css="tve-u-18335722774"] li,
            :not(#tve) .thrv-content-box [data-css="tve-u-18335722774"] blockquote,
            :not(#tve) .thrv-content-box [data-css="tve-u-18335722774"] address,
            :not(#tve) .thrv-content-box [data-css="tve-u-18335722774"] .tcb-plain-text,
            :not(#tve) .thrv-content-box [data-css="tve-u-18335722774"] label {
                color: rgb(255, 255, 255);
            }
            [data-css="tve-u-18335722775"] p,
            [data-css="tve-u-18335722775"] li,
            [data-css="tve-u-18335722775"] blockquote,
            [data-css="tve-u-18335722775"] address,
            [data-css="tve-u-18335722775"] .tcb-plain-text,
            [data-css="tve-u-18335722775"] label,
            [data-css="tve-u-18335722775"] h1,
            [data-css="tve-u-18335722775"] h2,
            [data-css="tve-u-18335722775"] h3,
            [data-css="tve-u-18335722775"] h4,
            [data-css="tve-u-18335722775"] h5,
            [data-css="tve-u-18335722775"] h6 {
                font-weight: normal !important;
            }
            :not(#tve) [data-css="tve-u-18335722779"] {
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                font-size: 44px !important;
                color: var(--tcb-local-color-09554, rgb(255, 255, 255)) !important;
                font-weight: var(--g-bold-weight, bold) !important;
            }
            [data-css="tve-u-18335722775"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722775"] h2 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722775"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722774"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572277f"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722774"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572277f"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722771"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            :not(#tve) [data-css="tve-u-1833572278f"] li {
                --tcb-applied-color: var$(--tcb-local-color-9aa40, rgb(51, 51, 51));
                color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
            }
            [data-css="tve-u-18335722785"] {
                border: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                font-size: 12px;
                width: 12px;
                height: 12px;
                --tcb-local-color-icon: rgb(255, 255, 255);
                --tcb-local-color-var: rgb(255, 255, 255);
                --tve-icon-size: 12px;
                border-radius: 0px;
                background-size: auto;
                background-attachment: scroll, scroll, scroll;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                --tve-applied-border: none;
                background-color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
                padding: 0px !important;
                margin-top: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            :not(#tve) [data-css="tve-u-18335722785"]> :first-child {
                color: var(--tcb-local-color-icon);
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                --tve-applied-color: var$(--tcb-local-color-icon);
            }
            [data-css="tve-u-18335722784"] {
                float: none;
                margin-bottom: 40px !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            :not(#tve) [data-css="tve-u-18335722783"] li {
                --tcb-applied-color: var$(--tcb-local-color-9aa40, rgb(51, 51, 51));
                color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
            }
            [data-css="tve-u-18335722783"] {
                padding: 0px !important;
                margin: 0px !important;
            }
            :not(#tve) [data-css="tve-u-1833572278b"] li {
                --tcb-applied-color: var$(--tcb-local-color-9aa40, rgb(51, 51, 51));
                color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
            }
            [data-css="tve-u-1833572278b"] {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572278f"] {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722782"] {
                padding: 0px !important;
            }
            [data-css="tve-u-18335722781"] {
                margin: 0px !important;
                background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)) !important;
            }
            [data-css="tve-u-18335722781"] p {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722781"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722781"] h2 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722781"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572277f"] p {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572277f"] h2 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722774"] p {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722774"] h2 {
                margin: 0px !important;
                padding: 0px !important;
            }
            :not(#tve) [data-css="tve-u-18335722786"] {
                --tcb-applied-color: var$(--tcb-local-color-6721c, rgb(62, 62, 62));
                font-size: 18px !important;
                text-transform: uppercase !important;
                line-height: 1.7em !important;
                color: var(--tcb-local-color-6721c, rgb(62, 62, 62)) !important;
            }
            :not(#tve) [data-css="tve-u-1833572278c"] {
                --tcb-applied-color: var$(--tcb-local-color-6721c, rgb(62, 62, 62));
                font-size: 18px !important;
                text-transform: uppercase !important;
                line-height: 1.7em !important;
                color: var(--tcb-local-color-6721c, rgb(62, 62, 62)) !important;
            }
            :not(#tve) [data-css="tve-u-18335722790"] {
                --tcb-applied-color: var$(--tcb-local-color-6721c, rgb(62, 62, 62));
                font-size: 18px !important;
                text-transform: uppercase !important;
                line-height: 1.7em !important;
                color: var(--tcb-local-color-6721c, rgb(62, 62, 62)) !important;
            }
            [data-css="tve-u-18335722786"] {
                margin-top: -8px !important;
            }
            [data-css="tve-u-1833572278c"] {
                margin-top: -8px !important;
            }
            [data-css="tve-u-18335722790"] {
                margin-top: -8px !important;
            }
            [data-css="tve-u-18335722778"] {
                margin-top: -67px !important;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
            }
            [data-css="tve-u-18335756200"] {
                border: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                font-size: 12px;
                width: 12px;
                height: 12px;
                --tcb-local-color-icon: rgb(255, 255, 255);
                --tcb-local-color-var: rgb(255, 255, 255);
                --tve-icon-size: 12px;
                border-radius: 0px;
                background-size: auto;
                background-attachment: scroll, scroll, scroll;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                --tve-applied-border: none;
                background-color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
                padding: 0px !important;
                margin-top: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            :not(#tve) [data-css="tve-u-18335756200"]> :first-child {
                color: var(--tcb-local-color-icon);
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                --tve-applied-color: var$(--tcb-local-color-icon);
            }
            [data-css="tve-u-1833572277f"] {
                min-height: 0px;
            }
            [data-css="tve-u-1833600bdea"] {
                border: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                font-size: 12px;
                width: 12px;
                height: 12px;
                --tcb-local-color-icon: rgb(255, 255, 255);
                --tcb-local-color-var: rgb(255, 255, 255);
                --tve-icon-size: 12px;
                border-radius: 0px;
                background-size: auto;
                background-attachment: scroll, scroll, scroll;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                --tve-applied-border: none;
                background-color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
                padding: 0px !important;
                margin-top: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            :not(#tve) [data-css="tve-u-1833600bdea"]> :first-child {
                color: var(--tcb-local-color-icon);
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                --tve-applied-color: var$(--tcb-local-color-icon);
            }
            [data-css="tve-u-1833604ee5e"] {
                border: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                font-size: 12px;
                width: 12px;
                height: 12px;
                --tcb-local-color-icon: rgb(255, 255, 255);
                --tcb-local-color-var: rgb(255, 255, 255);
                --tve-icon-size: 12px;
                border-radius: 0px;
                background-size: auto;
                background-attachment: scroll, scroll, scroll;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                --tve-applied-border: none;
                background-color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
                padding: 0px !important;
                margin-top: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            :not(#tve) [data-css="tve-u-1833604ee5e"]> :first-child {
                color: var(--tcb-local-color-icon);
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                --tve-applied-color: var$(--tcb-local-color-icon);
            }
            [data-css="tve-u-1833605fff1"] {
                border: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                font-size: 12px;
                width: 12px;
                height: 12px;
                --tcb-local-color-icon: rgb(255, 255, 255);
                --tcb-local-color-var: rgb(255, 255, 255);
                --tve-icon-size: 12px;
                border-radius: 0px;
                background-size: auto;
                background-attachment: scroll, scroll, scroll;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                --tve-applied-border: none;
                background-color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
                padding: 0px !important;
                margin-top: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            :not(#tve) [data-css="tve-u-1833605fff1"]> :first-child {
                color: var(--tcb-local-color-icon);
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                --tve-applied-color: var$(--tcb-local-color-icon);
            }
            [data-css="tve-u-18336066cc2"] {
                border: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                font-size: 12px;
                width: 12px;
                height: 12px;
                --tcb-local-color-icon: rgb(255, 255, 255);
                --tcb-local-color-var: rgb(255, 255, 255);
                --tve-icon-size: 12px;
                border-radius: 0px;
                background-size: auto;
                background-attachment: scroll, scroll, scroll;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                --tve-applied-border: none;
                background-color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
                padding: 0px !important;
                margin-top: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            :not(#tve) [data-css="tve-u-18336066cc2"]> :first-child {
                color: var(--tcb-local-color-icon);
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                --tve-applied-color: var$(--tcb-local-color-icon);
            }
            [data-css="tve-u-1833608aab1"] {
                border: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                font-size: 12px;
                width: 12px;
                height: 12px;
                --tcb-local-color-icon: rgb(255, 255, 255);
                --tcb-local-color-var: rgb(255, 255, 255);
                --tve-icon-size: 12px;
                border-radius: 0px;
                background-size: auto;
                background-attachment: scroll, scroll, scroll;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                --tve-applied-border: none;
                background-color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
                padding: 0px !important;
                margin-top: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            :not(#tve) [data-css="tve-u-1833608aab1"]> :first-child {
                color: var(--tcb-local-color-icon);
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                --tve-applied-color: var$(--tcb-local-color-icon);
            }
            [data-css="tve-u-183360b4ceb"] {
                border: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                font-size: 12px;
                width: 12px;
                height: 12px;
                --tcb-local-color-icon: rgb(255, 255, 255);
                --tcb-local-color-var: rgb(255, 255, 255);
                --tve-icon-size: 12px;
                border-radius: 0px;
                background-size: auto;
                background-attachment: scroll, scroll, scroll;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                --tve-applied-border: none;
                background-color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
                padding: 0px !important;
                margin-top: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            :not(#tve) [data-css="tve-u-183360b4ceb"]> :first-child {
                color: var(--tcb-local-color-icon);
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                --tve-applied-color: var$(--tcb-local-color-icon);
            }
            [data-css="tve-u-183360bd407"] {
                border: none;
                box-shadow: 0px 0px 0px 1px var(--tcb-local-color-9aa40, rgb(51, 51, 51));
                font-size: 12px;
                width: 12px;
                height: 12px;
                --tcb-local-color-icon: rgb(255, 255, 255);
                --tcb-local-color-var: rgb(255, 255, 255);
                --tve-icon-size: 12px;
                border-radius: 0px;
                background-size: auto;
                background-attachment: scroll, scroll, scroll;
                background-position: 50% 50%;
                background-repeat: no-repeat;
                --tve-applied-border: none;
                background-color: var(--tcb-local-color-9aa40, rgb(51, 51, 51)) !important;
                margin-right: 20px !important;
                padding: 0px !important;
                margin-top: 0px !important;
                background-image: none !important;
                --tve-applied-background-image: none !important;
            }
            :not(#tve) [data-css="tve-u-183360bd407"]> :first-child {
                color: var(--tcb-local-color-icon);
                --tcb-applied-color: var$(--tcb-local-color-09554, rgb(255, 255, 255));
                --tve-applied-color: var$(--tcb-local-color-icon);
            }
            :not(#tve) [data-css="tve-u-183360cc09d"] {
                font-size: 18px !important;
                color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-family: Poppins !important;
            }
            :not(#tve) [data-css="tve-u-183360cfa1e"] {
                font-size: 18px !important;
                color: rgb(6, 5, 5) !important;
                --tve-applied-color: rgb(6, 5, 5) !important;
            }
            :not(#tve) [data-css="tve-u-183360de5e4"] {
                font-size: 18px !important;
                color: rgb(3, 2, 2) !important;
                --tve-applied-color: rgb(3, 2, 2) !important;
            }
            :not(#tve) [data-css="tve-u-183360e1756"] {
                font-size: 18px !important;
                color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-183360e41e3"] {
                font-size: 18px !important;
                color: rgb(4, 4, 4) !important;
                --tve-applied-color: rgb(4, 4, 4) !important;
            }
            :not(#tve) [data-css="tve-u-183360e6bfb"] {
                font-size: 18px !important;
                color: rgb(4, 4, 4) !important;
                --tve-applied-color: rgb(4, 4, 4) !important;
            }
            :not(#tve) [data-css="tve-u-183360fed1a"] {
                color: rgb(6, 5, 5) !important;
                --tve-applied-color: rgb(6, 5, 5) !important;
            }
            :not(#tve) [data-css="tve-u-18336111679"] {
                color: rgb(6, 5, 5) !important;
                --tve-applied-color: rgb(6, 5, 5) !important;
            }
            :not(#tve) [data-css="tve-u-18336158eaf"] {
                color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-17df6ce4bc2"] .tve_image_frame {
                height: 95.1946px;
            }
            [data-css="tve-u-184373cf221"] {
                margin-top: -1px;
            }
            [data-css="tve-u-1843745f0a9"] {
                width: 540px;
            }
            [data-css="tve-u-1843745ff29"] {
                width: 540px;
            }
            [data-css="tve-u-18437460b07"] {
                width: 540px;
            }
            [data-css="tve-u-18437464c97"] {
                width: 540px;
            }
            [data-css="tve-u-184374a79c8"] {
                width: 250px;
                float: none;
                z-index: 3;
                position: relative;
                --tve-alignment: center;
                margin-left: auto !important;
                margin-right: auto !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-18437980ab2"] {
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
            }
            [data-css="tve-u-1843798e619"] {
                --tve-border-radius: 0px;
                --tve-border-top-left-radius: 12px;
                overflow: hidden;
                --tve-border-top-right-radius: 12px;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                border-radius: 12px 12px 0px 0px !important;
            }
            [data-css="tve-u-1843798effa"] {
                --tve-border-radius: 0px;
                --tve-border-top-left-radius: 12px;
                overflow: hidden;
                --tve-border-top-right-radius: 12px;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                border-radius: 12px 12px 0px 0px !important;
            }
            [data-css="tve-u-18437991539"] {
                --tve-border-radius: 0px;
                --tve-border-top-left-radius: 12px;
                overflow: hidden;
                --tve-border-top-right-radius: 12px;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                border-radius: 12px 12px 0px 0px !important;
            }
            [data-css="tve-u-18437993dd6"] {
                --tve-border-radius: 0px;
                --tve-border-top-left-radius: 12px;
                overflow: hidden;
                --tve-border-top-right-radius: 12px;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                border-radius: 12px 12px 0px 0px !important;
            }
            [data-css="tve-u-18437994734"] {
                --tve-border-radius: 0px;
                --tve-border-top-left-radius: 12px;
                overflow: hidden;
                --tve-border-top-right-radius: 12px;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --background-image: linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104)) !important;
                --background-size: auto auto !important;
                --background-position: 50% 50% !important;
                --background-attachment: scroll !important;
                --background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                border-radius: 12px 12px 0px 0px !important;
            }
            :not(#tve) [data-css="tve-u-184428ee2dc"] {
                --eff-color: rgb(255, 255, 255) !important;
                --eff-faded: rgba(255, 255, 255, 0.6) !important;
                --eff-ensure-contrast: rgba(255, 255, 255, 0.6) !important;
                --eff-ensure-contrast-complement: rgba(255, 255, 255, 0.6) !important;
                font-family: Poppins !important;
            }
            [data-css="tve-u-184428f99d1"] {
                color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-18442aa8192"] {
                font-size: 22px !important;
                color: rgb(8, 8, 8) !important;
                --tcb-applied-color: rgb(8, 8, 8) !important;
                --tve-applied-color: rgb(8, 8, 8) !important;
            }
            :not(#tve) [data-css="tve-u-18442aa81a0"] {
                font-size: 22px !important;
                color: rgb(8, 8, 8) !important;
                --tcb-applied-color: rgb(8, 8, 8) !important;
                --tve-applied-color: rgb(8, 8, 8) !important;
            }
            :not(#tve) [data-css="tve-u-18442ad087c"] {
                color: rgb(255, 51, 51) !important;
                --tcb-applied-color: rgb(255, 51, 51) !important;
                --tve-applied-color: rgb(255, 51, 51) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-18442ad4524"] {
                color: rgb(255, 51, 51) !important;
                --tcb-applied-color: rgb(255, 51, 51) !important;
                --tve-applied-color: rgb(255, 51, 51) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-18442b6469f"] {
                letter-spacing: 4px;
                padding-top: 0px !important;
                margin-top: 0px !important;
                padding-bottom: 0px !important;
                margin-bottom: 0px !important;
                font-size: 20px !important;
                line-height: 1.1em !important;
                font-weight: var(--g-bold-weight, bold) !important;
                text-transform: uppercase !important;
                color: rgb(17, 17, 17) !important;
                --tcb-applied-color: rgb(17, 17, 17) !important;
            }
            [data-css="tve-u-18442b6468f"] {
                border-left: 3px solid rgb(10, 176, 89) !important;
            }
            [data-css="tve-u-18442b64698"] {
                margin-top: 0px !important;
                padding-top: 0px !important;
                padding-bottom: 0px !important;
                padding-right: 0px !important;
            }
            [data-css="tve-u-18442b6468c"] {
                padding: 0px !important;
                margin-bottom: 40px !important;
                background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
                background-size: auto !important;
                background-position: 50% 50% !important;
                background-attachment: scroll !important;
                background-repeat: no-repeat !important;
                --tve-applied-background-image: linear-gradient(rgb(104, 205, 208), rgb(104, 205, 208)) !important;
            }
            :not(#tve) [data-css="tve-u-18442b6468d"] {
                padding-top: 0px !important;
                margin-top: 0px !important;
                padding-bottom: 0px !important;
                margin-bottom: 0px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            [data-css="tve-u-18442b64695"] {
                font-size: 12px;
                width: 12px;
                height: 12px;
                padding-left: 0px !important;
                padding-top: 4px !important;
                padding-bottom: 4px !important;
            }
            [data-css="tve-u-18442b64694"] {
                padding-bottom: 0px !important;
                margin-bottom: 10px !important;
            }
            [data-css="tve-u-18442b64693"] {
                --tve-font-size: 14px;
                padding: 1px !important;
                margin: 0px !important;
            }
            [data-css="tve-u-18442b64691"] {
                float: left;
                z-index: 3;
                position: relative;
                padding: 8px !important;
                margin-bottom: 20px !important;
                background-color: rgb(244, 255, 249) !important;
                --tve-applied-background-color: rgb(244, 255, 249) !important;
            }
            :not(#tve) [data-css="tve-u-18442b64693"] li {
                font-size: var(--tve-font-size, 14px) !important;
            }
            :not(#tve) [data-css="tve-u-18442b64696"] {
                line-height: 1.65em !important;
                font-size: 20px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-18442b64690"]::after {
                clear: both;
            }
            [data-css="tve-u-18442b6469a"] {
                float: left;
                z-index: 3;
                position: relative;
                padding: 8px !important;
                margin-bottom: 20px !important;
                background-color: rgb(255, 246, 244) !important;
                --tve-applied-background-color: rgb(255, 246, 244) !important;
            }
            [data-css="tve-u-18442b64699"] {
                border-left: 3px solid rgb(251, 102, 75) !important;
            }
            [data-css="tve-u-18442b6468e"] {
                margin-top: 0px !important;
                padding-top: 0px !important;
                padding-bottom: 0px !important;
                margin-bottom: 30px !important;
                padding-right: 0px !important;
            }
            :not(#tve) [data-css="tve-u-18442b64695"]> :first-child {
                color: rgb(68, 68, 68);
            }
            [data-css="tve-u-18442b6469e"] {
                float: left;
                z-index: 3;
                position: relative;
                padding: 8px !important;
                margin-bottom: 20px !important;
                background-color: hsla(calc(var(--tcb-main-master-h, 210) + 2), 100%, 97%, 1) !important;
                --tve-applied-background-color: hsla(calc(var(--tcb-main-master-h, 210) + 2), 100%, 97%, 1) !important;
            }
            [data-css="tve-u-18442b6469c"] {
                margin-top: 30px !important;
                padding: 0px !important;
                margin-left: 2px !important;
                margin-right: 6px !important;
            }
            [data-css="tve-u-18442b6469d"] {
                border-left: none !important;
            }
            :not(#tve) [data-css="tve-u-18442b64692"] {
                letter-spacing: 4px;
                padding-top: 0px !important;
                margin-top: 0px !important;
                padding-bottom: 0px !important;
                margin-bottom: 0px !important;
                font-size: 20px !important;
                line-height: 1.1em !important;
                font-weight: var(--g-bold-weight, bold) !important;
                text-transform: uppercase !important;
                color: rgb(17, 17, 17) !important;
                --tcb-applied-color: rgb(17, 17, 17) !important;
            }
            :not(#tve) [data-css="tve-u-18442b6469b"] {
                letter-spacing: 4px;
                padding-top: 0px !important;
                margin-top: 0px !important;
                padding-bottom: 0px !important;
                margin-bottom: 0px !important;
                font-size: 20px !important;
                line-height: 1.1em !important;
                font-weight: var(--g-bold-weight, bold) !important;
                text-transform: uppercase !important;
                color: rgb(17, 17, 17) !important;
                --tcb-applied-color: rgb(17, 17, 17) !important;
            }
            [data-css="tve-u-18442b6468b"] {
                padding-top: 20px !important;
                padding-bottom: 20px !important;
                margin-top: 0px !important;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-18442b8f1fd"] {
                font-size: 12px;
                width: 12px;
                height: 12px;
                padding-left: 0px !important;
                padding-top: 4px !important;
                padding-bottom: 4px !important;
            }
            :not(#tve) [data-css="tve-u-18442b8f1fd"]> :first-child {
                color: rgb(68, 68, 68);
            }
            [data-css="tve-u-18442b9c3a5"] {
                font-size: 12px;
                width: 12px;
                height: 12px;
                padding-left: 0px !important;
                padding-top: 4px !important;
                padding-bottom: 4px !important;
            }
            :not(#tve) [data-css="tve-u-18442b9c3a5"]> :first-child {
                color: rgb(68, 68, 68);
            }
            :not(#tve) [data-css="tve-u-18442be6242"] {
                font-size: 25px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-18442c2204b"] {
                font-size: 20px !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-184667d53e5"] {
                color: rgb(69, 66, 66) !important;
                --tve-applied-color: rgb(69, 66, 66) !important;
            }
            :not(#tve) [data-css="tve-u-184667e1a52"] {
                color: rgb(72, 67, 67) !important;
                --tve-applied-color: rgb(72, 67, 67) !important;
            }
            :not(#tve) [data-css="tve-u-1847a44b7cd"] {
                color: rgb(255, 255, 255) !important;
                --tve-applied-color: rgb(255, 255, 255) !important;
            }
            :not(#tve) [data-css="tve-u-1879ed0d95e"] {
                --g-regular-weight: 300;
                --g-bold-weight: 500;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed0d95e"] strong {
                font-weight: 500 !important;
            }
            :not(#tve) [data-css="tve-u-1879ed0f170"] {
                --g-regular-weight: 300;
                --g-bold-weight: 500;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed0f170"] strong {
                font-weight: 500 !important;
            }
            :not(#tve) [data-css="tve-u-1879ed105f7"] {
                --g-regular-weight: 300;
                --g-bold-weight: 500;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed105f7"] strong {
                font-weight: 500 !important;
            }
            [data-css="tve-u-1879ed1883b"] {
                margin-bottom: 10px !important;
            }
            [data-css="tve-u-1879ed1ade7"] {
                margin-bottom: 10px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed268cd"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed2be23"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed2ff3a"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 35px !important;
                color: rgb(255, 216, 0) !important;
                --tcb-applied-color: var$(--tcb-color-2) !important;
                --tve-applied-color: var$(--tcb-color-2) !important;
            }
            :not(#tve) [data-css="tve-u-1879ed3101a"] {
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 50px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            :not(#tve) [data-css="tve-u-1879ed5a395"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed5ce7e"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed6496d"] {
                font-size: 24px !important;
                font-weight: var(--g-bold-weight, bold) !important;
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
            :not(#tve) [data-css="tve-u-1879ed670a2"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed69d79"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed6bf97"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-weight: var(--g-bold-weight, bold) !important;
                font-size: 24px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed86f5d"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed86f61"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed8d031"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed8d036"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed8ea19"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed8ea1e"] {
                color: rgb(0, 0, 0) !important;
                --tcb-applied-color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
                font-size: 20px !important;
            }
            [data-css="tve-u-1879ed9be6e"] {
                --tve-border-width: 1px;
                border: 1px solid rgb(0, 0, 0);
                --tve-applied-border: 1px solid rgb(0, 0, 0);
                --tve-border-radius: 12px;
                border-radius: 12px;
                overflow: hidden;
            }
            [data-css="tve-u-1879edb4327"] {
                --tcb-applied-color: var$(--tcb-color-0);
                color: rgb(210, 15, 38) !important;
            }
            :not(#tve) [data-css="tve-u-1879edb5eef"] {
                --g-regular-weight: 300;
                --g-bold-weight: 600;
                font-weight: var(--g-bold-weight, bold) !important;
                font-family: Poppins !important;
                font-size: 29px !important;
                color: rgb(255, 255, 255) !important;
                --tcb-applied-color: var$(--tcb-color-3) !important;
                --tve-applied-color: var$(--tcb-color-3) !important;
            }
            :not(#tve) [data-css="tve-u-1879edb5eef"] strong {
                font-weight: 600 !important;
            }
            :not(#tve) [data-css="tve-u-182d8f44347"] strong {
                font-weight: 900 !important;
            }
            :not(#tve) [data-css="tve-u-1879edda8c5"] {
                color: rgb(0, 0, 0) !important;
                --tve-applied-color: rgb(0, 0, 0) !important;
            }
        }

        @media (max-width: 1023px) {
            [data-css="tve-u-16c239f72b3"] {
                padding-top: 0px !important;
                padding-bottom: 0px !important;
            }
            #tcb_landing_page h1 {
                font-size: 44px;
            }
            #tcb_landing_page h2 {
                font-size: 38px;
            }
            [data-css="tve-u-17df7983fe2"] {
                max-width: 14.6%;
            }
            [data-css="tve-u-17df7983fe5"] {
                max-width: 85.4%;
            }
            [data-css="tve-u-17df7983fe4"] {
                font-size: 26px;
                width: 26px;
                height: 26px;
            }
            [data-css="tve-u-17df7b687bb"] {
                max-width: 14.6%;
            }
            [data-css="tve-u-17df7b687be"] {
                font-size: 26px;
                width: 26px;
                height: 26px;
            }
            [data-css="tve-u-17df7b687c0"] {
                max-width: 85.4%;
            }
            [data-css="tve-u-183303b4d9d"] {
                background-image: none !important;
            }
            [data-css="tve-u-183303b4da3"] {
                float: left;
                z-index: 3;
                position: relative;
                max-width: 491px;
                margin-bottom: 0px !important;
            }
            [data-css="tve-u-183303b4da6"] {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
            [data-css="tve-u-183303b4dab"] {
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4daa"] {
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da7"] {
                padding: 0px !important;
            }
            :not(#tve) [data-css="tve-u-183303b4dab"] .tcb-numbered-list-index {
                font-size: 18px;
            }
            [data-css="tve-u-183303b4dab"] .tcb-numbered-list-index {
                font-weight: bold !important;
            }
            :not(#tve) [data-css="tve-u-183303b4da7"] .tcb-numbered-list-index {
                font-size: 18px;
            }
            :not(#tve) [data-css="tve-u-183303b4daa"] .tcb-numbered-list-index {
                font-size: 18px;
            }
            [data-css="tve-u-183303b4d9c"] {
                padding: 30px 30px 20px !important;
            }
            [data-css="tve-u-1833572277d"] {
                float: none;
                margin-top: 30px !important;
                padding: 40px 20px 0px !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-1833572277f"] {
                text-align: center;
            }
            [data-css="tve-u-18335722776"] {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
            [data-css="tve-u-1833572276f"] {
                padding: 70px 30px 0px !important;
            }
            :not(#tve) [data-css="tve-u-18335722779"] {
                font-size: 32px !important;
            }
            [data-css="tve-u-18335722775"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722775"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722774"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572277f"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722774"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572277f"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722771"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722771"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722782"] {
                flex-wrap: nowrap !important;
            }
            [data-css="tve-u-18335722785"] {
                font-size: 25px;
                width: 25px;
                height: 25px;
                margin-right: 15px !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-18335722786"] {
                margin-top: 0px !important;
            }
            [data-css="tve-u-1833572278c"] {
                margin-top: 0px !important;
            }
            [data-css="tve-u-18335722790"] {
                margin-top: 0px !important;
            }
            [data-css="tve-u-18335756200"] {
                font-size: 25px;
                width: 25px;
                height: 25px;
                margin-right: 15px !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1833600bdea"] {
                font-size: 25px;
                width: 25px;
                height: 25px;
                margin-right: 15px !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1833604ee5e"] {
                font-size: 25px;
                width: 25px;
                height: 25px;
                margin-right: 15px !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1833605fff1"] {
                font-size: 25px;
                width: 25px;
                height: 25px;
                margin-right: 15px !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-18336066cc2"] {
                font-size: 25px;
                width: 25px;
                height: 25px;
                margin-right: 15px !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1833608aab1"] {
                font-size: 25px;
                width: 25px;
                height: 25px;
                margin-right: 15px !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-183360b4ceb"] {
                font-size: 25px;
                width: 25px;
                height: 25px;
                margin-right: 15px !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-183360bd407"] {
                font-size: 25px;
                width: 25px;
                height: 25px;
                margin-right: 15px !important;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1843745f0a9"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-1843745ff29"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-18437460b07"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df7adf57e"] {
                margin-top: 92px !important;
            }
            [data-css="tve-u-182e9de2362"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-18437464c97"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            [data-css="tve-u-17df7870511"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
            }
        }

        @media (max-width: 767px) {
            [data-css="tve-u-16c239da3ea"] {
                padding: 0px !important;
                margin-bottom: 10px !important;
            }
            [data-css="tve-u-16c239dc0ca"] {
                padding: 0px !important;
            }
            [data-css="tve-u-16c239f72b3"] {
                padding-top: 0px !important;
                padding-bottom: 0px !important;
            }
            [data-css="tve-u-16c239fcb85"] {
                float: none;
                max-width: 312px;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            #tcb_landing_page h1 {
                font-size: 32px;
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page h2 {
                font-size: 28px;
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page h3 {
                font-size: 22px;
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page h4 {
                font-size: 21px;
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            [data-css="tve-u-17df7983fdd"] {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
            [data-css="tve-u-17df7983fdf"] {
                min-height: 1px !important;
            }
            [data-css="tve-u-17df7983fe4"] {
                font-size: 16px;
                width: 16px;
                height: 16px;
                padding: 6px !important;
            }
            [data-css="tve-u-17df7983fe1"] {
                flex-wrap: nowrap !important;
            }
            [data-css="tve-u-17df7b687b5"] {
                min-height: 1px !important;
            }
            [data-css="tve-u-17df7b687b9"] {
                flex-wrap: nowrap !important;
            }
            [data-css="tve-u-17df7b687be"] {
                font-size: 16px;
                width: 16px;
                height: 16px;
                padding: 6px !important;
            }
            [data-css="tve-u-17df7b687ca"] {
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
            [data-css="tve-u-17df7d10838"] {
                margin-top: 5px !important;
            }
            [data-css="tve-u-17df7d10832"] {
                --tve-countdown-size: 35px !important;
                --tve-countdown-label-size: 0.29 !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] .t-digit-part>span {
                padding: 17px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10834"] {
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            [data-css="tve-u-17df7d10835"] {
                margin-top: 5px !important;
            }
            [data-css="tve-u-17df7d10837"] {
                --tve-font-size: 22px;
            }
            :not(#tve) [data-css="tve-u-17df7d10837"] .tcb-plain-text {
                font-size: var(--tve-font-size, 22px);
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] .t-digit-part>span {
                padding: 17px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083a"] {
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            [data-css="tve-u-17df7d1083b"] {
                margin-top: 5px !important;
            }
            [data-css="tve-u-17df7d1083d"] {
                --tve-font-size: 22px;
            }
            :not(#tve) [data-css="tve-u-17df7d1083d"] .tcb-plain-text {
                font-size: var(--tve-font-size, 22px);
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] .t-digit-part>span {
                padding: 17px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d1083f"] {
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            [data-css="tve-u-17df7d10840"] {
                margin-top: 5px !important;
            }
            [data-css="tve-u-17df7d10842"] {
                --tve-font-size: 22px;
            }
            :not(#tve) [data-css="tve-u-17df7d10842"] .tcb-plain-text {
                font-size: var(--tve-font-size, 22px);
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] .t-digit-part>span {
                padding: 17px !important;
            }
            :not(#tve) [data-css="tve-u-17df7d10844"] {
                margin-right: 0px !important;
                margin-left: 0px !important;
            }
            [data-css="tve-u-17df7d10845"] {
                margin-top: 5px !important;
            }
            [data-css="tve-u-183303b4da5"] {
                margin-bottom: 0px !important;
                margin-top: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da3"] {
                margin-bottom: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4dab"] {
                border-right: 1px solid rgba(0, 0, 0, 0);
                margin: 0px 10px 0px 0px !important;
                padding: 5px 0px !important;
            }
            [data-css="tve-u-183303b4daa"] {
                border-right: 1px solid rgba(0, 0, 0, 0);
                margin: 0px 10px 0px 0px !important;
                padding: 5px 0px !important;
            }
            [data-css="tve-u-183303b4da7"] {
                border-right: 1px solid rgba(0, 0, 0, 0);
                margin: 0px 10px 0px 0px !important;
                padding: 5px 0px !important;
            }
            [data-css="tve-u-183303b4d9c"] {
                padding: 20px 20px 10px !important;
            }
            [data-css="tve-u-183303b4da2"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da2"] h2 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da2"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da2"] p {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-183303b4da8"] {
                margin-left: 0px !important;
            }
            :not(#tve) [data-css="tve-u-183303b4da7"] .tcb-numbered-list-index {
                font-size: 14px;
            }
            :not(#tve) [data-css="tve-u-183303b4daa"] .tcb-numbered-list-index {
                font-size: 14px;
            }
            :not(#tve) [data-css="tve-u-183303b4dab"] .tcb-numbered-list-index {
                font-size: 14px;
            }
            [data-css="tve-u-183303b4da6"] {
                margin-bottom: 10px !important;
            }
            [data-css="tve-u-183303b4da0"] {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }
            [data-css="tve-u-1833572277d"] {
                margin-top: 0px !important;
                padding: 25px 20px 0px !important;
            }
            [data-css="tve-u-1833572276f"] {
                padding-top: 30px !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
            [data-css="tve-u-1833572277f"] p {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572277f"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572277f"] h2 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-1833572277f"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722774"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722774"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722778"] {
                margin-bottom: 20px !important;
            }
            :not(#tve) [data-css="tve-u-18335722779"] {
                font-size: 28px !important;
            }
            [data-css="tve-u-18335722776"] {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }
            [data-css="tve-u-18335722775"] h1 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722775"] h3 {
                margin: 0px !important;
                padding: 0px !important;
            }
            [data-css="tve-u-18335722772"] {
                max-width: 100%;
            }
            [data-css="tve-u-18335722782"] {
                flex-wrap: wrap !important;
            }
            [data-css="tve-u-18335722782"] .tcb-flex-col {
                flex-basis: 390px !important;
            }
            [data-css="tve-u-18335722785"] {
                font-size: 20px;
                width: 20px;
                height: 20px;
                margin-top: 0px !important;
            }
            [data-css="tve-u-18335722784"] {
                margin-bottom: 30px !important;
                margin-top: 0px !important;
            }
            :not(#tve) [data-css="tve-u-18335722786"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1833572278c"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-18335722790"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-18335722786"] {
                margin-top: 8px !important;
            }
            [data-css="tve-u-1833572278c"] {
                margin-top: 8px !important;
            }
            [data-css="tve-u-18335722790"] {
                margin-top: 8px !important;
            }
            [data-css="tve-u-18335756200"] {
                font-size: 20px;
                width: 20px;
                height: 20px;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1833600bdea"] {
                font-size: 20px;
                width: 20px;
                height: 20px;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1833604ee5e"] {
                font-size: 20px;
                width: 20px;
                height: 20px;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1833605fff1"] {
                font-size: 20px;
                width: 20px;
                height: 20px;
                margin-top: 0px !important;
            }
            [data-css="tve-u-18336066cc2"] {
                font-size: 20px;
                width: 20px;
                height: 20px;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1833608aab1"] {
                font-size: 20px;
                width: 20px;
                height: 20px;
                margin-top: 0px !important;
            }
            [data-css="tve-u-183360b4ceb"] {
                font-size: 20px;
                width: 20px;
                height: 20px;
                margin-top: 0px !important;
            }
            [data-css="tve-u-183360bd407"] {
                font-size: 20px;
                width: 20px;
                height: 20px;
                margin-top: 0px !important;
            }
            [data-css="tve-u-1843747b2ba"] {
                --tve-alignment: center;
                float: none;
                margin-left: auto !important;
                margin-right: auto !important;
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
            [data-css="tve-u-184374a79c8"] {
                width: 100%;
            }
            [data-css="tve-u-17df77233b2"] {
                width: 100%;
            }
            :not(#tve) [data-css="tve-u-17df7c16d75"] {
                font-size: 35px !important;
            }
            [data-css="tve-u-18442b6468e"] {
                padding-left: 14px !important;
                padding-right: 0px !important;
                margin-top: 17px !important;
            }
            [data-css="tve-u-18442b64698"] {
                padding-left: 14px !important;
                padding-right: 0px !important;
            }
            #tcb_landing_page li:not([class*="menu"]) {
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page .thrv_text_element a:not(.tcb-button-link),
            #tcb_landing_page .tcb-styled-list a,
            #tcb_landing_page .tcb-numbered-list a,
            #tcb_landing_page .tve-input-option-text a {
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page p {
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page ul:not([class*="menu"]),
            #tcb_landing_page ol {
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page pre {
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page blockquote {
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            .tve_lp .tcb-plain-text {
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page h5 {
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            #tcb_landing_page h6 {
                color: rgb(0, 0, 0);
                --tcb-typography-color: rgb(0, 0, 0);
                --tve-applied-color: rgb(0, 0, 0);
                --tcb-applied-color: rgb(0, 0, 0);
            }
            :not(#tve) [data-css="tve-u-182d8f44347"] {
                font-size: 19px !important;
            }
            :not(#tve) [data-css="tve-u-17df6a98d95"] {
                font-size: 15px !important;
            }
            :not(#tve) [data-css="tve-u-17df6d03296"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed0d95e"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed0f170"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed105f7"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df6cdc103"] {
                font-size: 26px !important;
            }
            [data-css="tve-u-1879ed1883b"] {
                padding-right: 26px !important;
                margin-left: 23px !important;
            }
            [data-css="tve-u-1879ed1ade7"] {
                padding-right: 16px !important;
                margin-left: 1px !important;
                padding-left: 15px !important;
            }
            [data-css="tve-u-17df75bfb28"] {
                padding-left: 16px !important;
                padding-right: 16px !important;
            }
            [data-css="tve-u-1879ed23bb9"] {
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed268cd"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-17df76b597d"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed2be23"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-17df7753ec4"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed2ff3a"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed3101a"] {
                font-size: 30px !important;
            }
            [data-css="tve-u-1879ed32bc1"] {
                padding-top: 17px !important;
                margin-top: 0px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed38565"] {
                font-size: 8px !important;
            }
            :not(#tve) [data-css="tve-u-18330221a89"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-1879ed47b0b"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-1879ed47b0d"] {
                font-size: 16px !important;
            }
            [data-css="tve-u-182a22a7daa"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1879ed47b11"] {
                font-size: 16px !important;
            }
            [data-css="tve-u-182a2280218"] {
                color: rgb(0, 0, 0) !important;
                font-size: 18px !important;
            }
            [data-css="tve-u-1879ed48b31"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-1879ed48b34"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-18330222dad"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-18330222daf"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-18330222db1"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a21cfe9b"] {
                color: rgb(0, 0, 0) !important;
                font-size: 18px !important;
            }
            [data-css="tve-u-1879ed4d04a"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a22e1160"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1879ed4d04f"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a22e1164"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1879ed4d055"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a22e1166"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a21cfea9"] {
                color: rgb(0, 0, 0) !important;
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b8989b"] {
                font-size: 21px !important;
            }
            [data-css="tve-u-182a58342f8"] {
                color: rgb(0, 0, 0) !important;
                font-size: 18px !important;
            }
            [data-css="tve-u-1879ed51d1b"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a58342fb"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1879ed51d20"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a58342fd"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1879ed51d25"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a58342fe"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1879ed51d2a"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a5834300"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1879ed51d2f"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a5834301"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-1879ed51d36"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a5834303"] {
                color: rgb(0, 0, 0) !important;
            }
            [data-css="tve-u-182a5834305"] {
                color: rgb(0, 0, 0) !important;
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1833021bef7"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1833021b306"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1833021a599"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-183302191c4"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed5a395"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-18330216701"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed5ce7e"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-1833054865d"] {
                color: rgb(0, 0, 0) !important;
                font-size: 18px !important;
            }
            [data-css="tve-u-18330548630"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a5ca44fe"] {
                color: rgb(0, 0, 0) !important;
                font-size: 18px !important;
            }
            [data-css="tve-u-182a5ca4500"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-182a5c8fdf9"] {
                color: rgb(0, 0, 0) !important;
                font-size: 18px !important;
            }
            [data-css="tve-u-182a5c8fdfb"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed6496d"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-182a587f92b"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-183305454e3"] {
                font-weight: normal !important;
            }
            [data-css="tve-u-182a587f960"] {
                font-weight: normal !important;
            }
            :not(#tve) [data-css="tve-u-183302181ff"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed670a2"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed69d79"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed6bf97"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-18442be6242"] {
                font-size: 12px !important;
            }
            [data-css="tve-u-1879ed75e9e"] {
                padding-top: 0px !important;
                padding-bottom: 11px !important;
                margin-top: -32px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed79579"] {
                font-size: 8px !important;
            }
            :not(#tve) [data-css="tve-u-17df77ce45a"] {
                font-size: 20px !important;
            }
            :not(#tve) [data-css="tve-u-17df77daf92"] {
                font-size: 23px !important;
            }
            :not(#tve) [data-css="tve-u-18442aa8192"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-18442aa81a0"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-17df7b35fe8"] {
                font-size: 18px !important;
            }
            [data-css="tve-u-17df7b39655"] {
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
            :not(#tve) [data-css="tve-u-183305232c0"] {
                font-size: 18px !important;
            }
            :not(#tve) [data-css="tve-u-18330520c74"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed86f5d"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed86f61"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1833051f9d2"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1833051e799"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed8d031"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed8d036"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1833051d95a"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed8ea19"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1879ed8ea1e"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1833051c4c5"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-1833051acdc"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-18330519a6e"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-17df79bf25a"] {
                font-size: 16px !important;
            }
            :not(#tve) [data-css="tve-u-183303b4da8"] {
                font-size: 16px !important;
            }
            [data-css="tve-u-183304ecfc7"] {
                color: rgb(6, 5, 5) !important;
            }
            [data-css="tve-u-1879ed9b697"] {
                padding-left: 22px !important;
            }
            [data-css="tve-u-1879ed9be6e"] {
                margin-right: 11px !important;
                margin-left: 10px !important;
            }
            [data-css="tve-u-17df7764468"] {
                margin-left: 10px !important;
                margin-right: 10px !important;
            }
            [data-css="tve-u-1879eda5cc2"] {
                margin-left: 10px !important;
                margin-right: 10px !important;
            }
            [data-css="tve-u-17df76b71ca"] {
                margin-left: 10px !important;
                margin-right: 10px !important;
            }
            [data-css="tve-u-17df75f8362"] {
                margin-left: 10px !important;
                margin-right: 10px !important;
            }
            :not(#tve) [data-css="tve-u-18330336c08"] {
                font-size: 21px !important;
            }
            :not(#tve) [data-css="tve-u-1879edb5eef"] {
                font-size: 20px !important;
            }
        }
    </style>
    <style type="text/css" id="tve_head_custom_css" class="tve_user_custom_style">
        .thrv_text_element p {
            margin: 0;
        }

        .thrv_heading h1,
        h2,
        h3,
        h4,
        h5 {
            margin: 0;
        }
    </style><noscript></noscript>
    <style type="text/css">
        html {
            height: auto;
        }

        html.tcb-editor {
            overflow-y: initial;
        }

        body:before,
        body:after {
            height: 0 !important;
        }

        .thrv_page_section .out {
            max-width: none
        }

        .tve_wrap_all {
            position: relative;
        }

        /* Content Width - inherit Content Width directly from LP settings */

        .thrv-page-section[data-inherit-lp-settings="1"] .tve-page-section-in {
            max-width: 1080px !important;
            max-width: var(--page-section-max-width) !important;
        }

        body.tcb-full-header .thrv_header,
        body.tcb-full-footer .thrv_footer {
            width: 100vw;
            left: 50%;
            right: 50%;
            margin-left: -50vw !important;
            margin-right: -50vw !important;
        }
    </style>

</head>

<body class="home page-template-default page page-id-11 wp-embed-responsive tve_lp" style="" data-css="tve-u-15e09c94f7d">
    <div class="wrp cnt bSe" style="display: none">
        <div class="awr"></div>
    </div>
    <div class="tve_wrap_all" id="tcb_landing_page">
        <div class="tve_post_lp tve_lp_tcb2-bright-smart-sales-page tve_lp_template_wrapper" style="">
            <div id="tve_flt" class="tve_flt tcb-style-wrap">
                <div id="tve_editor" class="tve_shortcode_editor tar-main-content" data-post-id="11">
                    <div class="thrive-group-edit-config" style="display: none !important"></div>
                    <div class="thrv_wrapper thrv-page-section tve-height-update">
                        <div class="tve-page-section-out"></div>
                        <div class="tve-page-section-in" data-css="tve-u-17df68678d3" style="">
                            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                                <div class="tve-content-box-background" style="--background-image:linear-gradient(rgb(0, 101, 104), rgb(0, 101, 104))  !important; --background-size:auto auto  !important; --background-position:50% 50%  !important; --background-attachment:scroll  !important; --background-repeat:no-repeat  !important;"
                                    data-css="tve-u-18437980ab2"></div>
                                <div class="tve-cb">
                                    <div class="thrv_wrapper thrv_text_element">
                                        <h1 class="" data-bold="inherit" data-css="tve-u-182d8f44347" style="text-align: center;"><b>Ikaria Juice™ Only $49/Bottle&nbsp;</b><b>Limited Time Offer</b></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
                        <div class="tve-page-section-out"></div>
                        <div class="tve-page-section-in" data-css="tve-u-1843796f877">
                            <div class="thrv_wrapper thrv_text_element">
                                <p style="text-align: center;" data-css="tve-u-17df6a98d95"><span data-css="tve-u-17df6bc2456"><span style="color: rgb(218, 87, 35);">Flat Sale ONLY For</span> <span style="color: rgb(0, 101, 104);">Today -</span> <span style="color: rgb(218, 87, 35);">Special Offer</span><br></span><strong><span style="color: rgb(0, 101, 104);">Save Upto 90% off + 3 FREE Bonuses + 180 Day Money Back Guarantee</span></strong></p>
                            </div>
                            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1080; --tve-border-width:1px; border: 1px solid rgb(0, 0, 0);" data-css="tve-u-17df7cd1493">
                                <div class="tcb-flex-row v-2 tcb--cols--2">
                                    <div class="tcb-flex-col" data-css="tve-u-184e6e3de2d" style="">
                                        <div class="tcb-col">
                                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df6c322cc" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-224" alt="Ikaria juice" data-id="224" width="452" data-init-width="612" height="301" data-init-height="408" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20452%20301\'%3E%3C/svg%3E" data-width="452" data-height="301" data-css="tve-u-181eb854ff5" style="" data-link-wrap="true" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp 612w, https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview-300x200.png.webp 300w" data-lazy-sizes="(max-width: 452px) 100vw, 452px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-224" alt="Ikaria juice" data-id="224" width="452" data-init-width="612" height="301" data-init-height="408" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp" data-width="452" data-height="301" data-css="tve-u-181eb854ff5" style="" data-link-wrap="true" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp 612w, https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview-300x200.png.webp 300w" sizes="(max-width: 452px) 100vw, 452px" /></noscript></span></div>
                                            <div
                                                class="thrv_wrapper tve_image_caption" data-css="tve-u-17df6c5c786" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-225" alt="Ikaria juice" data-id="225" width="515" data-init-width="1111" height="101" data-init-height="217" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20515%20101\'%3E%3C/svg%3E" data-width="515" data-height="101" style="" data-css="tve-u-18437383127" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min.png.webp 1111w, https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min-300x59.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min-1024x200.png.webp 1024w, https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min-768x150.png.webp 768w" data-lazy-sizes="(max-width: 515px) 100vw, 515px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-225" alt="Ikaria juice" data-id="225" width="515" data-init-width="1111" height="101" data-init-height="217" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min.png.webp" data-width="515" data-height="101" style="" data-css="tve-u-18437383127" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min.png.webp 1111w, https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min-300x59.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min-1024x200.png.webp 1024w, https://ikaria-juice.net/wp-content/uploads/2022/11/2nd-min-768x150.png.webp 768w" sizes="(max-width: 515px) 100vw, 515px" /></noscript></span></div>
                                        <div
                                            class="thrv_wrapper tve_image_caption" data-css="tve-u-17df6c66a73" style=""><span class="tve_image_frame" style=""><img decoding="async" class="tve_image tcb-moved-image wp-image-226" alt="Ikaria juice" data-id="226" width="280" data-init-width="905" height="74" data-init-height="238" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20280%2074\'%3E%3C/svg%3E" data-width="280" data-height="74" style="" data-css="tve-u-17df6c75d44" mt-d="-1.8374999999999986" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/3rd-Exipure-min.png.webp 905w, https://ikaria-juice.net/wp-content/uploads/2022/11/3rd-Exipure-min-300x79.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/3rd-Exipure-min-768x202.png.webp 768w" data-lazy-sizes="(max-width: 280px) 100vw, 280px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/3rd-Exipure-min.png.webp" /><noscript><img decoding="async" class="tve_image tcb-moved-image wp-image-226" alt="Ikaria juice" data-id="226" width="280" data-init-width="905" height="74" data-init-height="238" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/3rd-Exipure-min.png.webp" data-width="280" data-height="74" style="" data-css="tve-u-17df6c75d44" mt-d="-1.8374999999999986" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/3rd-Exipure-min.png.webp 905w, https://ikaria-juice.net/wp-content/uploads/2022/11/3rd-Exipure-min-300x79.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/3rd-Exipure-min-768x202.png.webp 768w" sizes="(max-width: 280px) 100vw, 280px" /></noscript></span></div>
                                    <div
                                        class="thrv_wrapper thrv_text_element">
                                        <p data-css="tve-u-17df6d03296" style="text-align: center;"><span style="color: rgb(0, 117, 178);" data-css="tve-u-17df6d4deec">Order TODAY And Save Up To</span>
                                            <span style="color: var(--tcb-color-0);">$780!<br>Save Over 90%!</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="tcb-flex-col">
                            <div class="tcb-col">
                                <div class="thrv_wrapper thrv_text_element">
                                    <p data-css="tve-u-1879ed0d95e" style="text-align: center;"><span style="color: var(--tcb-color-0);">Ikaria Juice&nbsp;</span>is a Natural Weight Loss Supplement That Aims to Help Users Burn Fat Safely and Effectively.</p>
                                </div>
                                <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" style="" data-css="tve-u-17df6d106a6">
                                    <p data-css="tve-u-1879ed0f170" style="text-align: center;">The Formula is Easy to Take Each Day, and it Only Uses <a href="https://naturalingredient.org/?page_id=47" target="_blank" class="tve-froala fr-basic" style="outline: none;"><span style="color: var(--tcb-color-0);" data-css="tve-u-17df6d3228c">Natural Ingredients</span></a>                                        to Get the Desired Effect.</p>
                                </div>
                                <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df6cb9b12" style="--tve-border-width:1px;">
                                    <p data-css="tve-u-1879ed105f7" style="text-align: center;">Try <a href="https://ikaria-juice.net/" target="_blank" class="tve-froala fr-basic" style="outline: none;"><span style="color: var(--tcb-color-0);" data-css="tve-u-17df6d3a33d">Ikaria Juice</span> </a>For Over 90
                                        <span
                                            style="color: var(--tcb-color-0);" data-css="tve-u-17df6d3ecd6">% OFF Today!</span>
                                    </p>
                                </div>
                                <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df6d14b04">
                                    <p data-css="tve-u-17df6c96cd1" style="text-align: center;">Regular Price: <span style="text-decoration: line-through;">$199/per bottle</span></p>
                                </div>
                                <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df6d1a678">
                                    <p data-css="tve-u-17df6cdc103" style="text-align: center;">Only for: $49/per bottle</p>
                                </div>
                                <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df6ce4bc2" style=""><span class="tve_image_frame" style=""><a href="https://ikaria-juice.net/recommends/buy-now/" title="BUY NOW" class="thirstylinkimg" rel="" target="" data-linkid="346" data-nojs="false"><img decoding="async" class="tve_image wp-image-227" alt="Ikaria juice" data-id="227" width="374" data-init-width="280" height="96" data-init-height="72" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20374%2096\'%3E%3C/svg%3E" data-width="374" data-height="96" mt-d="-0.9686999999999983" style="" data-css="tve-u-17df6cef5e2" data-link-wrap="true" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/buy-ikaria-lean-belly-juice-1-min.png.webp"><noscript><img decoding="async" class="tve_image wp-image-227" alt="Ikaria juice" data-id="227" width="374" data-init-width="280" height="96" data-init-height="72" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/buy-ikaria-lean-belly-juice-1-min.png.webp" data-width="374" data-height="96" mt-d="-0.9686999999999983" style="" data-css="tve-u-17df6cef5e2" data-link-wrap="true"></noscript></a></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
            <div class="tve-page-section-out"></div>
            <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-17df752bef1">
                <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df7550836" id="tve-jump-18442aba8b7">
                    <p data-css="tve-u-17df7541f3d" style="text-align: center;">Proven By Thousands</p>
                </div>
                <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1139; --tve-border-width:1px; border: 1px solid rgb(0, 0, 0);" data-css="tve-u-17df75f8362">
                    <div class="tcb-flex-row v-2 tcb--cols--3" style="" data-css="tve-u-17df760986d">
                        <div class="tcb-flex-col" data-css="tve-u-17df75f5d6d" style="">
                            <div class="tcb-col">
                                <div class="thrv_wrapper tve_image_caption img_style_circle" data-css="tve-u-17df7583505" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-224" alt="Ikaira Juice " data-id="224" width="199" data-init-width="250" height="199" data-init-height="250" title="testi 1" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20199%20199\'%3E%3C/svg%3E" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style="" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/07/testi-1.jpg"><noscript><img decoding="async" class="tve_image wp-image-224" alt="Ikaira Juice " data-id="224" width="199" data-init-width="250" height="199" data-init-height="250" title="testi 1" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/07/testi-1.jpg" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style=""></noscript></span></div>
                                <div
                                    class="thrv_wrapper tve_image_caption" data-css="tve-u-17df757042e" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-229" alt="Ikaria juice" data-id="229" width="264" data-init-width="920" height="49" data-init-height="171" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20264%2049\'%3E%3C/svg%3E" data-width="264" data-height="49" data-css="tve-u-184373cf221" style="" mt-d="-1" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp 920w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-300x56.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-768x143.png.webp 768w" data-lazy-sizes="(max-width: 264px) 100vw, 264px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-229" alt="Ikaria juice" data-id="229" width="264" data-init-width="920" height="49" data-init-height="171" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp" data-width="264" data-height="49" data-css="tve-u-184373cf221" style="" mt-d="-1" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp 920w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-300x56.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-768x143.png.webp 768w" sizes="(max-width: 264px) 100vw, 264px" /></noscript></span></div>
                            <div
                                class="thrv_wrapper thrv_text_element">
                                <p data-css="tve-u-17df75a96db" style="text-align: center;">Verified Purchase</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df75bd532" style="">
                            <p data-css="tve-u-17df75ae21a" style="text-align: center;">“Lauren is 35 lbs lighter so far...!”</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-1879ed1883b" style="">
                            <p style="text-align: center;">“I never used to leave the house, worried about not fitting into chairs or public transport. Now after trying Ikaria Juice I\'m down 35 lbs! I feel and look amazing. My energy levels are through the roof and I regularly use
                                the bus and try on slim clothes and shop in the mall stress free. Thank you so much!”</p>
                        </div>
                        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-18330282d64">
                            <p data-css="tve-u-17df75b2b14" style="text-align: right;">Lauren G. Wyoming, USA</p>
                        </div>
                    </div>
                </div>
                <div class="tcb-flex-col" data-css="tve-u-182d8ee25f0" style="">
                    <div class="tcb-col">
                        <div class="thrv_wrapper tve_image_caption img_style_circle" data-css="tve-u-17df7583505" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-225" alt="Ikaira Juice " data-id="225" width="199" data-init-width="250" height="199" data-init-height="250" title="testi 2" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20199%20199\'%3E%3C/svg%3E" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style="" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/07/testi-2.jpg"><noscript><img decoding="async" class="tve_image wp-image-225" alt="Ikaira Juice " data-id="225" width="199" data-init-width="250" height="199" data-init-height="250" title="testi 2" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/07/testi-2.jpg" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style=""></noscript></span></div>
                        <div
                            class="thrv_wrapper tve_image_caption" data-css="tve-u-17df757042e" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-229" alt="Ikaria juice" data-id="229" width="264" data-init-width="920" height="49" data-init-height="171" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20264%2049\'%3E%3C/svg%3E" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp 920w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-300x56.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-768x143.png.webp 768w" data-lazy-sizes="(max-width: 264px) 100vw, 264px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-229" alt="Ikaria juice" data-id="229" width="264" data-init-width="920" height="49" data-init-height="171" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp 920w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-300x56.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-768x143.png.webp 768w" sizes="(max-width: 264px) 100vw, 264px" /></noscript></span></div>
                    <div
                        class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-17df75a96db" style="text-align: center;">Verified Purchase</p>
                </div>
                <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df75bd532" style="">
                    <p data-css="tve-u-17df75ae21a" style="text-align: center;">“Zach has dropped 26 lbs...!”</p>
                </div>
                <div class="thrv_wrapper thrv_text_element" data-css="tve-u-1879ed1ade7" style="">
                    <p style="text-align: center;">“I was so embarrassed when my son grabbed my belly and asked, Daddy why is your tummy so squishy. I had to do something, and when I saw the Ikaria Juice video and verified the research I had to try it out. I\'m down 26 lbs and it keeps
                        melting off! My snoring has disappeared. I feel fitter and happier than I did in my 30s!”</p>
                </div>
                <div class="thrv_wrapper thrv_text_element" data-css="tve-u-18330282576">
                    <p data-css="tve-u-17df75b2b14" style="text-align: right;">Zach M. New York, USA</p>
                </div>
            </div>
        </div>
        <div class="tcb-flex-col">
            <div class="tcb-col">
                <div class="thrv_wrapper tve_image_caption img_style_circle" data-css="tve-u-17df7583505" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-226" alt="Ikaira Juice " data-id="226" width="199" data-init-width="250" height="199" data-init-height="250" title="testi 3" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20199%20199\'%3E%3C/svg%3E" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style="" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/07/testi-3.jpg"><noscript><img decoding="async" class="tve_image wp-image-226" alt="Ikaira Juice " data-id="226" width="199" data-init-width="250" height="199" data-init-height="250" title="testi 3" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/07/testi-3.jpg" data-width="199" data-height="199" data-css="tve-u-17df7578bf4" style=""></noscript></span></div>
                <div
                    class="thrv_wrapper tve_image_caption" data-css="tve-u-17df757042e" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-229" alt="Ikaria juice" data-id="229" width="264" data-init-width="920" height="49" data-init-height="171" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20264%2049\'%3E%3C/svg%3E" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp 920w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-300x56.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-768x143.png.webp 768w" data-lazy-sizes="(max-width: 264px) 100vw, 264px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-229" alt="Ikaria juice" data-id="229" width="264" data-init-width="920" height="49" data-init-height="171" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp" data-width="264" data-height="49" data-css="tve-u-17df758e0eb" style="" mt-d="-1" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/star-min.png.webp 920w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-300x56.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/star-min-768x143.png.webp 768w" sizes="(max-width: 264px) 100vw, 264px" /></noscript></span></div>
            <div
                class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df75a96db" style="text-align: center;">Verified Purchase</p>
        </div>
        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df75bd532" style="">
            <p data-css="tve-u-17df75ae21a" style="text-align: center;">"Cassie dissolved 40 lbs in no time...!"</p>
        </div>
        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df75bfb28" style="">
            <p style="text-align: center;">“Every since taking Ikaria Juice every day I am eating what I want - more than ever, but I\'m still dropping weight! I\'m down 4 dress sizes, about 40 lbs. Who would have thought it would be so easy? I feel so sexy, so pretty. I no longer worry
                about what my friends think of me or how my weight affects those around me. Thank you!”</p>
        </div>
        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-18330283658">
            <p data-css="tve-u-17df75b2b14" style="text-align: right;">Cassie T. Delaware, USA</p>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1" data-css="tve-u-17df768fade" style="">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df766ae75"></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-17df76657a5">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df766da38">
                <p data-css="tve-u-17df7672e13" style="text-align: center;">Proven By Thousands</p>
            </div>
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1140;" data-css="tve-u-17df7680f08">
                <div class="tcb-flex-row v-2 tcb--cols--3" data-css="tve-u-17df768c421" style="">
                    <div class="tcb-flex-col">
                        <div class="tcb-col">
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7641da5"><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-229" alt="Ikaira Juice " data-id="229" width="144" data-init-width="144" height="144" data-init-height="144" title="image1" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20144%20144\'%3E%3C/svg%3E" data-width="144" data-height="144" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/07/image1.png"><noscript><img decoding="async" class="tve_image wp-image-229" alt="Ikaira Juice " data-id="229" width="144" data-init-width="144" height="144" data-init-height="144" title="image1" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/07/image1.png" data-width="144" data-height="144"></noscript></span></div>
                            <div
                                class="thrv_wrapper thrv_text_element">
                                <p style="text-align: center;"><strong><span data-css="tve-u-17df767794b" style="color: var(--tcb-color-2);">Made In The USA</span></strong><br><span style="color: var(--tcb-color-3);" data-css="tve-u-17df767794e">Ikaria Juice is manufactured on US soil.</span></p>
                        </div>
                    </div>
                </div>
                <div class="tcb-flex-col">
                    <div class="tcb-col">
                        <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7641da5"><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-230" alt="Ikaira Juice " data-id="230" width="144" data-init-width="144" height="144" data-init-height="144" title="image 2" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20144%20144\'%3E%3C/svg%3E" data-width="144" data-height="144" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/07/image-2.png"><noscript><img decoding="async" class="tve_image wp-image-230" alt="Ikaira Juice " data-id="230" width="144" data-init-width="144" height="144" data-init-height="144" title="image 2" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/07/image-2.png" data-width="144" data-height="144"></noscript></span></div>
                        <div
                            class="thrv_wrapper thrv_text_element">
                            <p style="text-align: center;"><span data-css="tve-u-17df767a779" style="color: var(--tcb-color-2);"><strong>100% All Natural</strong><br></span><span data-css="tve-u-17df767a77d" style="color: var(--tcb-color-3);">All ingredients are pure, natural, and carefully sourced.</span></p>
                    </div>
                </div>
            </div>
            <div class="tcb-flex-col">
                <div class="tcb-col">
                    <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7641da5"><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-231" alt="Ikaira Juice " data-id="231" width="144" data-init-width="144" height="144" data-init-height="144" title="image3" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20144%20144\'%3E%3C/svg%3E" data-width="144" data-height="144" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/07/image3.png"><noscript><img decoding="async" class="tve_image wp-image-231" alt="Ikaira Juice " data-id="231" width="144" data-init-width="144" height="144" data-init-height="144" title="image3" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/07/image3.png" data-width="144" data-height="144"></noscript></span></div>
                    <div
                        class="thrv_wrapper thrv_text_element tve-froala fr-box">
                        <p style="text-align: center;"><a href="https://www.fda.gov/food/guidance-regulation-food-and-dietary-supplements/registration-food-facilities-and-other-submissions" target="_blank" style="outline: none;" class="tve-froala"><strong><span data-css="tve-u-17df767cd49" style="color: var(--tcb-color-2);">FDA Approved Facility<br></span></strong></a>
                            <span
                                data-css="tve-u-17df764e53c" style="color: var(--tcb-color-3);">Ikaria Juice is manufactured according to the latest standards.</span>
                        </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone">
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1080; --tve-border-width:1px; border: 1px solid rgb(0, 0, 0);" data-css="tve-u-17df76b71ca">
                <div class="tcb-flex-row v-2 tcb--cols--2">
                    <div class="tcb-flex-col c-33" data-css="tve-u-183301d6896" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-181ebb115ec" style=""><span class="tve_image_frame" style=""><img decoding="async" class="tve_image wp-image-231" alt="Ikaria juice" data-id="231" width="460" data-init-width="622" height="297" data-init-height="401" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20460%20297\'%3E%3C/svg%3E" data-width="460" data-height="297" style="" data-css="tve-u-181ebb0cfdc" ml-d="-40.59400000000005" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp 622w, https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min-300x193.png.webp 300w" data-lazy-sizes="(max-width: 460px) 100vw, 460px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-231" alt="Ikaria juice" data-id="231" width="460" data-init-width="622" height="297" data-init-height="401" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp" data-width="460" data-height="297" style="" data-css="tve-u-181ebb0cfdc" ml-d="-40.59400000000005" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp 622w, https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min-300x193.png.webp 300w" sizes="(max-width: 460px) 100vw, 460px" /></noscript></span></div>
                            <div
                                class="thrv_wrapper tve_image_caption" data-css="tve-u-17df769e533"><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-232" alt="Ikaria juice" data-id="232" width="338" data-init-width="240" height="292" data-init-height="207" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20338%20292\'%3E%3C/svg%3E" data-width="338" data-height="292" style="" data-css="tve-u-184373ea579" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/testi3-min.png.webp"><noscript><img decoding="async" class="tve_image wp-image-232" alt="Ikaria juice" data-id="232" width="338" data-init-width="240" height="292" data-init-height="207" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/testi3-min.png.webp" data-width="338" data-height="292" style="" data-css="tve-u-184373ea579"></noscript></span></div>
                        <div
                            class="thrv_wrapper tve_image_caption" data-css="tve-u-183301ee90a" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-27" alt="Ikaria Juice Official" data-id="27" width="234" data-init-width="144" height="234" data-init-height="144" title="image-2" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20234%20234\'%3E%3C/svg%3E" data-width="234" data-height="234" data-css="tve-u-183301efc2b" style="" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/07/image-2.png"><noscript><img decoding="async" class="tve_image wp-image-27" alt="Ikaria Juice Official" data-id="27" width="234" data-init-width="144" height="234" data-init-height="144" title="image-2" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/07/image-2.png" data-width="234" data-height="234" data-css="tve-u-183301efc2b" style=""></noscript></span></div>
                </div>
            </div>
            <div class="tcb-flex-col c-66">
                <div class="tcb-col">
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-1843747b2ba" style="">
                        <p data-css="tve-u-17df76aecab" style="">What is Ikaria Juice?</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-1879ed23bb9" style="">
                        <p data-css="tve-u-1879ed268cd" style=""><a href="https://ikaria-juice.net/" target="_blank" class="tve-froala fr-basic" style="outline: none;"><span data-css="tve-u-1879edb4327">Ikaria Juice</span></a> is an all-natural dietary supplement that has been carefully designed
                            and formulated with love and care after years of research and testing to help people lose weight naturally and healthily. Ikaria Juice<br><br>This revolutionary formula is made with a healthy blend of 8 exotic nutrients that
                            are super healthy and have been proven to be effective to help shed unwanted fats.<br><br>The main aim of this supplement is to help men and women facing the problem of obesity, get rid of it and its ill effects.<br><br>Did
                            you know the root cause of obesity is low brown adipose tissue levels? Thus, to help you overcome that, the makers have added the correct amount of herbs and ingredients that will help your body create brown adipose tissue
                            so that your body can naturally burn a lot of fats. Ikaria Juice<br><br>The entire Ikaira Juice formula has been manufactured right here in the USA in an FDA-approved facility. The solution is also certified by the Goods Manufacturing
                            Practices facility (<a href="https://ispe.org/initiatives/regulatory-resources/gmp/what-is-gmp" target="_blank" class="tve-froala" style="outline: none;">GMP</a>).<br><br>Each and every batch of Ikaria Juice has been made under
                            strict, sterile, and precise standards that ensure high quality and safety. It is easy to use and easy to swallow.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1" data-css="tve-u-17df76ddbf0" style="">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-18330369526">
                <p data-css="tve-u-18330336c08" style="text-align: center;">How Ikaria Juice Can Help You Lose Weight?</p>
            </div>
            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-1879eda5cc2" style="">
                <p data-css="tve-u-17df76b597d" style="">Ikaria Juice is a weight loss formula that uses eight plant and herb extracts to raise levels of brown adipose tissue (BAT) in your body.<br><br>BAT is a fat burning furnace hiding inside every lean person. Research has increasingly validated
                    the value of BAT for weight loss. Studies show that BAT burns calories 300 times faster than other fat cells, for example. It helps you maintain a caloric deficit – and it burns calories inside of you 24 hours a day, 7 days a week.
                    Ikaria Juice<br><br>Here’s how the makers of Ikaria Juice explain how the diet pill works:<br><br>“Ikaria Juice is unlike anything you’ve ever tried or experienced in your life before. It is the only product in the world with a proprietary
                    blend of 8 exotic nutrients and plants designed to target low brown adipose tissue (BAT) levels, the new found root-cause of your unexplained weight gain.”<br><br>By raising BAT levels even a small amount, Ikaria Juice can lead to
                    a huge increase in your body’s calorie and fat burning powers.<br><br>At the same time, BAT can also boost energy levels. When your body has higher levels of BAT, it tends to have higher levels of energy. Ikaria Juice<br><br>With all
                    of that in mind, Ikaria Juice aims to jumpstart your metabolism and energy by raising levels of brown adipose tissue within your body.</p>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1" data-css="tve-u-17df77a9ce8" style="">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in" data-css="tve-u-18437ae963e">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df76f957e">
                <p data-css="tve-u-1879edb5eef" style="text-align: center;"><span style="color: var(--tcb-color-1);" data-css="tve-u-17df76fbc57">Order</span>
                    <span style="color: var(--tcb-color-0);" data-css="tve-u-17df76fe8c4">6 Bottles</span>
                    <span style="color: var(--tcb-color-1);" data-css="tve-u-17df7707bb5">or </span><span data-css="tve-u-17df7707bb7" style="color: var(--tcb-color-0);">3 Bottles</span><span data-css="tve-u-17df770c393" style="color: var(--tcb-color-1);"> and Get </span>
                    <span
                        data-css="tve-u-17df7702447" style="color: var(--tcb-color-0);">2 FREE Bonuses!</span>
                </p>
            </div>
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1080;" data-css="tve-u-17df7764468">
                <div class="tcb-flex-row v-2 tcb--cols--2">
                    <div class="tcb-flex-col c-33">
                        <div class="tcb-col">
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df77233b2" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-251" alt="Ikaria juice" data-id="251" width="250" data-init-width="768" height="349" data-init-height="1158" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20250%20349\'%3E%3C/svg%3E" data-width="250" data-height="349" data-css="tve-u-17df7727ced" style="" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Anti-Aging-Tips-For-Beautiful-Skin-.-.-OHMY-CREATIVE.COM-2-768x1158-min.png.webp"><noscript><img decoding="async" class="tve_image wp-image-251" alt="Ikaria juice" data-id="251" width="250" data-init-width="768" height="349" data-init-height="1158" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Anti-Aging-Tips-For-Beautiful-Skin-.-.-OHMY-CREATIVE.COM-2-768x1158-min.png.webp" data-width="250" data-height="349" data-css="tve-u-17df7727ced" style=""></noscript></span></div>
                        </div>
                    </div>
                    <div class="tcb-flex-col c-66" data-css="tve-u-18442a5d7e6" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df774b7c1" style="">
                                <p data-css="tve-u-17df774f5b6" style="">BONUS #1: Anti-Aging Blue Print</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df774d63d" style="">
                                <p style="" data-css="tve-u-1879ed2be23">This is a book. In this, it has been told about the reconstruction of cells important in the aging process. Along with this, it has been told about the reconstruction of cells important in the aging process. Along with
                                    this, information has been given about important beverages that keep your sleep and digestive system healthy. Ikaria Juice</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element">
                                <p data-css="tve-u-17df7754b0d" style=""><span style="color: var(--tcb-color-0);" data-css="tve-u-17df775e4b3">RRP: <span style="text-decoration: line-through;" data-css="tve-u-17df775e4b6">$59.95</span> Today:</span>
                                    <span style="color: var(--tcb-color-1);" data-css="tve-u-17df7760cb3">FREE</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1080;" data-css="tve-u-1879ed9be6e">
                <div class="tcb-flex-row v-2 tcb--cols--2" style="" data-css="tve-u-1879ed9b697">
                    <div class="tcb-flex-col c-33">
                        <div class="tcb-col">
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-184374a79c8" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image tcb-moved-image wp-image-250" alt="Ikaria juice" data-id="250" width="250" data-init-width="907" height="375" data-init-height="1360" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20250%20375\'%3E%3C/svg%3E" data-width="250" data-height="375" data-css="tve-u-184373fcba4" style="" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min.jpg.webp 907w, https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min-200x300.jpg.webp 200w, https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min-683x1024.jpg.webp 683w, https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min-768x1152.jpg.webp 768w" data-lazy-sizes="(max-width: 250px) 100vw, 250px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min.jpg.webp" /><noscript><img decoding="async" class="tve_image tcb-moved-image wp-image-250" alt="Ikaria juice" data-id="250" width="250" data-init-width="907" height="375" data-init-height="1360" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min.jpg.webp" data-width="250" data-height="375" data-css="tve-u-184373fcba4" style="" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min.jpg.webp 907w, https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min-200x300.jpg.webp 200w, https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min-683x1024.jpg.webp 683w, https://ikaria-juice.net/wp-content/uploads/2022/11/61SdnHjumgL-min-768x1152.jpg.webp 768w" sizes="(max-width: 250px) 100vw, 250px" /></noscript></span></div>
                        </div>
                    </div>
                    <div class="tcb-flex-col c-66" data-css="tve-u-1833038ee62" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df774b7c1" style="">
                                <p data-css="tve-u-17df774f5b6" style="">BONUS #2: Energy Boosting Smoothie recipe</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df774d63d" style="">
                                <p data-css="tve-u-17df7753ec4" style="">This is the second bonus you get with Ikaria Juice. It is a smoothie made with vital ingredients that control appetite. Along with this, this mixture is also effective in many diseases.</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element">
                                <p data-css="tve-u-17df7754b0d" style=""><span style="color: var(--tcb-color-0);" data-css="tve-u-17df775e4b3">RRP: <span style="text-decoration: line-through;" data-css="tve-u-17df775e4b6">$49.95</span> Today:</span>
                                    <span style="color: var(--tcb-color-1);" data-css="tve-u-17df7760cb3">FREE</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-inherit-lp-settings="1" data-match-lp-colors="1" class="thrv_wrapper thrv-page-section thrv-lp-block tcb-local-vars-root" data-css="tve-u-183303b4d9c" tcb-template-name="Steps Area Block 03" tcb-template-id="54883" data-keep-css_id="1">
        <div class="thrive-group-edit-config" style="display: none !important"></div>
        <div class="thrive-local-colors-config" style="display: none !important"></div>
        <div class="tve-page-section-out" data-css="tve-u-183303b4d9d"></div>
        <div class="tve-page-section-in   tve_empty_dropzone" data-css="tve-u-183303b4d9f">
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-183303b4da0">
                <div class="tve-content-box-background" data-css="tve-u-183303b4da1" style=""></div>
                <div class="tve-cb" data-css="tve-u-183303b4da2">
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-183303b4da3" style="">
                        <h4 class="" data-css="tve-u-183303b4da4" style=""><strong><strong>&nbsp; &nbsp; &nbsp; benefits of Ikaria Lean Belly Juice other than weight loss?</strong></strong>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv-numbered_list dynamic-group-k2g0kgnc" data-start-number="1" data-number-increment="1" data-css="tve-u-183303b4da5">
                <ol class="tcb-numbered-list" style="">
                    <li class="thrv-styled-list-item thrv-numbered-list-v2 dynamic-group-k2g0ke0f" data-css="tve-u-183303b4da6" style="">
                        <div class="tcb-numbered-list-number thrv-disabled-label thrv_wrapper tcb-no-delete tcb-no-clone tve_no_drag dynamic-group-k2g0jwqf" data-css="tve-u-183303b4da7"><span class="tcb-numbered-list-index">1</span></div><span class="thrv-advanced-inline-text tve_editable tcb-numbered-list-text tcb-no-delete dynamic-group-k2g0k56t" data-css="tve-u-183303b4da8" style=""><strong><span data-css="tve-u-1833045e41a" style=""><strong><span data-css="tve-u-1833045e41e" style="">Reduce Your Appetite and Cravings with Ikaria Juice<strong>:-</strong></span></strong>
                        </span>
                        </strong><br><span data-css="tve-u-183303f446c" class="" style="">If you\'re looking to curb your appetite and reduce cravings, look no further than Ikaria Lean Belly Juice. This delicious juice is packed with natural ingredients that will help you feel fuller and more extended and resist temptation. Just a few ounces of this powerful juice daily can make a big difference in your weight loss journey!</span></span>
                    </li>
                    <li class="thrv-styled-list-item thrv-numbered-list-v2 dynamic-group-k2g0ke0f" data-css="tve-u-183303b4da6" style="">
                        <div class="tcb-numbered-list-number thrv-disabled-label thrv_wrapper tcb-no-delete tcb-no-clone tve_no_drag dynamic-group-k2g0jwqf" data-css="tve-u-183303b4daa"><span class="tcb-numbered-list-index">2</span></div><span class="thrv-advanced-inline-text tve_editable tcb-numbered-list-text tcb-no-delete dynamic-group-k2g0k56t tve-froala fr-box fr-basic" data-css="tve-u-183303b4da8" style=""><div class="thrv_wrapper thrv_text_element"><p dir="ltr" style="" data-css="tve-u-183304022ef"><strong><strong><span data-css="tve-u-183303b4da9" style=""><strong><span data-css="tve-u-183303f7332" style="">Packed with Energy<strong>:-</strong></span></strong>
                        </span>
                        </strong>
                        </strong>
                        </p>
            </div><span style="color: rgb(3, 3, 3);" data-css="tve-u-18330417921" class="">Ikaria Juice is Packed with Energy. The juice is made from an all-natural recipe of fruits and vegetables that are known to increase energy levels. Just one glass in the morning will give you the boost you need to start your day.</span></span>
            </li>
            <li class="thrv-styled-list-item thrv-numbered-list-v2 dynamic-group-k2g0ke0f" data-css="tve-u-183303b4da6" style="">
                <div class="tcb-numbered-list-number thrv-disabled-label thrv_wrapper tcb-no-delete tcb-no-clone tve_no_drag dynamic-group-k2g0jwqf" data-css="tve-u-183303b4dab"><span class="tcb-numbered-list-index">3</span></div><span class="thrv-advanced-inline-text tve_editable tcb-numbered-list-text tcb-no-delete dynamic-group-k2g0k56t tve-froala fr-box" data-css="tve-u-183303b4da8" style=""><div class="thrv_wrapper thrv_text_element"><p dir="ltr" style="" data-css="tve-u-18330428498"><strong>Keep your blood pressure in check<strong>:-</strong></strong></p></div><span style="color: rgb(3, 0, 0);" data-css="tve-u-1833043320f">Your heart is constantly pumping blood through your body to keep you alive and healthy. But if your blood pressure gets too high, it puts extra strain on your heart and arteries. High blood pressure can lead to heart disease, stroke, and other serious problems. Ikaria Lean Belly Juice helps keep your blood pressure under control by [providing nutrients that support healthy blood pressure levels].</span></span>
            </li>
            <li class="thrv-styled-list-item thrv-numbered-list-v2 dynamic-group-k2g0ke0f" data-css="tve-u-183303b4da6" style="">
                <div class="tcb-numbered-list-number thrv-disabled-label thrv_wrapper tcb-no-delete tcb-no-clone tve_no_drag dynamic-group-k2g0jwqf" data-css="tve-u-183303b4da7"><span class="tcb-numbered-list-index">4</span></div><span class="thrv-advanced-inline-text tve_editable tcb-numbered-list-text tcb-no-delete dynamic-group-k2g0k56t" data-css="tve-u-183303b4da8" style=""><strong>Joint Pain? Say "Joint Juice<strong>:-</strong>"&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><span data-css="tve-u-1833049821d" style="color: rgb(6, 4, 4);">If you\'re struggling with joint pain, Ikaria Juice can help. This powerful juice is packed with ingredients that improve joint health, like glucosamine and chondroitin. Plus, it\'s rich in antioxidants and anti-inflammatory compounds. So drink up and say goodbye to joint pain!&nbsp;</span>&nbsp;<strong>&nbsp;</strong></span>
            </li>
            <li class="thrv-styled-list-item thrv-numbered-list-v2 dynamic-group-k2g0ke0f" data-css="tve-u-183303b4da6" style="">
                <div class="tcb-numbered-list-number thrv-disabled-label thrv_wrapper tcb-no-delete tcb-no-clone tve_no_drag dynamic-group-k2g0jwqf" data-css="tve-u-183303b4da7"><span class="tcb-numbered-list-index">5</span></div><span class="thrv-advanced-inline-text tve_editable tcb-numbered-list-text tcb-no-delete dynamic-group-k2g0k56t" data-css="tve-u-183303b4da8" style=""><strong>Slim Down With Ikaria Lean Belly Juice<strong>:-</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><span style="color: rgb(6, 5, 5);" data-css="tve-u-183304ab935">Trying to lose weight and get in shape can be a frustrating process. But with the help of our all-natural fat burner, you can finally start seeing results! Ikaria Lean Belly Juice is packed with ingredients that help improve fat oxidation, so you can slim down and feel great. Give it a try today and see for yourself</span></span>
            </li>
            <li class="thrv-styled-list-item thrv-numbered-list-v2 dynamic-group-k2g0ke0f" data-css="tve-u-183303b4da6" style="">
                <div class="tcb-numbered-list-number thrv-disabled-label thrv_wrapper tcb-no-delete tcb-no-clone tve_no_drag dynamic-group-k2g0jwqf" data-css="tve-u-183303b4da7"><span class="tcb-numbered-list-index">6</span></div><span class="thrv-advanced-inline-text tve_editable tcb-numbered-list-text tcb-no-delete dynamic-group-k2g0k56t" data-css="tve-u-183303b4da8" style=""><strong>Metabolism booster<strong>:-</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><span style="color: rgb(6, 5, 5);" data-css="tve-u-183304bc5e8">Ikaria Lean Belly Juice is a powerful metabolism booster, helping you to burn fat and lose weight quickly. The ingredients in Ikaria Lean Belly Juice have been clinically shown to improve metabolic function, making it an essential part of any weight loss plan.</span></span>
            </li>
            <li class="thrv-styled-list-item thrv-numbered-list-v2 dynamic-group-k2g0ke0f" data-css="tve-u-183303b4da6" style="">
                <div class="tcb-numbered-list-number thrv-disabled-label thrv_wrapper tcb-no-delete tcb-no-clone tve_no_drag dynamic-group-k2g0jwqf" data-css="tve-u-183303b4da7"><span class="tcb-numbered-list-index">7</span></div><span class="thrv-advanced-inline-text tve_editable tcb-numbered-list-text tcb-no-delete dynamic-group-k2g0k56t" data-css="tve-u-183303b4da8" style=""><strong>A healthy gut for a happy life<strong>:-</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><span data-css="tve-u-183304ecfc7" class="">If you\'re looking for a way to support your digestive system and maintain a healthy gut, look no further than Ikaria Juice. Made with all-natural ingredients, Ikaria lean belly juice is rich in probiotics and enzymes that help promote proper digestion and absorption of nutrients. Plus, it\'s delicious and refreshing, making it easy to incorporate into your daily routine.</span></span>
            </li>
            <li class="thrv-styled-list-item thrv-numbered-list-v2 dynamic-group-k2g0ke0f" data-css="tve-u-183303b4da6" style="">
                <div class="tcb-numbered-list-number thrv-disabled-label thrv_wrapper tcb-no-delete tcb-no-clone tve_no_drag dynamic-group-k2g0jwqf" data-css="tve-u-183303b4da7"><span class="tcb-numbered-list-index">8</span></div><span class="thrv-advanced-inline-text tve_editable tcb-numbered-list-text tcb-no-delete dynamic-group-k2g0k56t" data-css="tve-u-183303b4da8" style=""><strong>Keep your heart healthy:-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong><span style="color: rgb(7, 7, 7);" data-css="tve-u-1833050b2a8">Ikaria Lean Belly Juice is good for your heart because it helps to reduce stress and maintains healthy blood pressure. This delicious juice is made with all-natural ingredients, so you can feel good about drinking it every day.</span></span>
            </li>
            </ol>
        </div>
    </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df77c0518"></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-17df77db1ea">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df77e971a">
                <p data-css="tve-u-1879ed3101a" style="text-align: center;">Limited Time Special Pricing - Act Now!</p>
            </div>
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-1879ed32bc1">
                <p data-css="tve-u-1879ed2ff3a" style="text-align: center;">Secure Your Reserved Ikaria Juice While Stocks Last</p>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone">
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1140;" data-css="tve-u-17df78e92a8">
                <div class="tcb-flex-row v-2 tcb--cols--3" data-css="tve-u-17df78f8557" style="">
                    <div class="tcb-flex-col" data-css="tve-u-17df78017f9" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-1843798e619">
                                <p data-css="tve-u-17df77fa6fe" style="text-align: center;">1 Bottle</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element">
                                <p data-css="tve-u-17df781b12a" style="text-align: center;">1 Month Supply</p>
                            </div>
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-181ebb32613" style=""><span class="tve_image_frame" style=""><img decoding="async" class="tve_image wp-image-231" alt="Ikaria juice" data-id="231" width="387" data-init-width="622" height="250" data-init-height="401" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20387%20250\'%3E%3C/svg%3E" data-width="387" data-height="250" data-css="tve-u-181ebb32666" style="" ml-d="-6.906000000000006" mt-d="0" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp 622w, https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min-300x193.png.webp 300w" data-lazy-sizes="(max-width: 387px) 100vw, 387px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-231" alt="Ikaria juice" data-id="231" width="387" data-init-width="622" height="250" data-init-height="401" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp" data-width="387" data-height="250" data-css="tve-u-181ebb32666" style="" ml-d="-6.906000000000006" mt-d="0" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp 622w, https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min-300x193.png.webp 300w" sizes="(max-width: 387px) 100vw, 387px" /></noscript></span></div>
                            <div
                                class="thrv_wrapper tve_image_caption" data-css="tve-u-182e9df3c2c" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-239" alt="Ikaria juice" data-id="239" width="220" data-init-width="712" height="64" data-init-height="208" title="59-Per-Bottle-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20220%2064\'%3E%3C/svg%3E" data-width="220" data-height="64" mt-d="-1.5750000000000028" style="" data-css="tve-u-181ebb4bdf9" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min.png.webp 712w, https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min-300x88.png.webp 300w" data-lazy-sizes="(max-width: 220px) 100vw, 220px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-239" alt="Ikaria juice" data-id="239" width="220" data-init-width="712" height="64" data-init-height="208" title="59-Per-Bottle-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min.png.webp" data-width="220" data-height="64" mt-d="-1.5750000000000028" style="" data-css="tve-u-181ebb4bdf9" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min.png.webp 712w, https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min-300x88.png.webp 300w" sizes="(max-width: 220px) 100vw, 220px" /></noscript></span></div>
                        <div
                            class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df78521ef" style="text-align: center;">Total: <span data-css="tve-u-17df786674c" style="text-decoration: line-through;">$199</span> $59</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-17df785bae2" style="text-align: center;">You Save $140</p>
                    </div>
                    <div class="thrv_wrapper tve_image_caption" data-css="tve-u-1843745f0a9"><span class="tve_image_frame"><a href="https://ikaria-juice.net/recommends/order-now/" title="ORDER NOW" class="thirstylinkimg" rel="" target="" data-linkid="348" data-nojs="false"><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20346%20106\'%3E%3C/svg%3E" data-width="346" data-height="106" data-link-wrap="true" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" data-lazy-sizes="(max-width: 346px) 100vw, 346px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" data-width="346" data-height="106" data-link-wrap="true" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" sizes="(max-width: 346px) 100vw, 346px" /></noscript></a></span></div>
                </div>
            </div>
            <div class="tcb-flex-col">
                <div class="tcb-col">
                    <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-1843798effa">
                        <p data-css="tve-u-17df77fa6fe" style="text-align: center;">6 Bottle</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-17df781b12a" style="text-align: center;">6 Month Supply</p>
                    </div>
                    <div class="thrv_wrapper tve_image_caption" data-css="tve-u-182e9a867fc" style=""><span class="tve_image_frame" style=""><img decoding="async" class="tve_image wp-image-128" alt="ikaria Juice Official" data-id="128" width="349" data-init-width="431" height="198" data-init-height="244" title="ikaria-juice-bottle-6-1" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20349%20198\'%3E%3C/svg%3E" data-width="349" data-height="198" data-css="tve-u-182e9a8680d" style="" ml-d="-1.75" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1.png 431w, https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1-300x170.png 300w" data-lazy-sizes="(max-width: 349px) 100vw, 349px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1.png" /><noscript><img decoding="async" class="tve_image wp-image-128" alt="ikaria Juice Official" data-id="128" width="349" data-init-width="431" height="198" data-init-height="244" title="ikaria-juice-bottle-6-1" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1.png" data-width="349" data-height="198" data-css="tve-u-182e9a8680d" style="" ml-d="-1.75" srcset="https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1.png 431w, https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1-300x170.png 300w" sizes="(max-width: 349px) 100vw, 349px" /></noscript></span></div>
                    <div
                        class="thrv_wrapper tve_image_caption" data-css="tve-u-182e9df6409" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-237" alt="Ikaria juice" data-id="237" width="220" data-init-width="703" height="65" data-init-height="209" title="39-Per-Bottle (1)-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20220%2065\'%3E%3C/svg%3E" data-width="220" data-height="65" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min.png.webp 703w, https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min-300x89.png.webp 300w" data-lazy-sizes="(max-width: 220px) 100vw, 220px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-237" alt="Ikaria juice" data-id="237" width="220" data-init-width="703" height="65" data-init-height="209" title="39-Per-Bottle (1)-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min.png.webp" data-width="220" data-height="65" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min.png.webp 703w, https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min-300x89.png.webp 300w" sizes="(max-width: 220px) 100vw, 220px" /></noscript></span></div>
                <div
                    class="thrv_wrapper thrv_text_element">
                    <p data-css="tve-u-17df78521ef" style="text-align: center;">Total: <span data-css="tve-u-17df786674c" style="text-decoration: line-through;">$1194</span>&nbsp;$234</p>
            </div>
            <div class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df785bae2" style="text-align: center;">You Save $960</p>
            </div>
            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-1843745ff29"><span class="tve_image_frame"><a href="https://ikaria-juice.net/recommends/order-now/" title="ORDER NOW" class="thirstylinkimg" rel="" target="" data-linkid="348" data-nojs="false"><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20346%20106\'%3E%3C/svg%3E" data-width="346" data-height="106" data-link-wrap="true" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" data-lazy-sizes="(max-width: 346px) 100vw, 346px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" data-width="346" data-height="106" data-link-wrap="true" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" sizes="(max-width: 346px) 100vw, 346px" /></noscript></a></span></div>
        </div>
    </div>
    <div class="tcb-flex-col" data-css="tve-u-182d8f8fff9" style="">
        <div class="tcb-col">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-18437991539">
                <p data-css="tve-u-17df77fa6fe" style="text-align: center;">3 Bottle</p>
            </div>
            <div class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df781b12a" style="text-align: center;">3 Month Supply</p>
            </div>
            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-181ebb378bb" style=""><span class="tve_image_frame" style=""><img decoding="async" class="tve_image wp-image-224" alt="Ikaria juice" data-id="224" width="346" data-init-width="612" height="230" data-init-height="408" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20346%20230\'%3E%3C/svg%3E" data-width="346" data-height="230" data-css="tve-u-181ebb37911" style="" ml-d="0" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp 612w, https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview-300x200.png.webp 300w" data-lazy-sizes="(max-width: 346px) 100vw, 346px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-224" alt="Ikaria juice" data-id="224" width="346" data-init-width="612" height="230" data-init-height="408" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp" data-width="346" data-height="230" data-css="tve-u-181ebb37911" style="" ml-d="0" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp 612w, https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview-300x200.png.webp 300w" sizes="(max-width: 346px) 100vw, 346px" /></noscript></span></div>
            <div
                class="thrv_wrapper tve_image_caption" data-css="tve-u-182e9df8fd7" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-238" alt="Ikaria juice" data-id="238" width="220" data-init-width="702" height="64" data-init-height="205" title="49-Per-Bottle-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20220%2064\'%3E%3C/svg%3E" data-width="220" data-height="64" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min.png.webp 702w, https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min-300x88.png.webp 300w" data-lazy-sizes="(max-width: 220px) 100vw, 220px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-238" alt="Ikaria juice" data-id="238" width="220" data-init-width="702" height="64" data-init-height="205" title="49-Per-Bottle-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min.png.webp" data-width="220" data-height="64" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min.png.webp 702w, https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min-300x88.png.webp 300w" sizes="(max-width: 220px) 100vw, 220px" /></noscript></span></div>
        <div
            class="thrv_wrapper thrv_text_element">
            <p data-css="tve-u-17df78521ef" style="text-align: center;">Total: <span data-css="tve-u-17df786674c" style="text-decoration: line-through;">$567</span>&nbsp;$147</p>
    </div>
    <div class="thrv_wrapper thrv_text_element">
        <p data-css="tve-u-17df785bae2" style="text-align: center;">You Save $450</p>
    </div>
    <div class="thrv_wrapper tve_image_caption" data-css="tve-u-18437460b07"><span class="tve_image_frame"><a href="https://ikaria-juice.net/recommends/order-now/" title="ORDER NOW" class="thirstylinkimg" rel="" target="" data-linkid="348" data-nojs="false"><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20346%20106\'%3E%3C/svg%3E" data-width="346" data-height="106" data-link-wrap="true" style="" data-css="tve-u-185805ece5f" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" data-lazy-sizes="(max-width: 346px) 100vw, 346px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" data-width="346" data-height="106" data-link-wrap="true" style="" data-css="tve-u-185805ece5f" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" sizes="(max-width: 346px) 100vw, 346px" /></noscript></a></span></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div data-inherit-lp-settings="1" data-match-lp-colors="1" class="thrv_wrapper thrv-page-section thrv-lp-block tcb-local-vars-root" data-css="tve-u-17df7983fdd" style="" tcb-template-name="Pattern Interrupt 02" tcb-template-id="59628" data-keep-css_id="1">
        <div class="thrive-group-edit-config" style="display: none !important"></div>
        <div class="thrive-local-colors-config" style="display: none !important"></div>
        <div class="tve-page-section-out" data-css="tve-u-17df7983fde" style=""></div>
        <div class="tve-page-section-in   tve_empty_dropzone" data-css="tve-u-17df7983fdf" style="">
            <div class="thrv_wrapper thrv-columns" data-css="tve-u-17df7983fe0" style="--tcb-col-el-width:1080;">
                <div class="tcb-flex-row v-2 tcb--cols--2 tcb-resized tcb-mobile-no-wrap m-edit" data-css="tve-u-17df7983fe1" style="">
                    <div class="tcb-flex-col" data-css="tve-u-17df7983fe2" style="">
                        <div class="tcb-col">
                            <div class="tcb-clear" data-css="tve-u-17df7983fe3">
                                <div class="thrv_wrapper thrv_icon tcb-icon-display" data-css="tve-u-17df7983fe4" style=""><svg class="tcb-icon" viewBox="0 0 448 512" data-id="icon-long-arrow-right-light" data-name="" style="">
            <path d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z"></path>
        </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="tcb-flex-col" data-css="tve-u-17df7983fe5" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df7983fe6">
                                <h3 class="" style="text-align: left;" data-css="tve-u-1879ed38565"><b>WARNING July-2022:</b> Stock levels of Ikaria Juice are limited Accept your reserved bottle above <b>NOW</b> before your discount expires.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1" data-css="tve-u-17df7ac70bf" style="">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-18437aef8ab">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df79a49c7">
                <h2 style="text-align: center;" class="">Ikaria Juice Ingredients</h2>
            </div>
            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a3eebe" style="">
                <p data-css="tve-u-17df79bf25a" style="text-align: center;">Presently, only six of the eight ingredients have been listed, with no insight into how much of each is found per serving. This might be something to take up with customer service prior to investing. Nevertheless, here’s what we do know
                    about the Ikaria Juice weight loss formula so far:</p>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-17df7a5ac8e" style="text-align: left;"><a href="https://www.webmd.com/vitamins/ai/ingredientmono-1000/panax-ginseng" target="_blank" class="tve-froala fr-basic" style="outline: none;">Panax Ginseng:</a></p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-18330519a6e" style="text-align: left;">A lot of research has been done by scientists on this, in which it has been found that Panax Ginsang has natural properties to reduce weight and reduce appetite. By consuming it, we are not able to eat high calorie food. Which
                            helps in working the weight. But you also need to do some physical exercise along with it. Only after that this effect is visible. Apart from this, it has many other benefits like :-<br><br>1. Regulates hormones (which cause
                            breast cancer in women and<br>Gets rid of the problem of endometriosis)<br><br>2. Treats stress (It increases metabolism by working on the stress hormone also known as cortisol, which gives us relief in stress<br><br>3. Improves
                            the brain system (Studies have found that it contains genosides and compound K, which reduce the damage caused by free radicals, so that our brain system works smoothly.<br><br>4. Reduce Menstrual Problems (The element present
                            in it also helps in the symptoms of cramps, abdominal pain, and menopause in women during the menstrual days.<br><br>5. Brightening the skin (Anti-oxidant present in it is helpful in improving the skin.<br><br>6.Removing Insomnia
                            (It provides inner peace to the mind and increases immunity so that we will be able to sleep peacefully.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-17df7a5ac8e" style="text-align: left;"><a href="https://en.wikipedia.org/wiki/Taraxacum" target="_blank" class="tve-froala fr-basic" style="outline: none;">Taraxum</a><span style="color: rgb(181, 13, 13);" data-css="tve-u-1833028924e">:</span></p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-1833051acdc" style="text-align: left;">1.&nbsp; Treating inflammation - Research has shown that it contains an element called polysaccharide, it is a type of carbohydrate that has anti-oxidants and anti-inflammatory which work in inflammation.<br><br>2. Cancer prevention
                            - Research conducted by NCBI (National Center of Biotechnology Information) has found that its extract has anti-cancer properties, which is capable of eliminating cancer cells.<br><br>3. Controlling Diabetes – The anti-diabetic
                            properties present in it are also beneficial for type 2 patients.<br><br>4. Weight loss - Consuming it with food leads to secretion of gastric which works on fat and cholesterol</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-17df7a5ac8e" style="text-align: left;"><a href="https://www.webmd.com/drugs/2/drug-60148/korean-white-ginseng-oral/details" target="_blank" class="tve-froala fr-basic" style="outline: none;">White Korean Ginseng:</a></p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-1879ed8ea19" style="text-align: left;">White Korean Ginseng is a medicinal plant that has been used for centuries in Traditional Chinese Medicine. It is prized for its ability to Tonify the Qi, or life force energy, and is often used to treat fatigue, low energy, and
                            poor circulation. White ginseng is harvested from 4-6 year old plants that have been carefully cultivated to produce the highest quality roots. The roots are then peeled and dried in the sun or shade before being cut into thin
                            slices.</p>
                        <p data-css="tve-u-1879ed8ea1e" style="text-align: left;"><br></p>
                        <p data-css="tve-u-1833051c4c5" style="text-align: left;">Ginseng is known to energize cells and activate a healthy inflammatory response that allows your body to remain healthy. It boosts immunity and controls oxidative stress and free radical damage too. It is proven to boost metabolism
                            in a way that helps your fat cells release fats and never store excess fats again.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-17df7a5ac8e" style="text-align: left;"><a href="https://www.webmd.com/vitamins/ai/ingredientmono-1095/phellodendron" target="_blank" class="tve-froala fr-basic" style="outline: none;">Amur Cork Bark:</a></p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-1879ed8d031" style="text-align: left;">&nbsp;The Amur Cork Bark ingredient is a substance derived from the bark of the Amur cork tree. This ingredient has been used in traditional Chinese medicine for centuries, and is thought to have a wide range of medicinal properties.
                            Some of the purported benefits of Amur cork bark include reducing inflammation, boosting immunity, and promoting better circulation. Additionally, this ingredient is also said to possess anti-bacterial and anti-fungal properties.</p>
                        <p
                            data-css="tve-u-1879ed8d036" style="text-align: left;"><br></p>
                            <p data-css="tve-u-1833051d95a" style="text-align: left;">It is mainly added to ease your gut health and soothe the digestive system. Since bloating and edema can result in unexplained weight gain, Amur Cork Bark can help reduce this bloating and digestive issues. It supports healthy
                                liver and heart cells that take care of your body’s metabolism.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-18442ad4524" style="text-align: left;"><a href="https://www.webmd.com/vitamins/ai/ingredientmono-294/quercetin" target="_blank" class="tve-froala fr-basic" style="outline: none;">Quercetin</a>:</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-1833051e799" style="text-align: left;">Quercetin is a naturally occurring flavonoid found in many fruits, vegetables, and grains. As an ingredient, it is often used as a dietary supplement or natural food additive. Quercetin is thought to have numerous health benefits,
                            including anti-inflammatory and antioxidant properties. Additionally, quercetin has been shown to inhibit the growth of certain cancer cells and improve blood sugar control.<br><br>It supports healthy blood pressure and controls
                            blood sugar spikes as well. It controls and reverses aging processes to keep you youthful forever. It rejuvenates and repairs aging cells so your skin, cells, tissues, and muscles remain fresh and active. It also activates
                            metabolism and other fat-burning processes in your body.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-17df7a5ac8e" style="text-align: left;"><a href="https://www.healthline.com/health/olive-leaf-extract" target="_blank" class="tve-froala fr-basic" style="outline: none;">Oleuropein</a>:</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-1879ed86f5d" style="text-align: left;">Also known as Olea europaean, it is a bitter polyphenol compound, found in the leaves and fruits of olives. This is believed to be responsible for the many health benefits associated with the consumption of olive oil. In addition
                            to being consumed as part of the Mediterranean diet, oleuropein has also been used medicinally for centuries to treat a variety of conditions.</p>
                        <p data-css="tve-u-1879ed86f61" style="text-align: left;"><br></p>
                        <p data-css="tve-u-1833051f9d2" style="text-align: left;">This ingredient helps in improving the amount of BAT (brown adipose tissue) which helps in reducing fat from the fat cells. It is also famous for controlling cholesterol, sugar and blood pressure which helps the metabolism to function
                            normally. It supports artery health by removing plaque and toxins. Along with this, it also works to reduce the risk of heart diseases.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-18442ad087c" style="text-align: left;"><a href="https://www.webmd.com/vitamins/ai/ingredientmono-1126/berberine" target="_blank" class="tve-froala fr-basic" style="outline: none;">Berberine</a>:</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-18330520c74" style="text-align: left;">Berberine is an alkaloid found in a variety of plants, including Mahonia aquifolium (Oregon grape), Hydrastis canadensis (Goldenseal), and Coptis chinensis (Chinese goldthread). It has a long history of use in traditional Chinese
                            medicine and Indian Ayurvedic medicine for the treatment of a variety of conditions, including gastrointestinal disorders, infections, and liver disease.<br><br>It is a wonderful antioxidant and an anti-inflammatory ingredient
                            that helps your body remove toxins and function normally. It contains active compounds that can speed up the metabolism and also support your digestion. When combined with quercetin and other ingredients, its accuracy and efficiency
                            for burning fat are increased.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-17df7a5ac8e" style="text-align: left;"><a href="https://www.webmd.com/heart-disease/resveratrol-supplements" target="_blank" class="tve-froala fr-basic" style="outline: none;">Resveratrol:</a></p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-183305232c0" style="text-align: left;">Resveratrol is a bioactive compound produced by some plants in response to stresses such as UV radiation, extreme temperatures or pathogens. This compound has a variety of potential health benefits, including anti-inflammatory,
                            antioxidant and anticancer effects. Some studies have shown that resveratrol may help protect the brain from age-related damage and improve cognitive function. Additionally, this compound may also promote heart health by reducing
                            inflammation and improving blood vessel function.<br><br>In addition, it helps your body lose and burn stored fat over a long period of time, also known as visceral fat. It also promotes reduction in LDL cholesterol which is
                            the worst type of cholesterol in your body. By reducing plaque and toxin buildup in your arteries, it promotes the health of your heart and liver, as well as fights obesity and overweight problems.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df7aeaf7a"></div>
        <div class="tve-page-section-in tve_empty_dropzone">
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1080;">
                <div class="tcb-flex-row v-2 tcb--cols--2">
                    <div class="tcb-flex-col c-33">
                        <div class="tcb-col">
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7adf57e" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-242" alt="Ikaria juice" data-id="242" width="300" data-init-width="300" height="299" data-init-height="299" title="180-day-guarantee-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20300%20299\'%3E%3C/svg%3E" data-width="300" data-height="299" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/180-day-guarantee-min.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/180-day-guarantee-min-150x150.png.webp 150w" data-lazy-sizes="(max-width: 300px) 100vw, 300px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/180-day-guarantee-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-242" alt="Ikaria juice" data-id="242" width="300" data-init-width="300" height="299" data-init-height="299" title="180-day-guarantee-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/180-day-guarantee-min.png.webp" data-width="300" data-height="299" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/180-day-guarantee-min.png.webp 300w, https://ikaria-juice.net/wp-content/uploads/2022/11/180-day-guarantee-min-150x150.png.webp 150w" sizes="(max-width: 300px) 100vw, 300px" /></noscript></span></div>
                        </div>
                    </div>
                    <div class="tcb-flex-col c-66">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7b15cce" style="">
                                <p data-css="tve-u-17df7af8171" style="text-align: center;">180-DAYS 100% MONEY-BACK GUARANTEE</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic">
                                <p data-css="tve-u-17df7b06854" style="text-align: center;"><span style="color: rgb(255, 255, 255);" data-css="tve-u-184428f99d1"><a href="https://ikaria-juice.net/" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-184428ee2dc"><span data-css="tve-u-17df6d3a33d">Ikaria Juice</span></a>
                                    </span>
                                    will be available for you to test out for SIX months. You can apply for our FULL refund if you are among the 0.5% who are not satisfied.<br><br>Consider this a trial run in case things don\'t go your way. Ikaria Juice
                                    may work. If it doesn\'t, you can ask for your money back.</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7b17f20" style="">
                                <p data-css="tve-u-17df7b0e8a1" style="text-align: center;">Get your Ikaria Juice bottle and see for yourself.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df76ca56f">
                <p data-css="tve-u-17df76c8230" style="text-align: center;">How Much Weight Can You Lose with Ikaria Juice?</p>
            </div>
            <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7b39655" style="">
                <p data-css="tve-u-18442aa8192" style="text-align: left;">You can lose a significant amount of weight in a short period of time when taking Ikaria Juice.<br><br>Here are some of the weight loss testimonials shared on the official website: <a href="#tve-jump-18442aba8b7" class="tve-jump-scroll tve-froala fr-basic"
                        style="outline: none;"><strong>(Testimonials)</strong></a><br><br>One woman, Lauren, claims she lost 35lbs and looks and feels amazing after taking Ikaria Juice. Lauren claims her energy levels are through the roof and she no longer
                    feels stressed or anxious when venturing out in public.<br><br>One man, Zach, lost 26lbs when taking Ikaria Juice. Zach feels fitter and happier in his 40s than he did in his 30s, and his fat continues to melt off.<br><br>Another woman,
                    Cassie, claims to have dissolved 40lbs “in no time” while taking Ikaria Juice. Cassie lost 4 dress sizes in a short period – and she continues to lose weight.<br><br>In one sales page, the makers of Ikaria Juice describe their formula
                    as a “5-second exotic hack that melts 59lbs of fat”<br><br>The makers of Ikaria Juice claim to have developed the formula based on a “tropical loophole” that “dissolves fat overnight.” By taking Ikaria Juice daily, you can purportedly
                    lose a significant amount of weight in a short period of time.</p>
                <p data-css="tve-u-18442aa81a0" style="text-align: left;"><br></p>
                <p data-css="tve-u-17df7b35fe8" style="text-align: left;">Ikaria Juice is said to aid in weight loss by reducing inflammation and promoting healthy gut bacteria. The ikaria juice is rich in antioxidants and polyphenols, which are believed to help reduce inflammation and improve gut health. Additionally,
                    the juice contains green coffee bean extract, which has been shown to boost metabolism and promote weight loss.<br><br>Along with this, the extracts of all other herbs control the increased fat levels in every way. All these herbs
                    are not included as a whole but in the form of extracts and in certain quantities which makes it better than other products.</p>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df77c0518"></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-17df77db1ea">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df77e971a">
                <p data-css="tve-u-17df77ce45a" style="text-align: center;">Limited Time Special Pricing - Act Now!</p>
            </div>
            <div class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df77daf92" style="text-align: center;">Secure Your Reserved Ikaria Juice While Stocks Last</p>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone">
            <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1140;" data-css="tve-u-17df78e92a8">
                <div class="tcb-flex-row v-2 tcb--cols--3" data-css="tve-u-17df78f8557" style="">
                    <div class="tcb-flex-col" data-css="tve-u-181fb5729b9" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-18437993dd6">
                                <p data-css="tve-u-17df77fa6fe" style="text-align: center;">1 Bottle</p>
                            </div>
                            <div class="thrv_wrapper thrv_text_element">
                                <p data-css="tve-u-17df781b12a" style="text-align: center;">1 Month Supply</p>
                            </div>
                            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df789e173" style=""><span class="tve_image_frame" style=""><img decoding="async" class="tve_image wp-image-231" alt="Ikaria juice" data-id="231" width="359" data-init-width="622" height="232" data-init-height="401" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20359%20232\'%3E%3C/svg%3E" data-width="359" data-height="232" data-css="tve-u-1826d1ca79d" style="" mt-d="-0.09399999999999409" ml-d="-13.812999999999988" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp 622w, https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min-300x193.png.webp 300w" data-lazy-sizes="(max-width: 359px) 100vw, 359px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-231" alt="Ikaria juice" data-id="231" width="359" data-init-width="622" height="232" data-init-height="401" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp" data-width="359" data-height="232" data-css="tve-u-1826d1ca79d" style="" mt-d="-0.09399999999999409" ml-d="-13.812999999999988" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min.png.webp 622w, https://ikaria-juice.net/wp-content/uploads/2022/11/Ikaria-juice.net-removebg-preview-min-300x193.png.webp 300w" sizes="(max-width: 359px) 100vw, 359px" /></noscript></span></div>
                            <div
                                class="thrv_wrapper tve_image_caption" data-css="tve-u-17df783dc56" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-239" alt="Ikaria juice" data-id="239" width="220" data-init-width="712" height="64" data-init-height="208" title="59-Per-Bottle-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20220%2064\'%3E%3C/svg%3E" data-width="220" data-height="64" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min.png.webp 712w, https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min-300x88.png.webp 300w" data-lazy-sizes="(max-width: 220px) 100vw, 220px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-239" alt="Ikaria juice" data-id="239" width="220" data-init-width="712" height="64" data-init-height="208" title="59-Per-Bottle-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min.png.webp" data-width="220" data-height="64" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min.png.webp 712w, https://ikaria-juice.net/wp-content/uploads/2022/11/59-Per-Bottle-min-300x88.png.webp 300w" sizes="(max-width: 220px) 100vw, 220px" /></noscript></span></div>
                        <div
                            class="thrv_wrapper thrv_text_element">
                            <p data-css="tve-u-17df78521ef" style="text-align: center;">Total: <span data-css="tve-u-17df786674c" style="text-decoration: line-through;">$199</span> $59</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-17df785bae2" style="text-align: center;">You Save $140</p>
                    </div>
                    <div class="thrv_wrapper tve_image_caption" data-css="tve-u-182e9de2362" style=""><span class="tve_image_frame"><a href="https://ikaria-juice.net/recommends/order-now/" title="ORDER NOW" class="thirstylinkimg" rel="" target="" data-linkid="348" data-nojs="false"><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20346%20106\'%3E%3C/svg%3E" data-width="346" data-height="106" data-link-wrap="true" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" data-lazy-sizes="(max-width: 346px) 100vw, 346px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" data-width="346" data-height="106" data-link-wrap="true" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" sizes="(max-width: 346px) 100vw, 346px" /></noscript></a></span></div>
                </div>
            </div>
            <div class="tcb-flex-col" data-css="tve-u-1826d1cb37c" style="">
                <div class="tcb-col">
                    <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-18437994734">
                        <p data-css="tve-u-17df77fa6fe" style="text-align: center;">6 Bottle</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-17df781b12a" style="text-align: center;">6 Month Supply</p>
                    </div>
                    <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df782bd4f" style=""><span class="tve_image_frame" style=""><img decoding="async" class="tve_image wp-image-128" alt="ikaria Juice Official" data-id="128" width="363" data-init-width="431" height="205" data-init-height="244" title="ikaria-juice-bottle-6-1" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20363%20205\'%3E%3C/svg%3E" data-width="363" data-height="205" data-css="tve-u-1826d1d57dd" style="" ml-d="-6.8279999999999745" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1.png 431w, https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1-300x170.png 300w" data-lazy-sizes="(max-width: 363px) 100vw, 363px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1.png" /><noscript><img decoding="async" class="tve_image wp-image-128" alt="ikaria Juice Official" data-id="128" width="363" data-init-width="431" height="205" data-init-height="244" title="ikaria-juice-bottle-6-1" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1.png" data-width="363" data-height="205" data-css="tve-u-1826d1d57dd" style="" ml-d="-6.8279999999999745" srcset="https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1.png 431w, https://ikaria-juice.net/wp-content/uploads/2022/08/ikaria-juice-bottle-6-1-300x170.png 300w" sizes="(max-width: 363px) 100vw, 363px" /></noscript></span></div>
                    <div
                        class="thrv_wrapper tve_image_caption" data-css="tve-u-17df783dc56" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-237" alt="Ikaria juice" data-id="237" width="220" data-init-width="703" height="65" data-init-height="209" title="39-Per-Bottle (1)-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20220%2065\'%3E%3C/svg%3E" data-width="220" data-height="65" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min.png.webp 703w, https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min-300x89.png.webp 300w" data-lazy-sizes="(max-width: 220px) 100vw, 220px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-237" alt="Ikaria juice" data-id="237" width="220" data-init-width="703" height="65" data-init-height="209" title="39-Per-Bottle (1)-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min.png.webp" data-width="220" data-height="65" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min.png.webp 703w, https://ikaria-juice.net/wp-content/uploads/2022/11/39-Per-Bottle-1-min-300x89.png.webp 300w" sizes="(max-width: 220px) 100vw, 220px" /></noscript></span></div>
                <div
                    class="thrv_wrapper thrv_text_element">
                    <p data-css="tve-u-17df78521ef" style="text-align: center;">Total: <span data-css="tve-u-17df786674c" style="text-decoration: line-through;">$1194</span>&nbsp;$234</p>
            </div>
            <div class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df785bae2" style="text-align: center;">You Save $960</p>
            </div>
            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-18437464c97"><span class="tve_image_frame"><a href="https://ikaria-juice.net/recommends/order-now/" title="ORDER NOW" class="thirstylinkimg" rel="" target="" data-linkid="348" data-nojs="false"><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20346%20106\'%3E%3C/svg%3E" data-width="346" data-height="106" data-link-wrap="true" style="" data-css="tve-u-185805d3392" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" data-lazy-sizes="(max-width: 346px) 100vw, 346px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" data-width="346" data-height="106" data-link-wrap="true" style="" data-css="tve-u-185805d3392" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" sizes="(max-width: 346px) 100vw, 346px" /></noscript></a></span></div>
        </div>
    </div>
    <div class="tcb-flex-col">
        <div class="tcb-col">
            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df77ff17b">
                <p data-css="tve-u-17df77fa6fe" style="text-align: center;">3 Bottle</p>
            </div>
            <div class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df781b12a" style="text-align: center;">3 Month Supply</p>
            </div>
            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df78cf701" style=""><span class="tve_image_frame" style=""><img decoding="async" class="tve_image wp-image-224" alt="Ikaria juice" data-id="224" width="309" data-init-width="612" height="206" data-init-height="408" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20309%20206\'%3E%3C/svg%3E" data-width="309" data-height="206" data-css="tve-u-1826d1de54a" style="" mt-d="0" ml-d="-9" center-h-d="false" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp 612w, https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview-300x200.png.webp 300w" data-lazy-sizes="(max-width: 309px) 100vw, 309px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-224" alt="Ikaria juice" data-id="224" width="309" data-init-width="612" height="206" data-init-height="408" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp" data-width="309" data-height="206" data-css="tve-u-1826d1de54a" style="" mt-d="0" ml-d="-9" center-h-d="false" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp 612w, https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview-300x200.png.webp 300w" sizes="(max-width: 309px) 100vw, 309px" /></noscript></span></div>
            <div
                class="thrv_wrapper tve_image_caption" data-css="tve-u-17df783dc56" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-238" alt="Ikaria juice" data-id="238" width="220" data-init-width="702" height="64" data-init-height="205" title="49-Per-Bottle-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20220%2064\'%3E%3C/svg%3E" data-width="220" data-height="64" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min.png.webp 702w, https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min-300x88.png.webp 300w" data-lazy-sizes="(max-width: 220px) 100vw, 220px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-238" alt="Ikaria juice" data-id="238" width="220" data-init-width="702" height="64" data-init-height="205" title="49-Per-Bottle-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min.png.webp" data-width="220" data-height="64" mt-d="-1.5750000000000028" style="" data-css="tve-u-17df7848cce" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min.png.webp 702w, https://ikaria-juice.net/wp-content/uploads/2022/11/49-Per-Bottle-min-300x88.png.webp 300w" sizes="(max-width: 220px) 100vw, 220px" /></noscript></span></div>
        <div
            class="thrv_wrapper thrv_text_element">
            <p data-css="tve-u-17df78521ef" style="text-align: center;">Total: <span data-css="tve-u-17df786674c" style="text-decoration: line-through;">$567</span>&nbsp;$147</p>
    </div>
    <div class="thrv_wrapper thrv_text_element">
        <p data-css="tve-u-17df785bae2" style="text-align: center;">You Save $450</p>
    </div>
    <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7870511"><span class="tve_image_frame"><a href="https://ikaria-juice.net/recommends/order-now/" title="ORDER NOW" class="thirstylinkimg" rel="" target="" data-linkid="348" data-nojs="false"><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20346%20106\'%3E%3C/svg%3E" data-width="346" data-height="106" data-link-wrap="true" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" data-lazy-sizes="(max-width: 346px) 100vw, 346px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-240" alt="Ikaria juice" data-id="240" width="346" data-init-width="540" height="106" data-init-height="166" title="Order-Now-2-min" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp" data-width="346" data-height="106" data-link-wrap="true" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min.png.webp 540w, https://ikaria-juice.net/wp-content/uploads/2022/11/Order-Now-2-min-300x92.png.webp 300w" sizes="(max-width: 346px) 100vw, 346px" /></noscript></a></span></div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div data-inherit-lp-settings="1" data-match-lp-colors="1" class="thrv_wrapper thrv-page-section thrv-lp-block tcb-local-vars-root" data-css="tve-u-17df7b687ca" style="" tcb-template-name="Pattern Interrupt 02" tcb-template-id="59628" data-keep-css_id="1">
        <div class="thrive-group-edit-config" style="display: none !important"></div>
        <div class="thrive-local-colors-config" style="display: none !important"></div>
        <div class="tve-page-section-out" data-css="tve-u-17df7b687b3" style=""></div>
        <div class="tve-page-section-in   tve_empty_dropzone" data-css="tve-u-17df7b687b5" style="">
            <div class="thrv_wrapper thrv-columns" data-css="tve-u-17df7b687b7" style="--tcb-col-el-width:1080;">
                <div class="tcb-flex-row v-2 tcb--cols--2 tcb-resized tcb-mobile-no-wrap m-edit" data-css="tve-u-17df7b687b9" style="">
                    <div class="tcb-flex-col" data-css="tve-u-17df7b687bb" style="">
                        <div class="tcb-col">
                            <div class="tcb-clear" data-css="tve-u-17df7b687bc">
                                <div class="thrv_wrapper thrv_icon tcb-icon-display" data-css="tve-u-17df7b687be" style=""><svg class="tcb-icon" viewBox="0 0 448 512" data-id="icon-long-arrow-right-light" data-name="" style="">
            <path d="M311.03 131.515l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887l-83.928 83.444c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l116.485-116c4.686-4.686 4.686-12.284 0-16.971L328 131.515c-4.686-4.687-12.284-4.687-16.97 0z"></path>
        </svg></div>
                            </div>
                        </div>
                    </div>
                    <div class="tcb-flex-col" data-css="tve-u-17df7b687c0" style="">
                        <div class="tcb-col">
                            <div class="thrv_wrapper thrv_text_element" style="" data-css="tve-u-17df7b687c2">
                                <h3 class="" style="text-align: left;" data-css="tve-u-1879ed79579"><b>WARNING July-2022:</b> Stock levels of Ikaria Juice are limited Accept your reserved bottle above <b>NOW</b> before your discount expires.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section thrv-lp-block" data-inherit-lp-settings="1" data-css="tve-u-18442b6468b" style="" tcb-template-name="Pros &amp;#038; Cons 06" tcb-template-id="60998" data-keep-css_id="1">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone  ">
            <div class="thrv_wrapper thrv_text_element" data-css="tve-u-18442b6468c" style="">
                <h2 class="" data-css="tve-u-18442b6468d" style="">Ikaria Juice Pros &amp; Cons</h2>
            </div>
            <div class="thrv_wrapper thrv_text_element" style="padding-bottom: 11px !important;" data-css="tve-u-1879ed75e9e">
                <p style="text-align: center;" data-css="tve-u-18442be6242"><strong>There are several potential pros and cons of consuming Ikaria Juice for weight loss, including:</strong></p>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-18442b6468e" style="">
                <div class="tve-content-box-background" style="" data-css="tve-u-18442b6468f"></div>
                <div class="tve-cb">
                    <div class="tcb-clear" data-css="tve-u-18442b64690">
                        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-18442b64691" style="">
                            <p data-css="tve-u-18442b64692" style="">Pros</p>
                        </div>
                    </div>
                    <div class="thrv_wrapper thrv-styled_list dynamic-group-kbuni4s8" data-icon-code="icon-check-light" data-css="tve-u-18442b64693" style="">
                        <ul class="tcb-styled-list" style="">
                            <li class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                <div class="tcb-styled-list-icon">
                                    <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-kbunh89u" data-css="tve-u-18442b64695" style=""><svg class="tcb-icon" viewBox="0 0 448 512" data-id="icon-check-light" data-name="" style="">
            <path d="M413.505 91.951L133.49 371.966l-98.995-98.995c-4.686-4.686-12.284-4.686-16.971 0L6.211 284.284c-4.686 4.686-4.686 12.284 0 16.971l118.794 118.794c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-11.314-11.314c-4.686-4.686-12.284-4.686-16.97 0z"></path>
        </svg></div>
                                </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5" data-css="tve-u-18442b64696" style="">1. It can help boost metabolism and promote fat burning.</span></li>
                            <li
                                class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                <div class="tcb-styled-list-icon">
                                    <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-kbunh89u" data-css="tve-u-18442b64695" style=""><svg class="tcb-icon" viewBox="0 0 448 512" data-id="icon-check-light" data-name="" style="">
            <path d="M413.505 91.951L133.49 371.966l-98.995-98.995c-4.686-4.686-12.284-4.686-16.971 0L6.211 284.284c-4.686 4.686-4.686 12.284 0 16.971l118.794 118.794c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-11.314-11.314c-4.686-4.686-12.284-4.686-16.97 0z"></path>
        </svg></div>
                                </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5" data-css="tve-u-18442b64696" style="">2. It contains antioxidants and other nutrients that may support overall health.</span></li>
                                <li
                                    class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                    <div class="tcb-styled-list-icon">
                                        <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-kbunh89u" data-css="tve-u-18442b64695" style=""><svg class="tcb-icon" viewBox="0 0 448 512" data-id="icon-check-light" data-name="" style="">
            <path d="M413.505 91.951L133.49 371.966l-98.995-98.995c-4.686-4.686-12.284-4.686-16.971 0L6.211 284.284c-4.686 4.686-4.686 12.284 0 16.971l118.794 118.794c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-11.314-11.314c-4.686-4.686-12.284-4.686-16.97 0z"></path>
        </svg></div>
                                    </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5" data-css="tve-u-18442b64696" style="">3. It is low in calories and sugar, making it a good option for those trying to lose weight.</span></li>
                                    <li
                                        class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                        <div class="tcb-styled-list-icon">
                                            <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-kbunh89u" data-css="tve-u-18442b64695" style=""><svg class="tcb-icon" viewBox="0 0 448 512" data-id="icon-check-light" data-name="" style="">
            <path d="M413.505 91.951L133.49 371.966l-98.995-98.995c-4.686-4.686-12.284-4.686-16.971 0L6.211 284.284c-4.686 4.686-4.686 12.284 0 16.971l118.794 118.794c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-11.314-11.314c-4.686-4.686-12.284-4.686-16.97 0z"></path>
        </svg></div>
                                        </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5" data-css="tve-u-18442b64696" style="">4. It can have a pleasant taste that some people enjoy.<br></span></li>
                                        <li
                                            class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                            <div class="tcb-styled-list-icon">
                                                <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style dynamic-group-kbunh89u" data-css="tve-u-18442b8f1fd"><svg class="tcb-icon" viewBox="0 0 448 512" data-id="icon-check-light" data-name=""><path d="M413.505 91.951L133.49 371.966l-98.995-98.995c-4.686-4.686-12.284-4.686-16.971 0L6.211 284.284c-4.686 4.686-4.686 12.284 0 16.971l118.794 118.794c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-11.314-11.314c-4.686-4.686-12.284-4.686-16.97 0z"></path></svg></div>
                                            </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5" data-css="tve-u-18442b64696" style="">5. It has all the herbal extracts mixed with their proper amount which makes it the best weight loss product.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-18442b64698" style="">
                <div class="tve-content-box-background" style="" data-css="tve-u-18442b64699"></div>
                <div class="tve-cb">
                    <div class="tcb-clear" data-css="tve-u-18442b64690">
                        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-18442b6469a" style="">
                            <p data-css="tve-u-18442b6469b" style="">Cons</p>
                        </div>
                    </div>
                    <div class="thrv_wrapper thrv-styled_list dynamic-group-kbuni4s8" data-icon-code="icon-minus-light" data-css="tve-u-18442b64693" style="">
                        <ul class="tcb-styled-list" style="">
                            <li class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                <div class="tcb-styled-list-icon">
                                    <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-kbunh89u" data-css="tve-u-18442b64695" style=""><svg class="tcb-icon" viewBox="0 0 384 512" data-id="icon-minus-light" data-name="" style="">
            <path d="M376 232H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h368c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path>
        </svg></div>
                                </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5" data-css="tve-u-18442b64696" style="">1. Some people may not like its taste.</span></li>
                            <li
                                class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                <div class="tcb-styled-list-icon">
                                    <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-kbunh89u" data-css="tve-u-18442b64695" style=""><svg class="tcb-icon" viewBox="0 0 384 512" data-id="icon-minus-light" data-name="" style="">
            <path d="M376 232H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h368c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path>
        </svg></div>
                                </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5" data-css="tve-u-18442b64696" style="">2. It contains caffeine, which can cause side effects such as anxiety or insomnia in some people.</span></li>
                                <li
                                    class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                    <div class="tcb-styled-list-icon">
                                        <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-kbunh89u" data-css="tve-u-18442b64695" style=""><svg class="tcb-icon" viewBox="0 0 384 512" data-id="icon-minus-light" data-name="" style="">
            <path d="M376 232H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h368c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path>
        </svg></div>
                                    </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5" data-css="tve-u-18442b64696" style="">3. Pregnant and lactating women should not consume it.</span></li>
                                    <li
                                        class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                        <div class="tcb-styled-list-icon">
                                            <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-kbunh89u" data-css="tve-u-18442b64695" style=""><svg class="tcb-icon" viewBox="0 0 384 512" data-id="icon-minus-light" data-name="" style="">
            <path d="M376 232H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h368c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path>
        </svg></div>
                                        </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5 tve-froala fr-box fr-basic" data-css="tve-u-18442b64696" style="">4. It can be ordered only from the official website which is given here - <a href="https://6f753vp06k4pble7l523f-cz01.hop.clickbank.net" class="tve-froala fr-basic" style="outline: none;"><strong>Click Here</strong></a></span></li>
                                        <li
                                            class="thrv-styled-list-item dynamic-group-kbunhrxl" data-css="tve-u-18442b64694" style="">
                                            <div class="tcb-styled-list-icon">
                                                <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style dynamic-group-kbunh89u" data-css="tve-u-18442b9c3a5"><svg class="tcb-icon" viewBox="0 0 384 512" data-id="icon-minus-light" data-name="" style="">
            <path d="M376 232H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h368c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path>
        </svg></div>
                                            </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-kbunhix5" data-css="tve-u-18442b64696" style="">5. The patient suffering from heart and serious disease has to consume it only on the advice of the doctor.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-18442b6469c" style="">
                <div class="tve-content-box-background" style="" data-css="tve-u-18442b6469d"></div>
                <div class="tve-cb">
                    <div class="tcb-clear" data-css="tve-u-18442b64690">
                        <div class="thrv_wrapper thrv_text_element" data-css="tve-u-18442b6469e" style="">
                            <p data-css="tve-u-18442b6469f" style="">ConClusion</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_text_element">
                <p style="" data-css="tve-u-18442c2204b">In conclusion, the Ikaria lean belly juice is a great weight loss tool that can help you lose weight quickly and effectively. However, it is important to remember that this juice is not a miracle cure-all and you will still need to make
                    healthy lifestyle choices in order to maintain your weight loss. Drink the juice regularly, watch your portion sizes, and make sure to get plenty of exercise, and you will be on your way to reaching your weight loss goals!</p>
            </div>
        </div>
        <div class="thrive-group-edit-config" style="display: none !important"></div>
        <div class="thrive-local-colors-config" style="display: none !important"></div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1" data-css="tve-u-17df7ac70bf" style="">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in tve_empty_dropzone">
            <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" style="" data-css="tve-u-17df7b816f1">
                <p style="text-align: center;" data-css="tve-u-17df7b8989b"><a href="https://ikaria-juice.net/ikaria-lean-belly-juice-ingredients/" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-1826d40760c"><strong><span data-css="tve-u-1833053b042" style="">Ikaria Juice</span></strong></a>                    Frequently Asked Questions</p>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-182a21ffe33" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a64a7c">
                        <p data-css="tve-u-17df7a5ac8e" style="text-align: left;">What is Ikaria Juice?</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element">
                        <p dir="ltr" data-css="tve-u-18330224529" style=""><span data-css="tve-u-182a21cfe9b">It is a superfood in which many ingredients are mixed, which is very effective in reducing weight. Its special thing is that all the ingredients used in it are natural, which makes it the best. It is also certified by higher bodies like FDA and GMC. This juice is rich in antioxidants and helps to improve overall health. Some of the health benefits of Ikaria juice include:</span></p>
                        <p
                            dir="ltr" data-css="tve-u-1833022452b" style=""><span data-css="tve-u-1879ed4d04a"><span data-css="tve-u-1879ed4d04c"><span data-css="tve-u-182a22e1160">1. Boosting the immune system: The antioxidants present in Ikaria juice help to boost the immune system.</span></span>
                            </span>
                            </p>
                            <p dir="ltr" data-css="tve-u-1833022452d" style=""><span data-css="tve-u-1879ed4d04f"><span data-css="tve-u-1879ed4d051"><span data-css="tve-u-182a22e1164">2. Improving digestion: Ikaria juice can help to improve digestion and prevent constipation.</span></span>
                                </span>
                            </p>
                            <p dir="ltr" data-css="tve-u-1833022452e" style=""><span data-css="tve-u-1879ed4d055"><span data-css="tve-u-1879ed4d056"><span data-css="tve-u-182a22e1166">3. Reducing inflammation: The anti-inflammatory properties of this juice can help to reduce inflammation throughout the body.</span></span>
                                </span>
                            </p>
                            <p dir="ltr" data-css="tve-u-18330224530" style=""><span data-css="tve-u-182a21cfea9">4. Enhancing brain function: The nutrients present in Ikaria juice can help to enhance brain function and improve cognitive performance.</span></p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-182a221c964" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element">
                        <p style="" data-css="tve-u-182a22627b3">Will Ikaria Juice work for me?&nbsp;</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a64a7c">
                        <p dir="ltr" data-css="tve-u-18330222dad" style=""><span data-css="tve-u-182a221969a">The </span><a href="https://ikariajuice.beauty" target="_blank" class="tve-froala fr-basic" style="outline: none;"><span data-css="tve-u-182a221969a">Ikaria Juice</span></a><span data-css="tve-u-182a221969a"> is demonstrated to help solid weight reduction, keep up with sound processing and energy levels.&nbsp;</span>
                            <span
                                data-css="tve-u-182a22196a0">A strong and extraordinary mix is helping a large number of people in various nations.&nbsp;</span><span data-css="tve-u-182a22196a4">It has no effect in the event that you\'re a man or a lady, assuming you\'re 60 or 30 years old. You can come by amazing outcomes by&nbsp;</span>
                                <span
                                    data-css="tve-u-18330535c6f">taking the Ikaria Lean Belly Juice everyday, in a perfect world for 3 to a half year.</span>
                        </p>
                        <p dir="ltr" data-css="tve-u-18330222daf" style=""><br></p>
                        <p dir="ltr" data-css="tve-u-18330222db1" style=""><span data-css="tve-u-182a22196a9">You could see the distinction in a couple of brief days or in seven days.&nbsp;</span><span data-css="tve-u-182a22196ab">Perhaps it\'ll require a little while to see the great outcomes you long for by taking the Ikaria Lean Belly Juice each&nbsp;</span>
                            <span
                                data-css="tve-u-182a22196af">day.&nbsp;</span><span data-css="tve-u-182a22196b2">One way or another, we accept you\'ll encounter extraordinary outcomes from the equation, because of its novel mix of strong&nbsp;</span><span data-css="tve-u-182a22196b4">supplements.</span></p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-182a22875f1" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-182a22772ff" style=""><span data-css="tve-u-1879ed47b0b">What if Ikaria juice doesn\'t work for me?</span></p>
                        <p dir="ltr" data-css="tve-u-18330221a89" style=""><span data-css="tve-u-1879ed48b31"><span data-css="tve-u-1879ed48b32"><span data-css="tve-u-1879ed47b0d"><span data-css="tve-u-182a22a7daa">We\'re exceptionally sure that you\'ll benefit from the lkaria Lean Belly Juice.&nbsp;In any case, if the lkaria Lean Belly Juice is not exactly fulfilling for you, go ahead and reach us straightforwardly to demand a brief discount your buy. Results fluctuate for each man or lady. It might take you longer to see the beneficial outcomes. Or on the other hand it could be quick.]</span></span>
                            </span>
                            </span>
                        </p>
                        <p dir="ltr" data-css="tve-u-18330221a8b" style=""><span data-css="tve-u-1879ed48b34"><span data-css="tve-u-1879ed48b35"><span data-css="tve-u-1879ed47b11"><br></span></span>
                            </span>
                        </p>
                        <p dir="ltr" data-css="tve-u-18330221a8d" style=""><span data-css="tve-u-182a2280218">Regardless of whether the Ikaria Lean Belly Juice obtains astounding outcomes for some individuals, we know that no enhancement or prescription has a 100 percent achievement rate. That is the reason you\'re covered by our 180-day cash back fulfilment.</span></p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-182a582fff5" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-182a581a52f" style=""><span data-css="tve-u-182a58342f8">Can I take any other medicine with Ikaria Juice?</span></p>
                        <p dir="ltr" data-css="tve-u-1833021fc10" style=""><span data-css="tve-u-1879ed51d1b"><span data-css="tve-u-1879ed51d1c"><span data-css="tve-u-182a58342fb">Might I at any point take some other medication with Ikaria Juice?</span></span>
                            </span>
                        </p>
                        <p dir="ltr" data-css="tve-u-1833021fc12" style=""><span data-css="tve-u-1879ed51d20"><span data-css="tve-u-1879ed51d21"><span data-css="tve-u-182a58342fd">Ikaria Juice is a characteristic and successful method for working on your wellbeing. Be that as it may, might you at any point take different drugs with it? Ikaria Juice</span></span>
                            </span>
                        </p>
                        <p dir="ltr" data-css="tve-u-1833021fc13" style=""><span data-css="tve-u-1879ed51d25"><span data-css="tve-u-1879ed51d26"><span data-css="tve-u-182a58342fe"><br></span></span>
                            </span>
                        </p>
                        <p dir="ltr" data-css="tve-u-1833021fc15" style=""><span data-css="tve-u-1879ed51d2a"><span data-css="tve-u-1879ed51d2b"><span data-css="tve-u-182a5834300">Indeed, you can take different drugs with Ikaria Juice. Nonetheless, you ought to continuously talk with your medical care supplier prior to taking any new drugs, including Ikaria Juice. This is on the grounds that there is a potential for collaborations between drugs.</span></span>
                            </span>
                        </p>
                        <p dir="ltr" data-css="tve-u-1833021fc16" style=""><span data-css="tve-u-1879ed51d2f"><span data-css="tve-u-1879ed51d30"><span data-css="tve-u-182a5834301"><br></span></span>
                            </span>
                        </p>
                        <p dir="ltr" data-css="tve-u-1833021ca14" style=""><span data-css="tve-u-1879ed51d36"><span data-css="tve-u-1879ed51d38"><span data-css="tve-u-182a5834303">Ikaria Juice is protected to take with most drugs. Notwithstanding, there are a couple of exemptions. In the event that you are taking blood thinners or a heart prescription, you ought to talk with your medical services supplier prior to taking Ikaria juice. This is on the grounds that the juice can connect with these meds and cause serious incidental effects.</span></span>
                            </span>
                        </p>
                        <p dir="ltr" data-css="tve-u-1833021fc1a" style=""><span data-css="tve-u-182a5834305">Continuously talk with your medical care supplier prior to taking any new prescriptions, including Ikaria Juice.</span></p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-1879ed6bf97" style="text-align: left;">How Many Bottle Should I Order?</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-1833021bef7" style="text-align: left;"><a href="https://ikaria-juice.co.uk" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-1879edda8c5">Ikaria Juice</a> is best used for at least 3 to 6 months to achieve the best results. This will
                            ensure you reach your goals. Ikaria Juice can be purchased monthly, but we recommend you buy 3 to 6 Bottle of Ikaria Juice as we offer discounts and that\'s the minimum amount you need to see results. You should note that this
                            discount is not available year-round. So take advantage of it while you can. Ikaria Juice</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-1879ed69d79" style="text-align: left;">How Many Bottle Should I Order?</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-1833021b306" style="text-align: left;">Ikaria Juice is best used for at least 3 to 6 months to achieve the best results. This will ensure you reach your goals. Ikaria Juice can be purchased monthly, but we recommend you buy 3 to 6 Bottle of Ikaria Juice as we offer
                            discounts and that\'s the minimum amount you need to see results. You should note that this discount is not available year-round. So take advantage of it while you can.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-17df7a5ac8e" style="text-align: left;">Is Ikaria Juice Safe?</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7a61a94">
                        <p data-css="tve-u-1833021a599" style="">Ikaria Juice contains 100% natural and safe ingredients. It is therefore completely safe, effective, and natural. <a href="https://ikaria-juice.info" class="tve-froala fr-basic" style="outline: none;" target="_blank">Ikaria Juice</a>                            is used daily by thousands of people. There have been no reported side effects. Ikaria Juice are made in the USA at our FDA-approved, GMP-certified facility. We adhere to the highest standards. It is 100% natural, vegetarian,
                            and non-GMO. Before using, consult your doctor if you have any medical conditions.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-1879ed5a395" style="text-align: left;">How Will Ikaria Juice Be Shipped To Me And How Quickly?</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-183302191c4" style="text-align: left;">You can expect your order to be shipped within 5-7 business day if you live in the United States of America or Canada. Orders from outside the USA or Canada typically take between 8-15 business days (+ customs clearance). Delivery
                            times may be affected by the Covid-19 pandemic. We will deliver your order to your office or home using a premium carrier like FedEx or UPS. Ikaria Juice</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-1879ed5ce7e" style="text-align: left;">Is Ikaria Juice Aproved By The FDA?</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-18330216701" style="text-align: left;">Ikaria Juice is manufactured in the USA by our FDA-approved, GMP-certified facility. We adhere to the highest standards.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-17df7a6df66" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a64a7c" style="">
                        <p data-css="tve-u-1879ed670a2" style="text-align: left;">How can I buy Ikaria Juice Supplement?</p>
                    </div>
                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-17df7a61a94" style="">
                        <p data-css="tve-u-183302181ff" style="text-align: left;">Ikaria Juice is available through Ikaria-Juice.net For a limited time, they offer three discounted packages: Basic bottle - $69 Per Bottle.</p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-182a58a55db" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-1879ed6496d" style="">Refund Policy</p>
                        <p data-css="tve-u-182a587f92b" style=""><span data-css="tve-u-183305454e3">Ikaria Juice offers a full refund for any unopened products returned within 180 days of the date of purchase. For products that are opened and/or used, we offer a partial refund, less the shipping cost. If you are not satisfied with your purchase, please contact us at&nbsp;</span>info@ikariajuice.com
                            <span
                                data-css="tve-u-182a587f960"> to initiate a return.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in">
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-182a5c914cb" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-182a5c81d10" style=""><strong><span data-css="tve-u-182a5c8fdf9">Does your product require multiple payment?</span></strong></p>
                        <p data-css="tve-u-182a5c886be" style=""><span data-css="tve-u-182a5c8fdfb">No way. All you have to do is make a one-time payment to buy Ikaria Juice. After this you will not be charged any kind of fee in future.</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out"></div>
        <div class="tve-page-section-in">
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-182a5ca68dc" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-182a5c97d7d" style=""><strong><span data-css="tve-u-182a5ca44fe">How secure are this page and my credit card information?</span></strong></p>
                        <p data-css="tve-u-182a5c9fd32" style=""><span data-css="tve-u-182a5ca4500">Our website is highly secure . We are using SSL technology to keep your information 100% safe.</span></p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-183302120fb" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element">
                        <p data-css="tve-u-182a5cf74d9" style=""><strong><span data-css="tve-u-1833054865d">How will I identify my transition in my bank statement?</span></strong></p>
                        <p data-css="tve-u-182a5cfcfc6" style=""><span data-css="tve-u-18330548630">Your buy will show up on your bank explanation under the name of <strong>"CLKBANK*"</strong>. We care about the secrecy of your buy thus we won\'t ever uncover to anybody the substance of your request, so the enhancement name won\'t be referenced elsewhere other than the conveyed bundle. Ikaria Juice</span></p>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad">
                <div class="tve-content-box-background" data-css="tve-u-182a2319da8" style=""></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic">
                        <p data-css="tve-u-182a22efa17" style="">Customers Support</p>
                        <p dir="ltr" data-css="tve-u-182a588f6f3" style=""><span style="" data-css="tve-u-182a2301052">If you have any kind of problem related to Ikaria Juice, then you can contact us on the Gmail given below. Our entire team is ready 24*7 to serve all of you customers.</span></p>
                        <span
                            data-css="tve-u-182a2301056" style="color: rgb(0, 0, 0);" class=""><span data-css="tve-u-182a230c583" style="font-size: 18px;"><span data-css="tve-u-182a2323aac" style="font-family: Poppins;">Connect Product Team</span><span data-css="tve-u-182a230573f" style="font-family: Poppins; font-weight: 400;">:- </span></span>
                            <a
                                href="mailto:support@leanbellyjuice.com" class="tve-froala fr-basic" style="outline: none;"><span style="font-family: Poppins; font-weight: 400; font-size: 18px;" data-css="tve-u-182a2305741">support@leanbellyjuice.com</span></a>
                                </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section thrv-lp-block tcb-local-vars-root" data-inherit-lp-settings="1" data-css="tve-u-1833572276f" data-match-lp-colors="1" tcb-template-name="Benefits Area Block 09" tcb-template-id="54506" data-keep-css_id="1">
        <div class="thrive-group-edit-config" style="display: none !important"></div>
        <div class="thrive-local-colors-config" style="display: none !important"></div>
        <div class="tve-page-section-out" data-css="tve-u-18335722770" style=""></div>
        <div class="tve-page-section-in   tve_empty_dropzone" data-css="tve-u-18335722771">
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-18335722772">
                <div class="tve-content-box-background"></div>
                <div class="tve-cb" data-css="tve-u-18335722774">
                    <div class="thrv_wrapper thrv-columns" data-css="tve-u-18335722775">
                        <div class="tcb-flex-row v-2 tcb--cols--1" data-css="tve-u-18335722776">
                            <div class="tcb-flex-col" data-css="tve-u-18335722777" style="">
                                <div class="tcb-col">
                                    <div class="thrv_wrapper thrv_text_element" data-css="tve-u-18335722778" style="">
                                        <h2 class="" data-css="tve-u-18335722779" style="">Related Searches by Costumers</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-1833572277d" style="">
                        <div class="tve-content-box-background" data-css="tve-u-1833572277e"></div>
                        <div class="tve-cb" data-css="tve-u-1833572277f" style="">
                            <div class="thrv_wrapper thrv-columns dynamic-group-k2ncwxde" data-css="tve-u-18335722781" style="">
                                <div class="tcb-flex-row tcb--cols--3 v-2 tcb-mobile-wrap m-edit tcb-medium-no-wrap" data-css="tve-u-18335722782">
                                    <div class="tcb-flex-col">
                                        <div class="tcb-col dynamic-group-k2ncwus2" data-css="tve-u-18336135aed">
                                            <div class="thrv_wrapper thrv-styled_list dynamic-group-k2ncwq54" data-icon-code="icon-server-solid" data-css="tve-u-18335722783" style="">
                                                <ul class="tcb-styled-list" style="">
                                                    <li class="thrv-styled-list-item dynamic-group-k2ncwism" data-css="tve-u-18335722784" style="">
                                                        <div class="tcb-styled-list-icon">
                                                            <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-k2ncjzf0 tcb-local-vars-root" data-css="tve-u-18335756200"
                                                                style="" data-style-d=""><svg class="tcb-icon" viewBox="0 0 512 512" data-id="icon-circle-solid" data-name=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg></div>
                                                        </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-k2nck6po tve-froala fr-box fr-basic" data-css="tve-u-18335722786" style=""><div style="text-align: left;"><a class="tve-froala fr-basic" href="https://ikaria-juice.net/" style="outline: none;" target="_blank" data-css="tve-u-183360cc09d"><strong>Ikaria Juice Official</strong></a></div></span></li>
                                                    <li
                                                        class="thrv-styled-list-item dynamic-group-k2ncwism" data-css="tve-u-18335722784" style="">
                                                        <div class="tcb-styled-list-icon">
                                                            <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style dynamic-group-k2ncjzf0 tcb-icon-display" data-css="tve-u-1833600bdea" style="" data-style-d=""><svg class="tcb-icon" viewBox="0 0 512 512" data-id="icon-circle-solid" data-name=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg></div>
                                                        </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-k2nck6po tve-froala fr-box fr-basic" data-css="tve-u-18335722786" style=""><a href="https://ignites-drops.us/" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-183360e1756"><strong>Related Product</strong></a></span></li>
                                                        <li
                                                            class="thrv-styled-list-item dynamic-group-k2ncwism" data-css="tve-u-18335722784" style="">
                                                            <div class="tcb-styled-list-icon">
                                                                <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style dynamic-group-k2ncjzf0 tcb-icon-display" data-css="tve-u-1833604ee5e" style="" data-style-d=""><svg class="tcb-icon" viewBox="0 0 512 512" data-id="icon-circle-solid" data-name=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg></div>
                                                            </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-k2nck6po tve-froala fr-box fr-basic" data-css="tve-u-18335722786" style=""><a href="https://ikaria-juice.net/" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-183360fed1a"><strong>ikaria juice buy</strong></a></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tcb-flex-col">
                                        <div class="tcb-col dynamic-group-k2ncwus2" data-css="tve-u-18336135aed">
                                            <div class="thrv_wrapper thrv-styled_list dynamic-group-k2ncwq54" data-icon-code="icon-briefcase-solid" data-css="tve-u-1833572278b">
                                                <ul class="tcb-styled-list" style="">
                                                    <li class="thrv-styled-list-item dynamic-group-k2ncwism" data-css="tve-u-18335722784" style="">
                                                        <div class="tcb-styled-list-icon">
                                                            <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style tcb-icon-display dynamic-group-k2ncjzf0 tcb-local-vars-root" data-css="tve-u-18335722785"
                                                                style="" data-style-d=""><svg class="tcb-icon" viewBox="0 0 512 512" data-id="icon-circle-solid" data-name=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg></div>
                                                        </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-k2nck6po tve-froala fr-box fr-basic" data-css="tve-u-1833572278c" style=""><div style="text-align: left;"><a class="tve-froala fr-basic" href="https://ikaria-juice.net/" style="outline: none;" target="_blank" data-css="tve-u-183360cfa1e"><strong>Ikaria juice Ingridents</strong></a></div></span></li>
                                                    <li
                                                        class="thrv-styled-list-item dynamic-group-k2ncwism" data-css="tve-u-18335722784" style="">
                                                        <div class="tcb-styled-list-icon">
                                                            <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style dynamic-group-k2ncjzf0 tcb-icon-display" data-css="tve-u-18336066cc2" style="" data-style-d=""><svg class="tcb-icon" viewBox="0 0 512 512" data-id="icon-circle-solid" data-name=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg></div>
                                                        </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-k2nck6po tve-froala fr-box fr-basic" data-css="tve-u-1833572278c" style=""><a href="https://www.outlookindia.com/outlook-spotlight/where-to-buy-prodentim-prodentim-official-website--news-222234" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-183360e41e3"><strong>Ikaria juice updates</strong></a></span></li>
                                                        <li
                                                            class="thrv-styled-list-item dynamic-group-k2ncwism" data-css="tve-u-18335722784" style="">
                                                            <div class="tcb-styled-list-icon">
                                                                <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style dynamic-group-k2ncjzf0 tcb-icon-display" data-css="tve-u-1833605fff1" style="" data-style-d=""><svg class="tcb-icon" viewBox="0 0 512 512" data-id="icon-circle-solid" data-name=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg></div>
                                                            </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-k2nck6po tve-froala fr-box fr-basic" data-css="tve-u-1833572278c" style=""><a href="https://ikaria-juice.net/" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-18336111679"><strong>ikaria juice canada official</strong></a></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tcb-flex-col" data-css="tve-u-18336135b22" style="">
                                        <div class="tcb-col dynamic-group-k2ncwus2" data-css="tve-u-18336135aed">
                                            <div class="thrv_wrapper thrv-styled_list dynamic-group-k2ncwq54" data-icon-code="icon-gem-solid" data-css="tve-u-1833572278f">
                                                <ul class="tcb-styled-list" style="">
                                                    <li class="thrv-styled-list-item dynamic-group-k2ncwism" data-css="tve-u-18335722784" style="">
                                                        <div class="tcb-styled-list-icon">
                                                            <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style dynamic-group-k2ncjzf0 tcb-local-vars-root tcb-icon-display" data-css="tve-u-1833608aab1"
                                                                style="" data-style-d=""><svg class="tcb-icon" viewBox="0 0 512 512" data-id="icon-circle-solid" data-name=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg></div>
                                                        </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-k2nck6po tve-froala fr-box fr-basic" data-css="tve-u-18335722790" style=""><div style="text-align: left;"><a class="tve-froala fr-basic" href="https://ikaria-juice.net/reality-of-ikaria-lean-belly-juice-for-weight-loss/" style="outline: none;" target="_blank" data-css="tve-u-183360de5e4"><strong>Ikaria Juice Review</strong></a></div></span></li>
                                                    <li
                                                        class="thrv-styled-list-item dynamic-group-k2ncwism" data-css="tve-u-18335722784" style="">
                                                        <div class="tcb-styled-list-icon">
                                                            <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style dynamic-group-k2ncjzf0 tcb-icon-display" data-css="tve-u-183360b4ceb"><svg class="tcb-icon" viewBox="0 0 512 512" data-id="icon-circle-solid" data-name=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg></div>
                                                        </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-k2nck6po tve-froala fr-box fr-basic" data-css="tve-u-18335722790" style=""><a href="https://ikaria-juice.net/" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-183360e6bfb"><strong>Ikaria juice offers</strong></a></span></li>
                                                        <li
                                                            class="thrv-styled-list-item dynamic-group-k2ncwism" data-css="tve-u-18335722784" style="">
                                                            <div class="tcb-styled-list-icon">
                                                                <div class="thrv_wrapper thrv_icon tve_no_drag tcb-no-delete tcb-no-clone tcb-no-save tcb-icon-inherit-style dynamic-group-k2ncjzf0 tcb-icon-display" data-css="tve-u-183360bd407"><svg class="tcb-icon" viewBox="0 0 512 512" data-id="icon-circle-solid" data-name=""><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg></div>
                                                            </div><span class="thrv-advanced-inline-text tve_editable tcb-styled-list-icon-text tcb-no-delete tcb-no-save dynamic-group-k2nck6po tve-froala fr-box fr-basic" data-css="tve-u-18335722790" style=""><a href="mailto:support@leanbellyjuice.com" target="_blank" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-18336158eaf"><strong>Ikaria juice customer support</strong></a></span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1" style="" data-css="tve-u-17df7c27651">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df7bd281d"></div>
        <div class="tve-page-section-in tve_empty_dropzone" data-css="tve-u-17df7c2158d">
            <div class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df7bd9c49" style="text-align: center;">Don\'t Wait Any Longer! Order Your Discounted bottle Now!</p>
            </div>
            <div class="thrv_wrapper tve_image_caption" data-css="tve-u-17df7bdf5d3" style=""><span class="tve_image_frame"><img decoding="async" class="tve_image wp-image-224" alt="Ikaria juice" data-id="224" width="432" data-init-width="612" height="288" data-init-height="408" title="Ikaria juice" loading="lazy" src="data:image/svg+xml,%3Csvg%20xmlns=\'http://www.w3.org/2000/svg\'%20viewBox=\'0%200%20432%20288\'%3E%3C/svg%3E" data-width="432" data-height="288" data-css="tve-u-181ec1f8bad" style="" data-lazy-srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp 612w, https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview-300x200.png.webp 300w" data-lazy-sizes="(max-width: 432px) 100vw, 432px" data-lazy-src="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp" /><noscript><img decoding="async" class="tve_image wp-image-224" alt="Ikaria juice" data-id="224" width="432" data-init-width="612" height="288" data-init-height="408" title="Ikaria juice" loading="lazy" src="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp" data-width="432" data-height="288" data-css="tve-u-181ec1f8bad" style="" srcset="https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview.png.webp 612w, https://ikaria-juice.net/wp-content/uploads/2022/11/011111-min-removebg-preview-300x200.png.webp 300w" sizes="(max-width: 432px) 100vw, 432px" /></noscript></span></div>
            <div
                class="thrv_wrapper tve-countdown tcb-local-vars-root tve-countdown-evergreen" data-date="2021-12-27" data-hour="00" data-min="29" data-timezone="+00:00" data-visible="{&quot;days&quot;:true,&quot;hours&quot;:true,&quot;minutes&quot;:true,&quot;seconds&quot;:true,&quot;desktop&quot;:false,&quot;tablet&quot;:false,&quot;mobile&quot;:false}"
                data-ct-name="Countdown timer 05" data-ct="countdown-65086" data-element-name="Countdown Evergreen" data-day="00" data-sec="59" data-norestart="0" data-expday="0" data-exphour="0" data-css="tve-u-17df7d10832" style="" data-id="evergreen_9029">
                <div class="tve-countdown-content tve-prevent-content-edit">
                    <div class="tve-countdown-data">
                        <div class="tve-countdown-tile tve-countdown-days tve-cd-editable tcb-plain-text" data-css="tve-u-17df7d10833" style="">
                            <div class="tve-countdown-value">
                                <div class="tve-countdown-digit tve-cd-editable tcb-plain-text" data-css="tve-u-17df7d10834" style="">
                                    <div class="t-digit-part"><span>00</span></div>
                                </div>

                            </div>
                            <div class="tve-countdown-label tve-cd-editable tcb-editable-label" data-css="tve-u-17df7d10835" style="">
                                <div class="tcb-plain-text" style="" data-css="tve-u-17df7d10836">Days</div>
                            </div>
                        </div>
                        <div class="tve-countdown-tile-separator tcb-permanently-hidden">
                            <div class="tve-countdown-separator tve-cd-editable" style="" data-css="tve-u-17df7d10837">
                                <span class="tcb-plain-text" style="">:</span>
                            </div>
                            <div class="tve-countdown-label" data-css="tve-u-17df7d10838" style="">
                                <div class="tcb-plain-text" style="" data-css="tve-u-17df7d10839">&nbsp;</div>
                            </div>
                        </div>
                        <div class="tve-countdown-tile tve-countdown-hours tve-cd-editable tcb-plain-text" data-css="tve-u-17df7d10833" style="">
                            <div class="tve-countdown-value">
                                <div class="tve-countdown-digit tve-cd-editable tcb-plain-text" data-css="tve-u-17df7d1083a" style="">
                                    <div class="t-digit-part"><span>00</span></div>
                                </div>

                            </div>
                            <div class="tve-countdown-label tve-cd-editable tcb-editable-label" data-css="tve-u-17df7d1083b" style="">
                                <div class="tcb-plain-text" style="" data-css="tve-u-17df7d1083c">Hours</div>
                            </div>
                        </div>
                        <div class="tve-countdown-tile-separator tcb-permanently-hidden">
                            <div class="tve-countdown-separator tve-cd-editable" style="" data-css="tve-u-17df7d1083d">
                                <span class="tcb-plain-text" style="">:</span>
                            </div>
                            <div class="tve-countdown-label" data-css="tve-u-17df7d10838" style="">
                                <div class="tcb-plain-text" style="" data-css="tve-u-17df7d1083e">&nbsp;</div>
                            </div>
                        </div>
                        <div class="tve-countdown-tile tve-countdown-minutes tve-cd-editable tcb-plain-text" data-css="tve-u-17df7d10833" style="">
                            <div class="tve-countdown-value">
                                <div class="tve-countdown-digit tve-cd-editable tcb-plain-text" data-css="tve-u-17df7d1083f" style="">
                                    <div class="t-digit-part"><span>29</span></div>
                                </div>

                            </div>
                            <div class="tve-countdown-label tve-cd-editable tcb-editable-label" data-css="tve-u-17df7d10840" style="">
                                <div class="tcb-plain-text" style="" data-css="tve-u-17df7d10841">Minutes</div>
                            </div>
                        </div>
                        <div class="tve-countdown-tile-separator tcb-permanently-hidden">
                            <div class="tve-countdown-separator tve-cd-editable" style="" data-css="tve-u-17df7d10842">
                                <span class="tcb-plain-text" style="">:</span>
                            </div>
                            <div class="tve-countdown-label" data-css="tve-u-17df7d10838" style="">
                                <div class="tcb-plain-text" style="" data-css="tve-u-17df7d10843">&nbsp;</div>
                            </div>
                        </div>
                        <div class="tve-countdown-tile tve-countdown-seconds tve-cd-editable tcb-plain-text" data-css="tve-u-17df7d10833" style="">
                            <div class="tve-countdown-value">
                                <div class="tve-countdown-digit tve-cd-editable tcb-plain-text" data-css="tve-u-17df7d10844" style="">
                                    <div class="t-digit-part"><span>59</span></div>
                                </div>
                            </div>
                            <div class="tve-countdown-label tve-cd-editable tcb-editable-label" data-css="tve-u-17df7d10845" style="">
                                <div class="tcb-plain-text" style="" data-css="tve-u-17df7d10846">Seconds</div>
                            </div>
                        </div>
                    </div>
                    <div class="tve-countdown-expired tcb-dropzone-element tcb-plain-text" style="">
                        <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-17df7d10847" style="">
                            <div class="tve-content-box-background"></div>
                            <div class="tve-cb">
                                <div class="thrv_wrapper thrv_text_element">
                                    <p style="text-align: center;" data-css="tve-u-17df7d10848">You missed out!</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
        <div class="thrv_wrapper thrv_text_element">
            <p data-css="tve-u-17df7c02dd3" style="text-align: center;">Regular Price:<span style="text-decoration: line-through;">&nbsp;$199/per bottle</span></p>
        </div>
        <div class="thrv_wrapper thrv_text_element">
            <p data-css="tve-u-17df7c0566a" style="text-align: center;">Only for: $69/per bottle</p>
        </div>
        <div class="thrv_wrapper thrv-button thrv-button-v2 tcb-local-vars-root" data-css="tve-u-17df7c1045d">
            <div class="thrive-colors-palette-config" style="display: none !important"></div>
            <a href="https://ikaria-juice.net/recommends/get-your-960-discount-now/" class="tcb-button-link tcb-plain-text thirstylink" title="GET YOUR $960 DISCOUNT NOW" rel="" target="" data-linkid="355" data-nojs="false" style="">
		<span class="tcb-button-texts"><span class="tcb-button-text thrv-inline-text" data-css="tve-u-17df7c16d75" style="">GET YOUR $960 DISCOUNT NOW</span></span>
	</a>
        </div>
    </div>
    </div>
    <div class="thrv_wrapper thrv-page-section tve-height-update" data-inherit-lp-settings="1">
        <div class="tve-page-section-out" style="" data-css="tve-u-17df7c6c972"></div>
        <div class="tve-page-section-in" data-css="tve-u-17df7c68f9f">
            <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-17df7c8fc30" style="">
                <div class="tve-content-box-background"></div>
                <div class="tve-cb">
                    <div class="thrv_wrapper thrv-columns" style="--tcb-col-el-width:1040;">
                        <div class="tcb-flex-row tcb--cols--2" data-css="tve-u-16c239f72b3">
                            <div class="tcb-flex-col">
                                <div class="tcb-col">
                                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box" data-css="tve-u-16c239da3ea">
                                        <p style="" data-css="tve-u-17df7c6f6f1">© <span class="thrive-shortcode-content" data-attr-id="Y" data-extra_key="Y" data-option-inline="1" data-shortcode="thrv_dynamic_data_date" data-shortcode-name="Year (2029)">2023</span>, <a href="http://www.trbcards.us/"
                                                class="tve-froala fr-basic" style="outline: none;">ikaria-juice.net</a></p>
                                    </div>
                                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic">
                                        <p style=""><a class="tve-froala fr-basic" data-css="tve-u-184667d53e5" href="https://www.alpileanofficial.us/" style="outline: none;">https://www.alpileanofficial.us/</a></p>
                                    </div>
                                    <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic">
                                        <p style=""><a class="tve-froala fr-basic" data-css="tve-u-184667e1a52" href="https://www.revive-dailybuy.org/" style="outline: none;">https://www.revive-dailybuy.org/</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tcb-flex-col" data-css="tve-u-1848c6695dd" style="">
                                <div class="tcb-col">
                                    <div class="tcb-clear" data-css="tve-u-16c23a0387d">
                                        <div class="thrv_wrapper thrv_contentbox_shortcode thrv-content-box tve-elem-default-pad" data-css="tve-u-16c239fcb85">
                                            <div class="tve-content-box-background"></div>
                                            <div class="tve-cb">
                                                <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-16c239dc0ca">
                                                    <p style="text-align: center;" data-css="tve-u-17df7c71050"><a href="https://ikaria-juice.net/privacy-policy/" class="tve-froala fr-basic" style="outline: none;" target="_blank">Privacy Policy</a> | <a href="https://trbgoldencheck.us/" class="tve-froala fr-basic"
                                                            style="outline: none;">Disclaimer </a>| <a href="http://www.trbsystems.us/" class="tve-froala fr-basic" style="outline: none;">Terms &amp; Conditions</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thrv_wrapper thrv_text_element">
                <p data-css="tve-u-17df7c7a766" style="text-align: center;">FDA Compliance</p>
            </div>
            <div class="thrv_wrapper thrv_text_element tve-froala fr-box fr-basic" data-css="tve-u-17df7c8d11a" style="">
                <p data-css="tve-u-17df7c85435" style="text-align: center;"><span style="" data-css="tve-u-17df7c87704">All content and information found on this page are for informational purposes only and are not intended to diagnose, treat, cure or prevent any disease. The FDA hasn\'t evaluated the statements provided on this page. Make sure you consult with a licensed doctor before taking any supplement or making any changes to your diet or exercise plan. Individual results may vary.<br></span>
                    <a
                        href="https://redboost-official.com/" class="tve-froala fr-basic" style="outline: none;" data-css="tve-u-1847a44b7cd">Ikaria Juice</a><br>The display of third-party trademarks and trade names on this site does not necessarily indicate any affiliation or endorsements of our website. If you click a merchant link and buy a product or service on their
                        website, we may be paid a fee by the merchant.</p>
                <p data-css="tve-u-17df7c85435" style="text-align: center;">Ikaria Juice</p>
            </div>
        </div>
    </div>




























    </div>
    </div>
    </div>
    <div class="fr-dropdown-holder tcb-style-wrap"></div>
    </div>
    <script type="rocketlazyloadscript" id="generate-a11y">!function(){"use strict";if("querySelector"in document&&"addEventListener"in window){var e=document.body;e.addEventListener("mousedown",function(){e.classList.add("using-mouse")}),e.addEventListener("keydown",function(){e.classList.remove("using-mouse")})}}();</script>
    <script
        id=\'ta_main_js-js-extra\'>
        var thirsty_global_vars = {"home_url":"\/\/ikaria-juice.net","ajax_url":"https:\/\/ikaria-juice.net\/wp-admin\/admin-ajax.php","link_fixer_enabled":"yes","link_prefix":"recommends","link_prefixes":{"1":"recommends"},"post_id":"11","enable_record_stats":"yes","enable_js_redirect":"yes","disable_thirstylink_class":""};
        </script>
        <script type="rocketlazyloadscript" data-minify="1" src=\'https://ikaria-juice.net/wp-content/cache/min/1/wp-content/plugins/thirstyaffiliates/js/app/ta.js?ver=1671172255\' id=\'ta_main_js-js\' defer></script>
        <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-includes/js/imagesloaded.min.js?ver=4.1.4\' id=\'imagesloaded-js\' defer></script>
        <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-includes/js/masonry.min.js?ver=4.2.2\' id=\'masonry-js\' defer></script>
        <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-includes/js/jquery/jquery.masonry.min.js?ver=3.1.2b\' id=\'jquery-masonry-js\' defer></script>
        <script id=\'tve_frontend-js-extra\'>
            var tve_frontend_options = {
                "ajaxurl": "https:\/\/ikaria-juice.net\/wp-admin\/admin-ajax.php",
                "is_editor_page": "",
                "page_events": [],
                "is_single": "1",
                "social_fb_app_id": "",
                "dash_url": "https:\/\/ikaria-juice.net\/wp-content\/plugins\/thrive-visual-editor\/thrive-dashboard",
                "translations": {
                    "Copy": "Copy",
                    "empty_username": "ERROR: The username field is empty.",
                    "empty_password": "ERROR: The password field is empty.",
                    "empty_login": "ERROR: Enter a username or email address.",
                    "min_chars": "At least %s characters are needed",
                    "no_headings": "No headings found",
                    "registration_err": {
                        "required_field": "<strong>Error<\/strong>: This field is required",
                        "required_email": "<strong>Error<\/strong>: Please type your email address.",
                        "invalid_email": "<strong>Error<\/strong>: The email address isn&#8217;t correct.",
                        "passwordmismatch": "<strong>Error<\/strong>: Password mismatch"
                    }
                },
                "routes": {
                    "posts": "https:\/\/ikaria-juice.net\/wp-json\/tcb\/v1\/posts"
                },
                "post_request_data": [],
                "ip": "27.115.124.53",
                "current_user": [],
                "post_id": "11",
                "post_title": "ikaria",
                "post_type": "page",
                "post_url": "https:\/\/ikaria-juice.net\/",
                "is_lp": "tcb2-bright-smart-sales-page"
            };
        </script>
        <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-content/plugins/thrive-visual-editor/editor/js/dist/frontend.min.js?ver=2.6.2.1\' id=\'tve_frontend-js\' defer></script>
        <script type="rocketlazyloadscript" id=\'rocket-browser-checker-js-after\'>
            "use strict";var _createClass=function(){function defineProperties(target,props){for(var i=0;i
            <props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||!1,descriptor.configurable=!0, "value"in descriptor&&(descriptor.writable=!0),Object.defineProperty(target,descriptor.key,descriptor)}}return
                function(Constructor,protoProps,staticProps){return protoProps&&defineProperties(Constructor.prototype,protoProps),staticProps&&defineProperties(Constructor,staticProps),Constructor}}();function _classCallCheck(instance,Constructor){if(!(instance
                instanceof Constructor))throw new TypeError( "Cannot call a class as a function")}var RocketBrowserCompatibilityChecker=function(){function RocketBrowserCompatibilityChecker(options){_classCallCheck(this,RocketBrowserCompatibilityChecker),this.passiveSupported=!1,this._checkPassiveOption(this),this.options=!!this.passiveSupported&&options}return
                _createClass(RocketBrowserCompatibilityChecker,[{key: "_checkPassiveOption",value:function(self){try{var options={get passive(){return!(self.passiveSupported=!0)}};window.addEventListener( "test",null,options),window.removeEventListener(
                "test",null,options)}catch(err){self.passiveSupported=!1}}},{key: "initRequestIdleCallback",value:function(){!1 in window&&(window.requestIdleCallback=function(cb){var start=Date.now();return setTimeout(function(){cb({didTimeout:!1,timeRemaining:function(){return
                Math.max(0,50-(Date.now()-start))}})},1)}),!1 in window&&(window.cancelIdleCallback=function(id){return clearTimeout(id)})}},{key: "isDataSaverModeOn",value:function(){return "connection"in navigator&&!0===navigator.connection.saveData}},{key:
                "supportsLinkPrefetch",value:function(){var elem=document.createElement( "link");return elem.relList&&elem.relList.supports&&elem.relList.supports( "prefetch")&&window.IntersectionObserver&& "isIntersecting"in IntersectionObserverEntry.prototype}},{key:
                "isSlowConnection",value:function(){return "connection"in navigator&& "effectiveType"in navigator.connection&&( "2g"===navigator.connection.effectiveType|| "slow-2g"===navigator.connection.effectiveType)}}]),RocketBrowserCompatibilityChecker}(); </script>
                <script id=\'rocket-preload-links-js-extra\'>
                    var RocketPreloadLinksConfig = {
                        "excludeUris": "\/(?:.+\/)?feed(?:\/(?:.+\/?)?)?$|\/(?:.+\/)?embed\/|\/(index\\.php\/)?wp\\-json(\/.*|$)|\/wp-admin\/|\/logout\/|\/wp-login.php|\/recommends\/",
                        "usesTrailingSlash": "1",
                        "imageExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif",
                        "fileExt": "jpg|jpeg|gif|png|tiff|bmp|webp|avif|php|pdf|html|htm",
                        "siteUrl": "https:\/\/ikaria-juice.net",
                        "onHoverDelay": "100",
                        "rateThrottle": "3"
                    };
                </script>
                <script type="rocketlazyloadscript" id=\'rocket-preload-links-js-after\'>
                    (function() { "use strict";var r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e=function(){function
                    i(e,t){for(var n=0;n
                    <t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0, "value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,n){return t&&i(e.prototype,t),n&&i(e,n),e}}();function
                        i(e,t){if(!(e instanceof t))throw new TypeError( "Cannot call a class as a function")}var t=function(){function n(e,t){i(this,n),this.browser=e,this.config=t,this.options=this.browser.options,this.prefetched=new Set,this.eventTime=null,this.threshold=1111,this.numOnHover=0}return
                        e(n,[{key: "init",value:function(){!this.browser.supportsLinkPrefetch()||this.browser.isDataSaverModeOn()||this.browser.isSlowConnection()||(this.regex={excludeUris:RegExp(this.config.excludeUris, "i"),images:RegExp( ".("+this.config.imageExt+
                        ")$", "i"),fileExt:RegExp( ".("+this.config.fileExt+ ")$", "i")},this._initListeners(this))}},{key: "_initListeners",value:function(e){-1<this.config.onHoverDelay&&document.addEventListener( "mouseover",e.listener.bind(e),e.listenerOptions),document.addEventListener(
                        "mousedown",e.listener.bind(e),e.listenerOptions),document.addEventListener( "touchstart",e.listener.bind(e),e.listenerOptions)}},{key: "listener",value:function(e){var t=e.target.closest( "a"),n=this._prepareUrl(t);if(null!==n)switch(e.type){case
                        "mousedown":case "touchstart":this._addPrefetchLink(n);break;case "mouseover":this._earlyPrefetch(t,n, "mouseout")}}},{key: "_earlyPrefetch",value:function(t,e,n){var i=this,r=setTimeout(function(){if(r=null,0===i.numOnHover)setTimeout(function(){return
                        i.numOnHover=0},1e3);else if(i.numOnHover>i.config.rateThrottle)return;i.numOnHover++,i._addPrefetchLink(e)},this.config.onHoverDelay);t.addEventListener(n,function e(){t.removeEventListener(n,e,{passive:!0}),null!==r&&(clearTimeout(r),r=null)},{passive:!0})}},{key:"_addPrefetchLink",value:function(i){return
                        this.prefetched.add(i.href),new Promise(function(e,t){var n=document.createElement("link");n.rel="prefetch",n.href=i.href,n.onload=e,n.onerror=t,document.head.appendChild(n)}).catch(function(){})}},{key:"_prepareUrl",value:function(e){if(null===e||"object"!==(void
                        0===e?"undefined":r(e))||!1 in e||-1===["http:","https:"].indexOf(e.protocol))return null;var t=e.href.substring(0,this.config.siteUrl.length),n=this._getPathname(e.href,t),i={original:e.href,protocol:e.protocol,origin:t,pathname:n,href:t+n};return
                        this._isLinkOk(i)?i:null}},{key:"_getPathname",value:function(e,t){var n=t?e.substring(this.config.siteUrl.length):e;return n.startsWith("/")||(n="/"+n),this._shouldAddTrailingSlash(n)?n+"/":n}},{key:"_shouldAddTrailingSlash",value:function(e){return
                        this.config.usesTrailingSlash&&!e.endsWith("/")&&!this.regex.fileExt.test(e)}},{key:"_isLinkOk",value:function(e){return null!==e&&"object"===(void 0===e?"undefined":r(e))&&(!this.prefetched.has(e.href)&&e.origin===this.config.siteUrl&&-1===e.href.indexOf("?")&&-1===e.href.indexOf("#")&&!this.regex.excludeUris.test(e.href)&&!this.regex.images.test(e.href))}}],[{key:"run",value:function(){"undefined"!=typeof
                        RocketPreloadLinksConfig&&new n(new RocketBrowserCompatibilityChecker({capture:!0,passive:!0}),RocketPreloadLinksConfig).init()}}]),n}();t.run(); }());
                </script>
                <!--[if lte IE 11]>
<script src=\'https://ikaria-juice.net/wp-content/themes/generatepress/assets/js/classList.min.js?ver=3.3.0\' id=\'generate-classlist-js\'></script>
<![endif]-->
                <script id=\'generate-menu-js-extra\'>
                    var generatepressMenu = {
                        "toggleOpenedSubMenus": "1",
                        "openSubMenuLabel": "Open Sub-Menu",
                        "closeSubMenuLabel": "Close Sub-Menu"
                    };
                </script>
                <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-content/themes/generatepress/assets/js/menu.min.js?ver=3.3.0\' id=\'generate-menu-js\' defer></script>
                <script id=\'tve-dash-frontend-js-extra\'>
                    var tve_dash_front = {
                        "ajaxurl": "https:\/\/ikaria-juice.net\/wp-admin\/admin-ajax.php",
                        "force_ajax_send": "1",
                        "is_crawler": "",
                        "recaptcha": []
                    };
                </script>
                <script type="rocketlazyloadscript" src=\'https://ikaria-juice.net/wp-content/plugins/thrive-visual-editor/thrive-dashboard/js/dist/frontend.min.js?ver=2.3.4.1\' id=\'tve-dash-frontend-js\' defer></script>
                <script type="rocketlazyloadscript" data-rocket-type="text/javascript">
                    var tcb_post_lists = JSON.parse(\'[]\');
                </script>
                <script>
                    window.lazyLoadOptions = {
                        elements_selector: "img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",
                        data_src: "lazy-src",
                        data_srcset: "lazy-srcset",
                        data_sizes: "lazy-sizes",
                        class_loading: "lazyloading",
                        class_loaded: "lazyloaded",
                        threshold: 300,
                        callback_loaded: function(element) {
                            if (element.tagName === "IFRAME" && element.dataset.rocketLazyload == "fitvidscompatible") {
                                if (element.classList.contains("lazyloaded")) {
                                    if (typeof window.jQuery != "undefined") {
                                        if (jQuery.fn.fitVids) {
                                            jQuery(element).parent().fitVids()
                                        }
                                    }
                                }
                            }
                        }
                    };
                    window.addEventListener(\'LazyLoad::Initialized\', function(e) {
                        var lazyLoadInstance = e.detail.instance;
                        if (window.MutationObserver) {
                            var observer = new MutationObserver(function(mutations) {
                                var image_count = 0;
                                var iframe_count = 0;
                                var rocketlazy_count = 0;
                                mutations.forEach(function(mutation) {
                                    for (var i = 0; i < mutation.addedNodes.length; i++) {
                                        if (typeof mutation.addedNodes[i].getElementsByTagName !== \'function\') {
                                            continue
                                        }
                                        if (typeof mutation.addedNodes[i].getElementsByClassName !== \'function\') {
                                            continue
                                        }
                                        images = mutation.addedNodes[i].getElementsByTagName(\'img\');
                                        is_image = mutation.addedNodes[i].tagName == "IMG";
                                        iframes = mutation.addedNodes[i].getElementsByTagName(\'iframe\');
                                        is_iframe = mutation.addedNodes[i].tagName == "IFRAME";
                                        rocket_lazy = mutation.addedNodes[i].getElementsByClassName(\'rocket-lazyload\');
                                        image_count += images.length;
                                        iframe_count += iframes.length;
                                        rocketlazy_count += rocket_lazy.length;
                                        if (is_image) {
                                            image_count += 1
                                        }
                                        if (is_iframe) {
                                            iframe_count += 1
                                        }
                                    }
                                });
                                if (image_count > 0 || iframe_count > 0 || rocketlazy_count > 0) {
                                    lazyLoadInstance.update()
                                }
                            });
                            var b = document.getElementsByTagName("body")[0];
                            var config = {
                                childList: !0,
                                subtree: !0
                            };
                            observer.observe(b, config)
                        }
                    }, !1)
                </script>
                <script data-no-minify="1" async src="https://ikaria-juice.net/wp-content/plugins/wp-rocket/assets/js/lazyload/17.5/lazyload.min.js"></script>
                <script>
                    function lazyLoadThumb(e) {
                        var t = \'<img data-lazy-src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"><noscript><img src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"></noscript>\',
                            a = \'<button class="play" aria-label="play Youtube video"></button>\';
                        return t.replace("ID", e) + a
                    }

                    function lazyLoadYoutubeIframe() {
                        var e = document.createElement("iframe"),
                            t = "ID?autoplay=1";
                        t += 0 === this.parentNode.dataset.query.length ? \'\' : \'&\' + this.parentNode.dataset.query;
                        e.setAttribute("src", t.replace("ID", this.parentNode.dataset.src)), e.setAttribute("frameborder", "0"), e.setAttribute("allowfullscreen", "1"), e.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"), this.parentNode.parentNode.replaceChild(e, this.parentNode)
                    }
                    document.addEventListener("DOMContentLoaded", function() {
                        var e, t, p, a = document.getElementsByClassName("rll-youtube-player");
                        for (t = 0; t < a.length; t++) e = document.createElement("div"), e.setAttribute("data-id", a[t].dataset.id), e.setAttribute("data-query", a[t].dataset.query), e.setAttribute("data-src", a[t].dataset.src), e.innerHTML = lazyLoadThumb(a[t].dataset.id), a[t].appendChild(e), p = e.querySelector(\'.play\'), p.onclick = lazyLoadYoutubeIframe
                    });
                </script>
</body>

</html>

<!-- Page generated by LiteSpeed Cache 5.3.3 on 2023-06-10 02:02:48 -->
<!-- This website is like a Rocket, isn\'t it? Performance optimized by WP Rocket. Learn more: https://wp-rocket.me -->
';
?>