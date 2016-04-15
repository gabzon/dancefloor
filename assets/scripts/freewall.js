function freewall() {
    var wall = new Freewall('.freewall');
    wall.fitWidth();
    wall.reset({
        selector: '.grid-item',
        animate: true,
        gutter: 20,
        onResize: function () {
            wall.fitWidth();
        }
    });
    wall.fitWidth();
}
