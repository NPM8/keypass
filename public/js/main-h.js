document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('tessst').onclick = (evt) => {
        let test = document.getElementById('add-elem');
        test.children[0].children['password'].value = 'Testsada;'+test.children[0].children['password'].value;
        test.submit();
    }
});
