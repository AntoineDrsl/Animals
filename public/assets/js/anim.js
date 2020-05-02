class Slider{

    constructor (el) {

        this.items = document.getElementsByClassName(el);
        this.offset;

    }

    launchSlider() {
        var offset = this.offset;
        var items = this.items;
        var widthContainer = document.getElementById('slideContainer').offsetWidth;
        console.log(widthContainer);
        this._slide(offset, items, widthContainer);
    }

    _slide(offset, items, widthContainer) {

        setInterval(function() {
            offset = offset + 50;
            for(var i = 0; i < items.length; i++) {
                items[i].style.left = offset + 'px';
                if(items[i].offsetLeft > widthContainer) {
                    items[i].style.left = '0px';
                }
            }
        }, 3000);
    };

}