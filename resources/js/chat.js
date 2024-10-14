// resources/js/chat.js
document.addEventListener('DOMContentLoaded', function() {
    fetch('http://localhost/news/1/chat')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            // ここにチャットメッセージをページに反映するロジックを書く
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
});
