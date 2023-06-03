
function copyToClipBoard() {
  // Sélectionne l'élément contenant le lien
    var input = document.getElementById('myInput');
    var textareaTemporaire = document.createElement('textarea');
    textareaTemporaire.value = input.value;
    document.body.appendChild(textareaTemporaire);
    
    // Sélectionne le texte dans le textarea temporaire
    textareaTemporaire.select();
    textareaTemporaire.setSelectionRange(0, textareaTemporaire.value.length);
    
    // Copie le texte dans le presse-papiers
    document.execCommand('copy');
    
    // Supprime le textarea temporaire de la page
    document.body.removeChild(textareaTemporaire);
    
    // Affiche un message de confirmation
    // alert('La valeur a été copiée !');

    var tooltip = document.getElementById("myTooltip");
    var tooltipInfo = document.getElementById("tooltipInfo");
    var tooltipCopied = document.getElementById("tooltipCopied");
    tooltipInfo.classList.add("hidden");
    tooltipCopied.classList.remove("hidden");
    // tooltip.innerHTML = "Copied: " + input.value;
}


function appearsTooltip() {
  var tooltip = document.getElementById("myTooltip");
  var tooltipInfo = document.getElementById("tooltipInfo");
  var tooltipCopied = document.getElementById("tooltipCopied");
  tooltipCopied.classList.add("hidden");
  tooltipInfo.classList.remove("hidden");
  // tooltip.innerHTML = "Copy to clipboard";
}