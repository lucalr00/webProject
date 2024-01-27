
document.addEventListener("DOMContentLoaded", () => {
    // prendo l'elemento selezionato
    var select = document.querySelector('#list_years');

    var saved_value = select.value; 
    // nascondo tutti gli elementi tranne quello selezionato
    var p;
    for(var i = 2020; i <= 2050; i++){
        p = document.getElementById(i.toString());
        if(p) {
            if(i.toString() === select.value) {
                    p.className += " active";          
        }
    }
}

    select.addEventListener('change', function() {
        // nascondi l'elemento precedente

        document.getElementById(saved_value).className = "description";

        // mostra l'elemento selezionato
        var selectedP = document.getElementById(this.value);
        saved_value = this.value;
        if(selectedP) {
                selectedP.className += " active";          
        }
    });
});