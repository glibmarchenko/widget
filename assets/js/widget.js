(function(Test) {
	"use strict";

    function ajaxRequest(method, url, successCallback) {
        var xhr = new XMLHttpRequest();

        xhr.open(method, url, true);
        xhr.onreadystatechange = function() {
            if (this.readyState === 4) {
                if (xhr.status == 200) {
                    try {
                        var data = JSON.parse(xhr.responseText);
                        typeof successCallback === 'function' && successCallback(data);
                    } catch (e) {
                        console.error('Widget: Parsing error!')
                    }
                } else {
                    console.error("Widget: there was a problem with the request " + xhr.status);
                }
            }
        };
        xhr.send();
    }

    Test.Widget = function(id) {
        if (!(typeof id === 'number')) {
            throw new TypeError('Widget: invalid identifier specified!');
        }

        var widget
          , closeBtn
          , modal
          , url
          ;

        function init() {
            // variables
            closeBtn = widget.querySelector('.widget-' + id + '-modal span.close');
            modal = widget.querySelector('.widget-' + id + '-modal');

            // events
            closeBtn.addEventListener('click', closeButtonClickHandler);
        }

        /** Widget close handler */
        function closeButtonClickHandler() {
            modal.classList.remove('show');
        }

        /** Insert widget */
        function loadedHandler(data) {
            widget = document.createElement('div');
            widget.innerHTML = data.content;
            widget.id = 'widget-' + id;
            document.body.appendChild(widget);

            init();
        }

        /** Request widget body */
        +function load() {
            url = 'http://pagebuilder.micromir.com.ua/cross-test-alt/?id=' + id;
            ajaxRequest('get', url, loadedHandler);
        }();
    };

}(window.Test = window.Test || {}));
window.testWidgetAsyncInit();