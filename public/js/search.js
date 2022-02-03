function search(){

    var search_text = document.getElementById("search").value;

    if(search_text != ""){
        document.location.href = "http://127.0.0.1:8000/manga/" + search_text;
    }
}


