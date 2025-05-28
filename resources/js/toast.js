window.showToast = (action = 'success', text = '') => {
    var toastLive = document.getElementById('liveToast');
    toastLive.children[0].classList = ['toast-header'];
    switch (action) {
        case 'success':
            toastLive.children[0].children[0].innerText = 'Eba!';
            toastLive.children[0].classList.add('text-bg-success');
            break;
        case 'danger':
            toastLive.children[0].children[0].innerText = 'Ops!';
            toastLive.children[0].classList.add('text-bg-danger');
            break;
        case 'warning':
            toastLive.children[0].children[0].innerText = 'Cuidado!'
            toastLive.children[0].classList.add('text-bg-warning');
            break;
        case 'info':
            toastLive.children[0].children[0].innerText = 'Importante!'
            toastLive.children[0].classList.add('text-bg-info');
            break;
    }
    console.log(text)
    if (text == '') {
        switch (action) {
            case 'success':
                toastLive.children[1].innerText = 'Realizado com sucesso!';
                toastLive.children[0].children[0].innerText = 'Sucesso'
                break;
            case 'danger':
                toastLive.children[1].innerText = 'Não foi possível realizar esta ação';
                toastLive.children[0].children[0].innerText = 'Ops!'

                break;
            case 'warning':
                toastLive.children[1].innerText = 'Cuidado ao executar essa ação';
                toastLive.children[0].children[0].innerText = 'Cuidado!'
                break;
            default:
                toastLive.children[1].innerText = '';
        }
    } else {
        toastLive.children[1].innerText = text
    }
    const toastBootstrap = window.bootstrap.Toast.getOrCreateInstance(toastLive);
    toastBootstrap.show();
}