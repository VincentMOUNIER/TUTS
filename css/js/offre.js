function insertAfter(newElement, afterElement) {
    var parent = afterElement.parentNode;

    if (parent.lastChild === afterElement) { // Si le dernier élément est le même que l'élément après lequel on veut insérer, il suffit de faire appendChild()
        parent.appendChild(newElement);
    } else { // Dans le cas contraire, on fait un insertBefore() sur l'élément suivant
        parent.insertBefore(newElement, afterElement.nextSibling);
    }
}

// var date = document.getElementById('acf_138')
var fieldset_date = document.createElement('fieldset');
var legend_date = document.createElement('legend');

legend_date.appendChild(document.createTextNode('Date'));
fieldset_date.appendChild(legend_date);
fieldset_date.appendChild(document.getElementById('acf_138'));

var fieldset_exp = document.createElement('fieldset');
var legend_exp = document.createElement('legend');

legend_exp.appendChild(document.createTextNode('Expérience'));
fieldset_exp.appendChild(legend_exp);
fieldset_exp.appendChild(document.getElementById('acf_136'));

var fieldset_ref = document.createElement('fieldset');
var legend_ref = document.createElement('legend');

legend_ref.appendChild(document.createTextNode("Responsable de l'expérience"));
fieldset_ref.appendChild(legend_ref);
fieldset_ref.appendChild(document.getElementById('acf_137'));

document.getElementById('poststuff').insertBefore(fieldset_date, document.getElementById('poststuff').firstChild);
document.getElementById('poststuff').insertBefore(fieldset_ref, document.getElementById('poststuff').firstChild);
document.getElementById('poststuff').insertBefore(fieldset_exp, document.getElementById('poststuff').firstChild);
