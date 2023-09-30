const tabs = document.querySelectorAll('.btnTab');
const all_content = document.querySelectorAll('.content-tab');

// tabs.addEventListener('click', () => {
//     alert('Hello World');
// });

tabs.forEach((tab, index) => {
    tab.addEventListener('click', () => {
        tabs.forEach(tab => {
            tab.classList.remove('active');
        });
        tab.classList.add('active');
        all_content.forEach(content => {
            content.classList.remove('active');
        });
        all_content[index].classList.add('active');
    });
});