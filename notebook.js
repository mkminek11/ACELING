
class Notebook {
    constructor (id, items=[], def=0) {
        this.id = id;
        this.def = def;
        this.items = items;
    }
    
    start () {
        this.switch_to(this.def);
    }

    get () {
        console.log(this.items);
    }

    switch_to (id) {
        this._switch_off();
        this._toggle(this.items[id], true);
    }

    _switch_off () {
        this.items.forEach(element => {
            this._toggle(element, false);
        });
    }

    _toggle (item, state=undefined) {
        var d = document.getElementById(item).style.display;
        var s = (state==undefined)?(d=="none"):state;
        document.getElementById(item).style.display = s?"initial":"none";
    }
}