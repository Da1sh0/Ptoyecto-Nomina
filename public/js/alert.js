window.onload = () => {
    const urlParams = new URLSearchParams(window.location.search);
    const error_message = urlParams.get('error_message');
    if (error_message) {alert(error_message), window.location.href = "./../../src/views/loginView.php"}}
