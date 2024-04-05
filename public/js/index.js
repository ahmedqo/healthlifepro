OS.Theme("colors", "OS-PRIME", "54 226 246");
OS.Theme.Update();

OS.Load(function() {
    document.body.removeAttribute("close");
    const trigger = document.querySelector("#sidebar-trigger"),
        sidebar = document.querySelector("os-sidebar");
    if (trigger && sidebar)
        trigger.addEventListener("click", (e) => {
            sidebar.show();
        });

    document.querySelectorAll(".nav-colors svg").forEach((svg, i) => {
        if (i < 10) svg.style.color = "var(--color-" + i + ")";
    });

    document.querySelectorAll(".sys-colors svg").forEach((svg, i) => {
        if (i < 10) svg.style.color = "var(--color-sys-" + i + ")";
    });
});

function Slider(els, opts = {}) {
    var position,
        action = 0;

    function Instance() {
        this.actions = {};
        this.wrap = typeof els.wrap === "string" ? document.querySelector(els.wrap) : els.wrap;
        this.list = this.wrap.querySelector("ul");
        this.wrap.style.touchAction = "none";
        this.wrap.style.overflow = "hidden";
        this.list.style.display = "flex";
        this.wrap.style.direction = "ltr";
        this.list.style.direction = "ltr";
        this.current = {
            value: 0,
        };

        this.change = (fn) => {
            this.actions.change = fn;
        };

        this.update = (opt = {}) => {
            const options = {
                ...opts,
                ...opt,
            };
            this.infinite = options.infinite || false;
            this.vert = options.vert || false;
            this.auto = options.auto || false;
            this.size = options.size || false;
            this.flip = options.flip || false;
            this.touch = options.touch || false;
            this.time = options.time || 5000;
            this.move = options.move || 1;
            this.cols = options.cols || 1;
            this.gap = options.gap || 0;

            if (this.infinite) {
                [...this.list.children].map((e) => e.isCloned && e.remove());

                const len = this.list.children.length;
                const firsts = [...this.list.children].reduce((a, e, i) => {
                    if (i < this.cols) {
                        const x = e.cloneNode(true);
                        x.setAttribute("x-clone", "");
                        a.push(x);
                    }
                    return a;
                }, []);
                const lasts = [...this.list.children].reduce((a, e, i) => {
                    if (i > len - this.cols - 1) {
                        const x = e.cloneNode(true);
                        x.setAttribute("x-clone", "");
                        a.push(x);
                    }
                    return a;
                }, []);

                if (firsts.length) {
                    for (let i = 0; i < this.cols; i++) {
                        const current = firsts[i];
                        this.list.insertAdjacentElement("beforeend", current);
                        current.isCloned = true;
                    }
                }

                if (lasts.length)
                    for (let i = this.cols; i > 0; i--) {
                        const current = lasts[i - 1];
                        this.list.insertAdjacentElement("afterbegin", current);
                        current.isCloned = true;
                    }
            }

            this.items = [...this.list.children];
            this.length = this.items.length;

            this.__opt = this.vert ? {
                size: "clientHeight",
                item: "height",
                scroll: "scrollTop",
                pos: "clientY",
            } : {
                size: "clientWidth",
                item: "width",
                scroll: "scrollLeft",
                pos: "clientX",
            };

            this.size ?
                (this.wrap.style[this.__opt.item] = this.size * this.cols + this.gap * (this.cols - 1) + "px") :
                (this.wrap.style[this.__opt.item] = "100%");

            this.list.style.width = "";
            this.list.style.flexDirection = "";
            this.list.style.width = "";
            this.list.style.height = "";

            this.vert ?
                (this.list.style.width = "100%") && (this.list.style.flexDirection = "column") :
                (this.list.style.width = "max-content") && (this.list.style.height = "100%");

            this.itemSize = this.wrap[this.__opt.size] / this.cols - (this.gap * (this.cols - 1)) / this.cols;
            this.scrollLength = this.itemSize + this.gap;
            this.list.style.gap = this.gap + "px";

            for (let i = 0; i < this.length; i++) {
                this.items[i].style[this.__opt.item] = this.itemSize + "px";
            }

            if (this.infinite) {
                if (!this.__isLunched && this.current.value === 0) {
                    this.current.value = this.cols * this.move;
                    window.onresize = this.update;
                    this.__isLunched = true;
                }
            }

            this.wrap.style.scrollBehavior = "unset";
            this.wrap[this.__opt.scroll] = this.scrollLength * this.current.value;
            this.wrap.style.scrollBehavior = "smooth";

            this.scrollAuto();
            this.scrollTouch();
        };

        this.resize = (fn_true = () => {}, fn_false = () => {}, condistion = "(min-width: 1024px)") => {
            const fn = () => {
                if (window.matchMedia(condistion).matches) fn_true(this);
                else fn_false(this);
            };
            window.addEventListener("resize", fn);
            fn();
        };

        this.scroll = () => {
            this.wrap[this.__opt.scroll] = this.scrollLength * this.current.value;
            this.actions.change && this.actions.change(this);
        };

        this.scrollTo = (idx) => {
            this.current.value = idx;
            this.scroll();
        };

        this.scrollNext = () => {
            this.scrollAuto();
            if (this.current.value >= this.length - this.cols) {
                if (this.infinite) {
                    this.wrap.style.scrollBehavior = "unset";
                    this.current.value = this.cols;
                    this.scroll();
                    this.current.value += this.move;
                    this.wrap.style.scrollBehavior = "smooth";
                } else this.current.value = 0;
            } else this.current.value += this.move;
            this.scroll();
        };

        this.scrollPrev = () => {
            this.scrollAuto();
            if (this.current.value <= 0) {
                if (this.infinite) {
                    this.wrap.style.scrollBehavior = "unset";
                    this.current.value = this.length - this.cols - this.cols;
                    this.scroll();
                    this.current.value -= this.move;
                    this.wrap.style.scrollBehavior = "smooth";
                } else this.current.value = this.length - this.cols;
            } else this.current.value -= this.move;
            this.scroll();
        };

        this.scrollAuto = () => {
            if (this.auto) {
                const repeatOften = () => {
                    clearTimeout(this.__timer);
                    this.__timer = setTimeout(() => {
                        this.flip ? this.scrollPrev() : this.scrollNext();
                        requestAnimationFrame(repeatOften);
                    }, this.time);
                };
                requestAnimationFrame(repeatOften);
            } else {
                clearTimeout(this.__timer);
            }
        };

        this.scrollTouch = () => {
            if (this.touch) {
                var fn;
                this.wrap.onpointerdown = (e) => {
                    e.preventDefault();
                    if (action === 0) {
                        action = 1;
                        position = e[this.__opt.pos];
                    }

                    const handleMove = (e) => {
                        e.preventDefault();
                        fn = e[this.__opt.pos] >= position ? this.scrollPrev : this.scrollNext;
                        if (action === 1) {
                            action = 2;
                        }
                    };

                    const handleUp = (e) => {
                        e.preventDefault();
                        fn && fn();
                        if (action === 2) action = 0;
                        this.wrap.onpointermove = null;
                        this.wrap.onpointerup = null;
                    };

                    this.wrap.onpointermove = handleMove;
                    this.wrap.onpointerup = handleUp;
                };
            } else {
                this.wrap.onpointerdown = null;
            }
        };

        if (els.prev) {
            this.prev = typeof els.prev === "string" ? document.querySelector(els.prev) : els.prev;
            this.prev.onclick = this.scrollPrev;
        }

        if (els.next) {
            this.next = typeof els.next === "string" ? document.querySelector(els.next) : els.next;
            this.next.onclick = this.scrollNext;
        }

        this.update();
    }

    return new Instance();
}

function Counter(selector) {
    document.querySelectorAll(selector).forEach((qte) => {
        const sub = qte.querySelector('[counter="-"]');
        const inp = qte.querySelector('[counter="x"]');
        const add = qte.querySelector('[counter="+"]');

        sub.addEventListener("click", (e) => {
            e.preventDefault();
            const num = +inp.value || 2;
            inp.value = num > 1 ? num - 1 : 1;
        });

        inp.addEventListener("input", (e) => {
            e.preventDefault();
            const num = +inp.value || 1;
            inp.value = num;
        });

        add.addEventListener("click", (e) => {
            e.preventDefault();
            const num = +inp.value || 0;
            inp.value = num + 1;
        });
    });
}

class CSV {
    constructor(table) {
        this.table = table;
        this.rows = Array.from(this.table.getElementsByTagName("tr")).filter(tr => tr.parentElement.tagName !== "TFOOT");
    }

    static parse(cell) {
        let parsedValue = (cell.dataset.text || cell.textContent).trim().replace(/\s{2,}/g, " ");
        parsedValue = parsedValue.replace(/"/g, `""`);
        if (/[",\n]/.test(parsedValue)) {
            parsedValue = `"${parsedValue}"`;
        }
        return parsedValue;
    }

    convert() {
        const lines = [];
        for (const row of this.rows) {
            const values = [];
            for (let cell = 0; cell < [...row.cells].length; cell++) {
                if (row.cells[cell].style.display === "none") continue;
                values.push(CSV.parse(row.cells[cell]));
            }
            lines.push(values.join(","));
        }
        return lines.join("\n");
    }
}

const Print = (function() {
    function $tempkate(opts) {
        const { lang, dir, size, margin, css, page } = opts;
        return `<!DOCTYPE html><html lang="${lang}"dir="${dir}"><head><meta charset="UTF-8"/><meta http-equiv="X-UA-Compatible"content="IE=edge"/><meta name="viewport"content="width=device-width, initial-scale=1.0"/>${css}<style>@page{size:${size.page};margin:${margin}}#page{width:100%}#head{height:${size.head}}#foot{height:${size.foot}}</style></head><body><table id="page"><thead><tr><td><div id="head"></div></td></tr></thead><tbody><tr><td><main id="main">${page}</main></td></tr></tbody><tfoot><tr><td><div id=foot></div></td></tr></tfoot></table></body></html>`;
    }

    function Print(target, { trigger = null, clear = false, exec = false } = {}) {
        const page = document.querySelector(target);

        function $callable() {
            var iframe = document.createElement("iframe");
            iframe.style.display = "none";
            document.body.appendChild(iframe);
            var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
            iframeDoc.open();
            iframeDoc.write(
                $tempkate({
                    ...Print.opts,
                    page: page.innerHTML,
                    css: Print.opts.css.join(""),
                })
            );
            iframeDoc.close();
            iframe.onload = function() {
                iframe.contentWindow.print();
                setTimeout(() => {
                    document.body.removeChild(iframe);
                }, 1000);
            };
        }
        clear && page.remove();
        exec && $callable();

        trigger && document.querySelectorAll(trigger).forEach((el) => el.addEventListener("click", $callable));

        return this;
    }

    Print.opts = {
        bg: "",
        css: [],
        dir: document.documentElement.dir,
        lang: document.documentElement.lang,
        size: {
            page: "A4",
            head: 0,
            foot: 0,
        },
        margin: "5mm 5mm 5mm 5mm",
    };

    return Print;
})();

const Uploader = (function(selector) {
    function $update(uploader) {
        uploader.opts.data.clearData();

        uploader.opts.els.wrapper.querySelectorAll(".x-uploader-item").forEach((c, i) => {
            c.remove();
        });

        if (uploader.hasAttribute("multiple")) {
            uploader.opts.els.file.multiple = true;
            uploader.opts.els.wrapper.className = uploader.opts.classes.multiple.wrapper;
            uploader.opts.els.item.className = uploader.opts.classes.multiple.item;
            uploader.opts.els.trigger.className = uploader.opts.classes.multiple.trigger;
            uploader.opts.els.item.querySelector("svg").className.baseVal = uploader.opts.classes.multiple.svg;
            uploader.opts.els.trigger.querySelector("svg").className.baseVal = uploader.opts.classes.multiple.svg;
            uploader.opts.els.trigger.querySelector("x-uploader-item") && uploader.opts.els.trigger.querySelector("button").remove();
        } else {
            uploader.opts.els.file.multiple = false;
            uploader.opts.els.wrapper.className = uploader.opts.classes.single.wrapper;
            uploader.opts.els.item.className = uploader.opts.classes.single.item;
            uploader.opts.els.trigger.className = uploader.opts.classes.single.trigger;
            uploader.opts.els.item.querySelector("svg").className.baseVal = uploader.opts.classes.single.svg;
            uploader.opts.els.trigger.querySelector("svg").className.baseVal = uploader.opts.classes.single.svg;
        }
    }

    function $remove(uploader, target) {
        if (uploader.hasAttribute("multiple")) {
            const index = Math.abs([...uploader.opts.els.wrapper.children].indexOf(target) - uploader.opts.data.items.length);
            uploader.opts.data.items.remove(index);
        } else {
            uploader.opts.data.clearData();
        }
        uploader.files = uploader.opts.data.files;
        target.remove();
    }

    function $create(uploader, src) {
        const item = uploader.opts.els.item.cloneNode(true);

        item.addEventListener("click", (e) => {
            e.preventDefault();
            $remove(uploader, item);

            if (!uploader.hasAttribute("multiple")) uploader.opts.els.file.click();

            uploader.x.remove && uploader.x.remove(e);
            uploader.dispatchEvent(
                new CustomEvent("x-remove", {
                    bubbles: true,
                    detail: { event: e },
                })
            );
        });

        uploader.opts.els.trigger.insertAdjacentElement(uploader.hasAttribute("multiple") ? "afterend" : "beforeend", item);
        item.querySelector(".x-uploader-image").src = src;
    }

    const XUploader = document.createElement("div"),
        XUploaderItem = document.createElement("button");

    XUploader.innerHTML = `
        <div class="x-uploader-trigger">
            <svg class="pointer-events-none" fill="currentcolor" viewBox="0 96 960 960">
                <path
                    d="M480.009 721q-19.641 0-32.825-13.312Q434 694.375 434 676V365l-82 82q-13 12-31.511 12.5t-30.409-13.42Q276 432.867 276 413.933 276 395 290 380l158-158q6.167-4.909 14.532-8.955Q470.898 209 479.744 209q8.847 0 17.601 3.864Q506.1 216.727 512 222l159 160q14 13 13.5 32t-13.63 32.13q-12.137 13.101-31.003 12.485Q621 458 607 445l-82-80v311q0 18.375-12.675 31.688Q499.649 721 480.009 721ZM205 940q-36.05 0-63.525-26.897T114 847.5V706q0-18.8 13.56-32.4 13.559-13.6 32.3-13.6 20.14 0 32.64 13.6t12.5 32.297V848h549V705.897q0-18.697 12.86-32.297 12.859-13.6 32.5-13.6Q819 660 832 673.6t13 32.297V848q0 38.5-28 65.25T754 940H205Z" />
            </svg>
            <input type="file" accept="image/*" class="x-element opacity-0 w-full h-full absolute inset-0 cursor-pointer" />
        </div>
    `;
    XUploaderItem.innerHTML = `
        <img class="x-element x-uploader-image w-full h-full object-contain pointer-events-none transition-transform group-hover:scale-150" />
        <div class="x-element bg-x-black text-x-white opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity w-full h-full absolute inset-0 bg-opacity-[.025] flex items-center justify-center">
            <svg fill="currentcolor" viewBox="0 96 960 960">
                <path
                    d="m480 647 88 88q10.733 12 28.367 12 17.633 0 30.459-11.826Q638 724 638 706.25T627 677l-88-89 88-90q11-11.733 11-29.367 0-17.633-11.174-28.459Q615 429 597.367 428.5 579.733 428 569 440l-89 89-87-89q-10.5-12-28.75-11.5t-30.424 11.674Q322 452 322 469.133q0 17.134 12 28.867l88 90-88 88q-11 12.5-11 29.75t10.826 29.424Q346 747 363.75 747T393 735l87-88ZM253 957q-35.725 0-63.863-27.138Q161 902.725 161 866V314h-11q-19 0-31.5-12.5T106 268q0-19 12.5-32t31.5-13h182q0-20 13-33.5t33-13.5h204q20 0 33.5 13.3T629 223h180q20 0 33 13t13 32q0 21-13 33.5T809 314h-11v552q0 36.725-27.638 63.862Q742.725 957 706 957H253Z" />
            </svg>
        </div>
    `;

    function Uploader(selector) {
        const current = document.querySelector(selector);
        const wrapper = XUploader.cloneNode(true);
        current.x = {
            change: null,
            remove: null,
        };
        current.opts = {
            els: {
                wrapper: wrapper,
                trigger: wrapper.querySelector(".x-uploader-trigger"),
                file: wrapper.querySelector("input"),
                item: XUploaderItem,
            },
            classes: {
                multiple: {
                    wrapper: "x-element x-uploader w-full border-x-black p-2 rounded-x-thin border grid grid-cols-2 grid-rows-1 lg:grid-cols-6 gap-2",
                    trigger: "x-element x-uploader-trigger bg-x-black text-x-black bg-opacity-[.025] w-full aspect-square hover:!bg-opacity-5 focus:!bg-opacity-5 rounded-x-thin flex items-center justify-center relative overflow-hidden",
                    item: "x-element x-uploader-item w-full group aspect-square bg-x-black bg-opacity-[.025] rounded-x-thin flex items-center justify-center cursor-pointer relative overflow-hidden",
                    svg: "x-element block w-16 h-16 pointer-events-none",
                },
                single: {
                    wrapper: "x-element x-uploader w-full border-x-black rounded-x-thin border",
                    trigger: "x-element x-uploader-trigger bg-x-black text-x-black w-full aspect-square bg-opacity-0 hover:!bg-opacity-[.025] focus:!bg-opacity-[.025] rounded-x-thin flex items-center justify-center relative overflow-hidden",
                    item: "x-element x-uploader-item bg-x-white w-full group aspect-square rounded-x-thin flex items-center justify-center cursor-pointer overflow-hidden absolute inset-0",
                    svg: "x-element block w-20 h-20 pointer-events-none",
                },
                css: ["absolute", "inset-0"],
            },
            data: new DataTransfer(),
        };
        current.classList.add("x-element", "hidden");
        current.opts.els.file.id = current.id + "_uploader";
        current.opts.els.file.multiple = current.hasAttribute("multiple");

        current.opts.els.file.addEventListener("change", (e) => {
            [...current.opts.els.file.files].forEach((file) => {
                $create(current, URL.createObjectURL(file));
                current.opts.data.items.add(file);
            });

            current.files = current.opts.data.files;
            current.opts.els.file.value = null;

            current.x.change && current.x.change(e);
            current.dispatchEvent(
                new CustomEvent("x-change", {
                    bubbles: true,
                    detail: { event: e },
                })
            );
        });

        document.addEventListener("DOMContentLoaded", () => {
            const target = current.dataset.target
            const files = document.querySelectorAll(target);
            if (current.hasAttribute("multiple")) {
                files.forEach((file) => {
                    current.opts.els.wrapper.appendChild(file);
                });
            } else {
                files.forEach((file, i) => {
                    if (i > 0) file.remove();
                    else {
                        current.opts.els.trigger.appendChild(file);
                        file.addEventListener("click", (e) => {
                            current.opts.els.file.click();
                        });
                        file.classList.add(...current.opts.classes.css);
                    }
                });
            }
            current.removeAttribute("data-target");
        });

        new MutationObserver((mutationsList) => {
            for (const mutation of mutationsList) {
                if (mutation.type === "attributes") {
                    $update(current);
                }
            }
        }).observe(current, {
            attributes: true,
        });

        $update(current);
        current.insertAdjacentElement("afterend", wrapper);
    }

    return Uploader(selector);
});

const Toggle = (function() {
    function $loop(list) {
        list.forEach((item) => {
            const current = document.querySelector(item.selector);
            if (!current) return;
            const $callable = (function $callable() {
                items = current.querySelectorAll("a, button, input, select, textarea");
                if (current.classList.contains(item.class)) items.forEach((itm) => (itm.tabIndex = "-1"));
                else items.forEach((itm) => itm.removeAttribute("tabindex"));
                return $callable;
            })();
            new MutationObserver((mutationsList) => {
                for (const mutation of mutationsList) {
                    if (mutation.type === "attributes") {
                        if (mutation.attributeName === "class") {
                            $callable();
                        }
                    }
                }
            }).observe(current, {
                childList: true,
                subtree: true,
                attributes: true,
            });
        });
    }

    function $callable({ xs = [], sm = [], md = [], lg = [], xl = [] } = {}) {
        $loop(xs);
        if (matchMedia("(min-width: 640px)").matches) $loop(sm);
        if (matchMedia("(min-width: 768px)").matches) $loop(md);
        if (matchMedia("(min-width: 1024px)").matches) $loop(lg);
        if (matchMedia("(min-width: 1280px)").matches) $loop(xl);
    }

    function Toggle() {
        const { Elements, Attributes } = Toggle.opts;
        var targets = document.querySelectorAll(`[${Attributes.Selector}]`);
        if (Elements.length) targets = [...targets, ...Elements];
        if (!targets.length) return this;

        for (let i = 0; i < targets.length; i++) {
            const current = targets[i];
            current.x = {
                toggle: null,
            };
            const selectors = (current.getAttribute(Attributes.Targets) || "").split(",");
            if (!selectors.length) continue;
            const map = {
                properties: ((current.getAttribute(Attributes.Properties) || "").split(",") || []).map((e) => e.trim()),
                targets: [],
            };

            for (let j = 0; j < selectors.length; j++) {
                const selector = selectors[j].trim();
                const elements = document.querySelectorAll(selector);
                if (!elements.length) continue;
                map.targets = [...map.targets, ...elements];
            }

            current.addEventListener("click", (e) => {
                for (let j = 0; j < map.targets.length; j++) {
                    const target = map.targets[j];

                    for (let k = 0; k < map.properties.length; k++) {
                        const property = map.properties[k].split(">");

                        if (property[0] === "attr") {
                            const attribute = property[1];
                            if (target.hasAttribute(attribute)) target.removeAttribute(attribute);
                            else target.setAttribute(attribute, "");
                        } else {
                            const classname = property.length > 1 ? property[1] : property[0];
                            target.classList.toggle(classname);
                        }
                    }
                }

                current.toggle && current.toggle(e);
                current.dispatchEvent(
                    new CustomEvent("x-toggle", {
                        bubbles: true,
                        detail: { event: e },
                    })
                );
            });

            current.removeAttribute(Attributes.Targets);
            current.removeAttribute(Attributes.Selector);
            current.removeAttribute(Attributes.Properties);
        }

        return this;
    }

    Toggle.disable = function(obj) {
        window.addEventListener("resize", () => $callable(obj));
        $callable(obj);
    };

    Toggle.opts = {
        Elements: [],
        Attributes: {
            Selector: "os-toggle",
            Targets: "os-targets",
            Properties: "os-properties",
        },
    };

    return Toggle;
})();

function format(num) {
    let formattedString = Intl.NumberFormat().format(num);
    if (formattedString.indexOf('.') === -1) {
        formattedString += '.00';
    } else {
        const decimalIndex = formattedString.indexOf('.');
        const decimalPart = formattedString.substring(decimalIndex + 1);
        if (decimalPart.length === 1) {
            formattedString += '0';
        }
    }
    return formattedString.trim();
}

function chunks(arrays, length = 50) {
    const chunks = [];

    for (let i = 0; i < arrays.length; i += length) {
        const chunk = arrays.slice(i, i + length);
        chunks.push(chunk);
    }

    return chunks;
}

function getData(opts) {
    var timer;
    const text = document.querySelector(opts.text);
    const field = document.querySelector(opts.field);
    field.display = "name_" + document.documentElement.lang;
    field.addEventListener("input", e => {
        if (!field.value.trim()) {
            text.value = "";
            return;
        }
        if (timer) clearTimeout(timer);
        timer = setTimeout(() => {
            fetch(opts.path + "?search=" + encodeURI(field.value)).then(data => data.json()).then((data) => {
                field.results = data;
            });
        }, timer ? 250 : 0);
    });

    field.addEventListener("select", ({ detail: { data } }) => {
        text.value = data.id;
    });
}

function DataTable(opts) {
    const {
        print,
        table,
        search,
        filter,
        download,
    } = opts;
    if (print && table) Print(table, {
        trigger: print
    });

    const tableEl = table && document.querySelector(table);
    const searchEl = search && document.querySelector(search);
    const filterEls = filter && document.querySelectorAll(filter);
    const downloadEl = download && document.querySelector(download);
    const searchFieldEl = searchEl && document.querySelector(searchEl.dataset.for);

    if (tableEl) {
        if (searchEl && searchFieldEl) {
            const field = searchFieldEl.querySelector(".search");

            searchEl.addEventListener("click", (e) => {
                field.reset();
                searchFieldEl.classList.toggle("hidden");
                searchEl.classList.toggle("text-x-prime");
                if (!searchFieldEl.classList.contains("hidden"))
                    field.focus();
            });

            field.addEventListener("keydown", e => {
                if (e.keyCode === 13) {
                    field.form.requestSubmit();
                }
            });
        }

        if (downloadEl) {
            const anchorElement = document.createElement("a");
            anchorElement.download = "table-data.csv";
            downloadEl.addEventListener("click", e => {
                const exporter = new CSV(tableEl);
                const csvOutput = exporter.convert();
                const csvBlob = new Blob([csvOutput], {
                    type: "text/csv",
                });
                const blobUrl = URL.createObjectURL(csvBlob);
                anchorElement.href = blobUrl;
                anchorElement.click();
                setTimeout(() => {
                    URL.revokeObjectURL(blobUrl);
                }, 500);
            });
        }
    }

    if (filterEls)
        filterEls.forEach(filter => {
            filter.addEventListener("change", e => {
                const targets = document.querySelectorAll("[data-is=" + filter.dataset.for+"]");
                if (filter.checked)
                    targets.forEach(target => {
                        target.style.display = "";
                    });
                else targets.forEach(target => {
                    target.style.display = "none";
                });
            });
            filter.dispatchEvent(new Event("change"));
        });
}

function ProductEditor(opts) {
    const {
        uploader,
        editors = [],
        lang = "en",
        items,
    } = opts;

    if (uploader.length) Uploader(uploader);

    editors.forEach(target => {
        tinymce.init({
            height: 200,
            selector: target,
            language: lang,
            plugins: "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount advlist  preview code fullscreen insertdatetime", // print paste",
            toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat",
        });
    });

    const itemsEls = items && document.querySelectorAll(items);
    const formEl = document.querySelector("#form");

    if (itemsEls) itemsEls.forEach(item => item.addEventListener("click", () => {
        const id = item.dataset.key;
        const tpl = `<input type="hidden" name="remove[]" value="${id}" />`;
        formEl.insertAdjacentHTML("afterbegin", tpl);
        item.remove();
    }));

    [{
        field: "#brand",
        text: "[name=brand]",
        path: "/admin/brands/fetch"
    }, {
        field: "#category",
        text: "[name=category]",
        path: "/admin/categories/fetch"
    }].forEach(getData);
}

function CategorySetter() {
    getData({
        field: "#category",
        text: "[name=category]",
        path: "/admin/categories/fetch"
    });
}

function QuotationWatcher(update = false) {
    var timer;
    const productField = document.querySelector("#products-field"),
        display = document.querySelector("#display"),
        chargesFiled = document.querySelector("#charges-field"),
        subDisplay = document.querySelector("#sub-display"),
        chargesDisplay = document.querySelector("#charges-display"),
        totalDisplay = document.querySelector("#total-display");

    productField.display = "name_" + document.documentElement.lang;

    productField.addEventListener("input", e => {
        if (!productField.value.trim()) return;
        if (timer) clearTimeout(timer);
        timer = setTimeout(() => {
            fetch("/admin/products/fetch?search=" + encodeURI(productField.value)).then(data => data.json()).then((data) => {
                productField.results = data;
            });
        }, timer ? 250 : 0);
    });

    productField.addEventListener("select", ({ detail: { data } }) => {
        const row = document.createElement("tr");
        row.className = "border-t border-t-x-black";
        row.innerHTML = `
            <td class="text-x-black text-sm font-x-thin p-4 ps-6 text-center w-10">
                #${display.children.length + 1}
            </td>
            <td class="text-x-black text-base p-4 w-28">
                ${data.reference}
            </td>
            <td class="text-x-black text-base p-4">
                <input type="hidden" name="products[]" value="${data.id}" />
                ${data["name_" + document.documentElement.lang]}
            </td>
            <td class="text-x-black text-base font-x-thin p-4 text-center w-28">
                <input qte type="number" name="quantities[]" value="1"
                    class="text-base rounded-x-thin text-x-black font-x-thin text-center px-2 py-1 w-24 outline-x-prime focus:outline-2 bg-transparent border border-x-black" />
            </td>
            <td class="text-x-black text-base font-x-thin p-4 text-center w-28">
                <input prc type="number" name="prices[]" value="${data.price}"
                    class="text-base rounded-x-thin text-x-black font-x-thin text-center px-2 py-1 w-24 outline-x-prime focus:outline-2 bg-transparent border border-x-black" />
            </td>
            <td dsp class="text-x-black text-base font-x-thin p-4 text-center w-28">
                ${format(data.price)}
            </td>
            <td class="text-x-black text-base p-4 pe-6 text-center w-28">
                <button rmv type="button"
                    class="mx-auto px-3 py-1 flex items-center justify-center rounded-x-thin text-x-white hover:text-x-black focus-within:text-x-black bg-red-400 hover:bg-red-200 focus-within:bg-red-200 outline-none">
                    <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                    </svg>
                </button>
            </td>
        `;

        row.querySelectorAll("[qte], [prc]").forEach(e =>
            e.addEventListener("input", calculate));

        row.querySelectorAll("[qte], [prc]").forEach(e =>
            e.addEventListener("change", (e) => {
                if (!e.target.value.trim()) {
                    e.target.value = 1;
                    e.target.dispatchEvent(new Event("input"));
                }
            }));

        row.querySelector("[rmv]").addEventListener("click", () => {
            row.remove();
            calculate();
        });

        display.insertAdjacentElement("afterbegin", row);

        productField.reset();
        calculate();
    });

    function calculate() {
        var sub = 0;
        display.querySelectorAll("tr").forEach(tr => {
            const quantity = tr.querySelector("[qte]"),
                price = tr.querySelector("[prc]"),
                display = tr.querySelector("[dsp]");

            const total = +price.value * +quantity.value;
            display.innerHTML = format(total);
            sub += total;
        });

        const charges = (sub * (+chargesFiled.value / 100)) || 0;

        subDisplay.innerHTML = format(sub);
        chargesDisplay.innerHTML = format(charges);
        totalDisplay.innerHTML = format(sub + charges);
    }

    chargesFiled.addEventListener("change", calculate);

    const formEl = document.querySelector("#form");

    display.querySelectorAll("[qte], [prc]").forEach(e =>
        e.addEventListener("input", calculate));

    display.querySelectorAll("[qte], [prc]").forEach(e =>
        e.addEventListener("change", (e) => {
            if (!e.target.value.trim()) {
                e.target.value = 1;
                e.target.dispatchEvent(new Event("input"));
            }
        }));

    display.querySelectorAll("[rmv]").forEach(e => {
        e.addEventListener("click", (e) => {
            if (update) {
                const id = e.target.dataset.key;
                const tpl = `<input type="hidden" name="remove[]" value="${id}" />`;
                formEl.insertAdjacentHTML("afterbegin", tpl);
            }
            e.target.closest("tr").remove();
            calculate();
        });
    });

    calculate();
    return calculate;
}

function DetailsStyler(rtl) {
    Counter("#counter");
    Slider({
        wrap: "#slide",
        next: "#next",
        prev: "#prev",
    }, {
        flip: rtl,
        auto: true,
        time: 5000,
        touch: true,
        infinite: true,
    });

    document.querySelector("#quotation").addEventListener("click", e => {
        document.querySelector("#modal").show();
    });
}

function BaseIntializer() {
    Toggle();

    const tabTriggers = document.querySelectorAll("[data-tab]");
    const tabContents = document.querySelectorAll("[data-tabs]");

    tabTriggers.forEach((trigger) => {
        const target = trigger.dataset.tab;
        trigger.addEventListener("click", (e) => {
            trigger.classList.add("!border-x-prime", "!border-b-white");
            tabTriggers.forEach((trig) => {
                if (trig !== trigger) {
                    trig.classList.remove("!border-x-prime", "!border-b-white");
                }
            });
            tabContents.forEach((content) => {
                const tab = content.dataset.tabs;
                if (tab === target) {
                    content.classList.remove("hidden");
                    content.classList.add("grid");
                } else {
                    content.classList.remove("grid");
                    content.classList.add("hidden");
                }
            });
        });
    });

    document.querySelector("#search").addEventListener("click", e => {
        document.querySelector("#search_modal").show();
    });

    document.querySelector("#menu").addEventListener("click", e => {
        document.querySelector("#menu_modal").show();
    });
}

function HomeRunner(rtl, PLength, BLength) {
    const dots = document.querySelectorAll(".dots");
    const slides = Slider({
        wrap: "#slides",
    }, {
        flip: rtl,
        auto: true,
        time: 5000,
        touch: true,
    });

    slides.resize(
        ($) => {
            $.update({});
        },
        ($) => {
            $.update({});
        }
    );

    slides.change(function($) {
        dots.forEach(dot => dot.classList.remove("!bg-x-prime"));
        dots[$.current.value].classList.add("!bg-x-prime");
    });

    dots.forEach((dot, i) => {
        dot.addEventListener("click", e => {
            slides.scrollAuto();
            slides.scrollTo(i);
        });
    });

    if (PLength) {
        const products = document.querySelector("#products").parentElement;
        Slider({
            wrap: "#products",
        }, {
            flip: rtl,
            time: 5000,
            gap: 16,
        }).resize(
            ($) => {
                const size = products.clientWidth / 4;
                $.update({
                    ...(PLength < 4 ? {
                        infinite: false,
                        touch: false,
                        auto: false,
                        cols: PLength,
                        size: size,
                    } : {
                        infinite: true,
                        touch: true,
                        auto: true,
                        cols: 4,
                        size: false,
                    }),
                });
            },
            ($) => {
                const size = products.clientWidth / 2;
                $.update({
                    ...(PLength < 2 ? {
                        infinite: false,
                        touch: false,
                        auto: false,
                        cols: PLength,
                        size: size,
                    } : {
                        infinite: true,
                        touch: true,
                        auto: true,
                        cols: 2,
                        size: false,
                    }),
                });
            }
        );
    }

    if (BLength) {
        const brands = document.querySelector("#brands").parentElement;
        Slider({
            wrap: "#brands",
        }, {
            flip: rtl,
            time: 5000,
            gap: 16,
        }).resize(
            ($) => {
                const size = brands.clientWidth / 6;
                $.update({
                    ...(BLength < 6 ? {
                        infinite: false,
                        touch: false,
                        auto: false,
                        cols: BLength,
                        size: size,
                    } : {
                        infinite: true,
                        touch: true,
                        auto: true,
                        cols: 6,
                        size: false,
                    }),
                });
            },
            ($) => {
                const size = brands.clientWidth / 2;
                $.update({
                    ...(BLength < 2 ? {
                        infinite: false,
                        touch: false,
                        auto: false,
                        cols: BLength,
                        size: size,
                    } : {
                        infinite: true,
                        touch: true,
                        auto: true,
                        cols: 2,
                        size: false,
                    }),
                });
            }
        );
    }
}

function CatalogMaker() {
    Uploader("#image-uploader");

    const field = document.querySelector("#document-uploader"),
        text = document.querySelector("#document");

    field.addEventListener("change", e => {
        if (field.files.length) text.value = field.files[0].name;
        else text.value = "";
    });

    text.addEventListener("click", e => {
        field.click();
    });
}