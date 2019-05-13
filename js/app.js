var firebaseConfig = {
    apiKey: "AIzaSyCNNqUU6jOvObHVbU5qxRiEjYbkcRkg6Io",
    authDomain: "mqfast-c6e6e.firebaseapp.com",
    databaseURL: "https://mqfast-c6e6e.firebaseio.com",
    projectId: "mqfast-c6e6e",
    storageBucket: "mqfast-c6e6e.appspot.com",
    messagingSenderId: "1083184136645",
    appId: "1:1083184136645:web:bd9704a4845a5e7c"
};
firebase.initializeApp(firebaseConfig);

const txtEmail = document.getElementById('correo');
const txtPassword = document.getElementById('pass');
const btnLogin = document.getElementById('login');

btnLogin.addEventListener('click', e => {
    const email = txtEmail.value;
    const pass = txtPassword.value;
    const auth = firebase.auth();

    const promesa = auth.signInWithEmailAndPassword(email,pass);
    //promesa.catch(e => location.href = "admin/error.php"); //en el caso de que no se validen los datos te mandara a esa ruta    
    promesa.catch(e => console.log(e.message));
});

firebase.auth().onAuthStateChanged(firebaseUser =>{
    if (firebaseUser) {
        location.href="admin";
    }
});


