const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const login = document.querySelector('.login');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});

login.addEventListener('click', ()=> {
    wrapper.classList.add('active1');
});

iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active1');
});


