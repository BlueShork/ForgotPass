var button_global = document.querySelector('#global_class');
var button_weekly = document.querySelector('#weekly_class');

var global_view = document.getElementById('global_classement');
var weekly_view = document.getElementById('weekly_classement');

var titre = document.querySelector('#titre_class');

// Default value 
titre.innerHTML = "Classement Global";

weekly_view.classList.add('no_visible');

button_global.addEventListener('click', function(e){
    e.preventDefault();
    global_view.classList.add('visible');
    global_view.classList.remove('no_visible');
    weekly_view.classList.add('no_visible');

    // Insert title
    titre.innerHTML = "Classement Global";

});

button_weekly.addEventListener('click', function(e){
    e.preventDefault();
    weekly_view.classList.add('visible');
    weekly_view.classList.remove('no_visible');
    global_view.classList.add('no_visible');

    // Insert title
    titre.innerHTML = "Classement Weekly";
    titre.innerHTML += "<br><span style='font-size: 16px'>Chaque semaine les 3 trois premiers du classement remportent des récompenses : <br>1er = 3 000 EBucks - 2ème = 2 000 EBucks - 3ème = 1 000 EBucks</span>";

});