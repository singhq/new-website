<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Note edit tutorial</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Note app</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" id="searchtext" type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <div class="container my-2">

        <h2>Wellcome To Magic notes</h2>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Add a note</h5>
                <div class="form-group">

                    <textarea class="form-control" id="addtext" rows="3"></textarea>
                </div>

                <button class="btn btn-primary" id="addbtn">Add note</button>
            </div>
        </div>

        <hr>
        <h2>Your Notes</h2>
        <hr>
        <div id="notes" class="row container-fluid">
            <!--
         
      -->





        </div>



    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>


    <script type="text/javascript">
    showNotes(); // es liye ki refresh ke bad notes gayab nhi hoga 

    // user event listener add edit to local storage 
    let addbtn = document.getElementById('addbtn');


    addbtn.addEventListener('click', function(e) {


        let addtext = document.getElementById('addtext');
        let notes = localStorage.getItem(
        "notes"); // agger note es id-notes me notes  localstrage pr kuch ho tab

        //  console.log(notes);

        // ager ye null  nikalta hai to else part ko run karo // check karne ke liye 
        if (notes == null) {
            notesobj = []; // blank array  data store karne ke liye 


        } else {
            notesobj = JSON.parse(notes); // tab data json me pzss kr do


        }
        notesobj.push(addtext.value); // notes ko puss karne ke liye   dalene ke liye 

        // console.log(notesobj);

        localStorage.setItem("notes", JSON.stringify(
        notesobj)); //  ye notes ko check ke liye ki set hai or usko string badle ne ke liy kyo localstarage 

        // addtext se submit ke bad use blank karne hiye
        addtext.value = "";




        showNotes(); //function for notes ko show karane ke liye 


    });

    // function to show element from localstorage 
    function showNotes() {

        // let notes = localstrage.getItem('notes');
        let notes = localStorage.getItem('notes');


        if (notes == null) {
            notesobj = []; // blank array 

        } else {
            notesobj = JSON.parse(notes); // tab data json me pzss kr do
            //  console.log(notesobj);
        }

        let html = "";
        // foreach loop for array 

        notesobj.forEach(function(element, index) {
            //  console.log(element["index"]);

            html += `<div class="noteCard my-2 mx-2 card" style="width: 18rem;">
             
                            <div id="show" class="card-body">
                              <h5 class="card-title"> Note ${index +1}</h5>
                              <p class="card-text">${element}</p>
                              
                              <button id="${index}" onclick="deleteNotes(this.id)" class="btn btn-primary">Delete note</button>
                         </div>
                     </div> `;



        });




        let notesele = document.getElementById('notes'); // us div ki length 0 nhi hai tab usme notes ko add kar do

        if (notesobj.length != 0) {

            notesele.innerHTML = html;

        } else {
            // ager 0 hai tab ye message print kr do
            notesele.innerHTML = `Nothing to add a notes ! add some notes...`;
        }

    }

    // function a for  delet notes 

    function deleteNotes(index) {

        // console.log("delet element", index);

        let notes = localStorage.getItem('notes'); // read karnwe ke liye / lene ke liye 


        if (notes == null) {
            notesobj = []; // blank array 

        } else {
            notesobj = JSON.parse(notes); // tab data json me pzss kr do

        }

        notesobj.splice(index,
        1); // splice delete karne ke liye do element leta hai phla kisko , kitana delete karna hai 

        localStorage.setItem("notes", JSON.stringify(notesobj)); // update karne ke liye 

        showNotes();

    }

    /// search karne ke liye 
    let search = document.getElementById('searchtext');

    search.addEventListener("input", function() {

        let inputval = search.value.toLowerCase();

        console.log('input text fire', inputval);

        let noteCard = document.getElementsByClassName('noteCard');
        Array.from(noteCard).forEach(function(element) {
            // tagname paragraph lene ke ;liye 
            let cardText = element.getElementsByTagName("p")[0].innerText;
            // paragraph match karne ke liye 

            if (cardText.includes(inputval)) {
                element.style.display = "block";
            } else {

                element.style.display = "none";
            }


        });

    });
    </script>
</body>

</html>