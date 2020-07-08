console.log("this is ok");


 // cc77e3a152c844bfaafcd21c4ea1dcee
 let source ='bbc-news';
 let apikey ='cc77e3a152c844bfaafcd21c4ea1dcee';
// graps container
 let newsaccording = document.getElementById('newsaccording');
// crate get request by ajax
const xhr =new XMLHttpRequest();

xhr.open('GET', `http://newsapi.org/v2/top-headlines?sources=${source}&apikey=${apikey}` , true);

// xhr ko load karne ke liye or jsonj parse karne ke liye 
xhr.onload=function(){
    if(this.status===200){
        let json = JSON.parse(this.responseText)
        let articles = json.articles;
          // console.log(articles);
        // news dalne ke liye
        let newshtml ="";
        // for each loop ko loop me chAlane ke liye

  articles.forEach(function(element ,index){
      // forEach loop me do argument hote hai pahla element , index jo id btata hai number
          //  console.log(element, index);

 let news = `<div class = "card"> 
                <div class="card-header" id="heading${index}" >
                     <h2 class="mb-0"> 
                         <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse${index}"
                             aria-expanded="true" aria-controls="collapse${index}">Breaking News:-  ${index +1}  ${element["title"]}</button>
                             </h2>
                         </div>

                     <div id="collapse${index}"" class="collapse " aria-labelledby="heading${index}" data-parent="#newsaccording">
                    <div class="card-body">${element["content"]}.<a href ="${element['url']}" target="_blank">Read more here</a></div>                   
                            
            </div>
          
        </div>`; 

     // target="_blank" anchor tag -esme newntab me kholane ke liye

      newshtml += news;
               
        });
        
            // newsaccording div me dalane ke  liye
         newsaccording.innerHTML= newshtml;

        
    }
    else{
        console.log('some error');
    }
}

// xhr ko send karne ke liye
xhr.send();


