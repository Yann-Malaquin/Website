function onClickBtnFav(event) {
    event.preventDefault();
    var q;
    const url = this.href;
    axios.get(url).then(function (response) {
        document.querySelectorAll('#js-fav-id-' + response.data.id).forEach(function (icone) {
            if (icone.classList.contains('fas')) {
                icone.classList.replace('fas', 'far');
            }
            else {
                icone.classList.replace('far', 'fas');
            }
        });
    });

}
document.querySelectorAll('a.js-fav').forEach(function (link) {
    link.addEventListener('click', onClickBtnFav);
});

function onClickBtnHomeFav(event) {
    event.preventDefault();
    var q;
    const url = this.href;
    axios.get(url).then(function (response) {
        document.querySelectorAll('#js-fav-id-' + response.data.id).forEach(function (icone) {
            if (icone.classList.contains('fas')) {
                icone.classList.replace('fas', 'far');
                location.reload(window.location.pathname);
            }
            else {
                icone.classList.replace('far', 'fas');
                location.reload(window.location.pathname);
            }
        });
    });

}
document.querySelectorAll('a.js-homefav').forEach(function (link) {
    link.addEventListener('click', onClickBtnHomeFav);
});

document.querySelectorAll('button.js-caret').forEach(function (link) {
    link.addEventListener('click', onClickBtnCaret);
});

function onClickBtnCaret() {
    $(this).find('span').toggleClass('fa-caret-right').toggleClass('fa-caret-down');
}

