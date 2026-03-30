// Function to fetch events every 2 seconds
function fetchEvents() {
    fetch('ajax/fetchEvents.php')
        .then(response => response.json())
        .then(events => {
            const eventList = document.getElementById('eventList');
            eventList.innerHTML = '';
            events.forEach(event => {
                const li = document.createElement('li');
                li.textContent = event.event_data;
                eventList.appendChild(li);
            });
        })
        .catch(err => console.error(err));
}

// Call fetchEvents initially
fetchEvents();

// Poll every 2 seconds for new events
setInterval(fetchEvents, 2000);

// Send event message
function sendEvent() {
    const input = document.getElementById('eventInput');
    const message = input.value.trim();
    if (message === '') return;

    const formData = new FormData();
    formData.append('message', message);

    fetch('ajax/addEvent.php', { method: 'POST', body: formData })
        .then(() => {
            input.value = '';
            fetchEvents(); // refresh list after sending
        })
        .catch(err => console.error(err));
}