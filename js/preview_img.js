function loadImge(num) {
    const previewImg = document.querySelector(`#preview-img-${num}`);
    const fileChooser = document.querySelector(`#selector-image-${num}`);
    
    fileChooser.onchange = e => {
        const fileToUpload = e.target.files.item(0);
        const reader = new FileReader();
    
        // evento disparado quando o reader terminar de ler 
        reader.onload = e => previewImg.src = e.target.result;
    
        // solicita ao reader que leia o arquivo 
        // transformando-o para DataURL. 
        // Isso disparará o evento reader.onload.
        reader.readAsDataURL(fileToUpload);
    };    
}

loadImge(1);
loadImge(2);
loadImge(3);