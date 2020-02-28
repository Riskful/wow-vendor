const formUserAdd = document.querySelector('.form');

formUserAdd.onsubmit = async (e) => {
    e.preventDefault();

    const table = document.querySelector('.table');
    const tableBody = table.querySelector('tbody');

    let response = await fetch('entry.php?action=user-add', {
        method: 'POST',
        body: new FormData(formUserAdd)
    });

    let result = await response.json();

    if (result.request) {
        let response = await fetch('entry.php?action=user-list', {
            method: 'GET'
        });

        let userList = await response.json();


        tableBody.innerHTML = '';

        userList.forEach((user) => {
            let tr = document.createElement('tr');
            let userId = document.createElement('td');
            let username = document.createElement('td');
            let role = document.createElement('td');

            userId.innerHTML = user.id;
            username.innerHTML = user.username;
            role.innerHTML = user.role;

            tr.appendChild(userId);
            tr.appendChild(username);
            tr.appendChild(role);

            tableBody.appendChild(tr);
        });
    }
};
