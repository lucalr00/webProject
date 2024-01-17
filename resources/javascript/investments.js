/*
document.addEventListener('DOMContentLoaded', function() {
    // prendo l'elemento selezionato
    var select = document.querySelector('.list_years');

    var saved_value = select.value; 
    // nascondo tutti gli elementi tranne quello selezionato
     var p;
    for(var i = 2020; i <= 2050; i++){
        p = document.getElementById(i.toString());
        if(p) {
            if(i.toString() === select.value) {
                if (p.className === "description") {
                    p.className += " active";          
            } else {
                p.className += "description";
            }
        }
    }
}

    select.addEventListener('change', function() {
        // nascondi l'elemento precedente
        document.getElementById(saved_value).style.display = 'none';

        // mostra l'elemento selezionato
        var selectedP = document.getElementById(this.value);
        saved_value = this.value;
        if(selectedP) {
            selectedP.style.display = 'block';
        }
    });
});
*/
document.addEventListener("DOMContentLoaded", () => {
    // prendo l'elemento selezionato
    var select = document.querySelector('.list_years');

    var saved_value = select.value; 
    // nascondo tutti gli elementi tranne quello selezionato
     var t;
    for(var i = 2020; i <= 2050; i++){
        t = document.getElementById(i.toString());
        if(t) {
            if(i.toString() === select.value) {
                if (t.className === "description") {
                    t.className += " active";          
            } else {
                t.className += "description";
            }
        }
    }
}

    select.addEventListener('change', function() {
        // nascondi l'elemento precedente
        document.getElementById(saved_value).style.display = 'none';

        // mostra l'elemento selezionato
        var selectedP = document.getElementById(this.value);
        saved_value = this.value;
        if(selectedP) {
            if (t.className === "description") {
                t.className += " active";          
        } else {
            t.className += "description";
        }
        }
    });
});