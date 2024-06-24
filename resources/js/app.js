import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";

//if ("{{ route('admin.projects.create') }}" === "{{ url()->current() }}") {
   
    // document.getElementById('title').addEventListener('input', function() {
    //     const title = this.value;
    //     const slug = title.toLowerCase().trim().replace(/\s+/g, '-');
    //     document.getElementById('slug').value = slug;
    // });
//}

document.getElementById('cover_image').addEventListener('change', function(event) {
    // Recupero la lista di file selezionati
    const fileList = event.target.files;
    // Controlla se è stato selezionato almeno un file
    if (fileList.length > 0) {
        // Prende il primo file dalla lista
        const file = fileList[0];
        // Aggiorna l'anteprima dell'immagine
        document.getElementById('cover_image_preview').src = URL.createObjectURL(file);
    }
});

//event.target.files è una proprietà degli eventi JavaScript che è disponibile quando si gestisce un evento di input file (change) su un elemento <input type="file">. Questa proprietà restituisce un oggetto FileList, che è una collezione di oggetti File rappresentanti i file selezionati dall'utente tramite l'input file.

//Descrizione dettagliata:
//event: È l'oggetto evento passato alla funzione di gestione dell'evento change. Contiene informazioni sull'evento che è stato attivato (nel nostro caso, quando un file è stato selezionato tramite l'input file).

//event.target: È l'elemento DOM su cui l'evento è stato originariamente attivato. Nell'esempio dell'input file, event.target si riferisce all'elemento <input type="file"> stesso.

//event.target.files: È la proprietà che restituisce un oggetto FileList, che è una raccolta (o una lista) di oggetti File. Questi oggetti File rappresentano i file selezionati dall'utente tramite l'input file.