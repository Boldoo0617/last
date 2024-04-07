document.addEventListener('DOMContentLoaded', function() {
    loadUsers();

    function loadUsers() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_users.php', true);

        xhr.onload = function() {
            if (xhr.status == 200) {
                var users = JSON.parse(xhr.responseText);
                displayUsers(users);
            } else {
                console.error('Error fetching users. Status: ' + xhr.status);
            }
        };

        xhr.send();
    }

    function displayUsers(users) {
        var container = document.getElementById('usersContainer');
        container.innerHTML = '';

        users.forEach(function(user) {
            var card = document.createElement('div');
            card.className = 'user-card';

           

            var details = document.createElement('div');
            details.className = 'user-details';
            card.appendChild(details);

            var name = document.createElement('h2');
            name.textContent = user.username;
            name.className = 'user-name';
            details.appendChild(name);

            var email = document.createElement('p');
            email.textContent = user.email;
            email.className = 'user-email';
            details.appendChild(email);

            var address = document.createElement('p');
            address.textContent = user.address;
            address.className = 'user-address';
            details.appendChild(address);

            var removeBtn = document.createElement('button');
            removeBtn.textContent = 'Remove';
            removeBtn.className = 'btn-remove';
            removeBtn.addEventListener('click', function() {
                removeUser(user.id);
            });
            card.appendChild(removeBtn);

            container.appendChild(card);
        });
    }

    function removeUser(userId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'remove_user.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status == 200) {
                loadUsers();
            } else {
                console.error('Error removing user. Status: ' + xhr.status);
            }
        };

        xhr.send('id=' + encodeURIComponent(userId));
    }
});
