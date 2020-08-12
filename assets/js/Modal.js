// Get the modal
var modal = document.getElementById("APIContent");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Method that open the modal
function insertElementsOnModal(data) {

    //Putting the data
    let adr = `Street: ${data.address.street}, City: ${data.address.city}, ZipCode: ${data.address.zipcode}`
    document.getElementById("requestID").textContent       = data.id;
    document.getElementById("nameContent").textContent     = data.name;
    document.getElementById("emailContent").textContent    = data.email;
    document.getElementById("userNameContent").textContent = data.username;
    document.getElementById("addressContent").textContent  = adr;
    document.getElementById("companyContent").textContent  = data.company.name;
    
    //Show modal
    modal.style.display = "block";

}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}