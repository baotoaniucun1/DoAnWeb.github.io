var url = '../../process.php?user=';

//const url = window.location.pathname;
const form = document.querySelector('form');

form.addEventListener('submit', e => {
    e.preventDefault();
   
    var user = GetURLParameter('user');
   
    console.log(user);
    console.log(url);
    var ulrok = url + user;
    console.log(ulrok);
    const files = document.querySelector('[type=file]').files;
    //var urlweb = window.location.pathname;
  
    const formData = new FormData();
  
    console.log(files.length);
  
    for (let i = 0; i < files.length; i++) {
        let file = files[i];

        formData.append('files[]', file);
    }

    fetch(ulrok, {
        method: 'POST',
        body: formData
    }).then(response => {
        console.log(response);

    });
 

});

function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }
}