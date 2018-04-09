console.log("conn");
const httpRequest = new XMLHttpRequest();

// var lightbox = document.querySelector('.lightbox');
// lightbox.style.display = 'none';
//
// function lightboxUp() {
// // console.log('yup');
// lightbox.style.display = 'block';
// }

function fillContent(currentIndex, currentObject){
// console.log("??");
  if (!httpRequest) {
      alert('Giving up :(Cannot create an XMLHTTP instance');
      return false;
    }
      httpRequest.onreadystatechange = processRequest;
      console.log("here");
      httpRequest.open('GET', 'phpscripts/movieajax.php?id=' + this.id);
      httpRequest.send();

}
function processRequest() {
    if (httpRequest.readyState === XMLHttpRequest.DONE){
      // console.log("x");
      if (httpRequest.status === 200){
          var data = JSON.parse(httpRequest.responseText);
          processResult(data);
      } else {
        // console.log(error);
        alert('There was a problem with the request.');
      }
    }
  }
  function processResult(data) {
    console.log(data);

    const { movies_name, genre_name, movies_year, movies_director, movies_stars, movies_desc} = data[0];

    let heading = document.querySelector('.heading').innerHTML = movies_name;
    let gen = document.querySelector('.gen').innerHTML = genre_name;
    let year = document.querySelector('.year').innerHTML = movies_year;
    let dir = document.querySelector('.dir').innerHTML = movies_director;
    let stars = document.querySelector('.stars').innerHTML = movies_stars;
    let synopsis = document.querySelector('.synopsis').innerHTML = movies_desc;

  }


// VIDEO
var vidThumb = document.querySelectorAll(".thumb");

vidThumb.forEach(function(id,index){
  console.log("works");
  id.addEventListener('click', fillContent,false);
})
