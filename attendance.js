
const scriptURL = 'https://script.google.com/macros/s/AKfycbz4qqONUJZ3yhpiAmVF-BX5qcTXGTS_dv26YnBG5zf2pYE9m4gn6Lodtv8EhjjhImQC/exec'

const form = document.forms['attendance']

form.addEventListener('submit', e => {
 e.preventDefault()
 fetch(scriptURL, { method: 'POST', body: new attendance(form)})
 .then(response => alert("Thank you! attendance updated" ))
 .then(() => { window.location.reload(); })
 .catch(error => console.error('Error!', error.message))
})
