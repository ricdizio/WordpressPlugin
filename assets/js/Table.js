
/**
 * @method: function that do the request to specific URI and call insert function 
 * 
 * @return void
 */
function PluginTablemain () {

    //Let's do the request to the API
    fetch('https://jsonplaceholder.typicode.com/users', {
        method: 'GET',
        headers: {
          "Content-type": "application/json; charset=UTF-8"
        }
      })
    .then(handleErrors)
    .then(response => response.json())
    .then(json => insertElementsTable(json))
}


/**
 * @method: function that receive a JSON object, loop through it, and insert the content in the table
 * 
 * @param {JSON} obj 
 */
function insertElementsTable (obj) {

    let tableID = document.getElementById("ricdizio-table");

    //Let's interate the json object
    obj.forEach( (e) => {

        //We need create a tr element
        let tr = document.createElement("tr");

        //Creation of all td and th objects
        let idTable       =  document.createElement("th");
        let nameTable     =  document.createElement("td");
        let usernameTable =  document.createElement("td");
        let emailTable    =  document.createElement("td");
        let addressTable  =  document.createElement("td");
        let phoneTable    =  document.createElement("td");
        let webSiteTable  =  document.createElement("td");
        let companyTable  =  document.createElement("td");
        let moreInfo      =  document.createElement("td");
        
        //Settings attributes 
        idTable.setAttribute("scope", "row");
        moreInfo.setAttribute("data-id",e.id);

        //Setting the text content of each element 
        idTable.textContent      = e.id;
        nameTable.textContent    = e.name;
        usernameTable.textContent= e.username;
        emailTable.textContent   = e.email;
        addressTable.textContent = "Info Here";
        phoneTable.textContent   = e.phone;
        webSiteTable.textContent = e.website;
        companyTable.textContent = e.company.name;
        moreInfo.innerHTML = `<a onClick='runOpenModal(${e.id})' >Click Here!</a>`;

        //Inserting all the th and td element in tr
        tr.insertAdjacentElement("beforeend", idTable);
        tr.insertAdjacentElement("beforeend", nameTable);
        tr.insertAdjacentElement("beforeend", usernameTable);
        tr.insertAdjacentElement("beforeend", emailTable);
        //tr.insertAdjacentElement("beforeend", addressTable);
        //tr.insertAdjacentElement("beforeend", phoneTable);
        //tr.insertAdjacentElement("beforeend", webSiteTable);
        //tr.insertAdjacentElement("beforeend", companyTable);
        tr.insertAdjacentElement("beforeend", moreInfo);

        //Inserting the tr element in the ID table 
        tableID.insertAdjacentElement("beforeend", tr);
        
        console.log(e);
    });
}

/***
 * 
 * @method: function that runs a modal in the page and show the input data
 * 
 * @param [obj] data
 * 
 * @return [void]
 */

function runOpenModal( id ) {


  try {
    
    if (id != null && id != undefined ) {

      //Let's do the request to the API with an ID for user
      fetch(`https://jsonplaceholder.typicode.com/users/${id}`, {
        method: 'GET',
        headers: {
          "Content-type": "application/json; charset=UTF-8"
        }
      })
      .then(handleErrors)
      .then(response => response.json())
      .then(json => insertElementsOnModal(json))

    }
    else {

      alert( "The id for the request doesn\t exist" );

    }

  } catch (e) {
    
    alert("Something went wrong trying to open the modal.");
    console.log(e);

  }

}

/**
 * @method: Function that handle the request error
 *
 * @param {response} response 
 * 
 * @return {response} response
 */
function handleErrors(response) {

  if (!response.ok) {

      alert(`Something went wrong while doing the fetch request. StatusCode: ${response.status}`);

      throw Error("Wrong request!");

  }

  return response;
}

//Call main function
PluginTablemain();