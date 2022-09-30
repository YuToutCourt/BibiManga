function display(){
    // Check if the checkBox is checked
    if (document.getElementById('sideStory').checked) {
        // Enable the text box with the id numeroSideStory
        document.getElementById('numeroSideStory').disabled = false;
        document.getElementById('nomSideStory').disabled = false;
        document.getElementById('nomSideStory').required = true;
        document.getElementById('numeroSideStory').required = true;
     }else {
        // Disable the text box with the id numeroSideStory
        document.getElementById('numeroSideStory').disabled = true;
        document.getElementById('nomSideStory').disabled = true;
    }
}

function search(){

    var search_text = document.getElementById("search").value;

    if(search_text != ""){
        document.location.href = "http://127.0.0.1:8000/manga/" + search_text;
    }
}

function changeImage(id_image){
    var img = document.getElementById("Isread"+id_image);
    var img_src = img.src; 
    if(img_src.includes("no")){

        img.src = "/image/check.png";
    }
    else{
        img.src = "/image/nocheck.png";
    }
}

Array.prototype.random = function () {
    return this[Math.floor((Math.random()*this.length))];
  }


function random_manga(all_manga_name){
    var random_manga = all_manga_name.random();
    console.log(random_manga);
    document.location.href = "http://127.0.0.1:8000/manga/" + random_manga;
}