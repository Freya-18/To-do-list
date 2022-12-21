 function cacher(id_tache) {
    checkbox = document.getElementById(id_tache);
    splitUrl = window.location.href.split('/');
    ancienUrl = ancienUrl+ splitUrl[1] + '/' + splitUrl[3];        

    if (checkbox.checked) {
        window.location = ancienUrl + "?idTache=" + id_tache + "&action=cocherCheckbox";
        
    } else {
        window.location = ancienUrl + "?idTache=" + id_tache + "&action=decocherCheckbox";
    }
  }