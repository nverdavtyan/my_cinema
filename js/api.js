// const fetchName = () => {

//     let searchBtn = document.getElementById("searchBtn");
//     let searchInput = document.getElementById("searchInput");
//     let value = input.value;
//     fetch(`https://api.themoviedb.org/3/search/movie?api_key=3fd2be6f0c70a2a598f084ddfb75487c&query="${value}`)
//         .then(response => response.json())
//         .then(shows => {
//             row_body.innerHTML = "";
//             shows.results.forEach(element => {
//                 createElements(element)

//             });
//             console.log(element)

//         })
// }




let searchBtn = document.getElementById("searchBtn");
let searchInput = document.getElementById("searchInput");
let myimg = document.querySelector(".manOfSteel");
console.log(myimg)

document.addEventListener("DOMContentLoaded", (event) => {
    window
        .fetch(`"https://api.themoviedb.org/3/movie/{}?api_key=8265bd1679663a7ea12ac168da84d2e8&language=en-US".format(movie_id)`) //on envoie à notre page search.php en paramètre "query" la valeur du champs. La méthode encodeURI vous permet de formater un chaine de caractère pour l'envoyer dans une URL, pratique pour traiter les espaces etc...
        .then((response) => {
            return response.json();
        })
        .then(shows => {
            shows.results.forEach(movie => {
                console.log(movie)

                myimg.style.backgroundImage = "url('https://image.tmdb.org/t/p/w1280" + movie.poster_path + "')";

            });


        });

});