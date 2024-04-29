const form = document.getElementById('form');
const inputEmail3 = document.getElementById('inputEmail3');
const inputPassword3 = document.getElementById('inputPassword3');
form.addEventListener('submit', e => {
    e.preventDefault();
    validateInputs();
});

const setError = (element, message) => {
    const inputcontrol = element.parentElement;
    const errorDisplay = inputcontrol.querySelector('.error')

    errorDisplay.innerText = message;
    inputcontrol.classlist.add('error');
    inputcontrol.classlist.remove('success')


}
const setSuccess = element => {
    const inputcontrol = element.parentElement;
    const errorDisplay = inputcontrol.querySelector('.error')

    errorDisplay.innerText = '';
    inputcontrol.classlist.add('success');
    inputcontrol.classlist.remove('error')

};

const validateInputs = () => {
const inputEmail3value = inputEmail3.value.trim();
const inputPassword3value = inputPassword3.value.trim();

if(inputEmail3value == ''){
    setError(inputEmail3, "username is required ");

}else{
    setSuccess(inputEmail3);

}
if(inputPassword3value == ''){
    setError(inputPassword3, "password is required ");
}else if (inputPassword3value.length < 8){
    setError(inputPassword3, "password must be 8 characters ");
}else{
    setSuccess(inputPassword3);
}


};

