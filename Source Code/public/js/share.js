function copyText() {
    // Get the input element by its id
    let inputToCopy = document.getElementById("inputToCopy");

    // Select the text inside the input element
    inputToCopy.select();

    // Copy the selected text
    document.execCommand("copy");

    // Alert the user that the text has been copied
    alert(inputToCopy.value);
}
