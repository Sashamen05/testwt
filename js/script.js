// let dan = document.getElementById('dan');
// let poyastop = document.getElementById('poyastop');
// let poyasbot = document.getElementById('poyasbot');

// if (dan = dan.value) {
//     poyastop.classList.add("black");
//     alert(dan.value);
// }

// Search
document.querySelector('#elastic').oninput = function() {
    let val = this.value.trim();
    let elasticItems = document.querySelectorAll('.elastic');
    if (val != ''){
        elasticItems.forEach(function(elem){
            if (elem.innerText.search(val) == -1) {
                elem.classList.add('hide');
            }
            else {
                elem.classList.remove('hide');
            }
        });
    }
    else {
        elasticItems.forEach(function(elem){
            elem.classList.remove('hide');
        });
    }
}











// trim(); - delete space