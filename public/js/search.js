const search = document.querySelector('input[placeholder="search event"]');
const eventContainer = document.querySelector(".events");

search.addEventListener("keyup", function(event){
    if(event.key === "Enter"){
        event.preventDefault();

        const data = {search: this.value};
        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)

        }).then(function(response){
            return response.json();
        }).then(function(events){
            eventContainer.innerHTML = "";
            loadEvents(events)
        });
    }
});

function loadEvents(events) {
    events.forEach(event => {
        console.log(event);
        createEvent(event);
    })
}

function createEvent(event)
{
    const template = document.querySelector("#event-template");
    const clone = template.content.cloneNode(true);
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${event.image}`;
    const title = clone.querySelector("h2");
    title.innerHTML = event.title;
    const description = clone.querySelector("p");
    description.innerHTML = event.description;

    eventContainer.appendChild(clone);


}


