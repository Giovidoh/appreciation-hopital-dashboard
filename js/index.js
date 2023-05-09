const overlay = document.getElementById("overlay");
const export_in_excel_btn = document.getElementById("exportExcelBtn");
const export_in_excel_form = document.getElementById("excel-filename-form");
const close_export_in_excel_form = document.querySelector(".excel-filename-form__close");
const input_export_in_excel_form = document.getElementById('filename');

export_in_excel_btn.addEventListener("click", function(){
    //Afficher le formulaire de définition du nom du fichier excel à exporter.
    export_in_excel_form.classList.add("active");
    overlay.classList.add("active");
})

close_export_in_excel_form.addEventListener("click", function(){
    //Masquer le formulaire de définition du nom du fichier excel à exporter.
    export_in_excel_form.classList.remove("active");
    overlay.classList.remove("active");
})

// Ajouter un gestionnaire d'événements de saisie de texte
input_export_in_excel_form.addEventListener('input', function(e){
    const regex = /^[^<>:"/\\|?*\x00-\x1F]+$/;
    // Supprimer tous les caractères non autorisés à l'aide d'une expression régulière
    input_export_in_excel_form.value = input_export_in_excel_form.value.replace(/[<>:"/\\|?*\x00-\x1F]/g, '');

    if(!regex.test(e.data)){
        alert("Un nom de fichier ne peut pas contenir cette touche :    " + e.data);
    }
});