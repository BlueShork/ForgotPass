var body = document.getElementById('para');
var coordinate = document.getElementById('coordinate');

// Set disabled by default
coordinate.style.display = "none";

// Right click
body.addEventListener('contextmenu', function(e){
    e.preventDefault();
    

    // Left click 
body.addEventListener('click', function(e){
    coordinate.style.display = "none";
})
    coordinate.style.maxHeight= "300px";
    coordinate.style.display = "inline-block";
    coordinate.style.position = "absolute";
    coordinate.style.top = e.clientY+'px';
    coordinate.style.left = e.clientX+'px';
    
});
