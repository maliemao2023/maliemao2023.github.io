function addMessage() {
    const message = document.getElementById('message-input').value;
    const messageDiv = `<div>${message}</div>`;
    
    document.getElementById('messages').innerHTML += messageDiv;

    // 请求 GitHub API，创建一个新 Issue 来保存留言
    fetch('https://api.github.com/repos/:owner/:repo/issues', {
        method: 'POST',
        body: JSON.stringify({
            title: 'New Message',
            body: message
        })
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
}
