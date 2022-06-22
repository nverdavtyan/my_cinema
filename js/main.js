document.addEventListener("DOMContentLoaded", (event) => {

    let searchBtn = document.getElementById("searchBtn");
    let searchInput = document.getElementById("searchInput");
    const search = () => {
        if (searchInput.value.length > 0) {
            window
                .fetch(`models/search.php?query=${encodeURI(searchInput.value)}`)
                .then((response) => {
                    return response.json();
                })
                .then((data) => {

                    let searchList = document.getElementById("searchList");
                    let lis = "";
                    for (movie of data) {
                        lis += `<li>
                    <a href="details.php?id=${movie.id}">
                    ${movie.title}
                    </a>
                     </li>`;
                    }
                    searchList.innerHTML = lis;
                });
        } else {
            searchList.innerHTML = "";
        }
    };
    searchInput.addEventListener("keyup", () => {
        search();
    });
});