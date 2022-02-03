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