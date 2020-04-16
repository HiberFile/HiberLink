// Script qui sert à copier le lien dans le presse papiers
var clipboard = new ClipboardJS('.btn');

function copyToPastboard() {
    var copyText = document.getElementById("lien");
    copyText.select();
    document.execCommand("copy");
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        type: 'success',
        title: 'Lien copié'
    });
}

function error() {
    Swal.fire(
        "Erreur",
        "Une erreur s'est produite lors du transfert de votre fichier. Veuillez réessayer.",
        "error"
    );
}

function select_all_and_copy(el) {
    if (document.body.createTextRange) {
        // IE
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.select();
        textRange.execCommand("Copy");
        tooltip(el, "Copied!");
    } else if (window.getSelection && document.createRange) {
        // non-IE
        var editable = el.contentEditable; // Record contentEditable status of element
        var readOnly = el.readOnly; // Record readOnly status of element
        el.contentEditable = true; // iOS will only select text on non-form elements if contentEditable = true;
        el.readOnly = false; // iOS will not select in a read only form element
        var range = document.createRange();
        range.selectNodeContents(el);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range); // Does not work for Firefox if a textarea or input
        if (el.nodeName == "TEXTAREA" || el.nodeName == "INPUT")
            el.select(); // Firefox will only select a form element with select()
        if (el.setSelectionRange && navigator.userAgent.match(/ipad|ipod|iphone/i))
            el.setSelectionRange(0, 999999); // iOS only selects "form" elements with SelectionRange
        el.contentEditable = editable; // Restore previous contentEditable status
        el.readOnly = readOnly; // Restore previous readOnly status
        if (document.queryCommandSupported("copy"))
        {
            var successful = document.execCommand('copy');
            if (successful){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    type: 'success',
                    title: 'Lien copié'
                })
            }
        } else
        {
            if (!navigator.userAgent.match(/ipad|ipod|iphone|android|silk/i))
                tooltip(el, "Press CTRL+C to copy");
        }
    }
    Toast.fire({
        type: 'success',
        title: 'Lien copié'
    });
} // end function select_all_and_copy(el)

function tooltip(el, message)
{
    var scrollLeft = document.body.scrollLeft || document.documentElement.scrollLeft;
    var scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
    var x = parseInt(el.getBoundingClientRect().left) + scrollLeft + 10;
    var y = parseInt(el.getBoundingClientRect().top) + scrollTop + 10;
    if (!document.getElementById("copy_tooltip"))
    {
        var tooltip = document.createElement('div');
        tooltip.id = "copy_tooltip";
        tooltip.style.position = "absolute";
        tooltip.style.border = "1px solid black";
        tooltip.style.background = "#dbdb00";
        tooltip.style.opacity = 1;
        tooltip.style.transition = "opacity 0.3s";
        document.body.appendChild(tooltip);
    } else
    {
        var tooltip = document.getElementById("copy_tooltip")
    }
    tooltip.style.opacity = 1;
    tooltip.style.left = x + "px";
    tooltip.style.top = y + "px";
    tooltip.innerHTML = message;
    setTimeout(function () {
        tooltip.style.opacity = 0;
    }, 2000);
}

function paste(el)
{
    if (window.clipboardData) {
        // IE
        el.value = window.clipboardData.getData('Text');
        el.innerHTML = window.clipboardData.getData('Text');
    } else if (window.getSelection && document.createRange) {
        // non-IE
        if (el.tagName.match(/textarea|input/i) && el.value.length < 1)
            el.value = " "; // iOS needs element not to be empty to select it and pop up 'paste' button
        else if (el.innerHTML.length < 1)
            el.innerHTML = " "; // iOS needs element not to be empty to select it and pop up 'paste' button
        var editable = el.contentEditable; // Record contentEditable status of element
        var readOnly = el.readOnly; // Record readOnly status of element
        el.contentEditable = true; // iOS will only select text on non-form elements if contentEditable = true;
        el.readOnly = false; // iOS will not select in a read only form element
        var range = document.createRange();
        range.selectNodeContents(el);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
        if (el.nodeName == "TEXTAREA" || el.nodeName == "INPUT")
            el.select(); // Firefox will only select a form element with select()
        if (el.setSelectionRange && navigator.userAgent.match(/ipad|ipod|iphone/i))
            el.setSelectionRange(0, 999999); // iOS only selects "form" elements with SelectionRange
        if (document.queryCommandSupported("paste"))
        {
            var successful = document.execCommand('Paste');
            if (successful)
                tooltip(el, "Pasted.");
            else
            {
                if (navigator.userAgent.match(/android/i) && navigator.userAgent.match(/chrome/i))
                {
                    tooltip(el, "Click blue tab then click Paste");

                    if (el.tagName.match(/textarea|input/i))
                    {
                        el.value = " ";
                        el.focus();
                        el.setSelectionRange(0, 0);
                    } else
                        el.innerHTML = "";

                } else
                    tooltip(el, "Press CTRL-V to paste");
            }
        } else
        {
            if (!navigator.userAgent.match(/ipad|ipod|iphone|android|silk/i))
                tooltip(el, "Press CTRL-V to paste");
        }
        el.contentEditable = editable; // Restore previous contentEditable status
        el.readOnly = readOnly; // Restore previous readOnly status
    }
}

function copytoclipboard()
{
    select_all_and_copy(document.getElementById("lien"));
}