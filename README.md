<script>
    window.testWidgetAsyncInit = function() {
        new Test.Widget(1);  // can be 1, 2 or 3
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "http://pagebuilder.micromir.com.ua/cross-test-alt/assets/js/widget.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'widget-g'));
</script>
