
function ImageUploadUrl() {
    var fileSelected = document.getElementById('file').files;
    if(fileSelected.length > 0) {
        var fileToLoad = fileSelected[0];
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoaderEvent) {
            var srcData = fileLoaderEvent.target.result;
            var newImage = document.createElement('img');
            newImage.src = srcData;
            document.getElementById('show_list_file').innerHTML = newImage.outerHTML;

        }
        fileReader.readAsDataURL(fileToLoad);
    }

}

