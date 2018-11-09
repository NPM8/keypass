document.addEventListener('DOMContentLoaded', () => {
    for ( let item of document.getElementsByClassName('tessst')) {
        item.onclick = (evt) => {
            let test = document.parentNode.parentNode;
            test.children[0].children['password'].value = 'Testsada;'+test.children[0].children['password'].value;
            test.submit();
        }
    }
});
