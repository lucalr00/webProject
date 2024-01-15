document.addEventListener('DOMContentLoaded', function() {
    // prendo l'elemento selezionato
    var select = document.querySelector('.list_years');

    var saved_value = select.value; 
    // nascondo tutti gli elementi tranne quello selezionato
     var p;
    for(var i = 2020; i <= 2050; i++){
        p = document.getElementById("table_" + i.toString());
        if(p) {
            if(i.toString() === select.value) {
                p.style.display = 'block';
            } else {
                p.style.display = 'none';
            }
        }
    }

    select.addEventListener('change', function() {
        // nascondi l'elemento precedente
        document.getElementById("table_" + saved_value).style.display = 'none';

        // mostra l'elemento selezionato
        var selectedP = document.getElementById("table_" + this.value);
        saved_value = this.value;
        if(selectedP) {
            selectedP.style.display = 'block';
        }
    });
});